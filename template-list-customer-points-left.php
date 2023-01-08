<?php
/**
 * The template for displaying all pages
 * Template Name: List Customer Days Left
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

<main id="primary" class="site-main container customer-profile-page mt-5">

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
        <style>
        .number-box {
            margin-top: .6rem;
        }
        </style>
        <div class="col-sm-12 col-md-8">
            <div class="number-box font-weight-bold">
                <span class="badge badge-danger py-3 px-4 pt-4">
                    <h1 class="display-5 text-light">
                        <?php echo $user_points; ?>
                    </h1>
                </span>
            </div>

            <!-- <hr> -->

        </div>
        <!-- RIGHT PROFILE CONTENT COLUMN ENDS -->

    </div> <!-- END ROW -->

    <hr>

</main><!-- #main -->

<?php
get_footer();