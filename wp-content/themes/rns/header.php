<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Run_Fun
 */

// echo get_theme_mod('rns_email')
// echo get_theme_mod('rns_tel')

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<style>
		#rf_loader_box {
			width: 100vw;
			display: block;
			position: fixed;
			z-index: 1000;

		}

		#rf_loader_box::before {
			content: "";
			display: block;
			width: 100vw;
			height: 60vh;
			position: fixed;
			background-color: #002550;
			background-image: url("/wp-content/themes/rns/assets/images/logo-integra-white.svg");
			background-size: 20% auto;
			background-repeat: no-repeat;
			background-position: center 90%;
			top: 0;
			z-index: 1000;
			transition: all 2s;
		}

		#rf_loader_box::after {
			content: "";
			display: block;
			height: 40vh;
			position: fixed;
			background-color: #002550;
			bottom: 0;
			z-index: 1000;
			width: 100vw;
			transition: all 1s;
		}

		#rf_loader_box.loaded::after,
		#rf_loader_box.loaded::before {
			height: 0;
		}

		#rf_loader_box .preloader-wrapper {
			position: absolute;
			top: 60vh;
			margin: 0 auto;
			left: 0;
			right: 0;
			display: flex;
			justify-content: center;
			z-index: 1001;
			transition: all .3s;
		}

		#rf_loader_box .preloader-wrapper.loaded {
			transform: scale(0);
			top: -200px;
		}
	</style>

	<div id="rf_loader_box">
		<div class="preloader-wrapper big active">
			<div class="spinner-layer">
				<div class="circle-clipper left">
					<div class="circle"></div>
				</div>
				<div class="gap-patch">
					<div class="circle"></div>
				</div>
				<div class="circle-clipper right">
					<div class="circle"></div>
				</div>
			</div>
		</div>
	</div>


	<!-- Yandex.Metrika counter -->

	<!-- /Yandex.Metrika counter -->

	<nav class="rf_header_navigation">
		<div class="rf-container">
			<div class="logo_box">
				<a href="/" title="<?php echo bloginfo('description') ?>">
					<img class="logo_desctop" src="/wp-content/themes/rns/assets/images/logo-integra-white.svg" alt="<?php echo bloginfo('description') ?>" />
				</a>
			</div>
			<div class="rf_right_box">
				<div class="rf_item rf_link_with_text rf_question_form">
					<a href="#modal_question" class="waves-effect waves-light modal-trigger">
						<img alt="Задать вопрос" src="/wp-content/themes/rns/assets/images/Question1.svg" />
						<p>Вопрос по продукции</p>
					</a>
				</div>
				<div class="rf_item rf_link_with_text rf_question_form">
					<a href="<?php echo wc_get_cart_url() ?>" class="waves-effect waves-light modal-trigger">
						<img alt="Запросить КП" src="/wp-content/themes/rns/assets/images/Offer.svg" />
						<p>Ваша корзина <span class="rf_bage"><?php echo WC()->cart->get_cart_contents_count(); ?></span></p>
						<p class="rf_cart_price"><?php echo WC()->cart->get_cart_subtotal(); ?></p>
					</a>
				</div>
				<div class="rf_item">
					<a href="#modal_main_menu" class="modal-trigger">
						<div class="rf_menu_burger">
							<span></span>
							<span></span>
							<span></span>
						</div>
					</a>
				</div>
			</div>
		</div>

	</nav>