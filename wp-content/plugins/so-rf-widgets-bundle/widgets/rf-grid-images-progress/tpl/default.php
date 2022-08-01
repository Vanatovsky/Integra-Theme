<?php

/**
 * @var $images
 * 
 **/
$n = rand(1, 1000);
?>
<?php if ($rf_container) { ?>
	<div class="rf-container">
	<?php } ?>
	<div id="jkjdujn-<?= $n ?>" class="rf_grid_images_progressive rf_like_owl">

		<?php foreach ($images as $item) { ?>

			<?php
			$h = $item['count_horizontal'];
			$v = $item['count_vertical'];
			?>

			<?php $img_full = wp_get_attachment_image_src($item['image'], 'full', false); ?>

			<div class="rf_item rf_horizont_<?php echo $h ?> rf_vertical_<?php echo $v ?>">
				<div class="rf_image_ground rf-can-open-image" data-full="<?= $img_full[0] ?>" style="background-image:url('<?= $img_full[0] ?>')">
					<p><?php echo $item['text'] ?></p>
				</div>
			</div>

		<?php } ?>

	</div>
	<?php if ($rf_container) { ?>
	</div>
<?php } ?>