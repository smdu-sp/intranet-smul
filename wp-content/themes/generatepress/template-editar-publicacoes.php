<?php
/*
Template Name: Editar Publicações
*/

$pagePublicacoes = false;

require_once get_stylesheet_directory() . '/publicacoes/publicacao.php';

get_header();

if (have_posts()) : while (have_posts()) : the_post();

    the_content();

    global $wpdb;
    $wpdb->show_errors();

    $tipoDePublicacao = $_GET['tipo'];

    if ( $tipoDePublicacao == 'papo_urbano' || $tipoDePublicacao == 'urbanismo_em_pauta' ) { 
      require_once get_stylesheet_directory() . '/publicacoes/publicacoes.php';
    }
    
    else {
      require_once get_stylesheet_directory() . '/publicacoes/publicacao.php';
    }

    require_once get_stylesheet_directory() . '/modulo-vue.php';

?>

    <div id="apppublicacao">
      <div class="publicacao form-group" :id="tipoDePublicacao == 'publicacoes' ? 'publicacoes' : ''">
        <?php
          require_once get_stylesheet_directory() . '/publicacoes/modal-envio.php';
          require_once get_stylesheet_directory() . '/publicacoes/form-publicacoes.php';
        ?>
      </div>
    </div>

    <script type="application/javascript">
      const tipoDePublicacao = '<?= $tipoDePublicacao ?>';
      const publicacoesRaw = <?= json_encode($queryPublicacoes) ?>;
    </script>
    <script type="text/javascript" src="<?= $jsPath ?>publicacoes.js"></script>
    <script type="text/javascript" src="<?= $jsPath ?>axios.min.js"></script>

<?php

  endwhile;
endif;

get_footer();
