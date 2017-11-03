<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title>
<?php bloginfo('name'); ?>
<?php if ( is_single() ) { ?>
&raquo;
<?php 
foreach((get_the_category()) as $cat) { 
echo $cat->cat_name . ' '; 
} ?>
<?php } ?>
<?php wp_title(); ?>
</title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<!-- leave this for stats -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/tabs.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/nav.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/plugins.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/template-style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/styles/print.css" type="text/css" media="print" />


<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/dropdowns.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/tabs.js"></script>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>
</head>

<body<?php if ( is_home() ) { ?> id="home"<?php } ?>>
<div id="page" class="clearfloat">

<div class="clearfloat">
<div id="branding" class="left" onclick="location.href='<?php echo get_settings('home'); ?>';" style="cursor: pointer;">
    <div class="blogtitle" ><a href="<?php echo get_option('home'); ?>/"><?php //bloginfo('name'); ?></a></div>
	  <div class="description"><?php //bloginfo('description'); ?></div>
</div>

<div class="right"><?php include (TEMPLATEPATH . '/searchform.php'); ?></div>
</div>

<ul id="nav" class="clearfloat">
<li><a href="<?php echo get_option('home'); ?>/" class="on">PORTADA</a></li> 
<?php wp_list_pages('title_li='); ?>
</ul>