<?php       
// function get_woocommerce_products($request) {
//     $params = $request->get_params();
//     $page = isset($params['page']) ? absint($params['page']) : 1;
//     $products_per_page = 12;

//     $args = array(
//         'post_type'      => 'product',
//         'posts_per_page' => $products_per_page,
//         'paged'          => $page,
//     );

//     $query = new WP_Query($args);

//     $products = array();

//     while ($query->have_posts()) {
//             if ($query->have_posts()) {
//             $query->the_post();
//             global $product;
//             $product_link = get_permalink($product->get_id());
//             $product_price = (floatval($product->get_price()));
//             $product_regular_price = (floatval($product->get_regular_price()));
//             $discount_percentage = (($product_regular_price - $product_price) / $product_regular_price) * 100;
//             $product_image_url = get_the_post_thumbnail_url($product->get_id(), 'full'); // Thumbnail URL
//             $product_image_alt = get_post_meta(get_post_thumbnail_id($product->get_id()), '_wp_attachment_image_alt', true); // Thumbnail Alt text
//             $product_image_title = get_the_title(get_post_thumbnail_id($product->get_id())); // Thumbnail Title
//             $product_stock_status = $product->get_stock_status();
//             $product_data = array(
//                 'category' => 'Keyboard and mouse',
//                 'image' => [
//                     'url' => $product_image_url,
//                     'alt' => $product_image_alt,
//                     'title' => $product_image_title
//                 ],
//                 'title' => $product->get_title(),
//                 'price' => $product_price,
//                 'price_before_discount' => $product_regular_price,
//                 'discount' => number_format($discount_percentage, 0) . '%',
//                 'link' => $product_link, 
//                 'status' => $product_stock_status
//             );

//             $products[] = $product_data;
//         }
//     }
//     wp_reset_postdata();

//     $total_pages = $query->max_num_pages;
//     $response = array(
//         'products' => $products,
//         'pagination' => array(
//             'total_pages' => $total_pages,
//             'current_page' => $page,
//         ),
//     );

//     return rest_ensure_response($response);
// }
function get_woocommerce_products($request) {
    $page = isset($request['paged']) ? absint($request['paged']) : 1;
    $products_per_page = 12;
    $category = $request['cats'];
    
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => $products_per_page,
        'paged'          => $page,
        'tax_query'      => array(),
    );

    if (!empty($category)) {
        $args['tax_query'][] = array(
            'taxonomy' => 'product_cat',
            'field'    => 'slug',
            'terms'    => $category,
        );
    }

    

    $query = new WP_Query($args);
    // return pp($query);
    
    $products = array();

    while ($query->have_posts()) {
            if ($query->have_posts()) {
            $query->the_post();
            global $product;
            $product_link = get_permalink($product->get_id());
            $product_price = (floatval($product->get_price()));
            $product_regular_price = (floatval($product->get_regular_price()));
            $discount_percentage = (($product_regular_price - $product_price) / $product_regular_price) * 100;
            $product_image_url = get_the_post_thumbnail_url($product->get_id(), 'full'); // Thumbnail URL
            $product_image_alt = get_post_meta(get_post_thumbnail_id($product->get_id()), '_wp_attachment_image_alt', true); // Thumbnail Alt text
            $product_image_title = get_the_title(get_post_thumbnail_id($product->get_id())); // Thumbnail Title
            $product_stock_status = $product->get_stock_status();
            $product_data = array(
                'category' => 'Keyboard and mouse',
                'image' => [
                    'url' => $product_image_url,
                    'alt' => $product_image_alt,
                    'title' => $product_image_title
                ],
                'title' => $product->get_title(),
                'price' => $product_price,
                'price_before_discount' => $product_regular_price,
                'discount' => number_format($discount_percentage, 0) . '%',
                'link' => $product_link, 
                'status' => $product_stock_status
            );

            $products[] = $product_data;
        }
    }

    $total_pages = $query->max_num_pages;
    $current_page = $page;

    $response = array(
        'products' => $products,
        'pagination' => array(
            'total_pages' => $total_pages,
            'current_page' => $current_page,
            'args' => $args,
            'query' => $query,
        ),
    );
    wp_reset_postdata();

    return rest_ensure_response($response);
}

add_action('rest_api_init', function () {
    register_rest_route('woocommerce', '/products', array(
        'methods' => 'POST',
        'callback' => 'get_woocommerce_products',
        'permission_callback' => '__return_true'
    ));
});
