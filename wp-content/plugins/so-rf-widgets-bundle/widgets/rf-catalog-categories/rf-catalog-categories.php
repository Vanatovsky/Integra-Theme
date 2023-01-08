<?php
/*
Widget Name: ♣ Каталог категорий
Description: Выводит список главных категорий магазина
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Rf_Catalog_Categories_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-catalog-categories',
			'♣ Каталог категорий',
			[
				'description' => 'Выводит список главных категорий с сайта',
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
			// 'text' => array(
			// 	'type' => 'tinymce',
			// 	'label' => 'Текст', 'so-widgets-bundle',
			// ),
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
			// 'text' => $instance['text'],
			// 'max_width' => $instance['max-width'],
			// 'text_color' => $instance['text_color']
		);
	}
}

siteorigin_widget_register('rf-catalog-categories', __FILE__, 'SiteOrigin_Widget_Rf_Catalog_Categories_Widget');
