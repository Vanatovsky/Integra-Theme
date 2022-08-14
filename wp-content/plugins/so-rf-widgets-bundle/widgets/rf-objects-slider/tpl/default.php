<?php

/**
 * @var array $elements
 */

?>


<div class="rf_boxes_slider_topper">
	<div class="rf_count">
		<span class="rf_active_num">1</span> / <span><?php echo count($elements) ?></span>
	</div>
	<div class="rf_arrow_btns">
		<span class="rf_left_btn waves-effect"></span>
		<span class="rf_right_btn waves-effect"></span>
	</div>
</div>

<div class="rf_boxes_slider owl-carousel">

	<?php foreach ($elements as $el) { ?>
		<div class="rf_item">

			<?php $section = $el['left_section']; ?>
			<?php

			$img_before_arr = array();
			$img_after_arr = array();
			$img_background = array();

			?>

			<?php if ($section['image_before']) { ?>
				<?php $img_before_arr = siteorigin_widgets_get_attachment_image_src(
					$section['image_before'],
					false
				); ?>
			<?php } ?>

			<?php if ($section['image_after']) { ?>
				<?php $img_after_arr = siteorigin_widgets_get_attachment_image_src(
					$section['image_after'],
					false
				); ?>
			<?php } ?>

			<?php if ($section['background']) { ?>
				<?php $img_background = siteorigin_widgets_get_attachment_image_src(
					$section['background'],
					false
				); ?>
			<?php } ?>

			<?php $style_str_wrapper_left = $img_background ? "background-image:url(" . $img_background[0] . ");background-size:" . $section['background_type'] . ";" : "" ?>

			<div class="rf_left" style="<?php echo $style_str_wrapper_left ?>">
				<?php if ($img_before_arr) { ?>
					<img class="rf_img_before" src="<?php echo $img_before_arr[0] ?>" />
				<?php } ?>
				<h2><?php echo $section['header'] ?></h2>
				<?php echo $section['text'] ?>
				<?php if ($img_after_arr) { ?>
					<img class="rf_img_after" src="<?php echo $img_after_arr[0] ?>" />
				<?php } ?>

				<?php if ($section['button_1_section']['text'] || $section['button_2_section']['text']) { ?>
					<div class="rf_buttons">
						<?php if ($section['button_1_section']['text']) { ?>
							<div>
								<?php if ($section['button_1_section']['onclick']) { ?>
									<b class="btn-large <?php echo $section['button_1_section']['btn_type'] ?>" onclick="<?php echo $section['button_1_section']['onclick'] ?>">
										<?php echo $section['button_1_section']['text'] ?>
									</b>
								<?php } else { ?>
									<a class="btn-large <?php echo $section['button_1_section']['btn_type'] ?>" href="<?php echo sow_esc_url($section['button_1_section']['link']) ?>">
										<?php echo $section['button_1_section']['text'] ?>
									</a>
								<?php } ?>
							</div>
						<?php } ?>
						<?php if ($section['button_2_section']['text']) { ?>
							<div>
								<?php if ($section['button_2_section']['onclick']) { ?>
									<b class="btn-large <?php echo $section['button_2_section']['btn_type'] ?>" onclick="<?php echo $section['button_2_section']['onclick'] ?>">
										<?php echo $section['button_2_section']['text'] ?>
									</b>
								<?php } else { ?>
									<a class="btn-large <?php echo $section['button_2_section']['btn_type'] ?>" href="<?php echo sow_esc_url($section['button_2_section']['link']) ?>">
										<?php echo $section['button_2_section']['text'] ?>
									</a>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				<?php } ?>
			</div>

			<?php $section = $el['right_section']; ?>
			<?php

			$img_before_arr = array();
			$img_after_arr = array();
			$img_background = array();

			?>
			<?php if ($section['image_before']) { ?>
				<?php $img_before_arr = siteorigin_widgets_get_attachment_image_src(
					$section['image_before'],
					false
				); ?>
			<?php } ?>

			<?php if ($section['image_after']) { ?>
				<?php $img_after_arr = siteorigin_widgets_get_attachment_image_src(
					$section['image_after'],
					false
				); ?>
			<?php } ?>

			<?php if ($section['background']) { ?>
				<?php $img_background = siteorigin_widgets_get_attachment_image_src(
					$section['background'],
					false
				); ?>
			<?php } ?>

			<?php $style_str_wrapper = $img_background ? "background-image:url(" . $img_background[0] . ");background-size:" . $section['background_type'] . ";" : "" ?>

			<div class="rf_right" style="<?php echo $style_str_wrapper ?>">
				<?php if ($img_before_arr) { ?>
					<img class="rf_img_before" src="<?php echo $img_before_arr[0] ?>" />
				<?php } ?>
				<h2><?php echo $section['header'] ?></h2>
				<?php echo $section['text'] ?>
				<?php if ($img_after_arr) { ?>
					<img class="rf_img_after" src="<?php echo $img_after_arr[0] ?>" />
				<?php } ?>

				<?php if ($section['button_1_section']['text'] || $section['button_2_section']['text']) { ?>
					<div class="rf_buttons">
						<?php if ($section['button_1_section']['text']) { ?>
							<div>
								<?php if ($section['button_1_section']['onclick']) { ?>
									<b class="rf-btn rf-btn-<?php echo $section['button_1_section']['btn_type'] ?>" onclick="<?php echo $section['button_1_section']['onclick'] ?>">
										<?php echo $section['button_1_section']['text'] ?>
									</b>
								<?php } else { ?>
									<a class="rf-btn rf-btn-<?php echo $section['button_1_section']['btn_type'] ?>" href="<?php echo sow_esc_url($section['button_1_section']['link']) ?>">
										<?php echo $section['button_1_section']['text'] ?>
									</a>
								<?php } ?>
							</div>
						<?php } ?>
						<?php if ($section['button_2_section']['text']) { ?>
							<div>
								<?php if ($section['button_2_section']['onclick']) { ?>
									<b class="rf-btn rf-btn-<?php echo $section['button_2_section']['btn_type'] ?>" onclick="<?php echo $section['button_2_section']['onclick'] ?>">
										<?php echo $section['button_2_section']['text'] ?>
									</b>
								<?php } else { ?>
									<a class="rf-btn rf-btn-<?php echo $section['button_2_section']['btn_type'] ?>" href="<?php echo sow_esc_url($section['button_2_section']['link']) ?>">
										<?php echo $section['button_2_section']['text'] ?>
									</a>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				<?php } ?>


			</div>

		</div>
	<?php } ?>


</div>