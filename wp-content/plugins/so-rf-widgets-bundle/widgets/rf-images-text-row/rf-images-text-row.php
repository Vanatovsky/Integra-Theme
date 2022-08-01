<?php
/*
Widget Name: ♣ Строка с иконками и подписями
Description: Выводит строка с иконками и подписями
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Images_Text_Row_Widget extends SiteOrigin_Widget
{
	function __construct()
	{
		parent::__construct(
			'rf-images-text-row',
			'♣ Строка с иконками и подписями',
			[
				'description' => 'Выводит строка с иконками и подписями',
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

			'items' => array(
				'type' => 'repeater',
				'label' => 'Изображения',
				'item_name'  => 'Изображение',
				'fields' => array(
					'image' => array(
						'type' => 'media',
						'label' => 'Выберите файл'
					),
					'text' => array(
						'type' => 'text',
						'label' => 'Подпись к картинке'
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
			'items' => $instance['items'],
			'rf_container' => $instance['rf_container']
		);
	}
}

siteorigin_widget_register('rf-images-text-row', __FILE__, 'SiteOrigin_Widget_Images_Text_Row_Widget');
