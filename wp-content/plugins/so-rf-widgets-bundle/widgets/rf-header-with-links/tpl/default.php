<?php

/**
 * @var string $text
 * @var bool $classic_icon
 * @var bool $wrap
 * @var string $h
 * @var array $links
 */

?>



<div class="header_with_links">
	<h<?php echo $h ?>>
		<?= $text ?>
	</h<?php echo $h ?>>

	<?php if (count($links)) { ?>
		<ul>
			<?php foreach ($links as $link) { ?>
				<li>
					<a href="<?= $link['url_link'] ?>">

						<?php if ($link['img_link']) { ?>
							<?php $img_src = wp_get_attachment_image_src($link['img_link'], 'full', false); ?>
							<img src="<?= $img_src[0] ?>" alt="<?= $link['text_link'] ?>" />
						<?php } ?>

						<?= $link['text_link'] ?>
					</a>
				</li>
			<?php } ?>
		</ul>
	<?php } ?>
</div>