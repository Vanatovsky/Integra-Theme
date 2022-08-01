<?php

/**
 * @var number $pre_page
 * @var array $product_links
 */

?>

<?php

if (count($product_links) > 0) {

    $str_ids = "";
    foreach ($product_links as $link) {
        $id_product = str_replace('post: ', '', $link['product_links']);
        $str_ids .= $id_product . ',';
    }
    $str_ids = substr($str_ids, 0, -1);

    echo do_shortcode('[products columns="' . $per_page . '" ids=' . $str_ids . ']');
} else {
    echo do_shortcode('[best_selling_products columns="' . $per_page . '" per_page=' . $per_page . ']');
}

?>
