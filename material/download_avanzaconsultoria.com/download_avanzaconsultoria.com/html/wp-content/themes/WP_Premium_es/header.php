<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php if (is_home () ) { bloginfo(�name�); }
elseif ( is_category() ) { single_cat_title(); echo ' - ' ; bloginfo(�name�); }
elseif (is_single() ) { single_post_title();}
elseif (is_page() ) { single_post_title();}
else { wp_title(��,true); } ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/taber.js"></script>
<script type="text/javascript">
/* Optional: Temporarily hide the "tabber" class so it does not "flash"
   on the page as plain HTML. After tabber runs, the class is changed
   to "tabberlive" and it will appear. */
document.write('<style type="text/css">.tabber{display:none;}<\/style>');
</script>
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/hover.js"></script>

<?php wp_head(); ?>
</head>


<body>
<div id="header">
 	<div id="header-in">
    <p class="title"><a href="<?php echo get_settings('home'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></p>
    <p class="description"><?php bloginfo('description'); ?></p>
	<?php ?>
  

	<div id="nav">
	<ul>
		<li class="<?php if (is_home()) { echo "current_page_item"; } ?>"><a href="<?php echo get_settings('home'); ?>">Inicio</a></li>		
		<?php wp_list_pages('title_li=&depth=1&exclude='); ?>
	</ul>
	</div>
	
	<div class="subscribe">
	 	<span class="rss"><a href="<?php bloginfo('rss2_url'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/rss.gif"></img></a></span> 
		 
		 <div class="subscribeform">
		  <p>Suscribir por Email </p>
			<form action="http://www.feedburner.com/fb/a/emailverify" method="post" target="popupwindow" onsubmit="window.open(’http://www.feedburner.com’, ‘popupwindow’, ’scrollbars=yes,width=550,height=520?);return true">          
  <input type="text" value="" name="email" class="input" /> 
  <input type="submit" class="sbutton" value="Suscribir" />

  <input type="hidden" value="http://feeds.feedburner.com/~e?ffid=1510975" name="url"/>

  <input type="hidden" value="Ayuda Wordpress" name="title"/>

</form> 		 </div>
	</div>
 
	</div>

</div>

<div class="container-top"></div>
<div id="container">
 <!--header.php end-->
