<?php

use RankMath\Analytics\AJAX;

add_action("wp_ajax_rf_add_to_cart", "rf_add_to_cart_ajax_function");
add_action("wp_ajax_nopriv_rf_add_to_cart", "rf_add_to_cart_ajax_function");
function rf_add_to_cart_ajax_function()
{
    ob_start();


    $product_id        = $_REQUEST['product_id'];
    $variation_id      = $_REQUEST['variation_id'];
    $quantity          = $_REQUEST['quantity'];
    $passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
    $product_status    = get_post_status($product_id);

    if ($passed_validation && WC()->cart->add_to_cart($product_id, $quantity, $variation_id) && 'publish' === $product_status) {
        $data = array(
            'error'       => false,
            'product_id'  => $product_id,
            'var_id'      => $variation_id,
            'quantity'    => $quantity
        );
        wp_send_json($data);
    } else {
        $data = array(
            'error'       => true,
            'product_url' => apply_filters('woocommerce_cart_redirect_after_error', get_permalink($product_id), $product_id)
        );
        wp_send_json($data);
    }
    die();
}
