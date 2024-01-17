<?php
add_action('wp_enqueue_scripts', function () {
    $version = md5_file(get_stylesheet_directory() . '/mix-manifest.json');
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    add_action('wp_head', function(){
        echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
        echo '<script rel="preconnect" type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js" crossorigin></script>';
        echo '<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>';

        if (is_front_page()) {
         
        }
    });
    if (is_front_page()) {
        wp_enqueue_style(
            'homepage',
            get_stylesheet_directory_uri() . '/dist/css/homepage.css',
            [],
            $version
        );
    }
    if (is_shop()) {
        wp_enqueue_script(
            'products',
            get_stylesheet_directory_uri() . '/dist/js/pages/products.js',
            [],
            $version,
            true
        );

        wp_enqueue_style(
            'products-css',
            get_stylesheet_directory_uri() . '/dist/css/products-css.css',
            [],
            $version
        );
    }
    if (is_product()) {
        wp_enqueue_script(
            'single-product-js',
            get_stylesheet_directory_uri() . '/dist/js/pages/single-product-js.js',
            [],
            $version,
            true
        );

        wp_enqueue_style(
            'single-products-css',
            get_stylesheet_directory_uri() . '/dist/css/single-products-css.css',
            [],
            $version
        );
    }
    wp_enqueue_style(
        'app',
        get_stylesheet_directory_uri() . '/dist/css/app.css',
        [],
        $version
    );

    wp_enqueue_style(
        'Inter',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap',
        [],
        $version
    );

    wp_enqueue_style(
        'Raleway',
        'https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap',
        [],
        $version
    );

    wp_enqueue_style(
        'Poppins',
        'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap',
        [],
        $version
    );

    wp_enqueue_script(
        'manifest',
        get_stylesheet_directory_uri() . '/dist/js/manifest.js',
        [],
        $version,
        true
    );
    wp_enqueue_script(
        'vendor',
        get_stylesheet_directory_uri() . '/dist/js/vendor.js',
        [],
        $version,
        true
    );
    wp_enqueue_script(
        'app',
        get_stylesheet_directory_uri() . '/dist/js/app.js',
        [],
        $version,
        true
    );


    wp_localize_script('app', 'settings', [
        'ajax_url'      => admin_url( 'admin-ajax.php' ),
        "images" => get_stylesheet_directory_uri() . "/resources/images",
        "endpoint"  => site_url("wp-json"),
        'nonce' => wp_create_nonce('ajax_nonce'),
        'rest_nonce' => wp_create_nonce('wp_rest'),
        'site' => [
            'url' => site_url(),
            'title' => get_bloginfo('name'),
            'description' => get_bloginfo('description'),
        ]
    ]);

    wp_localize_script('products', 'settings', [
        'ajax_url'      => admin_url( 'admin-ajax.php' ),
        "images" => get_stylesheet_directory_uri() . "/resources/images",
        "endpoint"  => site_url("wp-json"),
        'nonce' => wp_create_nonce('ajax_nonce'),
        'rest_nonce' => wp_create_nonce('wp_rest'),
        'site' => [
            'url' => site_url(),
            'title' => get_bloginfo('name'),
            'description' => get_bloginfo('description'),
        ]
    ]);
});



