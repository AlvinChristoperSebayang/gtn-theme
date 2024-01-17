<?php
/**
 * Custom Section Title Template.
 *
 * @param   array $args The block settings and attributes.
 */
global $post;

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'capability-content';
$features = [
    [
        'images' => [
            'url' =>    wp_get_attachment_image_url( 2035, 'original' ),
            'alt' =>'UX Design',
            'title' =>'UX Design',
            'width' =>'489px',
            'height' =>'489px',
            'class_name' =>'',
        ],
        'title' =>'UX Design',
        'capabilities' => 'We offer professional and user-centered UX design services for products, websites, and mobile apps to drive optimal results for your business.',
        'image_on' => 'right',
        'features' => [
            [
                'images' => [
                    'url' =>get_stylesheet_directory_uri() . "/resources/images/how-we-work/hww_ux_review.png",
                    'alt' =>'UX Review',
                    'title' =>'UX Review',
                    'width' =>'34px',
                    'height' =>'36px',
                    'class_name' =>'',
                ],
                'title' => 'UX Review'
            ],
            [
                'images' => [
                    'url' =>get_stylesheet_directory_uri() . "/resources/images/how-we-work/hww_user_research.png",
                    'alt' =>'hww_user_research',
                    'title' =>'hww_user_research',
                    'width' =>'34px',
                    'height' =>'36px',
                    'class_name' =>'',
                ],
                'title' => 'User Research'
            ],
            [
                'images' => [
                    'url' =>get_stylesheet_directory_uri() . "/resources/images/how-we-work/hww_wire_framing.png",
                    'alt' =>'hww_wire_framing',
                    'title' =>'hww_wire_framing',
                    'width' =>'34px',
                    'height' =>'36px',
                    'class_name' =>'',
                ],
                'title' => 'Wire Framing'
            ],
            [
                'images' => [
                    'url' =>get_stylesheet_directory_uri() . "/resources/images/how-we-work/hww_usability_testing.png",
                    'alt' =>'UX Review',
                    'title' =>'UX Review',
                    'width' =>'34px',
                    'height' =>'36px',
                    'class_name' =>'',
                ],
                'title' => 'Usability Testing'
            ],
        ],
        'url' => '/ux-design'
    ],
    [
        'images' => [
            'url' =>wp_get_attachment_image_url( 2036, 'original' ),
            'alt' =>'UI Design',
            'title' =>'UI Design',
            'width' =>'483px',
            'height' =>'483px',
            'class_name' =>'',
        ],
        'title' =>'UI Design',
        'capabilities' => 'We craft our design with originality and a user-friendly interface to achieve your business objective and expand your growth.',
        'image_on' => 'left',
        'features' => [
            [
                'images' => [
                    'url' =>get_stylesheet_directory_uri() . "/resources/images/how-we-work/hww_website.png",
                    'alt' =>'Website',
                    'title' =>'Website',
                    'width' =>'34px',
                    'height' =>'36px',
                    'class_name' =>'',
                ],
                'title' => 'Website'
            ],
            [
                'images' => [
                    'url' =>get_stylesheet_directory_uri() . "/resources/images/how-we-work/hww_mobile.png",
                    'alt' =>'Mobile App',
                    'title' =>'Mobile App',
                    'width' =>'34px',
                    'height' =>'36px',
                    'class_name' =>'',
                ],
                'title' => 'Mobile App'
            ],
            [
                'images' => [
                    'url' => wp_get_attachment_image_url( 1667 ),
                    'alt' =>'Dashboard',
                    'title' =>'Dashboard',
                    'width' =>'34px',
                    'height' =>'36px',
                    'class_name' =>'',
                ],
                'title' => 'Dashboard'
            ],
            [
                'images' => [
                    'url' => wp_get_attachment_image_url( 1666 ),
                    'alt' =>'Landing Page',
                    'title' =>'Landing Page',
                    'width' =>'34px',
                    'height' =>'36px',
                    'class_name' =>'',
                ],
                'title' => 'Landing Page'
            ],
        ],
        'url' => '/ui-design'
    ],
    [
        'images' => [
            'url' =>wp_get_attachment_image_url( 2034, 'original' ),
            'alt' =>'Illustration',
            'title' =>'Illustration',
            'width' =>'483px',
            'height' =>'483px',
            'class_name' =>'',
        ],
        'title' =>'Illustration',
        'capabilities' => 'We create illustrations that engage with your target audiences and match your brand’s tone and personality.',
        'image_on' => 'right',
        'features' => [
            [
                'images' => [
                    'url' =>get_stylesheet_directory_uri() . "/resources/images/how-we-work/hww_customIllustration.png",
                    'alt' =>'Custom Illustrations',
                    'title' =>'Custom Illustrations',
                    'width' =>'34px',
                    'height' =>'36px',
                    'class_name' =>'',
                ],
                'title' => 'Custom Illustrations'
            ],
            [
                'images' => [
                    'url' =>get_stylesheet_directory_uri() . "/resources/images/how-we-work/hww_userResearch.png",
                    'alt' =>'Icon Illustration',
                    'title' =>'Icon Illustration',
                    'width' =>'34px',
                    'height' =>'36px',
                    'class_name' =>'',
                ],
                'title' => 'Icon Illustration'
            ],
            [
                'images' => [
                    'url' =>get_stylesheet_directory_uri() . "/resources/images/how-we-work/hww_wireFraming.png",
                    'alt' =>'Branding Asset',
                    'title' =>'Branding Asset',
                    'width' =>'34px',
                    'height' =>'36px',
                    'class_name' =>'',
                ],
                'title' => 'Branding Asset'
            ],
            [
                'images' => [
                    'url' =>get_stylesheet_directory_uri() . "/resources/images/how-we-work/hww_3dAnimation.png",
                    'alt' =>'3D Illustration',
                    'title' =>'3D Illustration',
                    'width' =>'34px',
                    'height' =>'36px',
                    'class_name' =>'',
                ],
                'title' => '3D Illustration'
            ],
        ],
        'url' => '/illustration'
    ],
    [
        'images' => [
            'url' =>wp_get_attachment_image_url( 2037, 'original' ),
            'alt' =>'Animation',
            'title' =>'Animation',
            'width' =>'483px',
            'height' =>'483px',
            'class_name' =>'',
        ],
        'title' =>'Animation',
        'capabilities' => 'We design animation that delivers immersive visual experiences that send the right messages to your target audiences.',
        'image_on' => 'left',
        'features' => [
            [
                'images' => [
                    'url' =>get_stylesheet_directory_uri() . "/resources/images/how-we-work/hww_2dAnimation.png",
                    'alt' =>'2D Animation',
                    'title' =>'2D Animation',
                    'width' =>'34px',
                    'height' =>'36px',
                    'class_name' =>'',
                ],
                'title' => '2D Animation'
            ],
            [
                'images' => [
                    'url' =>get_stylesheet_directory_uri() . "/resources/images/how-we-work/hww_motionGraphic.png",
                    'alt' =>'Motion Graphics',
                    'title' =>'Motion Graphics',
                    'width' =>'34px',
                    'height' =>'36px',
                    'class_name' =>'',
                ],
                'title' => 'Motion Graphics'
            ],
            [
                'images' => [
                    'url' =>get_stylesheet_directory_uri() . "/resources/images/how-we-work/hww_iconAnimation.png",
                    'alt' =>'Icon Animation',
                    'title' =>'Icon Animation',
                    'width' =>'34px',
                    'height' =>'36px',
                    'class_name' =>'',
                ],
                'title' => 'Icon Animation'
            ],
            [
                'images' => [
                    'url' =>get_stylesheet_directory_uri() . "/resources/images/how-we-work/hww_storiesAnimation.png",
                    'alt' =>'Stories Animation',
                    'title' =>'Stories Animation',
                    'width' =>'34px',
                    'height' =>'36px',
                    'class_name' =>'',
                ],
                'title' => 'Stories Animation'
            ],
        ],
        'url' => '/animation'
    ],
    [
        'images' => [
            'url' =>wp_get_attachment_image_url( 2033, 'original' ),
            'alt' =>'Marketing Design',
            'title' =>'Marketing Design',
            'width' =>'489px',
            'height' =>'489px',
            'class_name' =>'',
        ],
        'title' =>'Marketing Design',
        'capabilities' => 'We help you create delightful marketing designs that resonate with your brand identity to help you reach your marketing goals.',
        'image_on' => 'right',
        'features' => [
            [
                'images' => [
                    'url' =>get_stylesheet_directory_uri() . "/resources/images/how-we-work/hww_pitch.png",
                    'alt' =>'Pitch Deck Design',
                    'title' =>'Pitch Deck Design',
                    'width' =>'34px',
                    'height' =>'36px',
                    'class_name' =>'',
                ],
                'title' => 'Pitch Deck Design'
            ],
            [
                'images' => [
                    'url' =>get_stylesheet_directory_uri() . "/resources/images/how-we-work/hww_sosmed.png",
                    'alt' =>'Social Media Design',
                    'title' =>'Social Media Design',
                    'width' =>'34px',
                    'height' =>'36px',
                    'class_name' =>'',
                ],
                'title' => 'Social Media Design'
            ],
            [
                'images' => [
                    'url' =>get_stylesheet_directory_uri() . "/resources/images/how-we-work/hww_email.png",
                    'alt' =>'Email Marketing Design',
                    'title' =>'Email Marketing Design',
                    'width' =>'34px',
                    'height' =>'36px',
                    'class_name' =>'',
                ],
                'title' => 'Email Marketing Design'
            ],
            [
                'images' => [
                    'url' =>get_stylesheet_directory_uri() . "/resources/images/how-we-work/hww_printing.png",
                    'alt' =>'Printing Design',
                    'title' =>'Printing Design',
                    'width' =>'34px',
                    'height' =>'36px',
                    'class_name' =>'',
                ],
                'title' => 'Printing Design'
            ],
        ],
        'url' => '/marketing-design'
    ]
];
?>

<div class="w-full <?php echo $class_name ?> snap-y snap-mandatory">
    <div class="container w-full flex flex-col lg:gap-8 gap-6">
        <?php foreach ($features as $key => $value) : ?>
            <?php get_template_part( 'template-parts/components/basic/capability', 'content', $value ); ?>
        <?php endforeach; ?>
    </div>
</div>