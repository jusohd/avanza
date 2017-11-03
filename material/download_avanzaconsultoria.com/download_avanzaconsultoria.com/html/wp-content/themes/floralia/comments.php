<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>
				
				<p class="nocomments"><?php _e("This post is password protected. Enter the password to view comments."); ?><p>
				
				<?php
				return;
            }
        }

		/* This variable is for alternating comment background */
		$oddcomment = 'alt';
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>
	<h3 id="comments"><?php comments_number('Sin respuestas', 'Una Respuesta', '% Respuestas' );?> to &#8220;<?php the_title(); ?>&#8221;</h3> 

	<ol class="commentlist">
	<?php $commentnumber = 1?>
	<?php foreach ($comments as $comment) : ?>

		<li id="comment-<?php comment_ID() ?>" class="<?php echo $oddcomment; /* Style differently if comment author is blog author */ if ($comment->comment_author_email == get_the_author_email()) { echo ' authorcomment'; } ?>">
			<div class="cmtinfo"><small class="commentmetadata"></small><cite><?php comment_author_link() ?></cite><em>el <?php comment_date('d M Y') ?> a las <?php comment_time() ?> <?php edit_comment_link('editar','',''); ?></em><a href="#comment-<?php comment_ID() ?>" title=""><span class="number"><?php echo $commentnumber; $commentnumber++;?></span></a></div>			
			<?php if ($comment->comment_approved == '0') : ?>
			<em>Tu comentario esta esperando ser moderado.</em>
			<?php endif; ?>
			<?php comment_text() ?>			
		</li>

	<?php /* Changes every other comment to a different class */	
		if ('alt' == $oddcomment) $oddcomment = '';
		else $oddcomment = 'alt';
	?>

	<?php endforeach; /* end for each comment */ ?>

	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post-> comment_status) : ?> 
		<!-- If comments are open, but there are no comments. -->
		
	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Los comentarios estan cerrados en este momento.</p>
		
	<?php endif; ?>
<?php endif; ?>
<div class="entry">
<p class="postbottom">
<?php if ($post->ping_status == "open") { ?>
	<a href="<?php trackback_url(display); ?>">URL de Trackback</a> | 
<?php } ?>
<?php if ($post-> comment_status == "open") {?>
	<?php comments_rss_link('RSS de Commentarios'); ?>
<?php }; ?>
</p>
</div>

<?php if ('open' == $post-> comment_status) : ?>

<h3 id="respond">Dejar un comentario</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>Debes<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">iniciar sesion</a> para dejar un comentario.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Registrado como<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Cerrar sesion') ?>">Cerrar sesion&raquo;</a></p>

<?php else : ?>

<p><input type="text" class="textbox" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small>Name <?php if ($req) _e('(required)'); ?></small></label></p>

<p><input type="text" class="textbox" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small>Mail (hidden) <?php if ($req) _e('(required)'); ?></small></label></p>

<p><input type="text" class="textbox" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Website</small></label></p>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> Puedes usar estos tags: <?php echo allowed_tags(); ?></small></p>-->

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<p>
  <input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>