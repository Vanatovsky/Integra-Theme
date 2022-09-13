<?php

remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);



add_action('woocommerce_before_shop_loop_item', 'rf_open_product_item', 10);
function rf_open_product_item()
{
?>
    <div class="rf_product_prew_item">
        <a class="rf_pr_main_link" href="<?php echo get_permalink() ?>">
        <?php
    }

    add_action('woocommerce_after_shop_loop_item', 'rf_close_product_item', 10);
    function rf_close_product_item()
    {
        ?>
        </a>
    </div>
<?php
    }


    add_action('woocommerce_before_shop_loop_item_title', 'rf_product_prew_content', 20);
    function rf_product_prew_content()
    {

        global $product;

        $description = get_field('short_prew_desc');

        $is_new = get_field('novinka');

        $thum_url = get_the_post_thumbnail_url();
?>


    <div class="rf_cont">

        <div class="rf_product_thubnail">
            <img alt="<?php echo get_the_title() ?>" src="<?php echo $thum_url ?>" />
        </div>

        <h3><?php echo get_the_title() ?></h3>

        <div class="rf_descr">
            <?php echo $description ?>
        </div>

        <div class="rf_price">
            <?php if ($product->get_price()) { ?>
                <?php echo $product->get_price_html() ?>
            <?php } else { ?>
                <b class="rf_know_price waves-light modal-trigger">Узнать цену</b>
            <?php } ?>
        </div>

        <?php if ($product->is_type('variable')) { ?>
            <b class="btn waves_effect">Выбрать вариант</b>
        <?php } else { ?>
            <a class="btn waves_effect" href="?add-to-cart=<?php echo $product->get_ID() ?>">В корзину</a>
        <?php } ?>

    </div>




<?php
    }
