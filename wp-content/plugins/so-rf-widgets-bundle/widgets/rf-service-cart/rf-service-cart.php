<?php
/*
Widget Name: ♣ Service Cart
Description: Put service cart
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Rf_Service_Cart_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-service-cart',
			'♣ Service Cart',
			[
				'description' => 'Put service cart',
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

			'time_plan' => array(
				'type' => 'text',
				'label' => 'Time Plan',
			),
			'count_lesson' => array(
				'type' => 'text',
				'label' => 'Lessons Count',
			),
			'price' => array(
				'type' => 'number',
				'label' => 'Price',
			),
			'price_one_lesson' => array(
				'type' => 'number',
				'label' => 'Price One Lesson',
			),
			'desc_list' => array(
				'type' => 'tinymce',
				'label' => 'Description List',
			),
			'button_text' => array(
				'type' => 'text',
				'label' => 'Button Text',
				'default' => 'Purchase'
			),
			'button_link' => array(
				'type' => 'text',
				'label' => 'Button Link',
			),
			'summ_discount' => array(
				'type' => 'text',
				'label' => 'Summ Discount',
			),
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
			'time_plan' => $instance['time_plan'],
			'count_lesson' => $instance['count_lesson'],
			'price' => $instance['price'],
			'price_one_lesson' => $instance['price_one_lesson'],
			'desc_list' => $instance['desc_list'],
			'button_text' => $instance['button_text'],
			'button_link' => $instance['button_link'],
			'summ_discount' => $instance['summ_discount'],
		);
	}
}

siteorigin_widget_register('rf-service-cart', __FILE__, 'SiteOrigin_Widget_Rf_Service_Cart_Widget');
