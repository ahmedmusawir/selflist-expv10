<?php 
/**
 * HERE GOES ALL THE SMALL HELPER FUNCTIONS FOR WOOCOM
 */

 // This is to remove product page links from the Shop or Product List

 remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
 remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 10 );