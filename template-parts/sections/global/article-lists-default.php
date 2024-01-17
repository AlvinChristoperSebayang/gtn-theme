<?php
    $latestPosts = orely_get_latest_posts([]);
    $freebies = orely_get_latest_posts([
        'post_type' => 'orely-freebies'
    ]);

    $postsData = [];
    $freebiesData = [];


    foreach (orely_get_latest_posts([])['posts'] as $key => $value) {
      
       $postsData[$key] = [
        'id'         => $value['id'],
        'link'       => $value['link'],
        'title'      => $value['title'],
        'date'       => $value['date'],
        'excerpt'    => $value['excerpt'],
        'card_basic' => [
            'basic_card_title' => $value['meta_field']['basic_card_title'],
            'basic_card_excerpt' => $value['meta_field']['basic_card_excerpt'],
            'basic_card_image' => $value['meta_field']['basic_card_image'],
        ],
        'card_featured' => [
            'featured_card_title' => $value['meta_field']['featured_card_title'],
            'featured_card_excerpt' => $value['meta_field']['featured_card_excerpt'],
            'featured_card_image' => $value['meta_field']['featured_card_image'],
        ],
        'postTags' => get_the_terms($value['id'], 'post_tag') ?? [],
        'meta_field' => get_fields($value['id'])
       ];
    }

    foreach ($freebies['posts'] as $key => $value) {
        $freebiesData[$key] = [
         'id'         => $value['id'],
         'link'       => $value['link'],
         'title'      => $value['title'],
         'date'       => $value['date'],
         'excerpt'    => $value['excerpt'],
         'card_basic' => [
             'basic_card_title' => $value['meta_field']['basic_card_title'],
             'basic_card_excerpt' => $value['meta_field']['basic_card_excerpt'],
             'basic_card_image' => $value['meta_field']['basic_card_image'],
         ],
         'card_featured' => [
             'featured_card_title' => $value['meta_field']['featured_card_title'],
             'featured_card_excerpt' => $value['meta_field']['featured_card_excerpt'],
             'featured_card_image' => $value['meta_field']['featured_card_image'],
         ],
         'postTags' => get_the_terms($value['id'], 'ofb-format') ?? [],
         'pricingType' => get_the_terms($value['id'], 'ofb-pricing-type') ?? [],
         'meta_field' => get_fields($value['id']) ?? []
        ];
     }

     $latestPosts = [];
     $freebiesData = [];
     $postsData = [];
?>
<?php if(!empty($latestPosts)): ?>
<div id="v-latest-posts" class="snap-start design-stories__wrapper">
    <orely-latest-posts :posts_lists="<?php echo parseToVue($postsData);?>"
        :freebies_lists="<?php echo parseToVue($freebiesData);?>">
    </orely-latest-posts>
</div>
<?php endif; ?>