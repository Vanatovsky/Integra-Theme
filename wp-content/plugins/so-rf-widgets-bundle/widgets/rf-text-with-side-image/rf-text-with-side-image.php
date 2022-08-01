<?php
/*
Widget Name: ♣ Текст с картинкой с боку
Description: Выводит текстовый блок с изображением сбоку
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Rf_Text_With_Side_Image_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-text-with-side-image',
			'♣ Текст с картинкой сбоку',
			[
				'description' => 'Выводит текстовый блок с изображением сбоку',
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
			'image' => array(
				'type' => 'media',
				'label' => 'Выберите картинку которая расположится сбоку от текста',
			),
			'header' => array(
				'type' => 'text',
				'label' => 'Заголовок текста',
			),
			'text' => array(
				'type' => 'textarea',
				'label' => 'Текст',
			)
		);
	}



	// function get_style_name($instance)
	// {
	// 	if (empty($instance['design']['theme'])) return 'atom';
	// 	return $instance['design']['theme'];
	// }



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
			'image' => $instance['image'],
			'header' => $instance['header'],
			'text' => $instance['text']

		);
	}
}

siteorigin_widget_register('rf-text-with-side-image', __FILE__, 'SiteOrigin_Widget_Rf_Text_With_Side_Image_Widget');
