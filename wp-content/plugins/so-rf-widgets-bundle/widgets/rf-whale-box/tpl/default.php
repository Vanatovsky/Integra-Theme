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
			Продукция
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
							<a href="<?php echo get_permalink($usl->ID) ?>" class="btn waves-effect rf_primary_white">Подробнее</a>
						</div>
					</div>
				</li>

			<?php } ?>
		</ul>
	</div>



	<div class="pages_level_2">

		<div id="text_4" class="rf_item">
			<span class="rf_close_item">+</span>
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
			<span class="rf_close_item">+</span>
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

		</div>

		<div id="text_5" class="rf_item">
			<span class="rf_close_item">+</span>
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
			<span class="rf_close_item">+</span>
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
			<span class="rf_close_item">+</span>
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

	</div>

</div>