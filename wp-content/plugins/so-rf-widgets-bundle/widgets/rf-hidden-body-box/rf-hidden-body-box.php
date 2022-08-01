<?php
/*
Widget Name: ♣ Hidden Body Box
Description: Put hide/show body box
Author: Vanatovsky
Author URI: https://run-seo.ru
*/

class SiteOrigin_Widget_Rf_Hidden_Body_Box_Widget extends SiteOrigin_Widget
{
	function __construct()
	{

		parent::__construct(
			'rf-hidden-body-box',
			'♣ Hide Body Box',
			[
				'description' => 'Put hide/show body box',
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

			'title_text' => array(
				'type' => 'text',
				'label' => 'Title text',
			),
			'body_text' => array(
				'type' => 'tinymce',
				'label' => 'Hidden Content',
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
			'title_text' => $instance['title_text'],
			'body_text' => $instance['body_text']
		);
	}
}

siteorigin_widget_register('rf-hidden-body-box', __FILE__, 'SiteOrigin_Widget_Rf_Hidden_Body_Box_Widget');
