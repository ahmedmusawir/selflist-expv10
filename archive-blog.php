<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cyberize-app-dev
 */

if (is_user_logged_in()) {
  get_header();
} else {
  get_header('loggedout');
}
?>
<main id="primary" class="site-main container">

    <div class="row">
        <div class="col-md-8">
            <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <h1 class="page-title">BLOG POSTS</h1>
                <?php
			// the_archive_title( '<h1 class="page-title">', '</h1>' );
			// the_archive_description( '<div class="archive-description">', '</div>' );
			?>
            </header><!-- .page-header -->

            <?php
		/* Start the Loop */
		while ( have_posts() ) :
			the_post();

			/*
			 * Include the Post-Type-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
			 */
			get_template_part( 'template-parts/content', 'blog-index' );

		endwhile;

		// the_posts_navigation();
        ?>

            <div class="navigation">
                <p><?php posts_nav_link('&nbsp;','<span class="float-left">Next</span>','<span class="float-right">Previous</span>'); ?>
                </p>
            </div>

            <?php 

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>
        </div>
        <div class="col-md-4">

            <?php get_sidebar(); ?>

        </div>
    </div>



</main><!-- #main -->

<?php
get_footer();