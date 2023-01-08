<?php

require_once RF_WOO_ROYAL_PLUGIN_DIR . "/admin/pages/hello.php";
require_once RF_WOO_ROYAL_PLUGIN_DIR . "/admin/pages/settings.php";
require_once RF_WOO_ROYAL_PLUGIN_DIR . "/admin/pages/documentation.php";
require_once RF_WOO_ROYAL_PLUGIN_DIR . "/admin/pages/unpin-product-category/unpin-product-category.php";
require_once RF_WOO_ROYAL_PLUGIN_DIR . "/admin/pages/dilers/dilers.php";

//Подключение стилей и скриптов
add_action('admin_enqueue_scripts', 'rf_woo_royal_admin_enqueue_scripts', 10, 1);

function rf_woo_royal_admin_enqueue_scripts()
{
    wp_enqueue_style('rf-woo-royal-admin-style', '/wp-content/plugins/rf-woo-royal/admin/css/admin.css', array(), _S_VERSION);
    //wp_enqueue_style('rf-sweet-alert-style', '/wp-content/plugins/rf-woo-royal/admin/css/sweet-alert.css', array(), _S_VERSION);

    wp_enqueue_script('rf-woo-royal-admin-cat-unpin-script', '/wp-content/plugins/rf-woo-royal/admin/js/admin-scripts.js', array(), _S_VERSION);
    wp_enqueue_script('rf-sweet-alert-script', '/wp-content/plugins/rf-woo-royal/admin/js/sweet-alert.js', array(), _S_VERSION);
}

// Цепляемся на добавление меню
add_action('admin_menu', 'rf_add_pages');

function rf_add_pages()
{
    // Добавление нового поля в настройки
    //add_options_page('Test Options', 'Test Options', 8, 'testoptions', 'mt_options_page');

    // Добавление поля в меню «Инструменты»
    //add_management_page('Test Manage', 'Test Manage', 2, 'testmanage', 'mt_manage_page');

    // Добавление поля меню верхнего уровня
    add_menu_page('♣ Woo Royal', 'Woo Royal', 8, __FILE__, 'rf_woo_royal_hello');

    // Add a submenu to the custom top-level menu:
    add_submenu_page(__FILE__, 'Настройки', 'Настройки', 8, 'settings', 'rf_woo_royal_settings_page');

    // Add a submenu to the custom top-level menu:
    add_submenu_page(__FILE__, 'Открепить категорию', 'Открепить категорию', 8, 'category-products', 'rf_woo_royal_category_products_page');

    // Add a submenu to the custom top-level menu:
    add_submenu_page(__FILE__, 'Дилеры', 'Дилеры', 8, 'rf-dilers', 'rf_woo_royal_dilers_page');

    // Add a submenu to the custom top-level menu:
    add_submenu_page(__FILE__, 'Документация', 'Документация', 8, 'documentations', 'rf_admin_documentation_page');
}
