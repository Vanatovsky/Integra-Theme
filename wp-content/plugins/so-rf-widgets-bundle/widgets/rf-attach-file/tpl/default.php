<?php

/**
 * @var string $text
 * @var bool $name
 * @var bool $country
 * @var string $text
 * @var string $avatar
 */


?>

<div class="rf_attach_file_box">
	<div class="rf_wrapper">
		<div class="rf_img_box">
			<img alt="pdf" src="/wp-content/themes/rns/image/pdf.svg" />
		</div>
		<div class="rf_name_n_size">
			<a class="rf_name" href="<?php echo $file ?>" download><?php echo $title ?></a>
			<p class="rf_file_size"><?php echo $size ?> Kb.</p>
		</div>
		<div class="rf_btn_box">
			<a class="rf-btn rf-btn-primary" href="<?php echo $file ?>" download>Download</a>
		</div>
	</div>
</div>