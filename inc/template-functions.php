<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package orely
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function mcd_body_classes($classes)
{
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'mcd_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function mcd_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" title="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'mcd_pingback_header');



/*----------------------------
    GET SVG LOGO
------------------------------*/
if ( !function_exists( 'mcd_logo_tag' ) ) {
    function mcd_logo_tag( $url='' ){
        if( $url == '' ){
            return '<img loading="lazy" src="'.esc_url( $url ).'" alt="'.get_bloginfo( 'name' ).'" title="'.get_bloginfo( 'name' ).'" style="height: 22px; width:22px;">';
        }
        try{
            $url_basename = basename( $url ); 
            $svg_ext      = explode( '.',$url_basename )[1];

            if( $svg_ext != 'svg' ){
                return '<img loading="lazy" src="'.esc_url( $url ).'" alt="'.get_bloginfo( 'name' ).'" title="'.get_bloginfo( 'name' ).'" style="height: 22px; width:22px;">';
            }
            $get_svg_file = wp_remote_get( $url );
            $svg_file     = wp_remote_retrieve_body( $get_svg_file );
            $find_string  = '<svg';
            $position     = strpos( $svg_file, $find_string );
            $new_svg_file = substr( $svg_file, $position );
            return $new_svg_file;
        }catch( \Exception $e ) {
            return '<img loading="lazy" src="'.esc_url( $url ).'" alt="'.get_bloginfo( 'name' ).'" title="'.get_bloginfo( 'name' ).'" style="height: 22px; width:22px;">';
        }
    }
}


/*----------------------------
    LOGO WITH STICKY
------------------------------*/
if ( !function_exists( 'mcd_custom_logo' ) ){
    function mcd_custom_logo(){
        $default_logo = get_theme_mod( 'custom_logo' );
        $default_logo = wp_get_attachment_image_url( $default_logo, 'full');
         if ( !empty( $default_logo ) ) : ?>
            <?php if (display_header_text()==true) : ?>
                <a href="<?php echo esc_url( home_url() ); ?>" class="mcd_custom-logo-link logo-with__title"
                    alt="<?php echo get_bloginfo( 'name' ) ?>"
                    title="<?php echo get_bloginfo( 'name' ) ?>"
                    >
                    <?php echo mcd_logo_tag( $default_logo ); ?>
                    <h4 class="font-raleway text-[21px] leading-none font-bold"><?php echo get_bloginfo( 'name' ) ?></h4>
                </a>
            <?php else : ?>
                <a href="<?php echo esc_url( home_url() ); ?>" class="mcd_custom-logo-link default-logo"
                    alt="<?php echo get_bloginfo( 'name' ) ?>"
                    title="<?php echo get_bloginfo( 'name' ) ?>">
                    <?php echo mcd_logo_tag( $default_logo ); ?>
                </a>
            <?php endif; ?>
            
        <?php else: ?>
        <h3>
            <a href="<?php echo esc_url( home_url(  ) ); ?>"
                alt="<?php echo get_bloginfo( 'name' ) ?>"
                    title="<?php echo get_bloginfo( 'name' ) ?>">
                <?php echo esc_html( get_bloginfo( 'name' ) ); ?>
            </a>
        </h3>
    <?php  endif;
    }
}
