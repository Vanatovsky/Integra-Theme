<?php

//Предварительный подсчет числа товаров
function rf_edit_diler_tax()
{

    update_user_meta($_POST['diler_id'], 'diler_tax', $_POST['diller_tax']);

    echo json_encode(array(
        'success' => true,
        'message' => 'Скидка у дилера с ID ' . $_POST['diler_id'] . ' успешно изменена. Скидка составляет ' .  $_POST['diller_tax'] . '%',
        'ids' => $_POST,
    ));

    //Нужно добавить wp_die() потому что на конце строки WP распечатывает еще и ноль
    wp_die();
}
add_action('wp_ajax_rf_edit_diler_tax', 'rf_edit_diler_tax');
