<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Run_Fun
 */

?>


<div id="bottom-right-button">
	<a href="#">
		<img alt="Наверх" src="/wp-content/themes/rns/assets/images/top-white-arrow.svg" />
	</a>
</div>

<!-- <div id="bottom-left-button">
	<a href="#top_header">
		<i class="fad fa-arrow-circle-up"></i>
	</a>
</div> -->

<div class="top_footer">
	<div class="rf-container">
		<div class="row rf_top_footer_row">
			<div class="col s3 rf_footer_logobox">
				<img alt="Интегра Инжиниринг" src="/wp-content/themes/rns/assets/images/logo-integra-dark.svg" />
			</div>
			<div class="col s9 rf_top_footer_menu">
				<?php wp_nav_menu([
					'theme_location' => 'footer',
					'container' => false,
				]) ?>
			</div>
		</div>

		<div class="row rf_middle_footer_row">
			<div class="col m12 l6 xl3">
				<div class="rf_footer_widget_with_icon">
					<img alt="адрес" src="/wp-content/themes/rns/assets/images/icons/location_dark.svg" />
					<?php echo get_theme_mod("rns_address") ?>
				</div>
			</div>
			<div class="col m12 l6 xl3">
				<div class="rf_footer_widget_with_icon">
					<img alt="телефон" src="/wp-content/themes/rns/assets/images/icons/phone_dark.svg" />
					<p>Офис: <a href="tel:8(831) 4-123-788">(831) 4-123-788</a></p>
					<p>Бухгалтерия: <a href="tel:8(831) 4-226-521">(831) 4-226-521</a></p>
					<p>Сервисная служба: <a href="tel:8(831) 4-133-137">(831) 4-133-137</a></p>
					<p>Отдел продаж: <a href="tel:8-800-201-05-10">8-800-201-05-10 (бесплатный)</a></p>
				</div>
			</div>
			<div class="col m12 l6 xl3">
				<div class="rf_footer_widget_with_icon">
					<img alt="электронный адрес" src="/wp-content/themes/rns/assets/images/icons/email_dark.svg" />
					<p><a href="mailto:<?php echo get_theme_mod("rns_email") ?>"><?php echo get_theme_mod("rns_email") ?></a></p>
				</div>
				<br />
				<div class="rf_footer_widget_with_icon">
					<img alt="кран" src="/wp-content/themes/rns/assets/images/icons/kran_dark.svg" />
					<p>ИМ “Интегра Водный мир”: <a href="https://i2-shop.ru">i2-shop.ru</a></p>
					<p>Интегра Строй-центр: <a href="https://i2-ww.ru">i2-ww.ru</a></p>
				</div>
			</div>
			<div class="col m12 l6 xl3">
				<b class="rf_callback_form btn-large">Обратная связь</b>
				<a class="rf_youtube_bottom_link" href="https://youtube.com">
					<img alt="YouTube" src="/wp-content/themes/rns/assets/images/youtube_logo.svg" />
				</a>
			</div>
		</div>


	</div>
</div>


<footer>

	<div id="footer_desc" class="rf-container">
		<div class="row">
			<div class="col m6 offset-m6 s12">
				<p>© 2010–<?= date('Y') ?>. ООО «Интегра Инжиниринг». Информация, представленная на сайте не является публичной офертой и носит ознакомительный характер.
					Ваши персональные данные при их отправке с форм обратной связи будут обрабатываться в соответствии с <a href="/politic/">политикой конфиденциальности</a>. </p>
			</div>
		</div>
	</div>

</footer>

</div><!-- #page -->


<!-- Open Image -->
<div class="rf-open-image">
	<span class="rf-close">
		<img alt="Закрыть" src="/wp-content/themes/rns/assets/images/close.svg" />
	</span>
	<div id="rf_img_show_wrapper">
		<img id="rf_img_show" alt="##" />
	</div>
</div>



<!-- Modal Question -->
<div id="modal_question" class="modal modal-fixed-footer modal-small">
	<div class="modal-content">
		<h4>Вопрос по продукции</h4>
		<p>Задайте любой вопрос по продукции и наш специалист свяжется с вами</p>
		<?php echo do_shortcode('[contact-form-7 id="5972" title="Главная контактная форма"]') ?>
	</div>
	<div class="modal-footer">
		<a href="#!" class="modal-close waves-effect btn-flat">Закрыть окно</a>
	</div>
</div>


<!-- Modal Com offer -->
<div id="modal_offer" class="modal modal-fixed-footer modal-small">
	<div class="modal-content">
		<h4>Получить коммерческое предложение</h4>
		<p>Быстрый запрос коммерческого предложения</p>
		<?php echo do_shortcode('[contact-form-7 id="5972" title="Главная контактная форма"]') ?>
	</div>
	<div class="modal-footer">
		<a href="#!" class="modal-close waves-effect btn-flat">Закрыть окно</a>
	</div>
</div>

<!-- Modal Service Order -->
<div id="modal_service_order" class="modal modal-fixed-footer modal-small">
	<div class="modal-content">
		<h4>Заявка на услугу</h4>
		<?php echo do_shortcode('[contact-form-7 id="5972" title="Главная контактная форма"]') ?>
	</div>
	<div class="modal-footer">
		<a href="#!" class="modal-close waves-effect btn-flat">Закрыть окно</a>
	</div>
</div>

<!-- Modal Main menu -->
<div id="modal_main_menu" class="modal modal-small">
	<div class="modal-content">
		<div class="top_logo_row row">
			<div class="col s6">
				<img alt="<?php echo bloginfo('name') ?>" src="/wp-content/themes/rns/assets/images/logo-integra-white.svg" />
			</div>
			<div class="col s6">
				<b class="rf_city">Нижний Новгород</b>
			</div>
		</div>

		<div class="rf_menu">
			<?php wp_nav_menu([
				'theme_location' => 'main-menu',
				'container' => false,
			]) ?>
		</div>

		<div class="rf_cust_footer">
			© 2017–<?php echo date("Y") ?>. ООО «Интегра Инжиниринг». Информация, представленная на сайте не является публичной офертой и носит ознакомительный характер.
			Если вы не согласны с Политикой обработки персональных данных, покиньте сайт.
		</div>
	</div>
</div>

<?php
if (!is_front_page()) {
?>
	<script>
		setTimeout(() => {
			const loader_box = document.getElementById("rf_loader_box")
			loader_box.classList.add("loaded")
			const loader_round_box = document.querySelector("#rf_loader_box .preloader-wrapper")
			loader_round_box.classList.add("loaded")
		}, 500)
	</script>
<?php
}
?>


<?php wp_footer(); ?>

</body>

</html>