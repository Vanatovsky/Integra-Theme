<?php

/**
 * @var array $button_attributes
 * @var string $href
 * @var string $onclick
 * @var string $align
 * @var string $icon_image_url
 * @var string $icon
 * @var string $icon_color
 * @var string $text
 */

?>


<?php if ($wrapper) { ?>
	<div class="rf-container">
	<?php } ?>


	<?php if ($onclick) { ?>
		<b class="<?php echo $btn_size ?> <?php echo $btn_type ?>" onclick="<?php echo $onclick ?>" <?php foreach ($button_attributes as $name => $val) echo $name . '="' . esc_attr($val) . '" ' ?>><?= $text ?></b>
	<?php } else { ?>
		<a 
		class="<?php echo $btn_size ?> <?php echo $btn_type ?> <?php if ($modal){ ?> modal-trigger <?php } ?>" 
		href="<?php if ($modal) { ?>#<?php echo $modal; } else { ?><?php echo sow_esc_url($href) ?><?php } ?>"
		<?php foreach ($button_attributes as $name => $val) echo $name . '="' . esc_attr($val) . '" ' ?> 
		>
			<?= $text ?>
		</a>
	<?php } ?>


	<?php if ($wrapper) { ?>
	</div>
<?php } ?>