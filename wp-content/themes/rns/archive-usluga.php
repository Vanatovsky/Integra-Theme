<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Run_Fun
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php
	$post_page = get_page_by_path('uslugi-kompanii', OBJECT, 'page');
	echo SiteOrigin_Panels::renderer()->render($post_page->ID);
	?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
