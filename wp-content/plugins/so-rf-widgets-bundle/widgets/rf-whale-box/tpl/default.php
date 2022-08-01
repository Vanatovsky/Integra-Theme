<div id="rf_integra_main_whale_box">

	<!-- <script type="x-shader/x-vertex" id="vertexshader">

		varying vec2 vUv; void main() { vUv = uv; gl_Position = projectionMatrix * modelViewMatrix * vec4( position, 1.0 ); }

		</script>

	<script type="x-shader/x-fragment" id="fragmentshader">

		uniform sampler2D baseTexture; uniform sampler2D bloomTexture; varying vec2 vUv; void main() { gl_FragColor = ( texture2D( baseTexture, vUv ) + vec4( 1.0 ) * texture2D( bloomTexture, vUv ) ); }

	</script> -->

	<h1>Интегра <span>инжиниринг</span></h1>

	<canvas id="whalecanvas" class="webgl level2"></canvas>

	<div id="bottom_buttons_whale">
		<div class="btn-bot btn-large rf_secondary_white" style="" id="button_to_level_1">
			<img alt="контакты" src="/wp-content/themes/rns/assets/images/icons/phone-white.svg" /> Контакты
		</div>
		<div class="btn-bot btn-large rf_secondary_white active" id="button_to_level_2">
			<img alt="Каталог" src="/wp-content/themes/rns/assets/images/icons/catalog-icon.svg" /> Каталог
		</div>
		<div class="btn-bot btn-large rf_secondary_white" id="button_to_level_3">
			<img alt="Услуги" src="/wp-content/themes/rns/assets/images/icons/gear.svg" /> Услуги
		</div>
	</div>


	<div class="rf_whale_level_1_modal_contacts">
		<h2>Контакты</h2>

		<span class="rf_close_item">+</span>
		<div class="rf_phones_links">
			<a href="tel:<?php echo get_theme_mod("rns_tel") ?>"><?php echo get_theme_mod("rns_tel") ?></a>
			<a href="tel:<?php echo get_theme_mod("rns_tel_2") ?>"><?php echo get_theme_mod("rns_tel_2") ?> (бесплатно)</a>
		</div>
		<div class="rf_links_conts_list">
			<ul>
				<li>
					<a href="#">
						<img alt="whatsapp" src="/wp-content/themes/rns/assets/images/icons/whatsapp.svg" />
						<span>whatsapp</span>
					</a>
				</li>
				<li>
					<a href="#">
						<img alt="telegram" src="/wp-content/themes/rns/assets/images/icons/telegramm.svg" />
						<span>telegram</span>
					</a>
				</li>
				<li>
					<a href="#">
						<img alt="viber" src="/wp-content/themes/rns/assets/images/icons/viber.svg" />
						<span>viber</span>
					</a>
				</li>
				<li>
					<a href="mailto:<?php echo get_theme_mod("rns_email") ?>">
						<img alt="email" src="/wp-content/themes/rns/assets/images/icons/email-dog.svg" />
						<span><?php echo get_theme_mod("rns_email") ?></span>
					</a>
				</li>
			</ul>
		</div>
		<div class="rf_form_box">
			<?php echo do_shortcode('[contact-form-7 id="5972" title="Главная контактная форма"]') ?>
		</div>
	</div>


	<div class="listing_uslug_level_3">

		<span class="rf_close_item">+</span>

		<h2>Услуги нашей <br /> компании</h2>
		<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus minus ratione modi aliquam provident dolorum sit illum hic est beatae doloremque nemo, dolor facere commodi assumenda, laboriosam aspernatur dolores quos.</p>
		<br />
		<ul>
			<li>
				<div class="rf_img_box">
					<img alt="service" src="/wp-content/themes/rns/assets/images/icons/cheff_montage.svg" />
				</div>
				<div class="rf_service_main_info">
					<h3>Монтаж, шеф-монтаж</h3>
					<p>Профессиональный монтаж<br /> и сопровождение</p>
					<div class="rf_action_buttons">
						<b class="btn waves-effect">Оставить заявку</b>
						<a href="#" class="btn waves-effect white">Подробнее</a>
					</div>
				</div>
			</li>
			<li>
				<div class="rf_img_box">
					<img alt="service" src="/wp-content/themes/rns/assets/images/icons/service.svg" />
				</div>
				<div class="rf_service_main_info">
					<h3>Сервисное обслуживание</h3>
					<p>Постановка на сервис<br /> и гарантийное обслуживание</p>
					<div class="rf_action_buttons">
						<b class="btn waves-effect">Оставить заявку</b>
						<a href="#" class="btn waves-effect white">Подробнее</a>
					</div>
				</div>
			</li>
			<li>
				<div class="rf_img_box">
					<img alt="service" src="/wp-content/themes/rns/assets/images/icons/tech.svg" />
				</div>
				<div class="rf_service_main_info">
					<h3>Техподдержка и обучение</h3>
					<p>Постановка на сервис<br /> и гарантийное обслуживание</p>
					<div class="rf_action_buttons">
						<b class="btn waves-effect">Оставить заявку</b>
						<a href="#" class="btn waves-effect white">Подробнее</a>
					</div>
				</div>
			</li>
			<li>
				<div class="rf_img_box">
					<img alt="service" src="/wp-content/themes/rns/assets/images/icons/cheff_montage.svg" />
				</div>
				<div class="rf_service_main_info">
					<h3>Монтаж, шеф-монтаж</h3>
					<p>Профессиональный монтаж<br /> и сопровождение</p>
					<div class="rf_action_buttons">
						<b class="btn waves-effect">Оставить заявку</b>
						<a href="#" class="btn waves-effect white">Подробнее</a>
					</div>
				</div>
			</li>
		</ul>
	</div>



	<div class="pages_level_2">

		<div id="text_4" class="rf_item">
			<span class="rf_close_item">+</span>
			<h2>Системы<br /> водоподготовки</h2>
			<div class="inside_content">
				<div class="rf_category_listing_whale">
					<ul>
						<li>
							<div class="rf_top">
								<div class="rf_img_box">
									<img alt="категория" src="/wp-content/themes/rns/assets/images/icons/Filter_big_icon.svg" />
								</div>
								<div class="rf_category_title">
									<a href="#">Фильтры механической очистки</a>
								</div>
							</div>
							<div class="rf_bottom">
								<ul class="rf_list_extra_links">
									<li><a href="#">Raifil HG</a></li>
									<li><a href="#">i2-filter PRE</a></li>
									<li><a href="#">Cintropur</a></li>
								</ul>
							</div>
						</li>
						<li>
							<div class="rf_top">
								<div class="rf_img_box">
									<img alt="категория" src="/wp-content/themes/rns/assets/images/icons/Filter_big_icon.svg" />
								</div>
								<div class="rf_category_title">
									<a href="#">Фильтры механической очистки</a>
								</div>
							</div>
							<div class="rf_bottom">
								<ul class="rf_list_extra_links">
									<li><a href="#">Raifil HG</a></li>
									<li><a href="#">i2-filter PRE</a></li>
									<li><a href="#">Cintropur</a></li>
								</ul>
							</div>
						</li>
						<li>
							<div class="rf_top">
								<div class="rf_img_box">
									<img alt="категория" src="/wp-content/themes/rns/assets/images/icons/Filter_big_icon.svg" />
								</div>
								<div class="rf_category_title">
									<a href="#">Фильтры механической очистки</a>
								</div>
							</div>
							<div class="rf_bottom">
								<ul class="rf_list_extra_links">
									<li><a href="#">Raifil HG</a></li>
									<li><a href="#">i2-filter PRE</a></li>
									<li><a href="#">Cintropur</a></li>
								</ul>
							</div>
						</li>
						<li>
							<div class="rf_top">
								<div class="rf_img_box">
									<img alt="категория" src="/wp-content/themes/rns/assets/images/icons/Filter_big_icon.svg" />
								</div>
								<div class="rf_category_title">
									<a href="#">Фильтры механической очистки</a>
								</div>
							</div>
							<div class="rf_bottom">
								<ul class="rf_list_extra_links">
									<li><a href="#">Raifil HG</a></li>
									<li><a href="#">i2-filter PRE</a></li>
									<li><a href="#">Cintropur</a></li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="rf_bottom_button_box">
				<?php
				$shop_page_url = get_permalink(wc_get_page_id("shop"));
				?>
				<a href="<?php echo $shop_page_url ?>" class="rf-btn rf-btn-third rf-btn-left-icon waves-effect waves-light pulse">
					<img alt="Каталог" src="/wp-content/themes/rns/assets/images/icons/catalog-icon.svg" />
					Полный каталог
				</a>
			</div>
		</div>

		<div id="text" class="rf_item">
			<span class="rf_close_item">+</span>
			<h2>Доставка по<br /> Нижнему Новгороду</h2>
			<div class="inside_content">
				<p>Тут инфо о доставке (в идеале с картой) </p>
			</div>

		</div>

		<div id="text_5" class="rf_item">
			<span class="rf_close_item">+</span>
			<h2>Проверенные<br /> бренды</h2>
			<p class="rf_after_header">Главное - надежность!</p>
			<div class="inside_content">
				<p>Для производства собственной продукции мы используем
					компоненты только проверенных поставщиков.
					Также, всё поставляемое готовое оборудование
					имеет высокую надёжность и доступность расходных
					материалов и комплектующих.</p>

				<div class="rf_grid_logos">
					<a href="#">
						<img alt="partner logo" src="/wp-content/themes/rns/assets/images/logos/akvafor.png" />
					</a>
					<a href="#">
						<img alt="partner logo" src="/wp-content/themes/rns/assets/images/logos/aquapro-logo.png" />
					</a>
					<a href="#">
						<img alt="partner logo" src="/wp-content/themes/rns/assets/images/logos/Canature.png" />
					</a>
					<a href="#">
						<img alt="partner logo" src="/wp-content/themes/rns/assets/images/logos/Cintropur.png" />
					</a>
					<a href="#">
						<img alt="partner logo" src="/wp-content/themes/rns/assets/images/logos/Clack-Corporation.png" />
					</a>
					<a href="#">
						<img alt="partner logo" src="/wp-content/themes/rns/assets/images/logos/geizer.png" />
					</a>
					<a href="#">
						<img alt="partner logo" src="/wp-content/themes/rns/assets/images/logos/raifil-logo.png" />
					</a>
					<a href="#">
						<img alt="partner logo" src="/wp-content/themes/rns/assets/images/logos/Runxin.png" />
					</a>
					<a href="#">
						<img alt="partner logo" src="/wp-content/themes/rns/assets/images/logos/Structural-logo.png" />
					</a>
				</div>
			</div>
			<div class="rf_bottom_button_box">
				<?php
				$shop_page_url = get_permalink(wc_get_page_id("shop"));
				?>
				<a href="<?php echo $shop_page_url ?>" class="rf-btn rf-btn-third rf-btn-left-icon waves-effect waves-light pulse">
					<img alt="Каталог" src="/wp-content/themes/rns/assets/images/icons/catalog-icon.svg" />
					Полный каталог
				</a>
			</div>
		</div>

		<div id="text_2" class="rf_item">
			<span class="rf_close_item">+</span>
			<h2>Системы очистки<br /> стоков</h2>
			<div class="inside_content">
				<div class="rf_category_listing_whale">
					<ul>
						<li>
							<div class="rf_top">
								<div class="rf_img_box">
									<img alt="категория" src="/wp-content/themes/rns/assets/images/icons/Filter_big_icon.svg" />
								</div>
								<div class="rf_category_title">
									<a href="#">Фильтры механической очистки</a>
								</div>
							</div>
							<div class="rf_bottom">
								<ul class="rf_list_extra_links">
									<li><a href="#">Raifil HG</a></li>
									<li><a href="#">i2-filter PRE</a></li>
									<li><a href="#">Cintropur</a></li>
								</ul>
							</div>
						</li>
						<li>
							<div class="rf_top">
								<div class="rf_img_box">
									<img alt="категория" src="/wp-content/themes/rns/assets/images/icons/Filter_big_icon.svg" />
								</div>
								<div class="rf_category_title">
									<a href="#">Фильтры механической очистки</a>
								</div>
							</div>
							<div class="rf_bottom">
								<ul class="rf_list_extra_links">
									<li><a href="#">Raifil HG</a></li>
									<li><a href="#">i2-filter PRE</a></li>
									<li><a href="#">Cintropur</a></li>
								</ul>
							</div>
						</li>
						<li>
							<div class="rf_top">
								<div class="rf_img_box">
									<img alt="категория" src="/wp-content/themes/rns/assets/images/icons/Filter_big_icon.svg" />
								</div>
								<div class="rf_category_title">
									<a href="#">Фильтры механической очистки</a>
								</div>
							</div>
							<div class="rf_bottom">
								<ul class="rf_list_extra_links">
									<li><a href="#">Raifil HG</a></li>
									<li><a href="#">i2-filter PRE</a></li>
									<li><a href="#">Cintropur</a></li>
								</ul>
							</div>
						</li>
						<li>
							<div class="rf_top">
								<div class="rf_img_box">
									<img alt="категория" src="/wp-content/themes/rns/assets/images/icons/Filter_big_icon.svg" />
								</div>
								<div class="rf_category_title">
									<a href="#">Фильтры механической очистки</a>
								</div>
							</div>
							<div class="rf_bottom">
								<ul class="rf_list_extra_links">
									<li><a href="#">Raifil HG</a></li>
									<li><a href="#">i2-filter PRE</a></li>
									<li><a href="#">Cintropur</a></li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="rf_bottom_button_box">
				<?php
				$shop_page_url = get_permalink(wc_get_page_id("shop"));
				?>
				<a href="<?php echo $shop_page_url ?>" class="rf-btn rf-btn-third rf-btn-left-icon waves-effect waves-light pulse">
					<img alt="Каталог" src="/wp-content/themes/rns/assets/images/icons/catalog-icon.svg" />
					Полный каталог
				</a>
			</div>
		</div>

		<div id="text_3" class="rf_item">
			<span class="rf_close_item">+</span>
			<h2>Насосное<br /> оборудование</h2>
			<div class="inside_content">
				<div class="rf_category_listing_whale">
					<ul>
						<li>
							<div class="rf_top">
								<div class="rf_img_box">
									<img alt="категория" src="/wp-content/themes/rns/assets/images/icons/Filter_big_icon.svg" />
								</div>
								<div class="rf_category_title">
									<a href="#">Фильтры механической очистки</a>
								</div>
							</div>
							<div class="rf_bottom">
								<ul class="rf_list_extra_links">
									<li><a href="#">Raifil HG</a></li>
									<li><a href="#">i2-filter PRE</a></li>
									<li><a href="#">Cintropur</a></li>
								</ul>
							</div>
						</li>
						<li>
							<div class="rf_top">
								<div class="rf_img_box">
									<img alt="категория" src="/wp-content/themes/rns/assets/images/icons/Filter_big_icon.svg" />
								</div>
								<div class="rf_category_title">
									<a href="#">Фильтры механической очистки</a>
								</div>
							</div>
							<div class="rf_bottom">
								<ul class="rf_list_extra_links">
									<li><a href="#">Raifil HG</a></li>
									<li><a href="#">i2-filter PRE</a></li>
									<li><a href="#">Cintropur</a></li>
								</ul>
							</div>
						</li>
						<li>
							<div class="rf_top">
								<div class="rf_img_box">
									<img alt="категория" src="/wp-content/themes/rns/assets/images/icons/Filter_big_icon.svg" />
								</div>
								<div class="rf_category_title">
									<a href="#">Фильтры механической очистки</a>
								</div>
							</div>
							<div class="rf_bottom">
								<ul class="rf_list_extra_links">
									<li><a href="#">Raifil HG</a></li>
									<li><a href="#">i2-filter PRE</a></li>
									<li><a href="#">Cintropur</a></li>
								</ul>
							</div>
						</li>
						<li>
							<div class="rf_top">
								<div class="rf_img_box">
									<img alt="категория" src="/wp-content/themes/rns/assets/images/icons/Filter_big_icon.svg" />
								</div>
								<div class="rf_category_title">
									<a href="#">Фильтры механической очистки</a>
								</div>
							</div>
							<div class="rf_bottom">
								<ul class="rf_list_extra_links">
									<li><a href="#">Raifil HG</a></li>
									<li><a href="#">i2-filter PRE</a></li>
									<li><a href="#">Cintropur</a></li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="rf_bottom_button_box">
				<?php
				$shop_page_url = get_permalink(wc_get_page_id("shop"));
				?>
				<a href="<?php echo $shop_page_url ?>" class="rf-btn rf-btn-third rf-btn-left-icon waves-effect waves-light pulse">
					<img alt="Каталог" src="/wp-content/themes/rns/assets/images/icons/catalog-icon.svg" />
					Полный каталог
				</a>
			</div>
		</div>

	</div>

</div>