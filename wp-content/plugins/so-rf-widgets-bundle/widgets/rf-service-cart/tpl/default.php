<?php

/**
 * @var string $text
 * @var bool $name
 * @var bool $country
 * @var string $text
 * @var string $avatar
 */



// 'time_plan' => $instance['time_plan'],
// 'count_lesson' => $instance['count_lesson'],
// 'price' => $instance['price'],
// 'price_one_lesson' => $instance['price_one_lesson'],
// 'desc_list' => $instance['desc_list'],
// 'button_text' => $instance['button_text'],
// 'button_link' => $instance['button_link'],
// 'summ_discount' => $instance['summ_discount'],


?>


<div class="rf_service_cart_box">
	<div class="rf_wrapper">
		<p class="rf_time_plan"><?php echo $time_plan ?></p>
		<p class="rf_count_lesson"><?php echo $count_lesson ?></p>
		<p class="rf_price">€ <?php echo $price ?></p>
		<p class="rf_price_one_lesson">€ <?php echo $price_one_lesson ?>/per lesson</p>
		<div class="rf_short_desc_top"></div>
		<div class="rf_short_desc"><?php echo $desc_list ?></div>
		<a class="rf-btn rf-btn-primary" href="<?php echo $button_link ?>"><?php echo $button_text ?></a>
		<?php if ($summ_discount) { ?>
			<p class="rf_summ_discount">SAVE €<?php echo $summ_discount ?></p>
		<?php } ?>
	</div>
</div>