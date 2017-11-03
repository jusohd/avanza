<?php

require_once(dirname(__FILE__)."/../../../wp-config.php");
nocache_headers();

function fail($s) {
	header('HTTP/1.0 500 Internal Server Error');
	echo $s;
	exit;
}

foreach($_POST as $k=>$v) {
	$_POST[$k] = urldecode($v);
}

$post->ID = $comment_post_ID = (int) $_POST['comment_post_ID'];

$post_status = $wpdb->get_var("SELECT comment_status FROM $wpdb->posts WHERE ID = '$comment_post_ID'");

if ( empty($post_status) ) {
	do_action('comment_id_not_found', $comment_post_ID);
	fail(__('El articulo que buscas no existe en la base de datos.','unnamed'));
} elseif ( 'closed' ==  $post_status ) {
	do_action('comment_closed', $comment_post_ID);
	fail(__('Lo siento, los comentarios estan cerrados.','unnamed'));
}

$comment_author       = trim($_POST['author']);
$comment_author_email = trim($_POST['email']);
$comment_author_url   = trim($_POST['url']);
$comment_content      = trim($_POST['comment']);

// If the user is logged in
get_currentuserinfo();
if ( $user_ID ) :
	$comment_author       = addslashes($user_identity);
	$comment_author_email = addslashes($user_email);
	$comment_author_url   = addslashes($user_url);
else :
	if ( get_option('comment_registration') )
		fail(__('Lo siento, debes registrarte para escribir un comentario.','unnamed'));
endif;

$comment_type = '';

if ( get_settings('require_name_email') and !$user_ID ) {
	if ( 6 > strlen($comment_author_email) or '' == $comment_author )
		fail(__('Error: por favor, completa los campos requeridos (nombre, email).','unnamed'));
	elseif ( !is_email($comment_author_email))
		fail(__('Error: por favor, introduce una direccion de emal valida.','unnamed'));
}

if ( '' == $comment_content )
	fail(__('Error: tienes que escribir algo.','unnamed'));

$commentdata = compact('comment_post_ID', 'comment_author', 'comment_author_email', 'comment_author_url', 'comment_content', 'comment_type', 'user_ID');

	// Simple duplicate check
	$dupe = "SELECT comment_ID FROM $wpdb->comments WHERE comment_post_ID = '$comment_post_ID' AND ( comment_author = '$comment_author' ";
	if ( $comment_author_email )
		$dupe .= "OR comment_author_email = '$comment_author_email' ";
		$dupe .= ") AND comment_content = '$comment_content' LIMIT 1";
	if ( $wpdb->get_var($dupe) )
		fail(__('Parece que ya has comentado esto!','unnamed'));
	               
$new_comment_ID = wp_new_comment($commentdata);

if ( !$user_ID ) :
        setcookie('comment_author_' . COOKIEHASH, stripslashes($comment_author), time() + 30000000, COOKIEPATH, COOKIE_DOMAIN);
        setcookie('comment_author_email_' . COOKIEHASH, stripslashes($comment_author_email), time() + 30000000, COOKIEPATH, COOKIE_DOMAIN);
        setcookie('comment_author_url_' . COOKIEHASH, stripslashes($comment_author_url), time() + 30000000, COOKIEPATH, COOKIE_DOMAIN);
endif;

$comment = $wpdb->get_row("SELECT * FROM {$wpdb->comments} WHERE comment_ID = " . $new_comment_ID);

$post->comment_status = $wpdb->get_var("SELECT comment_status FROM {$wpdb->posts} WHERE ID = {$comment_post_ID}");
$post->comment_count++;

ob_start();
$comments = array($comment);
include(TEMPLATEPATH . '/comments.php');
$commentout = ob_get_clean();
preg_match('#<li(.*?)>(.*)</li>#ims', $commentout, $matches);
@header('Content-type: ' . get_option('html_type') . '; charset=' . get_option('blog_charset'));
echo "<li style=\"\"".$matches[1].">".$matches[2]."</li>";

?>