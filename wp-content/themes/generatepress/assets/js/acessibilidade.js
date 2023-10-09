// Persiste o tamanho da fonte entre sessões
const elemRoot = document.documentElement;
const estiloComputado = window.getComputedStyle(elemRoot);
const tamanhoFonteAtual = getCookie('fonte');
elemRoot.style.fontSize = tamanhoFonteAtual + "px";

function getCookie(nome) {
    const nomeCookie = nome + "=";
    const cookies = document.cookie.split(';');
    
    for (let i = 0; i < cookies.length; i++) {
        let cookie = cookies[i].trim();
        
        if (cookie.indexOf(nomeCookie) === 0) {
            return cookie.substring(nomeCookie.length, cookie.length);
        }
}
    // Tamanho padrão da fonte caso não exista cookie salvo
    return "10";
}

function saveCookie(tamanhoFonte) {
    const nome = 'fonte';
    const validade = '';
    const local = 'path=/'; 
    document.cookie = nome + "=" + (tamanhoFonte || "") + validade + "; " + local;
}

function tamanhoFonte(valor){
    const elemRoot = document.documentElement;
    const estiloComputado = window.getComputedStyle(elemRoot);
    const tamanhoFonteRoot = estiloComputado.fontSize;
    const tamanhoFonteMin = 5;
    const tamanhoFonteMax = 20;
    let tamanhoFonteAtual = parseFloat(tamanhoFonteRoot);

    // Cancela a operação caso tamanhoFonte não seja definido em px
    if ( ! tamanhoFonteRoot.includes('px')) {
        return;
    }

    if ((valor > 0 && tamanhoFonteAtual < tamanhoFonteMax) || 
        (valor < 0 && tamanhoFonteAtual > tamanhoFonteMin)
    ) {
        tamanhoFonteAtual += valor;
    }

    saveCookie(tamanhoFonteAtual);

    return elemRoot.style.fontSize = tamanhoFonteAtual + "px";       
}

function scrolldiv(div) {
    const elem = document.getElementById(div);
    elem.scrollIntoView({
        behavior: 'smooth'
    });
}