<?php

/**
 * @var array $buttons
 * @var string $offer
 * @var string $wrapper
 * @var string $background 
 */
?>


<!-- <pre> -->
<?php
//print_r($wrapper) 
//print_r($left_section) 
//print_r($right_section) 
//print_r($content_place) 
?>
<!-- </pre> -->



<?php if ($wrapper) { ?>
	<div class="rf-container">
	<?php } ?>


	<div class="rf_central_offer" style="<?php if ($background) { ?> background-image: url(<?php echo $background ?>);<?php } ?>">
		<p class="rf_text_offer"><?php echo $offer ?></p>

	</div>
	<div class="rf_central_offer_bottom_btns">
		<?php foreach ($buttons as $btn) { ?>
			<?php if ($btn['onclick']) { ?>
				<b class="btn-large waves-effect <?php echo $btn['button_type'] ?>"><?php echo $btn['text_button'] ?> </b>
			<?php } else { ?>
				<a class="btn-large waves-effect <?php echo $btn['button_type'] ?> <?php if ($btn['btn_modal']) { ?> modal-trigger <?php } ?>" 
				href="<?php
				if ($btn['btn_modal']){
					echo "#".$btn['btn_modal'];
				} else {
					echo sow_esc_url($btn['link']);
				}
				 ?>">
				<?php echo $btn['text_button'] ?>
			</a>
			<?php } ?>
		<?php } ?>
	</div>

	<?php if ($wrapper) { ?>
	</div>
<?php } ?>