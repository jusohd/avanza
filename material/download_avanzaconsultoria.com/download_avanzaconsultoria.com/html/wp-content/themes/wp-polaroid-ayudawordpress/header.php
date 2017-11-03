<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<?php if ( is_home() ) { ?><title><? bloginfo('name'); ?>&nbsp;&raquo;&nbsp;<?php bloginfo('description'); ?></title><?php } ?>
<?php if ( is_search() ) { ?><title><? bloginfo('name'); ?>&nbsp;&raquo;&nbsp;Search Results</title><?php } ?>
<?php if ( is_single() ) { ?><title><? bloginfo('name'); ?>&nbsp;&raquo;&nbsp;<?php wp_title(''); ?></title><?php } ?>
<?php if ( is_page() ) { ?><title><? bloginfo('name'); ?>&nbsp;&raquo;&nbsp;<?php wp_title(''); ?></title><?php } ?>
<?php if ( is_category() ) { ?><title><? bloginfo('name'); ?>&nbsp;&raquo;&nbsp;<?php single_cat_title(); ?></title><?php } ?>
<?php if ( is_archive() ) { ?><title><? bloginfo('name'); ?>&nbsp;&raquo;&nbsp;Archive</title><?php } ?>
<?php if ( is_month() ) { ?><title><? bloginfo('name'); ?>&nbsp;&raquo;&nbsp;Archive</title><?php } ?>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
<!--[if lte IE 6]>
<link href="http://localhost/testblog/wp-content/themes/polaroidv2/images/png_fix_ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="http://feeds.feedburner.com/adiidesign" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>

<!-- Start AMATOMU.COM code-->
<script src="http://www.amatomu.com/embed.php?blog_id=271" type="text/javascript"></script>
<!-- End AMATOMU.COM code -->

</head>

<body>

<!--HEADER STARTS HERE-->

<div id="bot-bgr">
	<div id="page-top">
		<ul class="subscribe">
			<li>SUSCRIBITE AL FEED...</li>
			<li class="feed"><a href="http://feeds.feedburner.com/adiidesign">POSTS</a> </li>
			<li class="feed"><a href="<?php bloginfo('comments_rss2_url'); ?>">COMMENTS</a></li>
		</ul>
	</div>
	<div id="page">
		<div id="header">
			
			<div id="logotag">
				<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
				<div class="tag"><?php bloginfo('descripcion'); ?></div>
			</div><!--/logotag -->
			
			<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
				<div class="search">
					<input type="text" value="Ingrese su busqueda..." onclick="this.value='';" name="s" id="s" />
					<input name="" type="image" src="<?php bloginfo('stylesheet_directory'); ?>/images/ico-go.gif" value="Go" class="btn"  />
				</div><!--/search-->
			</form>
			
		</div><!--/header -->
		
		<div id="polaroids"></div>
		<div id="title">
			<div class="tcol1">
				<div class="left-title">
					
					<h2>MAS SOBRE MI...</h2>
					
					<p>Lorem ipsum dolor sit amet, nisl elit viverra sollicitudin phasellus eros, vitae a mollis. Congue sociis amet, fermentum lacinia sed, orci auctor in vitae amet enim. Ridiculus nullam proin vehicula nulla euismod id. Ac est facilisis eget, ligula lacinia, vitae sed lorem nunc. Orci at nulla risus ullamcorper arcu. Nunc integer ornare massa diam sollicitudin.</p>
					
				</div><!--/left-title -->
				
				<ul>
					<li><a href="<?php echo get_option('home'); ?>/">HOME</a></li>
					<li><a href="<?php echo get_option('home'); ?>/about">CONTACTO</a></li>
					<li><a href="<?php echo get_option('home'); ?>/another-page">OTRA PAGINA</a></li>
				</ul>
			</div>
			<div class="tcol2">
				<div class="right-title">
					
					<h2>OTROS AGREGADOS...</h2>
					
					<p>Lorem ipsum dolor sit amet, nisl elit viverra sollicitudin phasellus eros, vitae a mollis. Congue sociis amet, fermentum lacinia sed, orci auctor in vitae amet enim. Ridiculus nullam proin vehicula nulla euismod id. Ac est facilisis eget, ligula lacinia, vitae sed lorem nunc.</p>
									
				</div><!--/right-title -->
				
				<ul>
					<li><a href="<?php echo get_option('home'); ?>/advertise/">PUBLICIDAD</a></li>
					<li><a href="<?php echo get_option('home'); ?>/contact/">CONTACTO</a></li>
					<li><a href="<?php echo get_option('home'); ?>/sitemap/">MAPA DEL SITIO</a></li>					
				</ul>
			</div>
		</div><!--/title-->

<div id="columns">