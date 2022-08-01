<?php

/* 
  * Template Name: Шаблон страницы каталога
*/
get_header();

?>


<main>

  <?php
  get_header('shop');

  remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
  do_action('woocommerce_before_main_content');


  $loop = new WP_Query(array(
    'post_type' => 'product',
    'posts_per_page' => 24,
    'order' => 'ASC'
  ));
  $string_ids = '';
  foreach ($loop->posts as $product) {
    $string_ids .= $product->ID . ',';
  }
  $string_ids = substr($string_ids, 0, -1);

  ?>

  <header class="woocommerce-products-header">


    <div class="rf_choice_top_content">
      <?php the_content(); ?>
    </div>

  </header>




  <?php

  dynamic_sidebar('sidebar-choice');

  echo do_shortcode('[products ids="' . $string_ids . '"]');

  do_action('woocommerce_after_main_content');
  ?>

  <div class="rf_choice_bottom_content">
    <?= get_field('content_bottom'); ?>
  </div>

  <?php




  /**
   * Hook: woocommerce_after_main_content.
   *
   * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
   */




  ?>
</main>



<?php get_footer(); ?>