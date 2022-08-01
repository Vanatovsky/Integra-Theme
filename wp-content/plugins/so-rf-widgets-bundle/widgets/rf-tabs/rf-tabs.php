<?php
/*
Widget Name: ♣ Вклажки
Description: Выводит блок с верхнем меню (вкладками), при клике по вкладке содерживое блока меняется на контент того же блока по счету вкладки
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Rf_Tabs_Widget extends SiteOrigin_Widget
{
	function __construct()
	{
		parent::__construct(
			'rf-tabs',
			'♣ Вкладки (блок верхним меню)',
			[
				'description' => 'Блок с верхнем меню (вкладками)',
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

			'text_1' => array(
				'type' => 'text',
				'label' => 'Текст первый',
			),

			'tabs' => array(
				'type' => 'repeater',
				'label' => 'Вкладки',
				'item_name'  => 'Вкладка',
				'fields' => array(
					'name' => array(
						'type' => 'text',
						'label' => 'Название вкладки'
					),

					'content' => array(
						'type' => 'repeater',
						'label' => 'Блоки',
						'item_name'  => 'Блок',
						'fields' => array(
							'text' => array(
								'type' => 'tinymce',
								'label' => 'Контент'
							)
						)
					)
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
			'text_1' => $instance['text_1'],
			'tabs' => $instance['tabs']
		);
	}
}

siteorigin_widget_register('rf-tabs', __FILE__, 'SiteOrigin_Widget_Rf_Tabs_Widget');
