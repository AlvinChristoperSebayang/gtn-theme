<?php

$metaServices = [];
if ( ! empty( $args['metaServices'] ) ) {
    $metaServices = $args['metaServices'];
}
?>
<?php if(!empty($metaServices)) : ?>
<div class="snap-center" style="background: linear-gradient(180deg, #EFF2FB 0%, #FFF 90.21%), #FFF;">
    <div class="container py-20 lg:py-[100px] servicesProvide__wrapper">
        <h3
            class="text-center font-default font-semibold text-[28px] leading-[33.6px] lg:text-[40px] lg:leading-[48px] pb-10 section-title">
            <?php echo esc_html__( $metaServices['section_title'] ); ?>
        </h3>
        <?php if (!empty($metaServices['services'])) : ?>
        <div class="provided-services-wrapper grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-6">
            <?php foreach ($metaServices['services'] as $key => $value) : ?>
            <div class="card-service py-6 px-5 lg:px-6 bg-white rounded-[24px] duration-300"
                style="box-shadow: 0px 24px 40px 0px rgba(215, 207, 211, 0.15);">
                <?php echo wp_get_attachment_image( $value['logo']['ID'], 'original', false, [
                                        'width' => '72px',
                                        'height' => '72px',
                                        'class' => 'card-service-item service-item-logo mb-3',
                                    ] ); ?>
                <h4 class="text-black font-default font-semibold text-[18px] tracking-[0.18px] mb-4">
                    <?php echo esc_html__( $value['service_name'] ); ?></h4>
                <?php if (!empty($value['provide_service'])) :?>
                <ul class="list-none grid grid-cols-2 gap-x-2 gap-y-3 mb-4">
                    <?php foreach ($value['provide_service'] as $key => $service): ?>
                    <li
                        class="flex gap-[6px] lg:min-w-[145px] font-default text-black text-[14px] tracking-[0.14px]">
                        <?php get_template_part( 'template-parts/svg/list-style', 'blue' ); ?>
                      <p class="mt-[-5px]">
                          <?php echo esc_html__( $service['item']); ?>
                          </p>  
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>

                <?php if (!empty($value['detail_service_url'])) : ?>
                <a class="inline-flex items-center gap-1 font-semibold font-default text-[14px] tracking-[0.28px] text-special-brand-colors-blue learn-more-button"
                    target="<?php ($value['detail_service_url']['target']) ? $value['detail_service_url']['target'] : '_self' ; ?>"
                    href="<?php echo esc_html( $value['detail_service_url']['url'] ) ?>" title="<?php echo esc_html__( $value['service_name'] ); ?>">
                    <?php echo esc_html( $value['detail_service_url']['title'] ) ?>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.5 16L12.5 11L7.5 6" stroke="#0F39A6" stroke-width="1.5" stroke-linejoin="round" />
                    </svg>
                </a>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>