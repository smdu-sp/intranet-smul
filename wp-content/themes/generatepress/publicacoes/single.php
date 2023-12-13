<?php 

if ($pagePublicacoes) {
    $dataPublicacao = strtotime($publicacao->data_publicacao);
    $dataFormatada = ucfirst($formatoData->format($dataPublicacao));
}

?>
<div class="<?= $pagePublicacoes ? 'col-2' : '' ?>">
    <div <?= $pagePublicacoes ? 'class="' . $publicacao->tipo_publicacao . '"' : ':class="(publicacao.tipo ? publicacao.tipo : \'publicacao\') + \' col-auto\'"' ?>>
        <a href="<?= $pagePublicacoes ? $publicacao->capa_publicacao : 'publicacao.capa_publicacao' ?>">
            <img <?= $pagePublicacoes ? 'src="' . $publicacao->capa_publicacao .'"' : ':src="publicacao.capa_publicacao ? publicacao.capa_publicacao : \'/assets/capa-publicacao.jpg\'"' ?> alt="Capa da edição"/>
        </a>
        <span><strong><?= $pagePublicacoes ? $dataFormatada : '{{ publicacao.data_publicacao }}' ?></strong></span>
        <ul>
            <?php
                foreach ($publicacao->links as $link) { ?>
                    <li>
                        <a href="<?= $link->url ?>"><?= $link->label ?></a>
                    </li>
            <?php } ?>
        </ul>
    </div>
</div>

