<?php

/**
 * @var string $text_1

 */





?>
<!-- 
<pre>
	<?php //print_r($tabs) 
	?>
</pre> -->

<div class="rf-tabs-box">
	<div class="rf-tabs-header">
		<ul>
			<?php $h = 0; ?>
			<?php foreach ($tabs as $tab) { ?>
				<li <?php if (!$h) { ?> class="active" <?php } ?>>
					<span><?= $tab['name'] ?></span>
				</li>
			<?php
				$h++;
			}
			?>
		</ul>
	</div>
	<div class="rf-tabs-items">
		<?php $b = 0; ?>
		<?php foreach ($tabs as $tab) { ?>
			<div class="rf-item <?php if (!$b) { ?>visible <?php } ?>">
				<?php foreach ($tab['content'] as $content_box) { ?>
					<div>
						<?= $content_box['text'] ?>
					</div>
				<?php } ?>
			</div>
			<?php $b++; ?>
		<?php } ?>
	</div>
</div>