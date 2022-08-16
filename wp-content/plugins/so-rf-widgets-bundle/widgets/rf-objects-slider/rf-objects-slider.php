<?php
/*
Widget Name: ♣ Слайдер объектов
Description: Выводит слайдер объектов
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Rf_Objects_Slider_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-objects-slider',
			'♣ Слайдер объектов -----',
			[
				'description' => 'Выводит слайдер объектов',
				'help' => 'https://run-seo.ru'
			],
			[],
			false,
			plugin_dir_path(__FILE__)
		);
	}

	function get_widget_form()
	{
		return array();
	}


	function get_template_variables($instance, $args)
	{

		$objects = get_posts(array(
			'post_type' => 'object',
		));

		return array(
			'objects' => $objects
		);
	}
}

siteorigin_widget_register('rf-objects-slider', __FILE__, 'SiteOrigin_Widget_Rf_Objects_Slider_Widget');
