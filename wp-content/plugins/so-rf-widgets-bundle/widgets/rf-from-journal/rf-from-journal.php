<?php
/*
Widget Name: ♣ Блок из журнала
Description: Выводит блок с «жунальной» версткой
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Rf_From_Journal_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-from-journal',
			'♣ Блок из журнала',
			[
				'description' => 'Выводит блок с «жунальной» версткой',
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

			'color_white' => array(
				'type' => 'radio',
				'default' => 'no',
				'label' => 'Сделать весь текст былым?',
				'options' => array(
					'yes' => 'Да',
					'no' => 'Нет',
				)
			),


			'left_section' => array(
				'type' => 'section',
				'label' => "Левый блок",
				'hide' => true,
				'fields' => array(

					'lil_header' => array(
						'type' => 'text',
						'label' => 'Маленький верхний заголовок'
					),

					'big_header' => array(
						'type' => 'text',
						'label' => 'Основной заголовок'
					),

					'columns_blocks' => array(
						'type' => 'repeater',
						'label' => 'Блоки с тектом на 1/4',
						'item_name' => 'Блок',
						'item_label' => array(
							'selector'     => "[id*='repeat_text']",
							'update_event' => 'change',
							'value_method' => 'val'
						),
						'fields' => array(
							'header' => array(
								'type' => 'text',
								'label' => 'Заголовок'
							),
							'text' => array(
								'type' => 'tinymce',
								'label' => 'Заголовок'
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

					'full_image' => array(
						'type' => 'media',
						'label' => 'Изображение перед текстом',
						'library' => 'image',
						'fallback' => true,
					),

					'max_height_image' => array(
						'type' => 'number',
						'label' => 'Максимальная васота изображения',
						'width' => '30%'
					),

					'padding_top' => array(
						'type' => 'number',
						'label' => 'Верхний отступ от ссылок в пикселях'
					),

					'links' => array(
						'type' => 'repeater',
						'label' => 'Ссылки',
						'item_name' => 'Ссылка',
						'fields' => array(
							'text' => array(
								'type' => 'text',
								'label' => 'Текст ссылки'
							),
							'link' => array(
								'type' => 'link',
								'label' => 'Ссылка'
							),
							'onclick' => array(
								'type' => 'text',
								'label' => 'onClick'
							),
						)
					)
				)
			),

			'content_place' => array(
				'type' => 'radio',
				'default' => 'left',
				'label' => 'Поменять блоки местами?',
				'options' => array(
					'left' => 'Не менять',
					'right' => 'Поменять',
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

		$img_media = siteorigin_widgets_get_attachment_image_src(
			$instance['right_section']['full_image'],
			false
		);


		return array(
			'wrapper' => $instance['wrapper'],
			'color_white' => $instance['color_white'],
			'left_section' => $instance['left_section'],
			'right_section' => $instance['right_section'],
			'content_place' => $instance['content_place'],
			'img_media' => $img_media[0]
		);
	}
}

siteorigin_widget_register('rf-from-journal', __FILE__, 'SiteOrigin_Widget_Rf_From_Journal_Widget');
