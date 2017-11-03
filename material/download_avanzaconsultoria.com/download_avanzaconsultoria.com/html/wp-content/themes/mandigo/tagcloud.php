<?php
/*
Template Name: Tag Cloud Template
*/
?>
<?php 
	get_header();

	$tag_pagetitle = get_option('mandigo_tag_pagetitle'      );
?>





	<td id="content" class="narrowcolumn">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<?php if (!get_option('mandigo_no_animations')): ?>
			<span class="switch-post">
				<a href="javascript:toggleSidebars();" class="switch-sidebars"><img src="<?php echo $dirs['www']['icons']; ?>bullet_sidebars_hide.png" alt="" class="png" /></a><a href="javascript:togglePost(<?php the_ID(); ?>);" id="switch-post-<?php the_ID(); ?>"><img src="<?php echo $dirs['www']['icons']; ?>bullet_toggle_minus.png" alt="" class="png" /></a>
			</span>
		<?php endif; ?>
		<<?php echo $tag_pagetitle; ?> class="posttitle"><?php the_title(); ?></<?php echo $tag_pagetitle; ?>>
			<div class="entry">
				<?php the_content(); ?>

				<?php if (function_exists('wp_tag_cloud')) wp_tag_cloud(); ?>

			<div class="clear"></div>
			</div>
		</div>
	<?php edit_post_link('<img src="'. $dirs['www']['scheme'] .'images/edit.gif" alt="" /> '. __('Editar esta página','mandigo'), '<p>', '</p>'); ?>
	<?php endwhile; endif; ?>
	</td>



<?php
	if (!get_option('mandigo_nosidebars')) {
		include (TEMPLATEPATH . '/sidebar.php');
		if (get_option('mandigo_1024') && get_option('mandigo_3columns')) include (TEMPLATEPATH . '/sidebar2.php');
	}

	get_footer(); 
?>
