<?php ?>

<h2><?= $titulo ?></h2>
<div class="container-<?= $tipoSecao ?>" style="background-image: url('<?= $urlImagem ?>');">
    <div class="conteudo-<?= $tipoSecao ?>">
        <p><?= $conteudo ?></p>
    </div>
    <a class="botao-<?= $tipoSecao ?>" href="<?= $url ?>">
        <div class="botao-<?= $tipoSecao ?>">Ver Mais</div>
    </a>
</div>