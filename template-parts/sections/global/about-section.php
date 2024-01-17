<?php 

$defaultImgaeOrnament = get_stylesheet_directory_uri() . "/resources/images/about-section-ornament.png";
$attacmentMediaID = 1294;
$attacmentMediaUrl = wp_get_attachment_image_url( $attacmentMediaID, 'full' ) ?? $defaultImgaeOrnament;

$defaultImgaeOrnamentMobile = get_stylesheet_directory_uri() . "/resources/images/about-section-about-section-mobile.png";
$attacmentMediaMobileID = 1182;
$attacmentMediaMobileUrl = wp_get_attachment_image_url( $attacmentMediaMobileID, 'full' ) ?? $defaultImgaeOrnamentMobile;
?>

<div class="pt-20 lg:pt-[100px] discover-us-mind-wrapper snap-start">
    <div class="max-xl:container xl:max-w-[1200px] mx-auto flex flex-col gap-8 xl:gap-10 items-center">
        <h2
            class="hidden md:block font-default font-semibold text-center text-black text-[26px] leading-[36.4px]  lg:text-[32px] lg:leading-[44.8px] section-title">
            We are highly passionate about crafting digital products that </br>
            resonate with your goals. We help companies and </br> businesses grow and seize opportunities.
        </h2>

        <h2
            class="md:hidden font-default font-semibold text-center text-black text-[26px] leading-[36.4px]  lg:text-[32px] lg:leading-[44.8px] section-title">
            We are highly passionate about crafting digital products that resonate with your goals. We help companies
            and businesses grow and seize opportunities.
        </h2>

        <div
            class="container mx-auto flex flex-col lg:flex-row lg:justify-center gap-8 lg:gap-10 discover-mind-wrapper">
            <div class="flex flex-col lg:w-[200px] items-center lg:gap-2 gap-[8px]">
                <p
                    class="font-default text-center font-semibold text-[#7A47A3] text-[40px] leading-[48px] tracking-[-0.2px] lg:text-[56px] lg:leading-[67.2px]">
                    <span id="satisfied"
                        class="font-default text-center font-semibold text-[#7A47A3] text-[40px] leading-[48px] tracking-[-0.2px] lg:text-[56px] lg:leading-[67.2px]"
                        data-number="80">0</span>+</p>
                <p
                    class="font-default text-center font-normal text-black text-[14px] leading-[25.2px] tracking-[0.14px]">
                    Satisfied clients</p>
            </div>
            <div class="flex flex-col lg:w-[200px] items-center lg:gap-2 gap-[12px]">
                <p
                    class="font-default text-center font-semibold text-[#7A47A3] text-[40px] leading-[48px] tracking-[-0.2px] lg:text-[56px] lg:leading-[67.2px]">
                    <span id="years"
                        class="font-default text-center font-semibold text-[#7A47A3] text-[40px] leading-[48px] tracking-[-0.2px] lg:text-[56px] lg:leading-[67.2px]"
                        data-number="4">0</span>y+</p>
                <p
                    class="font-default text-center font-normal text-black text-[14px] leading-[25.2px] tracking-[0.14px]">
                    In the business</p>
            </div>
            <div class="flex flex-col lg:w-[200px] items-center lg:gap-2 gap-[12px]">
                <p
                    class="font-default text-center font-semibold text-[#7A47A3] text-[40px] leading-[48px] tracking-[-0.2px] lg:text-[56px] lg:leading-[67.2px]">
                    <span id="executed" class="font-default text-center font-semibold text-[#7A47A3] text-[40px] leading-[48px] tracking-[-0.2px] lg:text-[56px] lg:leading-[67.2px]"
                        data-number="150">0</span>+</p>
                <p
                    class="font-default text-center font-normal text-black text-[14px] leading-[25.2px] tracking-[0.14px]">
                    Projects executed</p>
            </div>
        </div>
    </div>


    <div class="flex justify-center lg:pt-[73px] pt-[32px]">
        <a href="<?php echo esc_url( home_url( '/about' )) ?>"
            class="btn btn__tertiary h-[48px] py-0 px-6 lg:text-[16px] flex items-center justify-center font-medium lg:leading-[24px]">View
            More</a>
    </div>


    <div class="xl:max-w-[980px] mx-auto relative">
        <div class="w-[108px] h-[120px] absolute top-0 -left-2 z-10"
            style="background: linear-gradient(90deg, #FFF 0%, rgba(255, 255, 255, 0.00) 100%);"></div>
        <div id="clients" class="sliding_clients w-full flex items-center lg:mt-16 mt-10 relative justify-center">
            <div class="slider-item h-[120px] w-[216px] flex justify-center items-center border border-[#EDEDEF]">
                <img loading="lazy" class="w-auto h-full max-h-[48px] object-contain"
                    src="<?php echo get_stylesheet_directory_uri() . "/resources/images/01.png" ?>" alt="slider"
                    title="slider">
            </div>
            <div class="slider-item h-[120px] w-[216px] flex justify-center items-center border border-[#EDEDEF]">
                <img loading="lazy" class="w-auto h-full max-h-[48px] object-contain"
                    src="<?php echo get_stylesheet_directory_uri() . "/resources/images/02.png" ?>" alt="slider"
                    title="slider">
            </div>
            <div class="slider-item h-[120px] w-[216px] flex justify-center items-center border border-[#EDEDEF]">
                <img loading="lazy" class="w-auto h-full max-h-[48px] object-contain"
                    src="<?php echo get_stylesheet_directory_uri() . "/resources/images/03.png" ?>" alt="slider"
                    title="slider">
            </div>
            <div class="slider-item h-[120px] w-[216px] flex justify-center items-center border border-[#EDEDEF]">
                <img loading="lazy" class="w-auto h-full max-h-[48px] object-contain"
                    src="<?php echo get_stylesheet_directory_uri() . "/resources/images/04.png" ?>" alt="slider"
                    title="slider">
            </div>
            <div class="slider-item h-[120px] w-[216px] flex justify-center items-center border border-[#EDEDEF]">
                <img loading="lazy" class="w-auto h-full max-h-[48px] object-contain"
                    src="<?php echo get_stylesheet_directory_uri() . "/resources/images/05.png" ?>" alt="slider"
                    title="slider">
            </div>
            <!--  -->
            <div class="slider-item h-[120px] w-[216px] flex justify-center items-center border border-[#EDEDEF]">
                <img loading="lazy" class="w-auto h-full max-h-[48px] object-contain"
                    src="<?php echo get_stylesheet_directory_uri() . "/resources/images/01.png" ?>" alt="slider"
                    title="slider">
            </div>
            <div class="slider-item h-[120px] w-[216px] flex justify-center items-center border border-[#EDEDEF]">
                <img loading="lazy" class="w-auto h-full max-h-[48px] object-contain"
                    src="<?php echo get_stylesheet_directory_uri() . "/resources/images/02.png" ?>" alt="slider"
                    title="slider">
            </div>
            <div class="slider-item h-[120px] w-[216px] flex justify-center items-center border border-[#EDEDEF]">
                <img loading="lazy" class="w-auto h-full max-h-[48px] object-contain"
                    src="<?php echo get_stylesheet_directory_uri() . "/resources/images/03.png" ?>" alt="slider"
                    title="slider">
            </div>
            <div class="slider-item h-[120px] w-[216px] flex justify-center items-center border border-[#EDEDEF]">
                <img loading="lazy" class="w-auto h-full max-h-[48px] object-contain"
                    src="<?php echo get_stylesheet_directory_uri() . "/resources/images/04.png" ?>" alt="slider"
                    title="slider">
            </div>
            <div class="slider-item h-[120px] w-[216px] flex justify-center items-center border border-[#EDEDEF]">
                <img loading="lazy" class="w-auto h-full max-h-[48px] object-contain"
                    src="<?php echo get_stylesheet_directory_uri() . "/resources/images/05.png" ?>" alt="slider"
                    title="slider">
            </div>
        </div>
        <div class="w-[108px] h-[120px] absolute top-0 -right-2 z-10"
            style="background: linear-gradient(90deg, rgba(255, 255, 255, 0.00) 0%, #FFF 100%);"></div>
    </div>
    <div class=" flex justify-center pt-8 lg:pt-24 ">
        <img class="hidden md:block w-full h-full object-cover img-illustrator"
            src="<?php echo !empty($attacmentMediaUrl) ? $attacmentMediaUrl : $defaultImgaeOrnament ?>"
            <?php echo !empty($attacmentMediaUrl) ? 'srcset="' .wp_get_attachment_image_srcset( $attacmentMediaID, 'orely-1920' ) . '"' : '' ?>
            alt="Orely Design Studio | About" title="Orely Design Studio | About">
        
        <img class="md:hidden w-full h-full object-cover"
            src="<?php echo !empty($attacmentMediaMobileUrl) ? $attacmentMediaMobileUrl : $defaultImgaeOrnamentMobile ?>"
            <?php echo !empty($attacmentMediaMobileUrl) ? 'srcset="' .wp_get_attachment_image_srcset( $attacmentMediaID, 'original' ) . '"' : '' ?>
            alt="Orely Design Studio | About" title="Orely Design Studio | About">
    </div>
</div>


<?php add_action("wp_footer", function () {
?>
<script>
    $(document).ready(function () {
        $('.sliding_clients').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 0,
            speed: 5000,
            infinite: true,
            pauseOnHover: false,
            cssEase: 'linear',
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 1,
                    centerMode: true,
                }
            }]
        });
    });
</script>
<?php
}, 10); ?>