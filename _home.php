<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cyberize-app-dev
 */

get_header();
?>

<main id="primary" class="site-main container">

  <div class="row">
    <div class="col-md-8">
      <?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
	?>
      <header>
        <!-- <h1 class="page-title screen-reader-text"><?php //single_post_title(); ?></h1> -->
      </header>
      <?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
        the_post();
        
                /**
         * 
         * CATEGORY LIST WITH PARENT CHILD RELATIONSHIP
         * 
         */

        $taxonomy = 'category';
 
        // Get the term IDs assigned to post.
        $post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );

        // echo '<pre>';
        // print_r($post_terms);
        // echo '</pre>';
         
        // Separator between links.
        // $separator = ', ';
        $separator = '  <i class="fas fa-angle-double-right"></i>  ';
         
        if ( ! empty( $post_terms ) && ! is_wp_error( $post_terms ) ) {
         
            $term_ids = implode( ',' , $post_terms );
         
            $terms = wp_list_categories( array(
                'title_li' => '',
                'style'    => 'none',
                'echo'     => false,
                'taxonomy' => $taxonomy,
                'include'  => $term_ids
            ) );
         
            $terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );
         
            // Display post categories.
            echo  $terms;
        }


         // =========================================END MOOSE TEST========================================

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
        get_template_part( 'template-parts/content', get_post_type() );
        

         
			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
    </div>
    <!-- <div class="col-md-4"> -->

    <?php //get_sidebar(); ?>

    <!-- </div> -->
  </div>


</main><!-- #main -->

<?php
get_footer();