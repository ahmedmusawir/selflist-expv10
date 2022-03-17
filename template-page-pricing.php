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
.page-template-template-page-pricing h5 {
    /* font-weight: bold !important; */
    color: black !important;
}

/* DESKTOP VERSION */
@media (min-width: 821px) {
    .page-template-template-page-pricing .price-box-desktop {
        display: block;
    }

    .page-template-template-page-pricing .price-box-mobile {
        display: none;
    }

    .page-template-template-page-pricing .price-box-tablet {
        display: none;
    }

}

/* TABLET VERSION */
/* @media (max-width: 820px) {
    .page-template-template-page-pricing .price-box-desktop {
        display: none;
    }

    .page-template-template-page-pricing .price-box-mobile {
        display: none;
    }

    .page-template-template-page-pricing .price-box-tablet h5 {
        font-size: 1.1rem !important;
    }

} */

@media (max-width: 1400px) {
    .page-template-template-page-pricing .price-box-desktop {
        display: none;
    }

    .page-template-template-page-pricing .price-box-tablet {
        display: none;
    }

    .page-template-template-page-pricing .price-box-mobile {
        display: block;
        /* border: 5px dotted red; */
    }

    .page-template-template-page-pricing .price-box-mobile h5 {
        font-size: 1.1rem !important;
    }

}
</style>

<main id="primary" class="site-main container-fluid">

    <h1 class="text-center font-weight-bold mt-5 mb-3">PRICING</h1>

    <div class="row">
        <!-- DESKTOP VERSION -->
        <div class="price-box-desktop col-sm-12 col-md-12 col-lg-6 mx-auto">
            <article class="m-4">
                <h5>Your first 1000 one-day listings ... ... ... ... ... ... ... ... <span
                        class="font-weight-bold">Free</span></h5>
                <h5>Your next million one-day listings ... ... ... ... ... ... &nbsp;<span
                        class="font-weight-bold">$0.25 per one-day
                        listing</span></h5>
                <h5>Your next million one-day listings ... ... ... ... ... ... &nbsp;<span
                        class="font-weight-bold">Negotiable</span></h5>

                <a href="/list-customer-add-points/" class="btn btn-danger btn-block mt-5">ADD</a>

            </article>
        </div>

        <!-- TABLET VERSION -->
        <!-- <div class="price-box-tablet col-sm-12 col-md-11 col-lg-10 mx-auto">
            <article class="m-4">
                <h5>Your first 1000 one-day listings ... ... ... ... ... <span class="font-weight-bold">Free</span></h5>
                <h5>Your next million one-day listings ... ... ... &nbsp;<span class="font-weight-bold">$0.25 per
                        one-day
                        listing</span></h5>
                <h5>Your next million one-day listings ... ... ... &nbsp;<span
                        class="font-weight-bold">Negotiable</span></h5>

            </article>
        </div> -->

        <!-- MOBILE VERSION -->
        <div class="price-box-mobile col-12 col-sm-12 col-md-12  mx-auto">
            <article class="m-4 text-center">
                <h5>Your first 1000 one-day listings </h5>
                <h5 class="font-weight-bold">Free</h5>
                <h5>Your next million one-day listings </h5>
                <h5 class="font-weight-bold">$0.25 per one-day listing</h5>
                <h5>Your next million one-day listings </h5>
                <h5 class="font-weight-bold">Negotiable</h5>
                <div class="w-50 mx-auto">
                    <a href="/list-customer-add-points/" class="btn btn-danger btn-block mt-5">ADD</a>
                </div>

            </article>
        </div>


    </div>

</main><!-- #main -->

<?php
get_footer();