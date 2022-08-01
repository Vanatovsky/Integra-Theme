<?php
/*
Widget Name: ♣ Превью блога
Description: Выводит превью блога (статьи)
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Blog_Preview_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-blog-preview',
			'♣ Превью блога',
			[
				'description' => 'Выводит превью блога (статьи)',
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

			// 'text_1' => array(
			// 	'type' => 'text',
			// 	'label' => 'Текст первый',
			// ),

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
			//'text_1' => $instance['text_1'],
		);
	}
}

siteorigin_widget_register('rf-blog-preview', __FILE__, 'SiteOrigin_Widget_Blog_Preview_Widget');
