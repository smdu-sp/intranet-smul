<?php 

$arraySecao =  $fields[$key];

$titulo = $arraySecao['titulo'];
$urlImagem = $arraySecao['imagem']['url'];
$subtitulo = $arraySecao['subtitulo'];
$conteudo = $arraySecao['texto'];
$url = $arraySecao['url'];
$tipoSecao = $arraySecao['tipo_de_secao'];

if ( ! array_key_exists( $tipoSecao, $countSecoes ) )
{
    $countSecoes[$tipoSecao] = 0;
}

$countSecoes[$tipoSecao]++;

?>
<section #id="secao-<?= "{$tipoSecao}-{$countSecoes[$tipoSecao]}" ?>">
    <div class="inside-article">
        <?php
            if ( $tipoSecao === 'conteudo' ) include 'conteudo.php';
            if ( $tipoSecao === 'galeria' ) include 'galeria.php';
            if ( $tipoSecao === 'comunicados' ) include 'comunicados.php';
        ?>
    </div>
</section>