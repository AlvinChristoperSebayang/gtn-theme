<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<div class="single_product_price flex gap-4 items-center">
	<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> text-black text-[32px] font-bold"><?php echo $product->get_price() ?></p>
	<p class="regular_<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?> text-[#20202080] text-[24px] line-through"><?php echo $product->get_regular_price(); ?></p>
</div>
