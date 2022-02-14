<?php
/**
 * The template for displaying all pages
 * Template Name: Pricing Page
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
<style>
.page-id-1402 h2,
h4 {
    font-weight: bold;
}

.page-id-1402 .price-box {
    box-shadow: 2px 2px 8px grey
}


@media (max-width: 1199px) {
    .page-id-1402 .price-box {
        min-height: 300px;
    }

    .page-id-1402 h2 {
        min-height: 100px;

    }
}

@media (max-width: 991px) {
    .page-id-1402 h1 {
        font-size: 1.8rem;
    }

    .page-id-1402 h2 {
        font-size: 1.5rem;
    }

    .page-id-1402 h4 {
        font-size: 1rem;
    }
}
</style>

<main id="primary" class="site-main container">

    <h1 class="text-center font-weight-bold my-5">Pricing For Listing Days</h1>

    <div class="row">
        <div class="col-sm-12 col-md-6">
            <article class="price-box m-4 border border-danger rounded text-center p-5">

                <h2>10,000 to 1,000,000,000</h2>

                <h4 class="alert alert-danger p-4">$0.25 per day</h4>

            </article>
        </div>
        <div class="col-sm-12 col-md-6">
            <article class="price-box m-4 border border-danger rounded text-center p-5">

                <h2>1,000,000,000+</h2>

                <h4 class="alert alert-success p-4">Negotiable</h4>

            </article>
        </div>
    </div>

</main><!-- #main -->

<?php
get_footer();