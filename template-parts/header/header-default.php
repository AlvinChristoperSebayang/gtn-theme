<?php

?>

<!-- MAINMENU AREA -->
<nav class="container flex justify-between items-center py-4">
    <ul class="lg:hidden flex items-center">
        <button class="btnHamburger relative w-4 h-3">
            <div class="absolute -translate-y-1/2 duration-500 top-[10%] h-[2px] bg-[#363062] w-full"></div>
            <div class="absolute -translate-y-1/2 duration-500 top-1/2 h-[2px] bg-[#363062] w-1/2"></div>
            <div class="absolute -translate-y-1/2 duration-500 top-[90%] h-[2px] bg-[#363062] w-3/4"></div>
        </button>
    </ul>
    <?php
    wp_nav_menu(array(
        'theme_location' => 'primary-menu',
        'container' => false,
        'menu_class' => 'nav-menu',

    ));
    ?>
    <ul class="logo">
        <li><a href=""><img class="h-11" src="<?php echo get_stylesheet_directory_uri() . "/resources/images/logo.png" ?>" alt="Store Logo"></a></li>
    </ul>
    <ul class="nav-right flex items-center gap-4 relative">
        <li>
            <form action="" method="GET"  class="searchForm relative h-fit">
                <input class="text-sm rounded-full outline-none p-0 border-none max-w-0 max-h-[47px] h-[47px] absolute top-1/2 -translate-y-1/2 right-0 duration-500" placeholder="Search Something . . ." type="text" name="search" value="">
                <button class="btn-search lg:p-4 p-0 rounded-full bg-transparent lg:hover:bg-[#DCD4ED] duration-300 group z-50">
                    <img class="group-hover:scale-110 duration-300" src="<?php echo get_stylesheet_directory_uri() . "/resources/images/search.svg" ?>" alt="Search Icon">
                </button>           
                <button class="btn-submit lg:p-4 rounded-full bg-transparent opacity-0 duration-300 group z-50 absolute right-0 pointer-events-none " type="submit">
                    <img class="group-hover:scale-110 duration-300" src="<?php echo get_stylesheet_directory_uri() . "/resources/images/search.svg" ?>" alt="Search Icon">
                </button>           
            </form>
            <!-- <form action="" class="searchForm absolute top-1/2 -translate-y-1/2 -left-[67%] opacity-0 z-10 pointer-events-none duration-500">
                <button type="submit" class="absolute top-1/2 -translate-y-1/2 right-5"><img class="" src="<?php echo get_stylesheet_directory_uri() . "/resources/images/search.svg" ?>" alt="Search Icon"></button>
            </form> -->

        </li>
        <li class="lg:block hidden">
            <button class="btn-cart p-4 rounded-full bg-transparent hover:bg-[#DCD4ED] duration-300 group">
                <img class="group-hover:scale-110 duration-300" src="<?php echo get_stylesheet_directory_uri() . "/resources/images/cart.svg" ?>" alt="Search Icon">
        </li>
        <li class="lg:block hidden"><a href="" class="nav-text py-[16px] px-[32px] border border-[#363062] rounded-full">Contact</a></li>
    </ul>
</nav>