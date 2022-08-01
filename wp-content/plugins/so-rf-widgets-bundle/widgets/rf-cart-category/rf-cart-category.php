<?php
/*
Widget Name: ♣ Карточка категории товаров
Description: Выводит карточку категории товаров
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Rf_Cart_Category_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-cart-category',
			'♣ Карточка категории товаров',
			[
				'description' => 'Выводит карточку категории товаров',
				'help' => 'https://run-seo.ru'
			],
			[],
			false,
			plugin_dir_path(__FILE__)
		);
	}

	function get_widget_form()
	{
		return array(

			'name' => array(
				'type' => 'text',
				'label' => 'Название категории',
			),

			'link' => array(
				'type' => 'link',
				'label' => 'Ссылка на категорию',
			),

			'count_items' => array(
				'type' => 'number',
				'label' => 'Количество видов оборудования',
			),

			'main_image' => array(
				'type' => 'media',
				'label' => 'Изображение категории',
			),

			'process_image' => array(
				'type' => 'media',
				'label' => 'Изображение процесса',
			),

		);
	}


	function get_template_variables($instance, $args)
	{

		$src_main_img = siteorigin_widgets_get_attachment_image_src(
			$instance['main_image'],
			false
		);

		$src_process_img = siteorigin_widgets_get_attachment_image_src(
			$instance['process_image'],
			false
		);

		return array(
			'name' => $instance['name'],
			'link' => $instance['link'],
			'count_items' => $instance['count_items'],
			'main_image' => $src_main_img,
			'process_image' => $src_process_img,
		);
	}
}

siteorigin_widget_register('rf-cart-category', __FILE__, 'SiteOrigin_Widget_Rf_Cart_Category_Widget');
