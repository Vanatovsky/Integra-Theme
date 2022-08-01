<?php

/**
 * @var array $cells
 */

?>
<div class="rf-container">
    <div class="rf-bundle-2334-wrapper-box">
        <?php foreach ($cells as $cell) {
            $src = wp_get_attachment_image_url($cell['icon']);
        ?>
            <div class="rf_item_wrap">
                <div class="rf_item">
                    <a href="<?php echo $cell['link'] ?>">
                        <p class="rf_header">
                            <img alt="<?php echo $cell['header'] ?>" src="<?php echo $src ?>" />
                            <?php echo $cell['header'] ?>
                        </p>
                        <p class="rf_text">
                            <?php echo $cell['text'] ?>
                        </p>
                        <span class="rf_like_link">
                            <?php echo $cell['link_text'] ?>
                            <img alt="<?php echo $cell['header'] ?> - переход" src="/wp-content/themes/rns/image/icons/arrow-go.svg" />
                        </span>
                    </a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>