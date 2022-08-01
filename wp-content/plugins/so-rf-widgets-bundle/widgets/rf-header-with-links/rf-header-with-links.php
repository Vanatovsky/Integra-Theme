<?php
/*
Widget Name: ♣ Заголовок со ссылками
Description: Выводит заголовок со ссылками
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Rf_Header_With_Links_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-header-with-links',
			'♣ Заголовок со ссылками',
			[
				'description' => 'Заголовок со ссылками',
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
				'label' => 'Текст заголовка'
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

			'links' => [
				'type' => 'repeater',
				'label' => 'Ссылки',
				'item_name'  => 'Ссылка',
				'fields' => [
					'text_link' => [
						'type' => 'text',
						'label' => 'Текст ссылки'
					],
					'url_link' => [
						'type' => 'link',
						'label' => 'Адрес ссылки'
					],
					'img_link' => [
						'type' => 'media',
						'label' => 'Картинка иконки'
					]
				],
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
			'links' => $instance['links']
		);
	}
}

siteorigin_widget_register('rf-header-with-links', __FILE__, 'SiteOrigin_Widget_Rf_Header_With_Links_Widget');
