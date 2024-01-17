<?php

if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_theme_options',
        'redirect' => true,
    ]);
    acf_add_options_sub_page([
        'page_title' => 'General Theme Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-settings',
        'parent_slug' => 'theme-general-settings',
    ]);
}

if (function_exists('acf_add_local_field_group')) :

    

endif;

function default_styles()
{

    // Add support for block styles.
    add_theme_support('wp-block-styles');

    // Enqueue editor styles.
    add_editor_style('style.css');
}

add_action('after_setup_theme', 'default_styles');

