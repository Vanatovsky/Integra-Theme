<?php

/**
 * @var array $cells
 */

?>


<div class="rf-container">
    <div class="rf_widget_bundle_icons_676">
        <?php foreach ($cells as $cell) {
            $src = wp_get_attachment_image_url($cell['icon']);
        ?>

            <div class="rf_item">
                <?php if ($cell['link']) { ?>
                    <a href="<?php echo $cell['link'] ?>">
                    <?php } ?>
                    <img alt="<?php echo $cell['header'] ?>" src="<?php echo $src ?>" />
                    <p class="rf_text"><?php echo $cell['header'] ?></p>
                    <?php if ($cell['link']) { ?>
                    </a>
                <?php } ?>
            </div>

        <?php } ?>
    </div>
</div>