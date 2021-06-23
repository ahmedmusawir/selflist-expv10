<?php

/**
 * Add Bootstrap form styling to WooCommerce fields
 *
 * @since  1.0
 * @refer  http://bit.ly/2zWFMiq
 */
function iap_wc_bootstrap_form_field_args($args, $key, $value)
{

    $args['input_class'][] = 'form-control';
    return $args;
}
add_filter('woocommerce_form_field_args', 'iap_wc_bootstrap_form_field_args', 10, 3);