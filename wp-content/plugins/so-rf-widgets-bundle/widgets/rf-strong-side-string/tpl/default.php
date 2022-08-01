<?php

/**
 * @var array $strings
 */

?>

<ul class="rf_strong_side_string">
    <?php foreach ($strings as $str) { ?>

        <?php

        $img_icon = wp_get_attachment_image_src($str['img'], 'full', false);

        ?>

        <li>
            <img alt="<?= $str['text'] ?>" src="<?= $img_icon[0] ?>" />
            <span><?= $str['text'] ?></span>
        </li>
    <?php } ?>

</ul>