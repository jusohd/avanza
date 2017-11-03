<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Archivo del Blog <?php } ?> <?php wp_title(); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>
</head>
<body>
<div id="page">

<div id="header">
	<div id="headerleft">
		<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
		<p class="description"><?php bloginfo('description'); ?></p>	
	</div>
	<div id="headerright">
		<form id="searchform" method="get" action="">
		<input value="Busca..." name="s" id="s" onfocus="if (this.value == 'Busca...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Busca...';}" type="text" />
		<input id="sbutt" value="IR" type="submit" /></form>
		<ul>
		<li><a href="<?php bloginfo('rss2_url'); ?>">Entradas</a></li>
		<li><a href="<?php bloginfo('comments_rss2_url'); ?>">Comentarios</a></li>
		</ul>

	</div>
	<hr class="clear" />

</div>

<div id="headerimg">
</div>

<div id="navbar">

		<ul>
			<li><a href="<?php echo get_settings('home'); ?>">Inicio</a></li>
			<?php wp_list_pages('title_li=&depth=1'); ?>
			<?php // wp_list_categories('title_li='); ?> 
		</ul>
</div>

<div id="content-wrapper">

