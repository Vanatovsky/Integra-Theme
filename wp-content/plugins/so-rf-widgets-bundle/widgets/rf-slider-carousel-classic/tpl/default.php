<?php

/**
 * @var $images
 */
$x = rand(0, 10000);
?>

<div id="eeefdd<?php echo $x ?>" class="owl-carousel owl-carousel-main-slider">

	<?php foreach ($images as $id) { ?>
		<?php $img = wp_get_attachment_image_src($id['image'], 'full', false); ?>
		<div> <img data-full="<?= $img[0] ?>" class="rf-can-open-image rf-item-slider" alt="<?= $img[3] ?>" src="<?= $img[0] ?>" /> </div>
	<?php } ?>

</div>