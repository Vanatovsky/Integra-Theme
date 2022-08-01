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

<div class="hero_box" style="background-image: url(<?= $background[0] ?>);">
	<div class="textwidget custom-html-widget">
		<div class="rf-container">
			<p class="<?= $text_1_type ?> <?= $text_1_size ?>">
				<?= $text_1 ?>
			</p>
			<p class="<?= $text_2_type ?> <?= $text_2_size ?>">
				<?= $text_2 ?>
			</p>
			<p class="<?= $text_3_type ?> <?= $text_3_size ?>">
				<?= $text_3 ?>
			</p>
			<?php if ($btn_text !== '') { ?>
				<a <?php foreach ($button_attributes as $name => $val) echo $name . '="' . esc_attr($val) . '" ' ?> class="rf-btn rf-btn-<?= $btn_type ?>" href="<?php echo sow_esc_url($href) ?>"><?= $btn_text ?></a>
			<?php } ?>
		</div>
	</div>
</div>