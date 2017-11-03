<?php
/*
Template Name: Archives Template
*/
?>
<?php 
	get_header();

	$tag_pagetitle = get_option('mandigo_tag_pagetitle'      );
?>
	<td id="content" class="narrowcolumn">
	<div class="post">
	<?php if (!get_option('mandigo_no_animations')): ?>
		<span class="switch-post">
			<a href="javascript:toggleSidebars();" class="switch-sidebars"><img src="<?php echo $dirs['www']['icons']; ?>bullet_sidebars_hide.png" alt="" class="png" /></a><a href="javascript:togglePost(<?php the_ID(); ?>);" id="switch-post-<?php the_ID(); ?>"><img src="<?php echo $dirs['www']['icons']; ?>bullet_toggle_minus.png" alt="" class="png" /></a>
		</span>
	<?php endif; ?>

	<<?php echo $tag_pagetitle; ?> class="pagetitle"><?php _e('Buscar','mandigo'); ?>:</<?php echo $tag_pagetitle; ?>>
	<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<<?php echo $tag_pagetitle; ?> class="pagetitle"><?php _e('Hemeroteca por Mes','mandigo'); ?>:</<?php echo $tag_pagetitle; ?>>
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul>

	<<?php echo $tag_pagetitle; ?> class="pagetitle"><?php _e('Hemeroteca por Sección','mandigo'); ?>:</<?php echo $tag_pagetitle; ?>>
	<ul>
		<?php wp_list_cats(); ?>
	</ul>

	</div>
	</td>

<?php
	if (!get_option('mandigo_nosidebars')) {
		include (TEMPLATEPATH . '/sidebar.php');
		if (get_option('mandigo_1024') && get_option('mandigo_3columns')) include (TEMPLATEPATH . '/sidebar2.php');
	}

	get_footer(); 
?>
