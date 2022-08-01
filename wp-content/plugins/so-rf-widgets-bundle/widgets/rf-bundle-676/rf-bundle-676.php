<?php
/*
Widget Name: ♣ Набор иконок с текстом
Description: Набор иконок с текстом
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Rf_Bundle_Icons_676_Widget extends SiteOrigin_Widget
{

	function __construct()
	{

		parent::__construct(
			'rf-bundle-676',
			'♣ Набор иконок с текстом',
			[
				'description' => 'Набор иконок с текстом',
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
						'label' => 'Иконка',
						'library' => 'image',
						'fallback' => true,
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

siteorigin_widget_register('rf-bundle-676', __FILE__, 'SiteOrigin_Widget_Rf_Bundle_Icons_676_Widget');
