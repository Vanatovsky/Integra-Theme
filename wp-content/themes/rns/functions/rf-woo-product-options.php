<?php
//// <<<< META BOXES >>>> //////
add_action('add_meta_boxes', 'my_pr_opt_fields', 2);
function my_pr_opt_fields()
{
    add_meta_box('product_options_fields', 'Дополнительные опции товара', 'product_options_box_func', 'product', 'normal', 'high');
}

function product_options_box_func($post)
{
    $product_options = json_decode(get_post_meta($post->ID, 'product_options_fields', 1));

?>
    <div class="rf_admin_panel rf_product_options_wrapper">
        <?php if ($product_options) { ?>
            <?php foreach ($product_options as $opt) { ?>
                <div class="rf_one_product_option_box">
                    <label>Название</label>
                    <input type="text" class="rf_name" value="<?php echo $opt->name ?>" />
                    <label>Добавить к стоимости</label>
                    <input type="number" class="rf_option_price" value="<?php echo $opt->price ?>" />
                    <span class="rf_remove_option">- Удалить опцию</span>
                </div>
            <?php } ?>
        <?php } ?>

        <input type="button" class="rf-btn rf-btn-primary" value="+ Добавить опцию" id="rf_add_product_option">
        <input type="hidden" id="rf_product_options_json" name='rf_pr_options' value='<?php echo get_post_meta($post->ID, 'product_options_fields', 1) ?>' />
    </div>
<?php
}

// включаем обновление полей при сохранении
add_action('save_post', 'my_options_update', 0);
function my_options_update($post_id)
{
    // базовая проверка
    if (
        empty($_POST['rf_pr_options'])
        || wp_is_post_autosave($post_id)
        || wp_is_post_revision($post_id)
    )
        return false;


    // Все ОК! Теперь, нужно сохранить/удалить данные
    if ($_POST['rf_pr_options'] !== "") {
        update_post_meta($post_id, 'product_options_fields', $_POST['rf_pr_options']); // add_post_meta() работает автоматически
    } else {
        delete_post_meta($post_id, 'product_options_fields'); // удаляем поле если значение пустое
    }


    return $post_id;
}
