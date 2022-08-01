<?php

/**
 * @var string $text
 */

?>

<?php if ($header) { ?>
    <h4 class="menu_h"><?= $header ?></h4>
<?php } ?>
<ul class="rf-mini-menu">
    <?php foreach ($strings as $str) { ?>
        <li>
            <a href="<?= sow_esc_url($str['link']) ?>"><?= $str['name'] ?></a>
        </li>
    <?php } ?>
</ul>