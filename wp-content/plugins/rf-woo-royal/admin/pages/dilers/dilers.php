<?php

require_once RF_WOO_ROYAL_PLUGIN_DIR . '/admin/pages/dilers/dilers-func.php';

function rf_woo_royal_dilers_page()
{

    $dilers = get_users([
        'role' => 'diler'
    ]);

?>

    <div class="rf-adminka">
        <h2>Дилеры зарегистрированные на сайте</h2>

        <div class="rf_diler_list">
            <div class="rf_item rf_header">
                <div class="rf_name">
                    ID
                </div>
                <div class="rf_name">
                    Название
                </div>
                <div class="rf_email">
                    Электронная почта
                </div>
                <div class="rf_tax">
                    Cкидка (%)
                </div>
                <div class="rf_tax">
                    Действия
                </div>
            </div>


            <?php foreach ($dilers as $diler) { ?>

                <?php
                $diler_tax = get_user_meta($diler->ID, 'diler_tax', true);
                ?>

                <div class="rf_item">
                    <div class="rf_id">
                        <?php echo $diler->ID ?>
                    </div>
                    <div class="rf_name">
                        <?php echo $diler->display_name ?>
                    </div>
                    <div class="rf_email">
                        <?php echo $diler->user_email ?>
                    </div>
                    <div class="rf_tax">
                        <form class="rf_classic_admin_form rf_diller_edit_tax" action="<?php echo admin_url('admin-ajax.php'); ?>" method="post">
                            <input type="number" name="diller_tax" min="0" max="100" value="<?php echo $diler_tax ?>" />
                            <input type="hidden" name="diler_id" value="<?php echo $diler->ID ?>" />
                            <input type="hidden" name="action" value="rf_edit_diler_tax" />
                            <div class="rf_admin_submit_box">
                                <img src="/wp-content/plugins/rf-woo-royal/admin/images/fire-x.gif" alt="Огонь" />
                                <input class="rf-btn-primary" type="submit" value="ОК" />
                            </div>
                        </form>
                    </div>
                    <div class="rf_actions">
                        <div class="rf_admin_fire_box">
                            <img src="/wp-content/plugins/rf-woo-royal/admin/images/fire-x.gif" alt="Огонь" />
                            <a href="/wp-admin/user-edit.php?user_id=<?php echo $diler->ID ?>" class="rf-btn">Редактировать / Подробнее</a>
                        </div>
                    </div>
                </div>

            <?php } ?>

        </div>

    </div>

<?php
}
