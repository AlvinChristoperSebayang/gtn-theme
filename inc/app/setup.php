<?php 
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mcd_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on orely, use a find and replace
		* to change 'orely' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'mcd', get_template_directory() . '/languages' );

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
	register_nav_menus([
        'primary-menu' => 'Primary Menu',
        'secondary-menu' => 'Secondary Menu',
        'third-menu' => 'Third Menu',
    ]);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'orely_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	add_theme_support( 'custom-header', array(
		'default-text-color' => '000',
		'width'              => 1280,
		'height'             => 375,
		'flex-width'         => true,
		'flex-height'        => true,
	));

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 44,
			'width'       => 44,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	add_theme_support( 'align-wide' );
	add_theme_support( 'content-width' , 1200);

	$post_format = array("aside", "gallery", "link", "image", "quote", "status", "video", "audio", "chat");
	add_theme_support( "post-formats", $post_format );
}
add_action( 'after_setup_theme', 'mcd_setup' );


/**
 * 
 * Disable block editor for post type page
 *
 */
function mcd_disable_block_editor_for_page( $use_block_editor, $post_type ) {


    return $use_block_editor;
}
add_filter( 'use_block_editor_for_post', 'mcd_disable_block_editor_for_page', 10, 2 );
add_filter( 'use_block_editor_for_post_type', 'mcd_disable_block_editor_for_page', 10, 2 );

// Theme support 
add_action( 'after_setup_theme', function(){
	add_theme_support( 'post-formats', array( 'link' ) );
  } );
