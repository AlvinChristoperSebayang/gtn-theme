<?php

/**
 * csh functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package orely
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

if (!defined('_RESOURCES_ASSETS_URI')) {
    define('_RESOURCES_ASSETS_URI',get_stylesheet_directory_uri() . '/resources');
}

/**
 * Enqueue scripts and custom.
 */
require get_template_directory() . '/inc/walker.php'; 
require get_template_directory() . '/inc/app/setup.php';
require get_template_directory() . '/inc/app/helpers.php';
require get_template_directory() . '/inc/app/custom-helpers.php';
require get_template_directory() . '/inc/app/rest-endpoints.php';
require get_template_directory() . '/inc/app/enqueue-scripts-styles.php';

require get_template_directory() . '/inc/app/theme-settings.php';

/**
 * Register acf block
 */


/**
 * Disable EMOJIs
 */
require get_template_directory() . '/inc/disable-emojis.php';

/**
 * Disable Comments
 */
require get_template_directory() . '/inc/disable-comments.php';

/**
 * Enable SVG
 */
require get_template_directory() . '/inc/enable-svg.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

require get_template_directory() . '/inc/app/custom-hook.php';



function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 150,
		'single_image_width'    => 300,
        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
	) );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


add_action( 'pre_get_posts', 'custom_modify_query' );
function custom_modify_query( $query ) {
    if ( ! is_admin() && $query->is_main_query() && is_post_type_archive( 'product' ) ) {
        $query->set( 'posts_per_page', 12 );     
    }   
}
