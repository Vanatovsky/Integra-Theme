<?php

/**
 * @var array $button_attributes
 * @var string $href
 * @var string $onclick
 * @var string $text_1
 * @var string $text_2
 * @var string $text_3
 * @var string $text_1_type
 * @var string $text_2_type
 * @var string $text_3_type
 * @var string $text_1_size
 * @var string $text_2_size
 * @var string $text_3_size
 * @var string $background
 */

?>


<div class="hero_box <?php if ($fixed_background) { ?>rf_attachment_background<?php } ?>" style="background-image: url(<?= $background[0] ?>);">
	<div class="textwidget custom-html-widget">
		<div class="rf-container">

			<?php if ($side_img) { ?>
				<div class="rf_hero_side_img_box">
					<img <?php if ($width_side) { ?> width="<?= $width_side ?>" <?php } ?> alt='#' src="<?= $side_img[0] ?>" />
				</div>
			<?php } ?>

			<div class="rf_hero_texts_box">
				<?php foreach ($texts as $text) { ?>
					<?php
					$class_center = "";
					if ($text['center'] === 'yes') {
						$class_center = "center";
					}
					?>
					<?php if ($text['text_is_header'] == 'no') { ?>

						<p class="<?= $text['text_type'] ?> <?= $text['text_size'] ?> <?= $class_center ?>">
							<?php if ($text['pimage']) {
								$src_pimage = siteorigin_widgets_get_attachment_image_src(
									$text['pimage'],
									false
								);

							?>
								<img alt="." src="<?= $src_pimage[0] ?>" />
							<?php

							}
							?>
							<?= $text['text'] ?>
						</p>
					<?php } else { ?>
						<<?= $text['text_is_header'] ?> class="<?= $text['text_type'] ?> <?= $text['text_size'] ?> <?= $class_center ?>">
							<?= $text['text'] ?>
						</<?= $text['text_is_header'] ?>>
					<?php } ?>
				<?php } ?>



				<?php if ($button['btn_text']) { ?>
					<?php if (!$button['btn_onclick']) { ?>
						<a class="btn-large rf-<?= $button['btn_type'] ?>" href="<?php echo sow_esc_url($button['btn_link']) ?>"><?= $button['btn_text'] ?></a>
					<?php } else { ?>
						<b class="btn-large rf-<?= $button['btn_type'] ?>" onclick="<?php echo $button['btn_onclick'] ?>"><?= $button['btn_text'] ?></b>
					<?php } ?>
				<?php } ?>




			</div>



		</div>
	</div>
</div>