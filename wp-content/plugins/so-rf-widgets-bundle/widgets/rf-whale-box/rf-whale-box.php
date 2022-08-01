<?php
/*
Widget Name: ♣ Блок с китом
Description: Экран с китом на фоне и основной навигацией
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Whale_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-whale-box',
			'♣ Блок с китом',
			[
				'description' => 'Экран с китом на фоне и основной навигацией',
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

siteorigin_widget_register('rf-whale-box', __FILE__, 'SiteOrigin_Whale_Widget');
