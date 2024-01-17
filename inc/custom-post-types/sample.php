<?php

/**
   * Post Type: Freebies.
   */
function orely_cpt_freebies() {
  $labels = [
    "name" => __( "Freebies", "orely" ),
    "singular_name" => __( "Freebies", "orely" ),
    "menu_name" => __( "Freebies", "orely" ),
    "all_items" => __( "All Freebies", "orely" ),
    "add_new" => __( "Add Freebies", "orely" ),
    "add_new_item" => __( "Add Freebies", "orely" ),
    "edit_item" => __( "Edit Freebies", "orely" ),
    "new_item" => __( "New Freebies", "orely" ),
    "view_item" => __( "View Freebies", "orely" ),
    "view_items" => __( "View Freebies", "orely" ),
    "search_items" => __( "Search Freebies", "orely" ),
    "not_found" => __( "No Freebies found", "orely" ),
    "not_found_in_trash" => __( "No Freebies found in trash", "orely" ),
    "parent" => __( "Parent Freebies:", "orely" ),
    "featured_image" => __( "Featured image for this Freebies", "orely" ),
    "set_featured_image" => __( "Set featured image for this Freebies", "orely" ),
    "remove_featured_image" => __( "Remove featured image for this Freebies", "orely" ),
    "use_featured_image" => __( "Use as featured image for this Freebies", "orely" ),
    "archives" => __( "Freebies archives", "orely" ),
    "insert_into_item" => __( "Insert into Freebies", "orely" ),
    "uploaded_to_this_item" => __( "Upload to this Freebies", "orely" ),
    "filter_items_list" => __( "Filter Freebies list", "orely" ),
    "items_list_navigation" => __( "Freebies list navigation", "orely" ),
    "items_list" => __( "Freebies list", "orely" ),
    "attributes" => __( "Freebies attributes", "orely" ),
    "name_admin_bar" => __( "Freebies", "orely" ),
    "item_published" => __( "Freebies published", "orely" ),
    "item_published_privately" => __( "Freebies published privately.", "orely" ),
    "item_reverted_to_draft" => __( "Freebies reverted to draft.", "orely" ),
    "item_scheduled" => __( "Freebies scheduled", "orely" ),
    "item_updated" => __( "Freebies updated.", "orely" ),
    "parent_item_colon" => __( "Parent Freebies:", "orely" ),
  ];

  $args = [
    "label" => esc_html__("Freebies", "orely"),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_rest" => true,
    "rest_base" => "",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "delete_with_user" => false,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "can_export" => true,
    "rewrite" => ["slug" => "freebies", "with_front" => true],
    "query_var" => true,
    "menu_icon" => "dashicons-universal-access",
    "supports" => ["title", "editor","thumbnail", "excerpt", "author"],
  ];
  register_post_type("orely-freebies", $args);
}

add_action( 'init', 'orely_cpt_freebies' );

/**
   * Taxonomy: Price Type.
   */
  function orely_freebies_tax_price_type(){
    $labels = [
      'name'                       => __('Pricing Types', 'orely'),
      'singular_name'              => __('Price Type', 'orely'),
      'menu_name'                  => __('Pricing Types', 'orely'),
      'all_items'                  => __('All Pricing Types', 'orely'),
      'edit_item'                  => __('Edit Price Type', 'orely'),
      'view_item'                  => __('View Price Type', 'orely'),
      'update_item'                => __('Update Price Type name', 'orely'),
      'add_new_item'               => __('Add new Price Type', 'orely'),
      'new_item_name'              => __('New Price Type name', 'orely'),
      'parent_item'                => __('Parent Price Type', 'orely'),
      'parent_item_colon'          => __('Parent Price Type:', 'orely'),
      'search_items'               => __('Search Pricing Types', 'orely'),
      'popular_items'              => __('Popular Pricing Types', 'orely'),
      'separate_items_with_commas' => __('Separate Pricing Types with commas', 'orely'),
      'add_or_remove_items'        => __('Add or remove Pricing Types', 'orely'),
      'choose_from_most_used'      => __('Choose from the most used Pricing Types', 'orely'),
      'not_found'                  => __('No Pricing Types found', 'orely'),
      'no_terms'                   => __('No Pricing Types', 'orely'),
      'items_list_navigation'      => __('Pricing Types list navigation', 'orely'),
      'items_list'                 => __('Pricing Types list', 'orely'),
    ];
    $args = [
      'label'                 => __('Pricing Types', 'orely'),
      'labels'                => $labels,
      'public'                => true,
      'publicly_queryable'    => true,
      "has_archive"           => false,
      'hierarchical'          => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'show_in_nav_menus'     => true,
      'query_var'             => true,
      'rewrite'               => ['slug' => 'ofb-pricing-type', 'with_front' => true],
      'show_admin_column'     => true,
      'show_in_rest'          => true,
      'rest_base'             => 'ofb-pricing-type',
      'rest_controller_class' => 'WP_REST_Terms_Controller',
      'show_in_quick_edit'    => true,
    ];
  
    return $args;
  }

/**
   * Taxonomy: Format.
   */
function orely_freebies_tax_format(){
  $labels = [
    'name'                       => __('Formats', 'orely'),
    'singular_name'              => __('Format', 'orely'),
    'menu_name'                  => __('Formats', 'orely'),
    'all_items'                  => __('All Formats', 'orely'),
    'edit_item'                  => __('Edit Format', 'orely'),
    'view_item'                  => __('View Format', 'orely'),
    'update_item'                => __('Update Format name', 'orely'),
    'add_new_item'               => __('Add new Format', 'orely'),
    'new_item_name'              => __('New Format name', 'orely'),
    'parent_item'                => __('Parent Format', 'orely'),
    'parent_item_colon'          => __('Parent Format:', 'orely'),
    'search_items'               => __('Search Formats', 'orely'),
    'popular_items'              => __('Popular Formats', 'orely'),
    'separate_items_with_commas' => __('Separate Formats with commas', 'orely'),
    'add_or_remove_items'        => __('Add or remove Formats', 'orely'),
    'choose_from_most_used'      => __('Choose from the most used Formats', 'orely'),
    'not_found'                  => __('No Formats found', 'orely'),
    'no_terms'                   => __('No Formats', 'orely'),
    'items_list_navigation'      => __('Formats list navigation', 'orely'),
    'items_list'                 => __('Formats list', 'orely'),
  ];
  $args = [
    'label'                 => __('Formats', 'orely'),
    'labels'                => $labels,
    'public'                => true,
    'publicly_queryable'    => true,
    "has_archive"           => false,
    'hierarchical'          => false,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'show_in_nav_menus'     => true,
    'query_var'             => true,
    'rewrite'               => ['slug' => 'ofb-format', 'with_front' => true],
    'show_admin_column'     => true,
    'show_in_rest'          => true,
    'rest_base'             => 'ofb-format',
    'rest_controller_class' => 'WP_REST_Terms_Controller',
    'show_in_quick_edit'    => true,
  ];

  return $args;
}

/**
   * Taxonomy: License.
   */
  function orely_freebies_tax_license(){
    $labels = [
      'name'                       => __('Licenses', 'orely'),
      'singular_name'              => __('License', 'orely'),
      'menu_name'                  => __('Licenses', 'orely'),
      'all_items'                  => __('All Licenses', 'orely'),
      'edit_item'                  => __('Edit License', 'orely'),
      'view_item'                  => __('View License', 'orely'),
      'update_item'                => __('Update License name', 'orely'),
      'add_new_item'               => __('Add new License', 'orely'),
      'new_item_name'              => __('New License name', 'orely'),
      'parent_item'                => __('Parent License', 'orely'),
      'parent_item_colon'          => __('Parent License:', 'orely'),
      'search_items'               => __('Search Licenses', 'orely'),
      'popular_items'              => __('Popular Licenses', 'orely'),
      'separate_items_with_commas' => __('Separate Licenses with commas', 'orely'),
      'add_or_remove_items'        => __('Add or remove Licenses', 'orely'),
      'choose_from_most_used'      => __('Choose from the most used Licenses', 'orely'),
      'not_found'                  => __('No Licenses found', 'orely'),
      'no_terms'                   => __('No Licenses', 'orely'),
      'items_list_navigation'      => __('Licenses list navigation', 'orely'),
      'items_list'                 => __('Licenses list', 'orely'),
    ];
    $args = [
      'label'                 => __('Licenses', 'orely'),
      'labels'                => $labels,
      'public'                => true,
      'publicly_queryable'    => true,
      "has_archive"           => false,
      'hierarchical'          => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'show_in_nav_menus'     => true,
      'query_var'             => true,
      'rewrite'               => ['slug' => 'ofb-license', 'with_front' => true],
      'show_admin_column'     => true,
      'show_in_rest'          => true,
      'rest_base'             => 'ofb-license',
      'rest_controller_class' => 'WP_REST_Terms_Controller',
      'show_in_quick_edit'    => true,
    ];
  
    return $args;
  }

/**
   * Taxonomy: Style.
   */
  function orely_freebies_tax_style(){
    $labels = [
      'name'                       => __('Styles', 'orely'),
      'singular_name'              => __('Style', 'orely'),
      'menu_name'                  => __('Styles', 'orely'),
      'all_items'                  => __('All Styles', 'orely'),
      'edit_item'                  => __('Edit Style', 'orely'),
      'view_item'                  => __('View Style', 'orely'),
      'update_item'                => __('Update Style name', 'orely'),
      'add_new_item'               => __('Add new Style', 'orely'),
      'new_item_name'              => __('New Style name', 'orely'),
      'parent_item'                => __('Parent Style', 'orely'),
      'parent_item_colon'          => __('Parent Style:', 'orely'),
      'search_items'               => __('Search Styles', 'orely'),
      'popular_items'              => __('Popular Styles', 'orely'),
      'separate_items_with_commas' => __('Separate Styles with commas', 'orely'),
      'add_or_remove_items'        => __('Add or remove Styles', 'orely'),
      'choose_from_most_used'      => __('Choose from the most used Styles', 'orely'),
      'not_found'                  => __('No Styles found', 'orely'),
      'no_terms'                   => __('No Styles', 'orely'),
      'items_list_navigation'      => __('Styles list navigation', 'orely'),
      'items_list'                 => __('Styles list', 'orely'),
    ];
    $args = [
      'label'                 => __('Styles', 'orely'),
      'labels'                => $labels,
      'public'                => true,
      'publicly_queryable'    => true,
      "has_archive"           => false,
      'hierarchical'          => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'show_in_nav_menus'     => true,
      'query_var'             => true,
      'rewrite'               => ['slug' => 'ofb-style', 'with_front' => true],
      'show_admin_column'     => true,
      'show_in_rest'          => true,
      'rest_base'             => 'ofb-style',
      'rest_controller_class' => 'WP_REST_Terms_Controller',
      'show_in_quick_edit'    => true,
    ];
  
    return $args;
  }

/**
   * Taxonomy: Topic.
   */
  function orely_freebies_tax_topic(){
    $labels = [
      'name'                       => __('Topics', 'orely'),
      'singular_name'              => __('topic', 'orely'),
      'menu_name'                  => __('Topics', 'orely'),
      'all_items'                  => __('All Topics', 'orely'),
      'edit_item'                  => __('Edit topic', 'orely'),
      'view_item'                  => __('View topic', 'orely'),
      'update_item'                => __('Update topic name', 'orely'),
      'add_new_item'               => __('Add new topic', 'orely'),
      'new_item_name'              => __('New topic name', 'orely'),
      'parent_item'                => __('Parent topic', 'orely'),
      'parent_item_colon'          => __('Parent topic:', 'orely'),
      'search_items'               => __('Search Topics', 'orely'),
      'popular_items'              => __('Popular Topics', 'orely'),
      'separate_items_with_commas' => __('Separate Topics with commas', 'orely'),
      'add_or_remove_items'        => __('Add or remove Topics', 'orely'),
      'choose_from_most_used'      => __('Choose from the most used Topics', 'orely'),
      'not_found'                  => __('No Topics found', 'orely'),
      'no_terms'                   => __('No Topics', 'orely'),
      'items_list_navigation'      => __('Topics list navigation', 'orely'),
      'items_list'                 => __('Topics list', 'orely'),
    ];
    $args = [
      'label'                 => __('Topics', 'orely'),
      'labels'                => $labels,
      'public'                => true,
      'publicly_queryable'    => true,
      "has_archive"           => false,
      'hierarchical'          => false,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'show_in_nav_menus'     => true,
      'query_var'             => true,
      'rewrite'               => ['slug' => 'ofb-topic', 'with_front' => true],
      'show_admin_column'     => true,
      'show_in_rest'          => true,
      'rest_base'             => 'ofb-topic',
      'rest_controller_class' => 'WP_REST_Terms_Controller',
      'show_in_quick_edit'    => true,
    ];
  
    return $args;
  }

add_action('init', function () {
  register_taxonomy('ofb-pricing-type', ['orely-freebies'], orely_freebies_tax_price_type());
  register_taxonomy('ofb-format', ['orely-freebies'], orely_freebies_tax_format());
  register_taxonomy('ofb-license', ['orely-freebies'], orely_freebies_tax_license());
  register_taxonomy('ofb-style', ['orely-freebies'], orely_freebies_tax_style());
  register_taxonomy('ofb-topic', ['orely-freebies'], orely_freebies_tax_topic());
  add_post_type_support( 'orely-freebies', 'post-formats' );
});



