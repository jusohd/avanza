<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php if (wp_version()=='21') language_attributes(); ?>>

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
	<div id="main">
		<div id="logo">
			<h1><a href="<?php echo get_settings('home'); ?>"><?php bloginfo("name") ?></a><span class="blue"></span></h1>
		</div>
		
		<ul id="menu">
			<?php wp_list_pages('title_li=&depth=1' ); ?>
		</ul>
		
		<div id="intro_left">
			<p>Este texto es introductorio para que pongas lo que quieras. Lo tienes disponible en /wp-content/themes/artificial-intelligence-10/header.php. Puedes editar donde encuentres este texto y poner lo que te apetezca</p>
		</div>
		
		<div id="intro_right">
			<p class="white"><?php bloginfo('name'); ?></p>
			<h1><?php bloginfo('description'); ?></h1>
			<p>Este espacio es ideal para incluir una descripción del blog, sus contenidos, intenciones e incluso declaración de principios. Si quieres cambiarlo sustituye este texto, que encontrarás en /wp-content/themes/artificial-intelligence-10/header.php.</p>
		</div>

		<ul id="menu_left">
			<li><a href="<?php bloginfo("home") ?>">Principal</a></li>
			<li><a href="acerca-de/">Contacto</a></li>
			<li><a href="wp-admin/">Administrar</a></li>
		</ul>