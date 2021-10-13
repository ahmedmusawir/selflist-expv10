<?php
/**
 * The template for displaying all pages
 * Template Name: List Preview
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

<section id="list-preview-ajax-data" class=""></section>
<div class="navigation-box container">
    <a href="/list-insert/" class="btn btn-outline-danger float-left">BACK</a>
    <a href="/list-payment-summary-by-points/" class="btn btn-outline-danger float-right">LIST</a>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/arrive/2.4.1/arrive.min.js"
    integrity="sha512-wkU3qYWjenbM+t2cmvw2ADRRh4opbOYBjkhrPGHV7M6dcE/TR0oKpoDkWXfUs3HrulI2JFuTQyqPLRih1V54EQ=="
    crossorigin="anonymous"></script>

<script>
// jQuery(function($) {
//   $(document).arrive('#for-list-preview-window', function() {
//     var catList = $(this);
//     catList.find('a').removeAttr('href').css('color', 'black');
//   });
// });
</script>

<?php
get_footer();