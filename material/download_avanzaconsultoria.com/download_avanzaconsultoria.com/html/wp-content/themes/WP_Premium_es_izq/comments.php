<div id="comments-wrap">
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
		$oddcomment = 'odd';
?>

<? // Begin Comments ?>
<a name="comments"></a>
<h6 class="comments">Comentarios</h6>

<? // Begin Comments & Trackbacks ?>
<?php if ( $comments ) : ?>

<?php foreach ($comments as $comment) : ?>
<div id="commentlist">
		<a name="comment-<?php comment_ID() ?>"></a>
		
		<div class="comment-metadata"><span class="comment-author"><?php comment_type(__('Comentario'), __('Trackback'), __('Pingback')); ?> <?php _e('by'); ?> <strong><?php comment_author_link() ?></strong></span> <span class="comment-timestamp">el <?php comment_date() ?> @ <a href="#comment-<?php comment_ID() ?>"><?php comment_time() ?></a></span> <?php edit_comment_link(__("Editar"), ' | '); ?></div>
		<div class="<?php if ( $comment->comment_author_email == get_the_author_email() ) echo 'authorcomment'; else echo 'thecomment' ?>" id="comment-<?php comment_ID() ?>"> 
		
		</div>
		<div class="comment-body"><?php comment_text() ?></div>
		
</div>
<?php endforeach; /* end for each comment */ ?>
<? // End Comments ?>

<?php else : // If there are no comments yet ?>
	<p><?php _e('Aún no hay comentarios.'); ?></p>
<?php endif; ?>

<?php if ( comments_open() ) : ?>
<h6 class="postcomment"><?php _e('Escribe un comentario'); ?></h6>

<form action="<?php echo get_settings('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
	<?php if ( $user_ID ) : ?>

	<p>Registrado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Salir ahora">Salir &raquo;</a></p>

	<?php else : ?>

	<p>
	<input type="text" name="author" id="author" class="textarea" value="<?php echo $comment_author; ?>" size="28" tabindex="1" />
	<label for="author"><?php _e('Nombre'); ?></label> <?php if ($req) _e('(requerido)'); ?>
	</p>

	<p>
	<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="28" tabindex="2" class="textarea" />
	<label for="email"><?php _e('E-mail'); ?></label> <?php if ($req) _e('(requerido)'); ?>
	</p>

	<p>
	<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="28" tabindex="3" class="textarea" />
	<label for="url"><?php _e('<acronym title="Uniform Resource Identifier">URL</acronym>'); ?></label>
	</p>

	<?php endif; ?>

	<p>
	<label for="comment"><?php _e('Tu Comentario'); ?></label>
	<br />
	<textarea name="comment" id="comment" cols="60" rows="10" tabindex="4" class="textarea"></textarea>
	</p>

	<p>
	<input name="submit" id="submit" type="submit" tabindex="5" value="<?php _e('Enviar'); ?>" class="Cbutton" />
	<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
	<input type="hidden" name="redirect_to" value="<?php echo wp_specialchars($_SERVER['REQUEST_URI']); ?>" />
	</p>
	<?php do_action('comment_form', $post->ID); ?>
</form>

<?php else : // Comments are closed ?>
<p><?php _e('Lo siento pero están cerrados los comentarios.'); ?></p>
<?php endif; ?>
</div>
