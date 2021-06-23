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
  <header class="entry-header">
    <?php
		if ( is_singular() ) :
			// the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
    <div class="entry-meta">
      <?php
				cyberize_app_dev_posted_on();
				cyberize_app_dev_posted_by();
				?>
    </div><!-- .entry-meta -->
    <?php endif; ?>
  </header><!-- .entry-header -->

  <?php cyberize_app_dev_post_thumbnail(); ?>

  <div class="entry-content">
    <?php
		the_excerpt();
		?>
  </div><!-- .entry-content -->

  <footer class="entry-footer">
    <?php //cyberize_app_dev_entry_footer(); ?>
  </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->