<?php
?>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'pt', layout: google.translate.TranslateElement.FloatPosition.TOP_RIGHT}, 'google_translate_element');
}

(function corrigeTextoIdioma() {
    const gadgetGoogleTranslate = document
        .getElementsByClassName('goog-te-gadget-simple')[0];

    if (gadgetGoogleTranslate !== undefined) {
        const placeholder = document
            .getElementById('google_translate_placeholder');

        const elemIdiomaTexto = gadgetGoogleTranslate
            .getElementsByTagName('span')[0]
            .getElementsByTagName('a')[0];
        
        const span = document.createElement('span');
        const spanText = document.createTextNode('Idioma');
        span.appendChild(spanText);

        elemIdiomaTexto.replaceChildren(span);
        
        placeholder.remove();
    } else {
        setTimeout(corrigeTextoIdioma, 100);
    }
})();
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<style>
.goog-te-gadget-simple{
    background-color: #494949 !important;
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
</style>