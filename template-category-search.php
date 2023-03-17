<?php
/**
 * The template for displaying all pages
 * Template Name: Category Search Index
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

<div id="primary" class="site-main container pt-5">

    <section id="selflist-search-input-box" class="selflist-search-input-box">

        <input type="text" id="cat-search-input-json" class="selflist-search-input" placeholder="SEARCH CATEGORIES">
        <i class="fas fa-search"></i>

    </section>

    <div class="text-center d-flex justify-content-center">
        <div class="spinner-block">
            <!-- SPINNER GOES HERE -->
        </div>
    </div>

    <div id="category-search-json-result" class="card-columns">

        <!-- SEARCH RESULTS GO HERE ... -->

    </div> <!-- #main -->

    <div id="SELFLIST-HOME-PAGE-DETAIL-BLOCK">
        <!-- THIS IS WHERE THE HOME PAGE DETAILS REACT APP GOES -->
    </div>

    <section class="row bullet-points-row">
        <div class="col-sm-4 col-md-4 col-lg-4">
            <article class="bullet-content">
                <li class="bullet-point"><i class="far fa-dot-circle"></i> Complete transparency</li>
                <li class="bullet-point"><i class="far fa-dot-circle"></i> Global reach</li>
                <li class="bullet-point"><i class="far fa-dot-circle"></i> Fully devmocratized market</li>
                <li class="bullet-point"><i class="far fa-dot-circle"></i> Very cheap</li>
                <li class="bullet-point"><i class="far fa-dot-circle"></i> Fastest new listing set up</li>
                <li class="bullet-point"><i class="far fa-dot-circle"></i> Any language</li>
                <li class="bullet-point"><i class="far fa-dot-circle"></i> Activate listing</li>
                <li class="bullet-point"><i class="far fa-dot-circle"></i> Reverse auctions on demand</li>
            </article>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4">
            <article class="bullet-content">
                <li class="bullet-point"><i class="far fa-dot-circle"></i> Create an account</li>
                <li class="bullet-point"><i class="far fa-dot-circle"></i> Use an existing category or make new</li>
                <li class="bullet-point"><i class="far fa-dot-circle"></i> Use existing market or create new</li>
                <li class="bullet-point"><i class="far fa-dot-circle"></i> 140 character description</li>
                <li class="bullet-point"><i class="far fa-dot-circle"></i> Choose your social media links</li>
                <li class="bullet-point"><i class="far fa-dot-circle"></i> Choose number of listing days</li>
                <li class="bullet-point"><i class="far fa-dot-circle"></i> Share on any social media</li>
                <li class="bullet-point"><i class="far fa-dot-circle"></i> Complete listings of everything everywhere
                </li>
            </article>
        </div>
        <div class="col-sm-4 col-md-4 col-lg-4">
            <article class="bullet-content">
                <li class="bullet-point"><i class="far fa-dot-circle"></i> Click to sign on</li>
                <li class="bullet-point"><i class="far fa-dot-circle"></i> Click JOIN</li>
                <li class="bullet-point"><i class="far fa-dot-circle"></i> List first and last name</li>
                <li class="bullet-point"><i class="far fa-dot-circle"></i> List email address</li>
                <li class="bullet-point"><i class="far fa-dot-circle"></i> Create password/conform</li>
                <li class="bullet-point"><i class="far fa-dot-circle"></i> Link your favorite social media</li>
                <li class="bullet-point"><i class="far fa-dot-circle"></i> Share on your favorite social media</li>
            </article>
        </div>

    </section>
    <hr class="bg-danger">
    <section class="row latest-post-row">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <?php

the_widget('WP_Widget_Recent_Posts');
?>

        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="widget widget_categories">
                <h2 class="widget-title"><?php esc_html_e('Most Used Categories', 'cyberize-app-dev');?></h2>
                <ul>
                    <?php
wp_list_categories(
    array(
        'orderby' => 'count',
        'order' => 'DESC',
        'show_count' => 1,
        'title_li' => '',
        'number' => 10,
    )
);
?>
                </ul>
            </div><!-- .widget -->
        </div>
    </section>
    <hr class="bg-danger">

</div>
<?php
get_footer();