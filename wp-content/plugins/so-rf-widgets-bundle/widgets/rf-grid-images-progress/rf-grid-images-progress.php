<?php
/*
Widget Name: ♣ Настраиваемая сетка изображений
Description: Выводит настраиваемую сетку изображений
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Grid_Images_Progress_Widget extends SiteOrigin_Widget
{
	function __construct()
	{
		parent::__construct(
			'rf-grid-images-progress',
			'♣ Настраиваемая сетка изображений',
			[
				'description' => 'Выводит настраиваемую сетку изображений',
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
					'text' => array(
						'type' => 'text',
						'label' => 'Подпись к картинке'
					),
					'count_horizontal' => array(
						'type' => 'select',
						'label' => 'Количество занимаемых ячеек по горизонтали',
						'default' => '1',
						'options' => array(
							'1' => '1',
							'2' => '2',
							'3' => '3',
						),
					),
					'count_vertical' => array(
						'type' => 'select',
						'label' => 'Количество занимаемых ячеек по вертикали',
						'default' => '1',
						'options' => array(
							'1' => '1',
							'2' => '2',
							'3' => '3',
						),
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

siteorigin_widget_register('rf-grid-images-progress', __FILE__, 'SiteOrigin_Widget_Grid_Images_Progress_Widget');
