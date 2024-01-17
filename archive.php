<?php
get_header();

$title = get_the_title(get_the_ID());

// Applies all registered 
// hooks, shortcodes, filters, etc...
$content = apply_filters(
    'the_content',
    get_the_content(null, false, get_the_ID())
);

?>


    <div id="site-content" class="content-area"><!-- SITE CONTENT START -->
        <article><!-- ARTICLE START -->
            <header><!-- HEADER CONTENT START -->

            </header><!-- HEADER CONTENT END -->

			<?php do_action( 'before-site-content' ); ?>
			<div class="entry-content container"><!-- ENTRY CONTENT START -->
				<?php echo $content; ?>

                tes 
			</div><!-- ENTRY CONTENT START -->
			<?php do_action( 'after-site-content' ); ?>
        </article><!-- ARTICLE END -->
    </div><!-- SITE CONTENT END -->
<?php

get_footer();
