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

		/*
		 * Add default posts and comments RSS feed links to head.
		 */
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

		/*
		 * This theme uses wp_nav_menu() in one location.
		 */
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

		/*
		 * Set up the WordPress core custom background feature.
		 */
		add_theme_support( 'custom-background', apply_filters( '_s_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		/*
		 * Add theme support for selective refresh for widgets.
		 */
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


		/*******************************************************************
		 * *****************************************************************
		 * Get setup GUTENBERG theme configuration --> $custom_setup
		 * *****************************************************************
		 ******************************************************************/

		require_once get_template_directory() . '/setup/custom-setup.php';

		/**
		 * Add support for full and wide align
		 */
		add_theme_support( 'align-wide' );

		/**
		 * Enqueuing the editor style --> style-editor.css
		 */
		if( $custom_setup['style-editor'] ) {

			/**
			 * Allow the ability to set custom editor styles with css
			 */
			add_theme_support( 'editor-styles' );

			/**
			 * Set dark editor style ( add before support to editor styles )
			 */
			add_theme_support( 'dark-editor-style' );

			add_editor_style( 'css/style-editor.css' );
		}

		/**
		 * Core blocks enqueued default styles only for editing.
		 * Add this if you’d like to use default styles in your theme.
		 */
		if( $custom_setup['wp-block-styles'] ) {
			add_theme_support( 'wp-block-styles' );
		}

		/**
		 * Set and limit the colors to show into Gutenberg editor
		 */
		if( $custom_setup['set-custom-colors'] ) {
			add_theme_support( 'editor-color-palette', $custom_setup['colors'] );
		}

		/**
		 * Disable the ability to set custom colors
		 */
		if( $custom_setup['disable-custom-colors'] ) {
			add_theme_support( 'disable-custom-colors' );
		}

		/**
		 * Set and limit the fonts sizes to show into Gutenberg editor
		 */
		if( $custom_setup['set-custom-font-sizes'] ) {
			add_theme_support( 'editor-font-sizes', $custom_setup['fonts'] );
		}

		/**
		 * Disable the ability to set custom font sizes
		 */
		if( $custom_setup['disable-custom-font-sizes'] ) {
			add_theme_support( 'disable-custom-font-sizes' );
		}

		/**
		 * Add support for responsive embeds and keep its aspect ratio
		 */
		add_theme_support( 'responsive-embeds' );
	}

endif;