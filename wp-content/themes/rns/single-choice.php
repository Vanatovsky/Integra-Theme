<?php

get_header();

?>

<main>

    <?php
    get_header('shop');

    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
    do_action('woocommerce_before_main_content');

    $get_str = get_field("get_string");
    if ($get_str !== '') {

        $work_get_array_objects = explode('&', $get_str);

        $array_range_vars = array();
        $array_range_vars_min = array();
        $array_range_vars_max = array();
        $have_range_filter = false;

        //Производим предварительный перебор значений get-параметра
        foreach ($work_get_array_objects as $str) {

            $str_arr = explode('=', $str);

            if (preg_match("|^rng_min_pa_.*|", $str_arr[0])) {
                $name_attribute = str_replace('rng_min_', '', $str_arr[0]);
                array_push($array_range_vars, $name_attribute);
                array_push($array_range_vars_min, $str_arr[1]);
                $have_range_filter = true;
            }

            if (preg_match("|^rng_max_pa_.*|", $str_arr[0])) {
                $name_attribute = str_replace('rng_max_', '', $str_arr[0]);
                array_push($array_range_vars_max, $str_arr[1]);
            }
        }
        //Итоговый перебо get-параметра
        $work_get_array = array();
        foreach ($work_get_array_objects as $obj_str) {

            $obj_str_arr = explode('=', $obj_str);

            //Простой атрибут pa_
            if (preg_match("|^pa_.*|", $obj_str_arr[0])) {

                array_push($work_get_array, [
                    'taxonomy' => $obj_str_arr[0],
                    'field'    => 'slug',
                    'terms'    =>  array($obj_str_arr[1])
                ]);
            }
        }

        for ($i = 0; $i < count($array_range_vars); $i++) {

            //Для каждого range фильтруем значения аттрибута
            $arr_terms = array();
            $term_values =  get_terms($array_range_vars[$i]);
            if (count($term_values) > 0) {

                foreach ($term_values as $t_val) {
                    if ((int)$t_val->slug >= (int)$array_range_vars_min[$i] && (int)$t_val->slug <= (int)$array_range_vars_max[$i]) {
                        array_push($arr_terms, $t_val->slug);
                    }
                }
            }

            array_push($work_get_array, [
                'taxonomy' => $array_range_vars[$i],
                'field'    => 'slug',
                'terms'    =>  $arr_terms
            ]);
        }

        // echo "<pre>";
        // print_r($work_get_array);
        // echo "</pre>";

        if (!$have_range_filter) {

            $loop = new WP_Query(array(
                'post_type' => 'product',
                'posts_per_page' => 24,
                'order' => 'ASC',
                'tax_query'      => array(
                    'relation' => 'AND',
                    $work_get_array
                )
            ));
        } else {
            $loop = new WP_Query(array(
                'post_type' => 'product',
                'posts_per_page' => 24,
                'order' => 'ASC',
                'tax_query'      => array(
                    'relation' => 'OR',
                    $work_get_array
                )
            ));
        }


        $string_ids = '';
        foreach ($loop->posts as $product) {
            $string_ids .= $product->ID . ',';
        }
        $string_ids = substr($string_ids, 0, -1);

    ?>

        <header class="woocommerce-products-header">


            <div class="rf_choice_top_content">
                <?php the_content(); ?>
            </div>

        </header>




        <?php

        dynamic_sidebar('sidebar-choice');

        echo do_shortcode('[products ids="' . $string_ids . '"]');

        do_action('woocommerce_after_main_content');
        ?>

        <div class="rf_choice_bottom_content">
            <?= get_field('content_bottom'); ?>
        </div>

    <?php

    } else { //закончилось условие о том что поле get-запрос не пустое, иначе:
    ?>
        <div id="rf-sidebar-custom-choice">
            <?php dynamic_sidebar('sidebar-custom-choice'); ?>
        </div>
    <?php

    }

    /**
     * Hook: woocommerce_after_main_content.
     *
     * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
     */




    ?>
</main>
<?php

get_footer();

?>