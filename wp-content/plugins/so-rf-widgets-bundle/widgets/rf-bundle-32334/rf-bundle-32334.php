<?php
/*
Widget Name: ♣ Набор карточек с иконками в заголовке
Description: Набор карточек с иконками в заголовке
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Rf_Bundle_Carts_With_Header_Icons_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-bundle-32334',
			'♣ Набор карточек с картинками в заголовке',
			[
				'description' => 'Набор карточек с картинками в заголовке (3 шт)',
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

			'cells' => array(
				'type' => 'repeater',
				'label' => 'Ячейки набора',
				'item_name'  => 'Ячейка',
				'fields' => array(
					'header' => array(
						'type' => 'text',
						'label' => 'Текст заголовка',
					),
					'icon' => array(
						'type' => 'media',
						'label' => 'Иконка в заголовке',
						'library' => 'image',
						'fallback' => true,
					),
					'text' => array(
						'type' => 'text',
						'label' => 'Основной текст ячейки',
					),
					'link_text' => array(
						'type' => 'text',
						'label' => 'Текст ссылки',
						'default' => 'Подробнее'
					),
					'link' => array(
						'type' => 'link',
						'label' => 'Ссылка с блока',
					),
				),
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

		for ($i = 0; $i < count($instance['cells']); $i++) {
			$instance['cells'][$i]['link'] = sow_esc_url($instance['cells'][$i]['link']);
		}

		return array(
			'cells' => $instance['cells']
		);
	}
}

siteorigin_widget_register('rf-bundle-32334', __FILE__, 'SiteOrigin_Widget_Rf_Bundle_Carts_With_Header_Icons_Widget');
