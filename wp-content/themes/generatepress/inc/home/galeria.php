<?php ?>

<div class="section-title">
        <h2 class="sub-title-home"><?= $titulo ?></h2>
        <div class="linha">
            <span class="decoracao"></span>
        </div>
    </div>
<div>

<div class="exp-img-cheio img-galeria imagem-<?= $tipoSecao ?>">
    <a  class="botao-<?= $tipoSecao ?> section-bnt" href="<?= $url ?>">
        <img src="<?= $urlImagem ?>" alt="Capa de <?= $titulo ?>">
    </a>
</div>
    <div class="conteudo-<?= $tipoSecao ?> ">
        <p class="text"><?= $conteudo ?></p>
    </div>
    <a  class="botao-<?= $tipoSecao ?> section-bnt" href="<?= $url ?>">
        <div class="botao-<?= $tipoSecao ?> button-home1">Ver Mais</div>
    </a>
</div>