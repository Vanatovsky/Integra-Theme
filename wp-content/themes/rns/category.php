<?php


get_header();

$url_cat_name = str_replace('/', '', $_SERVER['REQUEST_URI']);

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
  // полный список параметров смотрите в описании функции http://wp-kama.ru/function/get_terms
]);

$cat_id = 0;
$string_cat_names = "";
$name_category = "";
if ($categories) {
  $string_cat_names .= '<li><a href="/blog/"> Все статьи </a></li>';
  foreach ($categories as $cat) {

    if ($url_cat_name == $cat->slug) {
      $cat_id = $cat->term_id;
      $name_category = $cat->name;
    }
    $active_class = $url_cat_name == $cat->slug ? "active" : "";
    $string_cat_names .= '<li class="' . $active_class . '"><a href="/' . $cat->slug . '/">' . $cat->name . '</a></li>';
  }
}

?>




<div class="rf-container rf-breadcrumbs">
  <?php if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs(); ?>
</div>

<div class="rf-container">
  <h1 class="with_img"><?= $name_category ?></h1>
  <ul class="rf_cat_list">
    <?= $string_cat_names ?>
  </ul>
</div>




<div class="rf-container">

  <?php
  $args = [
    'posts_per_page' => 9,
    'post_type'      => 'post',
    'cat' => [$cat_id],
    'orderby'        => 'date',
    'order'          => 'DESC',
    'paged' => get_query_var('page') ?: 1 // страница пагинации
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


  <!-- Post navigation -->
  <?php kama_pagenavi('', '', true, array(), $query); ?>


<?php else : ?>
  <p>Записей не найдено</p>
<?php endif; ?>


</div>

<?php if (get_query_var('page') < 2) { ?>
  <div class="panel-grid bottom_description">
    <div class="rf-container">
      <h2><?php single_cat_title() ?> | Блог компании <?php echo bloginfo('name') ?></h2>
      <?php echo category_description(); ?>
    </div>
  </div>
<?php }  ?>


<?php get_footer(); ?>