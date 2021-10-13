<?php
/**
 * The template for displaying all pages
 * Template Name: List Customer Orders
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
// $user_points = get_field('selflist_points', 'user_' . $current_user->id);
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

            <style>
            #sale-image-square:hover {
                box-shadow: 2px 2px 6px gray;
            }
            </style>
            <section>
                <figure>
                    <a href="/list-customer-add-points/">
                        <img class="mx-auto d-block" id="sale-image-square"
                            src="/wp-content/uploads/Sale-5000-square.jpg" alt="">
                    </a>
                </figure>
            </section>

        </div>
        <!-- LEFT PROFILE MENU COLUMN ENDS -->
        <!-- RIGHT PROFILE CONTENT COLUMN -->
        <div class="col-sm-12 col-md-8">

            <h3 class="text-uppercase"><small class="font-weight-bold">My Orders</small></h3>
            <!-- <h2 class="h2">
                <?php echo $current_user->user_firstname . ' ' . $current_user->user_lastname; ?>'s Orders
            </h2> -->
            <hr>

            <?php 
      // SETTING ARGS FOR WOOCOM ORDERS
      //Create $args array 
        $args = array(
        'numberposts' => -1,
        'meta_key' => '_customer_user',
        'meta_value' => $current_user->ID,
        'post_type' => wc_get_order_types(),
        'post_status' => array_keys( wc_get_is_paid_statuses() ),
        );

        // GETTING CURRENT LOGGEDIN USER'S ORDERS
        $customer_orders = get_posts( $args );

        // loop through the orders and return the IDs 
        $product_ids = array();
        foreach ( $customer_orders as $customer_order ) {
          echo '<h5><span class="font-weight-bold">Order ID: </span>' . $customer_order->ID . '</h5>';
          $order = wc_get_order( $customer_order->ID );
          $items = $order->get_items();
          
          foreach ( $items as $item ) {
            $product_id = $item->get_product_id();
            $product_ids[] = $product_id;
            echo '--------- Product Info ---------';
            $product = wc_get_product( $product_id );
            echo '<h6><span class="font-weight-bold">Product Id is </span>' . $product->get_id() . '</h6>';
            echo '<h6><span class="font-weight-bold">Product Name: </span>' . $product->get_name() . '</h6>';
            echo '<h6><span class="font-weight-bold">Product Description: </span>' . $product->get_description() . '</h6>';
            echo '<h6><span class="font-weight-bold">Product Value: </span> <span class="text-danger">$' . $product->get_price() . '</span></h6>';
            echo '<h6><span class="font-weight-bold">Purchase Date: </span>' . $order->get_date_created()->format('M d, Y') . '</h6>';
        
          }
        }
      ?>

        </div>
        <!-- RIGHT PROFILE CONTENT COLUMN ENDS -->

    </div> <!-- END ROW -->

    <hr>

</main><!-- #main -->

<?php
get_footer();