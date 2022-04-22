<?php
/**
 * The template for displaying all pages
 * Template Name: List HMU
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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
    <h2 class="text-center font-weight-bold mt-5">Invite</h2>
    <!-- THE HMU GRAVITY FORM -->
    <?php echo do_shortcode('[gravityform id="6" title="false" description="false"]'); ?>
</main><!-- #main -->

<?php
get_footer();