<?php

/**
 * @var $images
 * 
 **/

?>
<?php if ($rf_container) { ?>
	<div class="rf-container">
	<?php } ?>

	<div class="rf_icons_row">
		<?php foreach ($items as $item) { ?>

			<?php $img_full = wp_get_attachment_image_src($item['image'], 'full', false); ?>
			<div class="rf_item">
				<img alt="<?php echo $item['text'] ?>" src="<?= $img_full[0] ?>" />
				<span><?php echo $item['text'] ?></span>
			</div>

		<?php } ?>
	</div>

	<?php if ($rf_container) { ?>
	</div>
<?php } ?>