<?php ?>
 

<div class="section-title">
        <h2 class="sub-title-home"><?= $titulo ?></h2>
        <div class="linha">
            <span class="decoracao"></span>
        </div>
    </div>
<div>

<a href="<?= $url ?>">
    <div class="conteiner-papoUrbanoo" >
        <div class="exp-img img-galeria imagem-<?= $tipoSecao ?>">
            <img src="<?= $urlImagem ?>" alt="Capa de <?= $titulo ?>">
        </div>
            <div class="conteudo-<?= $tipoSecao ?> article">
                <h3 class="sub-title mais-font menos-font"><?= $subtitulo ?></h3>
                <p class="text mais-font menos-font"><?= $conteudo ?></p>
            </div>
    </div>
</a>