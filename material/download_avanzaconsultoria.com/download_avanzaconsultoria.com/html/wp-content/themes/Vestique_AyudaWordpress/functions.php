<?php

////////////////////////////////////////////////////////////////////////////////
// Random post
////////////////////////////////////////////////////////////////////////////////
function gte_random_posts (){
global $wpdb, $post;
$current_title = get_the_title();
$randompostthis = $wpdb->get_results("SELECT $wpdb->posts.ID, post_title, post_name, post_date, post_type, post_status FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' AND post_title != '$current_title' ORDER BY RAND() limit 10");
foreach ($randompostthis as $post) {
$post_title = htmlspecialchars(stripslashes($post->post_title));
echo "<li><a href=\"".get_permalink()."\">$post_title</a></li>";
}
}

////////////////////////////////////////////////////////////////////////////////
// update post
////////////////////////////////////////////////////////////////////////////////
function gte_recent_updated_posts(){
global $wpdb, $post;

$recentupdatethis = $wpdb->get_results("SELECT $wpdb->posts.ID, post_title, post_name, post_date, post_type, post_status, post_modified FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' ORDER by post_modified_gmt DESC limit 5");
foreach ($recentupdatethis as $post) {
$post_title = htmlspecialchars(stripslashes($post->post_title));
echo "<li><a href=\"".get_permalink()."\">$post_title</a></li>";
}
}

////////////////////////////////////////////////////////////////////////////////
// Recent Comments
////////////////////////////////////////////////////////////////////////////////

function get_hottopics($limit = 10) {
    global $wpdb, $post;
    $mostcommenteds = $wpdb->get_results("SELECT  $wpdb->posts.ID, post_title, post_name, post_date, COUNT($wpdb->comments.comment_post_ID) AS 'comment_total' FROM $wpdb->posts LEFT JOIN $wpdb->comments ON $wpdb->posts.ID = $wpdb->comments.comment_post_ID WHERE comment_approved = '1' AND post_date_gmt < '".gmdate("Y-m-d H:i:s")."' AND post_status = 'publish' AND post_password = '' GROUP BY $wpdb->comments.comment_post_ID ORDER  BY comment_total DESC LIMIT $limit");
    foreach ($mostcommenteds as $post) {
			$post_title = htmlspecialchars(stripslashes($post->post_title));
			$comment_total = (int) $post->comment_total;
			echo "<li><a href=\"".get_permalink()."\">$post_title&nbsp;<strong>($comment_total)</strong></a></li>";
    }
}


////////////////////////////////////////////////////////////////////////////////
// Recent Comments
////////////////////////////////////////////////////////////////////////////////
function mw_recent_comments(
	$no_comments = 10,
	$show_pass_post = false,
	$title_length = 50, 	// shortens the title if it is longer than this number of chars
	$author_length = 30,	// shortens the author if it is longer than this number of chars
	$wordwrap_length = 50, // adds a blank if word is longer than this number of chars
	$type = 'all', 	// Comments, trackbacks, or both?
	$format = '<li>%date%: <a href="%permalink%" title="%title%">%title%</a> (von %author_full%)</li>',
	$date_format = 'd.m.y, H:i',
	$none_found = '<li>Keine Kommentare vorhanden.</li>',	// None found
	$type_text_pingback = 'Pingback von',
	$type_text_trackback = 'Trackback von',
	$type_text_comment = 'von'

	) {

	//Language...
	$mwlang_anonymous = 'Anonym'; // Anonymous
	$mwlang_authorurl_title_before = 'Webseite von &lsaquo;';
	$mwlang_authorurl_title_after = '&rsaquo; besuchen';


    global $wpdb;

    $request = "SELECT ID, comment_ID, comment_content, comment_author, comment_author_url, comment_date, post_title, comment_type
				FROM $wpdb->comments LEFT JOIN $wpdb->posts ON $wpdb->posts.ID=$wpdb->comments.comment_post_ID
				WHERE post_status IN ('publish','static')";

	switch($type) {
		case 'all':
			// add nothing
			break;
		case 'comment_only':
			//
			$request .= "AND $wpdb->comments.comment_type='' ";
			break;
		case 'trackback_only':
			$request .= "AND ( $wpdb->comments.comment_type='trackback' OR $wpdb->comments.comment_type='pingback' ) ";
			break;
	 default:
 		//
			break;

	}

	if (!$show_pass_post) $request .= "AND post_password ='' ";

	$request .= "AND comment_approved = '1' ORDER BY comment_ID DESC LIMIT $no_comments";

	$comments = $wpdb->get_results($request);
    $output = '';
	if ($comments) {
    	foreach ($comments as $comment) {

			// Permalink to post/comment
			$loop_res['permalink'] = get_permalink($comment->ID). '#comment-' . $comment->comment_ID;

			// Title of the post
			$loop_res['post_title'] = stripslashes($comment->post_title);
			$loop_res['post_title'] = wordwrap($loop_res['post_title'], $wordwrap_length, ' ' , 1);

			if (strlen($loop_res['post_title']) >= $title_length) {
				$loop_res['post_title'] = substr($loop_res['post_title'], 0, $title_length) . '&#8230;';
			}

			// Author's name only
        	$loop_res['author_name'] = stripslashes($comment->comment_author);
			$loop_res['author_name'] = wordwrap($loop_res['author_name'], $wordwrap_length, ' ' , 1);

			if ($loop_res['author_name'] == '') $loop_res['author_name'] = $mwlang_anonymous;
			if (strlen($loop_res['author_name']) >= $author_length) {
				$loop_res['author_name'] = substr($loop_res['author_name'], 0, $author_length) . '&#8230;';
			}

			// Full author (link, name)
			$author_url = $comment->comment_author_url;
			if (empty($author_url)) {
				$loop_res['author_full'] = $loop_res['author_name'];
			} else {
				$loop_res['author_full'] = '<a href="' . $author_url . '" title="' . $mwlang_authorurl_title_before . $loop_res['author_name'] . $mwlang_authorurl_title_after . '">' . $loop_res['author_name'] . '</a>';
			}

/*
			// Comment excerpt
			$comment_excerpt = strip_tags($comment->comment_content);
			$comment_excerpt = stripslashes($comment_excerpt);
			if (strlen($comment_excerpt) >= $comment_length) {
				$comment_excerpt = substr($comment_excerpt, 0, $comment_length) . '...';
			}

*/

			// Comment type
			if ( $comment->comment_type == 'pingback' ) {
				$loop_res['comment_type'] = $type_text_pingback;
			} elseif ( $comment->comment_type == 'trackback' ) {
				$loop_res['comment_type'] = $type_text_trackback;
			} else {
				$loop_res['comment_type'] = $type_text_comment;
			}

			// Date of comment
			$loop_res['comment_date'] = mysql2date($date_format, $comment->comment_date);

			// Output element
			$element_loop = str_replace('%permalink%', $loop_res['permalink'], $format);
			$element_loop = str_replace('%title%', $loop_res['post_title'], $element_loop);
			$element_loop = str_replace('%author_name%', $loop_res['author_name'], $element_loop);
			$element_loop = str_replace('%author_full%', $loop_res['author_full'], $element_loop);
			$element_loop = str_replace('%date%', $loop_res['comment_date'], $element_loop);
			$element_loop = str_replace('%type%', $loop_res['comment_type'], $element_loop);


			$output .= $element_loop . "\n";


		} //foreach

		$output = convert_smilies($output);

	} else {
		$output .= $none_found;
    }

    echo $output;
}

////////////////////////////////////////////////////////////////////////////////
// excerpt features
////////////////////////////////////////////////////////////////////////////////

function the_excerpt_feature($excerpt_length=35, $allowedtags='', $filter_type='none', $use_more_link=true, $more_link_text="...seguir leyendo", $force_more_link=true, $fakeit=1, $fix_tags=true) {
	if (preg_match('%^content($|_rss)|^excerpt($|_rss)%', $filter_type)) {
		$filter_type = 'the_' . $filter_type;
	}
	$text = apply_filters($filter_type, get_the_excerpt_feature($excerpt_length, $allowedtags, $use_more_link, $more_link_text, $force_more_link, $fakeit));
	$text = ($fix_tags) ? balanceTags($text) : $text;
	echo $text;
}

function get_the_excerpt_feature($excerpt_length, $allowedtags, $use_more_link, $more_link_text, $force_more_link, $fakeit) {
	global $id, $post;
	$output = '';
	$output = $post->post_excerpt;
	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_'.COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			$output = __('There is no excerpt because this is a protected post.');
			return $output;
		}
	}

	// If we haven't got an excerpt, make one.
	if ((($output == '') && ($fakeit == 1)) || ($fakeit == 2)) {
		$output = $post->post_content;
		$output = strip_tags($output, $allowedtags);
		$blah = explode(' ', $output);
		if (count($blah) > $excerpt_length) {
			$k = $excerpt_length;
			$use_dotdotdot = 1;
		} else {
			$k = count($blah);
			$use_dotdotdot = 0;
		}
		$excerpt = '';
		for ($i=0; $i<$k; $i++) {
			$excerpt .= $blah[$i] . ' ';
		}
		// Display "more" link (use css class 'more-link' to set layout).
		if (($use_more_link && $use_dotdotdot) || $force_more_link) {
			$excerpt .= "<a href=\"". get_permalink() . "#more-$id\">$more_link_text</a>";
		} else {
			$excerpt .= ($use_dotdotdot) ? '...' : '';
		}
		 $output = $excerpt;
	} // end if no excerpt
	return $output;
}
////////////////////////////////////////////////////////////////////////////////
// end
////////////////////////////////////////////////////////////////////////////////


if ( function_exists('register_sidebar') ) {
register_sidebar(array('name'=>'Top-Header',
'before_widget' => '',
'after_widget' => '</li></ul></div>',
'before_title' => '<div class="h-block"><h3>',
'after_title' => '</h3><ul class="list"><li>',
));
if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Sidebar Right',
'before_widget' => '',
'after_widget' => '</li></ul>',
'before_title' => '<h3>',
'after_title' => '</h3><ul class="list"><li>',
));
if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Bottom-Footer',
'before_widget' => '',
'after_widget' => '</li></ul></div>',
'before_title' => '<div class="h-block"><h3>',
'after_title' => '</h3><ul class="list"><li>',
));

function unregister_problem_widgets() {
unregister_sidebar_widget('Calendar');
unregister_sidebar_widget('RSS 1');
unregister_sidebar_widget('Search');
unregister_sidebar_widget('Recent Comments');
unregister_sidebar_widget('FlickrRSS');
}
add_action('widgets_init','unregister_problem_widgets');
}




?>