<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package orely
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <meta
  name="description"
  content="<?php echo get_bloginfo('description') ?>" >
    
    <?php do_action('before_head')?>
    <?php wp_head(); ?>
    <?php do_action('after_head')?>
    <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() . '/style.css' ; ?>" />
</head>

<body <?php body_class( !empty($whiteHeader) ? 'use-color-white' : '' ); ?>>
    <?php wp_body_open(); ?>
    <div id="site" class="overflow-hidden">
        <?php do_action( 'before_header' ); ?>
        <header id="masthead" role="banner" class="site-header fixed top-0 w-full z-[999999999999999999999999]">
            <!-- HEADER START -->
            <?php get_template_part('template-parts/header/header', 'default'); ?>
        </header> <!-- HEADER END -->
        <?php do_action( 'after_header' ); ?>

        <main id="site-main">
            
            <!-- MAIN START -->