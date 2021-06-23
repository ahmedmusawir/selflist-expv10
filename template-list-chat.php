<?php
/**
 * The template for displaying all pages
 * Template Name: List Chat
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cyberize-app-dev
 */

get_header();

?>

<main id="primary" class="site-main container">
  <hr>

  <?php echo do_shortcode('[yobro_chatbox]'); ?>

</main><!-- #main -->

<?php
get_footer();