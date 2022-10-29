<?php

//Удаление стандартной гадереи
remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20);

//Удаление стандартных полей
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 6);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);

remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

remove_action('woocommerce_product_tabs', 'woocommerce_default_product_tabs', 10);
remove_action('woocommerce_product_tabs', 'woocommerce_sort_product_tabs', 99);

remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);

// remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

add_action('woocommerce_after_single_product_summary', 'rf_open_container_box', 19);
add_action('woocommerce_after_single_product_summary', 'rf_close_div', 21);




//Контент карточки
add_action('woocommerce_single_product_summary', 'get_product_content', 5);
function get_product_content()
{

    global $product;

    $arr_var_gallery = [];

    $url = wp_get_attachment_url(get_post_thumbnail_id($product->ID));

    if ($url) {
        $arr_var_gallery[] = get_post_thumbnail_id($product->ID);
    }

    if ($product->is_type('variable')) {
        $args = array(
            'post_type'     => 'product_variation',
            'post_status'   => array('private', 'publish'),
            'numberposts'   => -1,
            'orderby'       => 'menu_order',
            'order'         => 'ASC',
            'post_parent'   => get_the_ID() // get parent post-ID
        );
        $variations = get_posts($args);

        foreach ($variations as $variant) {
            $url = get_post_thumbnail_id($variant->ID);
            if ($url) {
                $arr_var_gallery[] = get_post_thumbnail_id($variant->ID);
            }
        }
    }

    $gallery_ids = $product->get_gallery_attachment_ids();
    if ($gallery_ids) {
        foreach ($gallery_ids as $gimg) {
            $arr_var_gallery[] = $gimg;
        }
    }

    $is_new = get_field('novinka');



    //Апсейлы
    $show_all_tables = get_field('show_all_tables');

    $upsale_ids = $product->get_upsell_ids();
    $crossale_groupe = [
        [
            'name' => get_field('prod_name_in_upsale_group'),
            'link' => get_the_permalink()
        ]
    ];
    foreach ($upsale_ids as $id_ups) {
        $crossale_groupe[] = [
            'name' => get_field('prod_name_in_upsale_group', $id_ups),
            'link' => get_permalink($id_ups)
        ];
    }
    function cmpoo($a, $b)
    {
        return strnatcmp($a["name"], $b["name"]);
    }
    usort($crossale_groupe, "cmpoo");


    //Список всех аттрибутов
    $all_attributes =  wc_get_attribute_taxonomies();
    $all_variations_data = [];
    $all_variations_attributes = [];
    $all_variations_attributes_names = [];

    //Перебор вариаций для понимания какие аттрибуты учавствуют в вариациях
    //И создадим массив со всеми вариациями

    if ($product->is_type('variable')) {
        foreach ($variations as $variant) {
            $product_variation = new WC_Product_Variation($variant->ID);
            $all_variations_data[] = $product_variation;
            foreach ($product_variation->attributes as $k => $val) {
                foreach ($all_attributes as $attr_all) {
                    if ('pa_' . $attr_all->attribute_name == $k) {
                        if (!in_array($k,  $all_variations_attributes_names)) {

                            $all_variations_attributes_names[] = $k;
                            $all_variations_attributes[] = [
                                'name' => $k,
                                'title' => $attr_all->attribute_label
                            ];
                        }
                    }
                }
            }
        }
    }

    //Массив для названий аттибутов
    //$all_variations_attributes_names

    $data_vars_for_view = [];
    //Создадим массив с данными вариаций
    foreach ($all_variations_data as $var_data) {

        $one_obj = [$var_data->attribute_summary, $var_data->get_parent_id(), $var_data->get_variation_id(), $var_data->get_sku(), json_encode($var_data->attributes)];

        // echo "<pre>";
        // print_r($var_data->attributes);
        // echo "<br/>";
        // print_r($var_data->get_parent_id());
        // echo "</pre><br/>";

        foreach ($var_data->attributes as $k => $a) {

            foreach ($all_variations_attributes_names as $n) {

                if ($n == $k) {

                    $term_a = get_terms([
                        'taxonomy' => $k,
                        'hide_empty' => false,
                        'slug' => $a
                    ]);

                    if ($term_a[0]->slug == $a) {
                        $one_obj[] = $term_a[0]->name;
                    } else {
                        $one_obj[] = "";
                    }
                }
            }
        }

        //Предпоследним вставим цену
        if ($var_data->get_price()) {
            $one_obj[] = "<b>" . number_format($var_data->get_price(), 0, '.', ' ') . " ₽</b>";
        } else {
            $one_obj[] = "<b> - </b>";
        }


        $data_vars_for_view[] = $one_obj;
    }

    $crosssell_ids = get_post_meta(get_the_ID(), '_crosssell_ids');

?>


    <div class="spritespin"></div>

    <div class="rf_product_page_top rf-container">

        <div class="rf_left">
            <h1><?php echo get_the_title() ?></h1>

            <p class="rf_excerpt"><?php echo get_the_excerpt() ?></p>

            <div class="rf_main_attributes">
                <?php
                //Вывод аттрибутов которые не учавствуют в вариативности
                foreach ($all_attributes as $ma) { ?>
                    <?php if (!in_array('pa_' . $ma->attribute_name, $all_variations_attributes_names)) { ?>
                        <?php
                        $values = get_the_terms(get_the_ID(), 'pa_' . $ma->attribute_name);
                        $value_arr = [];
                        if ($values) {
                            foreach ($values as $v) {
                                $value_arr[] = $v->name;
                            }
                            $value_str = implode(',', $value_arr);
                        ?>
                            <div class="row">
                                <div class="col s6"><?php echo $ma->attribute_label ?></div>
                                <div class="col s6"><?php echo $value_str ?></div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </div>



            <?php
            add_action('rf_custom_description', 'woocommerce_template_single_add_to_cart', 10);
            do_action('rf_custom_description') ?>

            <div class="rf_add_to_cart_info_wrapper">

                <div class="row rf_delivery_str">
                    <img alt="Доставка" src="/wp-content/themes/rns/assets/images/icons/delivery.svg" /> Доставка по всей России
                </div>

                <div class="row">
                    <div class="col s12">
                        <?php
                        if ($product->is_type("variable")) {
                        $values = $product->get_default_attributes();
                        $default_attr_str = "<b>Выбрано:</b> - ";
                        foreach ($values as $key => $value) {
                            $name_attr = wc_attribute_label($key);
                            $term_attr = get_term_by("slug", $value, $key);
                            $name_term = $term_attr->name;
                            $default_attr_str .= "<i>" . $name_attr . ":</i> " . $name_term . "; ";
                        }
                        ?>
                        <p class="rf_choose_product_str"><?php echo $default_attr_str ?></p>
                        <?php } ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col m7 s12">
                        <?php
                        $price_num = $product->get_price()
                        ?>
                        <?php if ($price_num > 0) { ?>
                            <b class="rf_product_price"><?php echo $product->get_price_html() ?></b>
                        <?php } else { ?>
                            <a href="#modal_know_price" data-product="<?php echo get_the_title() ?>" class="rf_know_price btn-large waves-light modal-trigger">Узнать цену</a>
                        <?php } ?>
                    </div>
                    <div class="col m5 s12 rf_cart_added_trigers">
                        <?php if ($price_num > 0) { ?>
                            <input type="number" id="quantity_trigger" class="input-text qty text" step="1" min="1" max="5000" name="quantity" value="1" title="Кол-во" size="4" placeholder="" inputmode="numeric" autocomplete="off">
                            <b id="rf_add_to_cart_trigger" class="btn-large rf_third waves-effect">В корзину</b>
                        <?php } ?>
                    </div>

                </div>

            </div>



        </div>

        <div class="rf_right">
            <div class="rf_product_main_slider">

                <?php $sku = $product->get_sku() ? $product->get_sku() : "-" ?>
                <p class="rf_sku"><b>Артикул:</b> <?php echo $sku ?></p>

                <div class="rf_brand_image_box">
                    <?php
                        $brands = get_the_terms($product->get_id(),'product_brand');
                        $imageBrandURL = wp_get_attachment_image_url(get_term_meta($brands[0]->term_id, 'thumbnail_id', true), 'medium');
                    ?>
                    <?php if (count($brands) > 0) { ?>
                    <img class="rf_brand_image" alt="brand" src="<?php echo $imageBrandURL ?>" />
                    <?php } ?>
                </div>
                
                <?php if ($is_new) { ?>
                    <img alt="Новинка" class="rf_new" src="/wp-content/themes/rns/image/icons/new.svg" />
                <?php } ?>

                <div id="k234d" class="owl-carousel owl-carousel-product-page">
                    <?php foreach ($arr_var_gallery as $img_id) {
                        $url_img = wp_get_attachment_url($img_id);
                        $image_alt = get_post_meta($img_id, '_wp_attachment_image_alt', TRUE);
                    ?>
                        <div>
                            <img data-full="<?= $url_img ?>" class="rf-can-open-image rf-item-slider" alt="<?= the_title() ?>" src="<?= $url_img ?>" />
                            <span class="rf_bottom_img_exception"><?php echo $image_alt ?></span>
                        </div>
                    <?php } ?>
                </div>


            </div>
        </div>



    </div>

    <?php if (get_field('name_upsale_group') and 2 == 1) { ?>
        <div class="rf-container rf_upsale_listlinks">
            <p><b><?php echo get_field('name_upsale_group') ?></b></p>
            <div class="rf_links">
                <?php for ($i = 0; $i < count($crossale_groupe); $i++) { ?>
                    <?php
                    $class_name = 'rf-btn-secondary-light';
                    if ($crossale_groupe[$i]['link'] == get_permalink()) {
                        $class_name = 'rf-btn-primary';
                    }
                    ?>
                    <?php if ($crossale_groupe[$i]['name']) { ?>
                        <a href="<?php echo $crossale_groupe[$i]['link'] ?>" class="rf-btn <?php echo $class_name ?>"><?php echo $crossale_groupe[$i]['name'] ?></a>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    <?php }  ?>

    <!-- <div class='rf-container rf_upsale_listlinks'>
        <div class="row">
            <div class="col s12">
                <?php //$small_name = get_field('name_upsale_group') 
                ?>
                <?php //if (!$small_name) {
                //$small_name = "Варианты исполнения и их технические характеристики";
                //}
                ?>
                <p><b><?php //echo get_field('prod_name_in_upsale_group') 
                        ?></b></p>
            </div>
        </div>
    </div> -->


    <?php if ($product->is_type('variable')) { ?>
        <div class="rf_variation_attr_table_outer rf-container">

            <div class="rf_variation_attr_table rf-container">

                <div class="rf_col_item">
                    <div class="rf_row_item"></div>
                    <?php for ($i = 0; $i < count($all_variations_attributes); $i++) { ?>
                        <div class="rf_row_item">
                            <?php if ($i === 0) { ?><b><?php } ?>
                            <?php echo $all_variations_attributes[$i]['title'] ?>
                            <?php if ($i === 0) { ?></b><?php } ?>
                        </div>
                    <?php } ?>
                    <div class="rf_row_item">СТОИМОСТЬ:</div>
                </div>

                <?php $var_num = 0; ?>
                <?php foreach ($data_vars_for_view as $col_data) { ?>


                    <?php $var_num++ ?>


                    <div class="rf_col_item rf_variation <?php if ($var_num === 1) { ?> rf_first_col_variation <?php } ?>" data-desc="<?php echo $col_data[0] ?>">
                        
                        <?php for ($x = 4; $x < count($col_data); $x++) { ?>

                            <?php if ($x == 4) { ?>
                                <div class="rf_row_item">

                                    <?php $var_img_id = get_post_thumbnail_id($col_data[2]) ?>
                                    <?php if (!$var_img_id) {
                                        $var_img_id = get_post_thumbnail_id($col_data[1]);
                                    } ?>
                                    <?php if ($var_img_id) { ?>
                                        <?php $var_img_arr = wp_get_attachment_image_src($var_img_id) ?>
                                        <div class="rf_img_variation_in_table">
                                            <img alt="<?php echo $col_data[0] ?>" src="<?php echo $var_img_arr[0] ?>" />
                                        </div>
                                    <?php } ?>
                                    
                                    <?php if ($col_data[3]) { ?>
                                    <div class="rf_article_in_vars">
                                        <span><b>Арт.</b> <?php echo $col_data[3] ?></span>
                                    </div>
                                    <?php } ?>

                                    <?php $price_var = $col_data[sizeof($col_data) - 1]; ?>

                                    <?php if ($price_var !== "<b> - </b>") { ?>
                                        <span data-json-attributes='<?php echo $col_data[3] ?>' data-product_id="<?php echo $col_data[1] ?>" data-quantity="1" data-variation_id="<?php echo $col_data[2] ?>" data-variation-desc="<?php echo $col_data[0] ?>" data-price-prod="<?php echo strip_tags($col_data[array_key_last($col_data)]) ?>" class="rf_add_to_cart btn waves-effect rf_third">
                                            В корзину
                                        </span>
                                    <?php } else { ?>
                                        <span data-json-attributes='<?php echo $col_data[3] ?>' data-product_id="<?php echo $col_data[1] ?>" data-quantity="1" data-variation_id="<?php echo $col_data[2] ?>" data-variation-desc="<?php echo $col_data[0] ?>" data-price-prod="<?php echo strip_tags($col_data[array_key_last($col_data)]) ?>" class="rf_add_to_cart not_added btn waves-effect rf_third">
                                            <a href="#modal_know_price" data-product="<?php echo $col_data[0] ?>" class="rf_know_price waves-light modal-trigger">Узнать цену</a>
                                        </span>
                                    <?php } ?>

                                </div>
                            <?php } else { ?>
                                <div class="rf_row_item">

                                    <?php if ($x === 4) { ?> <b> <?php } ?>
                                        <?php echo $col_data[$x] ?>
                                    <?php if ($x === 4) { ?> </b><?php } ?>
                                </div>
                            <?php } ?>

                        <?php } ?>

                    </div>
                <?php } ?>
            </div>

        </div>
    <?php } ?>

    <?php //Дополнительные таблицы апсейлов  
    ?>
    <?php if ($show_all_tables) { ?>
        <?php foreach ($upsale_ids as $upid) { ?>

            <?php
            $product_x = wc_get_product($upid);
            ?>
            <div class="rf-container rf_extra_tables_in_product_header">

                <?php //echo $product_x->get_image("medium") 
                ?>
                <h2><?= get_field('prod_name_in_upsale_group', $product_x->get_id()) ?></h2>

            </div>
            <?php

            if ($product_x->is_type('variable')) {
                $variations_x = [];
                $args_x = array(
                    'post_type'     => 'product_variation',
                    'post_status'   => array('private', 'publish'),
                    'numberposts'   => -1,
                    'orderby'       => 'menu_order',
                    'order'         => 'ASC',
                    'post_parent'   => $upid // get parent post-ID
                );
                $variations_x = get_posts($args_x);
                $all_variations_data = [];
                foreach ($variations_x as $variant) {
                    $product_variation = new WC_Product_Variation($variant->ID);
                    $all_variations_data[] = $product_variation;
                    foreach ($product_variation->attributes as $k => $val) {
                        foreach ($all_attributes as $attr_all) {
                            if ('pa_' . $attr_all->attribute_name == $k) {
                                if (!in_array($k,  $all_variations_attributes_names)) {

                                    $all_variations_attributes_names[] = $k;
                                    $all_variations_attributes[] = [
                                        'name' => $k,
                                        'title' => $attr_all->attribute_label
                                    ];
                                }
                            }
                        }
                    }
                }
            }

            ?>


            <?php $data_vars_for_view_all = []; ?>
            <div class="rf_variation_attr_table_outer rf-container">
                <div class="rf_variation_attr_table rf-container">
                    <div class="rf_col_item">
                        <div class="rf_row_item"></div>
                        <?php for ($i = 0; $i < count($all_variations_attributes); $i++) { ?>
                            <div class="rf_row_item">
                                <?php if ($i === 0) { ?><b><?php } ?>
                                    <?php echo $all_variations_attributes[$i]['title'] ?>
                                    <?php if ($i === 0) { ?></b><?php } ?>
                            </div>
                        <?php } ?>
                    </div>

                    <?php
                    //Создадим массив с данными вариаций
                    foreach ($all_variations_data as $var_data) {

                        $new_obj = [$var_data->attribute_summary, $var_data->get_parent_id(), $var_data->get_variation_id()];
                        foreach ($var_data->attributes as $k => $a) {



                            foreach ($all_variations_attributes_names as $n) {

                                if ($n == $k) {

                                    $term_a = get_terms([
                                        'taxonomy' => $k,
                                        'hide_empty' => false,
                                        'slug' => $a,
                                        //'object_id' => $upid
                                    ]);

                                    if ($term_a[0]->slug == $a) {
                                        $new_obj[] = $term_a[0]->name;
                                    } else {
                                        $new_obj[] = "";
                                    }
                                }
                            }
                        }

                        $data_vars_for_view_all[] = $new_obj;
                    }

                    ?>
                    <?php foreach ($data_vars_for_view_all as $col_data) { ?>
                        <div class="rf_col_item rf_variation" data-desc="<?php echo $col_data[0] ?>">
                            <?php for ($x = 2; $x < count($col_data); $x++) { ?>

                                <?php if ($x == 2) { ?>
                                    <div class="rf_row_item">
                                        <span data-product_id="<?php echo $col_data[1] ?>" data-quantity="1" data-variation_id="<?php echo $col_data[2] ?>" class="rf_add_to_cart">
                                            В корзину
                                        </span>
                                    </div>
                                <?php } else { ?>
                                    <div class="rf_row_item">
                                        <?php if ($x === 3) { ?> <b><?php } ?>
                                            <?php echo $col_data[$x] ?>
                                            <?php if ($x === 3) { ?> </b><?php } ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    <?php } ?>


    <div class="rf_product_text_content_box">
        <div class="rf-container">
            <div class="row rf_product_text_content">
                <div class="col s12 m6 rf_box_with_whale_white">
                    <p class="rf_header">Подробное описание</p>

                    <canvas class="whale_product_webgl"></canvas>

                </div>
                <div class="col s12 m6 rf_box_with_content_text  rf-typography"><?php the_content() ?></div>
            </div>
        </div>
    </div>

    <?php
    //Получаем табы
    $obj_tabs = json_decode(get_post_meta($product->get_id(), 'tabs', 1));
    ?>


    <div class="rf-container rf_tabs_in_product">

        <?php if ($obj_tabs) { ?>
            <?php foreach ($obj_tabs as $tab) { ?>

                <div class="rf_item active">
                    <div class="rf_header">
                        <?php echo $tab->name ?>
                    </div>

                    <div class="rf_content_tab  rf-typography">
                        <div class="rf_tab_item">
                            <?php echo $tab->left ?>
                        </div>
                        <div class="rf_tab_item">
                            <?php echo $tab->right ?>
                        </div>
                    </div>

                </div>

            <?php } ?>
        <?php } ?>

    </div>

    <?php if ($crosssell_ids) { ?>

        <div class="rf_extra_products rf-container">
            <h3>Дополнительное оборудование</h3>
            <?php $cross_str = implode(',', $crosssell_ids[0]); ?>
            <?php echo do_shortcode("[products ids='" . $cross_str . "' columns='3' ]") ?>
        </div>
    <?php } ?>



<?php
}
