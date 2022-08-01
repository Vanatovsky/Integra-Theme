<?php

//Предварительный подсчет числа товаров и получение массива id-шников
function rf_unpin_category_of_products()
{

    $has_cat = $_POST['has_category_id'];
    if ($has_cat) {
        $tax_query = array(
            'relation' => 'OR',
            array(
                'taxonomy' => 'product_cat',
                'field' => 'id',
                'terms' => array($_POST['has_category_id']),
            ),
        );
    } else {
        $tax_query = '';
    }

    $args = array(
        's' => $_POST['str_for_search'],
        'tax_query' => $tax_query,
        'post_type' => 'product',
        'posts_per_page' => 300
    );

    $goods_id_arr = [];

    $the_query = new WP_Query($args);

    // The Loop
    if ($the_query->have_posts()) {

        while ($the_query->have_posts()) {
            $the_query->the_post();
            $goods_id_arr[] = get_the_ID();
        }
    }

    $count_goods = count($goods_id_arr);

    echo json_encode(array( //где нибудь перед else
        'success' => true,
        'message' => 'Мы нашли - ' . $count_goods . ' товаров',
        'count_goods' => $count_goods,
        'ids' => $goods_id_arr,
        'cat_slug_for_remove' => $_POST['unpin_category_slug']
    ));

    //Нужно добавить wp_die() потому что на конце строки WP распечатывает еще и ноль
    wp_die();
}
add_action('wp_ajax_rf_product_cat_unpin', 'rf_unpin_category_of_products');



//Действие по откреплению товаров от нужной категории
function rf_unpin_category_of_products_action()
{

    $ids = $_POST['ids_products'];

    foreach ($ids as $post_request_id) {
        wp_remove_object_terms($post_request_id, $_POST['remove_category'], 'product_cat');
    }

    echo json_encode(array( //где нибудь перед else
        'success' => true,
        'message' => 'Мы все открепили',
    ));

    //Нужно добавить wp_die() потому что на конце строки WP распечатывает еще и ноль
    wp_die();
}
add_action('wp_ajax_rf_product_cat_unpin_action', 'rf_unpin_category_of_products_action');
