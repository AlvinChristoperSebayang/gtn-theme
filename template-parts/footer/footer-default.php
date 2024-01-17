<?php
/**
 * The template component default the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package orely
 */
// $menu_items =  wp_nav_menu(array(
//         'theme_location' => 'primary-menu',
//         'container' => false,
//         'menu_class' => 'nav-menu',

//     ));

$parent_category = get_term_by('name', 'Wear', 'product_cat'); 

if ($parent_category) {
    
    $child_categories = get_term_children($parent_category->term_id, 'product_cat');
    if (!empty($child_categories)) {
        
    } else {
        echo 'Tidak ada child taxonomy untuk kategori "Wear".';
    }
}
?>

<div class="container footer-wrap py-12">
    <ul class="footer_content flex lg:flex-row flex-col justify-between">
        <li class="left_footer__content flex flex-col lg:items-start items-center lg:gap-6 gap-5 max-w-[367px]">
            <a href= "" class="lg:w-52 lg:h-20">
            <img class="object-cover" src="<?php echo get_stylesheet_directory_uri() . "/resources/images/logo-footer.png" ?>" alt="Store Logo">
            </a>
            <p class="text-[16px] text-white leading-7 lg:text-left text-center lg:max-w-[367px] max-w-[242px]">Mangstore is the solution for high quality goods you need</p>
        </li>
        <li class="right_footer__content flex lg:gap-[50px]">
            <div class="lg:flex hidden flex-col gap-4 main_menu ">
                <h3 class="text-white font-bold">Mangstore</h3>
                <?php
                    $primary_menu = wp_nav_menu(array(
                        'theme_location' => 'primary-menu',
                        'container' => false, 
                        'echo' => false, 
                    ));
                    if ($primary_menu) {
                        echo $primary_menu;
                    } else {
                        echo 'Primary menu tidak tersedia.';
                    }

                ?>
            </div>           

            <div class="lg:flex hidden flex-col gap-4 main_menu"> 
               <h3 class="text-white font-bold">Buy</h3>
               <ul>
               <?php 
                  foreach ($child_categories as $child_category) {
                    $category = get_term($child_category, 'product_cat');
                    echo '<li><a href="' . get_term_link($category) . '" class="text-white text-[16px]">' . $category->name . '</a></li>';
                }   
               ?>
               </ul>    
            </div>
            <div class="flex lg:flex-col flex-row gap-4 lg:w-auto w-full">
                <h3 class="text-white font-bold lg:block hidden">Find Us In</h3>
                <ul class="flex lg:flex-col flex-row gap-2 link_to__marketPlace__wrapper lg:w-auto w-full lg:mt-0 mt-6">
                    <li class="btn_marketPlace w-full"><a href="" class="text-white ico ico__next-icon-up p-[10px] border border-white flex gap-1 justify-between items-center w-full rounded-full"> <span class="text-[16px] text-white duration-200">Tokopedia</span> </a></li>
                    <li class="btn_marketPlace w-full"><a href="" class="text-white ico ico__next-icon-up p-[10px] border border-white flex gap-1 justify-between items-center w-full rounded-full"><span class="text-[16px] text-white duration-200">Shopee</span> </a></li>  
                </ul>
            </div>
        </li>
    </ul>
</div>