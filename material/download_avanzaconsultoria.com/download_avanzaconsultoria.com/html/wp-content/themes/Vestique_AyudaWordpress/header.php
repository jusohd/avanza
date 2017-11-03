<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title>
<?php if (is_home()) { ?>

<?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>

<?php } else if (is_category()) { ?>

<?php bloginfo('name'); ?> - <?php wp_title(''); ?>

<?php } else if (is_single() || is_page()) { ?>

<?php bloginfo('name'); ?> - <?php wp_title(''); ?>

<?php } else if (is_archive()) { ?>

<?php bloginfo('name'); ?> -

<?php  if (is_day()) { ?>
Archive for <?php the_time('F jS Y'); ?>
<?php  } elseif (is_month()) { ?>
Archive for <?php the_time('F Y'); ?>
<?php  } elseif (is_year()) { ?>
Archive for <?php the_time('Y'); ?>
<?php } ?>

<?php } ?>
</title>

<meta name="keywords" content="Vestique WordPress Theme, Unique WordPress Theme, 3 header 3 footer WordPress Theme" />


<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="icon" href="<?php bloginfo('stylesheet_directory');?>/favicon.ico" type="images/x-icon" />

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />


<?php wp_get_archives('type=monthly&format=link'); ?>
<?php wp_head(); ?>


</head>

<body>
<div id="wrap">
<div id="container">
<div id="top-header">
<div class="left-th">
<h1><a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name'); ?></a></h1>
<p><?php bloginfo('description'); ?></p>
</div>
<div class="right-th">
<ul class="pg">
<li id="<?php if (is_home()) { ?>home<?php } else { ?>page_item<?php } ?>"><a href="<?php bloginfo('url'); ?>" title="Home">Inicio</a></li>
<?php wp_list_pages('title_li=&depth=1'); ?>
</ul>
</div>
</div>

<?php include (TEMPLATEPATH . '/top-header.php'); ?>

<div id="content">