<?php
/*
Template Name: Publicações
*/

$pagePublicacoes = true;
$formatoData = new IntlDateFormatter(
  'pt-BR',
  IntlDateFormatter::FULL,
  IntlDateFormatter::FULL,
  'America/Sao_Paulo',
  IntlDateFormatter::GREGORIAN,
  'MMMM yyyy'
);
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<?php

get_header();

if (have_posts()) : while (have_posts()) : the_post();

    the_content();

    require_once get_stylesheet_directory() . '/publicacoes/page-publicacoes.php';

  endwhile;
endif;

get_footer();

?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
