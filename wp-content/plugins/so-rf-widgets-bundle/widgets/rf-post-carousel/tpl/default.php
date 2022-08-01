<?php

/**
 * @var string $text_1

 */

?>



<?php $catquery = new WP_Query('posts_per_page=5'); ?>
<div class="owl-carousel owl-carousel-post">

	<?php while ($catquery->have_posts()) : $catquery->the_post(); ?>
		<div class="item">
			<div class="rf_inner_box">
				<a href="<?php the_permalink() ?>"></a>
				<div class="rf-img-box">
					<?php echo get_the_post_thumbnail($id, 'image', array('class' => 'prew_img')); ?>
				</div>
				<p class="name"><?php the_title(); ?></p>
				<div class="rf_except"><?php the_excerpt() ?></div>
				<p class="rf-btn rf-btn-primary">Подробнее</p>
			</div>
		</div>
	<?php endwhile;
	wp_reset_postdata(); ?>

</div>