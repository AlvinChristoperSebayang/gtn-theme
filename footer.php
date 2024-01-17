<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package orely
 */
global $post;



?>

</main> <!-- MAIN END -->
</div><!-- #site -->

<footer class="bg-default w-full">
<?php get_template_part('template-parts/footer/footer', 'default'); ?>
</footer>

<?php wp_footer(); ?>
</body>

</html>