<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Run_Fun
 */

get_header();
?>

<main id="primary" class="site-main">

	<div class="rf_404_header_box">
		<img alt="404" src="/wp-content/themes/rns/image/404.png" />
		<p class="rf_404_header">404</p>
		<p class="rf_404_desc">Такой старницы на найдено.</p>
		<div class="rf_links">
			<a class="rf-btn rf-btn-primary-light" href="/">О компании</a>
			<a class="rf-btn rf-btn-secondary" href="/shop/">Каталог продукции</a>
		</div>
	</div>

</main><!-- #main -->

<?php
get_footer();
