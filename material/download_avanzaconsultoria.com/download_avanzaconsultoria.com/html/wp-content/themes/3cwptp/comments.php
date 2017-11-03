<?php // Do not delete these lines
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');
if (!empty($post->post_password)) { // if there's a password
if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
?>
<h3><?php _e("Esta entrada está protegida. Introduce tu clave para ver los comentarios."); ?></h3>
<?php
return;
}
}
$commentalt = '';
$commentcount = 1;
?>

<div class="comment_template">
<h3><?php comments_number('No hay', '1 ', '% ' );?> respuestas &quot; <?php the_title(); ?> &quot;</h3>
<div class="post_stats"><strong>&quot;<?php the_title(); ?>&quot;</strong> fue publicada por <?php the_author_posts_link(); ?> y tiene <?php comments_number('0 comentarios', '1 comentario', '% comentarios' );?></div>

<?php if ($comments) : ?>

<?php foreach ($comments as $comment) : ?>

<div class="com" id="comment-<?php comment_ID() ?>">
<div class="left_com">
<div class="avatar"><?php if(function_exists("MyAvatars")) : ?> <?php MyAvatars(); ?><?php else: ?><img src="<?php bloginfo('stylesheet_directory'); ?>/images/mygif.gif" alt="mygif" witdh="48" height="48"/><?php endif; ?></div>
</div>
<div class="right_com"><?php comment_author_link(); ?> dijo, &nbsp;&nbsp;&nbsp;&nbsp;<?php if (function_exists('quoter_comment')) { quoter_comment(); } ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php edit_comment_link('editar'); ?><br /><?php comment_date('j F Y') ?><br /><br /><?php comment_text() ?></div>
</div>
<?php
($commentalt == "")?$commentalt="":$commentalt="";
$commentcount++;
?>
<?php endforeach; /* end for each comment */ ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>
<?php if (get_option('comment_registration') && !$user_ID) : ?>
<h3>Lo siento pero los comentarios están cerrados</h3>

<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
<?php if (!$user_ID) : ?>

<h6>Bienvenido <a href="#">forastero</a>, escribe tus comentarios abajo</h6>
<p><input name="author" type="text" class="texxybox" value="<?php echo $comment_author; ?>" />&nbsp;&nbsp;Nombre <?php if ($req) _e('(requerido)'); ?></p>
<p><input name="email" type="text" class="texxybox" value="<?php echo $comment_author_email; ?>" />&nbsp;&nbsp;Email <?php if ($req) _e('(requerido)'); ?></p>
<p><input name="url" type="text" class="texxybox" value="<?php echo $comment_author_url; ?>" />&nbsp;&nbsp;Web</p>

<?php endif; ?>

<p><h2>Escribe un comentario</h2></p>
<p>Suscríbete a esta entrada en el <?php comments_rss_link('Rss de los comentarios'); ?> o haz un <a href="<?php trackback_url(display); ?>">TrackBack</a></p>
<p><textarea name="comment" cols="40%" rows="8" class="texxyarea"><?php if (function_exists('quoter_comment_server')) { quoter_comment_server(); } ?></textarea></p>
<p><input name="submit" type="submit" value="Enviar" /><input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>
</form>
<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>
</div>