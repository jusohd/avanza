<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title>
<?php wp_title(''); ?>
<?php if(wp_title('', false)) { echo ' |'; } ?>
<?php bloginfo('name'); ?>
</title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<!-- leave this for stats -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!--[if lt IE 7]>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/lt-ie7.css" type="text/css" media="screen" />
<![endif]-->
<!--[if lte IE 7]>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/lte-ie7.css" type="text/css" media="screen" />
<![endif]-->
<script src="<?php bloginfo('stylesheet_directory'); ?>/jquery_1.js" type="text/javascript"></script>
<script src="<?php bloginfo('stylesheet_directory'); ?>/jquery_2.js" type="text/javascript"></script>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<!--we need this for plugins-->
<?php wp_head(); ?>
</head>
<body>
<div id="container">
<!--container start-->
<div id="header">
  <!--header start-->
  <h1><a href="<?php echo get_settings('home'); ?>/">
    <?php bloginfo('name'); ?>
    </a></h1>
  <div class="description">
    <?php bloginfo('description'); ?>
  </div>
  <div id="menu">
    <!--menu start-->
    <ul>
      <li class="home"><a href="<?php echo get_settings('home'); ?>">BLOG</a></li>
      <?php wp_list_pages('title_li=&depth=1'); ?>
    </ul>
  </div>
  <!--menu end-->
</div>
<!--header end-->
