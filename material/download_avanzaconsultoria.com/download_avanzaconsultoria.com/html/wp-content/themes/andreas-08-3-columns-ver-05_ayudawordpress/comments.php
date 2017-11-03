<?php if ( !empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) : ?>
<p>
  <?php _e('Introduce tu clave de acceso para ver los comentarios.'); ?>
</p>
<?php return; endif; ?>
<?php if ($comments) : ?>
<h3 class="reply">
  <?php comments_number('No hay comentarios', '1 comentario', '% comentarios' );?>
  para '
  <?php the_title(); ?>
  '</h3>
<p class="comment_meta">Suscribirse a comentarios 
  <?php comments_rss_link(__('<abbr title="Es muy sencillo suscribirse">RSS</abbr>')); ?>
  <?php if ( pings_open() ) : ?>
  o <a href="<?php trackback_url() ?>" rel="trackback">
  <?php _e('TrackBack');?>
  </a>  para '
  <?php the_title(); ?>
  '. 
  <?php endif; ?>
</p>
<ol class="commentlist">
  <?php foreach ($comments as $comment) : ?>
  <li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>"> 
    <div class="comment_author"> 
      <?php comment_author_link() ?>
      said, </div>
    <?php if ($comment->comment_approved == '0') : ?>
    <em>Tu comentario esta esperando a ser moderado.</em> 
    <?php endif; ?>
    <br />
    <p class="metadate">on 
      <?php comment_date('j F Y') ?>
      a las 
      <?php comment_time() ?>
    </p>
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
<p class="nocomments">Los comentarios estas cerrados.</p>
<?php endif; ?>
<?php endif; ?>
<?php if ( comments_open() ) : ?>
<h3 id="respond">
  <?php _e('Escribe un comentario'); ?>
</h3>
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>Debes estar <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">registrado 
  en</a> para escribir un comentario.</p>
<?php else : ?>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
  <?php if ( $user_ID ) : ?>
  <p>Registrado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. 
    <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Registrarse en esta cuenta') ?>">registrarse 
    &raquo;</a></p>
  <?php else : ?>
<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
<label for="author"><small>Nombre <?php if ($req) echo "(obligatorio)"; ?></small></label></p>

<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
<label for="email"><small>Direccion de Email <?php if ($req) echo "(obligatorio)"; ?></small></label></p>

<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
<label for="url"><small>WWW</small></label></p>



<?php endif; ?>

<p><textarea name="comment" id="comment" cols="50%" rows="10" tabindex="4"></textarea></p>

<input type="image" src="<?php bloginfo('template_directory');?>/images/ok.gif" value="Añadir comentarios" id="submit" name="submit" alt="añadir comentarios"/>
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
  <?php do_action('comment_form', $post->ID); ?>
</form>

<?php endif; // If registration required and not logged in ?>
<?php else : // Comments are closed ?>
<p>
  <?php _e('Disculpa, el formulario de comentarios esta cerrado en estos momentos.'); ?>
</p>
<?php endif; ?>
