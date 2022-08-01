<?php
/*
 * Plugin Name: ♣ Business Dynamics Woo-Royal
 * Plugin URI: http://страница_с_описанием_плагина_и_его_обновлений
 * Description: Окружение для WooCommerce от Business Dynamics.
 * Version: Номер версии плагина, 1.0.1
 * Author: Vanatovsky
 * Author URI: https://run-seo.ru
 */

define('RF_WOO_ROYAL_VERSION', '1.0.0');

define('RF_WOO_ROYAL_PLUGIN', __FILE__);

define('RF_WOO_ROYAL_PLUGIN_BASENAME', plugin_basename(RF_WOO_ROYAL_PLUGIN));

define('RF_WOO_ROYAL_PLUGIN_NAME', trim(dirname(RF_WOO_ROYAL_PLUGIN_BASENAME), '/'));

define('RF_WOO_ROYAL_PLUGIN_DIR', untrailingslashit(dirname(RF_WOO_ROYAL_PLUGIN)));

require_once RF_WOO_ROYAL_PLUGIN_DIR . '/load.php';

register_activation_hook(__FILE__, 'add_roles_on_plugin_activation');
function add_roles_on_plugin_activation()
{
    add_role(
        'diler',
        'Дилер',
        array(
            'read'         => true,  // true разрешает эту возможность
            'edit_posts'   => false,  // true разрешает редактировать посты
            'upload_files' => false,  // может загружать файлы
        )
    );
}
