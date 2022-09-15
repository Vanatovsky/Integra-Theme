<?php

/**
 * Allow changing or removing the Breadcrumb items
 *
 * @param array       $crumbs The crumbs array.
 * @param Breadcrumbs $this   Current breadcrumb object.
 */
add_filter('rank_math/frontend/breadcrumb/items', function ($crumbs, $class) {


    if (is_product() || is_product_tag() || is_product_category() || is_product_taxonomy()) {
        $cat_page_element_arr = [[
            0 => 'Каталог продукции',
            1 => get_permalink(wc_get_page_id('shop')),
            'hide_in_schema' => ''
        ]];
        array_splice($crumbs, 1, 0, $cat_page_element_arr);
    }

    // if (get_post_type() == "object") {
    //     $obj_page_element_arr = [[
    //         0 => 'Объекты',
    //         1 => get_permalink(6795),
    //         'hide_in_schema' => ''
    //     ]];
    //     array_splice($crumbs, 1, 1, $obj_page_element_arr);
    // }

    return $crumbs;
}, 10, 2);
