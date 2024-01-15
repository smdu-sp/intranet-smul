<?php 

if ($pagePublicacoes) {
    $dataPublicacao = strtotime($publicacao->data . 'T12:00:00+00:00'); //Data UTC+0
    $dataFormatada = ucfirst($formatoData->format($dataPublicacao));
    $tituloEdicao = 'Edição #' . $numeroDeEdicoes . ': ' . $dataFormatada;
}

?>
<div class="<?= $pagePublicacoes ? 'col-3' : '' ?>">
    <div <?= $pagePublicacoes ? 'class="' . $publicacao->tipo . '"' : ':class="(publicacao.tipo ? publicacao.tipo : \'publicacao\') + \' col-auto\'"' ?>>
        <a href="<?= $pagePublicacoes ? $publicacao->imagem : 'publicacao.imagem' ?>">
            <img <?= $pagePublicacoes ? 'src="' . $publicacao->miniatura .'"' : ':src="publicacao.miniatura ? publicacao.miniatura : \'/assets/capa-publicacao.jpg\'"' ?> alt="Capa da edição"/>
        </a>
        <div class="data-publicacoes">
            <a href="/links-publicacoes?tipo=<?= $tipoPublicacao ?>#edicao-<?= $numeroDeEdicoes ?>">
                <h3><?= $pagePublicacoes ? $tituloEdicao : '{{ publicacao.data }}' ?></h3>
            </a>
        </div>
    </div>
</div>

<?php

$numeroDeEdicoes--;
