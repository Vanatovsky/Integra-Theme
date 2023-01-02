<?php

function rf_woo_royal_category_products_page()
{

    $product_cats = get_terms('product_cat', []);

?>

    <div class='rf-container rf-adminka'>
        <h2>Массовое открепление категорий от товаров</h2>

        <form class="rf_classic_admin_form rf_form_unpin_category" action="<?php echo admin_url('admin-ajax.php'); ?>" method="post">

            <label>Введите строку содержащуюся в названии товара</label>

            <input class="fifty" type="text" name="str_for_search" value="" />

            <label>К какой категории относятся эти товары</label>

            <select name="has_category_id">
                <option value="">Не выбрана</option>
                <?php foreach ($product_cats as $cat) { ?>
                    <option value="<?php echo $cat->term_id ?>"><span class="rf_option_inner"><?php echo $cat->name ?></span></option>
                <?php } ?>
            </select>

            <label>От какой категории нужно открепить товары?</label>

            <select name="unpin_category_slug">
                <option value="">Не выбрана</option>
                <?php foreach ($product_cats as $cat) { ?>
                    <option value="<?php echo $cat->slug ?>"><span class="rf_option_inner"><?php echo $cat->name ?></span></option>
                <?php } ?>
            </select>

            <input type="hidden" name="action" value="rf_product_cat_unpin" />

            <div class="rf_admin_submit_box">
                <img src="/wp-content/plugins/rf-woo-royal/admin/images/fire-x.gif" alt="Огонь" />
                <input class="rf-btn-primary" type="submit" value="Отправить запрос" />
            </div>

        </form>
    </div>


<?php
}
