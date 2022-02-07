<?php

/**
 * CHECKOUT PAGE LABEL CHANGE
 */
add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');
function custom_override_checkout_fields($fields)
 {
    $fields['billing']['billing_country']['label'] = 'Country';
    // THE FOLLOWING DIDN'T WORK FOR LABEL BUT PLACEHOLDER WORKED
    // $fields['billing']['billing_city']['label'] = 'City';
    unset($fields['billing']['billing_city']['label']);
    $fields['billing']['billing_city']['placeholder'] = 'City';
    unset($fields['billing']['billing_postcode']['label']);
    $fields['billing']['billing_postcode']['placeholder'] = 'Zip';
    $fields['billing']['billing_email']['label'] = 'Email';
    
 return $fields;
 }

// THE FOLLOWING WORKS PERFECTLY, BUT DIDN'T NEED THIS TIME
// I'll just use the place holder one above and remove the City label altogether
 
// add_filter( 'woocommerce_default_address_fields' , 'wpse_120741_wc_def_state_label' );
// function wpse_120741_wc_def_state_label( $address_fields ) {
//      $address_fields['city']['label'] = 'City';
//      return $address_fields;
// }
/**
 * CHANGE THE WORD PRODUCT TO POINTS
 */
// Alter WooCommerce Checkout Text
add_filter( 'gettext', function( $translated_text ) {
    if ( 'Product' === $translated_text ) {
        $translated_text = 'Listing Days';
    }
    return $translated_text;
} );

/**
 * HERE GOES ALL THE SMALL HELPER FUNCTIONS FOR WOOCOM
 */

// This is to remove product page links from the Shop or Product List

remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 10);

/**
 * REMOVE WHAT IS PAYPAL FROM CHECKOUT PAGE
 */
add_filter('woocommerce_gateway_icon', 'bbloomer_remove_what_is_paypal', 10, 2);

function bbloomer_remove_what_is_paypal($icon_html, $gateway_id)
{
    if ('paypal' == $gateway_id) {
        $icon_html = '<img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" alt="PayPal Acceptance Mark">';
    }
    return $icon_html;
}

/**
 * REMOVE ADDITIONAL INFO OR ORDER NOTES FROM CHECKOUT PAGE
 */

add_filter( 'woocommerce_enable_order_notes_field', '__return_false', 9999 );

// Remove Order Notes Field

add_filter( 'woocommerce_checkout_fields' , 'SELFLIST_order_notes' );

function SELFLIST_order_notes( $fields ) {

unset($fields['order']['order_comments']);

return $fields;

}