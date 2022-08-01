<?php

/**
 * @var $images
 */
$x = rand(0, 10000);
?>

<?php if ($rf_container) { ?>
	<div class="rf-container">
	<?php } ?>

	<div id="ee3dd<?php echo $x ?>" class="owl-carousel owl-carousel-with-navigation">

		<?php foreach ($images as $id) { ?>
			<?php $img = wp_get_attachment_image_src($id['image'], 'full', false); ?>
			<div class="rf_wrapper_image">
				<div data-full="<?= $img[0] ?>" class="rf-can-open-image rf-item-slider" style="background-image:url(<?= $img[0] ?>)"></div>
			</div>
		<?php } ?>

	</div>

	<?php if ($rf_container) { ?>
	</div>
<?php } ?>