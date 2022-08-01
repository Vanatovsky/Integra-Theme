<?php
/*
Widget Name: ♣ Заголовок
Description: Выводит заголовок h1/h6
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Rf_Header_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-header',
			'♣ Заголовок',
			[
				'description' => 'Заголовок h1/h6',
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
			'text' => array(
				'type' => 'text',
				'label' => __('Текст заголовка', 'so-widgets-bundle'),
			),

			'h' => [
				'type' => 'select',
				'label' => 'Тип заголовка',
				'default' => '2',
				'options' => array(
					'1' => 'h1',
					'2' => 'h2',
					'3' => 'h3',
					'4' => 'h4',
					'5' => 'h5',
					'6' => 'h6',
				),
			],

			'classic_icon' => [
				'type' => 'checkbox',
				'label' => 'С классической иконкой',
				'default' => false
			],

			'wrap' => [
				'type' => 'checkbox',
				'label' => 'По ширине контента',
				'default' => false
			],

			'white' => [
				'type' => 'checkbox',
				'label' => 'Сделать заголовок светлым',
				'default' => false
			],
			'width' => [
				'type' => 'number',
				'label' => 'Максимальная ширина заголовка в пикселах',
				'default' => false
			]
		);
	}



	function get_style_name($instance)
	{
		if (empty($instance['design']['theme'])) return 'atom';
		return $instance['design']['theme'];
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
			'text' => $instance['text'],
			'h' => $instance['h'],
			'classic_icon' => $instance['classic_icon'],
			'wrap' => $instance['wrap'],
			'white' => $instance['white'],
			'width' => $instance['width']
		);
	}
}

siteorigin_widget_register('rf-header', __FILE__, 'SiteOrigin_Widget_Rf_Header_Widget');
