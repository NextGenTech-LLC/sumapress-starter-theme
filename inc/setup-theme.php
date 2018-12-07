<?php
/**
 * sumapress-theme Setup Theme
 *
 * @package SumaPressTheme
 */

add_action( 'after_setup_theme', 'sumapress_theme_content_width', 0 );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sumapress_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sumapress_theme_content_width', 640 );
}

add_action( 'after_setup_theme', 'sumapress_theme_setup' );
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
if ( ! function_exists( 'sumapress_theme_setup' ) ) :

	function sumapress_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on sumapress-theme, use a find and replace
		 * to change 'sumapress-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'sumapress-theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'sumapress-theme' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( '_s_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/**
		 * Add support for full and wide align
		 */
		add_theme_support( 'align-wide' );

		/**
		 * Allow the ability to set custom editor styles with css
		 */
		add_theme_support( 'editor-styles' );

		/**
		 * Set dark editor style ( add before support to editor styles )
		 */
		add_theme_support( 'dark-editor-style' );

		/**
		 * Enqueuing the editor style
		 */
		//add_editor_style( 'css/style-editor.css' );

		/**
		 * Core blocks enqueued default styles only for editing.
		 * Add this if you’d like to use default styles in your theme.
		 */
		add_theme_support( 'wp-block-styles' );

		/**
		 * Set and limit the colors to show into Gutenberg editor
		 */
		$custom_colors = array(
			array(
				'name'  => __( 'Strong Blue', 'sumapress-theme' ),
				'slug'  => 'strong-blue',
				'color' => '#0073aa',
			),
			array(
				'name'  => __( 'Lighter Blue', 'sumapress-theme' ),
				'slug'  => 'lighter-blue',
				'color' => '#229fd8',
			),
			array(
				'name'  => __( 'Very Light Gray', 'sumapress-theme' ),
				'slug'  => 'very-light-gray',
				'color' => '#eee',
			),
			array(
				'name'  => __( 'Very Dark Gray', 'sumapress-theme' ),
				'slug'  => 'very-dark-gray',
				'color' => '#444',
			),
		);
		add_theme_support( 'editor-color-palette', $custom_colors );

		/**
		 * Disable the ability to set custom colors
		 */
		add_theme_support( 'disable-custom-colors' );

		/**
		 * Set and limit the fonts sizes to show into Gutenberg editor
		 */
		$custom_fonts = array(
			array(
				'name' 		=> esc_html__( 'small', 'sumapress' ),
				'shortName' => esc_html__( 'S', 'sumapress' ),
				'size' 		=> 12,
				'slug' 		=> 'small'
			),
			array(
				'name' 		=> esc_html__( 'regular', 'sumapress' ),
				'shortName' => esc_html__( 'M', 'sumapress' ),
				'size' 		=> 16,
				'slug' 		=> 'regular'
			),
			array(
				'name' 		=> esc_html__( 'large', 'sumapress' ),
				'shortName' => esc_html__( 'L', 'sumapress' ),
				'size' 		=> 36,
				'slug' 		=> 'large'
			),
			array(
				'name' 		=> esc_html__( 'larger', 'sumapress' ),
				'shortName' => esc_html__( 'XL', 'sumapress' ),
				'size' 		=> 50,
				'slug' 		=> 'larger'
			)
		);
		add_theme_support( 'editor-font-sizes', $custom_fonts );

		/**
		 * Disable the ability to set custom font sizes
		 */
		add_theme_support( 'disable-custom-font-sizes' );

		/**
		 * Add support for responsive embeds and keep its aspect ratio
		 */
		add_theme_support( 'responsive-embeds' );
	}
	
endif;