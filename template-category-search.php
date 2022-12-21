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

    <!-- <p class="text-center">Start searching now ...</p> -->

    <section id="selflist-search-input-box" class="selflist-search-input-box">

        <input type="text" id="cat-search-input-json" class="selflist-search-input" placeholder="CATEGORIES">
        <i class="fas fa-search"></i>

    </section>

    <!-- <p class="">( Example: Tutoring )</p> -->



    <div id="category-search-json-result" class="card-columns">


    </div> <!-- #main -->

    <?php
get_footer();