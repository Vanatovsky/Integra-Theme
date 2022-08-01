<?php
/*
Widget Name: ♣ Таблица с прайсом
Description: Выводит таблицу с ценами
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Rf_Price_Table_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-price-table',
			'♣ Таблица с прайсом',
			[
				'description' => 'Выводит таблицу с ценами',
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
				'label' => 'Заголовок таблицы'
			),
			'strings' => array(
				'type' => 'repeater',
				'label' => 'Добавьте строки в таблицу с прайсом',
				'item_name'  => 'Строка',
				'fields' => array(
					'name' => [
						'type' => 'text',
						'label' => 'Название услуги'
					],
					'price' => [
						'type' => 'text',
						'label' => 'Стоимость услуги'
					],
				),
			),

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
			'header' => $instance['header'],
			'strings' => $instance['strings'],
		);
	}
}

siteorigin_widget_register('rf-price-table', __FILE__, 'SiteOrigin_Widget_Rf_Price_Table_Widget');
