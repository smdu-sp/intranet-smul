let campoPesquisa = null;
let botaoPesquisa = null;

document.addEventListener('DOMContentLoaded', () => {
    campoPesquisa = document.getElementById('barra-pesquisa');
    botaoPesquisa = document.getElementById('botao-pesquisa');
    
    campoPesquisa.addEventListener('keydown', (event) => {
        const pesquisa = campoPesquisa.value.trim();
        const pesquisaValida = pesquisa.length > 2;

        if (pesquisaValida && event.key === 'Enter') {
            pesquisarSite(campoPesquisa.value);
        }
    });

    campoPesquisa.addEventListener('input', () => {
        habilitarBotaoPesquisa(false);
        const pesquisa = campoPesquisa.value.trim();
        const pesquisaValida = pesquisa.length > 2;

        if (pesquisaValida) {
            habilitarBotaoPesquisa(true);
        }
    });
});

function pesquisarSite(consulta) {
    location.assign(`/?s=${consulta}`);
}

function pesquisaComBotao() {
    pesquisarSite(campoPesquisa.value);
}

function habilitarBotaoPesquisa(estado) {
    if (estado) {
        botaoPesquisa.removeAttribute('disabled');
        return;
    }

    botaoPesquisa.setAttribute('disabled', true);
}