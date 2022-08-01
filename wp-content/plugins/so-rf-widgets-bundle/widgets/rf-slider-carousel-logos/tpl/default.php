<?php

/**
 * @var $images
 */

?>

<div class="owl-carousel owl-carousel-logos">

	<?php foreach ($images as $id) { ?>
		<?php $img = wp_get_attachment_image_src($id['image'], 'full', false); ?>
		<div> <img alt="<?= $img[3] ?>" src="<?= $img[0] ?>" /> </div>
	<?php } ?>

</div>