<?php

/**
 * @var string $text
 * @var bool $classic_icon
 * @var bool $wrap
 * @var string $h
 */

?>
<?php
$style = "";
if ($max_width) {
	$style .= "max-width:" . $max_width . "px;";
}
?>
<div <?php if ($style) { ?>style="<?= $style ?>" <?php } ?> class="rf-classic-text rf-<?= $text_color ?> <?php if ($light_wrapper === true) { ?> rf_light_wrapper <?php } ?>">
	<?= $text ?>
</div>