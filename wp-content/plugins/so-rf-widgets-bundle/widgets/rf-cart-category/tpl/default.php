<?php

/**
 * @var string $text
 * @var bool $classic_icon
 * @var bool $wrap
 * @var string $h
 */

?>

<div class="rf-cart-category">
	<a href="<?= sow_esc_url($link) ?>" class="rf_box_all_box"></a>
	<div class="rf-img-box">
		<img alt="<?= $name ?>" src="<?= $main_image[0] ?>" />
	</div>
	<div class="rf-description">
		<p class="rf-count-items">
			<?= $count_items ?> вида(ов) оборудования
		</p>
		<div class="rf-img-in-description">
			<img class="rf-img-show-process" alt="Процесс создания сыров" src="<?= $process_image[0] ?>" />
			<img class="rf-img-show-process-arrow" alt="arrow" src="/wp-content/uploads/2020/12/Subtract.png" />
		</div>
		<h3>
			<?= $name ?>
		</h3>
		<div class="rf-arrow-img">
			<img alt="arrow" src="/wp-content/uploads/2020/12/Arrow2-e1607024749154.png" />
		</div>
	</div>
</div>