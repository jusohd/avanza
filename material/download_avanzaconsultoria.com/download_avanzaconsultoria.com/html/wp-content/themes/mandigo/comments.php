<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>

				<p class="nocomments">Esta entrada está protegida. Introduce tu clave para ver los comentarios.<p>

				<?php
				return;
            }
        }

		/* This variable is for alternating comment background */
		$oddcomment = 'alt';
		$authorcomments = get_option('mandigo_author_comments');
		$the_author = get_the_author();
$a = '';
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>
	<div id="comments"><?php comments_number(__('No hay comentarios en ','mandigo'), __('Un comentario en ','mandigo'), __('% comentarios en ','mandigo')); ?> &#8220;<?php the_title(); ?>&#8221;</div> 

<?php
	foreach ($comments as $comment):
	$id = get_comment_ID();
	$comment_list_item = sprintf('
		<li class="%s%s" id="comment-%s">
			<cite>%s</cite>
			%s<br />
			<small class="commentmetadata"><a href="#comment-%s">%s</a> %s</small>
			%s
			</li>',
		$oddcomment,
		($authorcomments && get_comment_author() == $the_author ? ' authorcomment' : ''),
		$id,
		sprintf(__('%s dijo:','mandigo'),get_comment_author_link()),
		($comment->comment_approved == '0' ? '<em>'. __('Tu comentario está pendiente de aprobación.','mandigo') .'</em>' : ''),
		$id,
		sprintf(__('%s a las %s','mandigo'),get_comment_date(__('j F, Y','mandigo')),get_comment_time()),
		function_exists('get_edit_comment_link') && current_user_can( 'edit_post', $post->ID ) ? ' - '. apply_filters('edit_comment_link', '<a href="'. get_edit_comment_link($id) .'">'. __('Editar','mandigo') .'</a>', $comment->comment_ID) : '',
		apply_filters('comment_text', get_comment_text())
	);

/*
	if ((get_option('mandigo_trackbacks') == 'above' || get_option('mandigo_trackbacks') == 'below') && $comment->comment_type == 'trackback'):
		$trackback_list .= $comment_list_item;
	elseif (get_option('mandigo_trackbacks') == 'along' && $comment->comment_type == 'trackback'):
		$comment_list   .= $comment_list_item;
	endif;
*/
	if ($comment->comment_type == 'trackback'):
		if (get_option('mandigo_trackbacks') == 'above' || get_option('mandigo_trackbacks') == 'below'):
			$trackback_list .= $comment_list_item;
		elseif (get_option('mandigo_trackbacks') == 'along'):
			$comment_list   .= $comment_list_item;
		endif;
	else:
		$comment_list   .= $comment_list_item;
	endif;

	if ('alt' == $oddcomment) $oddcomment = '';
	else $oddcomment = 'alt';

	endforeach;

	if (get_option('mandigo_trackbacks') == 'above' && $trackback_list):
?>
	<br />
	<div id="trackbacks"><?php _e('Trackbacks','mandigo'); ?></div> 
	<ol class="commentlist">
	<?php echo $trackback_list; ?>
	</ol>
	<div id="trackbacks"><?php _e('Comentariios','mandigo'); ?></div> 
<?php endif; ?>

	<ol class="commentlist">
	<?php echo $comment_list; ?>
	</ol>

<?php if (get_option('mandigo_trackbacks') == 'below' && $trackback_list): ?>
	<div id="trackbacks"><?php _e('Trackbacks','mandigo'); ?></div> 

	<ol class="commentlist">
	<?php echo $trackback_list; ?>
	</ol>
<?php
		endif;
	else: // this is displayed if there are no comments so far

		if ('open' == $post->comment_status): // If comments are open, but there are no comments.
		else : // if comments are closed
?>
		<p class="nocomments"><?php _e('Los comentarios están cerrados.','mandigo'); ?></p>

<?php
		endif;
	endif;

	if ('open' == $post->comment_status):
?>

<div id="respond"><?php _e('Escribe un comentario','mandigo'); ?></div>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p><?php _e('Debes registrarte para publicar un comentario.','mandigo'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>"><?php _e('Entrar','mandigo'); ?> &raquo;</a></p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p><?php printf(__('Conectado como %s','mandigo'),'<a href="'. get_option('siteurl') .'/wp-admin/profile.php">'. $user_identity .'</a>'); ?>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Salir ahora','mandigo'); ?>"><?php _e('Salir','mandigo'); ?> &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small><?php _e('Nombre','mandigo'); ?> <?php if ($req) echo "(". __('requerido','mandigo') .")"; ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small><?php _e('E-mail','mandigo'); ?> (<?php _e('no será visible','mandigo'); ?>) <?php if ($req) echo "(". __('requerido','mandigo') .")"; ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small><?php _e('Web','mandigo'); ?></small></label></p>

<?php endif; ?>

<?php if (get_option('mandigo_xhtml_comments')): ?>
<p><small><strong>XHTML:</strong> <?php _e('Puedes utilizar estos códigos:','mandigo'); ?> <?php echo allowed_tags(); ?></small></p>
<?php endif; ?>

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Publicar comentario','mandigo'); ?>" />
<input type="hidden" name="comment_post_ID" value="<?php echo $post->ID; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
