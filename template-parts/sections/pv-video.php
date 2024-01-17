<?php

$metaVideoSection = [];
if (!empty($args['metaVideoSection'])) {
    $metaVideoSection = $args['metaVideoSection'];
}
?>

<?php if (!empty($metaVideoSection)) : ?>
<div class=" shrink-0 pv-section relative snap-always snap-bottom snap-y snap-mandatory flex flex-col">
    <div class="max-lg:pt-12 max-lg:pb-10 lg:py-20 bg-[#EFF2FB] snap-always snap-center shrink-0">
        <h3 class="text-black text-center font-default font-medium 
                        max-lg:container lg:max-w-[896px] lg:mx-auto 
                        text-[20px] leading-[28px] tracking-[-0.1px] 
                        lg:text-[32px] lg:leading-[44.8px] lg:tracking-[-0.16px] 
                        pv-section__content"><?php echo $metaVideoSection['banner_text']; ?>
        </h3>
    </div>
    <?php if (!empty($metaVideoSection['short_video'])) : ?>

    <div class="relative group snap-always snap-center shrink-0 mx-auto">
        <button title="Play Video" aria-label="Play Video"
            class="w-[60px] h-[60px] lg:w-[90px] lg:h-[90px] absolute top-1/2 left-1/2 z-10
                    transform -translate-x-1/2 -translate-y-1/2 flex items-center justify-center rounded-full overflow-hidden 
                    transition-opacity duration-300 opacity-100 lg:opacity-0 
                    group-hover:transition-opacity group-hover:duration-300 group-hover:opacity-100 orely-full-video-button">
            <div class="w-full h-full absolute -z-10 bg-black/30 blur-[7.5px] shadow-md hover:cursor-pointer"></div>
            <?php get_template_part('template-parts/svg/play', 'white'); ?>
        </button>
        <input type="hidden" id="vs-poster" name="vs-poster"
            value="<?php echo wp_get_attachment_url( $metaVideoSection['video_poster']['id'] )?>">
        <video id="orely-video-short" class="video-js orely-video__short w-full h-full bg-[#EFF2FB] snap-center"
            width="1920" height="1960"
            title="<?php echo esc_html_e(!empty($metaVideoSection['short_video']['title']) ? $metaVideoSection['short_video']['title'] : bloginfo('name')) ?>"
            alt="<?php echo esc_html_e(!empty($metaVideoSection['short_video']['alt']) ? $metaVideoSection['short_video']['alt'] : bloginfo('name')); ?>"
            description="<?php echo esc_html_e(!empty($metaVideoSection['short_video']['description']) ? $metaVideoSection['short_video']['description'] : bloginfo('name')); ?>"
            caption="<?php echo esc_html_e(!empty($metaVideoSection['short_video']['caption']) ? $metaVideoSection['short_video']['caption'] : bloginfo('name')); ?>">
            <source src="<?php echo esc_url($metaVideoSection['short_video']['url']) ?>" type="video/mp4" />
        </video>
    </div>

    <div
        class="video-popup-wrapper fixed top-0 w-screen h-screen flex items-center justify-center -z-10 popup_video_hide">
        <div class="w-full h-full absolute -z-10 bg-black/40 blur-lg">
        </div>

        <div class="relative content-video">
            <video id="orely-video" class="video-js orely-video relative"
                width="1920" height="1960"
                title="<?php echo esc_html_e(!empty($metaVideoSection['full_video']['title']) ? $metaVideoSection['full_video']['title'] : bloginfo('name')) ?>"
                alt="<?php echo esc_html_e(!empty($metaVideoSection['full_video']['alt']) ? $metaVideoSection['full_video']['alt'] : bloginfo('name')); ?>"
                description="<?php echo esc_html_e(!empty($metaVideoSection['full_video']['description']) ? $metaVideoSection['full_video']['description'] : bloginfo('name')); ?>"
                caption="<?php echo esc_html_e(!empty($metaVideoSection['full_video']['caption']) ? $metaVideoSection['full_video']['caption'] : bloginfo('name')); ?>"
                preload="metadata" loop controls
                poster="<?php echo wp_get_attachment_url( $metaVideoSection['video_poster']['id'] )?>">
                <source src="<?php echo esc_url($metaVideoSection['full_video']['url']) ?>" type="video/mp4" />
            </video>
        </div>

        <button
            class="button-close-popup absolute top-0 lg:right-0 right-5 transform md:translate-x-[-100%] translate-y-[100%]"
            title="Video Close">
            <?php get_template_part('template-parts/svg/close', 'white'); ?>
        </button>
    </div>
    <?php add_action('wp_footer', function () {
                echo '<script src="https://vjs.zencdn.net/8.5.2/video.min.js">
                </script>';
            }); ?>
    <?php endif; ?>
</div>
<?php endif; ?>