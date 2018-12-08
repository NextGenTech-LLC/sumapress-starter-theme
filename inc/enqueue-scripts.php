<?php
/**
 * sumapress-theme Theme Enqueue scripts and styles
 *
 * @package SumaPressTheme
 */

add_action( 'wp_enqueue_scripts', 'sumapress_theme_scripts' );
/**
 * Enqueue scripts and styles.
 */
function sumapress_theme_scripts() {

	wp_enqueue_style( 'sumapress-base-style', get_stylesheet_uri(), [], filemtime( get_template_directory() . '/style.css' ) );
	
	wp_enqueue_style( 'sumapress-blocks-style', get_template_directory_uri() . '/css/blocks.css', [], filemtime( get_template_directory() . '/css/blocks.css' ) );
	wp_enqueue_style( 'sumapress-setup-blocks-style', get_template_directory_uri() . '/setup/blocks.css.php', [], filemtime( get_template_directory() . '/setup/blocks.css.php' ) );

	wp_enqueue_style( 'sumapress-theme-fonts', sumapress_theme_fonts_url() );

	wp_enqueue_script( 'sumapress-theme-navigation', get_template_directory_uri() . '/js/navigation.js', [], filemtime( get_template_directory() . '/js/navigation.js' ), true );

	wp_enqueue_script( 'sumapress-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', [], filemtime( get_template_directory() . '/js/skip-link-focus-fix.js' ), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

/**
 * Register Google Fonts
 */
function sumapress_theme_fonts_url() {
	$fonts_url = '';
	include get_template_directory() . '/setup/custom-setup.php';
	/*
	 *Translators: If there are characters in your language that are not
	 * supported by Noto Serif, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$notoserif = esc_html_x( 'on', 'Noto Serif font: on or off', 'sumapress-theme' );

	if ( 'off' !== $notoserif ) {
		$font_families = [];
		$font_families[] = $custom_setup['google-fonts'];

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;

}