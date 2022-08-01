<?php
add_action('init', 'my_custom_init_1');
function my_custom_init_1()
{
    register_post_type('usluga', array(
        'labels'             => array(
            'name'               => 'Услуги', // Основное название типа записи
            'singular_name'      => 'Услуга', // отдельное название записи типа Book
            'add_new'            => 'Добавить новую',
            'add_new_item'       => 'Добавить новую услугу',
            'edit_item'          => 'Редактировать услугу',
            'new_item'           => 'Новая услуга',
            'view_item'          => 'Посмотреть услугу',
            'search_items'       => 'Найти услугу',
            'not_found'          => 'Услуг не найдено',
            'not_found_in_trash' => 'В корзине услуг не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Услуги'

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
    ));


    register_taxonomy('cat_objects', array('object'), array(
        'labels' => array(
            'name'              => 'Категории объектов',
            'singular_name'     => 'Категория объектов',
            'search_items'      => 'Поиск категорий',
            'all_items'         => 'Все категории',
            'view_item '        => 'Просмотр категории',
            'parent_item'       => 'Родительская категория',
            'parent_item_colon' => 'Родительская категория:',
            'edit_item'         => 'Редактировать категорию',
            'update_item'       => 'Обновить категорию',
            'add_new_item'      => 'Добавить категорию',
            'new_item_name'     => 'Имя новой катгории',
            'menu_name'         => 'Катег. объектов',
            'back_to_items'     => '← Назад к категориям',
        ),
        'description'           => 'Категории примеров объектов', // описание таксономии
        'public'                => true,
        // 'publicly_queryable'    => null, // равен аргументу public
        // 'show_in_nav_menus'     => true, // равен аргументу public
        // 'show_ui'               => true, // равен аргументу public
        // 'show_in_menu'          => true, // равен аргументу show_ui
        // 'show_tagcloud'         => true, // равен аргументу show_ui
        // 'show_in_quick_edit'    => null, // равен аргументу show_ui
        'hierarchical'          => false,
        'rewrite'               => true,
        //'query_var'             => $taxonomy, // название параметра запроса
        'capabilities'          => array(),
        'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
        'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
        'show_in_rest'          => null, // добавить в REST API
        'rest_base'             => null, // $taxonomy
        // '_builtin'              => false,
        //'update_count_callback' => '_update_post_term_count',
    ));


    register_post_type('object', array(
        'labels'             => array(
            'name'               => 'Объект', // Основное название типа записи
            'singular_name'      => 'Объект', // отдельное название записи типа Book
            'add_new'            => 'Добавить новый',
            'add_new_item'       => 'Добавить новый объект',
            'edit_item'          => 'Редактировать объект',
            'new_item'           => 'Новый объект',
            'view_item'          => 'Посмотреть объект',
            'search_items'       => 'Найти объект',
            'not_found'          => 'Объектов не найдено',
            'not_found_in_trash' => 'В корзине объектов не найдено',
            'parent_item_colon'  => '',
            'menu_name'          => 'Объекты'

        ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments')
    ));
}
