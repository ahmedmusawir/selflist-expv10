<?php

// MOOSE FUNCTIONS START ============================================================================

function add_points_to_user_profile($order_id)
{
    $order = wc_get_order($order_id);
    $user = $order->get_user();

    // GETTING PRODUCT PURCHASED
    $items = $order->get_items();
    foreach ($items as $item) {
        $product_id = $item->get_product_id();
        // echo '<br>Product ID: ' . $product_id;
        $product = wc_get_product($product_id);
        $product_points = get_field('product_points', $product_id);
        // echo '<br>New Selflist Points: ' . $product_points;
    }
    // GETTING USER'S OLD POINTS
    $points_from_user = get_field('selflist_points', 'user_' . $user->ID);

    // NEW POINT CALCULATION
    $new_points_total = $points_from_user + $product_points;
    // echo '<br>New Total Points: ' . $new_points_total;
    // UPDATE THE USER'S POINTS FIELD
    update_user_meta($user->ID, 'selflist_points', $new_points_total);
}

add_action('woocommerce_payment_complete', 'add_points_to_user_profile');

// MOOSE FUNCTIONS END ==============================================================================