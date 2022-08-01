<?php
/*
Widget Name: ♣ Яндекс Карты
Description: Яндекс карта с метками
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Yandex_Map_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-yandex-map',
			'♣ Яндекс Карта',
			[
				'description' => 'Яндекс карта с метками',
				'help' => 'https://run-seo.ru'
			],
			[],
			false,
			plugin_dir_path(__FILE__)
		);
	}


	//Формирование меню настроек в админке
	function get_widget_form()
	{

		return array(
			'auth_key' => array(
				'type' => 'text',
				'label' => 'oAuth KEY для Яндекс API',
			),

			'coordinates' => [
				'type' => 'section',
				'label' => 'Координаты центра карты',
				'hide' => true,
				'fields' => [
					'latitude' => [
						'type' => 'text',
						'label' => 'Широта'
					],
					'longitude' => [
						'type' => 'text',
						'label' => 'Долгота'
					],
					'zoom' => [
						'type' => 'number',
						'label' => 'Приближение (Zoom)'
					]
				],
			],

			'design' => [
				'type' => 'section',
				'label' => 'Изображения',
				'hide' => true,
				'fields' => [
					'img' => [
						'type' => 'media',
						'label' => 'Изображение иконки на карте'
					],
					'img_hover' => [
						'type' => 'media',
						'label' => 'Иконка на карте при наведении'
					],
				],
			],

			'place_marks' => [
				'type' => 'repeater',
				'label' => 'Адреса (точки на карте)',
				'item_name'  => 'Адрес',
				'fields' => [
					'address_type' => [
						'type' => 'select',
						'label' => 'Тип адреса',
						'default' => 'primary',
						'options' => [
							'none' => 'Без типа',
							'partner' => 'Партнер',
							'distrib' => 'Дистрибьютор',
						],
					],
					'company_name' => [
						'type' => 'text',
						'label' => 'Имя компании',
					],
					'latitude' => [
						'type' => 'text',
						'label' => 'Широта'
					],
					'longitude' => [
						'type' => 'text',
						'label' => 'Долгота'
					],
					'address' => [
						'type' => 'text',
						'label' => 'Адрес'
					],
					'phone' => [
						'type' => 'text',
						'label' => 'Телефон'
					],
					'email' => [
						'type' => 'text',
						'label' => 'Email'
					],
					'work_time' => [
						'type' => 'text',
						'label' => 'Время работы'
					],
					'btn_text' => [
						'type' => 'text',
						'label' => 'Текст на кнопке'
					],
					'btn_link' => [
						'type' => 'link',
						'label' => 'Ссылка с кнопки'
					],
					'btn_type' => [
						'type' => 'select',
						'label' => 'Вид кнопки',
						'default' => 'primary',
						'options' => [
							'primary' => 'Primary',
							'secondary' => 'Secondary',
							'primary-light' => 'Primary Light',
							'secondary-light' => 'Secondary Light',
						],
					],
				],
			],

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
			'auth_key' => $instance['auth_key'],
			'coordinates' => $instance['coordinates'],
			'place_marks' => $instance['place_marks'],
			'design' => $instance['design']
		);
	}
}

siteorigin_widget_register('rf-yandex-map', __FILE__, 'SiteOrigin_Widget_Yandex_Map_Widget');
