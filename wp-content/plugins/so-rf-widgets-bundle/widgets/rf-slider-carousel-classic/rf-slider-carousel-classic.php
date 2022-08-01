<?php
/*
Widget Name: ♣ Слайдер "Классическая Карусель"
Description: Выводит слайды по-одному с кнопками навигации внутри
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Rf_Slider_Carousel_Classic_Widget extends SiteOrigin_Widget
{
	function __construct()
	{
		parent::__construct(
			'rf-slider-carousel-classic',
			'♣ Слайдер "Классическая Карусель"',
			[
				'description' => 'Выводит классичскую карусель изображений',
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
			'images' => $instance['images']
		);
	}
}

siteorigin_widget_register('rf-slider-carousel-classic', __FILE__, 'SiteOrigin_Widget_Rf_Slider_Carousel_Classic_Widget');
