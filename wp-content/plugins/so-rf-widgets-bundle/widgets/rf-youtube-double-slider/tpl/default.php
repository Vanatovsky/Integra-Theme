<?php

/**
 * @var array $cells
 */

?>
<div class="rf-container">
    <div class="rf_youtube_widget_wrapper">
        <div class="rf_item">

            <div class="rf_youtube_video_box">
                <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo $cells[0]['youtubelink'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <?php if (count($cells) > 1) { ?>
                <div class="owl-carousel rf_youtube_slider_previews">
                    <?php foreach ($cells as $cell) {
                        $src = wp_get_attachment_image_url($cell['image']);
                    ?>
                        <img data-youid="<?php echo $cell['youtubelink'] ?>" alt="Modmash Chanal" src="<?php echo $src ?>" />
                    <?php } ?>
                </div>
            <?php } ?>

        </div>
        <div class="rf_item">
            <h3 class="<?php if ($gray_text) { ?> rf_dark<?php } ?>"><?php echo $header ?></h3>
            <div class="rf_text <?php if ($gray_text) { ?> rf_dark<?php } ?>">
                <?php echo $text ?>
            </div>
            <div class="rf_btns">
                <?php if ($link_1) { ?>
                    <a class="rf-btn rf-btn-primary" href="<?php echo $link_1 ?>"><?php echo $link_text_1 ?></a>
                <?php } ?>
                <?php if ($onclick_1) { ?>
                    <b class="rf-btn rf-btn-primary" onclick="<?= $onclick_1 ?>"><?php echo $link_text_1 ?></b>
                <?php } ?>
                <?php if ($link_2) { ?>
                    <a class="rf-btn <?php if ($gray_text) { ?> rf-btn-secondary <?php } else { ?>rf-btn-white-light<?php } ?>" href="<?php echo $link_2 ?>"><?php echo $link_text_2 ?></a>
                <?php } ?>
                <?php if ($onclick_2) { ?>
                    <b class="rf-btn <?php if ($gray_text) { ?> rf-btn-secondary <?php } else { ?>rf-btn-white-light<?php } ?>" onclick="<?= $onclick_2 ?>"><?php echo $link_text_2 ?></b>
                <?php } ?>
            </div>
        </div>
    </div>
</div>