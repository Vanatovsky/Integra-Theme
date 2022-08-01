<?php

/* 
  * Template Name: Шаблон страницы блога
*/
get_header();


$categories = get_categories([
  'taxonomy'     => 'category',
  'type'         => 'post',
  'child_of'     => 0,
  'parent'       => '',
  'orderby'      => 'name',
  'order'        => 'ASC',
  'hide_empty'   => 1,
  'hierarchical' => 1,
  'exclude'      => '',
  'include'      => '',
  'number'       => 0,
  'pad_counts'   => false,
]);


$string_cat_names = "";

if ($categories) {
  $string_cat_names .= '<li class="active"><a href="/blog/"> Все статьи </a></li>';
  foreach ($categories as $cat) {
    $string_cat_names .= '<li><a href="/' . $cat->slug . '/">' . $cat->name . '</a></li>';
  }
}


?>

<div class="hero_box " style="background-image: url(/wp-content/themes/rns/image/background-1.jpg);">
  <div class="textwidget custom-html-widget">
    <div class="rf-container">
      <div class="rf_hero_texts_box">
        <p class="hero_light_bold_text hero_big_text">Новости,<br> Полезные Статьи</p>
      </div>
    </div>
  </div>
</div>

<div class="rf-container rf-breadcrumbs">
  <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
</div>

<div class="rf-container">
  <h1 class="with_img"><?php the_title(); ?></h1>
  <ul class="rf_cat_list">
    <?= $string_cat_names ?>
  </ul>
</div>

<div class="rf-container">

  <?php
  $args = [
    'posts_per_page' => 9,
    'post_type'      => 'post',
    'orderby'        => 'date',
    'order'          => 'DESC',
    'paged' => get_query_var('paged') ?: 1 // страница пагинации
  ];
  $query =  new WP_Query($args);
  ?>

  <div class="articles_previews">
    <?php $i = 1; ?>
    <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>

        <?php
        if (has_post_thumbnail()) {
          $url_img = get_the_post_thumbnail_url();
        } else {
          $url_img = get_template_directory_uri() . '/assets/images/nophoto.png';
        }
        ?>

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
        <?php wp_reset_postdata() ?>
        <?php $i++ ?>
      <?php endwhile; ?>
  </div>

  <?php if ($query->post_count > 1) { ?>
</div> <!-- previwes_articles -->
<?php } ?>

<!-- Post navigation -->
<?php kama_pagenavi('', '', true, array(), $query); ?>

<?php else : ?>
  <p>Записей не найдено</p>
<?php endif; ?>

</div>

<?php if (get_query_var('paged') < 2) { ?>
  <div class="panel-grid bottom_description">
    <?php the_content(); ?>
  </div>
<?php } ?>

<?php get_footer(); ?>