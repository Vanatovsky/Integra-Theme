<?php

/**
 * @var $images
 * 
 **/

?>

<div class="rf-grid_images">

	<?php foreach ($images as $id) { ?>
		<?php $img_full = wp_get_attachment_image_src($id['image'], 'full', false); ?>
		<?php $img = wp_get_attachment_image_src($id['image'], 'medium', false); ?>
		<div class="rf-item">
			<img data-full="<?= $img_full[0] ?>" class="rf-can-open-image" alt="<?= $img[3] ?>" src="<?= $img[0] ?>" />
		</div>
	<?php } ?>

</div>