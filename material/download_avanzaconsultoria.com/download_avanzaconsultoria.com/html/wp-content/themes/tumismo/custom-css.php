<?php
	require_once(dirname(__FILE__)."/../../../wp-blog-header.php");
	// check to see if the user has enabled gzip compression in the WordPress admin panel
	if ( ob_get_length() === FALSE and !ini_get('zlib.output_compression') and ini_get('output_handler') != 'ob_gzhandler' and ini_get('output_handler') != 'mb_output_handler' ) {
		ob_start('ob_gzhandler');
	}
	header("Cache-Control: public");
	header("Pragma: cache");

	$offset = 60*60*24*60;
	$ExpStr = "Expires: ".gmdate("D, d M Y H:i:s",time() + $offset)." GMT";
	$LmStr = "Last-Modified: ".gmdate("D, d M Y H:i:s",filemtime(__FILE__))." GMT";

	header($ExpStr);
	header($LmStr);
	header('Content-Type: text/css; charset: UTF-8');
?>
body { 
	color:<?php echo unnamed_fontcolor(); ?>;
	background:<?php echo unnamed_bgimage(); ?> <?php echo unnamed_bgcolor(); ?>;
}
a,a:link,a:active,a:visited {
	color:<?php echo unnamed_linkcolor(); ?>;
}
a:hover {
	color:<?php echo unnamed_hovercolor(); ?>;
}
h1, h2, h3, h4 {
	color:<?php echo unnamed_fontcolor(); ?>;
}
#header {
	height:<?php echo HEADER_IMAGE_HEIGHT; ?>px;
	background:url(<?php header_image() ?>) transparent repeat top center;
}
<?php if (get_header_textcolor()=='blank' ) { ?>
#header h1, .description {
	display:none;
}
<?php } else { ?>
#header h1 a,.description {
	color:#<?php header_textcolor() ?>;
}
<?php } ?> 
#content {
	background:<?php echo unnamed_contentcolor(); ?>;
}
<?php if (unnamed_contentcolor() != "#FFFFFF") { ?>
* html .content-top {
	background:none;
}
* html .content-bottom {
	background:none;
}
<?php } ?>