<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
	<title><?php bloginfo('name'); if ( is_404() ) : echo 'No encontrado'; else : wp_title(); endif; ?></title>
	<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version') ?>" /><!-- Please leave for stats -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('rss2_url') ?>" title="<?php bloginfo('name') ?> RSS Feed de fotografias" />
	<link rel="alternate" type="application/rss+xml" href="<?php bloginfo('comments_rss2_url') ?>" title="<?php bloginfo('name') ?> RSS Feed de criticas" />
	<link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
	<?php wp_head() ?>
</head>

<body>

<div id="layer1">
	<div class="header">
		<h1><?php echo bloginfo('name'); ?></h1>
		<ul id="menu">
			<li><a href="<?php bloginfo('url'); ?>" title="Portada">Portada</a></li>
			<?php wp_list_pages('sort_column=menu_order&depth=1&title_li='); ?>
		</ul>
	</div>
</div>
