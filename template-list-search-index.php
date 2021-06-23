<?php
/**
 * The template for displaying all pages
 * Template Name: List Search Index
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cyberize-app-dev
 */

get_header('list');
?>

<main id="primary" class="site-main container">
  <!-- <hr> -->

  <section id="selflist-search-input-box" class="selflist-search-input-box">

    <input type="text" id="selflist-search-input" class="selflist-search-input">
    <i class="fas fa-search"></i>

  </section>

  <section id="selflist-search-result-box" class="selflist-search-result-box">

    <!-- AJAX CONTENT GO HERE -->

  </section>

  <div class="list-index-pagination-box text-center d-none">
    <a href="#" id="list-prev-page-btn" class="btn btn-danger disabled">Previous</a>
    <a href="#" id="list-next-page-btn" class="btn btn-danger">Next</a>
  </div>

</main><!-- #main -->

<?php
get_footer();