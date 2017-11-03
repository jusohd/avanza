<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Archivo del Fotolog <?php } ?> <?php wp_title(); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>
</head>

<body>
<center>
<div id="page">

<div id="header">
	<div id="header_top">
		<div id="header_title">
			<?php bloginfo('name'); ?> | <span><?php bloginfo('description'); ?></span>
		</div>
	</div>
	<div id="header_end">
			<a href="<?php bloginfo('home'); ?>" id="home_link">PORTADA</a>
			<a href="<?php bloginfo('rss2_url'); ?>" id="rss_link">RSS</a>
	</div>
</div>

<div id="blog">
<div id="blog_pad">
	<div id="blog_left">