<?php
/*
Widget Name: ♣ Блоковый слайдер
Description: Выводит слайдер состоящий из 2х блоков (лево-право)
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Rf_Blocks_Slider_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-blocks-slider',
			'♣ Блоковый слайдер',
			[
				'description' => 'Выводит слайдер состоящий из 2х блоков (лево-право)',
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

			'elements' => array(
				'type' => 'repeater',
				'item_name' => 'Слайд',
				'fields' => array(
					'left_section' => array(
						'type' => 'section',
						'label' => "Левый блок",
						'hide' => true,
						'fields' => array(
							'header' => array(
								'type' => 'text',
								'label' => 'Заголовок'
							),

							'text' => array(
								'type' => 'tinymce',
								'label' => 'Основной текст',
								'rows' => 10,
								'default_editor' => 'html',
							),

							'image_after' => array(
								'type' => 'media',
								'label' => 'Изображение перед текстом',
								'library' => 'image',
								'fallback' => true,
							),
							'image_before' => array(
								'type' => 'media',
								'label' => 'Изображение после текста',
								'library' => 'image',
								'fallback' => true,
							),
							'background' => array(
								'type' => 'media',
								'label' => 'Фон блока',
								'library' => 'image',
								'fallback' => true,
							),
							'background_type' => array(
								'type' => 'select',
								'label' => 'Тип размера фона',
								'options' => array(
									'cover' => "Заполнение",
									'contain' => "Вписывание"
								),
							),

							'button_1_section' => array(
								'type' => 'section',
								'label' => 'Первая кнопка',
								'hide' => true,
								'fields' => array(
									'text' => array(
										'type' => 'text',
										'label' => 'Текст на кнопке'
									),
									'link' => array(
										'type' => 'link',
										'label' => 'Ссылка с кнопки'
									),
									'onclick' => array(
										'type' => 'text',
										'label' => 'Событие onclick'
									),
									'btn_type' => array(
										'type' => 'select',
										'label' => 'Тип кнопки',
										'default' => 'primary',
										'options' => array(
											'rf_primary' => 'Primary',
											'rf_secondary' => 'Secondary',
											'rf_third' => 'Third',
											'rf_primary_white' => 'Primary White',
											'rf_secondary_white' => 'Secondary White',
											'rf_third_white' => 'Third White',
										),
									),

								)
							),

							'button_2_section' => array(
								'type' => 'section',
								'label' => 'Вторая кнопка',
								'hide' => true,
								'fields' => array(
									'text' => array(
										'type' => 'text',
										'label' => 'Текст на кнопке'
									),
									'link' => array(
										'type' => 'link',
										'label' => 'Ссылка с кнопки'
									),
									'onclick' => array(
										'type' => 'text',
										'label' => 'Событие onclick'
									),
									'btn_type' => array(
										'type' => 'select',
										'label' => 'Тип кнопки',
										'default' => 'primary',
										'options' => array(
											'rf_primary' => 'Primary',
											'rf_secondary' => 'Secondary',
											'rf_third' => 'Third',
											'rf_primary_white' => 'Primary White',
											'rf_secondary_white' => 'Secondary White',
											'rf_third_white' => 'Third White',
										),
									),

								)
							),

						)
					),


					'right_section' => array(
						'type' => 'section',
						'label' => "Правый блок",
						'hide' => true,
						'fields' => array(
							'header' => array(
								'type' => 'text',
								'label' => 'Заголовок'
							),

							'text' => array(
								'type' => 'tinymce',
								'label' => 'Основной текст',
								'rows' => 10,
								'default_editor' => 'html',
							),

							'image_after' => array(
								'type' => 'media',
								'label' => 'Изображение перед текстом',
								'library' => 'image',
								'fallback' => true,
							),
							'image_before' => array(
								'type' => 'media',
								'label' => 'Изображение после текста',
								'library' => 'image',
								'fallback' => true,
							),
							'background' => array(
								'type' => 'media',
								'label' => 'Фон блока',
								'library' => 'image',
								'fallback' => true,
							),
							'background_type' => array(
								'type' => 'select',
								'label' => 'Тип размера фона',
								'options' => array(
									'cover' => "Заполнение",
									'contain' => "Вписывание"
								),
							),

							'button_1_section' => array(
								'type' => 'section',
								'label' => 'Первая кнопка',
								'hide' => true,
								'fields' => array(
									'text' => array(
										'type' => 'text',
										'label' => 'Текст на кнопке'
									),
									'link' => array(
										'type' => 'link',
										'label' => 'Ссылка с кнопки'
									),
									'onclick' => array(
										'type' => 'text',
										'label' => 'Событие onclick'
									),
									'btn_type' => array(
										'type' => 'select',
										'label' => 'Тип кнопки',
										'default' => 'primary',
										'options' => array(
											'rf_primary' => 'Primary',
											'rf_secondary' => 'Secondary',
											'rf_third' => 'Third',
											'rf_primary_white' => 'Primary White',
											'rf_secondary_white' => 'Secondary White',
											'rf_third_white' => 'Third White',
										),
									),

								)
							),

							'button_2_section' => array(
								'type' => 'section',
								'label' => 'Вторая кнопка',
								'hide' => true,
								'fields' => array(
									'text' => array(
										'type' => 'text',
										'label' => 'Текст на кнопке'
									),
									'link' => array(
										'type' => 'link',
										'label' => 'Ссылка с кнопки'
									),
									'onclick' => array(
										'type' => 'text',
										'label' => 'Событие onclick'
									),
									'btn_type' => array(
										'type' => 'select',
										'label' => 'Тип кнопки',
										'default' => 'primary',
										'options' => array(
											'rf_primary' => 'Primary',
											'rf_secondary' => 'Secondary',
											'rf_third' => 'Third',
											'rf_primary_white' => 'Primary White',
											'rf_secondary_white' => 'Secondary White',
											'rf_third_white' => 'Third White',
										),
									),

								)
							),
						)
					),
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

		return array(
			'elements' => $instance['elements'],
		);
	}
}

siteorigin_widget_register('rf-blocks-slider', __FILE__, 'SiteOrigin_Widget_Rf_Blocks_Slider_Widget');
