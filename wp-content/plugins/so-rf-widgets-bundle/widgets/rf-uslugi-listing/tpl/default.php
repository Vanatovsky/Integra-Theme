<div class="rf_uslugi_listing">
	<div class="rf-container">
		<?php foreach ($uslugi as $u) { ?>
			<?php
			$title = $u->post_title;
			$ex = $u->post_excerpt;
			$perm = get_the_permalink($u->ID);
			$img_url = get_the_post_thumbnail_url($u, 'medium');
			?>
			<div class="rf_item">
				<img class="rf_img" alt="<?= $title ?>" src="<?php echo $img_url ?>" />
				<p class="rf_header"><?= $title ?></p>
				<p class="rf_excerpt"><?= $ex ?></p>
				<div class="rf_buttons">
					<div>
						<a class="rf-btn rf-btn-primary" href="<?php echo $perm ?>">Подробнее</a>
					</div>
					<div>
						<span class="rf-btn rf-btn-white-light" onclick="openModal('#zaya_form')">Оставить заявку</span>
					</div>
				</div>
			</div>

		<?php } ?>
	</div>
</div>