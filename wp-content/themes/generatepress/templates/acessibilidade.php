<div class="container-acess-geral">
    <div class="container-controle">
        <ul class="controle-esquerda">
            <li class="funcoes-controle esquerda"><a href="#ultimas-noticias" accesskey="1">Ir para conteúdo [1]</a></li>
            <li class="funcoes-controle esquerda"><a href="#primary-menu" accesskey="2">Ir para menu [2]</a></li>
            <li class="funcoes-controle esquerda"><a href="#footer">Ir para rodapé [3]</a></li>
        </ul>

        <ul class="controle-direita">
            <li><a onclick="aumentarFonte()" class="funcoes-controle tm-font"><img src="wp-content\themes\generatepress\assets\img\acess-aumentar-fonte.svg" alt=""></a></li>
            <li><a onclick="diminuirFonte()" class="funcoes-controle tm-font"><img src="wp-content\themes\generatepress\assets\img\acess-diminuir-fonte.svg" alt=""></a></li>
            <li><a href="#" class="funcoes-controle"><img class="img-center" src="wp-content\themes\generatepress\assets\img\acess-alto-contraste.svg" alt="logo"><span class="text-header">Alto contraste</span></a></li>
            <li><a href="#" class="funcoes-controle"><img class="img-center" src="wp-content\themes\generatepress\assets\img\acess-acessibilidade.svg" alt=""><span class="text-header">Acessibilidade</span></a></li>
            <li><a id="google_translate_element" class="funcoes-controle"><img class="img-center" src="wp-content\themes\generatepress\assets\img\acess-idioma.svg" alt=""></a></li>
        </ul>
    </div>
</div>

<style>
    .goog-te-gadget-simple{
        background-color: #494949;
        border: none;
    }

    .goog-te-gadget-simple span{
        color: #fff;
        font-weight: normal;
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
        background-color: #494949;
        width: 100%;
        display: flex;
        justify-content: center;  

    }

    .container-controle{
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
        font-weight: 300;
        line-height: normal;
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
    function scrolldiv() {
        var elem = document.getElementById("ultimas-noticias");
        elem.scrollIntoView();
    }

    function scrolldivMenu() {
        var nav = document.getElementById("primary-menu");
        nav.scrollIntoView();
    }

    function scrolldivFooter() {
        var footer = document.getElementById("footer");
        footer.scrollIntoView();
    }

    function aumentarFonte() {                
        const elemRoot = document.documentElement;
        const estiloComputado = window.getComputedStyle(elemRoot);
        const tamanhoFonteTexto = estiloComputado.fontSize;

        // Cancela a operação caso tamanhoFonte não seja definido em px
        if ( ! tamanhoFonteTexto.includes('px')) {
            return;
        }
        
        let tamanhoFonteAtual = parseFloat(tamanhoFonteTexto);
        const tamanhoFonteMaximo = 25;

        if (tamanhoFonteAtual < tamanhoFonteMaximo) {
            tamanhoFonteAtual++;
            elemRoot.style.fontSize = tamanhoFonteAtual + "px";
        }
    }    

    function diminuirFonte() {
                
        /*guarda a classse dentro da variavel*/
        var elementosTexto = document.getElementsByTagName('html');

        /* pega o valor numerico de px do texto */

        var classe = "text";

        var elemento = document.querySelector("." + classe);

        var estiloComputado = window.getComputedStyle(elemento);

        var tamanhoFonte = parseFloat(estiloComputado.fontSize);



        for (let i = 0; i < elementosTexto.length; i++) {

            

            var elemento = elementosTexto[i];

            var tamanhoFonteAtual = window.getComputedStyle(elemento, null).getPropertyValue('font-size');

            var novoTamanhoFonte = parseFloat(tamanhoFonteAtual);

            var tamanhoFonteMinima = 10;


            if (tamanhoFonte >= tamanhoFonteMinima) {

                var limitfont = novoTamanhoFonte - 1;

                elemento.style.fontSize = limitfont + "px";

            }

        }

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