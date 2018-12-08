<?php
/**
 * File to configure all main options of the theme
 * 
 * @package SumaPressTheme
 */

$custom_setup = [
    'google-fonts'              => 'Noto Serif:400,400italic,700,700italic',
    'font-family'               => '"Noto Serif", serif;',
    'blocks-width'              => 636,
    'blocks-max-width'          => 1100,
    'wp-block-styles'           => true, // Enqueued or not core blocks default styles
    'style-editor'              => false, // Enqueue or not the next option 'styles-files-editor'
    'styles-files-editor'       => ['css/style-editor.css', 'css/blocks.css'],
    'disable-custom-colors'     => true,
    'set-custom-colors'         => true, //Set and limit the colors to show into Gutenberg editor
    'colors'                    => [
        [
            'name'  => esc_html__( 'Strong Blue', 'sumapress-theme' ),
            'slug'  => 'strong-blue',
            'color' => '#0073aa',
        ],
        [
            'name'  => esc_html__( 'Lighter Blue', 'sumapress-theme' ),
            'slug'  => 'lighter-blue',
            'color' => '#229fd8',
        ],
        [
            'name'  => esc_html__( 'Very Light Gray', 'sumapress-theme' ),
            'slug'  => 'very-light-gray',
            'color' => '#eee',
        ],
        [
            'name'  => esc_html__( 'Very Dark Gray', 'sumapress-theme' ),
            'slug'  => 'very-dark-gray',
            'color' => '#444',
        ],
    ],
    'disable-custom-font-sizes' => true,
    'set-custom-font-sizes'     => false, //Set and limit the fonts sizes to show into Gutenberg editor
    'fonts'                     => [
        [
            'name' 		=> esc_html__( 'small', 'sumapress-theme' ),
            'shortName' => esc_html__( 'S', 'sumapress-theme' ),
            'size' 		=> 12,
            'slug' 		=> 'small'
        ],
        [
            'name' 		=> esc_html__( 'regular', 'sumapress-theme' ),
            'shortName' => esc_html__( 'M', 'sumapress-theme' ),
            'size' 		=> 16,
            'slug' 		=> 'regular'
        ],
        [
            'name' 		=> esc_html__( 'large', 'sumapress-theme' ),
            'shortName' => esc_html__( 'L', 'sumapress-theme' ),
            'size' 		=> 36,
            'slug' 		=> 'large'
        ],
        [
            'name' 		=> esc_html__( 'larger', 'sumapress-theme' ),
            'shortName' => esc_html__( 'XL', 'sumapress-theme' ),
            'size' 		=> 50,
            'slug' 		=> 'larger'
        ]
    ]
];