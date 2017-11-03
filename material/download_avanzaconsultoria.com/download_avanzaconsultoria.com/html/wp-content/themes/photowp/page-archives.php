<?php
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

		<div id="layer3">
			<ul class="description">
				<li id="title"><?php the_title(); ?></li>
				<li id="desc">
					<?php wp_get_archives('type=postbypost'); ?>
					<!-- customize this by using this page: http://codex.wordpress.org/Template_Tags/wp_get_archives -->
					<!-- or by using several of the WordPress archive plugins available. -->
				</li>
			</ul>
		</div>

<?php get_footer(); ?>
