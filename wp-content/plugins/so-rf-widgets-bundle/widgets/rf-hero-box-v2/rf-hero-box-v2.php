<?php
/*
Widget Name: ♣ Hero Блок v2
Description: Блок с фоновым изображением, заголовками и кнопкой
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Hero_Box_V2_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-hero-box-v2',
			'♣ Hero Блок v2',
			[
				'description' => 'Блок с крупными заголовками (v2)',
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

			'background' => array(
				'type' => 'media',
				'label' => 'Фон',
				'library' => 'image',
				'fallback' => true,
			),
			'fixed_background' => array(
				'type' => 'checkbox',
				'label' => 'Зафисировать фон',
			),
			'side_image' => array(
				'type' => 'media',
				'label' => 'Боковое изображение',
				'library' => 'image',
				'fallback' => true,
			),
			'width_side_img' => array(
				'type' => 'number',
				'label' => 'Размер бокового изображения',
			),


			'texts' => array(
				'type' => 'repeater',
				'label' => 'Абзацы в боксе',
				'item_name'  => '§ Абзац',
				'fields' => array(
					'text' => array(
						'type' => 'text',
						'label' => 'Текст абзаца',
					),
					'text_type' => array(
						'type' => 'select',
						'label' => 'Тип текста',
						'default' => 'hero_light_bold_text',
						'options' => array(
							'hero_light_bold_text' => __('Светлый жирный', 'so-widgets-bundle'),
							'hero_dark_bold_text' => __('Темный жирный', 'so-widgets-bundle'),
							'hero_light_thin_text' => __('Стетлый тонкий', 'so-widgets-bundle'),
							'hero_dark_thin_text' => __('Темный тонкий', 'so-widgets-bundle'),
						),
					),
					'text_size' => array(
						'type' => 'select',
						'label' => 'Размер текста',
						'default' => 'hero_big_text',
						'options' => array(
							'hero_big_text' => 'Большой',
							'hero_middle_text' => 'Средний',
							'hero_small_text' => 'Маленький',
						),
					),
					'text_is_header' => array(
						'type' => 'select',
						'label' => 'Сделать текст заголовом',
						'default' => 'no',
						'options' => array(
							'no' => 'Нет',
							'h1' => 'H1',
							'h2' => 'H2',
						),
					),
					'center' => array(
						'type' => 'select',
						'label' => 'Выравнять по центру',
						'default' => 'no',
						'options' => array(
							'no' => 'Нет',
							'yes' => 'Да',
						),
					),
					'pimage' => array(
						'type' => 'media',
						'label' => 'Картинка вместо текста или вместе',
						'library' => 'image',
						'fallback' => true,
					),
				),
			),

			'button' => array(
				'type' => 'section',
				'label' => 'Кнопка',
				'hide' => true,
				'fields' => array(
					'btn_text' => array(
						'type' => 'text',
						'label' => 'Текст на кнопке',
					),
					'btn_onclick' => array(
						'type' => 'text',
						'label' => 'On Click Event',
					),
					'btn_link' => array(
						'type' => 'link',
						'label' => 'Ссылка с кнопки',
					),
					'btn_type' => [
						'type' => 'select',
						'label' => 'Вид кнопки',
						'default' => 'primary',
						'options' => array(
							'primary' => __('Primary', 'so-widgets-bundle'),
							'secondary' => __('Secondary', 'so-widgets-bundle'),
							'primary-light' => __('Primary Light', 'so-widgets-bundle'),
							'secondary-light' => __('Secondary Light', 'so-widgets-bundle'),
							'white-light' => __('White Light', 'so-widgets-bundle'),
						),
					],
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


		$src = siteorigin_widgets_get_attachment_image_src(
			$instance['background'],
			false
		);

		$src_side_img = siteorigin_widgets_get_attachment_image_src(
			$instance['side_image'],
			false
		);

		return array(
			'background' => $src,
			'side_img' => $src_side_img,
			'texts' => $instance['texts'],
			'button' => $instance['button'],
			'width_side' => $instance['width_side_img'],
			'fixed_background' => $instance['fixed_background']
		);
	}
}

siteorigin_widget_register('rf-hero-box-v2', __FILE__, 'SiteOrigin_Widget_Hero_Box_V2_Widget');
