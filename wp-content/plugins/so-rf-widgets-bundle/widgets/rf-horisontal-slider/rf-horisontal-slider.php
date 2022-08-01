<?php
/*
Widget Name: ♣ Горизонтальный однокартиночный слайдер
Description: Выводит слайдер с горизонтальными картинками
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Rf_Horisontal_Slider_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-horisontal-slider',
			'♣ Горизонтальный однокартиночный слайдер',
			[
				'description' => 'Выводит слайдер с горизонтальными картинками',
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

			'wrapper' => array(
				'type' => 'checkbox',
				'label' => 'Обернуть в .container для выравнивания по зоне контента',
				'default' => false
			),

			'images' => array(
				'type' => 'repeater',
				'label' => 'Изображения',
				'item_name' => 'Изображение',
				'fields' => array(
					'image' => array(
						'type' => 'media',
						'label' => 'Выберите изображение',
						'library' => 'image',
						'fallback' => true,
					),

				)
			)






		);
	}


	//Подготовка данных
	/**
	 * Get the variables for the button widget.
	 *
	 * @param $instance
	 * @param $args
	 *
	 * @return array
	 */
	function get_template_variables($instance, $args)
	{

		return array(
			'images' => $instance['images'],
			'wrapper' => $instance['wrapper'],
		);
	}
}

siteorigin_widget_register('rf-horisontal-slider', __FILE__, 'SiteOrigin_Widget_Rf_Horisontal_Slider_Widget');
