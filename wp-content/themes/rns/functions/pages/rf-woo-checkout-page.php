<?php

remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10);
remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display', 10);


//add_action('woocommerce_before_checkout_form', 'rf_begin_checkout', 5);

function rf_begin_checkout()

{

?>

    <div class="rf_cart_page">

        <div class="rf-container">

        <?php

    }



    //add_action('woocommerce_checkout_order_review', 'rf_end_checkout', 50);

    function rf_end_checkout()

    {

        ?>



        </div><!-- end .rf-container -->

    </div><!-- end .rf_cart_page -->

<?php

    }





    //Сортировка полей в заказе

    function sort_fields_billing($fields)

    {



        $fields["billing"]["billing_first_name"]["priority"] = 1;

        $fields["billing"]["billing_last_name"]["priority"] = 2;

        $fields["billing"]["billing_company"]["priority"] = 3;

        $fields["billing"]["billing_address_1"]["priority"] = 6;

        $fields["billing"]["billing_address_2"]["priority"] = 8;

        $fields["billing"]["billing_city"]["priority"] = 7;

        $fields["billing"]["billing_postcode"]["priority"] = 9;

        $fields["billing"]["billing_country"]["priority"] = 6;

        $fields["billing"]["billing_state"]["priority"] = 11;

        $fields["billing"]["billing_email"]["priority"] = 5;

        $fields["billing"]["billing_phone"]["priority"] = 4;



        return $fields;
    }



    add_filter("woocommerce_checkout_fields", "sort_fields_billing");
