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
				include_once 'inc/home/secoes.php';
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
	include_once 'wp-content\themes\generatepress\inc\templates\back-to-top.php';
	get_footer();
	include_once 'wp-content\themes\generatepress\inc\templates\rodape.php';
?>
<html>
	<body class="container-princ">
<div class="container-princ">
<div class="containerr">
<h2 class="title">Secretaria Municipal de <br>	
Urbanismo e Licenciamento</br></h2>
<p>Rua São Bento, 405, Centro - 8º, 17º, 18º, 19°, 20°, 21°<br>
 e 22° andar CEP 01011-100 - São Paulo - SP</br></p>
 <p>Em caso de dúvidas e sugestões, entre em contato pelo email:<br>
<strong>smulsuporte@prefeitura.sp.gov.br</strong></br></p>
<div class="container-list">
</div>
	<h2 class="list">Institucional</h2>
	<ul>
	<li>Acesso Rápido</li>
	<li>Ouvidoria</li>
	<li>Transparência</li>
	<li>Manuais</li>
	<li>Servidores</li>
	<li>Outras secretarias</li>	
	<li>Guia de boas práticas</li>
	</ul>
	</div>
	
	</div>
</html>
</body>