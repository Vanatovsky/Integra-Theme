<?php

/**
 * @var string $text
 */
?>
<?php $img_src = wp_get_attachment_image_src($image, 'full', false); ?>

<div class="rf_icon_with_text">
    <?php if ($link) { ?>
        <a href="<?= sow_esc_url($link) ?>">
        <?php } ?>
        <div class="rf_img_box">
            <img alt="<?= $header ?>" src="<?= $img_src[0] ?>" />
        </div>
        <p><?= $header ?></p>

        <?php if ($link) { ?>
        </a>
    <?php } ?>
</div>