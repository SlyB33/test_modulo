<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * 
 * @package test_modulo
 */

get_header();
?>

	<main id="primary" class="site-main">

<?php the_post(); ?>
<h2>Recent Articles</h2>
<ol><?php wp_get_archives('type=postbypost&limit=10'); ?></ol>
<h2>Archives by Month:</h2>
<ul><?php wp_get_archives('type=monthly'); ?></ul>
	</main><!-- #main -->

<?php

get_footer();
