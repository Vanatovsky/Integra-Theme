<?php
/*
Widget Name: ♣ Podcast
Description: Add your podcast
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Rf_Podcast_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-podcast',
			'♣ Podcast',
			[
				'description' => 'Add your podcast',
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
			'title' => array(
				'type' => 'text',
				'label' => 'Title Podcast',
			),
			'audio_src' => array(
				'type' => 'media',
				'label' => 'Audio File',
				'library' => 'audio',
			),
			'image_src' => array(
				'type' => 'media',
				'label' => 'Image for background',
			),
			'short_desc' => array(
				'type' => 'tinymce',
				'label' => 'Short description podcast',
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


		$src_image = siteorigin_widgets_get_attachment_image_src(
			$instance['image_src'],
			false
		);

		$audio = wp_get_attachment_url($instance['audio_src']);

		return array(
			'title' => $instance['title'],
			'audio_src' => $audio,
			'image_src' => $src_image[0],
			'short_desc' => $instance['short_desc']
		);
	}
}

siteorigin_widget_register('rf-podcast', __FILE__, 'SiteOrigin_Widget_Rf_Podcast_Widget');
