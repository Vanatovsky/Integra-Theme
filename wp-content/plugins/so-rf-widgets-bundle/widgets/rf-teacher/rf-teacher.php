<?php
/*
Widget Name: ♣ Учитель
Description: Выводит карточки учителя
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Rf_Teacher_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-teacher',
			'♣ Учитель',
			[
				'description' => 'Выводит карточку учителя',
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

			'avatar' => array(
				'type' => 'media',
				'label' => 'Аватар',
			),

			'name' => array(
				'type' => 'text',
				'label' => 'Имя',
			),

			'short_description_top' => array(
				'type' => 'text',
				'label' => 'Короткое главное описание',
			),

			'short_description' => array(
				'type' => 'text',
				'label' => 'Короткое описание',
			),

			'video' => array(
				'type' => 'media',
				'label' => 'Видео - файл',
			),
			'native' => [
				'type' => 'checkbox',
				'label' => 'Native Speaker?',
			]
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

		$src_ava = siteorigin_widgets_get_attachment_image_src(
			$instance['avatar'],
			false
		);

		return array(
			'avatar' => $src_ava[0],
			'text' => $instance['text'],
			'video' => $instance['video'],
			'name' => $instance['name'],
			'short_description' => $instance['short_description'],
			'short_description_top' => $instance['short_description_top'],
			'native' => $instance['native']
		);
	}
}

siteorigin_widget_register('rf-teacher', __FILE__, 'SiteOrigin_Widget_Rf_Teacher_Widget');
