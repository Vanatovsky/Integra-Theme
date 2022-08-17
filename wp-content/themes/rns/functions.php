<?php

/**
 * Run Fun functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Run_Fun
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.72');
}

/**
 * RF Tubs
 */
require get_template_directory() . '/functions/register-post-types.php';

if (!function_exists('rns_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function rns_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Run Fun, use a find and replace
		 * to change 'rns' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('rns', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'main-menu' => esc_html__('Primary', 'rns'),
				'footer' => esc_html__('Footer', 'rns'),
				'catalog' => esc_html__('Catalog', 'rns')
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'rns_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action('after_setup_theme', 'rns_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rns_content_width()
{
	$GLOBALS['content_width'] = apply_filters('rns_content_width', 640);
}
add_action('after_setup_theme', 'rns_content_width', 0);




add_filter('before_render_common_meta', 'my_ff_fu');
function my_ff_fu($val)
{
	print_r($val);
	return $val . '223323223323322332322332';
}


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rns_widgets_init()
{

	register_sidebar(
		array(
			'name'          => 'Подвал 1',
			'id'            => 'sidebar-footer-1',
			'description'   => 'Добавьте свои виджеты в подвал сайта',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'Подвал 2',
			'id'            => 'sidebar-footer-2',
			'description'   => 'Добавьте свои виджеты в подвал сайта',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'Подвал 3',
			'id'            => 'sidebar-footer-3',
			'description'   => 'Добавьте свои виджеты в подвал сайта',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'Подвал 4',
			'id'            => 'sidebar-footer-4',
			'description'   => 'Добавьте свои виджеты в подвал сайта',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'Сайдбар на странице каталога',
			'id'            => 'sidebar-catalog-products',
			'description'   => 'Добавьте свои виджеты в сайдбар каталога товаров',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);


	register_sidebar(
		array(
			'name'          => 'Каталог товаров в меню',
			'id'            => 'rf-menu-catalog',
			'description'   => 'Тут должен размещаться виджет «Категории товаров»',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);


	register_sidebar(
		array(
			'name'          => 'Область главного меню 1',
			'id'            => 'rf-menu-main-1',
			'description'   => 'Тут должны размещаться виджеты для Мега Меню',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => 'Область главного меню 2',
			'id'            => 'rf-menu-main-2',
			'description'   => 'Тут должны размещаться виджеты для Мега Меню',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => 'Область главного меню 3',
			'id'            => 'rf-menu-main-3',
			'description'   => 'Тут должны размещаться виджеты для Мега Меню',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => 'Область главного меню 4',
			'id'            => 'rf-menu-main-4',
			'description'   => 'Тут должны размещаться виджеты для Мега Меню',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'Описание в заказе',
			'id'            => 'rf-checkout-desc',
			'description'   => 'Дополнительное описание внутри заказа',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);
}
add_action('widgets_init', 'rns_widgets_init');


/**
 * Enqueue scripts and styles.
 */
function rns_scripts()
{
	//JQUERY
	wp_deregister_script('jquery');
	wp_register_script('jquery', get_template_directory_uri() . '/assets/jquery.min.js');
	wp_enqueue_script('jquery', array(), _S_VERSION, false);

	//JQUERY MIGRATE
	wp_enqueue_script('jquery-migrate', get_template_directory_uri() . '/assets/jquery.migrate.min.js', array(), _S_VERSION);


	//WHALE (only for main page)
	if (is_front_page()) {
		wp_enqueue_script('whale-bundle', get_template_directory_uri() . '/assets/whale.js', array(), _S_VERSION, true);
	}

	//BUNDLE
	wp_enqueue_script('app-bundle', get_template_directory_uri() . '/assets/bundle.js', array(), _S_VERSION, true);


	//OWL CAROUSEL
	// wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl-carousel/owl.carousel.min.js', array(), _S_VERSION, true);
	// wp_enqueue_style('owl-carousel-style', get_template_directory_uri() . '/js/owl-carousel/assets/owl.carousel.min.css', array(), _S_VERSION);
	// wp_enqueue_style('owl-carousel-style-theme', get_template_directory_uri() . '/js/owl-carousel/assets/owl.theme.default.min.css', array(), _S_VERSION);

	//STYLE.CSS
	wp_enqueue_style('rns-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('rns-style', 'rtl', 'replace');

	//wp_enqueue_script('rns-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	//Плагин карусели со старого сайта
	//wp_enqueue_script('rf-slick', get_template_directory_uri() . '/js/slick.js', array(), _S_VERSION, true);

	//SweetAlert
	//wp_enqueue_script('rf-sweetalert', get_template_directory_uri() . '/js/sweetalert.js', array(), _S_VERSION, true);

	//InputMask
	//wp_enqueue_script('rf-input-mask', get_template_directory_uri() . '/js/inputmask.js', array(), _S_VERSION, true);

	//CUSTOM SCRIPTS
	//wp_enqueue_script('rf-scripts', get_template_directory_uri() . '/js/rf-scripts.js', array(), _S_VERSION, true);
	//wp_enqueue_script('rf-scripts-woo', get_template_directory_uri() . '/js/rf-woo.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'rns_scripts');
function enqueue_rf_admin_scripts()
{

	wp_enqueue_script('rf-admin-scripts', get_template_directory_uri() . '/js/rf-admin-scripts.js', array('jquery'), _S_VERSION, true);
}
add_action('admin_enqueue_scripts', 'enqueue_rf_admin_scripts');


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
//require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
}

add_filter('excerpt_length', function () {
	return 20;
});




/**
 * Альтернатива wp_pagenavi. Создает ссылки пагинации на страницах архивов.
 *
 * @param string $before - текст до навигации
 * @param string $after - текст после навигации
 * @param bool $echo - возвращать или выводить результат
 * @param array $args - аргументы функции
 * @param array $wp_query - объект WP_Query на основе которого строится пагинация. По умолчанию глобальная переменная $wp_query
 *
 * Версия: 2.4
 * Автор: Тимур Камаев
 * Ссылка на страницу функции: http://wp-kama.ru/?p=8
 */
function kama_pagenavi($before = '', $after = '', $echo = true, $args = array(), $wp_query = null)
{
	if (!$wp_query) {
		global $wp_query;
	}

	// параметры по умолчанию
	$default_args = array(
		'text_num_page'   => '',
		// Текст перед пагинацией. {current} - текущая; {last} - последняя (пр. 'Страница {current} из {last}' получим: "Страница 4 из 60" )
		'num_pages'       => 10,
		// сколько ссылок показывать
		'step_link'       => 10,
		// ссылки с шагом (значение - число, размер шага (пр. 1,2,3...10,20,30). Ставим 0, если такие ссылки не нужны.
		'dotright_text'   => '…',
		// промежуточный текст "до".
		'dotright_text2'  => '…',
		// промежуточный текст "после".
		'back_text'       => '« назад',
		// текст "перейти на предыдущую страницу". Ставим 0, если эта ссылка не нужна.
		'next_text'       => 'вперед »',
		// текст "перейти на следующую страницу". Ставим 0, если эта ссылка не нужна.
		'first_page_text' => '« к началу',
		// текст "к первой странице". Ставим 0, если вместо текста нужно показать номер страницы.
		'last_page_text'  => 'в конец »',
		// текст "к последней странице". Ставим 0, если вместо текста нужно показать номер страницы.
	);

	$default_args = apply_filters('kama_pagenavi_args', $default_args); // чтобы можно было установить свои значения по умолчанию

	$args = array_merge($default_args, $args);

	extract($args);

	$posts_per_page = (int) $wp_query->query_vars['posts_per_page'];
	$paged          = (int) $wp_query->query_vars['paged'];
	$max_page       = $wp_query->max_num_pages;

	//проверка на надобность в навигации
	if ($max_page <= 1) {
		return false;
	}

	if (empty($paged) || $paged == 0) {
		$paged = 1;
	}

	$pages_to_show         = intval($num_pages);
	$pages_to_show_minus_1 = $pages_to_show - 1;

	$half_page_start = floor($pages_to_show_minus_1 / 2); //сколько ссылок до текущей страницы
	$half_page_end   = ceil($pages_to_show_minus_1 / 2); //сколько ссылок после текущей страницы

	$start_page = $paged - $half_page_start; //первая страница
	$end_page   = $paged + $half_page_end; //последняя страница (условно)

	if ($start_page <= 0) {
		$start_page = 1;
	}
	if (($end_page - $start_page) != $pages_to_show_minus_1) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	if ($end_page > $max_page) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page   = (int) $max_page;
	}

	if ($start_page <= 0) {
		$start_page = 1;
	}

	//выводим навигацию
	$out = '';

	// создаем базу чтобы вызвать get_pagenum_link один раз
	$link_base = str_replace(99999999, '___', get_pagenum_link(99999999));
	$first_url = get_pagenum_link(1);
	if (false === strpos($first_url, '?')) {
		$first_url = user_trailingslashit($first_url);
	}

	$out .= $before . "<div class='wp-pagenavi'>\n";

	if ($text_num_page) {
		$text_num_page = preg_replace('!{current}|{last}!', '%s', $text_num_page);
		$out           .= sprintf("<span class='pages'>$text_num_page</span> ", $paged, $max_page);
	}
	// назад
	if ($back_text && $paged != 1) {
		$out .= '<a class="prev" href="' . (($paged - 1) == 1 ? $first_url : str_replace('___', ($paged - 1), $link_base)) . '">' . $back_text . '</a> ';
	}
	// в начало
	if ($start_page >= 2 && $pages_to_show < $max_page) {
		$out .= '<a class="first" href="' . $first_url . '">' . ($first_page_text ? $first_page_text : 1) . '</a> ';
		if ($dotright_text && $start_page != 2) {
			$out .= '<span class="extend">' . $dotright_text . '</span> ';
		}
	}
	// пагинация
	for ($i = $start_page; $i <= $end_page; $i++) {
		if ($i == $paged) {
			$out .= '<span class="current">' . $i . '</span> ';
		} elseif ($i == 1) {
			$out .= '<a href="' . $first_url . '">1</a> ';
		} else {
			$out .= '<a href="' . str_replace('___', $i, $link_base) . '">' . $i . '</a> ';
		}
	}

	//ссылки с шагом
	$dd = 0;
	if ($step_link && $end_page < $max_page) {
		for ($i = $end_page + 1; $i <= $max_page; $i++) {
			if ($i % $step_link == 0 && $i !== $num_pages) {
				if (++$dd == 1) {
					$out .= '<span class="extend">' . $dotright_text2 . '</span> ';
				}
				$out .= '<a href="' . str_replace('___', $i, $link_base) . '">' . $i . '</a> ';
			}
		}
	}
	// в конец
	if ($end_page < $max_page) {
		if ($dotright_text && $end_page != ($max_page - 1)) {
			$out .= '<span class="extend">' . $dotright_text2 . '</span> ';
		}
		$out .= '<a class="last" href="' . str_replace('___', $max_page, $link_base) . '">' . ($last_page_text ? $last_page_text : $max_page) . '</a> ';
	}
	// вперед
	if ($next_text && $paged != $end_page) {
		$out .= '<a class="next" href="' . str_replace('___', ($paged + 1), $link_base) . '">' . $next_text . '</a> ';
	}

	$out .= "</div>" . $after . "\n";

	$out = apply_filters('kama_pagenavi', $out);

	if ($echo) {
		return print $out;
	}

	return $out;
}



//ДЛЯ РАБОТЫ ПАГИНАЦИИ
function remove_page_from_query_string($query_string)
{
	if ($query_string['name'] == 'page' && isset($query_string['page'])) {
		unset($query_string['name']);
		list($delim, $page_index) = explode('/', $query_string['page']);
		$query_string['paged'] = $page_index;
	}
	return $query_string;
}
add_filter('request', 'remove_page_from_query_string');

function fix_category_pagination($qs)
{
	if (isset($qs['category_name']) && isset($qs['paged'])) {
		$qs['post_type'] = get_post_types($args = array(
			'public'   => true,
			'_builtin' => false
		));
		array_push($qs['post_type'], 'post');
	}
	return $qs;
}
add_filter('request', 'fix_category_pagination');



/**
 * RF Customizer WooCommerce.
 */
require get_template_directory() . '/functions/rf-woo-custom.php';
/**
 * RF Tubs
 */
require get_template_directory() . '/functions/rf-woo-tabs.php';
/**
 * RF Products Options (No working)
 */
//require get_template_directory() . '/functions/rf-woo-product-options.php';
/**
 * RF AJAX
 */
require get_template_directory() . '/rf-ajax.php';

/**
 * RF Customizer Site Origin Page Builder
 */
function rf_custom_container_in_row($x)
{
	$x['rf_container'] = array(
		'name' => 'Content Center',
		'type' => 'checkbox',
		'default' => false,
		'group' => 'attributes',
		'description' => 'Установите этот флажек, если контент должен занимать только центральную рабочую область',
		'priority' => 4
	);
	return $x;
}
add_filter('siteorigin_panels_row_style_fields', 'rf_custom_container_in_row');

function rf_row_render($x, $row)
{

	if ($row['style']['rf_container']) {
		$x[] = 'rf_container_parent';
	}
	return $x;
}
add_filter('siteorigin_panels_row_classes', 'rf_row_render', 5, 2);

function rf_open_container_box()
{
	echo "<div class='rf-container'>";
}

function rf_close_div()
{
	echo "</div>";
}



//For remove wrapper for text inputs in Contact Form 7
add_filter('wpcf7_form_elements', function ($content) {
	$content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
	return $content;
});
