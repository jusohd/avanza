<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!--[if !IE]><!-->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/NONie.css" media="screen" />
<!--<![endif]-->

<?php wp_head(); ?>
</head>
<body>
<div id="container">
<div id="header">

		<h2><a href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name'); ?></a></h2>

                  <h3>"<?php bloginfo('description'); ?>"</h3>
</div>

<div id="menu">
	<ul>
		<li class="page_item"><a href="<?php echo get_settings('home'); ?>">Inicio</a></li>
		<?php wp_list_pages('title_li=&depth=1'); ?>
	</ul>
	</div>
<div id="middlepic"></div>
