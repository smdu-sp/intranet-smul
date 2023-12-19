<?php
/**
 * GeneratePress.
 *
 * Please do not make any edits to this file. All edits should be done in a child theme.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define('IMGPATH', ABSPATH . 'wp-content/themes/generatepress/assets/img/');
define('CSSPATH', '/wp-content/themes/generatepress/assets/css/');
define('JSPATH', '/wp-content/themes/generatepress/assets/js/');

// Set our theme version.
define( 'GENERATE_VERSION', '3.3.0' );

if ( ! function_exists( 'generate_setup' ) ) {
	add_action( 'after_setup_theme', 'generate_setup' );
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since 0.1
	 */
	function generate_setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'generatepress' );

		// Add theme support for various features.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'status' ) );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style' ) );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );

		$color_palette = generate_get_editor_color_palette();

		if ( ! empty( $color_palette ) ) {
			add_theme_support( 'editor-color-palette', $color_palette );
		}

		add_theme_support(
			'custom-logo',
			array(
				'height' => 70,
				'width' => 350,
				'flex-height' => true,
				'flex-width' => true,
			)
		);

		// Register primary menu.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'generatepress' ),
			)
		);

		/**
		 * Set the content width to something large
		 * We set a more accurate width in generate_smart_content_width()
		 */
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 1200; /* pixels */
		}

		// Add editor styles to the block editor.
		add_theme_support( 'editor-styles' );

		$editor_styles = apply_filters(
			'generate_editor_styles',
			array(
				'assets/css/admin/block-editor.css',
			)
		);

		add_editor_style( $editor_styles );
	}
}

/**
 * Get all necessary theme files
 */
$theme_dir = get_template_directory();

require $theme_dir . '/inc/theme-functions.php';
require $theme_dir . '/inc/defaults.php';
require $theme_dir . '/inc/class-css.php';
require $theme_dir . '/inc/css-output.php';
require $theme_dir . '/inc/general.php';
require $theme_dir . '/inc/customizer.php';
require $theme_dir . '/inc/markup.php';
require $theme_dir . '/inc/typography.php';
require $theme_dir . '/inc/plugin-compat.php';
require $theme_dir . '/inc/block-editor.php';
require $theme_dir . '/inc/class-typography.php';
require $theme_dir . '/inc/class-typography-migration.php';
require $theme_dir . '/inc/class-html-attributes.php';
require $theme_dir . '/inc/class-theme-update.php';
require $theme_dir . '/inc/class-rest.php';
require $theme_dir . '/inc/deprecated.php';

if ( is_admin() ) {
	require $theme_dir . '/inc/meta-box.php';
	require $theme_dir . '/inc/class-dashboard.php';
}

/**
 * Load our theme structure
 */
require $theme_dir . '/inc/structure/archives.php';
require $theme_dir . '/inc/structure/comments.php';
require $theme_dir . '/inc/structure/featured-images.php';
require $theme_dir . '/inc/structure/footer.php';
require $theme_dir . '/inc/structure/header.php';
require $theme_dir . '/inc/structure/navigation.php';
require $theme_dir . '/inc/structure/post-meta.php';
require $theme_dir . '/inc/structure/sidebars.php';
require $theme_dir . '/inc/structure/search-modal.php';

function iconeSVG( $arquivoSVG ) {
	$nomeArquivo = $arquivoSVG;

	if ( str_contains( $arquivoSVG, '/' ) || str_contains( $arquivoSVG, '\\' )) {
		$start = checkSlashPos( $arquivoSVG ) + 1;
		$nomeArquivo = substr( $arquivoSVG, $start);
	}
	
	$arquivo = IMGPATH . $nomeArquivo;
	return file_get_contents( $arquivo );
}

function checkSlashPos( $str ) {
	$pos = strrpos( $str, '/' );

	if ( $pos === false ) {
		$pos = strrpos( $str, '\\' );
	}

	return $pos;
}

add_action( 'wp_enqueue_scripts', 'carregar_scripts', 11 );
add_action( 'wp_enqueue_scripts', 'carregar_estilos', 12 );

function carregar_estilos() {
    wp_enqueue_style( 'default', CSSPATH . 'default.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'header', CSSPATH . 'header.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'home', CSSPATH . 'home.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'acessibilidade', CSSPATH . 'acessibilidade.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'tables', CSSPATH . 'tables.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'formularios', CSSPATH . 'forms.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'loader', CSSPATH . 'loader.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'rodape', CSSPATH . 'rodape.css', array(), '1.0', 'all' );
	
	if ( is_page( 'contatos' ) ) {
		wp_enqueue_style( 'contatos', CSSPATH . 'contatos.css', array(), '1.0', 'all' );
	}
}

function carregar_scripts() {
	// App do Vue
	$host = $_SERVER['HTTP_HOST'];
	if($host === 'localhost') {
		wp_register_script( 'vue-app', 'http://localhost:5173/src/main.js',  array( 'acf-input' ) );
	
		wp_enqueue_script(( 'vue-app' ));
	
		add_filter( 'script_loader_tag', 'script_module', 10, 3 );
	
		function script_module( $tag, $handle, $src ) {
			if ( 'vue-app' === $handle ) {
				$tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
			}
	
			return $tag;
		}
	}
	
	wp_enqueue_script( 'acessibilidade', JSPATH . 'acessibilidade.js');
	wp_enqueue_script( 'pesquisa', JSPATH . 'pesquisa.js');

	if ( is_page( 'contatos' ) ) {
		wp_enqueue_script( 'contatos', JSPATH . 'contatos.js');
	}
}

// Registrar menus
function registrar_menus()
  {
      register_nav_menus(
          array
          (
              'footer-menu' => __( 'Menu do Rodapé' ),
          )
      );
}

add_action( 'init', 'registrar_menus' );

// Excerpt personalizados
function custom_strip_all_tags( $text, $remove_breaks = false ) {
	if ( is_null( $text ) ) {
		return '';
	}

	if ( ! is_scalar( $text ) ) {
		/*
		 * To maintain consistency with pre-PHP 8 error levels,
		 * trigger_error() is used to trigger an E_USER_WARNING,
		 * rather than _doing_it_wrong(), which triggers an E_USER_NOTICE.
		 */
		trigger_error(
			sprintf(
				/* translators: 1: The function name, 2: The argument number, 3: The argument name, 4: The expected type, 5: The provided type. */
				__( 'Warning: %1$s expects parameter %2$s (%3$s) to be a %4$s, %5$s given.' ),
				__FUNCTION__,
				'#1',
				'$text',
				'string',
				gettype( $text )
			),
			E_USER_WARNING
		);

		return '';
	}

	// Preserva tags strong e br desejáveis
	$text = str_replace("<strong><br></strong>", "<br>", $text);
	$text = str_replace("<br>", "\n", $text);
	$text = str_replace("<strong>", "tagstrong", $text);
	$text = str_replace("</strong>", "endtagstrong", $text);
	$text = preg_replace( '@<(script|style)[^>]*?>.*?</\\1>@si', '', $text );
	$text = strip_tags( $text );

	if ( $remove_breaks ) {
		$text = preg_replace( '/[\r\n\t ]+/', ' ', $text );
	}

	// Reverte as tags preservadas
	$text = str_replace("endtagstrong", "</strong>", $text);
	$text = str_replace("tagstrong", "<strong>", $text);
	$text = str_replace("\n", "<br>", $text);
	// Para o resumo após o primeiro item, quando ocorre 2 quebras seguidas
	$text = current( explode( '<br><br>', $text ) );
	// Remove quebras de linha do começo da string
	$text = remove_breaks_from_start( $text );

	return trim( $text );
}

function custom_trim_words( $text, $num_words = 55, $more = null ) {
	if ( null === $more ) {
		$more = __( '&hellip;' );
	}

	$original_text = $text;
	$text          = custom_strip_all_tags( $text );
	$num_words     = (int) $num_words;

	if ( str_starts_with( wp_get_word_count_type(), 'characters' ) && preg_match( '/^utf\-?8$/i', get_option( 'blog_charset' ) ) ) {
		$text = trim( preg_replace( "/[\n\r\t ]+/", ' ', $text ), ' ' );
		preg_match_all( '/./u', $text, $words_array );
		$words_array = array_slice( $words_array[0], 0, $num_words + 1 );
		$sep         = '';
	} else {
		$words_array = preg_split( "/[\n\r\t ]+/", $text, $num_words + 1, PREG_SPLIT_NO_EMPTY );
		$sep         = ' ';
	}

	if ( count( $words_array ) > $num_words ) {
		array_pop( $words_array );
		$text = implode( $sep, $words_array );
		$text = $text . $more;
	} else {
		$text = implode( $sep, $words_array );
	}

	/**
	 * Filters the text content after words have been trimmed.
	 *
	 * @since 3.3.0
	 *
	 * @param string $text          The trimmed text.
	 * @param int    $num_words     The number of words to trim the text to. Default 55.
	 * @param string $more          An optional string to append to the end of the trimmed text, e.g. &hellip;.
	 * @param string $original_text The text before it was trimmed.
	 */
	return apply_filters( 'wp_trim_words', $text, $num_words, $more, $original_text );
}

function remove_breaks_from_start( $text ) {
	if ( strpos( $text, '<br>') === 0 ) {
		$text = substr( $text, 4 );
		return remove_breaks_from_start( $text );
	} else {
		return $text;
	}
}
