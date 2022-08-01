<?php

/**
 * @var array $wrapper
 * @var array $left_section
 * @var array $right_section
 * @var string $content_place
 */
?>

<?php

$positions = array();
if ($content_place == 'left') {
	$positions = ['left', 'right'];
} else {
	$positions = ['right', 'left'];
}

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

	<div class="rf_journal_blocks <?php if ($color_white == 'yes') { ?> rf_white_theme <?php } ?>">




		<?php foreach ($positions as $pos) { ?>
			<?php if ($pos == 'left') { ?>
				<div class="rf_main_content">
					<p class="rf_lil_header"><?php echo $left_section['lil_header'] ?></p>
					<h2><?php echo $left_section['big_header'] ?></h2>
					<div class="rf_mini_blocks">
						<?php foreach ($left_section['columns_blocks'] as $block) { ?>
							<div class="rf_item">
								<?php if ($block['header']) { ?>
									<p class="rf_item_header"><?php echo $block['header'] ?></p>
								<?php } ?>
								<div class="rf_item_text"><?php echo $block['text'] ?></div>
							</div>
						<?php } ?>
					</div>
				</div>
			<?php } else { ?>
				<div class="rf_extra_content">
					<?php if ($img_media) { ?>
						<img class="rf_media_image" alt="<?php echo $left_section['big_header'] ?>" src="<?php echo $img_media ?>" <?php if ($right_section['max_height_image']) { ?>style="max-height:<?php echo $right_section['max_height_image'] ?>px" <?php } ?> />
					<?php } ?>
					<?php if (count($right_section['links'])) { ?>
						<div style="<?php if ($right_section['padding_top']) { ?> padding-top:<?php echo $right_section['padding_top'] ?>px;<?php } ?>" class="rf_extra_links">
							<?php foreach ($right_section['links'] as $l) { ?>
								<?php if ($l['onclick']) { ?>
									<b onclick="<?php echo $l['onclick'] ?>">
										<?php if ($content_place == 'right') { ?>
											<img alt="лево" src="/wp-content/themes/rns/assets/images/icons/Arrow-fill-secondary-left.svg" />
										<?php } ?>
										<?php echo $l['text'] ?>
										<?php if ($content_place == 'left') { ?>
											<img alt="право" src="/wp-content/themes/rns/assets/images/icons/Arrow-fill-secondary-right.svg" />
										<?php } ?>
									</b>
								<?php } else { ?>
									<a href="<?php echo sow_esc_url($l['link']) ?>">
										<?php if ($content_place == 'right') { ?>
											<img alt="лево" src="/wp-content/themes/rns/assets/images/icons/Arrow-fill-secondary-left.svg" />
										<?php } ?>
										<?php echo $l['text'] ?>
										<?php if ($content_place == 'left') { ?>
											<img alt="право" src="/wp-content/themes/rns/assets/images/icons/Arrow-fill-secondary-right.svg" />
										<?php } ?>
									</a>
								<?php } ?>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
		<?php } ?>

	</div>


	<?php if ($wrapper) { ?>
	</div>
<?php } ?>