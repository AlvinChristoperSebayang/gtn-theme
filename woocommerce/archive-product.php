<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');

// if (isset($_GET['cat'])) {
//     echo $_GET["cat"];
// }
$product_categories = get_terms(array(
    'taxonomy' => 'product_cat', // Taxonomy untuk kategori produk
    'hide_empty' => false, // Tampilkan kategori yang memiliki produk
));
// pp($product_categories);

if (have_posts()) {
    while (have_posts()) {
        the_post();
        global $product;
        $product_price = $product->get_price();
        $product_regular_price = $product->get_regular_price();
        $discount_percentage = (($product_regular_price - $product_price) / $product_regular_price) * 100;
        $catalog_products[] =[
            'category' => 'Keyboard and mouse',
            'image' => [
                'url' =>get_the_post_thumbnail_url($product->get_id(), 'full'),
                'alt' => get_post_meta(get_post_thumbnail_id($product->get_id()), '_wp_attachment_image_alt', true),
                'title' => get_the_title(get_post_thumbnail_id($product->get_id())),
            ],
            'title' => $product->get_title(),
            'price' => $product_price,
            'price_before_discount' => $product_regular_price,
            'discount' => number_format($discount_percentage, 0) . '%',
            'link' => get_permalink($product->get_id()),
            'status' =>$product->get_stock_status(),
        ];
    }
    wp_reset_postdata();

// pp($catalog_products);  
} else {
    echo 'Tidak ada produk yang ditemukan.';
}
wp_reset_query();
?>
<div id="site-content" class="content-area ttttawjr"><!-- SITE CONTENT START -->
    <article><!-- ARTICLE START -->
        <header><!-- HEADER CONTENT START -->

        </header><!-- HEADER CONTENT END -->

        <?php do_action('before-site-content'); ?>
        <div class="entry-content "><!-- ENTRY CONTENT START -->
     <div id="shop_page">
         <shop-page :categoryproduct="<?php echo parseToVue($product_categories)?>"></shop-page>
     </div>
                <!-- <section class="section_header_page_product__wrapper bg-[#3630621A] lg:pt-28 pb-[77px] w-full flex relative overflow-hidden lg:mb-6">
                    <div class="container flex flex-col gap-[22px] relative">
                        <div class="lg:w-[536px] lg:h-[536px] rounded-full circle-ornament absolute lg:-top-48 lg:-right-32 border border-[#5129A6] opacity-[0.2] z-30"></div>
                        <div class="lg:w-[536px] lg:h-[536px] rounded-full circle-ornament absolute -top-12 left-0 border border-[#5129A6] opacity-[0.2] z-4 0"></div>
                        <h1 class="text-[32px] font-normal leading-10 lg:max-w-[384px]">
                            Our Product
                        </h1>
                        <p class="text-[#202020B2] lg:max-w-[384px]">
                            nostra, per inceptos himenaeos. Praesent auctor purus luctus enim
                            egestas, ac scelerisque ante pulvinar. Donec ut rhoncus ex. Suspendisse
                            ac rhoncus nisl, eu tempor urna. Curabitur vel
                        </p>
                    </div>
            </section>
            <section class="show_product_wrapper w-full flex justify-between container lg:mb-6">
                <form class="relative" action="" >
                    <button type="submit" class="absolute top-1/2 -translate-y-1/2 left-4"> <img class="" src="<?php echo get_stylesheet_directory_uri() . "/resources/images/search.svg" ?>" alt="Search Icon"></button>
                    <input type="text" name="search" value="" class="pl-12 pr-8 rounded-full border border-[#363062]" placeholder="search" />
                </form>
                <div class="filter_product_element">
                    <div class="filter_category px-4 py-3 border border-[#363062] rounded-full">
                        <span class="font-bold text-default">Category</span>
                        <select class="border-none max-w-[45px] p-0">
                            <option value="all" selected>All</option>
                            <option value="keyAndmouse">Keyboard And Mouse</option>
                            <option value="monitor">Monitor</option>
                        </select>
                    </div>
                    <div class="filter_price"></div>
                    <div class="filter_time"></div>
                </div>
            </section>
            <?php if (!empty($catalog_products)) : ?>
                <section class="catalog_products__wrapper grid lg:grid-cols-4 grid-cols-2 lg:gap-6 container lg:mb-12 ">
                <?php foreach ($catalog_products as $key => $item) :?>
                    <?php get_template_part( 'template-parts/components/basic/card', "product",[
                        'card' => $item,
                    ]); ?>
                 <?php endforeach ?>
            </section>
            <section class="pagination_wrapper container flex justify-center lg:gap-4 mb-24">
                <?php 
                echo paginate_links(array(
                    'prev_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none">
                    <path d="M13 9L10 12L13 15" stroke="#2E2953" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>',
                    'next_text' => '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none">
                    <path d="M11 15L14 12L11 9" stroke="#2E2953" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>',
                ));
                ?>
            </section>
            <?php endif; ?> -->
            
        </div><!-- ENTRY CONTENT START -->
        <?php do_action('after-site-content'); ?>
    </article><!-- ARTICLE END -->
</div><!-- SITE CONTENT END -->
<?php
get_footer('shop');
