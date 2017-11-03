<?php
  load_theme_textdomain('mandigo');

  // directories
  $dirs = array();
  $dirs['loc']['theme'] = TEMPLATEPATH ."/";
  $dirs['www']['theme'] = get_bloginfo('template_directory') ."/";

  foreach(array('loc','www') as $i) {
    foreach(array('images','js','schemes','images/patterns','images/headers','images/icons') as $j) {
      $dirs[$i][preg_replace('/.+\//','',$j)] = $dirs[$i]['theme'].$j.'/';
    }
  }

  // schemes
  $schemes = array();
  if (($dir = opendir($dirs['loc']['schemes'])) !== false) {
    while (($node = readdir($dir)) !== false) {
      if (!preg_match('/^\.{1,2}$/',$node) && file_exists($dirs['loc']['schemes']."$node/scheme.css")) {
        $schemes[] = $node;
      }
    }
  }
  sort($schemes);

  // Set default values
  if (!get_option('mandigo_scheme') || !array_search(get_option('mandigo_scheme'),$schemes)) update_option('mandigo_scheme',$schemes[0]);
  if (!get_option('mandigo_bgcolor'              )) update_option('mandigo_bgcolor'              ,'#44484F');
  if (!get_option('mandigo_wp_repeat'            )) update_option('mandigo_wp_repeat'            ,'repeat' );

  if (!get_option('mandigo_title_scheme_index'   )) update_option('mandigo_title_scheme_index'   ,'%blogname% - %tagline%');
  if (!get_option('mandigo_title_scheme_single'  )) update_option('mandigo_title_scheme_single'  ,'%blogname% &raquo; %post%');
  if (!get_option('mandigo_title_scheme_page'    )) update_option('mandigo_title_scheme_page'    ,'%blogname% &raquo; %post%');
  if (!get_option('mandigo_title_scheme_category')) update_option('mandigo_title_scheme_category','%blogname% &raquo; Archive for %category%');
  if (!get_option('mandigo_title_scheme_date'    )) update_option('mandigo_title_scheme_date'    ,'%blogname% &raquo; Archive for %date%');
  if (!get_option('mandigo_title_scheme_search'  )) update_option('mandigo_title_scheme_search'  ,'%blogname% &raquo; Search Results for &quot;%search%&quot;');

  if (!get_option('mandigo_tag_blogname'         )) update_option('mandigo_tag_blogname'         ,'h1');
  if (!get_option('mandigo_tag_blogdesc'         )) update_option('mandigo_tag_blogdesc'         ,'h6');
  if (!get_option('mandigo_tag_posttitle_multi'  )) update_option('mandigo_tag_posttitle_multi'  ,'h3');
  if (!get_option('mandigo_tag_posttitle_single' )) update_option('mandigo_tag_posttitle_single' ,'h2');
  if (!get_option('mandigo_tag_pagetitle'        )) update_option('mandigo_tag_pagetitle'        ,'h2');
  if (!get_option('mandigo_tag_sidebar'          )) update_option('mandigo_tag_sidebar'          ,'h4');

  if (!get_option('mandigo_posts_bgcolor'        )) update_option('mandigo_posts_bgcolor'        ,'#FAFAFA');
  if (!get_option('mandigo_posts_bdcolor'        )) update_option('mandigo_posts_bdcolor'        ,'#EEEEEE');
  if (!get_option('mandigo_sidebars_bgcolor'     )) update_option('mandigo_sidebars_bgcolor'     ,'#EEEEEE');
  if (!get_option('mandigo_sidebars_bdcolor'     )) update_option('mandigo_sidebars_bdcolor'     ,'#DDDDDD');

  if (!get_option('mandigo_trackbacks'           )) update_option('mandigo_trackbacks'           ,(get_option('mandigo_trackbacks_after') ? 'below' : 'along'));
  if (!get_option('mandigo_headnav_alignment'    )) update_option('mandigo_headnav_alignment'    ,(get_option('mandigo_headnav_left') ? 'left' : 'right'));
  if (!get_option('mandigo_date_format'          )) update_option('mandigo_date_format'          ,(get_option('mandigo_dates') ? 'dmY' : 'MdY'));

  // some global vars
  $ie      = preg_match("/MSIE [4-6]/",$_SERVER['HTTP_USER_AGENT']);
  $ie7     = preg_match("/MSIE 7/",    $_SERVER['HTTP_USER_AGENT']);
  $wpmu    = function_exists('is_site_admin');
  $dirs['loc']['scheme'] = $dirs['loc']['schemes'] . get_option('mandigo_scheme') ."/";
  $dirs['www']['scheme'] = $dirs['www']['schemes'] . get_option('mandigo_scheme') ."/";


  // Register sidebars
  $tag_sidebar = get_option('mandigo_tag_sidebar');
  if (function_exists('register_sidebar')) {
    register_sidebar(array('before_title' => "<$tag_sidebar class=\"widgettitle\">", 'after_title' => "</$tag_sidebar>\n"));
    register_sidebar(array('before_title' => "<$tag_sidebar class=\"widgettitle\">", 'after_title' => "</$tag_sidebar>\n"));
    register_sidebar(array('before_title' => "<$tag_sidebar class=\"widgettitle\">", 'after_title' => "</$tag_sidebar>\n", 'name' => 'Mandigo Top'));
    register_sidebar(array('before_title' => "<$tag_sidebar class=\"widgettitle\">", 'after_title' => "</$tag_sidebar>\n", 'name' => 'Mandigo Bottom'));
  }





  /* -------------------------------------------------
                      SEARCH WIDGET
  -------------------------------------------------- */
  function widget_mandigo_search() {
    global $tag_sidebar;
?>
			<li><<?php echo $tag_sidebar; ?> class="widgettitle"><?php _e('Búsqueda','mandigo'); ?></<?php echo $tag_sidebar; ?>>
				<?php include(TEMPLATEPATH . '/searchform.php'); ?>
			</li>
<?php
  }
  if (function_exists('register_sidebar_widget')) register_sidebar_widget('Búsqueda','widget_mandigo_search');





  /* -------------------------------------------------
                    CALENDAR WIDGET
  -------------------------------------------------- */
  function widget_mandigo_calendar() {
    global $tag_sidebar;
?>
			<li><<?php echo $tag_sidebar; ?> class="widgettitle">&nbsp;</<?php echo $tag_sidebar; ?>>
				<?php get_calendar(); ?>
			</li>
<?php
  }
  if (function_exists('register_sidebar_widget')) register_sidebar_widget('Calendario','widget_mandigo_calendar');





  /* -------------------------------------------------
                       META WIDGET
  -------------------------------------------------- */
  function widget_mandigo_meta() {
    global $dirs, $tag_sidebar, $wpmu;
    $options = get_option('widget_meta');
?>
				<li><<?php echo $tag_sidebar; ?> class="widgettitle"><?php echo ($options['title'] ? $options['title'] : __('Meta','mandigo')); ?></<?php echo $tag_sidebar; ?>>
                                <span id="rss"><a href="<?php bloginfo('rss2_url'); ?>" title="RSS feed de <?php bloginfo('name'); ?>"><img src="<?php echo $dirs['www']['scheme']; ?>/images/rss_l.gif" alt="Entradas (RSS)" id="rssicon" /></a></span>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
<?php if ($wpmu): ?>
					<li><a href="http://ayudawordpress.com/" title="Ayuda sobre Wordpress.">Ayuda Wordpress</a></li>
<?php else: ?>
					<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
<?php endif; ?>
					<li><a href="http://www.onehertz.com/portfolio/wordpress/" title="More WordPress themes by the same author" target="_blank">Plantilla Mandingo</a></li>
					<?php wp_meta(); ?>
				</ul>
				</li>
<?php
  }
  if (function_exists('register_sidebar_widget')) register_sidebar_widget('Meta','widget_mandigo_meta');



  /* -------------------------------------------------
                    internal stuff
  -------------------------------------------------- */
  function mandigo_author_link($author_id,$author_nicename) {
    // I'm not sure why, but the get_author_posts_url() function is undefined in some translated versions of WP
    if (function_exists('get_author_posts_url')) {
      return '<a href="'. get_author_posts_url($author_id) .'" title="'. sprintf(__("Todas las entradas de %s"), attribute_escape($author_nicename)).' ">'. $author_nicename .'</a>';
    }
    return $author_nicename;
  }

  function mandigo_date_icon($date) {
    list($y, $mn, $m, $d) = explode(' ', $date);
    switch (get_option('mandigo_date_format')) {
      case 'MdY': $l = array($mn, $d, $y); $x = array(1, 0, 0); break;
      case 'dmY': $l = array($d,  $m, $y); $x = array(1, 0, 0); break;
    }
	echo '
			        	<div class="calborder">
			        	<div class="cal">
                                                <span class="cal1'. ($x[0] ? " cal1x" : "") .'">'. $l[0] .'</span>
                                                <span class="cal2'. ($x[1] ? " cal2x" : "") .'">'. $l[1] .'</span>
                                                <span class="cal3'. ($x[2] ? " cal3x" : "") .'">'. $l[2] .'</span>
                                        </div>
                                        </div>
	';
  }




  /* -------------------------------------------------
                  THEME OPTIONS PAGES
  -------------------------------------------------- */
  add_action('admin_menu', 'add_mandigo_options_page');
  add_action('admin_menu', 'add_mandigo_inserts_page');
  add_action('admin_menu', 'add_mandigo_readme_page');
  add_action('admin_menu', 'add_mandigo_farbtastic_js');
  add_action('admin_head', 'add_mandigo_farbtastic_css');

  function add_mandigo_options_page() {
    global $dirs;
    add_theme_page(
      'Opciones de la plantilla',
      '<img src="'. $dirs['www']['images'] .'/attention_catcher.png" alt="" /> Opciones de la plantilla',
      'edit_themes',
      basename(__FILE__),
      'mandigo_options_page'
    );
  }
  function add_mandigo_inserts_page() {
    global $dirs;
    add_theme_page(
      'HTML Inserts',
      '<img src="'. $dirs['www']['images'] .'/attention_catcher.png" alt="" /> HTML Inserts',
      'edit_themes',
      'Inserts',
      'mandigo_inserts_page'
    );
  }
  function add_mandigo_readme_page()  {
    add_theme_page(
      'README',
      'README',
      'switch_themes',
      'README',
      'mandigo_readme_page'
    );
  }

  function add_mandigo_farbtastic_js() {
    global $dirs;
    wp_enqueue_script('jquery',     $dirs['www']['theme'] .'js/jquery.js');
    wp_enqueue_script('farbtastic', $dirs['www']['theme'] .'js/farbtastic.js');
  }

  function add_mandigo_farbtastic_css() {
    global $dirs;
    echo '<link rel="stylesheet" type="text/css" href="'. $dirs['www']['theme'] .'farbtastic.css" />';
  }

  function mandigo_set_var($var,$value) { update_option('mandigo_'. $var, $value); }
  function mandigo_color($value,$default) { 
    if (!preg_match("/^#/",$value)) $value = '#'. $value;
    if (!preg_match("/^#([0-9A-F]{3}){1,2}$/i",$value)) $value = $default;
    return $value;
  }
  function mandigo_escape($string)      {
    $string = str_replace('\\"','&#34;',$string);
    $string = str_replace("\\'",'&#39;',$string);
    return $string;
  }

  function mandigo_options_page() {
    global $dirs, $schemes;

    if ( $_GET['page'] == basename(__FILE__) ) {
      $ct = current_theme_info();

      if (isset($_POST['updated'])) {
        $exclude[] = '';
        foreach ($_POST as $field => $value) {
          if (preg_match("/exclude_(\d+)/",$field,$id)) { $exclude[] = $id[1]; }
        }
        mandigo_set_var('exclude_pages'             ,implode(",",$exclude)          );
        mandigo_set_var('bgcolor'                   ,mandigo_color($_POST['bgcolor']         ,'#44484F'));
        mandigo_set_var('posts_bgcolor'             ,mandigo_color($_POST['posts_bgcolor']   ,'#FAFAFA'));
        mandigo_set_var('posts_bdcolor'             ,mandigo_color($_POST['posts_bdcolor']   ,'#EEEEEE'));
        mandigo_set_var('sidebars_bgcolor'          ,mandigo_color($_POST['sidebars_bgcolor'],'#EEEEEE'));
        mandigo_set_var('sidebars_bdcolor'          ,mandigo_color($_POST['sidebars_bdcolor'],'#DDDDDD'));
        mandigo_set_var('scheme'                    ,$_POST['scheme']               );
        mandigo_set_var('wp'                        ,$_POST['wp']                   );
        mandigo_set_var('scheme_random'             ,$_POST['random']               );
        mandigo_set_var('headoverlay'               ,$_POST['headoverlay']          );
        mandigo_set_var('bold_links'                ,$_POST['boldlinks']            );
        mandigo_set_var('1024'                      ,$_POST['wide']                 );
        mandigo_set_var('nofloat'                   ,$_POST['nofloat']              );
        mandigo_set_var('footer_stats'              ,$_POST['footstats']            );
        mandigo_set_var('nosidebars'                ,($_POST['sidebars'] == 0 ? 1:0));
        mandigo_set_var('3columns'                  ,($_POST['sidebars'] == 2 ? 1:0));
        mandigo_set_var('sidebar1_left'             ,$_POST['sidebar1']             );
        mandigo_set_var('sidebar2_left'             ,$_POST['sidebar2']             );
        mandigo_set_var('always_show_sidebars'      ,$_POST['alwayssidebars']       );
        mandigo_set_var('em_italics'                ,$_POST['em']                   );
        mandigo_set_var('stroke'                    ,$_POST['stroke']               );
        mandigo_set_var('headers_random'            ,$_POST['randomheaders']        );
        mandigo_set_var('slim_header'               ,$_POST['slimheader']           );
        mandigo_set_var('hide_blogname'             ,$_POST['hideblogname']         );
        mandigo_set_var('hide_blogdesc'             ,$_POST['hideblogdesc']         );
        mandigo_set_var('noborder'                  ,$_POST['noborder']             );
        mandigo_set_var('small_title'               ,$_POST['smalltitle']           );
        mandigo_set_var('wp_fixed'                  ,$_POST['wpfixed']              );
        mandigo_set_var('wp_repeat'                 ,$_POST['wprepeat']             );
        mandigo_set_var('wp_position'               ,$_POST['wpposition']           );
        mandigo_set_var('number_comments'           ,$_POST['numbercomments']       );
        mandigo_set_var('full_search_results'       ,$_POST['fullsearchresults']    );
        mandigo_set_var('drop_shadow'               ,$_POST['dropshadow']           );
        mandigo_set_var('author_comments'           ,$_POST['authorcomments']       );
        mandigo_set_var('floatright'                ,$_POST['floatright']           );
        mandigo_set_var('xhtml_comments'            ,$_POST['xhtmlcomments']        );
        mandigo_set_var('nojustify'                 ,$_POST['nojustify']            );
        mandigo_set_var('title_scheme_index'        ,mandigo_escape($_POST['title_scheme_index']   ));
        mandigo_set_var('title_scheme_single'       ,mandigo_escape($_POST['title_scheme_single']  ));
        mandigo_set_var('title_scheme_page'         ,mandigo_escape($_POST['title_scheme_page']    ));
        mandigo_set_var('title_scheme_category'     ,mandigo_escape($_POST['title_scheme_category']));
        mandigo_set_var('title_scheme_date'         ,mandigo_escape($_POST['title_scheme_date']    ));
        mandigo_set_var('title_scheme_search'       ,mandigo_escape($_POST['title_scheme_search']  ));
        mandigo_set_var('tag_blogname'              ,$_POST['tag_blogname']         );
        mandigo_set_var('tag_blogdesc'              ,$_POST['tag_blogdesc']         );
        mandigo_set_var('tag_posttitle_multi'       ,$_POST['tag_posttitle_multi']  );
        mandigo_set_var('tag_posttitle_single'      ,$_POST['tag_posttitle_single'] );
        mandigo_set_var('tag_pagetitle'             ,$_POST['tag_pagetitle']        );
        mandigo_set_var('tag_sidebar'               ,$_POST['tag_sidebar']          );
        mandigo_set_var('tags_after'                ,$_POST['tags_after']           );
        mandigo_set_var('no_animations'             ,$_POST['no_animations']        );
        mandigo_set_var('trackbacks'                ,$_POST['trackbacks']           );
        mandigo_set_var('fixes_comments_1'          ,$_POST['fixes_comments_1']     );
        mandigo_set_var('fixes_comments_2'          ,$_POST['fixes_comments_2']     );
        mandigo_set_var('fixes_whitespace_pre'      ,$_POST['fixes_whitespace_pre'] );
        mandigo_set_var('fixes_touch_content'       ,$_POST['fixes_touch_content']  );
        mandigo_set_var('collapse_posts'            ,$_POST['collapse_posts']       );
        mandigo_set_var('headnav_alignment'         ,$_POST['headnav_alignment']    );
        mandigo_set_var('date_format'               ,$_POST['date_format']          );
      }
      $exclude              = split(",",get_option('mandigo_exclude_pages'));
      $scheme               = get_option('mandigo_scheme'                  );
      $headoverlay          = get_option('mandigo_headoverlay'             );
      $date_format          = get_option('mandigo_date_format'             );
      $sidebar1             = get_option('mandigo_sidebar1_left'           );
      $sidebar2             = get_option('mandigo_sidebar2_left'           );
      $headnav_alignment    = get_option('mandigo_headnav_alignment'       );
      $wp                   = get_option('mandigo_wp'                      );
      $stroke               = get_option('mandigo_stroke'                  );
      $wp_fixed             = get_option('mandigo_wp_fixed'                );
      $wp_repeat            = get_option('mandigo_wp_repeat'               );
      $trackbacks           = get_option('mandigo_trackbacks'              );

      $tag_blogname         = get_option('mandigo_tag_blogname'            );
      $tag_blogdesc         = get_option('mandigo_tag_blogdesc'            );
      $tag_posttitle_multi  = get_option('mandigo_tag_posttitle_multi'     );
      $tag_posttitle_single = get_option('mandigo_tag_posttitle_single'    );
      $tag_pagetitle        = get_option('mandigo_tag_pagetitle'           );
      $tag_sidebar          = get_option('mandigo_tag_sidebar'             );

      $dirs['www']['scheme'] = $dirs['www']['scheme'] . "$scheme/";

      foreach ($schemes as $i) {
	$select_schemes .= '<input type="radio" name="scheme" value="'. $i .'" '. ($scheme == $i ? 'checked="checked"' : '') .' /><img src="'. $dirs['www']['schemes'] . $i .'/preview.jpg" alt="'. $i .'" /> &nbsp;';
      }

      $patternsdir = opendir($dirs['loc']['patterns']);
      $select_patterns = '<option value=""'. (!$wp ? ' selected="selected"' : '') .'>none</option>';
      while (false !== ($i = readdir($patternsdir))) {
        if (preg_match("/\.(?:jpe?g|png|gif|bmp)$/i",$i)) {
          $select_patterns .= '<option value="'. $i .'"'. ($i == $wp ? ' selected="selected"' : '') .'>images/patterns/'. $i .'</option>';
        }
      }

      $pages = &get_pages('sort_column=menu_order');
      foreach ($pages as $i) {
        if (!$i->post_parent) {
          $select_pages .= '<input type="checkbox" name="exclude_'. $i->ID .'"'. (array_search($i->ID, $exclude) ? ' checked' : '') .' /> '. $i->post_title . '<br />';
        }
      }

      echo '
		<p align="center"><a href="#versioncheck">¿Estás usando la última versión?</a> - <a href="http://www.onehertz.com/portfolio/wordpress/donate/" title="Haz un donativo" target="_blank">Si te gusta Mandingo puedes '. (rand(0,1) ? '<strong>hacer un donativo</strong>' : 'hacer un donativo') .'.</a></p>
		<div class="wrap">
		<h2>Opciones de Mandingo</h2>
	
		<form name="mandigo_options_form" method="post" action="?page=functions.php">
		<input type="hidden" name="updated" value="1" />
		<p class="submit"><input type="submit" name="Enviar" value="'.__('Actualizar opciones &raquo;').'"/></p>
		
		<fieldset class="options">
		<legend>Esquemas de Color</legend>
		'.$select_schemes.'
		<br /><br />

		<input type="checkbox" name="random" value="1" ' .(get_option('mandigo_scheme_random') ? 'checked="checked"' : '') .' /> Me gustan todos, cámbialos al azar<br /><br />

		<label><b>Fondo</b></label><br />
		<div id="picker" style="position: absolute; left: 600px;"></div>
		<script type="text/javascript">
			jQuery(document).ready(function() {
				var f = jQuery.farbtastic("#picker");
				jQuery("#picker").hide();
				jQuery(".colorpicker").each(function () { f.linkTo(this); }).focus(function() { f.linkTo(this); jQuery("#picker").fadeIn(); });
			});
			defaultColor = function(e,v) {
				var f = document.forms.mandigo_options_form.eval(e);
				f.value = v;
				f.focus();
			}
		</script>
		<table border="0">
			<tr>
				<td align="right" width="180">Color de Fondo:</td>
				<td>
					<input type="text" name="bgcolor" id="bgcolor" class="colorpicker" value="'. get_option('mandigo_bgcolor') .'" /> <a href="#" onclick="defaultColor(\'bgcolor\',\'#44484F\'); return false;">restaurar original</a>
				</td>
			</tr>
			<tr>
				<td align="right">Patrón de fondo:</td>
				<td>
					<select name="wp">
						'.$select_patterns.'
					</select>
				</td>
			</tr>
			<tr>
				<td align="right">Adjunto :</td>
				<td>
					<input type="radio" name="wpfixed" value="0" '. ($wp_fixed ? '' : 'checked="checked"') .' />deslizante &nbsp; 
					<input type="radio" name="wpfixed" value="1" '. ($wp_fixed ? 'checked="checked"' : '') .' />fijo
				</td>
			</tr>
			<tr>
				<td align="right">Repetir :</td>
				<td>
					<select name="wprepeat">
						<option value="repeat" '.    ($wp_repeat == 'repeat'    ? 'selected="selected"' : '') .'>horizontal y vertical</option>
						<option value="repeat-x" '.  ($wp_repeat == 'repeat-x'  ? 'selected="selected"' : '') .'>solo horizontal</option>
						<option value="repeat-y" '.  ($wp_repeat == 'repeat-y'  ? 'selected="selected"' : '') .'>solo vertical</option>
						<option value="no-repeat" '. ($wp_repeat == 'no-repeat' ? 'selected="selected"' : '') .'>no repetir</option>
					</select>
				</td>
			</tr>
			<tr>
				<td align="right">Posición :</td>
				<td>
					<input type="text" name="wpposition" value="'. get_option('mandigo_wp_position') .'" size="30" /> <a href="http://www.w3.org/TR/CSS21/colors.html#propdef-background-position" target="_blank">ayuda</a>
				</td>
			</tr>
		</table>

		<label><b>Colores</b></label><br />
		<table>
			<tr>
				<td align="right" width="180">Color de fondo de entradas :</td>
				<td><input type="text" name="posts_bgcolor" id="posts_bgcolor" class="colorpicker" value="'. get_option('mandigo_posts_bgcolor') .'" /> <a href="#" onclick="defaultColor(\'posts_bgcolor\',\'#FAFAFA\'); return false;">restaurar original</a></td>
			</tr>
			<tr>
				<td align="right">Color de borde de entradas :</td>
				<td><input type="text" name="posts_bdcolor" id="posts_bdcolor" class="colorpicker" value="'. get_option('mandigo_posts_bdcolor') .'" /> <a href="#" onclick="defaultColor(\'posts_bdcolor\',\'#EEEEEE\'); return false;">restaurar original</a></td>
			</tr>
			<tr>
				<td align="right">Color de fondo de sidebars :</td>
				<td><input type="text" name="sidebars_bgcolor" id="sidebars_bgcolor" class="colorpicker" value="'. get_option('mandigo_sidebars_bgcolor') .'" /> <a href="#" onclick="defaultColor(\'sidebars_bgcolor\',\'#EEEEEE\'); return false;">restaurar original</a></td>
			</tr>
			<tr>
				<td align="right">Color de borde de sidebars :</td>
				<td><input type="text" name="sidebars_bdcolor" id="sidebars_bdcolor" class="colorpicker" value="'. get_option('mandigo_sidebars_bdcolor') .'" /> <a href="#" onclick="defaultColor(\'sidebars_bdcolor\',\'#DDDDDD\'); return false;">restaurar original</a></td>
			</tr>
		</table>
		</fieldset>

		<br/>

		<fieldset class="options">
		<legend>Opciones de Plantilla</legend>
		<input type="checkbox" name="wide" '. (get_option('mandigo_1024') ? 'checked="checked"' : '') .' /> Usar el tema de 1024px en vez del original de 800px<br />
		<input type="checkbox" name="alwayssidebars" '. (get_option('mandigo_always_show_sidebars') ? 'checked="checked"' : '') .' /> Mostrar barras laterales incluso en vista de entrada<br />

		Columnas: <select name="sidebars">
				<option value="0" '.  (get_option('mandigo_nosidebars') ? 'selected="selected"' : '') .'>1 columna (sin barras laterales)</option>
				<option value="1" '.  (!get_option('mandigo_nosidebars') && !get_option('mandigo_3columns') ? 'selected="selected"' : '') .'>2 columnas (1 barra lateral, default)</option>
				<option value="2" '.  (get_option('mandigo_3columns') ? 'selected="selected"' : '') .'>3 columnas (2 barras laterales, debes elegir 1024px)</option>
		</select><br /><br />

		<label><b>Posición de barras laterales</b></label><br/>
		<table border="0">
			<tr>
				<td align="right">Primera barra lateral :</td>
				<td>
					<input type="radio" name="sidebar1" value="1"  '. ($sidebar1 ? 'checked="checked"' : '') .' />izquierda &nbsp; 
					<input type="radio" name="sidebar1" value="0"  '. ($sidebar1 ? '' : 'checked="checked"') .' />derecha
				</td>
			</tr>
			<tr>
				<td align="right">Segunda barra lateral :</td>
				<td>
					<input type="radio" name="sidebar2" value="1"  '. ($sidebar2 ? 'checked="checked"' : '') .' />izquierda &nbsp; 
					<input type="radio" name="sidebar2" value="0"  '. ($sidebar2 ? '' : 'checked="checked"') .' />derecha
				</td>
			</tr>
		</table>
		</fieldset>

		<br/>

		<fieldset class="options">
		<legend>Cabecera</legend>
		<input type="checkbox" name="slimheader" '. (get_option('mandigo_slim_header') ? 'checked="checked"' : '') .' /> Usar cabecera estrecha (100px mas pequeña)<br />
		<input type="checkbox" name="randomheaders" '. (get_option('mandigo_headers_random') ? 'checked="checked"' : '') .' /> Usar imágenes al azar de la carpeta images/headers/<br />
		<cite>También es posible usar una imagen diferente en cada página (imágenes de cabecera por página). Consulta la página <a href="themes.php?page=README">README</a> para mas información.</cite><br /><br />

		<label><b>Nombre y Descripción del Blog</b></label><br />
		<input type="checkbox" name="smalltitle" '. (get_option('mandigo_small_title') ? 'checked="checked"' : '') .' /> Reducir tamaño de fuente para el nombre del blog (útil para títulos muy largos)<br /> 
		<input type="checkbox" name="hideblogname" '. (get_option('mandigo_hide_blogname') ? 'checked="checked"' : '') .' /> No mostrar el nombre del blog<br /> 
		<input type="checkbox" name="hideblogdesc" '. (get_option('mandigo_hide_blogdesc') ? 'checked="checked"' : '') .' /> No mostrar la etiqueta (descripción del blog)<br />
		<input type="checkbox" name="dropshadow" '. (get_option('mandigo_drop_shadow') ? 'checked="checked"' : '') .' /> Añadir sombra al nombre y descripción del blog<br /><br />
                Añadir un perfilado negro al nombre y descripción para mayor legibilidad sobre imágenes de cabecera claras:<br/><br/>
		<input type="radio" name="stroke" value="0"  '. ($stroke ? '' : 'checked="checked"') .' /><img src="'. get_bloginfo('template_directory') .'/option-stroke-off.jpg" alt="off" /> &nbsp; 
		<input type="radio" name="stroke" value="1"  '. ($stroke ? 'checked="checked"' : '') .' /><img src="'. get_bloginfo('template_directory') .'/option-stroke-on.jpg"  alt="on"  /><br /><br />

		<label><b>Navegación</b></label><br />
		Posición de la barra de navegación : <select name="headnav_alignment">
			<option value="left" '.   ($headnav_alignment == 'left'   ? 'selected="selected"' : '') .'>izquierda</option>
			<option value="center" '. ($headnav_alignment == 'center' ? 'selected="selected"' : '') .'>centro</option>
			<option value="right" '.  ($headnav_alignment == 'right'  ? 'selected="selected"' : '') .'>derecha</option>
		</select><br /><br />
                Aplicar una tira negra translúcida a la navegación de la cabecera para mayor legibilidad sobre fondos claros:<br/><br/>
		<input type="radio" name="headoverlay" value="0"  '. ($headoverlay ? '' : 'checked="checked"') .' /><img src="'. get_bloginfo('template_directory') .'/option-headoverlay-off.jpg" alt="off" /> &nbsp; 
		<input type="radio" name="headoverlay" value="1"  '. ($headoverlay ? 'checked="checked"' : '') .' /><img src="'. get_bloginfo('template_directory') .'/option-headoverlay-on.jpg"  alt="on"  /><br /><br />

		<label><b>Páginas a excluir de la navegación de la cabecera</b></label><br />
		'. $select_pages .'<br />
		</fieldset>

		<br/>

		<fieldset class="options">
		<legend>Entradas</legend>
		<input type="checkbox" name="collapse_posts" '. (get_option('mandigo_collapse_posts') ? 'checked="checked"' : '') .' /> Pliega automáticamente las entradas en archivo y categorías<br />
		<input type="checkbox" name="tags_after" '. (get_option('mandigo_tags_after') ? 'checked="checked"' : '') .' /> Mostrar tags después del contenido en vez de junto a las categorías (WP2.3+)<br />
		<input type="checkbox" name="nojustify" '. (get_option('mandigo_nojustify') ? 'checked="checked"' : '') .' /> Alinear el contenido a la izquierda en vez de usar el justificado completo<br />
		<input type="checkbox" name="em" '. (get_option('mandigo_em_italics') ? 'checked="checked"' : '') .' /> Mostrar tags &lt;em&gt; como cursiva<br /><br />

		<label><b>Formato de Fecha</b></label><br/>
		<select name="date_format">
			<option value="dmY" '. ($date_format == 'dmY'   ? 'selected="selected"' : '') .'>dd/mm/yyyy</option>
			<option value="MdY" '. ($date_format == 'MdY' ? 'selected="selected"' : '') .'>mes/dd/yyyy</option>
		</select><br /><br />
		</fieldset>

		<br/>

		<fieldset class="options">
		<legend>Comentarios</legend>
		<input type="checkbox" name="authorcomments" '. (get_option('mandigo_author_comments') ? 'checked="checked"' : '') .' /> Resalta los comentarios hechos por el autor de la entrada<br />
		<input type="checkbox" name="numbercomments" '. (get_option('mandigo_number_comments') ? 'checked="checked"' : '') .' /> Numerar comentarios<br />
		<input type="checkbox" name="xhtmlcomments" '. (get_option('mandigo_xhtml_comments') ? 'checked="checked"' : '') .' /> Mostrar los códigos XHTML permitidos<br />
		Mostrar trackbacks: <select name="trackbacks">
				<option value="along" '.  ($trackbacks == 'along' ? 'selected="selected"' : '') .'>con los comentarios, en orden cronológico</option>
				<option value="above" '.  ($trackbacks == 'above' ? 'selected="selected"' : '') .'>antes de los comentarios</option>
				<option value="below" '.  ($trackbacks == 'below' ? 'selected="selected"' : '') .'>después de los comentarios</option>
				<option value="none"  '.  ($trackbacks == 'none'  ? 'selected="selected"' : '') .'>no mostrar los trackbacks</option>
		</select><br /><br />
		</fieldset>

		<br/>
	
		<fieldset class="options">
		<legend>Opciones SEO</legend>

		<label><b>Etiquetas &lt;title&gt; personalizadas</b></label><br/>
		Personaliza la etiqueta de título. Consulta la página <a href="themes.php?page=README">README</a> para ver la lista de las variables disponibles.
		<table>
			<tr>
				<td style="text-align: right;">Principal (index.php):</td>
				<td><input type="text" name="title_scheme_index" size="60" value="'. get_option('mandigo_title_scheme_index') .'" /></td>
			</tr>
			<tr>
				<td style="text-align: right;">Entradas (single.php):</td>
				<td><input type="text" name="title_scheme_single" size="60" value="'. get_option('mandigo_title_scheme_single') .'" /></td>
			</tr>
			<tr>
				<td style="text-align: right;">Páginas (page.php):</td>
				<td><input type="text" name="title_scheme_page" size="60" value="'. get_option('mandigo_title_scheme_page') .'" /></td>
			</tr>
			<tr>
				<td style="text-align: right;">Archivo por categorías (archive.php):</td>
				<td><input type="text" name="title_scheme_category" size="60" value="'. get_option('mandigo_title_scheme_category') .'" /></td>
			</tr>
			<tr>
				<td style="text-align: right;">Archivo por fechas (archive.php):</td>
				<td><input type="text" name="title_scheme_date" size="60" value="'. get_option('mandigo_title_scheme_date') .'" /></td>
			</tr>
			<tr>
				<td style="text-align: right;">Resultados de búsqueda (search.php):</td>
				<td><input type="text" name="title_scheme_search" size="60" value="'. get_option('mandigo_title_scheme_search') .'" /></td>
			</tr>
		</table><br />

		<label><b>Niveles de cabecera personalizados</b></label><br/>
		Personaliza que códigos quieres usar para el nombre del blog, descripción, título de entrada, … Esto no afecta a los estilos.
		<table>
			<tr>
				<td style="text-align: right;">Nombre del Blog:</td>
				<td>
					<select name="tag_blogname">
						<option value="h1"'. ($tag_blogname == 'h1' ? ' selected="selected"' : '') .'>h1</option>
						<option value="h2"'. ($tag_blogname == 'h2' ? ' selected="selected"' : '') .'>h2</option>
						<option value="h3"'. ($tag_blogname == 'h3' ? ' selected="selected"' : '') .'>h3</option>
						<option value="h4"'. ($tag_blogname == 'h4' ? ' selected="selected"' : '') .'>h4</option>
						<option value="h5"'. ($tag_blogname == 'h5' ? ' selected="selected"' : '') .'>h5</option>
						<option value="h6"'. ($tag_blogname == 'h6' ? ' selected="selected"' : '') .'>h6</option>
						<option value="div"'. ($tag_blogname == 'div' ? ' selected="selected"' : '') .'>div</option>
					</select>
				</td>
			</tr>
			<tr>
				<td style="text-align: right;">Descripción del Blog (tagline):</td>
				<td>
					<select name="tag_blogdesc">
						<option value="h1"'. ($tag_blogdesc == 'h1' ? ' selected="selected"' : '') .'>h1</option>
						<option value="h2"'. ($tag_blogdesc == 'h2' ? ' selected="selected"' : '') .'>h2</option>
						<option value="h3"'. ($tag_blogdesc == 'h3' ? ' selected="selected"' : '') .'>h3</option>
						<option value="h4"'. ($tag_blogdesc == 'h4' ? ' selected="selected"' : '') .'>h4</option>
						<option value="h5"'. ($tag_blogdesc == 'h5' ? ' selected="selected"' : '') .'>h5</option>
						<option value="h6"'. ($tag_blogdesc == 'h6' ? ' selected="selected"' : '') .'>h6</option>
						<option value="div"'. ($tag_blogdesc == 'div' ? ' selected="selected"' : '') .'>div</option>
					</select>
				</td>
			</tr>
			<tr>
				<td style="text-align: right;">Título de Entrada (cuando se muestran varias entradas):</td>
				<td>
					<select name="tag_posttitle_multi">
						<option value="h1"'. ($tag_posttitle_multi == 'h1' ? ' selected="selected"' : '') .'>h1</option>
						<option value="h2"'. ($tag_posttitle_multi == 'h2' ? ' selected="selected"' : '') .'>h2</option>
						<option value="h3"'. ($tag_posttitle_multi == 'h3' ? ' selected="selected"' : '') .'>h3</option>
						<option value="h4"'. ($tag_posttitle_multi == 'h4' ? ' selected="selected"' : '') .'>h4</option>
						<option value="h5"'. ($tag_posttitle_multi == 'h5' ? ' selected="selected"' : '') .'>h5</option>
						<option value="h6"'. ($tag_posttitle_multi == 'h6' ? ' selected="selected"' : '') .'>h6</option>
						<option value="div"'. ($tag_posttitle_multi == 'div' ? ' selected="selected"' : '') .'>div</option>
					</select>
				</td>
			</tr>
			<tr>
				<td style="text-align: right;">Título de Entrada (en vista de entrada):</td>
				<td>
					<select name="tag_posttitle_single">
						<option value="h1"'. ($tag_posttitle_single == 'h1' ? ' selected="selected"' : '') .'>h1</option>
						<option value="h2"'. ($tag_posttitle_single == 'h2' ? ' selected="selected"' : '') .'>h2</option>
						<option value="h3"'. ($tag_posttitle_single == 'h3' ? ' selected="selected"' : '') .'>h3</option>
						<option value="h4"'. ($tag_posttitle_single == 'h4' ? ' selected="selected"' : '') .'>h4</option>
						<option value="h5"'. ($tag_posttitle_single == 'h5' ? ' selected="selected"' : '') .'>h5</option>
						<option value="h6"'. ($tag_posttitle_single == 'h6' ? ' selected="selected"' : '') .'>h6</option>
						<option value="div"'. ($tag_posttitle_single == 'div' ? ' selected="selected"' : '') .'>div</option>
					</select>
				</td>
			</tr>
			<tr>
				<td style="text-align: right;">Título de Página (\'Archivo\', \'Resultados de Búsqueda\'):</td>
				<td>
					<select name="tag_pagetitle">
						<option value="h1"'. ($tag_pagetitle == 'h1' ? ' selected="selected"' : '') .'>h1</option>
						<option value="h2"'. ($tag_pagetitle == 'h2' ? ' selected="selected"' : '') .'>h2</option>
						<option value="h3"'. ($tag_pagetitle == 'h3' ? ' selected="selected"' : '') .'>h3</option>
						<option value="h4"'. ($tag_pagetitle == 'h4' ? ' selected="selected"' : '') .'>h4</option>
						<option value="h5"'. ($tag_pagetitle == 'h5' ? ' selected="selected"' : '') .'>h5</option>
						<option value="h6"'. ($tag_pagetitle == 'h6' ? ' selected="selected"' : '') .'>h6</option>
						<option value="div"'. ($tag_pagetitle == 'div' ? ' selected="selected"' : '') .'>div</option>
					</select>
				</td>
			</tr>
			<tr>
				<td style="text-align: right;">Título de Widget:</td>
				<td>
					<select name="tag_sidebar">
						<option value="h1"'. ($tag_sidebar == 'h1' ? ' selected="selected"' : '') .'>h1</option>
						<option value="h2"'. ($tag_sidebar == 'h2' ? ' selected="selected"' : '') .'>h2</option>
						<option value="h3"'. ($tag_sidebar == 'h3' ? ' selected="selected"' : '') .'>h3</option>
						<option value="h4"'. ($tag_sidebar == 'h4' ? ' selected="selected"' : '') .'>h4</option>
						<option value="h5"'. ($tag_sidebar == 'h5' ? ' selected="selected"' : '') .'>h5</option>
						<option value="h6"'. ($tag_sidebar == 'h6' ? ' selected="selected"' : '') .'>h6</option>
						<option value="div"'. ($tag_sidebar == 'div' ? ' selected="selected"' : '') .'>div</option>
					</select>
				</td>
			</tr>
		</table>
		</fieldset>

		<br/>

		<fieldset class="options">
		<legend>Ajustes de Plantilla</legend>
		Puede que quieras experimentar con estas opciones si tienes problemas con columnas que se muestran mas anchs de lo que deberían:<br />
		<input type="checkbox" name="fixes_whitespace_pre" '. (get_option('mandigo_fixes_whitespace_pre') ? 'checked="checked"' : '') .' /> Ajustar elementos que usen un estilo "white-space: pre" (evita el bordeado de líneas en IE)<br />
		<input type="checkbox" name="fixes_comments_1" '. (get_option('mandigo_fixes_comments_1') ? 'checked="checked"' : '') .' /> Cortar urls largas en comentarios de usuarios en las barras (inserta  saltos de línea en los /\')<br />
		<input type="checkbox" name="fixes_comments_2" '. (get_option('mandigo_fixes_comments_2') ? 'checked="checked"' : '') .' /> Sustituir urls largas en comentarios de usuarios con "enlace"<br />
		<input type="checkbox" name="fixes_touch_content" '. (get_option('mandigo_fixes_touch_content') ? 'checked="checked"' : '') .' /> Forzar al navegador a volver a mostrar el contenido de columnas<br />
		</fieldset>

		<br/>

		<fieldset class="options">
		<legend>Mas Opciones</legend>

		<label><b>Images</b></label><br/>
		<input type="checkbox" name="nofloat" '. (get_option('mandigo_nofloat') ? 'checked="checked"' : '') .' /> No envolver texto alrededor de las imágenes<br />
		<input type="checkbox" name="floatright" '. (get_option('mandigo_floatright') ? 'checked="checked"' : '') .' /> Flotar imágenes a la derecha (requiere envolver texto)<br />
		<input type="checkbox" name="noborder" '. (get_option('mandigo_noborder') ? 'checked="checked"' : '') .' /> Mostrar imágenes sin bordes<br /><br />
					
		<label><b>Animaciones</b></label><br/>
		<input type="checkbox" name="no_animations" '. (get_option('mandigo_no_animations') ? 'checked="checked"' : '') .' /> Inhabilitar las animaciones js (también quita los botones mostrar/ocultar de las entradas)<br /><br />
					
		<label><b>Legibilidad</b></label><br/>
		<input type="checkbox" name="boldlinks" '. (get_option('mandigo_bold_links') ? 'checked="checked"' : '') .' /> Mostrar todos los enlaces en negrita para una legibilidad mejor<br /><br />
					
		<label><b>Aún mas Opciones</b></label><br/>
		<input type="checkbox" name="fullsearchresults" '. (get_option('mandigo_full_search_results') ? 'checked="checked"' : '') .' /> Mostrar resultados de búsqueda completos, no solo títulos y metadatos<br />
		<input type="checkbox" name="footstats" '. (get_option('mandigo_footer_stats') ? 'checked="checked"' : '') .' /> Mostrar el tiempo de carga y estadísticas SQL en el pié de página<br />
		</fieldset>

		<p class="submit"><input type="submit" name="Enviar" value="'.__('Actualizar opciones &raquo;').'"/></p>
		</form>

		</div>

		<div id="versioncheck" class="wrap">
		<h2>Comprobador de Versión</h2>
		<iframe src="http://www.onehertz.com/cgi-bin/wordpress:versioncheck.pl?theme=Mandigo&amp;version='. trim($ct->version) .'" width="100%" height="90" scrolling="auto" frameborder="0"></iframe>
		</div>

		<div id="preview" class="wrap">
		<h2 id="preview-post">Vista Previa (se actualiza cuando se guardan las opciones)</h2>
		<iframe src="../?preview=true" width="100%" height="600" ></iframe>
		</div>';
    }	
  }



  function mandigo_set_insert($key,$value)  { update_option('mandigo_inserts_'.$key,str_replace("\\","",$value)); }
  function mandigo_inserts_page() {
    if (isset($_POST['updated'])) {
      mandigo_set_insert('header',$_POST['header']);
      mandigo_set_insert('body'  ,$_POST['body']  );
      mandigo_set_insert('top'   ,$_POST['top']   );
      mandigo_set_insert('footer',$_POST['footer']);
    }

    echo '
		<div class="wrap">
		<h2>Opciones de Mandingo</h2>
		
		<form name="mandigo_options_form" method="post" action="?page=Inserts">
		<input type="hidden" name="updated" value="1" />
		
		<p class="submit"><input type="submit" name="Enviar" value="'.__('Actualizar inserts &raquo;').'"/></p>

		<fieldset class="options">
		<legend>HTML Inserts</legend>

		<p>The fields on this page allow you to save pieces of code required by third-party plugins and widgets. You can also use them to save Google Maps/Analytics/AdSense javascript snippets, or whatever you want. This way you will never have to insert code manually each time you update Mandigo.</p>

		<p>NO validation is made on the field values, so be careful not to paste invalid code. Also note that backslashes will be stripped.</p>

		<label><b>header.php</b></label><br/>
                right before &lt;/HEAD&gt; (<i>useful for links to external stylesheets, javascript files, or inline CSS</i>):<br />
		<textarea name="header" rows=7 style="width: 100%">'. str_replace("\\","",get_option('mandigo_inserts_header')) .'</textarea><br /><br />

                custom &lt;BODY&gt; tag (<i>useful for onload actions</i>):<br />
		<textarea name="body" rows=1 style="width: 100%">'. str_replace("\\","",get_option('mandigo_inserts_body')) .'</textarea><br /><br />

                right before the content and sidebars area. This differs from the top widget container in that it displays on all pages, and it spans the whole layout width.<br />
		<textarea name="top" rows=7 style="width: 100%">'. str_replace("\\","",get_option('mandigo_inserts_top')) .'</textarea><br /><br />

		<label><b>footer.php</b></label><br/>
                before the "Powered by WordPress" credits, still inside the #main div. This differs from the bottom widget container in that it displays on all pages, and it spans the whole layout width.<br />
		<textarea name="footer" rows=7 style="width: 100%">'. str_replace("\\","",get_option('mandigo_inserts_footer')) .'</textarea>
		</fieldset>
					
		<p class="submit"><input type="submit" name="Enviar" value="'.__('Actualizar inserts &raquo;').'"/></p>
		</form>
		</div>';
  }



  function mandigo_readme_page() {
    echo '<div class="wrap">';
    echo '<pre>';
    echo htmlspecialchars(file_get_contents(TEMPLATEPATH.'/README.txt'));
    echo '</pre>';
    echo '</div>';
  }
?>
