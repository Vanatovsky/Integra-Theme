<?php

add_action('woocommerce_before_cart', 'rf_begin_cart', 5);
function rf_begin_cart()
{
?>
    <div class="rf_cart_page">
        <div class="rf-container">
        <?php
    }

    add_action('woocommerce_after_cart', 'rf_end_cart', 50);
    function rf_end_cart()
    {
        ?>
        </div><!-- end .rf-container -->
    </div><!-- end .rf_cart_page -->
<?php
    }


    remove_action('woocommerce_cart_is_empty', 'wc_empty_cart_message', 10);
    add_action('woocommerce_cart_is_empty', 'rf_wc_empty_cart_message', 10);
    function rf_wc_empty_cart_message()
    {
?>
    <div class="rf-container">
        <br /><br /><br />
        <p>Товары в корзине отсутствуют</p>
        <br /><br />
        <br /><br />
    </div>
<?php
    }

?>