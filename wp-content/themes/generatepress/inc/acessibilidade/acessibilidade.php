<?php 

?>
<div class="container-acess-geral">
    <div class="container-controle">
        <ul class="controle-esquerda">
            <li class="funcoes-controle esquerda"><a class="zero" onclick="scrolldiv('ultimas-noticias')" data-tooltip="Ir para conteúdo" accesskey="1">Ir para conteúdo [1]</a></li>
            <li class="funcoes-controle esquerda"><a onclick="scrolldiv('primary-menu')" data-tooltip="Ir para menu" accesskey="2">Ir para menu [2]</a></li>
            <li class="funcoes-controle esquerda"><a onclick="scrolldiv('footer')" data-tooltip="Ir para rodapé" accesskey="3">Ir para rodapé [3]</a></li>
        </ul>

        <ul class="controle-direita">
            <li><a onclick="tamanhoFonte(1)" class="funcoes-controle tm-font" data-tooltip="Aumentar fonte"><?= iconeSVG( 'acess-aumentar-fonte.svg' ) ?></a></li>
            <li><a onclick="tamanhoFonte(-1)" class="funcoes-controle tm-font" data-tooltip="Diminur fonte"><?= iconeSVG( 'acess-diminuir-fonte.svg' ) ?></a></li>
            <li><a href="#" class="funcoes-controle" data-tooltip="Alto contraste"><?= iconeSVG( 'acess-alto-contraste.svg' ) ?><span class="text-header">Alto contraste</span></a></li>
            <li><a href="#" class="funcoes-controle" data-tooltip="Acessibilidade"><?= iconeSVG( 'acess-acessibilidade.svg' ) ?><span class="text-header">Acessibilidade</span></a></li>
            <li><a id="google_translate_element" class="funcoes-controle" data-tooltip="Idioma"><?= iconeSVG( 'acess-idioma.svg' ) ?><span id="google_translate_placeholder" class="text-header">Idioma</span></a></li>
        </ul>
    </div>
</div>

<?php
// Google Translate
include_once 'google-translate.php';