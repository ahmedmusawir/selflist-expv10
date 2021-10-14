<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cyberize-app-dev
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php cyberize_app_dev_post_thumbnail(); ?>

    <header class="entry-header">
        <?php
		if ( is_singular() ) :
			the_title( '<h4 class="entry-title font-weight-bold">', '</h4>' );
		else :
			the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' );
		endif;

		if ( 'blog' === get_post_type() ) :
			?>
        <div class="entry-meta">
            <?php
				cyberize_app_dev_posted_on();
				// cyberize_app_dev_posted_by();
				?>
        </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
		the_excerpt();
		?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php //cyberize_app_dev_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->