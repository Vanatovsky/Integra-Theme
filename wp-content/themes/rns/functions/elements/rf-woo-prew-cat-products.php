<?php
remove_action('woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10);
remove_action('woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10);
add_action('woocommerce_shop_loop_subcategory_title', 'rf_woocommerce_template_loop_category_title', 10);
function rf_woocommerce_template_loop_category_title($category)
{
    //$color = get_field('cat_color', $category);

    $thumb_ID = get_term_meta($category->term_id, 'thumbnail_id', true);
    $url = wp_get_attachment_image_url($thumb_ID, 'medium');


    $prod_term    =    get_term($category->term_id, 'product_cat');
    $description =    $prod_term->description;

?>

    <div class="rf_subcategory_item">

        <h2 class="woocommerce-loop-category__title">
            <?php
            echo esc_html($category->name);

            if ($category->count > 0) {
                echo apply_filters('woocommerce_subcategory_count_html', ' <mark class="count">(' . esc_html($category->count) . ')</mark>', $category);
            }
            ?>
        </h2>

        <div class="rf_description"><?php echo $description ?></div>

        <img class="rf_thumbnail" alt="<?php echo $category->name ?>" src="<?php echo $url ?>" />

    </div>
<?php
}
