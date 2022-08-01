<?php

/**
 * Run Fun Theme Customizer
 *
 * @package Run_Fun
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function rns_customize_register($wp_customize)
{
	$wp_customize->get_setting('blogname')->transport         = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

	// <<<<<<<<<<<<<<<<<<<<<<-----------------------------------
	//Панель настроек с телефонами и почтой
	$wp_customize->add_section('another_section', array(
		'title'      => 'Run Fun Телефоны и почта',
		'priority'   => 10,
	));

	//Первый телефон
	$wp_customize->add_setting('rns_tel', [
		'default' => '8 800-0000-00-00',
	]);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rns_tel',
			[
				'label' => 'Первый номер телефона',
				'section' => 'another_section',
				'setting' => 'rns_tel'
			]
		)
	);

	//Второй телефон
	$wp_customize->add_setting('rns_tel_2', [
		'default' => '8 800-0000-00-00',
	]);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rns_tel_2',
			[
				'label' => 'Второй номер телефона',
				'section' => 'another_section',
				'setting' => 'rns_tel_2'
			]
		)
	);

	//Контактная почта
	$wp_customize->add_setting('rns_email', [
		'default' => 'info@sitename.ru',
	]);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rns_email',
			[
				'label' => 'Контактный email адрес',
				'section' => 'another_section',
				'setting' => 'rns_email'
			]
		)
	);


	$wp_customize->add_setting('rns_address', [
		'default' => '<b>090090<b/> г.Москва <br/> Тестовое шоссе, д.17 пом. 0',
	]);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rns_address',
			[
				'label' => 'Укажите адрес компании',
				'section' => 'another_section',
				'setting' => 'rns_address'
			]
		)
	);

	// ----------------------------------->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>


	// <<<<<<<<<<<<<<<<<<<<<<-----------------------------------
	//Панель настроек социальных сетей
	$wp_customize->add_section('social_section', array(
		'title'      => 'Run Fun социальные сети',
		'priority'   => 11,
	));
	//Дзен
	$wp_customize->add_setting('rns_soc_dzen', [
		'default' => '',
	]);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rns_soc_dzen',
			[
				'label' => 'YandexDzen',
				'section' => 'social_section',
				'setting' => 'rns_soc_dzen'
			]
		)
	);

	//YouTube
	$wp_customize->add_setting('rns_soc_youtube', [
		'default' => '',
	]);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rns_soc_youtube',
			[
				'label' => 'Youtube',
				'section' => 'social_section',
				'setting' => 'rns_soc_youtube'
			]
		)
	);

	//Instagram
	$wp_customize->add_setting('rns_soc_instagram', [
		'default' => '',
	]);
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rns_soc_instagram',
			[
				'label' => 'Instagram',
				'section' => 'social_section',
				'setting' => 'rns_soc_instagram'
			]
		)
	);



	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'rns_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'rns_customize_partial_blogdescription',
			)
		);
	}
}
add_action('customize_register', 'rns_customize_register');

//RNS-Custom
// function rns_customize_register($wp_customize)
// {
// 	//Номер телефона в шапке сайта
// 	$wp_customize->add_section('another_section', array(
// 		'title'      => __('Другие настройки', 'rns-migrant'),
// 		'priority'   => 30,
// 	));
// 	$wp_customize->add_setting('rns_tel', [
// 		'default' => '8 800-0000-00-00',
// 	]);
// 	$wp_customize->add_control(
// 		new WP_Customize_Control(
// 			$wp_customize,
// 			'rns_tel',
// 			[
// 				'label' => 'Номер в шапке сайта',
// 				'section' => 'another_section',
// 				'setting' => 'rns_tel'
// 			]
// 		)
// 	);
// 	$wp_customize->add_setting('rns_address', [
// 		'default' => 'Н. Новгород',
// 	]);
// 	$wp_customize->add_control(
// 		new WP_Customize_Control(
// 			$wp_customize,
// 			'rns_address',
// 			[
// 				'label' => 'Адрес в шапке',
// 				'section' => 'another_section',
// 				'setting' => 'rns_address'
// 			]
// 		)
// 	);


// 	//Главный цвет темы
// 	$wp_customize->add_setting('rns_theme_color', [
// 		'default' => '#009900',
// 		'sanitize_callback' => 'sanitize_hex_color'
// 	]);
// 	$wp_customize->add_control(
// 		new WP_Customize_Color_Control(
// 			$wp_customize,
// 			'rns_theme_color',
// 			[
// 				'label' => 'Основной цвет темы',
// 				'section' => 'colors',
// 				'setting' => 'rns_theme_color'
// 			]
// 		)
// 	);
// 	//Второстепенный цвет темы
// 	$wp_customize->add_setting('rns_theme_secondary_color', [
// 		'default' => '#FB8C00',
// 		'sanitize_callback' => 'sanitize_hex_color'
// 	]);
// 	$wp_customize->add_control(
// 		new WP_Customize_Color_Control(
// 			$wp_customize,
// 			'rns_theme_secondary_color',
// 			[
// 				'label' => 'Второстепенный цвет темы',
// 				'section' => 'colors',
// 				'setting' => 'rns_theme_secondary_color'
// 			]
// 		)
// 	);
// }
// add_action('customize_register', 'rns_customize_register');





/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function rns_customize_partial_blogname()
{
	bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function rns_customize_partial_blogdescription()
{
	bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rns_customize_preview_js()
{
	wp_enqueue_script('rns-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), _S_VERSION, true);
}
add_action('customize_preview_init', 'rns_customize_preview_js');
