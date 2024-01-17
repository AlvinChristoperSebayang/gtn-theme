<?php
get_header();

$title = get_the_title(get_the_ID());

// Applies all registered 
// hooks, shortcodes, filters, etc...
$content = apply_filters(
    'the_content',
    get_the_content(null, false, get_the_ID())
);
 
$args = array(
    'post_type'      => 'product',
    'posts_per_page' => -1,
);

$products = new WP_Query( $args );

if ( $products->have_posts() ) {    
    while ( $products->have_posts() ) {
        $products->the_post();
        global $product;
        $product_link = get_permalink($product->get_id());
        $product_price = $product->get_price();
        $primary_category_id = get_post_meta($product->get_id(), '_yoast_wpseo_primary_product_cat', true);
        $primary_category = '';

        if ($primary_category_id) {
            $primary_category_term = get_term($primary_category_id, 'product_cat');
            if ($primary_category_term && !is_wp_error($primary_category_term)) {
                $primary_category = $primary_category_term->name;
            }
        }
        $product_regular_price = $product->get_regular_price();
        $discount_percentage = (($product_regular_price - $product_price) / $product_regular_price) * 100;
        $product_image_url = get_the_post_thumbnail_url($product->get_id(), 'full'); // Thumbnail URL
        $product_image_alt = get_post_meta(get_post_thumbnail_id($product->get_id()), '_wp_attachment_image_alt', true); // Thumbnail Alt text
        $product_image_title = get_the_title(get_post_thumbnail_id($product->get_id())); // Thumbnail Title
        $catalog_products[] =[
            'category' =>  $primary_category,
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
        ];
    
        $product_tags = wp_get_post_terms($product->get_id(), 'product_tag');
        foreach ($product_tags as $tag) {
            if ($tag->slug === 'best-of-the-month') {
                $product_link = get_permalink($product->get_id());
                $product_price = $product->get_price();
                $product_regular_price = $product->get_regular_price();
               
                $discount_percentage = (($product_regular_price - $product_price) / $product_regular_price) * 100;
                $product_image_url = get_the_post_thumbnail_url($product->get_id(), 'full'); // Thumbnail URL
                $product_image_alt = get_post_meta(get_post_thumbnail_id($product->get_id()), '_wp_attachment_image_alt', true); // Thumbnail Alt text
                $product_image_title = get_the_title(get_post_thumbnail_id($product->get_id())); // Thumbnail Title
                
                $products_ofTheMonth[] =[
                    'category' =>  $primary_category,
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
                ];
                break; 
            }
        }
    }
    wp_reset_postdata(); // Reset query setelah selesai
}

wp_reset_query();
$products_ofTheMonth = array_reverse($products_ofTheMonth);
$this_catalog_products = array_slice($catalog_products, 0, 8);
?>


    <div id="site-content" class="content-area"><!-- SITE CONTENT START -->
        <article><!-- ARTICLE START -->
            <header><!-- HEADER CONTENT START -->

            </header><!-- HEADER CONTENT END -->

			<?php do_action( 'before-site-content' ); ?>
			<div class="entry-content  lg:mt-20 "><!-- ENTRY CONTENT START -->
				<?php echo $content; ?>
               <!-- <section class="xl:h-[781px] flex lg:flex-row flex-col w-full lg:justify-between relative container">
                   
                   <div class="leftSideHero lg:w-1/2 w-full flex flex-col gap-4 lg:items-start items-center lg:mt-[131px] mt-[98px]  pb-[70px]">
                       <h1 class="font-poppins font-bold lg:leading-[58px] leading-[42px] lg:text-[48px] text-[32px] lg:text-left text-center max-w-none lg:max-w-[491px] ">Find Your  <span class="text-default">Gadget</span> with worthy price in market</h1>
                       <p class="max-w-[491px] text-[14px]">nostra, per inceptos himenaeos. Praesent auctor purus luctus enim egestas, ac scelerisque ante pulvinar. Donec ut rhoncus ex. Suspendisse ac rhoncus nisl, eu tempor urna. Curabitur vel</p>
                        <a href="" class="btn__primary btn_product flex gap-1 items-center ico ico__next-icon duration-300 py-[18px]"> <p class="text-white text-[14px]"> Our Product </p> 
                    </a>
                    <div class="flex lg:flex-row flex-col gap-4 mt-auto items-center">
                        <span class="font-poppins text-sm lg:font-bold font-normal ">Or find us in : </span>
                        <div class="flex gap-2">
                            <a href="" class="flex gap-2 items-center lg:px-4 p-3 lg:py-2 rounded-full border border-[#36306233]"><img class="w-4 h-4" src="<?php echo get_stylesheet_directory_uri() . "/resources/images/logo-tokopedia.png" ?>" alt="logo"> <span class="text-[14px] lg:block hidden">Tokopedia</span></a>
                            <a href="" class="flex gap-2 items-center lg:px-4 p-3 lg:py-2 rounded-full border border-[#36306233]"><img class="w-4 h-4" src="<?php echo get_stylesheet_directory_uri() . "/resources/images/logo-shopee.png" ?>" alt="logo"> <span class="text-[14px] lg:block hidden">Shopee</span></a>
                            <a href="" class="flex gap-2 items-center lg:px-4 p-3 lg:py-2 rounded-full border border-[#36306233]"><img class="w-4 h-4" src="<?php echo get_stylesheet_directory_uri() . "/resources/images/logo-whatsapp.png" ?>" alt="logo"> <span class="text-[14px] lg:block hidden">Whatsapp</span></a>
                        </div>
                    </div>
                </div>
                <div class="rightSideHero lg:w-1/2 w-full lg:mt-[76px] relative">
                <div class="lg:w-[689px] w-[440px] h-[440px] lg:h-[689px] rounded-full circle-ornament absolute lg:top-[37%] top-[35%] -translate-y-[50%] lg:-left-[40%] left-0 max-sm:-translate-x-1/2 border border-[#5129A6] opacity-[0.2]"></div>
                    <div class="relative lg:pb-0 pb-12 max-sm:flex max-sm:justify-center">
                        <img class="lg:w-[504px] lg:h-[590.52px] w-[270px] h-[318px]" src="<?php echo get_stylesheet_directory_uri() . "/resources/images/home-hero-boxOrnament.png" ?>" alt="Home Hero Box Ornament">
                        <div class="absolute lg:top-1/2 top-[40%] -translate-y-1/2 lg:-left-0 left-[30px] -translate-x-1/2 lg:p-5 p-2 rounded-[21px] border border-[#CCCCCC33] backdrop-blur-[20px] lg:w-[142px] w-[77px] ">
                            <img src="<?php echo get_stylesheet_directory_uri() . "/resources/images/jam-ornament.png" ?>" alt="jam-ornament">
                        </div>
                        <div class="absolute lg:top-[156px] top-20 -translate-y-1/2 lg:-right-[9%] -right-[40px] -translate-x-1/2 lg:p-5 p-2 rounded-[21px] border border-[#CCCCCC33] backdrop-blur-[20px] lg:w-[142px] w-[77px] ">
                            <img src="<?php echo get_stylesheet_directory_uri() . "/resources/images/headphone-ornament.png" ?>" alt="headphone-ornament">
                        </div>
                    </div>
                    <img class="absolute lg:right-0 right-1/2 max-sm:translate-x-1/2 bottom-0 lg:w-[697px] w-[285px] h-[344px] lg:h-[642px] object-contain  object-left" src="<?php echo get_stylesheet_directory_uri() . "/resources/images/home-hero-person.png" ?>" alt="Home Hero Person">
                    </div>
               </section> -->
               <?php get_template_part( 'template-parts/sections/home-hero', "section",[]); ?>
               <section class="w-full lg:h-[781px] bg-[#3630621A] relative overflow-hidden">
                   <div class="container relative w-full h-full">
                    <div class="relative z-40 w-full h-full flex lg:flex-row flex-col  lg:gap-40 gap-8  py-[58px]">
                        <div class="max-w-[384px] h-full flex flex-col justify-center">
                            <h2 class="text-[32px] font-semibold leading-[42px]">Our best product of the month</h2>
                            <p class="mt-4 description">nostra, per inceptos himenaeos. Praesent auctor purus luctus enim egestas, ac scelerisque ante pulvinar. Donec ut rhoncus ex. Suspendisse ac rhoncus nisl, eu tempor urna. Curabitur vel</p>
                            <a href="" class="btn__primary btn_product flex gap-1 items-center ico ico__next-icon duration-300 py-[18px] w-fit mt-12"> <p class="text-white text-[14px]"> Our Product </p> 
                    </a>
                        </div>
                       <?php 
                        //   $default_data = [
                        //      [
                        //         'category' => 'Keyboard and mouse',
                        //         'title' => 'Apollo 11  with gatheron yellow switch pre-lubed',
                        //         'price' => '$500',
                        //         'price_before_discount' => '$800',
                        //         'discount' => '20'
                        //       ],
                        //       [
                        //         'category' => 'Keyboard and mouse',
                        //         'title' => 'Apollo 11  with gatheron yellow switch pre-lubed',
                        //         'price' => '$500',
                        //         'price_before_discount' => '$800',
                        //         'discount' => '20'
                        //       ],
                        //   ]
                       ?>
                    <div class="flex flex-row gap-6">
                        <?php foreach ($products_ofTheMonth as $key => $item) :?>
                           <?php get_template_part( 'template-parts/components/basic/card', "productOfMonth",[
                            'card' => $item,
                            'indexes' => $key+1
                           ]); ?>
                           <?php endforeach ?>
                    </div>
                    </div>
                    <div class="lg:w-[1020px] lg:h-[1020px] rounded-full circle-ornament absolute top-1/3 -translate-y-[10%] -left-[40%] border border-[#5129A6] opacity-[0.2] z-30"></div>
                    <div class="lg:w-[1020px] lg:h-[1020px] rounded-full circle-ornament absolute -top-0 -translate-y-[30%] -right-[30%] border border-[#5129A6] opacity-[0.2] z-30"></div>
                </div>
               </section>
                <section class="w-full h-full relative bg-white lg:pt-32 pt-10 flex flex-col gap-6 lg:pb-24 pb-10">
                    <div class="container relative grid lg:grid-cols-4 grid-cols-2 gap-6">
                    <?php foreach ($this_catalog_products as $key => $item) :?>
                           <?php get_template_part( 'template-parts/components/basic/card', "product",[
                            'card' => $item,
                           ]); ?>
                           <?php endforeach ?>
                           <div class="lg:w-[689px] w-[440px] h-[440px] lg:h-[689px] z-20 rounded-full circle-ornament absolute lg:-bottom-[45%] bottom-[35%] -translate-y-1/2  lg:-right-[46%] right-0 -translate-x-1/2 border border-[#5129A6] opacity-[0.2]"></div>
                    </div>
                    <div class="container w-full flex justify-end">     
                        <a href="" class="btn__primary btn_product flex gap-1 items-center ico ico__next-icon duration-300 py-[18px] w-fit self-end"> <p class="text-white text-[14px]"> Our Product </p> 
                        </a>
                    </div>
                </section>  
			</div><!-- ENTRY CONTENT START -->
			<?php do_action( 'after-site-content' ); ?>
        </article><!-- ARTICLE END -->
    </div><!-- SITE CONTENT END -->
<?php

get_footer();
