<?php 
require_once(dirname(__FILE__)."/../../../wp-config.php");
/* 

ideas from AJAX Comment Preview plugin:
http://blogwaffe.com/ajax-comment-preview/

and theme lush:
http://www.i-jeriko.de/wordpress-theme-lush

*/
global $user_ID, $user_url, $user_identity;
$comment_author	= trim($_POST['author']);
if (!$comment_author) $comment_author = 'Anonymous';
$comment_author_url	= trim($_POST['url']);
$comment_content	= trim($_POST['comment']);

get_currentuserinfo();
if ( $user_ID ) :
	$comment_author	= addslashes($user_identity);
	$comment_author_url	= addslashes($user_url);
endif;

$comment_content = apply_filters('pre_comment_content', $comment_content);
$comment_content = apply_filters('post_comment_text', $comment_content);
$comment_content = apply_filters('comment_content_presave', $comment_content);
$comment_content = stripslashes($comment_content);
$comment_content = apply_filters('get_comment_text', $comment_content);
$comment_content = apply_filters('comment_text', $comment_content);

$comment_author = apply_filters('pre_comment_author_name', $comment_author);
$comment_author = stripslashes($comment_author);
$comment_author = apply_filters('get_comment_author', $comment_author);	
?>
<ol id="previewlist">
	<li>
		<div class="comment-header"> <?php if($comment_author_url != '') : ?> <a href="<?php echo $comment_author_url; ?>" rel="external"><?php echo $comment_author; ?></a> <?php else: echo $comment_author; endif; ?> </div>
		<div class="comment-content"><?php echo $comment_content; ?></div>
	</li>
</ol>
