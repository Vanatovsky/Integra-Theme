<?php

/**
 * @var string $text
 * @var bool $name
 * @var bool $country
 * @var string $text
 * @var string $avatar
 */

?>


<div class="rf_teacher_box">
	<div class="rf_wrapper">
		<img class="rf_play" src="/wp-content/themes/rns/image/play.svg" />
		<div class="rf_ava_box" style="background-image: url(<?php echo $avatar ?>)">
			<?php if ($native) { ?>
				<span>Native</span>
			<?php } ?>
		</div>
		<div class="rf_top_desc_top"><?php echo $short_description_top ?></div>
		<div class="rf_name"><?php echo $name ?></div>
		<div class="rf_top_desc"><?php echo $short_description ?></div>
	</div>
</div>