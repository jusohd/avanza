<?php if (is_404()) { header("HTTP/1.1 404 Not Found"); } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
 
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> 
	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' &raquo;'; } ?> <?php bloginfo('name'); ?> </title>
 
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
 
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
 
<?php wp_get_archives('type=monthly&format=link'); ?>
 
<?php wp_head(); ?>
</head>
<body>
<div id="overall">
<div id="header"> 
  <div class="header-title"><a href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name'); ?></a></div>
  <div class="header-text">
  <div style="float: left; width: 33%; text-align:left;">
  <?php echo date("l, F j, Y"); ?> 
</div>
<div style="float: left; width: 33%; text-align:center;">
<?php bloginfo('description'); ?>
</div>
<div style="float: left; width: 33%; text-align:right;">
<!-- edit website name -->
www.WebsiteName.com
</div>
  </div>
</div>
<div class="main-area">