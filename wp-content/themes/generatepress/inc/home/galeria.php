<?php ?>

<h2><?= $titulo ?></h2>
<div>
    <div class="imagem-<?= $tipoSecao ?>">
        <img src="<?= $urlImagem ?>" alt="Capa de <?= $titulo ?>">
    </div>
    <div class="conteudo-<?= $tipoSecao ?>">
        <p><?= $conteudo ?></p>
    </div>
    <a class="botao-<?= $tipoSecao ?>" href="<?= $url ?>">
        <div class="botao-<?= $tipoSecao ?>">Ver Mais</div>
    </a>
</div>