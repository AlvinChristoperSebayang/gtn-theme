<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woo.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>

			<?php 
			wc_get_template_part( 'content', 'single-product' ); 
			?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		// do_action( 'woocommerce_after_main_content' );
		global $product;

		if ( is_singular( 'product' ) && ! empty( $product ) ) {
			$related_products = wc_get_related_products( $product->get_id() );
			
			foreach ( $related_products as $related_product_id ) {
			
				$related_product = wc_get_product( $related_product_id );
				if ( $related_product ) {
					$related_product_title = $related_product->get_title();
					$related_product_price = $related_product->get_price();
					$product_price = $related_product->get_price();
					$product_regular_price = $related_product->get_regular_price();
					$discount_percentage = (($product_regular_price - $product_price) / $product_regular_price) * 100;
					$catalog_products[] =[
						'category' => 'Keyboard and mouse',
						'image' => [
							'url' =>get_the_post_thumbnail_url($related_product->get_id(), 'full'),
							'alt' => get_post_meta(get_post_thumbnail_id($related_product->get_id()), '_wp_attachment_image_alt', true),
							'title' => get_the_title(get_post_thumbnail_id($related_product->get_id())),
						],
						'title' => $related_product->get_title(),
						'price' => $product_price,
						'price_before_discount' => $product_regular_price,
						'discount' => number_format($discount_percentage, 0) . '%',
						'link' => get_permalink($product->get_id()),
						'status' =>$related_product->get_stock_status(),
					];	
				}
			}
		}
		
	?>
	<section class="related_product__wrapper flex flex-col gap-6 mt-[100px]">
		<h2 class="text-center">Related product</h2>
		<div class="grid grid-cols-4">
			<?php foreach ($catalog_products as $key => $item) :?>
							<?php get_template_part( 'template-parts/components/basic/card', "product",[
								'card' => $item,
							]); ?>
			   <?php endforeach ?>
		</div>
	</section>
	  

<?php
get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
