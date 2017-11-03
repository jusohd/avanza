<div id="comments-container">
<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>
			<div class="nocomments">Esta entrada está protegida. Introduce tu clave para ver los comentarios.</div>
			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'alt ';
?>

<!-- You can start editing here. -->
<?php if ('open' == $post-> comment_status) : ?>
	<div id="comments"><?php comments_number('No hay comentarios', 'Un comentario', '% comentarios' );?> en &#8220;<?php the_title(); ?>&#8221;</div>
<?php endif; ?>
<?php if ($comments) : ?>

	<ol class="commentlist" id="commentlist">

	<?php foreach ($comments as $comment) : ?>
		<li class="commentsitem <?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
			<div class="commentauthor"><?php comment_author_link() ?></div>
			<?php if ($comment->comment_approved == '0') : ?>
			<em>Tu comentario está pendiente de aprobación.</em>
			<?php endif; ?>
			<div class="commentmetadata"><?php comment_date('j F, Y') ?> a las <?php comment_time() ?> <?php edit_comment_link('editar','&nbsp;&nbsp;',''); ?></div>

			<?php comment_text() ?>

		</li>
	<?php
		/* Changes every other comment to a different class */
		$oddcomment = ( empty( $oddcomment ) ) ? 'alt ' : '';
	?>

	<?php endforeach; /* end for each comment */ ?>

	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->

	<?php endif; ?>
<?php endif; ?>
</div>


<?php if ('open' == $post->comment_status) : ?>

<div id="commentsform-container">
    <div>
        <div class="x-box-tl"><div class="x-box-tr"><div class="x-box-tc"></div></div></div>
        <div class="x-box-ml"><div class="x-box-mr"><div class="x-box-mc">
            <h3 id="respond">Escribe un comentario</h3>

            <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
            <p>Debes <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">registrarte</a> para publicar un comentario.</p>
            <?php else : ?>

            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" onsubmit="return false;" class="x-form">

            <?php if ( $user_ID ) : ?>
                <p>Conectado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Salir">Salir &raquo;</a></p>
            <?php else : ?>

            <p>
            <label for="author">Nombre <?php if ($req) echo "(requerido)"; ?></label>
            <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" class="textinput x-form-text" />
            </p>
            
            <p>
            <label for="email">Mail (no será visible) <?php if ($req) echo "(requerido)"; ?></label>
            <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" class="textinput x-form-text" />
            </p>
            
            <p>
            <label for="url">Web</label>
            <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" class="textinput x-form-text" />
            </p>

            <?php endif; ?>

            <!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->

            <p><br /><textarea class="x-form-field" name="comment" id="comment" rows="10" tabindex="4"></textarea></p>
            <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />

            <?php if(function_exists('display_cryptographp')) display_cryptographp(); ?>
            <div class="x-form-btns-ct">
                <div class="x-form-btns x-form-btns-center">
                    <table cellspacing="0">
                    <tbody>
                    <tr>
                        <td class="x-form-btn-td">
                            <table cellspacing="0" cellpadding="0" border="0" class="x-btn-wrap x-btn" style="width: 75px;">
                            <tbody>
                            <tr>
                                <td class="x-btn-left"><i></i></td>
                                <td class="x-btn-center"><em unselectable="on"><button type="button" name="submit" id="submit" tabindex="5" class="x-btn-text"><?php echo attribute_escape(__('Publicar comentario')); ?></button></em></td>
                                <td class="x-btn-right"><i></i></td>
                            </tr>
                            </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                    </table>
                    <div class="x-clear"/>
                    </div>
                </div>
            </div>
            <?php do_action('comment_form', $post->ID); ?>
            </form>
        </div></div></div>
        <div class="x-box-bl"><div class="x-box-br"><div class="x-box-bc"></div></div></div>
    </div>
</div>

<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>
