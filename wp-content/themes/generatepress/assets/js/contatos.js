let paginaAtual = 1;
const pesquisaAtual = [];
let numeroResultados = 0;
let mensagemPesquisa = '';
let divContatos = null;
const contatosPorPagina = 8;
const paginas = [];
const jsonContatos = [];

fetch('/index.php/lista-contatos')
    .then(response => response.json())
    .then(json => {
        jsonContatos.push(...json);
        pesquisaAtual.push(...json);
        numeroResultados = jsonContatos.length;
        mensagemPesquisa = `Todos os contatos (${numeroResultados} resultados):`;

        if (document.readyState !== 'loading') {
            iniciarContatos();
            return;    
        }

        document.addEventListener('DOMContentLoaded', (e) => {
            iniciarContatos();
        });
    });

function iniciarContatos() {
    divContatos = document.getElementById('lista-de-contatos');
    gerarPaginacao(jsonContatos);
    teclasMudarPagina();
    camposPesquisa();
}

function gerarPaginacao(listaPessoas) {
    console.log('teste');
    let itensPaginados = 0;
    paginas.splice(0);

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

function teclasMudarPagina(){
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
}

function camposPesquisa() {
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
                return;
            }
            
            botaoPesquisa.removeAttribute('style');            
        });
    }
}

function pesquisarContatos(tipo) {
    const idInput = `pesquisa-${tipo}`;
    const consulta = document.getElementById(idInput).value;
    const resultado = jsonContatos.filter(contato => {
        let stringConsultada = contato[tipo];
        
        if (!stringConsultada) {
            stringConsultada = "";
        }

        return stringConsultada.toUpperCase()
            .includes(consulta.toUpperCase());
    });
    
    pesquisaAtual.splice(0);
    pesquisaAtual.push(...resultado);
    numeroResultados = resultado.length;
    let textoResultados = `${numeroResultados} resultados`;

    if (numeroResultados < 1) {
        textoResultados = 'nenhum resultado';
    }
    
    mensagemPesquisa = `Resultados da pesquisa: ${consulta} (${textoResultados})`;
    gerarPaginacao(resultado);
}
