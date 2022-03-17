<?php
/**
 * The template for displaying all pages
 * Template Name: List Customer Add Points
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
<?php 
/**
 * CUSOMER/USER PROFILE
 */
$current_user = wp_get_current_user();
$user_points = get_field('selflist_points', 'user_' . $current_user->ID);
// $user_registered = $current_user->user_registered;
// $user_email = $current_user->user_email;
// $user_total_list_count = count_user_posts($current_user->id, 'post', false); // false for all posts
// $user_published_list_count = count_user_posts($current_user->id, 'post', false); // true for public only 
// echo '<pre>';
// print_r($current_user);
// echo '</pre>';

?>

<main id="primary" class="site-main container customer-profile-page">

    <div class="row">
        <!-- LEFT PROFILE MENU COLUMN -->
        <div class="col-sm-12 col-md-4">
            <?php
			wp_nav_menu(
				array(
					'theme_location' => 'customer-profile-menu',
					'menu_id'        => 'profile-menu',
				)
			);
			?>
        </div>
        <!-- LEFT PROFILE MENU COLUMN ENDS -->
        <!-- RIGHT PROFILE CONTENT COLUMN -->
        <div class="col-sm-12 col-md-8">
            <!-- <h3 class="text-uppercase"><small class="font-weight-bold">Available Listing Days <span
                        class="badge badge-pill badge-danger"><?php echo $user_points; ?></span></small></h3> -->
            <!-- <h6 class="h6 text-uppercase font-weight-bold mb-5">
                Available Points:
                <strong class="text-danger">
                    <span id="payment-summary-avail-points">
                        <?php echo $user_points; ?>
                    </span>
                </strong>
            </h6> -->
            <h4 class="h4">Add Listing Days:</h4>
            <style>
            .woocommerce-loop-product__title {
                display: none;
            }
            </style>
            <hr>
            <?php echo do_shortcode('[products]'); ?>

        </div>
        <!-- RIGHT PROFILE CONTENT COLUMN ENDS -->

    </div> <!-- END ROW -->

    <hr>

</main><!-- #main -->

<?php
get_footer();