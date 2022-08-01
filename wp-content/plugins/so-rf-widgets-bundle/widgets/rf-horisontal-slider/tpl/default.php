<?php

/**
 * @var array $images
 */

?>

<?php if ($wrapper) { ?>
	<div class="rf-container">
	<?php } ?>





	<div class='rf_horisontal_one_image_slider owl-carousel'>
		<?php for ($i = 0; $i < count($images); $i++) { ?>
			<?php
			$img_url =  siteorigin_widgets_get_attachment_image_src(
				$images[$i]['image'],
				false
			);
			?>
			<div class="rf_item">
				<img style="max-width:1200px;margin:0 auto;" alt="<?php echo bloginfo('name') . " " . $i ?>" src="<?php echo $img_url[0] ?>" />
			</div>
		<?php } ?>

	</div>
	<div class="rf_horisontal_slider_bottom_navigation">
		<?php for ($x = 0; $x < count($images); $x++) { ?>
			<div class="rf_item <?php if ($x == 0) { ?> rf_active<?php } ?>"></div>
		<?php } ?>
	</div>



	<?php if ($wrapper) { ?>
	</div>
<?php } ?>