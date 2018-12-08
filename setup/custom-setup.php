<?php
/**
 * File to configure all main options of the theme
 * 
 * @package SumaPressTheme
 */

$custom_setup = [
    /**
     * Setup external resources
	 */
    'bootstrap'                 => false, //enqueue or not next 'bootstrap_files' from https://getbootstrap.com/ CDN
    'bootstrap_files'           => 
        [ 
            'css'               => 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', 
            'js'                => 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js',
            'bundle'            => 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js'
        ],
    // Uncomments next options about icons to insert assets like for example Fontawesome (choose one or both)
    //'icons-css'                 => 'https://use.fontawesome.com/releases/v5.5.0/css/all.css',
    //'icons-js'                  => 'https://use.fontawesome.com/releases/v5.5.0/js/all.js',
    /**
     * Setup styles
	 */
    'blocks-width'              => 636,
    'blocks-max-width'          => 1100,
    'wp-block-styles'           => true, // Enqueued or not core blocks default styles
    'style-editor'              => false, // Enqueue or not the next option 'styles-files-editor'
    //'styles-files-editor'      => ['css/style-editor.css', 'css/blocks.css'],
    /**
     * Setup colors
	 */
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
    /**
     * Setup fonts
	 */
    'google-fonts'              => 'Noto Serif:400,400italic,700,700italic',
    'font-family'               => '"Noto Serif", serif;', 
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
    ],
    /**
     * Limit where and how work with Gutenberg
	 */ 
    'limit_gutenberg_on_posts'  => false, // set to true to limit Gutenberg base on next option 'gutenfree'
    // Set custom post types to avoid it
    'gutenfree'                 => [ 'page', 'post','post_type_ONE', 'post_type_TWO', 'post_type_THREE' ],
    /**
     * Limit and allowed blocks into a post type
	 * List of core blocks: 'core/block-name'
	 * archives, audio, button, categories, code, column, columns, cover-image, embed, file, freeform,
	 * gallery, heading, html, image, latest-comments, latest-posts, list, more, nextpage, paragraph,
	 * preformatted, pullquote, quote, reusable-block, separator, shortcode, spacer, subhead,
	 * table, text-columns, verse, video
	 */
    'limit_blocks_on_posts'      => false, // set to true to work with next option 'blocks_on_posts'
    'blocks_on_posts'            => [
        'page'         => 
            [
                'core/paragraph',
                'core/image',
                'core/list'
            ],
        'post_type_ONE' => 
            [
                'core/paragraph',
                'core/image',
                'core/list'
            ],
    ],
    /**
	 * Add Gutenberg templates to post types
	 */
    'set_templates_on_posts'     => false, // set to true to work with next option 'template_on_posts'
    /**
	 * Locks adding blocks:            'template_lock' => 'insert'
     * Locks adding and moving blocks: 'template_lock' => 'all'
     * SET FALSE TO NOTHING TO LOCK
	 */
    'template_on_posts'          => [
        // Post type: page
        'page'         => [
            'template_lock' => false, // false, 'insert' or 'all'
            'template'      => [
                [
                    'core/image',
                    [
                        'align' => 'left',
                    ],
                ],
                [
                    'core/paragraph',
                    [
                        'placeholder' => 'The only thing you can add 1',
                    ],
                ],
            ]
        ],
        // Post type: post_type_ONE
        'post_type_ONE'  => [
            'template_lock' => 'insert', // false, 'insert' or 'all'
            'template'      => [
                [
                    'core/image',
                    [
                        'align' => 'right',
                    ],
                ],
                [
                    'core/paragraph',
                    [
                        'placeholder' => 'The only thing you can add 2',
                    ],
                ],
            ]
        ],
        
    ]

];