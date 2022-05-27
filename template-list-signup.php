<?php
/**
 * The template for displaying all pages
 * Template Name: List Signup
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cyberize-app-dev
 */

get_header('loggedout');
?>

<main id="primary" class="site-main container">

    <header id="header-test" class="site-header container py-3 text-center">
        <style>
        #moose-enter-btn {
            font-weight: 300 !important;
        }
        </style>

        <!-- <h3 class="text-center h3 login-heading">If you are already a member, please log in</h3> -->
        <a id="moose-enter-btn" class="text-center btn btn-danger btn-lg mb-4 px-5"
            href="<?php echo wp_login_url(); ?>">ENTER</a>

        <hr>
        <h4 class="text-center">OR</h4>
        <hr>

        <!-- <h1 class="text-center text-danger signup-heading">Join</h1> -->

        <?php echo do_shortcode('[gravityform id="4" title="false" description="false"]'); ?>


    </header><!-- #masthead -->

</main><!-- #main -->

<?php
get_footer();