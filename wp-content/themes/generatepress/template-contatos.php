<?php
/*
Template Name: Contatos
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header('contatos'); ?>

	<div <?php generate_do_attr( 'content' ); ?>>
		<main <?php generate_do_attr( 'main' ); ?>>
			<?php
			/**
			 * generate_before_main_content hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_before_main_content' );

            if ( generate_show_entry_header() ) :
                ?>
                <header <?php generate_do_attr( 'entry-header' ); ?>>
                    <?php
                    /**
                     * generate_before_entry_title hook.
                     *
                     * @since 0.1
                     */
                    do_action( 'generate_before_entry_title' );
    
                    if ( generate_show_title() ) {
                        $params = generate_get_the_title_parameters();
    
                        the_title( $params['before'], $params['after'] );
                    }
    
                    /**
                     * generate_after_entry_title hook.
                     *
                     * @since 0.1
                     *
                     * @hooked generate_post_meta - 10
                     */
                    do_action( 'generate_after_entry_title' );
                    
                        ?>
                </header>
                <?php
            endif;
            
			?>
			
            <?php 
				include_once 'inc/contatos/contatos.php';
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
</body>
