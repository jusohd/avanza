<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>

				<p class="nocomments">Esta entrada esta protegida. Introduce tu clave para ver las criticas.<p>

				<?php
				return;
            }
        }

		/* This variable is for alternating comment background */
		$oddcomment = 'alt';
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>
<div class="comments">
	<h3><?php comments_number('No hay criticas', 'Una critica', '% criticas' );?> en &#8220;<?php the_title(); ?>&#8221;</h3> 

	<ol class="commentlist">

	<?php foreach ($comments as $comment) : ?>

		<li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
			<?php comment_text() ?>
			
			<p class="commentmetadata">
				<small>
				<cite><?php comment_author_link() ?></cite> dijo esto en
				<?php if ($comment->comment_approved == '0') : ?>
				<em>Tu critica esta pendiente de aprobacion.</em>
				<?php endif; ?>
				<a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('j F, Y') ?> a las <?php comment_time() ?></a> <?php edit_comment_link('editar','(',')'); ?>
				</small>
			</p>
		</li>

	<?php /* Changes every other comment to a different class */
		if ('alt' == $oddcomment) $oddcomment = '';
		else $oddcomment = 'alt';
	?>

	<?php endforeach; /* end for each comment */ ?>

	</ol>

</div>
<?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post->comment_status) : ?> 
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Criticas cerradas.</p>

	<?php endif; ?>

<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>
<div class="comments clearfix">
	<h3 id="respond">Escribe una critica</h3>

	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
	<p>Tienes que estar <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">registrado</a> para escribir u na critica.</p>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

	<?php if ( $user_ID ) : ?>

	<p>Registrado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Salir de esta cuenta">Salir &raquo;</a></p>
	<p><textarea name="comment" id="comment" cols="65" rows="10" tabindex="4"></textarea></p>

	<?php else : ?>

	<p><textarea name="comment" id="comment" cols="65" rows="5" tabindex="4"></textarea></p>

	<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="20" tabindex="1" /><br />
	<label for="author"><small><?php if ($req) echo "*"; ?> Nombre (requerido)</small></label></p>

	<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="20" tabindex="2" /><br />
	<label for="email"><small><?php if ($req) echo "*"; ?> Mail (requerido - no se publicara)</small></label></p>

	<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="19" tabindex="3" /><br />
	<label for="url"><small>Tu Web</small></label></p>

	<?php endif; ?>

	<!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->

	<p><input name="submit" type="submit" id="submit" tabindex="5" value="Enviar critica" />
	<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
	</p>
	<?php do_action('comment_form', $post->ID); ?>

	</form>
<?php endif; // If registration required and not logged in ?>
</div>
<?php endif; // if you delete this the sky will fall on your head ?>
