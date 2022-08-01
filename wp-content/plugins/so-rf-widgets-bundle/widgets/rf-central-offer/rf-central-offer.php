<?php
/*
Widget Name: ♣ Центральное предложение
Description: Выводит центральное предложение
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Rf_Central_Offer_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-central-offer',
			'♣ Центральное предложение',
			[
				'description' => 'Выводит центральное предложение с кнопками',
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

			'wrapper' => array(
				'type' => 'radio',
				'default' => 'no',
				'label' => 'Включить обертку для выравнивания контента?',
				'options' => array(
					'yes' => 'Да',
					'no' => 'Нет',
				)
			),

			'background' => array(
				'type' => 'media',
				'label' => 'Фоновое изображение',
				'library' => 'image',
				'fallback' => true,
			),

			'offer' => array(
				'type' => 'text',
				'label' => 'Текст предложения'
			),

			'buttons' => array(
				'type' => 'repeater',
				'label' => 'Кнопки снизу',
				'item_name' => 'Кнопка',
				'fields' => array(
					'text_button' => array(
						'type' => 'text',
						'label' => 'Текст на кнопке'
					),
					'link' => array(
						'type' => 'link',
						'label' => 'Ссылка с кнопки'
					),
					'onclick' => array(
						'type' => 'text',
						'label' => 'Событие клика'
					),
					'button_type' => array(
						'type' => 'select',
						'label' => 'Тип кнопки',
						'options' => array(
							'rf_primary' => 'Primary',
							'rf_secondary' => 'Secondary',
							'rf_third' => 'Third',
							'rf_primary_white' => 'Primary White',
							'rf_secondary_white' => 'Secondary White',
							'rf_third_white' => 'Third White',
						)
					)
				)
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

		$background = siteorigin_widgets_get_attachment_image_src(
			$instance['background'],
			false
		);


		return array(
			'background' => $background[0],
			'wrapper' => $instance['wrapper'],
			'offer' => $instance['offer'],
			'buttons' => $instance['buttons']
		);
	}
}

siteorigin_widget_register('rf-central-offer', __FILE__, 'SiteOrigin_Widget_Rf_Central_Offer_Widget');
