<?php

/**
 * Custom Section Title Template.
 *
 * @param   array $args The block settings and attributes.
 */
global $post;

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

$testimonials = [];
$testimonials = new WP_Query(array(
    'post_type' => 'orely_testimonial',
    'post_status' => 'publish',
    'posts_per_page'=>6,
    'order'=>'DESC',
    'orderby'=>'ID',
)); 

// Create class attribute allowing for custom "className" and "align" values.

?>
<!-- Init Testimonial -->

<?php  if (!empty($testimonials->posts)) : ?>
<div class="bg-[#EBEAFF] testimonilas-wrapper pt-20 pb-20 lg:pt-[200px] lg:pb-[100px] snap-center">
    <div class="testimonial-slider">
        <?php foreach ($testimonials->posts as $key => $value) : ?>
        <?php
                            $testimonialMeta = get_fields($value);
                        ?>
        <div class="relative testimonial-item">
            <div class="container lg:pb-10  lg:orely-screen lg:orely-screen__default testimonial-header">
                <?php get_template_part( 'template-parts/svg/quote', 'blue' ); ?>
                <div class="testimonial-content max-lg:min-h-[336px] max-lg:flex max-lg:items-center desc-testi xl:w-[1080px]">
                    <?php echo  $testimonialMeta['orely_testimonial_meta_data']['content'] ; ?>
                </div>
            </div>

            <div class="flex gap-4 lg:gap-5 justify-center pb-10 orely-screen orely-screen__default testimonial-person">
                <img src="<?php echo get_the_post_thumbnail_url( $value->ID, 'original' ); ?>"
                    alt="<?php echo  get_the_title( $value->ID ) . ' - ' . $testimonialMeta['orely_testimonial_meta_data']['company'] ; ?>"
                    title="<?php echo 'Testimonial from - ' . get_the_title( $value->ID ) ; ?>" width="80px"
                    height="80px" class="w-20 h-20 rounded-full overflow-hidden testimonial-picture">
                <div class=" flex flex-col gap-[6px] lg:gap-1 person-info">
                    <h4
                        class="font-default font-medium lg:text-[20px] lg:leading-[30px] lg:tracking-[0.2px] text-[14px] leading-normal tracking-[0.14px] text-black person-info__name">
                        <?php echo get_the_title( $value->ID ) ?></h4>
                    <p
                        class="font-defaul font-normal text-[13px] leading-normal lg:text-[14px] lg:leading-[22px] text-black person-info__positions">
                        <?php echo esc_html(  $testimonialMeta['orely_testimonial_meta_data']['company'] ); ?>
                    </p>
                    <p
                        class="font-defaul font-medium text-[12px] leading-normal tracking-[0.12px] lg:text-[13px] lg:tracking-[0.13px] text-primary person-info__company">
                        <?php echo esc_html(  $testimonialMeta['orely_testimonial_meta_data']['positions'] ); ?>
                    </p>
                </div>
            </div>

            <div class="pb-8 lg:pb-10 flex items-center justify-center testimonial-company">
                <img src="<?php echo $testimonialMeta['orely_testimonial_meta_data']['company_logo']['url']; ?>"
                    alt="<?php echo  $testimonialMeta['orely_testimonial_meta_data']['company'] ; ?>"
                    title="<?php echo 'Testimonial from - ' . $testimonialMeta['orely_testimonial_meta_data']['company']; ?>"
                    class="h-[40px] mx-auto lg:max-w-[192px] max-w-[162px] object-contain">
            </div>

        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php do_action('after-testimonial-init'); ?>
<?php endif; ?>
<!-- End Testimonial -->