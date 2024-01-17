<?php

$metaServices = [];
if ( ! empty( $args['metaServices'] ) ) {
    $metaServices = $args['metaServices'];
}
?>
<?php if(!empty($metaServices)) : ?>
<div class="snap-center other-services" style="background: linear-gradient(180deg, #EFF2FB 0%, #FFF 90.21%), #FFF;">
    <div class="container py-20 lg:py-[100px]">
        <h3
            class="text-center font-default font-semibold text-[28px] leading-[33.6px] lg:text-[40px] lg:leading-[48px] pb-10">
            <?php echo esc_html__( $metaServices['section_title'] ); ?>
        </h3>
        <?php if (!empty($metaServices['services'])) : ?>
        <div class="provided-services-wrapper grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6">
            <?php foreach ($metaServices['services'] as $key => $value) : ?>
            <a target="<?php ($value['detail_service_url']['target']) ? $value['detail_service_url']['target'] : '_self' ; ?>"
                        href="<?php echo esc_html( $value['detail_service_url']['url'] ) ?>"
             class="card-service py-6 px-5 lg:px-6 bg-white rounded-[24px] flex flex-col gap-3 lg:flex-row lg:gap-[15px]  duration-300"
                style="box-shadow: 0px 24px 40px 0px rgba(215, 207, 211, 0.15);" >
                <?php echo wp_get_attachment_image( $value['logo']['ID'], 'original', false, [
                                        'width' => '72px',
                                        'height' => '72px',
                                        'class' => 'card-service-item service-item-logo mb-3',
                                    ] ); ?>
                <div class="item-detail">
                    <h4 class="text-black font-default font-semibold text-[18px] tracking-[0.18px] mb-3 lg:mb-4">
                        <?php echo esc_html__( $value['service_name'] ); ?></h4>
                    <?php if (!empty($value['provide_service'])) :?>
                    <ul class="list-none grid grid-cols-2 gap-x-2 gap-y-3 lg:gap-y-4 lg:w-[315px]">
                        <?php foreach ($value['provide_service'] as $key => $service): ?>
                        <li
                            class="flex gap-[6px] lg:min-w-[132px] font-default text-black  text-[14px] tracking-[0.14px]">
                            <?php get_template_part( 'template-parts/svg/list-style', 'blue' ); ?>
                            <p class="mt-[-5px]">
                          <?php echo esc_html__( $service['item']); ?>
                          </p>  
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>