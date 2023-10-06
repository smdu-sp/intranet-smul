let paginaAtual = 1;
const pesquisaAtual = [];
let numeroResultados = 0;
let mensagemPesquisa = '';
let divContatos = null;
const contatosPorPagina = 8;
const paginas = [];
const jsonContatos = [];
let divCarregamentoPagina;
let divPagina;
let divCarregamentoContatos;
let divListaContatos;

// Carregamento da página e elementos
const eventoCarregado = new Event('carregado');
const eventoEsconder = new Event('descarregado');

document.addEventListener('DOMContentLoaded', () => {
    divCarregamentoPagina = document.getElementById('carregando-conteudo');
    divPagina = document.getElementById('container-contatos');
    divCarregamentoContatos = document.getElementById('carregando-contatos');
    divListaContatos = document.getElementById('container-lista-contatos');
    
    divPagina.addEventListener('carregado', () => {
        divPagina.classList.remove('hidden');
        divCarregamentoPagina.classList.add('hidden');
    });
    
    divListaContatos.addEventListener('carregado', () => {
        divListaContatos.classList.remove('hidden');
        divCarregamentoContatos.classList.add('hidden');
    });
    
    divListaContatos.addEventListener('descarregado', () => {
        divListaContatos.classList.add('hidden');
        divCarregamentoContatos.classList.remove('hidden');
    });
});

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
    campoPesquisaContatos();
}

function gerarPaginacao(listaPessoas) {
    divListaContatos.dispatchEvent(eventoEsconder);
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
    gerarTabelaContatos(paginas[paginaAtual - 1]);
}

function carregarTabelaContatos(tabela) {
    divContatos.innerHTML = tabela;

    const cabecalhoResultado = document.getElementById('resultado-contatos');
    cabecalhoResultado.textContent = mensagemPesquisa;
    divPagina.dispatchEvent(eventoCarregado);
    setTimeout(() => divListaContatos.dispatchEvent(eventoCarregado), 750);
}

function filtroAlfabeto(letra) {
    listaFiltrada = pesquisaAtual.filter(x => x.nome.toUpperCase().startsWith(letra));
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

function campoPesquisaContatos() {
    const selectTipo = document.getElementById('select-pesquisa-contatos');
    const inputPesquisa = document.getElementById('campo-pesquisa-contatos');
    const botaoPesquisa = document.getElementById('botao-pesquisa-contatos');
    
    inputPesquisa.addEventListener('keydown', (event) => {
        const tipoPesquisa = selectTipo.value;
        const tamanhoInput = inputPesquisa.value.length;
        const inputValido = tamanhoInput > 2;

        if (inputValido && event.key === 'Enter') {
            pesquisarContatos(tipoPesquisa);
        }
    });

    inputPesquisa.addEventListener('input', (event) => {
        const tamanhoInput = inputPesquisa.value.length;
        const inputValido = tamanhoInput > 2;
        
        if (inputValido) {
            botaoPesquisa.removeAttribute('disabled');
            return;
        }

        botaoPesquisa.setAttribute('disabled', true);
    });
}

function botaoPesquisarContatos() {
    const selectTipo = document.getElementById('select-pesquisa-contatos');
    const tipoPesquisa = selectTipo.value;

    pesquisarContatos(tipoPesquisa);
}

function pesquisarContatos(tipo) {
    const consulta = document.getElementById('campo-pesquisa-contatos').value;
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
