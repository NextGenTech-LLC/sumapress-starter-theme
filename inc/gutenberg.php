<?php
/**
 * sumapress-theme Gutenberg setup
 *
 * @package SumaPressTheme
 */

add_action( 'current_screen', 'sumapress_gutenberg_removal' );
/**
 * Limit where you can work with Gutenberg
 * base on /setup/custom-setup.php --> 'gutenfree'
 */
function sumapress_gutenberg_removal() {

	// WP 5.0+ requires Classic Editor & WP 4.9- requires Gutenberg
	if ( ( version_compare( get_bloginfo( 'version' ), 5.0, '<=' ) && ! is_plugin_active( 'gutenberg/gutenberg.php' ) ) || ( version_compare( get_bloginfo( 'version' ), 5.0, '=>' ) && ! is_plugin_active( 'classic-editor/classic-editor.php' ) ) ) {
		return;
	}

	include get_template_directory() . '/setup/custom-setup.php';

	$current_screen    = get_current_screen();
	$current_post_type = $current_screen->post_type;

	if ( $custom_setup['limit_gutenberg_on_posts'] && in_array( $current_post_type, $custom_setup['gutenfree'], true ) ) {
		add_filter( 'use_block_editor_for_post_type', '__return_false', 100 );
	}

}

add_action( 'allowed_block_types', 'sumapress_allowed_blocks_to_post_types', 10 , 2 );
/**
 * Limit and allowed blocks into a post type
 * base on /setup/custom-setup.php --> 'blocks_on_posts' 
 */
function sumapress_allowed_blocks_to_post_types( $allowed_block_types, $post ) {

	include get_template_directory() . '/setup/custom-setup.php';

	if ( $custom_setup['limit_blocks_on_posts'] && array_key_exists( $post->post_type, $custom_setup['blocks_on_posts'] ) ){
		return $custom_setup['blocks_on_posts'][ $post->post_type ];
	}

	return $allowed_block_types;

}

add_action( 'register_post_type_args', 'sumapress_add_templates_to_post_types', 10 , 2 );
/**
 * Add Gutenberg templates to post types
 */
function sumapress_add_templates_to_post_types( $args, $post_type ) {

	include get_template_directory() . '/setup/custom-setup.php';

	$data = $custom_setup['template_on_posts'];

	if ( $custom_setup['set_templates_on_posts'] && array_key_exists( $post_type, $data ) ){

		if ( $data[ $post_type ]['template_lock'] ) {
			$args['template_lock'] = $data[ $post_type ]['template_lock'];
		}

		$args['template'] = $data[ $post_type ]['template'];

	}

	return $args;

}