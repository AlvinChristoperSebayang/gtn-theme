<?php ?>

<div class="py-20 lg:py-[100px] discover-us-on-dribbble-wrapper snap-start "
    style="background: linear-gradient(180deg, #FFF3FA 0%, #FFF8F4 100%);">
    <div class="flex flex-col gap-[36px] lg:gap-[51px] items-center">
        <div class="container mx-auto flex flex-col gap-[18px] lg:gap-4  items-center w-full">
            <h2 class="font-default font-semibold text-black text-center text-[28px] leading-[33.6px] lg:text-[40px] lg:leading-[56px] section-title opacity-0">Discover Us on Dribbble</h2>
            <div class="custom-title-desc text-center">
                <p class="font-default text-center font-normal text-[#454B57] text-[14px] leading-[19.6px] 
                    lg:text-[#000] lg:text-[18px] lg:leading-[25.2px] section-title">Largest platform for UI/UX Design</p>
            </div>
        </div>

        <div class="container flex flex-col lg:flex-row lg:justify-center lg:w-fit gap-8 lg:gap-10 discover-counter-wrapper">
            <div class="flex flex-col items-center lg:w-[200px] lg:gap-2 gap-[12px]">
                <p class="font-default font-semibold text-center text-[#CA2E69] text-[40px] leading-[48px] tracking-[-0.2px] lg:text-[56px] lg:leading-[67.2px]"><span id="views" class="font-default font-semibold text-center text-[#CA2E69] text-[40px] leading-[48px] tracking-[-0.2px] lg:text-[56px] lg:leading-[67.2px]" data-number="39">0</span>M+</p>
                <p class="font-default font-normal text-center text-black text-[14px] leading-[25.2px] tracking-[-0.14px]">All -time shots views</p>
            </div>
            <div class="flex flex-col items-center lg:w-[200px] lg:gap-2 gap-[12px]">
                <p class="font-default font-semibold text-center text-[#CA2E69] text-[40px] leading-[48px] tracking-[-0.2px] lg:text-[56px] lg:leading-[67.2px]"><span id="likes" class="font-default font-semibold text-center text-[#CA2E69] text-[40px] leading-[48px] tracking-[-0.2px] lg:text-[56px] lg:leading-[67.2px]" data-number="140">0</span>K+</p>
                <p class="font-default font-normal text-center text-black text-[14px] leading-[25.2px] tracking-[-0.14px]">All-time shots likes</p>
            </div>
            <div class="flex flex-col items-center lg:w-[200px] lg:gap-2 gap-[12px]">
                <p class="font-default font-semibold text-center text-[#CA2E69] text-[40px] leading-[48px] tracking-[-0.2px] lg:text-[56px] lg:leading-[67.2px]"><span id="followers" class="font-default font-semibold text-center text-[#CA2E69] text-[40px] leading-[48px] tracking-[-0.2px] lg:text-[56px] lg:leading-[67.2px]" data-number="6">0</span>K+</p>
                <p class="font-default font-normal text-center text-black text-[14px] leading-[25.2px] tracking-[-0.14px]">All-time followers</p>
            </div>
        </div>

        <div class=" image-slider-wrapper discoverSlider relative overflow-hidden orely-screen-wide" style="width: -webkit-fill-available;">
            <div class="discover-image-slider-wrapper flex items-center justify-between gap-4">
                <?php 
                $imgID = [
                    1374,1375,1376,1377,1378,1379

                ];
                foreach ($imgID as $key => $item){
                    ?>
                <div class="slider-item flex justify-center items-center lg:w-[447px] w-[250px] h-[335px] dribble-slider">
                    <img loading="lazy" class="w-full h-full object-contain rounded-xl lg:rounded-3xl lg:w-[447px] lg:h-[335px]"
                        src="<?php echo wp_get_attachment_url($item, "full") ?>"
                        <?php echo wp_get_attachment_image_srcset($item, "full") ?>
                        alt="slider" title="slider" width="447px" height="335px">
                </div>
                    <?php 


                }

                ?>
            </div>
            <div class="bg-overlay absolute flex opacity-0 top-0 left-0 bottom-0 right-0 w-full h-full justify-center items-center"
                style="background: linear-gradient(180deg, rgba(255, 244, 250, 0.50) 0%, #FFF8F5 100%);">
                <a href="https://dribbble.com/Orely" target="_blank" 
                    title="Orely Design Studio | Drible"
                    class="btn btn__primary icon-leading lg:h-[52px] h-[44px] py-0 px-6 text-[13px] md:text-[16px] bg-[#D85888] hover:bg-[#d291a9] flex items-center justify-center">
                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M9 0C4.03146 0 0 4.03146 0 9C0 13.9685 4.03146 18 9 18C13.9588 18 18 13.9685 18 9C18 4.03146 13.9588 0 9 0ZM14.9447 4.14859C16.0184 5.45661 16.6627 7.12582 16.6822 8.93167C16.4284 8.88286 13.8905 8.36552 11.333 8.68763C11.2744 8.56075 11.2256 8.42407 11.167 8.28742C11.0109 7.91649 10.8351 7.53579 10.6594 7.17462C13.4902 6.02278 14.7787 4.36334 14.9447 4.14859ZM9 1.32755C10.9523 1.32755 12.7386 2.05965 14.0954 3.2603C13.9588 3.45553 12.7972 5.0076 10.064 6.03254C8.80477 3.71909 7.40889 1.82538 7.19415 1.53254C7.77006 1.39588 8.37527 1.32755 9 1.32755ZM5.72994 2.04989C5.93492 2.32321 7.30152 4.22669 8.58026 6.49132C4.98807 7.44793 1.81562 7.42842 1.47397 7.42842C1.97179 5.04664 3.58243 3.06508 5.72994 2.04989ZM1.30803 9.00976C1.30803 8.93167 1.30803 8.85359 1.30803 8.77549C1.63991 8.78524 5.36877 8.83406 9.20498 7.68222C9.4295 8.11172 9.63448 8.55097 9.82971 8.99024C9.7321 9.01953 9.62473 9.04882 9.52711 9.07808C5.564 10.3568 3.45553 13.8514 3.27983 14.1443C2.05965 12.7874 1.30803 10.9816 1.30803 9.00976ZM9 16.692C7.22344 16.692 5.58351 16.0868 4.28524 15.0716C4.42192 14.7885 5.98374 11.782 10.3178 10.269C10.3373 10.2592 10.3471 10.2592 10.3666 10.2495C11.4501 13.051 11.8894 15.4035 12.0065 16.077C11.0792 16.4772 10.064 16.692 9 16.692ZM13.2853 15.3742C13.2072 14.9056 12.7972 12.6605 11.7918 9.89806C14.2028 9.51736 16.3113 10.1421 16.5748 10.2299C16.2429 12.3677 15.013 14.2126 13.2853 15.3742Z"
                            fill="white" />
                    </svg>
                    View more</a>
            </div>
        </div>
    </div>
</div>


<?php add_action( "wp_footer", function(){
    ?>
<script>
    $(document).ready(function () {
        $('.discover-image-slider-wrapper').slick({
            centerMode: true,
            slidesToShow: 3,
            dots: false,
            autoplay: true,
            variableWidth: true,
            autoplaySpeed: 5000,
            arrows: false,
            responsive:[
                {
                    breakpoint:1024,
                    settings:{
                        slidesToShow: 1,
                        centerMode: true,
                    }
                }
            ]
        });
    });
</script>
<?php
}, 100 ); ?>