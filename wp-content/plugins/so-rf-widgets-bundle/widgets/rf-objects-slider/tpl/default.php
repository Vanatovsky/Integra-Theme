<?php

/**
 * @var array $objects
 */

?>

<div class="rf_object_slider">
	<div class="rf-container">
		<h2>Примеры наших объектов</h2>
		<div class="rf_top_box">
			
			<div class="rf_nums">
				<div class="rf_num_slider">1/<span><?php echo count($objects) ?></span></div>
			</div>

			<div class="rf_buttons ">
				<span class="rf_left_btn waves-effect"></span>
				<span class="rf_right_btn waves-effect"></span>
			</div>
		</div>
		<div class="rf_object_slider_content owl-carousel">
			<?php foreach ($objects as $ob) { ?>
				
				<?php 
					$image_id = get_post_thumbnail_id($ob->ID);
					$image_url = wp_get_attachment_image_url($image_id, 'full');
					$isset_photo = get_field("isset_photo_album",$ob->ID);
					$isset_video = get_field("isset_order_review", $ob->ID);
				?>

				<div class="rf_item">
					<a href="<?php echo get_post_permalink($ob->ID) ?>">
						<div class="rf_img_box" style="background-image: url(<?php echo $image_url ?>) "></div>
						<h3><?php echo $ob->post_title ?></h3>
						<div class="rf_bottom_item_box">
							<?php if ($isset_photo) { ?>
							<p class="rf_isset_str">
								<img alt="Фотоальбом" src="/wp-content/themes/rns/assets/images/icons/photo-album.svg" />
								фотоальбом
							</p>
							<?php } ?>
							<?php if ($isset_video) { ?>
							<p class="rf_isset_str">
								<img alt="Видеообзор объекта" src="/wp-content/themes/rns/assets/images/icons/video-review.svg" />
								видеообзор
							</p>
							<?php } ?>
						</div>
					</a>
				</div>
				

			<?php } ?>
		</div>
	</div>
</div>

