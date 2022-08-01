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
<div class="rf_podcast_block">

	<div class="rf_podcast_preview">
		<div class="rf_img_podcast" style="background-image:url(<?php echo $image_src ?>);"></div>
		<p class="rf_title"><?php echo $title ?></p>
		<audio preloader="none" controls src="<?php echo $audio_src ?>"></audio>
	</div>

	<div class="rf_podcast_description">
		<?php echo $short_desc ?>
	</div>

</div>