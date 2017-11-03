<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
<title><?php bloginfo('name'); wp_title(); ?></title>

<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="generator" content="WordPress <?php bloginfo('version') ?>" />
<meta name="revisit-after" content="1 days"/>

<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<?php wp_head(); ?>

</head>


<body>
	 
<div id="container" >
<div id="header">
<h1><?php bloginfo('name'); ?></h1>
<h2><?php bloginfo('description'); ?></h2>
</div>

<div id="navigation">
<ul>
<li class="selected"><a href=<?php echo get_settings('home'); ?>>Inicio</a></li>
<?php wp_list_pages('sort_column=post_title&depth=1&title_li='); ?>
</ul>
</div>

