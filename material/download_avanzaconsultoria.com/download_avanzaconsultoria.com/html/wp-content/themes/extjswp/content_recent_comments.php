<?php
if(!function_exists('get_option'))
require_once('../../../wp-config.php');
?>
<?php
/*  Copyright (C) George Notaras (http://www.g-loaded.eu/)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/


/* Changelog
* Wed Oct 04 2006 - v0.1.2
- Plugin information update
* Sun Apr 30 2006 - v0.1.1
- Now works with non standard wordpress table names.
* Sat Jan 14 2006 - v0.1
- Initial release
*/


function src_simple_recent_comments($src_count='all', $src_length='full', $pre_HTML='', $post_HTML='') {
	global $wpdb;
	
	$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type, ";
    if (is_numeric($src_length))
		$sql .= " SUBSTRING(comment_content,1,$src_length) AS com_excerpt ";
    else
        $sql .= " comment_content AS com_excerpt ";
    $sql .= " FROM $wpdb->comments 
		LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) 
		WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' 
		ORDER BY comment_date_gmt DESC ";
    if (is_numeric($src_count)) {
        $sql .= "LIMIT $src_count";
    }
		
	$comments = $wpdb->get_results($sql);
?>
<?php if ($comments) : ?>
    	<ol class="commentlist" class="recentcommentlist">
<?php $oddcomment = ''; ?>
	<?php foreach ($comments as $comment) : ?>
		<li class="commentsitem <?php echo $oddcomment; ?>" id="recent-comment-<?php $comment->ID ?>">
			<div class="commentauthor"><?php echo $comment->comment_author; ?>  dijo en <a href="<?php echo get_permalink($comment->ID);?>#comment-<?php echo $comment->comment_ID;?>"><?php echo $comment->post_title;?></a></div>
			<?php if ($comment->comment_approved == '0') : ?>
			    <em>Tu comentario está pendiente de aprobación.</em>
			<?php endif; ?>
			<div class="commentmetadata"><?php echo date('j F, Y', strtotime($comment->comment_date_gmt)); ?> a las <?php echo mysql2date(get_option('time_format'), $comment->comment_date_gmt); ?></div>

			<?php echo $comment->com_excerpt;?>
		</li>

	<?php /* Changes every other comment to a different class */
		if ('alt' == $oddcomment) $oddcomment = '';
		else $oddcomment = 'alt';
	?>

	<?php endforeach; /* end for each comment */ ?>
	    </ol>
<?php endif; ?>
<?php
}
?>
<div id="recentcomments-container">
<div class="page"><div class="page-title" style="cursor:pointer" onclick="Wp.theme.recentCommentsRefresh();">Comentarios recientes</div></div>
<?php src_simple_recent_comments(10); ?>
</div>
