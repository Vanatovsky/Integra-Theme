<?php



//----PAGES
require get_template_directory() . '/functions/pages/rf-woo-catalog-page.php';
require get_template_directory() . '/functions/pages/rf-woo-product-page.php';
require get_template_directory() . '/functions/pages/rf-woo-cart-page.php';
require get_template_directory() . '/functions/pages/rf-woo-checkout-page.php';

//----ELEMENTS
require get_template_directory() . '/functions/elements/rf-woo-prew-product.php';
require get_template_directory() . '/functions/elements/rf-woo-prew-cat-products.php';


//Удалим классический SiteBar
//remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

//Подключение файла стилей для админа в админке
add_action(
    'admin_footer',
    function () {
        wp_enqueue_style('admin-style', get_template_directory_uri() . '/admin.css', array(), _S_VERSION);
    },
    10
);

add_filter('woocommerce_get_image_size_thumbnail', 'add_thumbnail_size', 1, 10);
function add_thumbnail_size($size)
{

    $size['width'] = 600;
    $size['height'] = 600;
    $size['crop']   = 0; //0 - не обрезаем, 1 - обрезка
    return $size;
}



add_action('wp_footer', 'custom_jquery_add_to_cart_script');
function custom_jquery_add_to_cart_script()
{
    if (is_shop() || is_product_category() || is_product_tag()) : // Only for archives pages
?>
        <script type="text/javascript">
            // Ready state
            (function($) {


                $(document.body).on('adding_to_cart', function() {
                    $('.rf_loader_window').fadeIn(100);
                });

                $(document.body).on('added_to_cart', function() {
                    $('.rf_loader_window').fadeOut(100);
                });



            })(jQuery); // "jQuery" Working with WP (added the $ alias as argument)
        </script>
<?php
    endif;
}


add_action('rf_add_to_cart', 'woocommerce_template_single_add_to_cart', 10);


add_filter('woocommerce_product_add_to_cart_text', 'my_custom_cart_button_text', 10, 2);
function my_custom_cart_button_text($button_text, $product)
{
    if ($product->is_type('variable')) {
        $button_text = 'Выбрать вариант';
    }

    return $button_text;
}

function custom_woocommerce_catalog_orderby($orderby)
{
    unset($orderby["popularity"]); // по популярности
    unset($orderby["rating"]); // по рейтингу
    unset($orderby["date"]); //по новизне или по дате
    //unset($orderby["price"]); //по цене возврастания
    //unset($orderby["price-desc"]); // по цене убывания
    return $orderby;
}
add_filter("woocommerce_catalog_orderby", "custom_woocommerce_catalog_orderby", 20);

//Вывод категорий на страницы каталога
function get_categories_list($categories_list = "")
{
    $category = get_queried_object();

    $cat_main_id = '';
    $in_main = false;
    if ($category->parent == 0) {
        $cat_main_id = $category->term_id;
        $in_main = true;
    } else {
        $cat_main_id = $category->parent;
    }

    $name_main_cat = '';
    if ($in_main) {
        if ($category->name !== 'product') {
            $name_main_cat = 'Все ' . $category->name . ':';
        } else {
            $name_main_cat = 'Вeсь каталог:';
        }
    } else {
        $main_cat = get_term($cat_main_id);
        $name_main_cat = 'Все ' . $main_cat->name . ':';
    }


    $get_categories_product = get_terms("product_cat", [
        "orderby" => "name", // Тип сортировки
        "order" => "ASC", // Направление сортировки
        "hide_empty" => 1, // Скрывать пустые. 1 - да, 0 - нет.
        "parent" => $cat_main_id,
        'count'         => false,
    ]);

    if (count($get_categories_product) > 0) {

        $categories_list = '<ul class="rf_main_categories_list">';

        $active = $in_main ? "class='active'" : '';
        $categories_list .= '<li ' . $active . '><a href="' . get_category_link($main_cat->term_id) . '"> ' . $name_main_cat . '</a></li>';

        foreach ($get_categories_product as $categories_item) {
            $active = '';
            $in = strpos($_SERVER['REQUEST_URI'], $categories_item->slug);
            if ($in) {
                $active = 'class="active"';
            }
            $categories_list .= '<li ' . $active . '><a  href="' . esc_url(get_term_link((int)$categories_item->term_id)) . '">' . esc_html($categories_item->name) . ' (' . esc_html($categories_item->count) . ')</a></li>';
        }

        $categories_list .= '</ul>';
    }

    return $categories_list;
}


//Изменение набора свойств заказа
add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');

function custom_override_checkout_fields($fields)
{
    //unset($fields['billing']['billing_first_name']);// имя
    unset($fields['billing']['billing_last_name']); // фамилия
    //unset($fields['billing']['billing_company']); // компания
    unset($fields['billing']['billing_address_1']); //
    unset($fields['billing']['billing_address_2']); //
    //unset($fields['billing']['billing_city']);
    unset($fields['billing']['billing_postcode']);
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);
    //unset($fields['billing']['billing_phone']);
    //unset($fields['order']['order_comments']);
    //unset($fields['billing']['billing_email']);
    //unset($fields['account']['account_username']);
    //unset($fields['account']['account_password']);
    //unset($fields['account']['account_password-2']);


    unset($fields['billing']['billing_company']); // компания
    unset($fields['billing']['billing_postcode']); // индекс 
    return $fields;
}



//Получить вариацию по умолчанию
function rf_default_var_id($product)
{
    foreach ($product->get_available_variations() as $pav) {
        $def = true;
        $offer_id = '';
        $cur_var_id = '';
        foreach ($product->get_variation_default_attributes() as $defkey => $defval) {
            if ($pav['attributes']['attribute_' . $defkey] != $defval) {
                $def = false;
                continue;
            }
            $cur_var_id = $pav["variation_id"];
        }
        if ($def) {
            $offer_id = $cur_var_id;
            return $offer_id;
        }
    }
    return $offer_id;
}

//Получить одноатрибутную вариацию по значению аттрибута
function rf_attribute_var_id($product, $attribute_name, $attribute_slug)
{
    $var_id = '';
    foreach ($product->get_available_variations() as $pav) {

        $pav_attr_slug = $pav['attributes']['attribute_pa_' . $attribute_name];

        if ($pav_attr_slug == $attribute_slug) {
            $var_id = $pav['variation_id'];
            break;
        }
    }
    return $var_id;
}



function get_catalog_main_categories()
{
    $categories_list = "";
    $get_categories_product = get_categories([
        'taxonomy' => "product_cat",
        "parent" => 0,
        "hide_empty" => 1, // Скрывать пустые. 1 - да, 0 - нет.
    ]);




    if (count($get_categories_product) > 0) {
  
        $categories_list = '<ul class="rf_catalog_list_main_categories">';

        foreach ($get_categories_product as $categories_item) {
  
            $short_descr = get_field('short_description', $categories_item);
            
            if ($short_descr) {

                $active = '';
                $in = strpos($_SERVER['REQUEST_URI'], $categories_item->slug);
                if ($in) {
                    $active = 'class="active"';
                }


                // получим ID картинки из метаполя термина
                $thumb_ID = get_term_meta($categories_item->term_id, 'thumbnail_id', true);
                $cat_img = "";
                if ($thumb_ID) {
                    $image_url = wp_get_attachment_image_url($thumb_ID, 'medium');
                    $cat_img = "<div class='img_box'><img class='rf_img_cat' src='" . $image_url . "' alt='" . esc_html($categories_item->name) . "' /></div> ";
                }



                $subcats = get_categories([
                    'taxonomy' => "product_cat",
                    "hide_empty" => 1, // Скрывать пустые. 1 - да, 0 - нет.
                    "parent" => $categories_item->term_id
                ]);

                $subcats_list = "";

                foreach ($subcats as $subcat) {
                    $subcats_list .= "<a href='" . esc_url(get_term_link((int)$subcat->term_id)) . "'>" . esc_html($subcat->name) . "</a>";
                }

                $categories_list .= '<li ' . $active . '>'
                    . '<a class="main_link" href="' . esc_url(get_term_link((int)$categories_item->term_id)) . '"></a>'
                    . $cat_img
                    . '<span class="rf_cat_name">' . esc_html($categories_item->name)
                    . ' </span>'
                    . '<div class="rf_short_desc">' . $short_descr . '</div>'
                    . '<div class="rf_subcats">' . $subcats_list . '</div>'
                    . ' </li>';
            }
        }

        $categories_list .= '</ul>';
    }

    return $categories_list;
}