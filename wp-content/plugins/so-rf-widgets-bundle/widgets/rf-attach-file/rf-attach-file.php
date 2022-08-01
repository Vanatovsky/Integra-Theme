<?php
/*
Widget Name: ♣ Attach File
Description: Add your file on page
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Rf_Attach_File_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-attach-file',
			'♣ Attach File',
			[
				'description' => 'Add your file on page',
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
				'label' => 'File Name',
			),
			'file' => array(
				'type' => 'media',
				'label' => 'Choose attach file',
				'library' => 'application'
			),
			'size' => array(
				'type' => 'number',
				'label' => 'File Size (Kb)',
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

		$file = wp_get_attachment_url($instance['file']);

		return array(
			'title' => $instance['title'],
			'file' => $file,
			'size' => $instance['size']

		);
	}
}

siteorigin_widget_register('rf-attach-file', __FILE__, 'SiteOrigin_Widget_Rf_Attach_File_Widget');
