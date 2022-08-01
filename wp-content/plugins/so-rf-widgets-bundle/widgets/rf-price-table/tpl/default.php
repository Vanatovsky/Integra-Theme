<?php

/**
 * @var string $text
 */

?>

<?php if ($header) { ?>
    <h2 class="table_h"><?= $header ?></h2>
<?php } ?>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Наименование работ</th>
            <th scope="col">Цена</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($strings as $str) { ?>
            <tr>
                <th scope="row"><?= $str['name'] ?></th>
                <td><?= $str['price'] ?></td>
            </tr>
        <?php } ?>

    </tbody>
</table>