<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php if (is_home()) { ?><?php bloginfo('name'); ?><?php } ?>
<?php if (is_single() || is_page()) { ?><?php wp_title('',true); ?><?php } ?>
<?php if (is_category()) { ?> <?php echo single_cat_title(); ?> Categoría<?php } ?><?php if (is_month()) { ?> <?php the_time('F Y'); ?> Archivo<?php } ?>
<?php if (is_search()) { ?> Resultados de Búsqueda<?php } ?><?php if(function_exists('psb_pagednumber')) { psb_pagednumber(); } ?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
</head>
<body>
<div id="page">
 <div id="nav"><ul><li class="page_item"><a href="<?php bloginfo('url'); ?>/"><?php _e('Inicio'); ?></a></li><?php wp_list_pages('title_li=' ); ?></ul></div>
 <div id="header">
  <div class="feed"><?php comments_rss_link(__('<img src="wp-content/themes/Zine Style/images/feed.gif" alt="" border="0" align="top" />' )); ?></div>
  <div id="logo"><h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1><div class="description"><?php bloginfo('description'); ?></div></div>
 </div>
  <div id="content"><?php if ( !is_single() ) { ?>
   <div class="featured"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/ipod.gif" align="left" /><h1>Noticia Patrocinada</h1>
    Aquí puedes anotar cualquier información estática, añadir publicidad o cualquier otro texto.
    <p>Encontrarás donde editar este texto en el fichero header.php.</p><p><a class="read-more" href="#">Sigue leyendo </a></p><br clear="all" />
   </div><?php } else { ?><?php } ?><br clear="all" />