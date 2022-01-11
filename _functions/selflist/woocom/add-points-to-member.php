<?php

// MOOSE FUNCTIONS START ============================================================================

function add_points_to_user_profile($order_id)
{
    $order = wc_get_order($order_id);
    $user = $order->get_user();
    $total_quantity = 0;

    // GETTING PRODUCT PURCHASED
    $items = $order->get_items();
    // write_log("ITEMS IN CURRENT ORDER: ");
    // write_log($items);
    // write_log('====================================');

    foreach ($items as $item) {
        $product_id = $item->get_product_id();
        // echo '<br>Product ID: ' . $product_id;
        $product = wc_get_product($product_id);
        $product_points = get_field('product_points', $product_id);
        $total_quantity += $item->get_quantity();
    }
    // DISPLAY TOTAL NUMBER OF ITEMS IN THE ORDER
    write_log("DISPLAY TOTAL NUMBER OF ITEMS IN THE ORDER: ");
    write_log($total_quantity);
    write_log("================================");

    // DISPLAY PRODUCT POINTS ABOUT TO BE ADDED
    write_log("PRODUCT POINTS ABOUT TO BE ADDED: ");
    write_log($product_points);
    write_log('TIMES ' . $total_quantity);
    write_log("================================");

    // GETTING USER'S OLD POINTS
    $points_from_user = get_field('selflist_points', 'user_' . $user->ID);
    write_log("CURRENT USER POINTS: " . $points_from_user);

    // NEW POINT CALCULATION
    $new_points_total = $points_from_user + ($product_points * $total_quantity);
    write_log('NEW TOTAL POINTS: ' . $new_points_total);

    // DEBUG LOG ENTRY
    // write_log("Current Order ID: ");
    // write_log($order);
    // write_log("User Info: ");
    // write_log($user);

    // UPDATE THE USER'S POINTS FIELD
    update_user_meta($user->ID, 'selflist_points', $new_points_total);
}

add_action('woocommerce_payment_complete', 'add_points_to_user_profile');

// MOOSE FUNCTIONS END ==============================================================================