<?php
/**
 * The template for displaying all pages
 * Template Name: List TEST
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

    <h2 class="text-center font-weight-bold mt-5">CHECK MAIN CATS</h2>

    <?php

$category_name = 'Tutoring';
// $category_name = 'Biology';
// $category_name = 'english';

if (term_exists($category_name, 'category')) {

   $cat_objs = get_categories([
        'taxonomy' => 'category',
        'parent' => 0,
        'hide_empty' => false
    ]);

        foreach ($cat_objs as $cat) {
        # code...
        // echo $cat->name;
        // echo '<br>';
        // echo $category_name;
        // echo '<br>';

        if ($cat->name === $category_name) {
          
            echo "
          <div class='alert alert-danger rounded-0' role='alert'>
          The Main Category <strong>$category_name</strong> already exists ...
          The Main Category must be unique ...
          </div>";
          
        }
    }
  
}
?>

</main><!-- #main -->

<?php
get_footer();