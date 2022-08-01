<?php
//// <<<< META BOXES >>>> //////
add_action('add_meta_boxes', 'my_tabs_fields', 2);
function my_tabs_fields()
{
    add_meta_box('tabs_fields', 'Табы (Вкладки с информацией)', 'tabs_fields_box_func', 'product', 'normal', 'high');
}

function tabs_fields_box_func($post)
{
    $obj_tabs = json_decode(get_post_meta($post->ID, 'tabs', 1));

    // подключаем стили, скрипты для редактора
    wp_enqueue_editor();
?>

    <div id="rf_tabs_wrap">
        <?php if ($obj_tabs) { ?>
            <?php foreach ($obj_tabs as $tab) { ?>
                <?php
                $rand = rand(1, 999889);
                ?>
                <div data-rand="<?php echo $rand ?>" class="rf_admin_tab_box">
                    <p style="padding:10px;font-size:18px;background:#4f94d4;color:#fff;"><label>Название таба</label></p>
                    <p style="float:right;text-align:right;"><span class="rf-btn rf-btn-primary rf_tab_delete">Удалить таб</span></p>
                    <p><input class="rf_name" type="text" name="title" value="<?php echo $tab->name ?>" style="width:45%" /></p>
                    <p><label>Содержание таба</label></p>
                    <p>
                        <textarea id="<?php echo 'left' . $rand ?>" class="rf_left" type="text" name="left" style=height:100px;float:left;margin-right: 20px;"><?php echo $tab->left ?></textarea><br /><br />
                        <textarea id="<?php echo 'right' . $rand ?>" class="rf_right" type="text" name="right" style="height:100px;"><?php echo $tab->right ?></textarea>
                    </p>
                </div>
            <?php } ?>
        <?php } ?>
    </div>

    <input type="button" id="rf_add_new_tab" value="Добавить таб +" />
    <input type="hidden" id="rf_tabs_json" name='tabs' value='' />
<?php
}

// включаем обновление полей при сохранении
add_action('save_post', 'my_tabs_update', 0);
function my_tabs_update($post_id)
{
    // базовая проверка
    if (
        empty($_POST['tabs'])
        || wp_is_post_autosave($post_id)
        || wp_is_post_revision($post_id)
    )
        return false;


    // Все ОК! Теперь, нужно сохранить/удалить данные
    if ($_POST['tabs'] !== "") {
        update_post_meta($post_id, 'tabs', $_POST['tabs']); // add_post_meta() работает автоматически
    } else {
        delete_post_meta($post_id, 'tabs'); // удаляем поле если значение пустое
    }


    return $post_id;
}
