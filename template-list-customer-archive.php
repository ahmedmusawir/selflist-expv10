<?php
/**
 * The template for displaying all pages
 * Template Name: List Customer Archive
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
?>

<main id="primary" class="site-main container customer-profile-page">

    <div class="row">
        <!-- LEFT PROFILE MENU COLUMN -->
        <div class="col-sm-12 col-md-4">
            <?php
wp_nav_menu(
    array(
        'theme_location' => 'customer-profile-menu',
        'menu_id' => 'profile-menu',
    )
);
?>

            <style>
            #sale-image-square:hover {
                box-shadow: 2px 2px 6px gray;
            }
            </style>
            <!-- <section>
                <figure>
                    <a href="/list-customer-add-points/">
                        <img class="mx-auto d-block" id="sale-image-square" src="/wp-content/uploads/Square.jpg" alt="">
                    </a>
                </figure>
            </section> -->

        </div>
        <!-- LEFT PROFILE MENU COLUMN ENDS -->
        <!-- RIGHT PROFILE CONTENT COLUMN -->
        <div class="col-sm-12 col-md-8">
            <!-- <a href="/list-insert/" class="btn btn-danger float-right">List</a> -->
            <!-- <h3 class="text-uppercase"><small class="font-weight-bold">MANAGE MY LISTINGS</small></h3> -->
            <!-- <h6 class="h6 text-uppercase font-weight-bold">
                Available Listing Days:
                <strong class="text-danger">
                    <span id="payment-summary-avail-points">
                        <?php echo $user_points; ?>
                    </span>
                </strong>
            </h6> -->
            <!-- <h3 class="text-uppercase"><small class="font-weight-bold">MY LISTINGS</small></h3> -->
            <!-- <h2 class="h2"><?php echo $current_user->display_name; ?>'s Lists</h2> -->
            <!-- <h2 class="h2">
                <?php echo $current_user->user_firstname . ' ' . $current_user->user_lastname; ?>'s Lists
            </h2> -->

            <?php 
// PUBLISHED LIST COUNT
$arg_published = array(
    'author' => $current_user->ID,
    'orderby' => 'post_date',
    'order' => 'ASC',
    'post_status' => 'publish',
    'posts_per_page' => -1,
);

$current_user_published_posts = get_posts($arg_published);
?>
            <style>
            .the-count {
                line-height: 2rem;
            }
            </style>

            <h5 class="font-weight-bold h5">ACTIVE LISTINGS
                <span
                    class="badge badge-danger badge-pill the-count"><?php echo count($current_user_published_posts); ?></span>
            </h5>

            <?php

// LIST COUNT
// echo '<h6>[ <span><small class="font-weight-bold">TOTAL PUBLISHED LISTINGS:  ' .
// count($current_user_published_posts) .
//     '</small></span> ]
// </h6>';
echo '<hr>';
// DISPLAY LIST
foreach ($current_user_published_posts as $list) {
    echo '<h6><span class="font-weight-bold">Listing ID: </span>' . $list->ID . '</h6>';
    echo '<h6><span class="font-weight-bold">Listing Publish Date: </span>' .
    date('M d, Y', strtotime($list->post_date)) . '</h6>';
    echo '<h6><span class="font-weight-bold">Listing Content: </span>' . $list->post_content . '</h6>';
    // echo '<h6><span class="font-weight-bold">List Status: </span>' . $list->post_status . '</h6>';

    // ========================================= DISPLAY CATEGORY LIST W/ LINKS ========================================

    $taxonomy = 'category';
    $post_id = $list->ID;

    show_all_categories_w_links_and_arrows($post_id, $taxonomy);
    echo '<hr>';
    // DELIST BUTTON -->
    echo '<button class="delist-button-in-user-archive btn btn-outline-danger btn-sm" data-list-id="'. $post_id .'">
    Delist</button>';
    echo '<hr>';

// ========================================= END CATEGORY LIST W/ LINKS ========================================

}
// wp_reset_query();
wp_reset_postdata();
// rewind_posts();
// UNPUBLISHED LIST COUNT
$args_pending = array(
    'author' => $current_user->ID,
    'orderby' => 'post_date',
    'order' => 'ASC',
    'post_status' => 'pending',
    'posts_per_page' => -1,
);

$list = new WP_Query($args_pending);

      ?>


            <h5 class="font-weight-bold h5">NON-ACTIVE LISTINGS <span
                    class="badge badge-danger badge-pill the-count"><?php echo $list->found_posts; ?></span>
            </h5>
            <?php


// echo '<h6>[ <span><small class="font-weight-bold">TOTAL UNPUBLISHED LISTINGS:  ' . $list->found_posts . '</small></span> ]</h6>';
echo '<hr class="bg-danger">';

if ($list->have_posts()):

    while ($list->have_posts()): $list->the_post();

        $list_status = get_query_var('post_status');

        echo '<h6><span class="font-weight-bold text-danger">Listing Status: </span>' . $list->query_vars['post_status'] . '</h6>';

        echo '<h6><span class="font-weight-bold">Listing ID: </span>' . get_the_id() . '</h6>';
        echo '<h6><span class="font-weight-bold">Listing Publish Date: </span>' .
        date('M d, Y', strtotime(get_the_date())) . '</h6>';
        echo '<h6><span class="font-weight-bold">Listing Content: </span>' . get_the_content() . '</h6>';
        // echo '<h6><span class="font-weight-bold">List Status: </span>' . $list->post_status . '</h6>';

        // ========================================= DISPLAY CATEGORY LIST W/ LINKS ========================================

        $post_id = get_the_id();

        /**
             *
             * CATEGORY LIST WITH PARENT CHILD RELATIONSHIP
             *
             */
            $cats = get_the_category($post_id);
            // following funciton is coming from /_functions/selflist/taxonomy/selflist-cat-list-wo-links.php   
            print_taxonomy_ranks_for_listing_preview($cats);

        echo '<hr>';
        // DELIST BUTTON -->
        echo '<button class="relist-button-in-user-archive btn btn-outline-danger btn-sm" data-list-id="'. $post_id .'">
        Relist</button>';
        echo '<button class="delete-button-in-user-archive btn btn-danger btn-sm ml-3" data-list-id="'. $post_id .'">
        Delete</button>';
        echo '<hr>';

        // ========================================= END CATEGORY LIST W/ LINKS ========================================

    endwhile;

endif;

?>
        </div>
        <!-- RIGHT PROFILE CONTENT COLUMN ENDS -->

    </div> <!-- END ROW -->

    <hr>

</main><!-- #main -->

<!-- THE DELSIT MODAL -->

<!-- Modal -->
<div class="modal fade text-center" id="the-DELIST-modal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <!-- <div class="modal-dialog" role="document"> -->
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center bg-dark">
                <!-- <h5 class="modal-title text-light" id="exampleModalLabel">DELIST</h5> -->
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
            </div>
            <div class="modal-body">
                <h4>Listing ID: <span id="DELIST-list-id"></span></h4>
                <!-- <h4>Your List Will Be Deactivated!</h4> -->
            </div>
            <div class="modal-footer justify-content-center">
                <button id="DELIST-close-btn" type="button" class="btn btn-secondary" data-dismiss="modal">
                    Cancel
                </button>
                <button id="DELIST-action-btn" type="button" class="btn btn-primary">
                    Delist
                </button>
            </div>
        </div>
    </div>
</div>

<!-- END THE DELSIT MODAL -->
<!-- THE RELSIT MODAL -->

<!-- Modal -->
<div class="modal fade text-center" id="the-RELIST-modal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <!-- <div class="modal-dialog" role="document"> -->
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center bg-dark">
                <!-- <h5 class="modal-title text-light" id="exampleModalLabel">RELIST</h5> -->
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
            </div>
            <div class="modal-body">
                <h4>Listing ID: <span id="RELIST-list-id"></span></h4>
                <!-- <h4>Your List Will Be Activated!</h4> -->
                <!-- <h5>You have to pay by Points ...</h5> -->
            </div>
            <div class="modal-footer justify-content-center">
                <button id="RELIST-close-btn" type="button" class="btn btn-secondary" data-dismiss="modal">
                    Cancel
                </button>
                <button id="RELIST-action-btn" type="button" class="btn btn-primary">
                    Relist
                </button>
            </div>
        </div>
    </div>
</div>

<!-- END THE RELSIT MODAL -->
<!-- THE DELETE MODAL -->

<!-- Modal -->
<div class="modal fade text-center" id="the-DELETE-modal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <!-- <div class="modal-dialog" role="document"> -->
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center bg-dark">
                <!-- <h5 class="modal-title text-light" id="exampleModalLabel">DELETE</h5> -->
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
            </div>
            <div class="modal-body">
                <h4>Listing ID: <span id="DELETE-list-id"></span></h4>
                <!-- <h5>Your List Will Be Deleted Permanently!</h5> -->
            </div>
            <div class="modal-footer justify-content-center">
                <button id="DELETE-close-btn" type="button" class="btn btn-secondary" data-dismiss="modal">
                    Cancel
                </button>
                <button id="DELETE-action-btn" type="button" class="btn btn-primary">
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>

<!-- END THE DELETE MODAL -->

<?php
get_footer();