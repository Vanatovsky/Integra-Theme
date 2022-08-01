<?php
/*
Widget Name: ♣ Продукты Woocommerce
Description: Выводит продукты woocommerce
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Rf_Woo_Products_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-woo-products',
			'♣ Продукты Woocommerce',
			[
				'description' => 'Выводит продукты woocommerce',
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
			'per_page' => array(
				'type' => 'number',
				'label' => 'Количество выводивых продуктов',
				'default' => 4
			),
			'product_links' => array(
				'type' => 'repeater',
				'label' => 'Ссылки на товары',
				'item_name'  => 'Товар',
				'fields' => array(
					'product_links' => array(
						'type' => 'link',
						'label' => 'Выберите товар',
						'default' => ''
					)
				),
			)
		);
	}



	// function get_style_name($instance)
	// {
	// 	if (empty($instance['design']['theme'])) return 'atom';
	// 	return $instance['design']['theme'];
	// }



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
			'per_page' => $instance['per_page'],
			'product_links' => $instance['product_links']
		);
	}
}

siteorigin_widget_register('rf-woo-products', __FILE__, 'SiteOrigin_Widget_Rf_Woo_Products_Widget');
