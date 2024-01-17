<?php
$portofolioArticles = orely_get_posts_data('orely-portfolio', 4);

?>

<?php if(!empty($portofolioArticles)): ?>
<div class=" snap-start feature-work pt-20 pb-0 lg:pt-[100px] lg:pb-[80px] relative"
    style="background: linear-gradient(180deg, #F7F2FB 0%, #FFF8F4 59.53%, #FFF 100%), #FFF;">
    <div class="container feature-work__wrapper">
        <h3
            class="text-black text-center font-default font-semibold text-[28px] leading-[33.6px] lg:text-[40px] lg:leading-[48px] mb-10 lg:mb-[60px] section-title" style="opacity: 0;">
            Featured works
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-10 md:gap-x-10 lg:gap-x-[100px] lg:gap-y-20 mb-[60px] lg:mb-12 feature-work-lists">
            <?php foreach ($portofolioArticles as $key => $value): ?>
                <?php 
                    $postTags = get_the_terms( $value->ID, 'ofb-portfolio-tags' ) ?? [];
                    $tagsName = [];
                    if (!empty($postTags)) {
                        foreach ($postTags as $key => $term) {
                            array_push($tagsName,$term->name);
                        }
                    }

                    $portfolioType = get_the_terms( $value->ID, 'ofb-portfolio-types' ) ?? get_term_by( 'name', 'Project', 'ofb-portfolio-types' );

                    get_template_part( "template-parts/components/basic/card", "portofolio", [
                        'images' => [
                            'url' => orely_get_portofolio_card_image_url($value->ID),
                            'alt' => get_the_title( $value->ID ),
                            'title' => get_the_title( $value->ID ),
                            'width' => '490px',
                            'height' => '480px',
                        ],
                        'title' => get_the_title( $value->ID ),
                        'category' => $portfolioType[0]->name,
                        'tags' => $tagsName,
                        'link' => get_permalink( $value->ID ),
                    ] ); ?>
            <?php endforeach; ?>
        </div>

        <div class="text-center navigation-wrapper">
            <a href="<?php echo esc_url( site_url( '/portofolio' )); ?>"
            title="View more works"
            aria-label="View more works in our portfolio"
                class="btn btn__tertiary text-center h-[48px] px-6 font-default font-medium text-[16px] leading-[24px]">
                View more works
            </a>
        </div>

    </div>
    <svg width="1080" height="2" viewBox="0 0 1080 2" fill="none" xmlns="http://www.w3.org/2000/svg"
        class="hidden md:block absolute bottom-0 left-1/2  transform -translate-x-1/2">
        <path d="M0 1H1080" stroke="#EDEDEF" stroke-linejoin="round" />
    </svg>
    <!-- <svg width="200" height="2" viewBox="0 0 200 2" fill="none" xmlns="http://www.w3.org/2000/svg"
        class="md:hidden absolute bottom-[22px] left-1/2  transform -translate-x-1/2 md:mb-0">
        <path d="M0 1H200" stroke="#EDEDEF" stroke-linejoin="round"/>
    </svg> -->

</div>
<?php endif ; ?>