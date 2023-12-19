<?php

global $wpdb;
$tipoPublicacao = $_GET['tipo'];

$publicacoes = $wpdb->get_results($wpdb->prepare(
    "SELECT * FROM publicacoes
    WHERE tipo_publicacao = %s
    ORDER BY data_publicacao DESC;",
    $tipoPublicacao
));

$labelPublicacao = $wpdb->get_var($wpdb->prepare(
    "SELECT tipo_publicacao_label FROM publicacoes_tipos
    WHERE tipo_publicacao = %s;",
    $tipoPublicacao
));

foreach ($publicacoes as $objPublicacao) {
    $links = $wpdb->get_results($wpdb->prepare(
        "SELECT * FROM publicacoes_links
        WHERE id_publicacao = %d",
        $objPublicacao->id
    ));

    $objPublicacao->links = $links;
}

?>

<div id="publicacoes">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="section-title">
                    <h2 class="sub-title-home"><?= $labelPublicacao ?></h2>
                    <div class="linha">
                        <span class="decoracao"></span>
                    </div>
                </div>
                <?php 
                    if (is_user_logged_in()) { ?>
                        <div class="admin">
                            <a href="/evento/?tipo=publicacoes" class="btn btn-primary">Editar</a>
                        </div><?php
                    } 
                ?>
            </div>
        </div>
    </div>
    <div class="container">
        <?php 
            foreach ($publicacoes as $chave=>$publicacao) {
                require "row.php";
            }
        ?>
    </div>
</div>

<style>
.publicacoes {
    margin: 0 10px;
}

.admin .btn {
    font-size: 1.6rem;
    padding: 5px 15px;
    margin: 12px 0;
}

.data-publicacoes h3 {
    font-size: 1.6rem;
    margin: 12px 0;
    font-weight: 700;
}

.links-publicacoes {
    margin: 0;
    list-style: none;
    font-size: 1.4rem;
}
</style>

<?php 
