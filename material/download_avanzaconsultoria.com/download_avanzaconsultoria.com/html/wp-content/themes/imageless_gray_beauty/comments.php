<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>
				
				<p><?php _e("Esta entrada está protegida. Introduce la clave para ver los comentarios."); ?><p>
				
				<?php
				return;
            }
        }

		/* This variable is for alternating comment background */
		$oddcomment = "graybox";
?>

<!-- You can start editing here. -->
<?php if ($comments) : ?>


	<a name="comments"></a><p><strong><?php comments_number('No hay comentarios','Un comentario','% comentarios' );?></strong> | <a href="#respond">Añade uno</a></p> 
<div class="comments">
	<ol>

	<?php foreach ($comments as $comment) : ?>
		<li class="<?=$oddcomment;?>"><a name="comment-<?php comment_ID() ?>"></a><?php comment_author_link() ?> - <?php comment_date('j/m/Y') ?> a las <?php comment_time() ?>
			
			<div><?php comment_text() ?></div>
		</li>
		
		<?php /* Changes every other comment to a different class */	
			if("graybox" == $oddcomment) {$oddcomment="whitebox";}
			else { $oddcomment="graybox"; }
		?>

	<?php endforeach; /* end for each comment */ ?>

	</ol>
</div>
 <?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post-> comment_status) : ?> 
		<!-- If comments are open, but there are no comments. -->
		
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p>Los comentarios están cerrados.</p>
		
	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post-> comment_status) : ?>

<a name="respond"></a><h2 class="page">Escribe un comentario</h2>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>Debes <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">loguearte</a> para poder comentar el post.</p>
</div>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

	<?php if ( $user_ID ) : ?>

<p>Tu eres <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> puedes escribir sin problemas. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>

<?php else : ?>

<p><label for="author">Nombre <?php if ($req) echo "(requerido)"; ?></label><br />
<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="40" tabindex="1" /></p>

<p><label for="email">Dirección de email <?php if ($req) echo "(requerido)"; ?></label><br />
<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="40" tabindex="2" /></p>

<p><label for="url">Web</label><br />
<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="40" tabindex="3" /></p>

<?php 
/****** Math Comment Spam Protection Plugin ******/
if ( function_exists('math_comment_spam_protection') ) { 
	$mcsp_info = math_comment_spam_protection();
?> 	<p><label for="mcspvalue"><small>Prueba contra el Spam: La suma de <?php echo $mcsp_info['operand1'] . ' + ' . $mcsp_info['operand2'] . ' ?' ?><br/>
</small></label>
  <input type="text" name="mcspvalue" id="mcspvalue" value="" size="40" tabindex="4" />
    <input type="hidden" name="mcspinfo" value="<?php echo $mcsp_info['result']; ?>" />
</p>
<?php } // if function_exists... ?>

<?php endif; ?>
<p><small><strong>XHTML:</strong> Tú puedes usar estas etiquetas: <?php echo allowed_tags(); ?></small></p>


<p><textarea name="comment" id="comment" cols="50" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Enviar comentario" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>

<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>

