<?php
/**
 * The template for displaying all pages
 * Template Name: List Publish Summary
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
// COLLECTING USER INFO 
$current_user_id = get_current_user_id();
$user_points = get_field('selflist_points', 'user_' . $current_user_id);
?>

<section id="list-publish-success" class="text-center">
    <h3 class="text-uppercase mt-5"><small class="font-weight-bold">List Publish Summary</small></h3>
    <h6 class="text-uppercase">
        <small>
            Lister ID:
            <strong class="text-danger">
                <span class="current-user-id">
                    <?php echo $current_user_id; ?>
                </span>
            </strong>
            &nbsp; Available Points:
            <strong class="text-danger">
                <span id="payment-summary-avail-points">
                    <?php echo $user_points; ?>
                </span>
            </strong>
        </small>
    </h6>
    <h6 class="text-uppercase font-weight-bold">Listing #<span class="published-post-id"></span></h6>
    <p class="text-uppercase font-weight-bold">
        <small>List Publish Status:
            <strong id="list-publish-status">_____________</strong>
        </small><br>
        <small>Lister Points Update Status:
            <strong id="list-point-status">_____________</strong>
        </small>
    </p>
    <h6 class="text-uppercase font-weight-bold">
        My List Has Been Published for <span id="published-for-days" class="text-danger">___________</span> Days.
    </h6>
</section>
<div class="navigation-box container">
    <a href="/list-insert/" class="btn btn-outline-danger float-left">List</a>
    <a href="/list-customer-archive/" class="btn btn-outline-danger float-right">Listings</a>
</div>

<?php
get_footer();