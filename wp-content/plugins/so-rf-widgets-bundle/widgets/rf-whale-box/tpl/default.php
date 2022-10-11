<div id="rf_integra_main_whale_box">

	<canvas id="whalecanvas" class="webgl level2"></canvas>

	<div id="bottom_buttons_whale">
		<div id="bottom_buttons_whale_wrap">
			<div class="btn-bot btn-large" style="" id="button_to_level_1">
				<img alt="Вверх" src="/wp-content/themes/rns/assets/images/icons/Arrow-top.svg" /> Контакты
			</div>
			<div class="btn-bot btn-large active" id="button_to_level_2">
				Продукция
			</div>
			<div class="btn-bot btn-large" id="button_to_level_3">
				Услуги <img alt="Вниз" src="/wp-content/themes/rns/assets/images/icons/Arrow-bottom.svg" />
			</div>
		</div>
	</div>

	<div class="rf_whale_level_1_modal_contacts">
		<h2>Контакты</h2>

		<span class="rf_close_item">
			<img alt="Закрыть окно" src="/wp-content/themes/rns/assets/images/icons/close-blue.svg" />
		</span>
		<div class="rf_phones_links">
			<a href="tel:<?php echo get_theme_mod("rns_tel") ?>"><?php echo get_theme_mod("rns_tel") ?> (бесплатно)</a>
			<a href="tel:<?php echo get_theme_mod("rns_tel_2") ?>"><?php echo get_theme_mod("rns_tel_2") ?></a>
		</div>
		
		<div class="rf_form_box">
			<?php echo do_shortcode('[contact-form-7 id="5972" title="Главная контактная форма"]') ?>
		</div>

		<div class="rf_links_conts_list">
			<ul>
				<li>
					<a href="<?php echo get_theme_mod("rns_soc_whatsapp") ?>">
						<img alt="whatsapp" src="/wp-content/themes/rns/assets/images/icons/whatsapp.svg" />
						<span>whatsapp</span>
					</a>
				</li>
				<li>
					<a href="<?php echo get_theme_mod("rns_soc_telegram") ?>">
						<img alt="telegram" src="/wp-content/themes/rns/assets/images/icons/telegramm.svg" />
						<span>telegram</span>
					</a>
				</li>
				<li>
					<a href="<?php echo get_theme_mod("rns_soc_viber") ?>">
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
	</div>


	<div class="listing_uslug_level_3">

		<span class="rf_close_item">
			<img alt="закрыть" src="/wp-content/themes/rns/assets/images/icons/close-white.svg"/>
		</span>

		<h2>Услуги нашей <br /> компании</h2>
		<p>«Интегра Инжиниринг» – это группа компаний,
включающая в себя производственный блок,
монтажную и сервисную службы, два
интернет-магазина по продаже промышленной
и бытовой инженерной сантехники</p>
		<br />



		<ul>
			<?php foreach ($uslugi as $usl) { ?>

				<li>
					<div class="rf_img_box">
						<?php $us_thum_url = wp_get_attachment_url(get_post_thumbnail_id($usl->ID)); ?>
						<img alt="<?php echo $usl->post_title ?>" src="<?php echo $us_thum_url ?>" />
					</div>
					<div class="rf_service_main_info">
						<h3><?php echo $usl->post_title ?></h3>
						<p><?php echo get_the_excerpt($usl->ID) ?></p>
						<div class="rf_action_buttons">
							<a href="#modal_service_order" class="btn waves-effect modal-trigger">Оставить заявку</a>
							<a href="<?php echo get_permalink($usl->ID) ?>" class="btn waves-effect rf_secondary">Подробнее</a>
						</div>
					</div>
				</li>

			<?php } ?>
		</ul>
	</div>



	<div class="pages_level_2">

		<div id="text_4" class="rf_item">
			<span class="rf_close_item">
				<img alt="Закрыть окно" src="/wp-content/themes/rns/assets/images/icons/close-white.svg" />
			</span>
			<h2>Системы очистки воды <br />(водоподготовки)</h2>
			<div class="inside_content">
				<div class="rf_category_listing_whale">
					<ul>
						<?php foreach ($cats_4 as $cat) { ?>
							<?php
							$thumb_ID = get_term_meta($cat->term_id, 'thumbnail_id', true);
							$img_url = wp_get_attachment_image_url($thumb_ID, 'medium');
							$brands = get_field('cat_brands', $cat);
							$post_link = get_term_link($cat, 'product_cat');

							?>
							<li>
								<div class="rf_top">
									<div class="rf_img_box">
										<img alt="категория" src="<?php echo $img_url ?>" />
									</div>
									<div class="rf_category_title">
										<a href="<?php echo $post_link ?>"><?php echo $cat->name ?></a>
									</div>
								</div>
								<div class="rf_bottom">
									<ul class="rf_list_extra_links">
										<?php foreach ($brands as $br) { ?>
											<li>
												<a href="<?php echo get_term_link($br, 'product_brand') ?>">
													<?php echo $br->name ?>
												</a>
											</li>
										<?php } ?>
									</ul>
								</div>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>

			<div class="rf_bottom_button_box">
				<?php $shop_page_url = get_permalink(wc_get_page_id("shop")); ?>
				<a href="<?php echo $shop_page_url ?>" class="btn-large rf_third rf-btn-left-icon waves-effect waves-light pulse">
					<img alt="Каталог" src="/wp-content/themes/rns/assets/images/icons/catalog-icon.svg" />
					Полный каталог
				</a>
			</div>
		</div>

		<div id="text" class="rf_item">
		<span class="rf_close_item">
				<img alt="Закрыть окно" src="/wp-content/themes/rns/assets/images/icons/close-white.svg" />
			</span>
			<h2>Системы<br /> Автоматизации</h2>
			<div class="inside_content">

				<div class="rf_category_listing_whale">
					<ul>
						<?php foreach ($cats_1 as $cat) { ?>
							<?php
							$thumb_ID = get_term_meta($cat->term_id, 'thumbnail_id', true);
							$img_url = wp_get_attachment_image_url($thumb_ID, 'medium');
							$brands = get_field('cat_brands', $cat);
							$post_link = get_term_link($cat, 'product_cat');

							?>
							<li>
								<div class="rf_top">
									<div class="rf_img_box">
										<img alt="<?php echo $cat->name ?>" src="<?php echo $img_url ?>" />
									</div>
									<div class="rf_category_title">
										<a href="<?php echo $post_link ?>"><?php echo $cat->name ?></a>
									</div>
								</div>
								<div class="rf_bottom">
									<ul class="rf_list_extra_links">
										<?php foreach ($brands as $br) { ?>
											<li>
												<a href="<?php echo get_term_link($br, 'product_brand') ?>">
													<?php echo $br->name ?>
												</a>
											</li>
										<?php } ?>
									</ul>
								</div>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="rf_bottom_button_box">
				<?php
				$shop_page_url = get_permalink(wc_get_page_id("shop"));
				?>
				<a href="<?php echo $shop_page_url ?>" class="btn-large rf_third rf-btn-left-icon waves-effect waves-light pulse">
					<img alt="Каталог" src="/wp-content/themes/rns/assets/images/icons/catalog-icon.svg" />
					Полный каталог
				</a>
			</div>
		</div>

		<div id="text_5" class="rf_item">
			<span class="rf_close_item">
				<img alt="Закрыть окно" src="/wp-content/themes/rns/assets/images/icons/close-white.svg" />
			</span>
			<h2>Отопление и котельные</h2>
			<!-- <p class="rf_after_header">Главное - надежность!</p> -->
			<div class="inside_content">
				<div class="rf_category_listing_whale">
					<ul>
						<?php foreach ($cats_5 as $cat) { ?>
							<?php
							$thumb_ID = get_term_meta($cat->term_id, 'thumbnail_id', true);
							$img_url = wp_get_attachment_image_url($thumb_ID, 'medium');
							$brands = get_field('cat_brands', $cat);
							$post_link = get_term_link($cat, 'product_cat');

							?>
							<li>
								<div class="rf_top">
									<div class="rf_img_box">
										<img alt="<?php echo $cat->name ?>" src="<?php echo $img_url ?>" />
									</div>
									<div class="rf_category_title">
										<a href="<?php echo $post_link ?>"><?php echo $cat->name ?></a>
									</div>
								</div>
								<div class="rf_bottom">
									<ul class="rf_list_extra_links">
										<?php foreach ($brands as $br) { ?>
											<li>
												<a href="<?php echo get_term_link($br, 'product_brand') ?>">
													<?php echo $br->name ?>
												</a>
											</li>
										<?php } ?>
									</ul>
								</div>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="rf_bottom_button_box">
				<?php
				$shop_page_url = get_permalink(wc_get_page_id("shop"));
				?>
				<a href="<?php echo $shop_page_url ?>" class="btn-large rf_third rf-btn-left-icon waves-effect waves-light pulse">
					<img alt="Каталог" src="/wp-content/themes/rns/assets/images/icons/catalog-icon.svg" />
					Полный каталог
				</a>
			</div>
		</div>

		<div id="text_2" class="rf_item">
			<span class="rf_close_item">
				<img alt="Закрыть окно" src="/wp-content/themes/rns/assets/images/icons/close-white.svg" />
			</span>
			<h2>Системы очистки<br /> стоков</h2>
			<div class="inside_content">
				<div class="rf_category_listing_whale">
					<ul>
						<?php foreach ($cats_2 as $cat) { ?>
							<?php
							$thumb_ID = get_term_meta($cat->term_id, 'thumbnail_id', true);
							$img_url = wp_get_attachment_image_url($thumb_ID, 'medium');
							$brands = get_field('cat_brands', $cat);
							$post_link = get_term_link($cat, 'product_cat');

							?>
							<li>
								<div class="rf_top">
									<div class="rf_img_box">
										<img alt="<?php echo $cat->name ?>" src="<?php echo $img_url ?>" />
									</div>
									<div class="rf_category_title">
										<a href="<?php echo $post_link ?>"><?php echo $cat->name ?></a>
									</div>
								</div>
								<div class="rf_bottom">
									<ul class="rf_list_extra_links">
										<?php foreach ($brands as $br) { ?>
											<li>
												<a href="<?php echo get_term_link($br, 'product_brand') ?>">
													<?php echo $br->name ?>
												</a>
											</li>
										<?php } ?>
									</ul>
								</div>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="rf_bottom_button_box">
				<?php
				$shop_page_url = get_permalink(wc_get_page_id("shop"));
				?>
				<a href="<?php echo $shop_page_url ?>" class="btn-large btn_third rf-btn-left-icon waves-effect waves-light pulse">
					<img alt="Каталог" src="/wp-content/themes/rns/assets/images/icons/catalog-icon.svg" />
					Полный каталог
				</a>
			</div>
		</div>

		<div id="text_3" class="rf_item">
			<span class="rf_close_item">
				<img alt="Закрыть окно" src="/wp-content/themes/rns/assets/images/icons/close-white.svg" />
			</span>
			<h2>Насосное<br /> оборудование</h2>
			<div class="inside_content">
				<div class="rf_category_listing_whale">
					<ul>
						<?php foreach ($cats_3 as $cat) { ?>
							<?php
							$thumb_ID = get_term_meta($cat->term_id, 'thumbnail_id', true);
							$img_url = wp_get_attachment_image_url($thumb_ID, 'medium');
							$brands = get_field('cat_brands', $cat);
							$post_link = get_term_link($cat, 'product_cat');

							?>
							<li>
								<div class="rf_top">
									<div class="rf_img_box">
										<img alt="<?php echo $cat->name ?>" src="<?php echo $img_url ?>" />
									</div>
									<div class="rf_category_title">
										<a href="<?php echo $post_link ?>"><?php echo $cat->name ?></a>
									</div>
								</div>
								<div class="rf_bottom">
									<ul class="rf_list_extra_links">
										<?php foreach ($brands as $br) { ?>
											<li>
												<a href="<?php echo get_term_link($br, 'product_brand') ?>">
													<?php echo $br->name ?>
												</a>
											</li>
										<?php } ?>
									</ul>
								</div>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="rf_bottom_button_box">
				<?php
				$shop_page_url = get_permalink(wc_get_page_id("shop"));
				?>
				<a href="<?php echo $shop_page_url ?>" class="btn-large rf_third rf-btn-left-icon waves-effect waves-light pulse">
					<img alt="Каталог" src="/wp-content/themes/rns/assets/images/icons/catalog-icon.svg" />
					Полный каталог
				</a>
			</div>
		</div>

		<div id="pages_level_2_closer"></div>
	</div>

</div>