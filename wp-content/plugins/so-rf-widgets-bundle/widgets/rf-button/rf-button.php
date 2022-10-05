<?php
/*
Widget Name: ♣ Кнопка
Description: Выводит кнопку с возможностью выбора ее стиля
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Button2_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'sow-button-2',
			'♣ Кнопка',
			[
				'description' => 'Стандартная кнопка',
				'help' => 'https://run-seo.ru'
			],
			[],
			false,
			plugin_dir_path(__FILE__)
		);
	}

	//function initialize()
	//{
	// $this->register_frontend_styles(
	// 	array(
	// 		array(
	// 			'sow-button-base',
	// 			plugin_dir_url(__FILE__) . 'css/style.css',
	// 			array(),
	// 			SOW_BUNDLE_VERSION
	// 		),
	// 	)
	// );
	//}

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

			'center' => array(
				'type' => 'checkbox',
				'default' => false,
				'label' => 'По центру',
			),

			'text' => array(
				'type' => 'text',
				'label' => __('Текст на кнопке', 'so-widgets-bundle'),
			),

			'url' => array(
				'type' => 'link',
				'label' => __('URL ссылки', 'so-widgets-bundle'),
			),

			'new_window' => array(
				'type' => 'checkbox',
				'default' => false,
				'label' => __('Open in a new window', 'so-widgets-bundle'),
			),

			'btn_type' => [
				'type' => 'select',
				'label' => 'Цвет кнопки',
				'default' => 'rf_primary',
				'options' => array(
					'rf_primary' => 'Primary',
					'rf_secondary' => 'Secondary',
					'rf_third' => 'Third',
					'rf_primary_white' => 'Primary White',
					'rf_secondary_white' => 'Secondary White',
					'rf_third_white' => 'Third White',
				),
			],

			'btn_size' => [
				'type' => 'select',
				'label' => 'Размер кнопки',
				'default' => 'btn',
				'options' => array(
					'btn' => 'Обычная',
					'btn-large' => 'Большая'
				),
			],

			'attributes' => array(
				'type' => 'section',
				'label' => 'Дополнительно',
				'hide' => true,
				'fields' => array(
					'id' => array(
						'type' => 'text',
						'label' => 'ID Кнопки',
						'description' => 'Укажите ID кнопки (по необходимости), помните, что на странице не должно быть 2х элементов с одинаковым ID',
					),

					'title' => array(
						'type' => 'text',
						'label' => __('Title attribute', 'so-widgets-bundle'),
						'description' => __('Adds a title attribute to the button link.', 'so-widgets-bundle'),
					),

					'onclick' => array(
						'type' => 'text',
						'label' => __('Onclick', 'so-widgets-bundle'),
						'description' => __('Run this Javascript when the button is clicked. Ideal for tracking.', 'so-widgets-bundle'),
					),

					'open_modal' => array(
						'type' => 'text',
						'label' => 'Модальное окно',
						'description' => "Введите ярлык модального окна, которое хотите вызвать",
					),

					'rel' => array(
						'type' => 'text',
						'label' => __('Rel attribute', 'so-widgets-bundle'),
						'description' => __('Adds a rel attribute to the button link.', 'so-widgets-bundle'),
					),

				)
			),
		);
	}



	function get_style_name($instance)
	{
		if (empty($instance['design']['theme'])) return 'atom';
		return $instance['design']['theme'];
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
		$button_attributes = array();

		$attributes = $instance['attributes'];

		$classes = !empty($attributes['classes']) ? $attributes['classes'] : '';
		if (!empty($classes)) {
			$classes .= ' ';
		}

		if (!empty($instance['new_window'])) {
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

		return array(
			'button_attributes' => $button_attributes,
			'href' => !empty($instance['url']) ? $instance['url'] : '#',
			'onclick' => !empty($attributes['onclick']) ? $attributes['onclick'] : '',
			'modal' => !empty($attributes['open_modal']) ? $attributes['open_modal'] : '',
			'text' => $instance['text'],
			'btn_type' => $instance['btn_type'],
			'btn_size' => $instance['btn_size'],
			'center' => $instance['center'],
			'wrapper' => $instance['wrapper'],
		);
	}
}

siteorigin_widget_register('sow-button-2', __FILE__, 'SiteOrigin_Widget_Button2_Widget');
