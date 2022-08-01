<?php
/*
Widget Name: ♣ Текст
Description: Выводит обычный текст
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Rf_Text_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-text',
			'♣ Текст',
			[
				'description' => 'Обычный текст',
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
				'type' => 'tinymce',
				'label' => 'Текст', 'so-widgets-bundle',
			),
			'max-width' => array(
				'type' => 'number',
				'label' => 'Максимальная ширина блока в пикселях'
			),
			'light_wrapper' => array(
				'type' => 'checkbox',
				'label' => 'Светлая подложка'
			),
			'text_color' => [
				'type' => 'select',
				'label' => 'Цвет текста',
				'default' => 'dark',
				'options' => array(
					'dark' => 'Темный',
					'gray' => 'Серый',
					'white' => 'Светлый'
				),
			],
		);
	}


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
			'max_width' => $instance['max-width'],
			'text_color' => $instance['text_color'],
			'light_wrapper' => $instance['light_wrapper']
		);
	}
}

siteorigin_widget_register('rf-text', __FILE__, 'SiteOrigin_Widget_Rf_Text_Widget');
