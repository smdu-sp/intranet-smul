<?php

$icons = array(
    'fa-solid fa-font"',
    'fa-solid fa-text-slash"',
    'fa-solid fa-pen-fancy"'
);

$chave = 0;

function inseri($icons){
    global $chave;

    if (isset($icons[$chave])) {
        $icone = $icons[$chave];
        $chave++;
        return '<i class="' . $icone . '"></i>';
    } else {
        return ;
    }

}
?>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<div class="container-acess-geral">
    <div class="container-controle">
        <ul class="controle-esquerda">
            <li class="funcoes-controle esquerda" ><a onclick="scrolldiv('ultimas-noticias')" accesskey="1">Ir para conteúdo [1]</a></li>
            <li class="funcoes-controle esquerda"><a onclick="scrolldiv('primary-menu')" accesskey="2">Ir para menu [2]</a></li>
            <li class="funcoes-controle esquerda"><a onclick="scrolldiv('footer')" accesskey="3">Ir para rodapé [3]</a></li>
        </ul>

        <ul class="controle-direita">
            <li><a onclick="tamanhoFonte(1)" class="funcoes-controle tm-font"><?=inseri($icons)?></a></li>
            <li><a onclick="tamanhoFonte(-1)" class="funcoes-controle tm-font"><?=inseri($icons)?></a></li>
            <li><a href="#" class="funcoes-controle"><?=inseri($icons)?><span class="text-header">Alto contraste</span></a></li>
            <li><a href="#" class="funcoes-controle"><img class="img-center" src="wp-content\themes\generatepress\assets\img\acess-acessibilidade.svg" alt=""><span class="text-header">Acessibilidade</span></a></li>
            <li><a id="google_translate_element" class="funcoes-controle"><img class="img-center" src="wp-content\themes\generatepress\assets\img\acess-idioma.svg" alt=""></a></li>
        </ul>
    </div>
</div>

<style>

    .funcoes-controle .tm-font{
        color: aquamarine;
    }

    .goog-te-gadget-simple{
        background-color: #494949;
        border: none;
    }

    .goog-te-gadget-simple span{
        color: #fff;
        font-weight: unset;
        font-family: 'Roboto';
    }

    .goog-te-gadget-simple span:hover{
        color: rgb(246,246,246, 0.8);
    }

    .goog-te-gadget-icon{
        display: none;
    }
    
    #primary-menu{
        display: flex;
        justify-content: center;

    }
 
    #menu-menu-cabecalho{
        display: flex;
        justify-content: space-around;
        min-width: 1220px;
        font-weight: bold;
    }
 
    .menu-item{
        flex-grow: 1;
    }

    .menu-item a{
        font-weight: bold;
        font-size: 20px;
        font-weight: 600;
    }
        /* barra de acessibilidade */
    .container-acess-geral{
        position: fixed;
        background-color: #494949;
        width: 100%;
        display: flex;
        justify-content: center;  
        font-family: 'Roboto';
        z-index: 1;
    }

    .container-controle{
        position: static;
        display: flex;
        justify-content: left;
        min-width: 1150px;
        justify-content: space-between;
    }

    .controle-esquerda, .controle-direita{
        list-style: none;
        padding: 6px 0;
        margin: 0;
        display: flex;
        align-items: center;
    }

    .controle-esquerda a, .controle-direita a{
        color: white;
        font-size: 12px;    
        font-style: normal;
        line-height: normal;
        cursor: pointer;
    }

    .controle-esquerda a:hover, .controle-direita a:hover{
        color: rgb(246,246,246, 0.8);
    }

    .funcoes-controle{
        margin: 0 10px;
        display: flex;
        align-items: center;
    }

    .img-center{
        margin-right: 4px;
    }

    .tm-font{
        cursor: pointer;
    }

    @media only screen and (max-width: 1210px) {
        .container-controle{
            min-width: 90%;
        }

    }


</style>

<script>
    function scrolldiv(div) {
        var elem = document.getElementById(div);
        elem.scrollIntoView({
            behavior: 'smooth'
        });
    }

    function getCookie(nome) {
    var nomeCookie = nome + "=";
    var cookies = document.cookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i].trim();
        if (cookie.indexOf(nomeCookie) === 0) {
        return cookie.substring(nomeCookie.length, cookie.length);
        }
    }
    return "";
    }

    const nome = getCookie('fonte');
    const elemRoot = document.documentElement;
    const estiloComputado = window.getComputedStyle(elemRoot);
    elemRoot.style.fontSize = nome + "px";

    function saveCookie(tamanhoFonte) {
        const nome = 'fonte';
        const validade = '';
        const local = 'path=/'; 
        document.cookie = nome + "=" + (tamanhoFonte || "") + validade + "; " + local;
    }



    console.log('teste')

    function tamanhoFonte(valor){
        const elemRoot = document.documentElement;
        const estiloComputado = window.getComputedStyle(elemRoot);
        const tamanhoFonteTexto = estiloComputado.fontSize;
        let tamanhoFonteAtual = parseFloat(tamanhoFonteTexto);
        const tamanhoFonteMax = 25;
        const tamanhoFonteMin = 5;

        // Cancela a operação caso tamanhoFonte não seja definido em px
        if ( ! tamanhoFonteTexto.includes('px')) {
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


</script>

<div id="google_translate_element" style="display: none;"></div>

<!-- Google Translate -->
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'pt', layout: google.translate.TranslateElement.FloatPosition.TOP_RIGHT}, 'google_translate_element');
}

(function corrigeTextoIdioma() {
    const elemGoogleTranslate = document
        .getElementsByClassName('goog-te-gadget-simple')[0];

    if (elemGoogleTranslate !== undefined) {
                const elemIdiomaTexto = elemGoogleTranslate
                    .getElementsByTagName('span')[0]
                    .getElementsByTagName('a')[0];
                
                const span = document.createElement('span');
                const spanText = document.createTextNode('Idioma');
                span.appendChild(spanText);
        
                elemIdiomaTexto.replaceChildren(span);
    } else {
        setTimeout(corrigeTextoIdioma, 100);
    }
})();
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>