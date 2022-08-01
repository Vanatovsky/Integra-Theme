<?php
/*
Widget Name: ♣ Хлебные крошки WPseo
Description: Блок с хлебными крошками WPseo
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Breadcrumbs_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-brearcrumbs',
			'♣ Хлебные крошки WPseo',
			[
				'description' => 'Хлебные крошки',
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

		return array();
	}
}

siteorigin_widget_register('rf-brearcrumbs', __FILE__, 'SiteOrigin_Widget_Breadcrumbs_Widget');
