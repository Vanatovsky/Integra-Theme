<?php

/**
 * @var string $text
 */

?>

<div class="rf_box_img_side">
    <div>
        <img alt="<?= $header ?>" src="<?= wp_get_attachment_image_src($image)[0] ?>" />
    </div>
    <div>
        <h3 class="classic_mini_primary_h"><?= $header ?></h3>
        <p><?= $text ?></p>
    </div>
</div>