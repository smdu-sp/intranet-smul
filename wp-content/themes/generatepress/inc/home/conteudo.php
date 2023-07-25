<?php ?>

<h2><?= $titulo ?></h2>
<a href="<?= $url ?>">
    <div>
        <div class="imagem-<?= $tipoSecao ?>">
            <img src="<?= $urlImagem ?>" alt="Capa de <?= $titulo ?>">
        </div>
        <div class="conteudo-<?= $tipoSecao ?>">
            <h3><?= $subtitulo ?></h3>
            <p><?= $conteudo ?></p>
        </div>
    </div>
</a>