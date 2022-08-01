<?php
/*
Widget Name: ♣ Список услуг
Description: Выводит список всех опубликованных услуг
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Rf_Uslugi_Listing_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-uslugi-listing',
			'♣ Список услуг',
			[
				'description' => 'Выводит список всех опубликованных услуг',
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

		$uslugi = get_posts([
			'post_type' => "usluga",
		]);

		return array(
			'uslugi' => $uslugi
		);
	}
}

siteorigin_widget_register('rf-uslugi-listing', __FILE__, 'SiteOrigin_Widget_Rf_Uslugi_Listing_Widget');
