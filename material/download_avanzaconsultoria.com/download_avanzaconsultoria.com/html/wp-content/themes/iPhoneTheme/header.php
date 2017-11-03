<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="robots" content="all, index, follow" />
<title><?php bloginfo('name'); wp_title(); ?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /><!-- leave this for stats -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_directory');?>/customstyle.css" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
</head>


<body class="customstyle">
	<div id="page">
		<div id="header">
			<h1 id="blogtitle"><a href="<?php bloginfo('url');?>"><?php bloginfo('name');?></a></h1><!-- close blogtitle -->
			<div id="mainnav">
				<div class="page_item <?php if(is_home()){echo 'current_page_item';}?>"><a title="Home Page" href="<?php bloginfo('siteurl'); ?>"><span>Dock</span></a></div>
				<?php $pages = wp_list_pages('exclude=1423&sort_column=menu_order&depth=1&title_li=&echo=0'); $pages = preg_replace('/(<a[^>]*>)/','$1<span>',$pages); $pages = str_replace('<li ', '<div ', $pages); $pages = str_replace('</a>', '</span></a>', $pages); $pages = str_replace('</li>', '</div>', $pages); echo $pages; ?>
			</div>
			<!-- close mainnav -->
			<form id="searchform" method="get" action="<?php bloginfo('home'); ?>/">
				<span>Búsqueda: </span>
				<input id="searchfield" type="text" value="<?php the_search_query(); ?>" name="s"/>
				<input id="searchsubmit" type="submit" value="Buscar" />
			</form>			
		</div>
		<!-- end header -->
		<div id="container">