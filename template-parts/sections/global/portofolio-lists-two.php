<?php
$portofolioArticles = orely_get_posts_data('orely-portfolio', 2);
$title = 'Our Works';
if ( ! empty( $args['title'] ) ) {
    $title = $args['title'];
}

global $wp_query;


if (!empty($wp_query->post) & $wp_query->post->post_type == 'orely-portfolio') {
    $nextPortfolio = new WP_Query(
        array(
            'post_type' => 'orely-portfolio',
            'post_status' => 'publish',
            'posts_per_page' => 2,
            'post__not_in' => array($wp_query->post->ID), 
            'date_query' => array(
                'before' => get_the_time('Y-m-d H:i:s', $wp_query->post->ID),
            ),
            'order' => 'DESC',
            'orderby' => 'Date',
        )
    );
    wp_reset_query(  );
    
    if (empty($nextPortfolio->posts)) {
        $nextPortfolio = new WP_Query(
            array(
                'post_type' => 'orely-portfolio',
                'post_status' => 'publish',
                'posts_per_page' => 2,
                'post__not_in' => array($wp_query->post->ID), 
                'order' => 'DESC',
                'orderby' => 'Date',
            )
        );
        wp_reset_query(  );
    }

    $portofolioArticles = $nextPortfolio->posts;

    if (count($nextPortfolio->posts) < 2) {
        $tmpPortfolio = new WP_Query(
            array(
                'post_type' => 'orely-portfolio',
                'post_status' => 'publish',
                'posts_per_page' => 1,
                'post__not_in' => array($wp_query->post->ID), 
                'order' => 'DESC',
                'orderby' => 'Date',
            )
        );
        wp_reset_query(  );
        if (count($tmpPortfolio->posts)) {
            $portofolioArticles[] = $tmpPortfolio->posts[0];
        }
    }
}
wp_reset_query()
?>

<?php if(!empty($portofolioArticles)): ?>
<div class=" snap-start feature-work pt-20 pb-20 lg:pt-[100px] lg:pb-[80px] relative">
    <div class="container feature-work__wrapper">
        <h3
            class="text-black text-center font-default font-semibold text-[28px] leading-[33.6px] lg:text-[40px] lg:leading-[48px] mb-10 lg:mb-[60px] section-title">
            <?php echo $title; ?>
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-10 md:gap-10 lg:gap-x-[100px] lg:gap-y-20 mb-0 lg:mb-12 feature-work-lists">
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
                        'link' => get_permalink( $value->ID )
                    ] ); ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif ; ?>