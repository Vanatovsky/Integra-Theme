<?php
/*
Widget Name: ♣ Hero Блок
Description: Блок с фоновым изображением, заголовками и кнопкой
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Hero_Box_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-hero-box',
			'♣ Hero Блок',
			[
				'description' => 'Блок с крупными заголовками',
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
			'text_1' => array(
				'type' => 'text',
				'label' => 'Текст первый',
			),
			'text_1_type' => array(
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
			'text_1_size' => array(
				'type' => 'select',
				'label' => 'Размер текста',
				'default' => 'hero_big_text',
				'options' => array(
					'hero_big_text' => 'Большой',
					'hero_middle_text' => 'Средний',
					'hero_small_text' => 'Маленький',
				),
			),

			'text_2' => array(
				'type' => 'text',
				'label' => 'Текст второй',
			),
			'text_2_type' => array(
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
			'text_2_size' => array(
				'type' => 'select',
				'label' => 'Размер текста',
				'default' => 'hero_big_text',
				'options' => array(
					'hero_big_text' => 'Большой',
					'hero_middle_text' => 'Средний',
					'hero_small_text' => 'Маленький',
				),
			),

			'text_3' => array(
				'type' => 'text',
				'label' => 'Текст третий',
			),
			'text_3_type' => array(
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
			'text_3_size' => array(
				'type' => 'select',
				'label' => 'Размер текста',
				'default' => 'hero_big_text',
				'options' => array(
					'hero_big_text' => 'Большой',
					'hero_middle_text' => 'Средний',
					'hero_small_text' => 'Маленький',
				),
			),

			'button_attributes' => array(
				'type' => 'section',
				'label' => 'Кнопка',
				'hide' => true,
				'fields' => array(
					'btn_text' => array(
						'type' => 'text',
						'label' => 'Текст на кнопке',
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
						),
					],
				)
			),

			'attributes' => array(
				'type' => 'section',
				'label' => 'Дополнительно',
				'hide' => true,
				'fields' => array(
					'id' => array(
						'type' => 'text',
						'label' => 'ID блока',
						'description' => 'Укажите ID кнопки (по необходимости), помните, что на странице не должно быть 2х элементов с одинаковым ID',
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

		$box_attributes = array();
		$attributes_box = $instance['attributes'];
		if (!empty($attributes_box['id'])) {
			$box_attributes['id'] = $attributes_box['id'];
		}


		$button_attributes = array();
		$attributes = $instance['button_attributes'];
		if (!empty($attributes['new_window'])) {
			$button_attributes['target'] = '_blank';
			$button_attributes['rel'] = 'noopener noreferrer';
		}

		if (!empty($attributes['id'])) {
			$button_attributes['id'] = $attributes['id'];
		}
		if (!empty($attributes['title'])) {
			$button_attributes['title'] = $attributes['title'];
		}
		if (!empty($attributes['rel'])) {
			if (isset($button_attributes['rel'])) {
				$button_attributes['rel'] .= " $attributes[rel]";
			} else {
				$button_attributes['rel'] = $attributes['rel'];
			}
		}

		$src = siteorigin_widgets_get_attachment_image_src(
			$instance['background'],
			false
		);



		return array(
			'box_attributes' => $box_attributes,
			'text_1' => $instance['text_1'],
			'text_2' => $instance['text_2'],
			'text_3' => $instance['text_3'],
			'text_1_type' => $instance['text_1_type'],
			'text_2_type' => $instance['text_2_type'],
			'text_3_type' => $instance['text_3_type'],
			'text_1_size' => $instance['text_1_size'],
			'text_2_size' => $instance['text_2_size'],
			'text_3_size' => $instance['text_3_size'],
			'btn_text' => $attributes['btn_text'],
			'btn_type' => $attributes['btn_type'],
			'button_attributes' => $instance['button_attributes'],
			'background' => $src
		);
	}
}

siteorigin_widget_register('rf-hero-box', __FILE__, 'SiteOrigin_Widget_Hero_Box_Widget');
