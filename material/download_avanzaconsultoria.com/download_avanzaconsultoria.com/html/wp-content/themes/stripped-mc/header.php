<?php include(TEMPLATEPATH."/config.inc.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
<?php wp_meta(); //we need this for plugins ?>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<!--[if lt IE 7]>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/lt-ie7.css" type="text/css" media="screen" />
<![endif]-->
<!--[if lte IE 7]>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/lte-ie7.css" type="text/css" media="screen" />
<![endif]-->
<?php if ($st_color_scheme) { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/colors/<?php echo $st_color_scheme; ?>.css" type="text/css" media="screen" />
<?php } ?>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php if($st_feedburner_address) { echo $st_feedburner_address; } else { bloginfo('rss2_url'); } ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); //we need this for plugins ?>

</head>

<body>

<div id="container">

<div id="header" class="clearboth">
    <div id="title">
	<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
    </div>
    
	<div id="menu">
	<ul>
        <?php //Lists pages (only parents) with no title ?>
		<?php wp_list_pages('title_li=&depth=1'); ?>
        <?php //this is a feed link ... you can style it if you want ?>
		<li class="menu-feed"><a href="<?php if($st_feedburner_address) { echo $st_feedburner_address; } else { bloginfo('rss2_url'); } ?>">Feed</a></li>
	</ul>
	</div>
    
</div>
<!--header.php end-->