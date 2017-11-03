<?php
/*
Template Name: Links Template
*/
?>
<?php 
	get_header();

	$tag_pagetitle = get_option('mandigo_tag_pagetitle'      );
?>
	<td id="content" class="<?php echo ($alwayssidebars ? 'narrow' : 'wide'); ?>column">
	<div class="post">
		<?php if (!get_option('mandigo_no_animations')): ?>
			<span class="switch-post">
				<a href="javascript:toggleSidebars();" class="switch-sidebars"><img src="<?php echo $dirs['www']['icons']; ?>bullet_sidebars_hide.png" alt="" class="png" /></a><a href="javascript:togglePost(<?php the_ID(); ?>);" id="switch-post-<?php the_ID(); ?>"><img src="<?php echo $dirs['www']['icons']; ?>bullet_toggle_minus.png" alt="" class="png" /></a>
			</span>
		<?php endif; ?>

		<<?php echo $tag_pagetitle; ?> class="pagetitle"><?php _e('Blogroll','mandigo'); ?>:</<?php echo $tag_pagetitle; ?>>
		<ul>
		<?php get_links_list(); ?>
		</ul>

	</div>
	</td>

<?php
	if (get_option('mandigo_always_show_sidebars')) {
		if (!get_option('mandigo_nosidebars')) {
			include (TEMPLATEPATH . '/sidebar.php');
			if (get_option('mandigo_1024') && get_option('mandigo_3columns')) include (TEMPLATEPATH . '/sidebar2.php');
		}
	}

	get_footer(); 
?>
