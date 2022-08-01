<?php

/**
 * @var array $categories
 * @var bool $classic_icon
 * @var bool $wrap
 * @var string $h
 */

?>

<div class="rf_main_cats_list_widget">

	<?php
	foreach ($categories as $item_cat) { ?>

		<div style="background-color:<?php echo get_field("cat_color", 'product_cat_' . $item_cat->term_id) ?>" class="rf_item">

			<div class="rf_header">
				<img alt="<?php echo $item_cat->name ?>" src="/wp-content/themes/rns/image/icons/kapla.svg" />
				<b><?php echo $item_cat->name ?></b>
			</div>

			<?php

			//Получение дочерних категориц
			$child_cats  = get_categories([
				'taxonomy'     => 'product_cat',
				'parent'       => $item_cat->term_id,
				'orderby'      => 'none',
				'order'        => 'ASC',
				'hide_empty'   => 0,

			]);

			?>
			<ul>
				<?php
				$i = 0;
				foreach ($child_cats as $item) {
					$i++;
					if ($i < 4) {
				?>
						<li><a href="<?php echo get_category_link($item->term_id); ?>"><?php echo $item->name ?></a></li>
				<?php
					}
				}

				?>
			</ul>

			<div class="rf_bottom">
				<a href="<?php echo get_category_link($item_cat->term_id); ?>">
					Больше категорий
				</a>
			</div>

		</div>
	<?php
	}
	?>


</div>