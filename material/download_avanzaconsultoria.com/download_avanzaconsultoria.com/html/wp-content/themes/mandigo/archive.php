<?php 
	global $dirs;

	get_header();

	$tag_posttitle_multi = get_option('mandigo_tag_posttitle_multi');
	$tag_pagetitle       = get_option('mandigo_tag_pagetitle'      );
?>
	<td id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>

		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php if (is_category()) { ?>
		<<?php echo $tag_pagetitle; ?> class="pagetitle"><?php printf(__('Hemeroteca de la sección %s','mandigo'),'&#8220;'. single_cat_title('',false) .'&#8221;'); ?></<?php echo $tag_pagetitle; ?>>
		<div class="catdesc"><?php echo category_description(); ?></div>

		<?php } elseif(function_exists(is_tag) && is_tag() ) { ?>
		<<?php echo $tag_pagetitle; ?> class="pagetitle"><?php printf(__('Entradas con la Tag %s','mandigo'),'&#8220;'. single_tag_title('',false) .'&#8221;'); ?></<?php echo $tag_pagetitle; ?>>

		<?php } elseif (is_day()) { ?>
		<<?php echo $tag_pagetitle; ?> class="pagetitle"><?php printf(__('Hemeroteca del %s','mandigo'),get_the_time(__('j F, Y','mandigo'))); ?></<?php echo $tag_pagetitle; ?>>

		<?php } elseif (is_month()) { ?>
		<<?php echo $tag_pagetitle; ?> class="pagetitle"><?php printf(__('Hemeroteca del mes %s','mandigo'),get_the_time(__('F, Y','mandigo'))); ?></<?php echo $tag_pagetitle; ?>>

		<?php } elseif (is_year()) { ?>
		<<?php echo $tag_pagetitle; ?> class="pagetitle"><?php printf(__('Hemeroteca del año %s','mandigo'),get_the_time('Y')); ?></<?php echo $tag_pagetitle; ?>>

		<?php } elseif (is_search()) { ?>
		<<?php echo $tag_pagetitle; ?> class="pagetitle"><?php _e('Resultados de Búsqueda','mandigo'); ?></<?php echo $tag_pagetitle; ?>>

		<?php } elseif (is_author()) { ?>
		<<?php echo $tag_pagetitle; ?> class="pagetitle"><?php _e('Hemeroteca del Autor','mandigo'); ?></<?php echo $tag_pagetitle; ?>>

		<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<<?php echo $tag_pagetitle; ?> class="pagetitle"><?php _e('Hemeroteca','mandigo'); ?></<?php echo $tag_pagetitle; ?>>

		<?php } ?>


		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo;&nbsp;'. __('Entradas anteriores','mandigo')) ?></div>
			<div class="alignright"><?php previous_posts_link(__('Entradas siguientes','mandigo'). '&nbsp;&raquo;') ?></div>
		</div>

		<?php while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
                                <div class="postinfo">
					<?php mandigo_date_icon(get_the_time('Y M m d')); ?>
					<?php if (!get_option('mandigo_no_animations')): ?>
					<span class="switch-post">
						<a href="javascript:toggleSidebars();" class="switch-sidebars"><img src="<?php echo $dirs['www']['icons']; ?>bullet_sidebars_hide.png" alt="" class="png" /></a><a href="javascript:togglePost(<?php the_ID(); ?>);" id="switch-post-<?php the_ID(); ?>"><img src="<?php echo $dirs['www']['icons']; ?>bullet_toggle_minus.png" alt="" class="png" /></a>
					</span>
					<?php endif; ?>
                                        <<?php echo $tag_posttitle_multi; ?> class="posttitle posttitle-archive"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Enlace permanente a %s','mandigo'),the_title('','',false)); ?>"><?php the_title(); ?></a></<?php echo $tag_posttitle_multi; ?>>
                                        <small>
						<?php printf(__('Publicado por: %s in %s','mandigo'),mandigo_author_link(get_the_author_ID(),get_the_author()),get_the_category_list(', ')) ?><?php if (function_exists('the_tags') && !get_option('mandigo_tags_after')) the_tags(', '. __('tags','mandigo') .': '); ?><?php edit_post_link('<img src="'. $dirs['www']['scheme'] .'images/edit.gif" alt="'. __('Editar esta entrada','mandigo') .'" /> '. __('Editar','mandigo'), ' - ', ''); ?>  
					</small>
                                </div>

				<div class="entry">
					<?php the_content() ?>
					<?php if (function_exists('the_tags') && get_option('mandigo_tags_after')) the_tags(); ?>
				</div>

				<p class="clear"><img src="<?php echo $dirs['www']['scheme']; ?>images/comments.gif" alt="Comentarios" /> <?php comments_popup_link(__('No hay comentarios','mandigo'). ' &#187;', __('1 comentario','mandigo'). ' &#187;', __('% comentarios','mandigo'). ' &#187;'); ?></p>

			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo;&nbsp;'. __('Entradas anteriores','mandigo')) ?></div>
			<div class="alignright"><?php previous_posts_link(__('Entradas siguientes','mandigo'). '&nbsp;&raquo;') ?></div>
		</div>

	<?php else : ?>

		<<?php echo $tag_pagetitle; ?> class="pagetitle"><?php _e('No se ha encontrado','mandigo'); ?></<?php echo $tag_pagetitle; ?>>
		<p class="center"><?php _e('Lo siento, lo que buscas no está aquí','mandigo'); ?>.</p>

	<?php endif; ?>

	</td>

<?php
	if (!get_option('mandigo_nosidebars')) {
		include (TEMPLATEPATH . '/sidebar.php');
		if (get_option('mandigo_1024') && get_option('mandigo_3columns')) include (TEMPLATEPATH . '/sidebar2.php');
	}

	get_footer(); 
?>
