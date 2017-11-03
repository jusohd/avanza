<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">Post protegido por contraseña - Regístrese para comentar.</p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>

<!-- You can start editing here. -->

<div class="comments-show">

<?php if ($comments) : ?>
	
	<h3 id="comments"><?php comments_number('0 Respuestas', '1 Respuesta', '% Respuestas' );?> a este post.</h3>

	<ol class="commentlist">

	<?php foreach ($comments as $comment) : ?>

		<li <?php echo $oddcomment; ?>id="comment-<?php comment_ID() ?>">
			<div class="comment-gravatar">
				<img src="http://www.gravatar.com/avatar.php?gravatar_id=<?=md5(get_comment_author_email())?>&amp;size=30" alt="<? comment_author() ?>'s Gravatar" class="gravatar" />
			</div>
			<div class="comment-body">
				<div class="comment-head">
					<p>Por <?php comment_author_link() ?> el <?php the_time('d.m.y'); ?> a las <?php the_time(); ?><?php edit_comment_link('edit','&nbsp;&nbsp;',''); ?></p>
					<?php if ($comment->comment_approved == '0') : ?>
						<p><em>Tu comentario esta esperando ser moderado.</em></p>
					<?php endif; ?>
				</div>
				<div class="comment-text">
					<?php comment_text() ?>
				</div>
			</div>
		</li>

	<?php
		/* Changes every other comment to a different class */
		$oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : '';
	?>

	<?php endforeach; /* end for each comment */ ?>

	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">No se permiten comentarios.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<h3 id="respond">Respond to this post</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>Debes <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">Iniciar sesion</a> para comentar.</p>
<?php else : ?>
<div class="comment-form">
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Registrado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Cerrar sesion">Cerrar sesion &raquo;</a></p>

<?php else : ?>

<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small>Nombre<?php if ($req) echo "(required)"; ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small>EMail (will not be published) <?php if ($req) echo "(required)"; ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Sitio web</small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> Puedes usar estos tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Comentar" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>
</div>
<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>

</div>
