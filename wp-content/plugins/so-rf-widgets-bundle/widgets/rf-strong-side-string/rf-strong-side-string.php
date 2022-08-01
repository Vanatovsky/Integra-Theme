<?php
/*
Widget Name: ♣ Список с иконками слева
Description: Выводит список с иконками слева
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Rf_Strong_Side_String_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-strong-side-string',
			'♣ Список с иконками слева',
			[
				'description' => 'Выводит список с иконками слева',
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
			'strings' => array(
				'type' => 'repeater',
				'label' => 'Добавьте пункты в меню',
				'item_name'  => 'Пункт',
				'fields' => array(
					'img' => [
						'type' => 'media',
						'label' => 'Картинка иконки'
					],
					'text' => [
						'type' => 'text',
						'label' => 'Текст пункта'
					],
				),
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
			'strings' => $instance['strings'],

		);
	}
}

siteorigin_widget_register('rf-strong-side-string', __FILE__, 'SiteOrigin_Widget_Rf_Strong_Side_String_Widget');
