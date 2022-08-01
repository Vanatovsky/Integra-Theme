<?php
/*
Widget Name: ♣ Картинка с текстом и ссылкой
Description: Выводит картинка с текстом и ссылкой по всему блоку
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Rf_Icon_Link_With_Text_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-icon-link-with-text',
			'♣ Картинка с текстом и ссылкой',
			[
				'description' => 'Выводит картинка с текстом и ссылкой по всему блоку',
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
				'label' => 'Выберите картинку которая расположится сверху',
			),
			'header' => array(
				'type' => 'text',
				'label' => 'Заголовок текста',
			),
			'link' => array(
				'type' => 'link',
				'label' => 'Ссылка с болока',
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
			'image' => $instance['image'],
			'header' => $instance['header'],
			'link' => $instance['link']

		);
	}
}

siteorigin_widget_register('rf-icon-link-with-text', __FILE__, 'SiteOrigin_Widget_Rf_Icon_Link_With_Text_Widget');
