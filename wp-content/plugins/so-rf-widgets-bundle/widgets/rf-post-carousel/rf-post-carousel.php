<?php
/*
Widget Name: ♣ Карусель записей
Description: Выводит слайдер с превью последних записей сайта
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Posts_Carousel_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-post-carousel',
			'♣ Карусель записей',
			[
				'description' => 'Блок с крупными заголовками',
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

			'text_1' => array(
				'type' => 'text',
				'label' => 'Текст первый',
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
			'text_1' => $instance['text_1'],
		);
	}
}

siteorigin_widget_register('rf-post-carousel', __FILE__, 'SiteOrigin_Widget_Posts_Carousel_Widget');
