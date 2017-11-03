<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>

<p class="nocomments">
  <?php _e("Este post esta protegido. Introduce la clave para ver los comentarios."); ?>
<p>
  <?php
				return;
            }
        }
		/* This variable is for alternating comment background */
		$oddcomment = 'alt';
?>
<div id="commentblock">
<!--comments form -->
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
	<p>Tienes que estar registrado <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> para escribir un comentario. </p>
    <?php else : ?>
    
   <!--comments area-->
  <?php if ($comments) : ?>
  <p><?php comments_number(__('No hay comentarios'), __('1 Comentario'), __('% Comentarios')); ?></p>

  <ol id="commentlist">
    <?php foreach ($comments as $comment) : ?>
    <li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
        <?php comment_author_link()?> el 
        <?php comment_date('F j, Y') ?> a las
        <?php comment_time()?>
		<?php edit_comment_link(__("Editar esto"), ''); ?> 

      <?php if ($comment->comment_approved == '0') : ?>
      <em>Tu comentario esta pendiente de aprobacion.</em>
      <?php endif; ?>
      <?php 
					if(the_author('', false) == get_comment_author())
						echo "<div class='commenttext-admin'>";
					else
						echo "<div class='commenttext'>";
					comment_text();
					echo "</div>";
					
					?>
    </li>
    <?php /* Changes every other comment to a different class */	
					if ('alt' == $oddcomment){
						$oddcomment = 'standard';
					}
					else {
						$oddcomment = 'alt';
					}
				?>
    <?php endforeach; /* end for each comment */ ?>
  </ol>
  <?php else : // this is displayed if there are no comments so far ?>
  <?php if ('open' == $post-> comment_status) : ?>
  <!-- If comments are open, but there are no comments. -->
  <?php else : // comments are closed ?>
  <!-- If comments are closed. -->
  <p class="nocomments">Los comentarios estan cerrados.</p>
  <?php endif; ?>
  <?php endif; ?>
  <?php if ('open' == $post-> comment_status) : ?>
  <?php endif; // If registration required and not logged in ?>
  <?php endif; // if you delete this the sky will fall on your head ?>
  
<div id="commentsform">
    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
      <?php if ( $user_ID ) : ?>
      
      <p>Registrado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Finalizar sesion') ?>"> Salir &raquo; </a> </p>
      <?php else : ?>
      
      <p><?php _e('Nombre ');?><?php if ($req) _e('(requerido)'); ?><br />
      <input type="text" name="author" id="s1" value="<?php echo $comment_author; ?>" size="30" tabindex="1" />
      </p>
      
      <p><?php _e('Email ');?><?php if ($req) _e('(requerido)'); ?><br />
      <input type="text" name="email" id="s2" value="<?php echo $comment_author_email; ?>" size="30" tabindex="2" />
      </p>
      
      <p><?php _e('Tu web');?><br />
      <input type="text" name="url" id="s3" value="<?php echo $comment_author_url; ?>" size="30" tabindex="3" />
      </p>
      
      <?php endif; ?>
      <!--<p>XHTML:</strong> Puedes usar estas etiquetas: <?php echo allowed_tags(); ?></p>-->
      <p><?php _e('Comparte tu opinion');?><br />
      <textarea name="comment" id="s4" cols="90" rows="10" tabindex="4"></textarea>
      </p>
      
      <p>
        <input name="submit" type="submit" id="hbutt" tabindex="5" value="Enviar comentario" />
        <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
      </p>
      <?php do_action('comment_form', $post->ID); ?>
    </form>
  </div>


</div>
