<?php
remove_action('woocommerce_before_subcategory_title', 'woocommerce_subcategory_thumbnail', 10);
remove_action('woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10);
add_action('woocommerce_shop_loop_subcategory_title', 'rf_woocommerce_template_loop_category_title', 10);

function rf_woocommerce_template_loop_category_title($category)
{
    //$color = get_field('cat_color', $category);

    $thumb_ID = get_term_meta($category->term_id, 'thumbnail_id', true);
    $url = wp_get_attachment_image_url($thumb_ID, 'medium');
    $brands = get_field('cat_brands', $category);
?>

    <div class="rf_subcategory_item">

        <div class="rf_img_box">
            <span></span>
            <img class="rf_thumbnail" alt="<?php echo $category->name ?>" src="<?php echo $url ?>" />
        </div>
        

        <h2 class="woocommerce-loop-category__title">
            <?php echo esc_html($category->name); ?>
        </h2>
        
        <div class="list_brands">
            <?php foreach ($brands as $br) { ?>
                <a class="rf_brand_link" href="#"><?php echo $br->name?></a>
            <?php } ?>
        </div>

    </div>
<?php
}
