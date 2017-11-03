<?php
/*
Plugin Name: ExtJS AJAX Comments
Version: 2.08
Description: Based on Mike Smullin Ajax Comments 2.07 Plugin. http://www.mikesmullin.com/2006/06/05/ajax-comments-20/
Author: Mike Smullin, Wojtek Regenczuk 
*/

if(!function_exists('get_option'))
require_once('../../../wp-config.php');

  global $comment, $comments, $post, $wpdb, $user_ID, $user_identity, $user_email, $user_url;

  function fail($s) { header('HTTP/1.0 406 Not Acceptable'); die($s); }

  // trim and decode all POST variables
  foreach($_POST as $k => $v)
    $_POST[$k] = trim(urldecode($v));

  // extract & alias POST variables
   extract($_POST, EXTR_PREFIX_ALL, '');

  // get the post comment_status
  $post_status = $wpdb->get_var("SELECT comment_status FROM {$wpdb->posts} WHERE ID = '".$wpdb->escape($_comment_post_ID)."' LIMIT 1;");
  if ( empty($post_status) ) // make sure the post exists
    fail("That post doesn't even exist!");
  if ( $post_status == 'closed' ) // and the post is not closed for comments
    fail("Los comentarios están cerrados.");

  // if the user is already logged in
  get_currentuserinfo();
  if ( $user_ID ) {
    $_author = addslashes($user_identity); // get their name
    $_email = addslashes($user_email); // email
    $_url = addslashes($user_url); // and url
  } else if ( get_option('comment_registration') ) // otherwise, if logging in is required
    fail("Lo siento, debes registrarte para publicar comentarios.");

  // if a Name and Email Address are required to post comments
  if ( get_settings('require_name_email') && !$user_ID )
    if ( $_author == '' ) // make sure the Name isn't blank
      fail('Olvidaste poner tu nombre');
    elseif ( $_email == '' ) // make sure the Email Address isn't blank
      fail('Olvidaste poner tu email');
    elseif ( !is_email($_email) ) // make sure the Email Address looks right
      fail('Tu email parece no estar correcto, prueba de nuevo.');

  if ( $_comment == '' ) // make sure the Comment isn't blank
    fail('Olvidaste comentar algo');

//  if ( !checkAICode($_code) && !$user_ID ) // must pass AuthImage Word Verification
//    fail('Your Word Verification code did not match the picture. Please try again.');

  // Simple duplicate check
  if($wpdb->get_var("
  SELECT comment_ID FROM {$wpdb->comments}
  WHERE comment_post_ID = '".$wpdb->escape($_comment_post_ID)."'
    AND ( comment_author = '".$wpdb->escape($_author)."'
  ".($_email? " OR comment_author_email = '".$wpdb->escape($_email)."'" : "")."
  ) AND comment_content = '".$wpdb->escape($_comment)."'
  LIMIT 1;"))
    fail("Eso ya lo has dicho, no hace falta repetirse.");


	// Simple duplicate check
  if ( $wpdb->get_var("SELECT comment_ID FROM $wpdb->comments WHERE comment_post_ID = '$comment_post_ID' AND ( comment_author = '$comment_author' ".($comment_author_email ? "OR comment_author_email = '$comment_author_email' " : "").") AND comment_content = '$comment_content' LIMIT 1") )
    fail("'Comentario duplicado detectado. Parece ser que ya has dicho eso");



  // Simple flood-protection
  if ( $lasttime = $wpdb->get_var("SELECT comment_date_gmt FROM $wpdb->comments WHERE comment_author_IP = '$comment_author_IP' OR comment_author_email = '".$wpdb->escape($_email)."' ORDER BY comment_date DESC LIMIT 1") ) {
    $time_lastcomment = mysql2date('U', $lasttime);
    $time_newcomment  = mysql2date('U', current_time('mysql', 1));

    if ( ($time_newcomment - $time_lastcomment) < 15 ) {
      do_action('comment_flood_trigger', $time_lastcomment, $time_newcomment);
      fail("Lo siento, solo puedes publicar un comentario cada 15 segundos. Tranquilo amigo.");
    }
  }

  // insert comment into WordPress database
  wp_new_comment(array(
    'comment_post_ID' => $_comment_post_ID,
    'comment_author' => $_author,
    'comment_author_email' => $_email,
    'comment_author_url' => $_url,
    'comment_content' => $_comment,
    'comment_type' => '',
    'user_ID' => $user_ID
  ));

  // if the user is not already logged in and wants to be Remembered
  if ( !$user_ID && isset($_remember) ) { // remember cookie
    setcookie('comment_author_' . COOKIEHASH, $_author, time() + 30000000, COOKIEPATH, COOKIE_DOMAIN);
    setcookie('comment_author_email_' . COOKIEHASH, $_email, time() + 30000000, COOKIEPATH, COOKIE_DOMAIN);
    setcookie('comment_author_url_' . COOKIEHASH, $_url, time() + 30000000, COOKIEPATH, COOKIE_DOMAIN);
  } else { // forget cookie
    setcookie('comment_author_' . COOKIEHASH, '', time() - 30000000, COOKIEPATH, COOKIE_DOMAIN);
    setcookie('comment_author_email_' . COOKIEHASH, '', time() - 30000000, COOKIEPATH, COOKIE_DOMAIN);
    setcookie('comment_author_url_' . COOKIEHASH, '', time() - 30000000, COOKIEPATH, COOKIE_DOMAIN);
  }

  // grab comment as it exists in the WordPress database (after being manipulated by wp_new_comment())
  $comment = $wpdb->get_row("SELECT * FROM {$wpdb->comments} WHERE comment_ID = {$wpdb->insert_id} LIMIT 1;");
  $commentcount = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->comments} WHERE comment_post_ID = '".$wpdb->escape($_comment_post_ID)."' LIMIT 1;");
  $post->comment_status = $wpdb->get_var("SELECT comment_status FROM {$wpdb->posts} WHERE ID = '".$wpdb->escape($_comment_post_ID)."' LIMIT 1;");

  // scrape templated comment HTML from /themes directory
  ob_start(); // start buffering output
  $comments = array($comment); // make it look like there is one comment to be displayed
  include(TEMPLATEPATH.'/comments.php'); // now ask comments.php from the themes directory to display it
  $commentout = ob_get_clean(); // grab buffered output
  preg_match('#<li(.*?)>(.*)</li>#ims', $commentout, $matches); // Regular Expression cuts out the LI element's HTML

  // return comment HTML to XML HTTP Request object
  echo '<li '.$matches[1].' style="display:none">'.$matches[2].'</li>';
  exit;
?>