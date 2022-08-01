<?php
/*
Widget Name: ♣ Маленькое меню (для мега меню)
Description: Выводит маленькое меню, используется в Мега Меню
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Rf_Mini_Menu_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-mini-menu',
			'♣ Маленькое меню (для мега меню)',
			[
				'description' => 'Выводит маленькое меню, используется в Мега Меню',
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
			'header' => array(
				'type' => 'text',
				'label' => 'Заголовок меню'
			),
			'strings' => array(
				'type' => 'repeater',
				'label' => 'Добавьте пункты в меню',
				'item_name'  => 'Пункт',
				'fields' => array(
					'name' => [
						'type' => 'text',
						'label' => 'Название пункта'
					],
					'link' => [
						'type' => 'link',
						'label' => 'Ссылка'
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
			'header' => $instance['header'],
			'strings' => $instance['strings'],
		);
	}
}

siteorigin_widget_register('rf-mini-menu', __FILE__, 'SiteOrigin_Widget_Rf_Mini_Menu_Widget');
