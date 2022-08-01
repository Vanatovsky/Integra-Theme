<?php
/*
Widget Name: ♣ Слайдер "Карусель со стрелками"
Description: Выводит слайды (изаображения)
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Rf_Slider_With_Nav_Arrows_Widget extends SiteOrigin_Widget
{
	function __construct()
	{
		parent::__construct(
			'rf-slider-with-nav-arrows',
			'♣ Слайдер "Карусель со стрелками"',
			[
				'description' => 'Выводит слайды (изаображения)',
				'help' => 'https://run-seo.ru'
			],
			[],
			false,
			plugin_dir_path(__FILE__)
		);
	}

	//Формирование меню настроек в админке
	function get_widget_form()
	{
		return array(

			'images' => array(
				'type' => 'repeater',
				'label' => 'Изображения',
				'item_name'  => 'Изображение',
				'fields' => array(
					'image' => array(
						'type' => 'media',
						'label' => 'Выберите файл'
					),
				)
			),
			'rf_container' => array(
				'type' => 'checkbox',
				'default' => true,
				'label' => 'Контент по размерам рабочей области'
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
			'rf_container' => $instance['rf_container']
		);
	}
}

siteorigin_widget_register('rf-slider-with-nav-arrows', __FILE__, 'SiteOrigin_Widget_Rf_Slider_With_Nav_Arrows_Widget');
