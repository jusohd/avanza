<?php
	global $dirs;

	get_header();

	$tag_posttitle_multi = get_option('mandigo_tag_posttitle_multi');
	$tag_pagetitle       = get_option('mandigo_tag_pagetitle'      );

        global $wp_registered_sidebars;
	if ($wp_registered_sidebars) {
		foreach ($wp_registered_sidebars as $key => $value) {
			if ($value['name'] == 'Mandigo Top')    { $index_mandigo_top    = $key; }
			if ($value['name'] == 'Mandigo Bottom') { $index_mandigo_bottom = $key; }
		}
	}
	if (function_exists(wp_get_sidebars_widgets)) $sidebars_widgets = wp_get_sidebars_widgets();

?>
	<td id="content" class="narrowcolumn">
	<?php if (function_exists('dynamic_sidebar') && $sidebars_widgets[$index_mandigo_top]): ?>
	<ul class="inline-widgets">
		<?php dynamic_sidebar('Mandigo Top'); ?>
	</ul>
	<?php endif; ?>

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">
                                <div class="postinfo">
					<?php mandigo_date_icon(get_the_time('Y M m d')); ?>
					<?php if (!get_option('mandigo_no_animations')): ?>
					<span class="switch-post">
						<a href="javascript:toggleSidebars();" class="switch-sidebars"><img src="<?php echo $dirs['www']['icons']; ?>bullet_sidebars_hide.png" alt="" class="png" /></a><a href="javascript:togglePost(<?php the_ID(); ?>);" id="switch-post-<?php the_ID(); ?>"><img src="<?php echo $dirs['www']['icons']; ?>bullet_toggle_minus.png" alt="" class="png" /></a>
					</span>
					<?php endif; ?>
                                        <<?php echo $tag_posttitle_multi; ?> class="posttitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Enlace permanente a %s','mandigo'),the_title('','',false)); ?>"><?php the_title(); ?></a></<?php echo $tag_posttitle_multi; ?>>
                                        <small>
						<?php printf(__('Publicado por: %s en %s','mandigo'),mandigo_author_link(get_the_author_ID(),get_the_author()),get_the_category_list(', ')) ?><?php if (function_exists('the_tags') && !get_option('mandigo_tags_after')) the_tags(', '. __('tags','mandigo') .': '); ?><?php edit_post_link(__('Editar','mandigo'), ' - <img src="'. $dirs['www']['scheme'] .'images/edit.gif" alt="'. __('Editar esta entrada','mandigo') .'" /> ', ''); ?>
					</small>

                                </div>

				<div class="entry">
					<?php the_content(__('Leer el resto de esta entrada','mandigo') .' &raquo;'); ?>
					<?php if (function_exists('the_tags') && get_option('mandigo_tags_after')) the_tags(); ?>
				</div>

				<p class="clear"><img src="<?php echo $dirs['www']['scheme']; ?>images/comments.gif" alt="Comentarios" /> <?php comments_popup_link(__('No hay comentarios','mandigo'). ' &#187;', __('1 comentario','mandigo'). ' &#187;', __('% comentarios','mandigo'). ' &#187;'); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; '. __('Entradas anteriores','mandigo')) ?></div>
			<div class="alignright"><?php previous_posts_link(__('Entradas siguientes','mandigo') .' &raquo;') ?></div>
		</div>

	<?php else : ?>

		<<?php echo $tag_pagetitle; ?> class="center"><?php _e('No se ha encontrado','mandigo'); ?></<?php echo $tag_pagetitle; ?>>
		<p class="center"><?php _e('Lo siento, lo que buscas no está aquí.','mandigo'); ?></p>

	<?php endif; ?>

	<?php if (function_exists('dynamic_sidebar') && $sidebars_widgets[$index_mandigo_bottom]): ?>
	<ul class="inline-widgets">
		<?php dynamic_sidebar('Mandigo Bottom'); ?>
	</ul>
	<?php endif; ?>
	</td>

<?php
	if (!get_option('mandigo_nosidebars')) {
		include (TEMPLATEPATH . '/sidebar.php');
		if (get_option('mandigo_1024') && get_option('mandigo_3columns')) include (TEMPLATEPATH . '/sidebar2.php');
	}

	get_footer(); 
?>
