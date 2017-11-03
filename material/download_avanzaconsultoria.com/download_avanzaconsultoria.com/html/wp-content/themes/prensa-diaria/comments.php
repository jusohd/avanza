<?php // Do not delete these lines
 if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
  die ('Please do not load this page directly. Thanks!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_'.$cookiehash] != $post->post_password) {  // and it doesn't match the cookie
    ?>
    
    <p class="nocomments"><?php _e("Este articulo esta protegido por clave. Introduce tu clave para ver los comentarios."); ?><p>
    
    <?php
    return;
            }
        }

  /* This variable is for alternating comment background */
  $oddcomment = "graybox";
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>
 <a name="comments"></a><h3 id="comments"><?php comments_number(__('Comentarios'), __('1 Comentario'), __('% Comentarios'));?></h3>

 <ol class="commentlist">

 <?php foreach ($comments as $comment) : ?>

  <li class="<?=$oddcomment;?>">
<div class="com-entryin">
		
		
		<!--header-->
                        <div class="com-entryhead"> 
							<!--date-->
							<div class="com-entrymtext"><?php comment_date('F j, Y') ?> @ <?php comment_time() ?></a>
							<?php edit_comment_link('(editarlo?)','',''); ?>
							</div>

						</div>
		
		
							<!--header-->
                        <div class="com-entryhead"> 
                             <!--entry -->
					    <div class="com-entrybody">
                        <div class="com-entryinbody">
							                            <!--title-->
							
<p><?php if ($comment->comment_approved == '0') : ?>
<b>Tu comentario esta pendiente de aprobacion.</b>
<?php endif; ?>
<br />
<?php comment_text() ?>
</p>
						</div></div><!--end entry body, inner-->
							<div class="com-entrytitle">
							Escrito por <?php comment_author_link() ?> 
							</div> 
						</div>	

</div>
   
  </li>
  
  <?php /* Changes every other comment to a different class */ 
   if("graybox" == $oddcomment) {$oddcomment="";}
   else { $oddcomment="graybox"; }
  ?>

 <?php endforeach; /* end for each comment */ ?>

 </ol>

 <?php else : // this is displayed if there are no comments so far ?>

  <?php if ('open' == $post-> comment_status) : ?> 
  <!-- If comments are open, but there are no comments. -->
  
  <?php else : // comments are closed ?>
  <!-- If comments are closed. -->
  <p class="nocomments">Comentarios cerrados.</p>
  
 <?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post-> comment_status) : ?>

<a name="respond"></a><h3>Escribe un comentario</h3>
<form action="<?php echo get_settings('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<p><input type="text" name="author" id="author" class="styled" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
<input type="hidden" name="redirect_to" value="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>" />
<label for="author"><small>Nombre</small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small>E-Mail (no sera visible)</small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>Tu Web</small></label></p>

<!--<p><small><strong>XHTML:</strong> Puedes utilizar estas etiquetas: <?php echo allowed_tags(); ?></small></p>-->

<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>

<?php if ('none' != get_settings("comment_moderation")) { ?>
 <p><small><strong>Nota:</strong> Esta activa la aprobacion de comentarios y puede retrasar la aparicion de tu comentario. No es necesario que lo vuelvas a escribir.</small></p>
<?php } ?>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Enviar comentario" /></p>


</form>

<?php // if you delete this the sky will fall on your head
endif; ?>