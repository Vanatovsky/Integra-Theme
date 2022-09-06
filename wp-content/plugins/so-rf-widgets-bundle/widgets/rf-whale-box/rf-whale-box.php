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

		$uslugi = get_posts([
			'post_type' => "usluga",
		]);

		$cats_1 = get_terms([
			'hide_empty' => true,
			'taxonomy' => 'product_cat',
			'parent' => 3676
		]);

		$cats_2 =  get_terms([
			'hide_empty' => true,
			'taxonomy' => 'product_cat',
			'parent' => 3685
		]);

		$cats_3 = get_terms([
			'hide_empty' => true,
			'taxonomy' => 'product_cat',
			'parent' => 3676
		]);

		$cats_4 =  get_terms([
			'hide_empty' => true,
			'taxonomy' => 'product_cat',
			'parent' => 3676
		]);

		$cats_5 = get_terms([
			'hide_empty' => true,
			'taxonomy' => 'product_cat',
			'parent' => 3676
		]);


		return array(
			'uslugi' => $uslugi,
			'cats_1' => $cats_1,
			'cats_2' => $cats_2,
			'cats_3' => $cats_3,
			'cats_4' => $cats_4,
			'cats_5' => $cats_5,

		);
	}
}

siteorigin_widget_register('rf-whale-box', __FILE__, 'SiteOrigin_Whale_Widget');
