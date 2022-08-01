<?php
/*
Widget Name: ♣ YouTube слайдер с блоком текста
Description: YouTube слайдер с блоком текста
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Rf_YouTube_double_slider_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-youtube-double-slider',
			'♣ YouTube слайдер с блоком текста',
			[
				'description' => 'YouTube слайдер с блоком текста',
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

			'header' => array(
				'type' => 'text',
				'label' => 'Заголовок'
			),

			'text' => array(
				'type' => 'tinymce',
				'label' => 'Основной контент'
			),

			'link_text_1' => array(
				'type' => 'text',
				'label' => 'Текст первой кнопки'
			),

			'link_1' => array(
				'type' => 'link',
				'label' => 'Ссылка с первой кнопки'
			),

			'onclick_1' => array(
				'type' => 'text',
				'label' => 'Onclick (Первая кнопка)'
			),


			'link_text_2' => array(
				'type' => 'text',
				'label' => 'Текст второй кнопки'
			),

			'link_2' => array(
				'type' => 'link',
				'label' => 'Ссылка с второй кнопки'
			),

			'onclick_2' => array(
				'type' => 'text',
				'label' => 'Onclick (Вторая кнопка)'
			),


			'gray_text' => [
				'type' => 'checkbox',
				'label' => 'Сделать текст темным?',
				'default' => false
			],

			'cells' => array(
				'type' => 'repeater',
				'label' => 'Ячейки набора',
				'item_name'  => 'Ячейка',
				'fields' => array(
					'image' => array(
						'type' => 'media',
						'label' => 'Изображение превью',
					),
					'youtubelink' => array(
						'type' => 'text',
						'label' => 'ID видео, например: QqsVGioJZTQ'
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

		// for ($i = 0; $i < count($instance['cells']); $i++) {
		// 	$instance['cells'][$i]['link'] = sow_esc_url($instance['cells'][$i]['link']);
		// }

		return array(
			'cells' => $instance['cells'],
			'header' => $instance['header'],
			'text' => $instance['text'],
			'link_1' =>  sow_esc_url($instance['link_1']),
			'link_2' =>  sow_esc_url($instance['link_2']),
			'link_text_1' => $instance['link_text_1'],
			'link_text_2' => $instance['link_text_2'],
			'onclick_1' => $instance['onclick_1'],
			'onclick_2' => $instance['onclick_2'],
			'gray_text' => $instance['gray_text']
		);
	}
}

siteorigin_widget_register('rf-youtube-double-slider', __FILE__, 'SiteOrigin_Widget_Rf_YouTube_double_slider_Widget');
