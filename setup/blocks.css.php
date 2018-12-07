<?php

$absolute_path = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);
$wp_load = $absolute_path[0] . 'wp-load.php';
require_once( $wp_load );

header("Content-type: text/css; charset: UTF-8");
header('Cache-control: must-revalidate');

/**
 * Setup theme
 */
include __DIR__ . '\custom-setup.php';

?>
/*--------------------------------------------------------------
# Set custom color palette
--------------------------------------------------------------*/

<?php 
if ( $custom_setup['set-custom-colors'] ) :
foreach ( $custom_setup['colors'] as $color ) : ?>
.has-<?php echo esc_html( $color['slug'] ); ?>-color {
  color: <?php echo esc_html( $color['color'] ); ?>;
}

.has-<?php echo esc_html( $color['slug'] ); ?>-background-color {
  background-color: <?php echo esc_html( $color['color'] ); ?>;
}

<?php endforeach; endif; ?>

/*--------------------------------------------------------------
# Set custom font size
--------------------------------------------------------------*/

<?php 
if ( $custom_setup['set-custom-font-sizes'] ) :
foreach ( $custom_setup['fonts'] as $font ) : ?>
.has-<?php echo esc_html( $font['slug'] ); ?>-font-size {
  font-size: <?php echo (int) $font['size']; ?>px;
}

<?php endforeach; endif; ?>
/*--------------------------------------------------------------
# Set custom blocks styles
--------------------------------------------------------------*/
.entry-content > * {
  max-width: <?php echo (int) $custom_setup['blocks-width']; ?>px;
}

.entry-content > .alignwide {
  max-width: <?php echo (int) $custom_setup['blocks-max-width']; ?>px;
}

.entry-content ul,
.entry-content ol {
  max-width: <?php echo (int) $custom_setup['blocks-width']; ?>px;
}

.wp-block-video video {
  max-width: <?php echo (int) $custom_setup['blocks-width']; ?>px;
}