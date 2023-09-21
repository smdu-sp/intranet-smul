<?php

/*
Template Name: Contatos
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();

$alfabeto = range('A', 'Z'); ?>

<div class="form-contatos">
    <label>Nome:</label>
    <input type="text" id="pesquisa-nome" data-tipo="nome">
    <button type="button" id="botao-pesquisa-nome" class="botao-pesquisa-contatos" onclick="pesquisarContatos('nome')">Buscar</button>
    <label>Cargo:</label>
    <input type="text" id="pesquisa-cargo" data-tipo="cargo">
    <button type="button" id="botao-pesquisa-cargo" class="botao-pesquisa-contatos" onclick="pesquisarContatos('cargo')">Buscar</button>
    <label>Unidade:</label>
    <input type="text" id="pesquisa-departamento" data-tipo="departamento">
    <button type="button" id="botao-pesquisa-departamento" class="botao-pesquisa-contatos" onclick="pesquisarContatos('departamento')">Buscar</button>
</div>
<div class="alfabeto">
    <ul class="lista-alfabeto" id="lista-alfabeto">
        <?php
        foreach ($alfabeto as $key => $value) { ?>
            <li class="list"><a href="#" onclick="filtroAlfabeto( '<?= $value ?>' )"><?= $value ?></a></li>
        <?php } ?>
    </ul>
</div>
<div id="lista-de-contatos"></div>
<div id="paginacao-contatos">
    <div></div>
    <div>
        <button class="botao-seta-contatos seta-dupla" type="button" onclick="mudarPagina(-999)"><?= iconeSVG( 'seta-primeiro.svg' ) ?></button>
        <button class="botao-seta-contatos" type="button" onclick="mudarPagina(-1)"><?= iconeSVG( 'seta-anterior.svg' ) ?></button>
        <button class="botao-proximo-contatos" type="button" onclick="mudarPagina(1)">Próxima Página</button>
        <button class="botao-seta-contatos seta-direita" type="button" onclick="mudarPagina(1)"><?= iconeSVG( 'seta-anterior.svg' ) ?></button>
        <button class="botao-seta-contatos seta-direita seta-dupla" type="button" onclick="mudarPagina(999)"><?= iconeSVG( 'seta-primeiro.svg' ) ?></button>
    </div>
    <div class="pagina-atual-contatos">Página <span id="pagina-atual-contatos">1</span></div>
</div>
<?php

// Inicia conexão ao banco da lista de contatos
include_once 'db-config.php';

$pessoas = array();

$SMUL = conectarLDAP('SMUL');
$SPURBANISMO = conectarLDAP('SPURBANISMO');

function conectarLDAP($company)
{
    include 'ldap-config.php';
    global $mysqli;
    $base_dn = "OU=Users,OU=$company,DC=rede,DC=sp";
    $resultado = array();

    // Resgata todos os contatos
    $pesquisa = '*';
    $filter = "(&(objectClass=user)(objectCategory=person)(|(cn=$pesquisa)(samaccountname=$pesquisa))(!(userAccountControl:1.2.840.113556.1.4.803:=2)))";

    if (($connect = @ldap_connect($ldap_server))) {
        if (($bind = @ldap_bind($connect, $auth_user, $auth_pass))) {
            if (($search = @ldap_search($connect, $base_dn, $filter))) {

                $number_returned = ldap_count_entries($connect, $search);
                $info = ldap_get_entries($connect, $search);

                $count = $info["count"];

                for ($i = 0; $i < $count; $i++) {

                    $ID_Rede = '';
                    $Email = '';
                    $Nome = '';
                    $Secretaria = '';

                    if (isset($info[$i]["samaccountname"][0])) {
                        $ID_Rede = $info[$i]["samaccountname"][0];
                    }
                    if (isset($info[$i]["mail"][0])) {
                        $Email = $info[$i]["mail"][0];
                    }
                    if (isset($info[$i]["displayname"][0])) {
                        $Nome = mb_convert_encoding($info[$i]["displayname"][0], 'UTF-8', 'ISO-8859-1');
                    }
                    if (isset($info[$i]["company"][0])) {
                        $Secretaria = $info[$i]["company"][0];
                    }

                    $busca = mysqli_query($mysqli, "select * from tbl_telefones WHERE cp_usuario_rede LIKE '$ID_Rede' ORDER BY cp_nome ASC");

                    if (mysqli_num_rows($busca) > 0) {
                        while ($dados = mysqli_fetch_array($busca)) {
                            $resultado += [
                                $ID_Rede => array(
                                    'nome' => $dados['cp_nome'],
                                    'telefone' => $dados['cp_telefone'],
                                    'cargo' => $dados['cp_cargo'],
                                    'departamento' => $dados['cp_departamento'],
                                    'secretaria' => $dados['cp_secretaria'],
                                    'andar' => $dados['cp_andar'],
                                    'cep' => $dados['cp_cep'],
                                    'Email' => $dados['cp_email'],
                                    'Dia' => $dados['cp_nasc_dia'],
                                    'Mes' => $dados['cp_nasc_mes']
                                )
                            ];
                        }
                    } else if ($company === 'SMUL' && $Nome != "" && $Email != "") {
                        $resultado += [
                            $ID_Rede => array(
                                'nome' => $Nome,
                                'telefone' => '',
                                'cargo' => '',
                                'departamento' => '',
                                'secretaria' => $Secretaria,
                                'andar' => '',
                                'cep' => '',
                                'Email' => mb_strtolower($Email),
                                'Dia' => '',
                                'Mes' => ''
                            )
                        ];
                    }
                }
            }
        }
    }

    ldap_close($connect);

    return $resultado;
}

mysqli_close($mysqli);

$pessoas = array_merge($SMUL, $SPURBANISMO);

$result = count($pessoas);
sort($pessoas);

$jsonPessoas = json_encode($pessoas);

?>

<script>
    const jsonPessoas = <?= $jsonPessoas ?>;
    let divContatos = document.getElementById('lista-de-contatos');    

    globalThis.paginaAtual = 1;
    globalThis.contatosPorPagina = 8;
    globalThis.paginas = [];
    globalThis.numeroResultados = jsonPessoas.length;
    globalThis.mensagemPesquisa = `Todos os contatos (${numeroResultados} resultados):`;
    globalThis.pesquisaAtual = jsonPessoas;

    gerarPaginacao(jsonPessoas);

    function gerarPaginacao(listaPessoas) {
        let itensPaginados = 0;
        paginas = [];

        for (const pessoa in listaPessoas) {
            if (itensPaginados === 0) {
                paginas.push([]);
            }

            paginas.at(-1).push(listaPessoas[pessoa]);
            itensPaginados++;

            if (itensPaginados === contatosPorPagina) {
                itensPaginados = 0;
            }
        }

        paginaAtual = 1;
        atualizarPaginaAtual();
        gerarTabelaContatos(paginas[0]);
    }

    function gerarTabelaContatos(listaPessoas) {
        let tabelaContatos = '';
        const header = '<table class="tabela-contatos" border="1px" cellpadding="5px" cellspacing="0">';
        const headerResultados = '<tr><th colspan=\"3\" class=\"resultado-contatos\" id=\"resultado-contatos\"></th></tr>';
        const mensagemErro = '<tr><td colspan=\"3\" class=\"info-contatos\">Nenhum resultado encontrado.</td></tr>';
        
        if (!listaPessoas) {
            tabelaContatos += header + headerResultados + mensagemErro;
            carregarTabelaContatos(tabelaContatos);
            return;
        }

        for (let i = 0; i < listaPessoas.length; i++) {
            let unidade = '';
            let cep = '';

            if (listaPessoas[i]['secretaria'] && listaPessoas[i]['secretaria'].length > 0) {
                unidade += listaPessoas[i]['secretaria'];
            }

            if (listaPessoas[i]['departamento'] && listaPessoas[i]['departamento'].length > 0) {
                unidade += ' - ' + listaPessoas[i]['departamento'];
            }

            if (listaPessoas[i]['cep'] && listaPessoas[i]['cep'].length > 0) {
                cep += ` - ${listaPessoas[i]['cep']}`;
            }

            const html = `
                <tr class="linha-contatos"><th rowspan="7" class="ordem-contatos"><center>${(paginaAtual - 1) * 8 + (i + 1)}</center></th>
                <th class="info-contatos">Nome</th><td>${listaPessoas[i]['nome']}</td></tr>
                <tr><th class="info-contatos">Cargo</th><td>${listaPessoas[i]['cargo']}</td></tr>
                <tr><th class="info-contatos">Tel.</th><td>${listaPessoas[i]['telefone']}</td></tr>
                <tr><th class="info-contatos">Unidade</th><td>${unidade}</td></tr>
                <tr><th class="info-contatos">Local</th><td>${listaPessoas[i]['andar']} ${cep}</td></tr>
                <tr><th class="info-contatos">Aniversário</th><td>${listaPessoas[i]['Dia']} / ${listaPessoas[i]['Mes']}</td></tr>
                <tr><th class="info-contatos">E-mail</th><td><a href="mailto:${listaPessoas[i]['Email']}">${listaPessoas[i]['Email']}</a></td></tr></table>
            `;

            tabelaContatos += header;

            if (i === 0) {
                tabelaContatos += headerResultados;
            }

            tabelaContatos += html;
        }
        
        carregarTabelaContatos(tabelaContatos);
    }

    function atualizarPaginaAtual(valor) {
        if (Number.isInteger(valor)) {
            paginaAtual += valor;
        }
        document.getElementById('pagina-atual-contatos').innerHTML = paginaAtual;
        document.getElementById('lista-alfabeto').scrollIntoView(true);
        gerarTabelaContatos(paginas[paginaAtual - 1]);
    }

    function carregarTabelaContatos(tabela) {
        divContatos.innerHTML = tabela;

        const cabecalhoResultado = document.getElementById('resultado-contatos');
        cabecalhoResultado.textContent = mensagemPesquisa;
    }

    function filtroAlfabeto(letra) {
        listaFiltrada = pesquisaAtual.filter(x => x.nome.toUpperCase().startsWith(letra));
        console.log(listaFiltrada);
        numeroResultados = listaFiltrada.length;
        let textoResultados = `${numeroResultados} resultados`;
        if (numeroResultados < 1) {
            textoResultados = 'nenhum resultado';
        }
        mensagemPesquisa = `Resultados da pesquisa: ${letra} (${textoResultados})`;
        gerarPaginacao(listaFiltrada);
    }

    function mudarPagina(pagina) {
        const tamanhoLista = paginas.length;
        if (pagina < (1 - paginaAtual)) {
            pagina = 1 - paginaAtual;
        }
        if (pagina > tamanhoLista - paginaAtual) {
            pagina = tamanhoLista - paginaAtual;
        }
                
        atualizarPaginaAtual(pagina);
    }

    (function teclasMudarPagina(){
        document.onkeydown = function (e) {
            var evt = window.event || e;
            switch (evt.keyCode) {
                case 39:  
                    mudarPagina(1);
                    break;
                case 37:
                    mudarPagina(-1);
                    break;
            }
        }
    })();

    (function camposPesquisa() {
        divForm = document.getElementsByClassName('form-contatos')[0];
        inputs = divForm.getElementsByTagName('input');

        for (const input of inputs) {
            const tipoInput = input.dataset['tipo'];
            const botaoPesquisa = document.getElementById(`botao-pesquisa-${tipoInput}`);
            
            input.addEventListener('keydown', (event) => {
                const tamanhoInput = input.value.length;
                
                if (event.keyCode == 13 && tamanhoInput > 0) {
                    pesquisarContatos(tipoInput);
                }
            });
            
            input.addEventListener('input', (event) => {
                const tamanhoInput = input.value.length;

                if (tamanhoInput > 0) {
                    botaoPesquisa.style.color = '#fff';
                    botaoPesquisa.style.backgroundColor = '#0a3399';
                    botaoPesquisa.style.border = 'none';
                    botaoPesquisa.style.fontWeight = 'bold';
                } else {
                    botaoPesquisa.removeAttribute('style');
                }
            });
        }
    })()

    function pesquisarContatos(tipo) {
        const idInput = `pesquisa-${tipo}`;
        const consulta = document.getElementById(idInput).value;
        const resultado = jsonPessoas.filter(contato => {
            let stringConsultada = contato[tipo];
            
            if (!stringConsultada) {
                stringConsultada = "";
            }

            return stringConsultada.toUpperCase()
                .includes(consulta.toUpperCase());
        });

        pesquisaAtual = resultado;
        numeroResultados = resultado.length;
        let textoResultados = `${numeroResultados} resultados`;
        if (numeroResultados < 1) {
            textoResultados = 'nenhum resultado';
        }
        mensagemPesquisa = `Resultados da pesquisa: ${consulta} (${textoResultados})`;
        gerarPaginacao(resultado);
    }
</script>

<style>
    #paginacao-contatos {
        display: flex;
        justify-content: space-between;
        margin: 40px 0 120px 0;
    }

    .botao-seta-contatos, .botao-proximo-contatos {
        border-radius: 5px;
        font-size: 14px;
        line-height: 1;
        vertical-align: top;
        margin-left: 8px;
        margin-right: 8px;
    }

    .botao-seta-contatos {
        padding: 3px 7px;
    }

    .botao-proximo-contatos {
        padding: 10px 12px;
    }
    
    .botao-seta-contatos,
    .botao-seta-contatos:focus,
    .botao-seta-contatos:hover {
        background-color: #fff;
        color: #000;
        border: 1px solid #000;
    }
    
    .botao-proximo-contatos, 
    .botao-proximo-contatos:focus,
    .botao-proximo-contatos:hover {
        background-color: #0a3399;
        color: #fff;
        text-transform: uppercase;
    }

    .seta-dupla {
        padding: 3px 2px;
    }

    .seta-direita svg {
        transform: rotate(180deg);
    }

    .pagina-atual-contatos {
        font-size: 1.4rem;
        font-weight: 700;
        color: #000;
    }
</style>
