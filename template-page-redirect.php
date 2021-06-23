<?php
/**
 * The template for displaying all pages
 * Template Name: Page Redirect to Login
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cyberize-app-dev
 */

// JUST REDIRECT TO LOGIN PAGE
$url = '/wp-login.php';
wp_safe_redirect( $url );
exit;

get_header('loggedout');
?>

<main id="primary" class="site-main container">

    <header id="header-test" class="site-header container py-5 text-center">


        <!-- THIS SHOULD REDIRECT TO THE LOGIN PAGE ONLY -->

    </header><!-- #masthead -->

</main><!-- #main -->

<?php
get_footer();