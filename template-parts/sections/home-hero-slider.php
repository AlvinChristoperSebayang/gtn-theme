<?php

$metaHeroSlider = [];
if ( ! empty( $args['metaHeroSlider'] ) ) {
    $metaHeroSlider = $args['metaHeroSlider'];
}

$sliderCount = -1;
if ( ! empty( $args['sliderCount'] ) ) {
    $sliderCount = $args['sliderCount'];
}
?>

<!-- Initial Hero Slider -->
<?php if (!empty($metaHeroSlider)) : ?>
<?php do_action('before-home-slider-init'); ?>
<div class="homepage-hero relative shrink-0 snap-always snap-center">
    <!-- prev button -->
    <div
        class="absolute lg:top-1/2 top-[unset] lg:bottom-[unset] bottom-[22px] lg:left-0 -left-3 -translate-x-[25%] -translate-y-1/2 z-[5] hover:cursor-pointer group button-prev-wrapper">
        <div class="lg:w-60 w-[200px] h-fit bg-transparent relative flex justify-start group button-prev">
            <div
                class="lg:w-[140px] w-[100px] lg:h-[120px] h-[90px] relative bg-transparent overflow-hidden lg:group-hover:w-[170px] group-hover:w-[200px]] duration-500 peer">
                <div
                    class="bg-transparent border-2 border-[#5175E2] rounded-full lg:w-[120px] w-[90px] lg:h-[120px] h-[90px] absolute top-1/2 -translate-y-1/2 left-10 z-20">
                </div>
            </div>
            <div
                class="bg-transparent border-2 border-[#EDEDEF] rounded-full lg:w-[120px] w-[90px] lg:h-[120px] h-[90px] absolute lg:top-[3.75rem] top-[45px] -translate-y-1/2 left-10 z-10">
            </div>
            <div class="cursor-pointer button-content-wrapper absolute top-1/2 lg:left-[95px] left-[85px] transform  -translate-y-1/2 
                            transition-all duration-500 scale-100 hover:scale-110 group-hover:scale-110 peer-hover:scale-110 
                            flex items-center justify-between gap-4 z-10">
                <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6 11L1 6L6 1" stroke="#020B1F" stroke-width="1.5" stroke-linejoin="round" />
                </svg>

                <div class="button-content">
                    <h4
                        class="font-default text-[13px] font-semibold text-black leading-[20px] tracking-[0.26px] whitespace-nowrap">
                        <?php echo $metaHeroSlider[$sliderCount - 1]['identifier']['title'] ?></h4>
                    <p
                        class="font-default text-[12px] font-normal text-[#454B57] leading-[22.8px] tracking-[0.24px] whitespace-nowrap">
                        <?php echo $metaHeroSlider[$sliderCount - 1]['identifier']['descriptions'] ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- next button -->
    <div class="absolute lg:top-1/2 top-[unset] lg:bottom-[unset] bottom-[22px] lg:right-0 -right-3 translate-x-[25%] -translate-y-1/2 z-[5] hover:cursor-pointer group button-next-wrapper">
    <div class="lg:w-60 w-[200px] h-fit bg-transparent relative flex justify-end group button-next">
        <div
            class="lg:w-[140px] w-[100px] lg:h-[120px] h-[90px] relative bg-transparent overflow-hidden lg:group-hover:w-[170px] group-hover:w-[200px] duration-500 peer">
            <div
                class="bg-transparent border-2 border-[#5175E2] rounded-full lg:w-[120px] w-[90px] lg:h-[120px] h-[90px] absolute top-1/2 -translate-y-1/2 right-10 z-20">
            </div>
        </div>
        <div
            class="bg-transparent border-2 border-[#EDEDEF] rounded-full lg:w-[120px] w-[90px] lg:h-[120px] h-[90px] absolute lg:top-[3.75rem] top-[45px]  -translate-y-1/2 right-10 z-10">
        </div>
        <div class="cursor-pointer button-content-wrapper absolute top-1/2 lg:right-[95px] right-[85px] transform -translate-y-1/2 
                            transition-all duration-500 scale-100 peer-hover:scale-110  group-hover:scale-110
                            flex items-center justify-between gap-4 z-10">
            <div class="button-content">
                <h4
                    class="font-default text-[13px] font-semibold text-black leading-[20px] tracking-[0.26px] whitespace-nowrap">
                    <?php echo $metaHeroSlider[$sliderCount - 1] > 1 ? $metaHeroSlider[1]['identifier']['title'] : $metaHeroSlider[$sliderCount - 1]['identifier']['title']  ?>
                </h4>
                </h4>
                <p
                    class="font-default text-[12px] font-normal text-[#454B57] leading-[22.8px] tracking-[0.24px] whitespace-nowrap">
                    <?php echo $metaHeroSlider[$sliderCount - 1] > 1 ? $metaHeroSlider[1]['identifier']['descriptions'] : $metaHeroSlider[$sliderCount - 1]['identifier']['descriptions']  ?>
                </p>
            </div>
            <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="transform rotate-180">
                <path d="M6 11L1 6L6 1" stroke="#020B1F" stroke-width="1.5" stroke-linejoin="round" />
            </svg>
        </div>
    </div>
    </div>

    <div class="slider-hero">
        <?php foreach ($metaHeroSlider as $key => $sliderItem) : ?>
        <?php if ($key < 1): ?>
        <div class="sliding-item relative bg-white"
            data-title="<?php echo $sliderItem['identifier']['title'] ?? 'orely -' . $key; ?>"
            data-descriptions="<?php echo $sliderItem['identifier']['descriptions'] ?? 'orely -' . $key; ?>">
            <div
                class="absolute max-lg:container max-lg:w-full top-[110px] lg:top-[144px] left-1/2 transform -translate-x-1/2 flex flex-col items-center gap-5 lg:max-w-[900px] text-center z-10">
                <h1
                    class="text-black text-center font-default font-semibold text-2xl leading-[1.4] tracking-[-0.16px] lg:text-[56px] lg:leading-[67.2px] lg:tracking-[-0.28px] titleHero">
                    <?php echo esc_html_e($sliderItem['title'], "orely") ?></h1>
                <p
                    class="text-black text-center font-default font-normal leading-[26.6px] tracking-[0.14px] text-[14px] descHero">
                    <?php echo esc_html_e($sliderItem['excerpt'], "orely") ?></p>

                <?php if (!empty($sliderItem['url'])) : ?>
                <div class="flex justify-center text-center buttonHero-wrapper">
                    <a href="<?php echo esc_url( $sliderItem['url']['url'] ); ?>"
                    title="<?php echo $sliderItem['title'] ?>"
                        <?php echo !empty($sliderItem['url']['target'] ? 'target="_blank"' : '');  ?>
                        class="btn btn__primary h-[48px] px-6 text-[16px] leading-[26px] font-medium">
                        <?php get_template_part("template-parts/svg/email") ?>
                        <?php echo esc_html_e($sliderItem['url']['title'], 'orely') ?></a>
                </div>
                <?php endif; ?>
            </div>

            <?php if (!empty($sliderItem['images']['mobile_image'])) : ?>
            <div class="lg:hidden w-full h-full">
                <img src="<?php echo wp_get_attachment_image_url( $sliderItem['images']['mobile_image']['ID'], "orely-hero-mobile" ) ?>"
                    alt="<?php echo $sliderItem['title'] ?>" title="<?php echo $sliderItem['title'] ?>"
                    srcset="<?php echo wp_get_attachment_image_srcset( $sliderItem['images']['mobile_image']['ID'], "orely-hero-mobile" ) ?>"
                    class="imageHero w-full h-[820px] object-cover">
            </div>
            <div class="hidden lg:block w-full h-full">
                <img src="<?php echo wp_get_attachment_image_url( $sliderItem['images']['default_image']['ID'], "full" ) ?>"
                    alt="<?php echo $sliderItem['title'] ?>" title="<?php echo $sliderItem['title'] ?>"
                    srcset="<?php echo  wp_get_attachment_image_srcset( $sliderItem['images']['default_image']['ID'], "full" ) ?>"
                    class="imageHero w-full max-lg:h-[820px] h-[820px] max-w-none object-cover mx-auto">
            </div>
            <?php else: ?>
            <div class="image-wrapper w-full h-full">
                <img src="<?php echo wp_get_attachment_image_url( $sliderItem['images']['default_image']['ID'], "full" ) ?>"
                    alt="<?php echo $sliderItem['title'] ?>" title="<?php echo $sliderItem['title'] ?>"
                    srcset="<?php echo  wp_get_attachment_image_srcset( $sliderItem['images']['default_image']['ID'], "full" ) ?>"
                    class="hidden lg:block imageHero w-full max-lg:h-[820px] h-[820px] max-w-none object-cover mx-auto">
            </div>
            <?php endif; ?>
        </div>
        <?php else: ?>
        <div class="sliding-item bg-white relative"
            data-title="<?php echo $sliderItem['identifier']['title'] ?? 'orely -' . $key; ?>"
            data-descriptions="<?php echo $sliderItem['identifier']['descriptions'] ?? 'orely -' . $key; ?>">
            <div
                class="absolute max-lg:container max-lg:w-full top-[128px] lg:top-[144px] left-1/2 transform -translate-x-1/2 flex flex-col items-center gap-5 max-w-[900px] text-center z-10">
                <h2
                    class="text-black text-center font-default font-semibold text-2xl leading-[1.4] tracking-[-0.16px] lg:text-[48px] lg:leading-[57.6px] lg:tracking-[-0.28px] titleHero">
                    <?php echo esc_html_e($sliderItem['title'], "orely") ?></h2>
                <p
                    class="text-black text-center font-default font-normal leading-[26.6px] tracking-[0.14px] text-[14px] descHero">
                    <?php echo esc_html_e($sliderItem['excerpt'], "orely") ?></p>

                <?php if (!empty($sliderItem['url'])) : ?>
                <div class="justify-center text-center buttonHero-wrapper">
                    <a href="<?php echo esc_url( $sliderItem['url']['url'] ); ?>"
                    title="<?php echo $sliderItem['title'] ?>"
                        <?php echo !empty($sliderItem['url']['target'] ? 'target="_blank"' : '');  ?>
                        class="btn btn__primary h-[52px] px-6 text-[16px] leading-[26px] font-medium">
                        <?php echo esc_html_e($sliderItem['url']['title'], 'orely') ?></a>
                </div>
                <?php endif; ?>
            </div>
            <?php if (!empty($sliderItem['images']['mobile_image'])) : ?>
            <div class="lg:hidden w-full h-full">
                <img src="<?php echo wp_get_attachment_image_url( $sliderItem['images']['mobile_image']['ID'], "orely-hero-mobile" ) ?>"
                    alt="<?php echo $sliderItem['title'] ?>" title="<?php echo $sliderItem['title'] ?>"
                    srcset="<?php echo wp_get_attachment_image_srcset( $sliderItem['images']['mobile_image']['ID'], "orely-hero-mobile" ) ?>"
                    class="imageHero w-full h-[820px] object-cover">
            </div>
            <div class="hidden lg:block w-full h-full">
                <img src="<?php echo wp_get_attachment_image_url( $sliderItem['images']['default_image']['ID'], "full" ) ?>"
                    alt="<?php echo $sliderItem['title'] ?>" title="<?php echo $sliderItem['title'] ?>"
                    srcset="<?php echo  wp_get_attachment_image_srcset( $sliderItem['images']['default_image']['ID'], "full" ) ?>"
                    class="imageHero w-full max-lg:h-[820px] h-[820px] max-w-none object-cover mx-auto">
            </div>
            <?php else: ?>
            <div class="image-wrapper w-full h-full">
                <img src="<?php echo wp_get_attachment_image_url( $sliderItem['images']['default_image']['ID'], "full" ) ?>"
                    alt="<?php echo $sliderItem['title'] ?>" title="<?php echo $sliderItem['title'] ?>"
                    srcset="<?php echo  wp_get_attachment_image_srcset( $sliderItem['images']['default_image']['ID'], "full" ) ?>"
                    class="hidden lg:block imageHero w-full  max-lg:h-[820px] h-[820px]  xl:max-w-1440 2xl:max-w-1920 max-w-none object-cover mx-auto">
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
<?php do_action('after-home-slider-init'); ?>
<?php endif; ?>

<!-- End Hero Slider -->