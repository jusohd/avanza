<?php
/* Don't remove these lines. */
add_filter('comment_text', 'popuplinks');
while ( have_posts()) : the_post();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <title><?php echo get_option('blogname'); ?> - Comentarios en <?php the_title(); ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
		body { margin: 3px; }
	</style>

</head>
<body id="commentspopup">

<h1 id="header"><a href="" title="<?php echo get_option('blogname'); ?>"><?php echo get_option('blogname'); ?></a></h1>

<h2 id="comments">Comentarios</h2>

<p><a href="<?php echo get_post_comments_feed_link($post->ID); ?>"><abbr title="Really Simple Syndication">RSS</abbr> feed for comments on this post.</a></p>

<?php if ('open' == $post->ping_status) { ?>
<p>La <abbr title="Universal Resource Locator">URL</abbr> para enlazar a este artículo es: <em><?php trackback_url() ?></em></p>
<?php } ?>

<?php
// this line is WordPress' motor, do not delete it.
$commenter = wp_get_current_commenter();
extract($commenter);
$comments = get_approved_comments($id);
$post = get_post($id);
if (!empty($post->post_password) && $_COOKIE['wp-postpass_'. COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
	echo(get_the_password_form());
} else { ?>

<?php if ($comments) { ?>
<ol id="commentlist">
<?php foreach ($comments as $comment) { ?>
	<li id="comment-<?php comment_ID() ?>">
	<?php comment_text() ?>
	<p><cite><?php comment_type('Comentario', 'Trackback', 'Pingback'); ?> por <?php comment_author_link() ?> &#8212; <?php comment_date() ?> @ <a href="#comment-<?php comment_ID() ?>"><?php comment_time() ?></a></cite></p>
	</li>

<?php } // end for each comment ?>
</ol>
<?php } else { // this is displayed if there are no comments so far ?>
	<p>No hay aún comentarios.</p>
<?php } ?>

<?php if ('open' == $post->comment_status) { ?>
<h2>Escribe un comentario</h2>
<p>Líneas y párrafos se insertan automáticamente, la dirección de email no se muestra, <acronym title="Hypertext Markup Language">HTML</acronym> permitido: <code><?php echo allowed_tags(); ?></code></p>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
<?php if ( $user_ID ) : ?>
	<p>Registrado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Salir">Salir &raquo;</a></p>
<?php else : ?>
	<p>
	  <input type="text" name="author" id="author" class="textarea" value="<?php echo $comment_author; ?>" size="28" tabindex="1" />
	   <label for="author">Nombre</label>
	<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
	<input type="hidden" name="redirect_to" value="<?php echo attribute_escape($_SERVER["REQUEST_URI"]); ?>" />
	</p>

	<p>
	  <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="28" tabindex="2" />
	   <label for="email">E-mail</label>
	</p>

	<p>
	  <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="28" tabindex="3" />
	   <label for="url"><abbr title="Universal Resource Locator">Web</abbr></label>
	</p>
<?php endif; ?>

	<p>
	  <label for="comment">Tu comentario</label>
	<br />
	  <textarea name="comment" id="comment" cols="70" rows="4" tabindex="4"></textarea>
	</p>

	<p>
	  <input name="submit" type="submit" tabindex="5" value="Say It!" />
	</p>
	<?php do_action('comment_form', $post->ID); ?>
</form>
<?php } else { // comments are closed ?>
<p>Lo siento, los comentarios están cerrados.</p>
<?php }
} // end password check
?>

<div><strong><a href="javascript:window.close()">Cerrar esta ventana.</a></strong></div>

<?php // if you delete this the sky will fall on your head
endwhile;
?>

<!-- // this is just the end of the motor - don't touch that line either :) -->
<?php //} ?>
<p class="credit"><?php timer_stop(1); ?> <cite>Creado con <a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform"><strong>Wordpress</strong></a></cite></p>
<?php // Seen at http://www.mijnkopthee.nl/log2/archive/2003/05/28/esc(18) ?>
<script type="text/javascript">
<!--
document.onkeypress = function esc(e) {
	if(typeof(e) == "undefined") { e=event; }
	if (e.keyCode == 27) { self.close(); }
}
// -->
</script>
</body>
</html>
