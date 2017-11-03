<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>
				
				<p class="nocomments">This post is password protected. Enter the password to view comments.<p>
				
				<?php
				return;
            }
        }

		/* This variable is for alternating comment background */
		$oddcomment = 'odd';
?>

<!-- You can start editing here. -->

<div id="comments">

	<?php if ($comments) : ?>
    
	<h4><?php comments_number('No hay respuestas', 'Una Respuesta', '% Respuestas' );?> a &#8220;<?php the_title(); ?>&#8221;</h4>

	<!--the bgein of one comment-->
	<?php foreach ($comments as $comment) : ?>

    <div class="commentwrap">
	<div class="<?php if($oddcomment) { echo $oddcomment; } else echo 'even'; ?>" id="comment-<?php comment_ID(); ?>">
		<?php comment_text(); ?>
		<?php if ($comment->comment_approved == '0') : ?>
		<p class="moderation"><em>Tu comentario esta esperando ser moderado.</em></p>
		<?php endif; ?>
	</div>

    <!--post meta info-->
	<div class="commentmeta clearboth">
    <ul>
        <li class="meta-author"><strong>Por: </strong><?php comment_author_link(); ?></li> <!-- The author's name and link -->
        <li class="meta-date"><strong>el: </strong><?php comment_date('m.j.Y'); ?></li><!-- the date -->
        <li class="meta-time"><strong>a las: </strong><a href="#comment-<?php comment_ID(); ?>" title=""><?php comment_time(); ?></a></li> <!-- time as link to comment -->
    </ul>
    </div>
    
    </div><!--end commentwrap-->

	<?php /* Changes every other comment to a different class */	
		if ('odd' == $oddcomment) $oddcomment = '';
		else $oddcomment = 'odd';
	?>

	<?php endforeach; /* end for each comment */ ?>

	<?php else : // this is displayed if there are no comments so far ?>

  	<?php if ('open' == $post->comment_status) : //If comments are open, but there are no comments ?>
		
	<?php else : // comments are closed ?>
	
	<p>Los comentarios estan cerrados.</p>

	<?php endif; ?>
	<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>

	<h4 id="respond">Dejar un comentario</h4>

	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>

	<p>Debes <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">iniciar sesion</a> para comentar.</p>

	<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

	<?php if ( $user_ID ) : ?>
	<p>Registrado como:<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Cerrar sesion&raquo;</a></p>

	<?php else : ?>

	<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
	<label for="author"><small>Nombre <?php if ($req) echo "(required)"; ?></small></label></p>

	<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
	<label for="email"><small>Mail (no se publicara) <?php if ($req) echo "(required)"; ?></small></label></p>

	<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
	<label for="url"><small>Sitio Web</small></label></p>

	<?php endif; ?>

	<p><textarea name="comment" id="comment" cols="50" rows="10" tabindex="4"></textarea></p>

	<p><input name="submit" type="submit" id="submit" tabindex="5" value="Dejar comentario" />
	<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>
	
	<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>

</div> <!--end .comments div-->
