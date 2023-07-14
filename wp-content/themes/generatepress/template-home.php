<?php
/*
Template Name: Home
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

	<div <?php generate_do_attr( 'content' ); ?>>
		<main <?php generate_do_attr( 'main' ); ?>>
			<?php
			/**
			 * generate_before_main_content hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_before_main_content' );
            ?>

            <?php 
				include_once 'inc/home/noticias.php';
				include_once 'inc/home/papo-urbano.php';
				include_once 'inc/home/boletim.php';
				include_once 'inc/home/galeria.php';
				include_once 'inc/home/comunicados.php';
			?>

            <?php
			/**
			 * generate_after_main_content hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_after_main_content' );
			?>
		</main>
	</div>

	<?php
	/**
	 * generate_after_primary_content_area hook.
	 *
	 * @since 2.0
	 */
	do_action( 'generate_after_primary_content_area' );

	generate_construct_sidebars();

	get_footer();
?>

<h1>Template</h1>

<style>
    :root {
        font-size: 10px;
    }
</style>