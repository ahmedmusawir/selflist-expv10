<?php
/**
 * The template for displaying all pages
 * Template Name: Home Page
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cyberize-app-dev
 */

get_header('empty');
?>

<main id="primary" class="site-main container">

    <header id="header-home" class="site-header container py-5 text-center">

        <figure class="logo-container">
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">

                <img class="mx-auto d-block" src="/wp-content/uploads/Logo-New-875-x-166.png" alt="">

            </a>
        </figure>

        <section class="link-box d-flex justify-content-around mx-auto">
            <a href="/list-insert" class="list-links display-4 d-block">LIST</a>
            <a href="/category-search-index" class="list-links display-4 d-block">LISTINGS</a>
        </section>

        <style>
        #sale-image-square:hover {
            box-shadow: 2px 2px 6px gray;
        }
        </style>
        <section class="mt-5 d-none">
            <figure id="sale-image-square" class="text-center pt-3">
                <a href="/list-signup/">
                    <h5 class="font-weight-bold">LIST FOR 1 POINT PER DAY PER LISTING</h5>
                    <h6 class="text-success font-weight-bold">5000 POINTS FOR 1 DOLLAR</h6>
                    <p><small>(Available Until December 31, 2021)</small></p>
                </a>
            </figure>
        </section>


    </header><!-- #masthead -->

</main><!-- #main -->

<?php
get_footer();