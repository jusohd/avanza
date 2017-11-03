<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Archivo del Blog <?php } ?> <?php wp_title(); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<!-- ExtJS CSS -->
<link rel="STYLESHEET" type="text/css" href="<?php bloginfo('template_url'); ?>/ext/resources/css/ext-all.css">
<link rel="STYLESHEET" type="text/css" href="<?php bloginfo('template_url'); ?>/ext/ux/accordion.css">

<!-- Theme CSS -->
<?php if ( isset($_COOKIE['ys-theme']) ) : ?>
<link id="theme" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/<? echo substr($_COOKIE['ys-theme'],2,strlen($_COOKIE['ys-theme']));?>.css" type="text/css" media="screen" />
<?php else :?>
<link id="theme" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/aero.css" type="text/css" media="screen" />
<?php endif ;?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<?php wp_head(); ?>
</head>
<body scroll="no">
<div id="loading-mask">&#160;</div>
<div id="loading">
	<div class="loading-indicator"><img src="<?php bloginfo('template_url'); ?>/ext/resources/images/default/grid/loading.gif" style="width:16px;height:16px;" align="absmiddle" />&#160;Cargando...</div>
</div>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/ext/adapter/ext/ext-base.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/ext/ext-all.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/ext/ux/Ext.ux.InfoPanel.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/ext/ux/Ext.ux.Accordion.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/theme.js"></script>
<script type="text/javascript"><!-- //
    // Wp superglobals
    Wp.bloginfo = {
        url: '<?php bloginfo('url'); ?>/',
        ajax_comments_url: '<?php bloginfo('template_url'); ?>/comments_ajax.php?comments_ajax',
        title:'<?php bloginfo('title'); ?>',
        description:'<?php bloginfo('description'); ?>',
        template_url: '<?php bloginfo('template_url'); ?>',
        rss2_url: '<?php bloginfo('rss2_url'); ?>',
        comments_rss2_url: '<?php bloginfo('comments_rss2_url'); ?>',
        wp_query: '<?php _e(http_build_query($wp_query->query)); ?>'
    };
    // blank image
    Ext.BLANK_IMAGE_URL = Wp.bloginfo.template_url +'/ext/resources/images/default/s.gif';
    // theme execution
    Ext.onReady(Wp.theme.init, Wp.theme);
// --></script>


<!-- end header -->
