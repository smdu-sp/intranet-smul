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
<section #id="secao-<?= "{$tipoSecao}-{$countSecoes[$tipoSecao]}" ?>" class="secao-home">
    <div class="inside-section">
        <?php
            if ( $tipoSecao === 'midia' ) include 'midia.php';
            if ( $tipoSecao === 'noticias' ) include 'noticias.php';
            if ( $tipoSecao === 'comunicados' ) include 'comunicados.php';
            if ( $tipoSecao === 'materia' ) include 'materia.php';
            if ( $tipoSecao === 'galeria' ) include 'galeria.php';
        ?>
    </div>
</section>