<?php


remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);
// remove_action('woocommerce_archive_description', 'woocommerce_product_archive_description', 10);


remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
add_action('woocommerce_before_main_content', 'rf_woocommerce_breadcrumb', 20);
function rf_woocommerce_breadcrumb()
{
    echo "<div class='rf-container'>";
    echo do_shortcode('[rank_math_breadcrumb]');
    echo "</div>";
}



add_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description_rf', 10);
function woocommerce_taxonomy_archive_description_rf()
{
    $term = get_queried_object();
?>
    <?php if (is_product_category()) { ?>
        <div class="rf_sub_cats_list">
            <?php echo rf_get_subcategories_visual_list($term->term_id); ?>
        </div>
    <?php } ?>
<?php
}

function rf_get_subcategories_visual_list($id)
{
    $subcategories = get_categories(
        [
            'taxonomy' => "product_cat",
            "hide_empty" => 1, // Скрывать пустые. 1 - да, 0 - нет.
            "parent" => $id
        ]
    );

    $categories_list = "";
    foreach ($subcategories as $sub) {
        $extra_desc = get_field('short_description', $sub);
        $thumb_ID = get_term_meta($sub->term_id, 'thumbnail_id', true);
        $cat_img = "";
        if ($thumb_ID) {
            $image_url = wp_get_attachment_image_url($thumb_ID, 'medium');
            $cat_img = "<div class='img_box' style='background-image:url(" . $image_url . ")'></div> ";
        }
        $p = "<p>" . $extra_desc . "</p>";
        $categories_list .= '<div class="rf_item"><a href="' . esc_url(get_term_link((int)$sub->term_id)) . '"><span>' . esc_html($sub->name) . '</span> ' . $cat_img .  $p . '</a></div>';
    }

    return $categories_list;
}


add_action('woocommerce_before_main_content', 'rf_woo_top_wrapper', 5);
function rf_woo_top_wrapper()
{
?>

    <div id="shop_page">
    <?php
}

add_action('woocommerce_before_shop_loop', 'rf_open_filter_box', 9);
function rf_open_filter_box()
{
    ?>
        <div class="rf_desctop_filter_box">
            <div class="rf-container">




            <?php
        }


        add_action("woocommerce_before_shop_loop", "rf_left_filter_view", 30);
        function rf_left_filter_view()
        {
        ?>
            <div class="rf_left_filter">
        
                <?php
                do_action("rf_left_filter_hook");
                ?>
        
            </div>
        <?php
        }


        add_action('woocommerce_before_shop_loop', 'rf_close_filter_box', 32);
        function rf_close_filter_box()
        {
            ?>
            </div>
        </div>
    <?php
        }

        add_action('woocommerce_before_shop_loop', 'rf_open_shop_loop', 35);
        function  rf_open_shop_loop()
        {
    ?>
        <div class="rf_shop_loop">
            <?php
            if (is_product_category()) {
                $category = get_queried_object();
                $category_id = $category->term_id;
                $display_type = get_term_meta($category_id)['display_type'][0];

                $class_for_product_box = "";
                if ($display_type == 'subcategories') {
                    $class_for_product_box = "rf_subcategories";
                }
            }

            if (is_shop()) {
                $class_for_product_box = "rf_subcategories";
            }

            ?>

            <div class="rf-container <?= $class_for_product_box ?> ">
                <?php
            }


            add_action('woocommerce_after_shop_loop', 'rf_bottom_categories', 30);
            function rf_bottom_categories()
            {
                if (is_product_category()) {
                    $category = get_queried_object();
                    //$category_id = $category->term_id;

                ?>

                    <!-- <pre>  
                    //print_r(get_term_meta($category_id));       
                    </pre> -->

                    <div class="rf_container rf_bottom_description_header_box">
                        <?php
                        $b_header = get_field("bottom_header", $category);
                        if ($b_header) { ?>
                            <h2 class="classic_h"><?php echo $b_header ?></h2>
                        <?php } ?>
                    </div>
                    <div class="rf_container rf_bottom_description_box rf-classic-text">
                        <div class="rf_item">
                            <?php echo get_field("bottom_desc_left", $category) ?>
                        </div>
                        <div class="rf_item">
                            <?php echo get_field("bottom_desc_right", $category) ?>
                        </div>
                    </div>

                <?php
                }
            }


            add_action('woocommerce_after_shop_loop', 'rf_close_shop_loop', 35);
            function  rf_close_shop_loop()
            {
                ?>
            </div>
        </div>
    <?php
            }



            add_filter('woocommerce_page_title', 'filter_function_name_7884');
            function filter_function_name_7884($page_title)
            {
                if (is_product_category()) {
                    $term = get_queried_object();
                    $new_h1 = get_field('main_header', $term);
                    if ($new_h1) {
                        $page_title = $new_h1;
                    }
                }
                return $page_title;
            }

            add_action('woocommerce_sidebar', 'rf_close_div', 50);
