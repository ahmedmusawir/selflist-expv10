<?php
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