<?php

/**
 * @var string $text
 * @var bool $classic_icon
 * @var bool $wrap
 * @var string $h
 */

?>

<?php

$classes = "";

if ($classic_icon) {
	$classes .= 'with_img ';
}

if ($white) {
	$classes .= 'rf_white';
}

$classes_box = "";
if ($wrap) {
	$classes_box .= 'rf-container ';
}

?>
<div class="textwidget <?= $classes_box ?>">
	<h<?php echo $h ?> class="<?= $classes ?> classic_h"  <?php if ($width) {?> style="max-width:<?=$width?>px"  <? }?> > <?= $text ?> </h<?php echo $h ?> >
</div>