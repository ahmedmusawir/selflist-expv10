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

    <?php
// Must be inside a loop.
 
if ( has_post_thumbnail() ) {
    cyberize_app_dev_post_thumbnail();
}
else {
    // echo '<img class="w-100" src="' . get_bloginfo( 'stylesheet_directory' ) 
    //     . '/assets/img/thumbnail-default.jpg" />';
    echo '<img class="" src="/wp-content/uploads/thumbnail-default.jpg" />'; 

}
?>

    <?php  ?>

    <header class="entry-header">
        <?php
		if ( is_singular() ) :
			the_title( '<h5 class="entry-title font-weight-bold mt-4">', '</h5>' );
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
		the_content();
		?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php //cyberize_app_dev_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->