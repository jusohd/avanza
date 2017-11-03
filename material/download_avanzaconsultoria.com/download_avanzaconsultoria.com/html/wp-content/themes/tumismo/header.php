<?php load_theme_textdomain('unnamed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes();?>>
<head profile="http://gmpg.org/xfn/11">
<title><?php wp_title(''); if (function_exists('is_tag') && is_tag() && !is_archive()) { ?>Archivo de tags de <?php echo get_query_var('tag'); } if (is_archive()) { ?> archive <?php } elseif (is_search()) { ?>Buscar <?php echo get_query_var('s'); } if ( !(is_404()) && (is_search()) || (is_single()) || (is_page()) || (function_exists('is_tag') && is_tag()) || (is_archive()) ) { ?> en <?php } ?><?php bloginfo('name'); ?></title>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<meta name="description" content="<?php bloginfo('description'); ?>" />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<?php if (get_option('unnamed_layout') == 0) { ?>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_directory'); ?>/two_column.css" />
<?php } ?>
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('unnamed_rss') != '') { echo (get_option('unnamed_rss')); } else { echo bloginfo('rss2_url'); } ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Comments Rss" href="<?php bloginfo('comments_rss2_url'); ?>" />
<?php if (is_single() || is_page()) { ?>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php } ?>

<?php if((get_option('unnamed_ajaxcommenting') == 1 || get_option('unnamed_livesearch') == 1 || get_option('unnamed_shelf') == 1)) { ?>
<?php if(get_option('unnamed_scriptloader') == 1) { wp_enqueue_script('unnamed_functions'); } else { ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/prototype.js.php"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/effects.js.php"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/functions.js.php"></script>
<?php } } ?>
<?php if (get_option('unnamed_ajaxcommenting') == 1 && (is_single() || is_page()) && (('open' == $post-> comment_status) || ('comment' == $post-> comment_type)) ) { ?>
<?php if(get_option('unnamed_scriptloader') == 1) { wp_enqueue_script('unnamed_comments'); } else { ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/comments.js.php"></script>
<?php } } ?>
<?php if(get_option('unnamed_livesearch') == 1) { ?>
<?php if(get_option('unnamed_scriptloader') == 1) { wp_enqueue_script('unnamed_livesearch'); } else { ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/livesearch.js.php"></script>
<?php } } ?>
<?php wp_head(); ?>

</head>

<body>

<div id="container">

	<ul id="nav">
		<?php if ('page' != get_option('show_on_front')) { ?>
		<li class="<?php if ( is_home() || is_archive() || is_single() || is_paged() || is_search() || (function_exists('is_tag') && is_tag()) ) { ?>current_page_item<?php } else { ?>page_item<?php } ?>">
		<a href="<?php echo get_settings('home'); ?>/" title="<?php _e('Inicio','unnamed'); ?>"><?php _e('Inicio','unnamed'); ?></a>
		</li>
		<?php } ?>
		<?php if(get_option('unnamed_dropmenu') == 1) { ?>
		<?php wp_list_pages('sort_column=menu_order&title_li=&exclude='. get_option('unnamed_hidepages')); ?>
		<?php } else { ?>
		<?php wp_list_pages('title_li=&depth=1&sort_column=menu_order&exclude='. get_option('unnamed_hidepages'));?>
		<?php } ?>
	</ul>
	
	<div id="header">
		<h1><a href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
		<p class="description"><?php bloginfo('description'); ?></p>
	</div>
	
	<div id="content">
		<?php if (get_option('unnamed_shelf') == 1 ) { ?>
		<?php include (TEMPLATEPATH ."/shelf.php"); ?>
		<?php } elseif (get_option('unnamed_shelf') != 1 ){ ?>
		<div class="content-top"></div>
		<?php } ?>
		<script type="text/javascript"><!--
google_ad_client = "pub-5937639773245773";
//728x15, creado 26/12/07 para ayudawordpress
google_ad_slot = "4667650331";
google_ad_width = 728;
google_ad_height = 15;
//--></script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
		<hr />