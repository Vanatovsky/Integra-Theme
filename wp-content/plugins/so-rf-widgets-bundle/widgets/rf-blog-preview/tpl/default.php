<?php

/**
 * @var string $text_1

 */

?>



<?php $catquery = new WP_Query('posts_per_page=5'); ?>




<div class="rf_blog_preview_box">

	<?php
	$i = 1;
	?>
	<?php while ($catquery->have_posts()) : $catquery->the_post(); ?>

		<?php if ($i == 1) { ?>
			<div class="item rf_big">
				<div class="rf_inner_box">
					<div class="rf_left">
						<a href="<?php the_permalink() ?>">
							<div class="rf-img-box" style="background-image: url(<?php echo get_the_post_thumbnail_url($id); ?>);"></div>
						</a>
					</div>
					<div class="rf_right">
						<p class="name"><?php the_title(); ?></p>
						<p class="rf_date_n_cat">
							<?php echo get_the_date() ?>
							<?php $cat = get_the_category() ?>
							<a href="<?php echo get_category_link($cat[0]->cat_ID) ?>"><?php echo $cat[0]->name ?></a>
						</p>
						<div class="rf_except"><?php the_excerpt() ?></div>
						<a href="<?php the_permalink() ?>" class="rf-btn rf-btn-primary">Подробнее</a>
					</div>
				</div>
			</div>
		<?php } else { ?>
			<div class="item rf_small">
				<div class="rf_inner_box">
					<a class="rf_all_box" href="<?php the_permalink() ?>"></a>
					<div class="rf-img-box" style="background-image: url(<?php echo get_the_post_thumbnail_url($id); ?>);"></div>
					<p class="rf_date_n_cat">
						<?php echo get_the_date() ?>
						<?php $cat = get_the_category() ?>
						<a href="<?php echo get_category_link($cat[0]->cat_ID) ?>"><?php echo $cat[0]->name ?></a>
					</p>
					<p class="name"><?php the_title(); ?></p>
					<div class="rf_except"><?php the_excerpt() ?></div>
				</div>
			</div>
		<?php } ?>

		<?php $i++; ?>
	<?php endwhile;
	wp_reset_postdata(); ?>

	<?php if ($i !== 6) { ?>
</div>
<?php } ?>

</div>