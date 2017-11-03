<?php
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
	?>
			
		<p class="center"><?php _e("This post is password protected. Enter the password to view comments."); ?><p>
				
<?php	return; } }

	/* function borrowed from K2 - thanks guys! */
	function k2_comment_type($commenttxt = 'Comment', $trackbacktxt = 'Trackback', $pingbacktxt = 'Pingback') {
		global $comment;
		if (preg_match('|trackback|', $comment->comment_type))
			return $trackbacktxt;
		elseif (preg_match('|pingback|', $comment->comment_type))
			return $pingbacktxt;
		else
			return $commenttxt;
	}

	$templatedir = get_bloginfo('template_directory');
?>

<?php $comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_post_ID = '$post->ID' ORDER BY comment_date"); ?>

<?php if (($comments) or ('open' == $post-> comment_status)) { ?>

<div id="layer5">

	<div class="comments">
		<h3><?php comments_number('0 criticas', '1 critica', '% criticas' );?></h3>

		<?php if ($comments) { ?>
			<ul class="commentlist">

				<?php foreach ($comments as $comment) { ?>		
					<li>
						<div class="content">
							<?php if ($comment->comment_approved == '0') { ?>
								<em>Tu critica esta pendiente de aprobacion.</em>
							<?php } else { ?>
								<?php comment_text() ?>
							<?php } ?>
						</div>
						<div class="meta">
							<span class="author"><?php comment_author_link(); ?></span> | 
							<span class="date"><?php comment_date('j F, Y'); ?></span>
						</div>
					</li>
		
				<?php } ?>
			</ul>
		
	<?php } else { ?>
	
		<div class="nocomments">No hay critica</div>

	<?php } ?>

	<?php if ('open' == $post-> comment_status) : ?>
	<div id="loading" style="display: none;">
		Publicando tu critica<br />
		Espera por favor
	</div>

		<h3 id="reply">Escribe una critica</h3>
		
		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		
			<p>Debes <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">registrarte</a> para publicar una critica.</p>
		
		<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">


	<div id="errors" style="display:none">
		Hay un error con tu critica, intentalo de nuevo.
	</div>
		
		<?php if ( $user_ID ) { ?>

			<p>Registrado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Salir de esta cuenta') ?>">Salir &raquo;</a></p>
		<?php } ?>
		
		<?php if ( !$user_ID ) { ?>
			<div id="authorinfo">
				<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
				<label for="author"><small><strong>Nombre</strong> <?php if ($req) _e('(requerido)'); ?></small></label></p>

				<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
				<label for="email"><small><strong>Mail</strong> (no se publicara) <?php if ($req) _e('(requerido)'); ?></small></label></p>

				<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
				<label for="url"><small><strong>Tu Web</strong></small></label></p>
			</div>
		<?php } ?>
			<!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->
		
			<p><textarea name="comment" id="comment" cols="80" rows="10" tabindex="4"></textarea></p>
		
			<?php if (function_exists('show_subscription_checkbox')) { show_subscription_checkbox(); } ?>
		
			<p>
				<input name="submit" type="submit" id="submit" tabindex="5" value="Enviar" />
				<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
				<br class="clear" />
			</p>
	
			<?php do_action('comment_form', $post->ID); ?>

			</form>


<?php endif; ?>

<?php endif; ?>
</div> <!-- Close .comments container -->
</div>
<?php } ?>
