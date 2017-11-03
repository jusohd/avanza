<?php
// General Settings
$current = '1.217';

function unnamed_fontcolor() {
	$color = get_option('unnamed_fontcolor');
	if (get_option('unnamed_fontcolor') == '')	return '#333333';
	return $color;
}

function unnamed_linkcolor() {
	$linkcolor = get_option('unnamed_linkcolor');
	if (get_option('unnamed_linkcolor') == '')	return '#5D8BB3';
	return $linkcolor;
}

function unnamed_hovercolor() {
	$hovercolor = get_option('unnamed_hovercolor');
	if (get_option('unnamed_hovercolor') == '') return '#3465A4';
	return $hovercolor;
}

function unnamed_contentcolor() {
	$hovercolor = get_option('unnamed_contentcolor');
	if (get_option('unnamed_contentcolor') == '') return '#FFFFFF';
	return $hovercolor;
}

function unnamed_bgcolor() {
	$bgcolor = get_option('unnamed_bgcolor');
	if (get_option('unnamed_bgcolor') == '') return '#EBEBEB';
	return $bgcolor;
}

function unnamed_bgimage() {
	$bgimage = 'url('.get_bloginfo('template_url') . '/images/backgrounds/' . get_option('unnamed_bg_image').') '. get_option('unnamed_bg_repeat'). ' center top';
	if (get_option('unnamed_bg_image') == '') return '';
	return $bgimage;
}
?>
<?php
class UnnamedOptions {

	function unnamed_init() {
		// Load the localisation text
		load_theme_textdomain('unnamed');
		// Function for Sidebar Widgets
		if (function_exists('register_sidebar')) { register_sidebars(3,array('before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>','before_title' => '<h2 class="widgettitle">','after_title' => '</h2>')); }
		//Check installation
		global $current;
		if (!get_option('unnamed_installed') || get_option('unnamed_installed') <= $current) { UnnamedOptions::unnamed_install(); }
		// Add menus
		add_action('admin_menu',array('UnnamedOptions','unnamed_add_menu'));
	}
	
	function unnamed_add_menu() {
		// Add the submenus
		$page = add_theme_page(__('Configurar Tu Mismo','unnamed'), __('Configurar Tu Mismo','unnamed'), 'edit_themes', 'unnamed-options', 'unnamed_admin');
		// Check if this page is the one being shown,if so then add stuff to the header
		add_action("admin_head-$page",array('UnnamedFunctions','unnamed_admin_css'));
		add_action("admin_print_scripts-$page",array('UnnamedFunctions','unnamed_admin_js'));
	}

	// install unnamed
	function unnamed_install() {
		global $current;
		// Add / update the version number
		if (!get_option('unnamed_installed')) {
			add_option('unnamed_installed',$curent);
		} else {
			update_option('unnamed_installed',$current);
		}
		add_option('unnamed_bg_image','');
		add_option('unnamed_bg_repeat','');
		add_option('unnamed_layout','1');
		add_option('unnamed_scriptloader','0');
		add_option('unnamed_livesearch','1'); 
		add_option('unnamed_shelf','1'); 
		add_option('unnamed_ajaxcommenting','1');
		add_option('unnamed_showsidebarpage','1');
		add_option('unnamed_showsidebarsingle','1');
		add_option('unnamed_showsidebarcat','1');
		add_option('unnamed_dropmenu','1');
	}
	
	// update options
	function unnamed_update() {
		if (!empty($_POST)) {
			if (isset($_POST['bg_file'])) {
				update_option('unnamed_bg_image',$_POST['bg_file']);
				wp_cache_flush();
			}
			if (isset($_POST['bg_repeat'])) {
				update_option('unnamed_bg_repeat',$_POST['bg_repeat']);
			}
			if ( isset($_POST['layout']) ) {
				update_option('unnamed_layout',$_POST['layout']);
			}
			if (isset($_POST['scriptloader'])) {
				update_option('unnamed_scriptloader','1');
			} else {
				update_option('unnamed_scriptloader','0');
			}
			if (isset($_POST['livesearch'])) {
				update_option('unnamed_livesearch','1');
			} else {
				update_option('unnamed_livesearch','0');
			}
			if (isset($_POST['shelf'])) {
				update_option('unnamed_shelf','1');
			} else {
				update_option('unnamed_shelf','0');
			}
			if (isset($_POST['ajaxcommenting'])) {
				update_option('unnamed_ajaxcommenting','1');
			} else {
				update_option('unnamed_ajaxcommenting','0');
			}
			if (isset($_POST['showsidebarpage'])) {
				update_option('unnamed_showsidebarpage','1');
			} else {
				update_option('unnamed_showsidebarpage','0');
			}
			if (isset($_POST['showsidebarsingle'])) {
				update_option('unnamed_showsidebarsingle','1');
			} else {
				update_option('unnamed_showsidebarsingle','0');
			}
			if (isset($_POST['showsidebarcat'])) {
				update_option('unnamed_showsidebarcat','1');
			} else {
				update_option('unnamed_showsidebarcat','0');
			}
			if (isset($_POST['dropmenu'])) {
				update_option('unnamed_dropmenu','1');
			} else {
				update_option('unnamed_dropmenu','0');
			}
			if (isset($_POST['headerheight'])) { 
				update_option('unnamed_headerheight',$_POST['headerheight']); 
			}
			if (isset($_POST['headerwidth'])) { 
				update_option('unnamed_headerwidth',$_POST['headerwidth']); 
			}
			if (isset($_POST['fontcolor'])) { 
				update_option('unnamed_fontcolor',$_POST['fontcolor']); 
			}
			if (isset($_POST['linkcolor'])) { 
				update_option('unnamed_linkcolor',$_POST['linkcolor']); 
			}
			if (isset($_POST['hovercolor'])) { 
				update_option('unnamed_hovercolor',$_POST['hovercolor']); 
			}
			if (isset($_POST['bgcolor'])) { 
				update_option('unnamed_bgcolor',$_POST['bgcolor']); 
			}
			if (isset($_POST['contentcolor'])) { 
				update_option('unnamed_contentcolor',$_POST['contentcolor']); 
			}
			if (isset($_POST['rss'])) { 
				update_option('unnamed_rss',$_POST['rss']); 
			}
			if (isset($_POST['hidepages'])) { 
				update_option('unnamed_hidepages',$_POST['hidepages']); 
			}
			if (isset($_POST['uninstall'])) {
				UnnamedOptions::unnamed_uninstall();
			}
		}
	}

	// uninstall unnamed
	function unnamed_uninstall() {
		global $wpdb;
		// Remove the options from the database
		$cleanup = $wpdb->query("DELETE FROM $wpdb->options WHERE option_name LIKE 'unnamed%'");
		// Flush the dang cache
		wp_cache_flush();
		// Activate the default Wordpress theme
		update_option('template', 'default');
		update_option('stylesheet', 'default');
		do_action('switch_theme', 'Default');
		// Go back to the themes page
		// header('Location: themes.php');
		echo '<meta http-equiv="refresh" content="0;URL=themes.php?activated=true">';
		echo "<script> self.location(\"themes.php?activated=true\");</script>";
		exit;
	}
}
?>
<?php
class UnnamedFunctions {
	
	//I get Files scan functions from K2
	function files_scan($path,$ext = false,$depth = 1,$relative = true) {
		$files = array();
		// Scan for all matching files
		UnnamedFunctions::_files_scan($path,'',$ext,$depth,$relative,$files);
		return $files;
	}

	function _files_scan($base_path,$path,$ext,$depth,$relative,&$files) {
		if (!empty($ext)) {
			if (!is_array($ext)) {
				$ext = array($ext);
			}
			$ext_match = implode('|',$ext);
		}

		// Open the directory
		if(($dir = @dir($base_path . $path)) !== false) {
			// Get all the files
			while(($file = $dir->read()) !== false) {
				// Construct an absolute & relative file path
				$file_path = $path . $file;
				$file_full_path = $base_path . $file_path;
				// If this is a directory,and the depth of scan is greater than 1 then scan it
				if(is_dir($file_full_path) and $depth > 1 and !($file == '.' or $file == '..')) {
					UnnamedFunctions::_files_scan($base_path,$file_path . '/',$ext,$depth - 1,$relative,$files);
				// If this is a matching file then add it to the list
				} elseif(is_file($file_full_path) and (empty($ext) or preg_match('/\.(' . $ext_match . ')$/i',$file))) {
					$files[] = $relative ? $file_path : $file_full_path;
				}
			}
			// Close the directory
			$dir->close();
		}
	}

	function unnamed_admin_js() { // Color Picker from WordPress Default 1.6
?>
<script type="text/javascript" src="../wp-includes/js/colorpicker.js"></script>
<script type='text/javascript'>
// <![CDATA[
function pickColor(color) {
	ColorPicker_targetInput.value = color;
	colorUpdate(ColorPicker_targetInput.id);
}
function PopupWindow_populate(contents) {
	contents += '<br /><p style="text-align:center;margin-top:0px;"><input type="button" value="<?php _e('Close Color Picker','unnamed') ?>" onclick="cp.hidePopup(\'prettyplease\')"></input></p>';
	this.contents = contents;
	this.populated = false;
}
function PopupWindow_hidePopup(magicword) {
	if (magicword != 'prettyplease')
		return false;
	if (this.divName != null) {
		if (this.use_gebi) {
			document.getElementById(this.divName).style.visibility = "hidden";
		}
		else if (this.use_css) {
			document.all[this.divName].style.visibility = "hidden";
		}
		else if (this.use_layers) {
			document.layers[this.divName].visibility = "hidden";
		}
	}
	else {
		if (this.popupWindow && !this.popupWindow.closed) {
			this.popupWindow.close();
			this.popupWindow = null;
		}
	}
	return false;
}
function colorSelect(t,p) {
	if (cp.p == p && document.getElementById(cp.divName).style.visibility != "hidden")
		cp.hidePopup('prettyplease');
	else {
		cp.p = p;
		cp.select(t,p);
	}
}
var cp = new ColorPicker();
function advUpdate(val,obj) {
	document.getElementById(obj).value = val;
	colorUpdate(obj);
}
function colorUpdate(oid) {
	if ('fontcolor' == oid) {
		document.getElementById('unnamedfontcolor').style.color = document.getElementById('fontcolor').value;
		document.getElementById('advfontcolor').value = document.getElementById('fontcolor').value;
	}
	
	if ('linkcolor' == oid) {
		document.getElementById('unnamedlinkcolor').style.color = document.getElementById('linkcolor').value;
		document.getElementById('advlinkcolor').value = document.getElementById('linkcolor').value;
	}
	
	if ('hovercolor' == oid) {
		document.getElementById('unnamedhovercolor').style.color = document.getElementById('hovercolor').value;
		document.getElementById('advhovercolor').value = document.getElementById('hovercolor').value;
	}
	
	if ('bgcolor' == oid) {
		document.getElementById('unnamedbgcolor').style.background = document.getElementById('bgcolor').value;
		document.getElementById('advbgcolor').value = document.getElementById('bgcolor').value;
	}
	
	if ('contentcolor' == oid) {
		document.getElementById('unnamedcontentcolor').style.background = document.getElementById('contentcolor').value;
		document.getElementById('advcontentcolor').value = document.getElementById('contentcolor').value;
	}
}
function toggleAdvanced() {
	a = document.getElementById('advanced');
	if (a.style.display == 'none')
		a.style.display = 'block';
	else
		a.style.display = 'none';
}
function toggleStyle() {
	m = document.getElementById('togglestyle');
	if (m.style.display == 'none')
		m.style.display = 'block';
	else
		m.style.display = 'none';
}
function colorDefaults() {
	document.getElementById('unnamedfontcolor').style.color = '#333333';
	document.getElementById('unnamedlinkcolor').style.color = '#5D8BB3';
	document.getElementById('unnamedhovercolor').style.color = '#3465A4';
	document.getElementById('unnamedbgcolor').style.background = '#EBEBEB';
	document.getElementById('unnamedcontentcolor').style.background = '#FFFFFF';
	document.getElementById('advfontcolor').value = document.getElementById('fontcolor').value = '#333333';
	document.getElementById('advlinkcolor').value = document.getElementById('linkcolor').value = '#5D8BB3';
	document.getElementById('advhovercolor').value = document.getElementById('hovercolor').value = '#3465A4';
	document.getElementById('advbgcolor').value = document.getElementById('bgcolor').value = '#EBEBEB';
	document.getElementById('advcontentcolor').value = document.getElementById('contentcolor').value = '#FFFFFF';
}
// ]]>
</script>
<?php } function unnamed_admin_css() { ?>
<style type="text/css">	
body {font:62.5% "Lucida Grande", Segoe UI, Verdana, Arial, sans-serif;}
h2 {font:2.4em Georgia, "Times New Roman", Times, serif;border:0;margin:5px 0 !important;}
h3 {font:1.8em Georgia, "Times New Roman", Times, serif;margin:5px 0;color:#333333;}
h4 {font:1.5em Georgia, "Times New Roman", Times, serif;margin:5px 0 0;color:#333333;}
small {color:#777;font-size:.9em;}
.wrap {font-size:1.2em;}
.unnamedcontainer {width:800px;margin:0 auto;text-align:left;color:#333333;}
.unnamedcontainer p {margin:4px 0 0;padding:0;}
.unnamedcontainer input[type=checkbox],.unnamedcontainer input[type=radio] {border:0;}
.unnamedoptions {clear:both;width:780px;margin:0 0 20px;padding:10px;border:1px solid #ccc;}
.floatleft {float:left;width:350px;padding:0 5px;margin:5px;}
#layout1 {float:left;margin:10px 24px 10px 0;height:87px;width:87px;background:url(<?php bloginfo('template_directory'); ?>/images/admin/bg_admin_layout1.png) top center no-repeat;}
#layout2 {float:left;margin:10px 0 10px 24px;height:87px;width:87px;background:url(<?php bloginfo('template_directory'); ?>/images/admin/bg_admin_layout2.png) top center no-repeat;}
#bg_file {width:300px;}
#bg_file,#bg_repeat {margin:10px 15px 0 0;padding:3px;font-size:.9em;}
#admin-content {height:50px;width:390px;margin:0 100px;background:url(<?php bloginfo('template_directory'); ?>/images/admin/bg_admin_content.png) center top repeat-y;}
#unnamedcontentcolor {width:383px;height:50px;margin:0 auto;}
#unnamedbgcolor {font-size:.9em;margin:8px 0 12px;height:50px;width:600px;}
#unnamedfontcolor {float:left;margin:16px 10px 5px 45px; }
#unnamedlinkcolor {float:left;margin:16px 10px 5px 30px;}
#unnamedhovercolor {float:left;margin:16px 40px 5px 30px;}
#advanced,#togglestyle {margin:5px 0;}
#colorPickerDiv a,#colorPickerDiv a:hover {padding:1px;text-decoration: none;border-bottom: 0px;}
.cssbtn {font-size:.9em;}
.clear {clear:both;}
</style>
<?php } } function unnamed_admin() {
	global $wpdb;
	// Update
	$update = UnnamedOptions::unnamed_update();
	
	$bg_image = get_option('unnamed_bg_image');
	$bg_files = UnnamedFunctions::files_scan(TEMPLATEPATH . '/images/backgrounds/',array('gif','jpeg','jpg','png'),2);
	$bg_repeat = get_option('unnamed_bg_repeat');
?>
<?php if(isset($_POST['submit'])) { ?>
<div id="message2" class="updated fade">
	<p><?php _e('Opciones actualizadas.','unnamed'); ?></p>
</div>
<?php } ?>

<div class="wrap">
	<h2><?php _e('Opciones de Tu Mismo','unnamed'); ?></h2>
	<p style="margin-left:5px;"><small><?php printf(__('Puedes revisar nuevas versiones (en ingles) <a href="http://xuyiyang.com/wordpress-themes/unnamed/">aqui</a>.','unnamed')) ?></small></p>
	<div class="unnamedcontainer">
		<form name="dofollow" action="" method="post">
			<input type="hidden" name="action" value="<?php echo attribute_escape($update); ?>" />
			<input type="hidden" name="page_options" value="'dofollow_timeout'" />
			<p class="submit">
				<input type="submit" name="submit" value="<?php echo attribute_escape(__('Actualizar opciones &raquo;','unnamed')); ?>" />
			</p>
			<h3><?php _e('Opciones AJAX','unnamed'); ?></h3>
			<div class="unnamedoptions">
				<div class="floatleft">
					<h4><?php _e('Live Search','unnamed'); ?></h4>
					<p>
						<input name="livesearch" id="livesearch" type="checkbox" value="1" <?php checked('1',get_option('unnamed_livesearch')); ?> />
						<label for="livesearch"><?php _e('Habilitar Livesearch','unnamed'); ?></label>
					</p>
					<p><small><?php _e('AJAX Livesearch esta basada en el <a href="http://stevelam.org/2006/04/k2-live-search-mod/">K2 Live Search Mod</a> de <a href="http://stevelam.org/">Steve Lam</a>.','unnamed'); ?></small></p>
					<br />
					<h4><?php _e('Efecto deslizante','unnamed'); ?></h4>
					<p>
						<input name="shelf" id="shelf" type="checkbox" value="1" <?php checked('1',get_option('unnamed_shelf')); ?> />
						<label for="shelf"><?php _e('Habilitar efecto deslizante','unnamed'); ?></label>
					</p>
					<p><small><?php _e('Un contenedor deslizante AJAX con soporte para Widgets.','unnamed'); ?></small></p>
				</div>
				<div class="floatleft">
					<h4><?php _e('Comentarios Directos','unnamed'); ?></h4>
					<p>
						<input name="ajaxcommenting" id="ajaxcommenting" type="checkbox" value="1" <?php checked('1',get_option('unnamed_ajaxcommenting')); ?> />
						<label for="ajaxcommenting"><?php _e('Habilitar comentarios directos','unnamed'); ?></label>
					</p>
					<p><small><?php _e('Vista previa o envio de tu comentario sin tener que volver a cargar la pagina. Proveniente del tema <a href="http://getk2.com">K2</a>.','unnamed'); ?></small></p>
					<br />
					<h4><?php _e('Lanzador Script','unnamed'); ?></h4>
					<p>
						<input name="scriptloader" id="scriptloader" type="checkbox" value="1" <?php checked('1',get_option('unnamed_scriptloader')); ?> />
						<label for="scriptloader"><?php _e('Habilitar lanzador Script','unnamed'); ?></label>
					</p>
					<p><small><?php _e('Activa el <a href="http://trac.wordpress.org/browser/trunk/wp-includes/script-loader.php">Lanzador Script</a> para usar el entorno javascript de  WordPress para una mayor compatibilidad del plugin. Desactivalo para tener un mejor rendimiento.','unnamed'); ?></small></p>
				</div>
				<br class="clear" />
			</div>
			<h3><?php _e('Estilos Personalizados','unnamed'); ?></h3>
			<div class="unnamedoptions">
				<div style="padding:0 5px;margin:5px;clear:both;">
					<h4><?php _e('Colores','unnamed'); ?></h4>
					<div id="unnamedbgcolor" style="background:<?php echo unnamed_bgcolor(); ?>;">
						<div id="admin-content">
						<div id="unnamedcontentcolor" style="background:<?php echo unnamed_contentcolor(); ?>">
							<p id="unnamedfontcolor" style="color:<?php echo unnamed_fontcolor(); ?>;"><?php _e('Color texto','unnamed'); ?></p>
							<p id="unnamedlinkcolor" style="color:<?php echo unnamed_linkcolor(); ?>;"><?php _e('Color enlace','unnamed'); ?></p>
							<p id="unnamedhovercolor" style="color:<?php echo unnamed_hovercolor(); ?>;"><?php _e('Color enlace activo','unnamed'); ?></p>
						</div></div>
					</div>
					<input class="cssbtn" type="button" onclick="colorSelect(document.getElementById('fontcolor'),'pick1');return false;" name="pick1" id="pick1" value="<?php echo attribute_escape(__('Texto','unnamed')); ?>" />
					<input class="cssbtn" type="button" onclick="colorSelect(document.getElementById('linkcolor'),'pick2');return false;" name="pick2" id="pick2" value="<?php echo attribute_escape(__('Enlace','unnamed')); ?>" />
					<input class="cssbtn" type="button" onclick="colorSelect(document.getElementById('hovercolor'),'pick3');return false;" name="pick3" id="pick3" value="<?php echo attribute_escape(__('Enlace activo','unnamed')); ?>" />
					<input class="cssbtn" type="button" onclick="colorSelect(document.getElementById('bgcolor'),'pick4');return false;" name="pick4" id="pick4" value="<?php echo attribute_escape(__('Fondo','unnamed')); ?>" />
					<input class="cssbtn" type="button" onclick="colorSelect(document.getElementById('contentcolor'),'pick5');return false;" name="pick5" id="pick5" value="<?php echo attribute_escape(__('Contenido de fondo','unnamed')); ?>" />
					<input class="cssbtn" type="button" name="default" value="<?php echo attribute_escape(__('Por defecto','unnamed')); ?>" onclick="colorDefaults()" />
					<input class="cssbtn" type="button" value="<?php echo attribute_escape(__('Avanzado &raquo;','unnamed')); ?>" onclick="toggleAdvanced()" />
					<input type="hidden" name="fontcolor" id="fontcolor" value="<?php echo attribute_escape(get_option('unnamed_fontcolor')); ?>" />
					<input type="hidden" name="linkcolor" id="linkcolor" value="<?php echo attribute_escape(get_option('unnamed_linkcolor')); ?>" />
					<input type="hidden" name="hovercolor" id="hovercolor" value="<?php echo attribute_escape(get_option('unnamed_hovercolor')); ?>" />
					<input type="hidden" name="bgcolor" id="bgcolor" value="<?php echo attribute_escape(get_option('unnamed_bgcolor')); ?>" />
					<input type="hidden" name="contentcolor" id="contentcolor" value="<?php echo attribute_escape(get_option('unnamed_contentcolor')); ?>" />
					<div id="colorPickerDiv" style="z-index:100;background:#eee;border:1px solid #ccc;position:absolute;visibility:hidden;"></div>
					<div id="advanced" style="display:none;clear:both;">
						<label for="advfontcolor"><?php _e('Texto:','unnamed'); ?></label>
						<input type="text" id="advfontcolor" onchange="advUpdate(this.value,'fontcolor')" value="<?php echo attribute_escape(get_option('unnamed_fontcolor')); ?>" />
						<br />
						<label for="advlinkcolor"><?php _e('Enlace:','unnamed'); ?></label>
						<input type="text" id="advlinkcolor" onchange="advUpdate(this.value,'linkcolor')" value="<?php echo attribute_escape(get_option('unnamed_linkcolor')); ?>" />
						<br />
						<label for="advhovercolor"><?php _e('Enlace activo:','unnamed'); ?></label>
						<input type="text" id="advhovercolor" onchange="advUpdate(this.value,'hovercolor')" value="<?php echo attribute_escape(get_option('unnamed_hovercolor')); ?>" />
						<br />
						<label for="advbgcolor"><?php _e('Fondo:','unnamed'); ?></label>
						<input type="text" id="advbgcolor" onchange="advUpdate(this.value,'bgcolor')" value="<?php echo attribute_escape(get_option('unnamed_bgcolor')); ?>" />
						<br />
						<label for="advcontentcolor"><?php _e('Contenido de fondo:','unnamed'); ?></label>
						<input type="text" id="advcontentcolor" onchange="advUpdate(this.value,'contentcolor')" value="<?php echo attribute_escape(get_option('unnamed_contentcolor')); ?>" />
					</div>
				</div>
				<div style="padding:0 5px;margin:20px 5px 10px 5px;clear:both;">
					<h4><?php _e('Imagenes de Fondo','unnamed'); ?></h4>
					<select id="bg_file" name="bg_file">
						<option value="" <?php selected($bg_image, ''); ?>><?php _e('Sin imagen','unnamed'); ?></option>
						<?php foreach($bg_files as $bg_file) { ?>
						<option value="<?php echo attribute_escape($bg_file); ?>" <?php selected($bg_image, $bg_file); ?>><?php echo($bg_file); ?></option>
						<?php } ?>
					</select>
					<select id="bg_repeat" name="bg_repeat">
						<option value="" <?php selected($bg_repeat,''); ?>><?php _e('repetir','unnamed'); ?></option>
						<option value="<?php echo attribute_escape('no-repeat'); ?>" <?php selected($bg_repeat,'no-repeat'); ?>><?php _e('no-repetir','unnamed'); ?></option>
						<option value="<?php echo attribute_escape('repeat-x'); ?>" <?php selected($bg_repeat,'repeat-x'); ?>><?php _e('repetir-x','unnamed'); ?></option>
						<option value="<?php echo attribute_escape('repeat-y'); ?>" <?php selected($bg_repeat,'repeat-y'); ?>><?php _e('repetir-y','unnamed'); ?></option>
					</select>
					<p><small><?php _e('Sube las imagenes a la carpeta "/images/backgrounds/" y elige una como imagen de fondo.','unnamed');?></small></p>
				</div>
				<div class="floatleft" style="clear:left;">
					<h4><?php _e('Plantillas','unnamed'); ?></h4>
					<div id="layout1"></div>
					<div id="layout2"></div>
					<br class="clear" />
					<input name="layout" id="layout-1" type="radio" value="1" <?php checked('1', get_option('unnamed_layout')); ?> />
					<label for="layout-1"><?php _e('Tres columnas','unnamed'); ?></label>
					&nbsp;&nbsp;&nbsp;&nbsp;
					<input name="layout" id="layout-2" type="radio" value="0" <?php checked('0', get_option('unnamed_layout')); ?> />
					<label for="layout-2"><?php _e('Dos columnas','unnamed'); ?></label>
				</div>
				<div class="floatleft">
					<h4><?php _e('Tamaño encabezado','unnamed'); ?></h4>
					<p>
						<label for="headerheight"><?php _e('Altura encabezado','unnamed'); ?></label>
						<input type="text" style="width:32px;" id="headerheight" name="headerheight" value="<?php echo attribute_escape(get_option('unnamed_headerheight')); ?>" />
						px. <br />
						<label for="headerwidth"><?php _e('Ancho encabezado','unnamed'); ?></label>
						<input type="text" style="width:32px;" id="headerwidth" name="headerwidth" value="<?php echo attribute_escape(get_option('unnamed_headerwidth')); ?>" />
						px.<br />
					</p>
					<p> <small><?php _e('Define el tamaño del encabezado para que se ajuste a tus necesidades cuando <a href="themes.php?page=custom-header">subas una imagen</a>. <br />Dejalo en blanco para la configuracion por defecto.','unnamed'); ?></small> </p>
				</div>
				<br class="clear" />
			</div>
			<h3><?php _e('Varios','unnamed'); ?></h3>
			<div class="unnamedoptions">
				<div class="floatleft">
					<h4><?php _e('Mostrar elementos de barra lateral','unnamed'); ?></h4>
					<p>
						<input name="showsidebarpage" id="onpage" type="checkbox" value="1" <?php checked('1',get_option('unnamed_showsidebarpage')); ?> />
						<label for="onpage"><?php _e('en paginas estaticas','unnamed'); ?></label>
						<br />
						<input name="showsidebarsingle" id="onsingle" type="checkbox" value="1" <?php checked('1',get_option('unnamed_showsidebarsingle')); ?> />
						<label for="onsingle"><?php _e('en paginas de articulo','unnamed'); ?></label>
						<br />
						<input name="showsidebarcat" id="onarchive" type="checkbox" value="1" <?php checked('1',get_option('unnamed_showsidebarcat')); ?> />
						<label for="onarchive"><?php _e('en paginas de archivo','unnamed'); ?></label>
					</p>
					<p><small><?php _e('Elige las paginas que quieres mostrar en la barra lateral.<br />Puedes utilizar <a href="widgets.php">Widgets</a> para colocar los elementos de tu barra lateral.','unnamed'); ?></small></p>
					<br />
					<h4><?php _e('Direccion de Feed','unnamed'); ?></h4>
					<p>
						<input type="text" style="width:300px;" name="rss" value="<?php echo attribute_escape(get_option('unnamed_rss')); ?>" />
					</p>
					<p><small><?php _e('Usa tu agregador para reemplazar el RSS 2.0 por defecto. Por ejemplo: http://feeds.feedburner.com/tufeed','unnamed'); ?></small></p>
				</div>
				<div class="floatleft">
					<h4><?php _e('Navegacion','unnamed'); ?></h4>
					<p>
						<input name="dropmenu" id="dropmenu-on" type="checkbox" value="1" <?php checked('1',get_option('unnamed_dropmenu')); ?> />
						<label for="dropmenu-on"><?php _e('Habilitar menu desplegable','unnamed'); ?></label>
					</p>
					<p> <small><?php _e('El menu desplegable se mostrara solo cuando la pagina tenga al menos una pagina hija.','unnamed'); ?></small></p>
					<p>
						<label for="hidepages"><?php _e('Ocultar ciertas paginas','unnamed'); ?></label>
						<input type="text" style="width:64px;" id="hidepages" name="hidepages" value="<?php echo attribute_escape(get_option('unnamed_hidepages')); ?>" />
					</p>
					<p><small><?php _e('Rellena el campo con los IDs de paginas para excluirlas de la barra de navegacion.<br />Separa los IDs de pagina con comas: 1, 2.','unnamed'); ?></small></p>
				</div>
				<br class="clear" />
			</div>
			<br class="clear" />
			<p class="submit">
				<input type="submit" name="submit" value="<?php echo attribute_escape(__('Actualizar opciones &raquo;','unnamed')); ?>" />
			</p>
		</form>
		<h3><?php _e('Donate','unnamed'); ?></h3>
		<p><?php printf(__('Considera hacer un donativo con <a href="http://www.paypal.com">Paypal</a> para mantener el proyecto en marcha. Se agradecen sinceramente todos los donativos. Gracias.','unnamed')) ?></p>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<p>
				<input type="hidden" name="cmd" value="_s-xclick" />
				<input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but21.gif" style="border:0;" name="submit" alt="Make payments with PayPal - it's fast, free and secure!" />
				<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----" />
			</p>
		</form>
		<h3><?php _e('Desinstalar','unnamed'); ?></h3>
		<p><?php printf(__('Presiona el boton de desinstalar para limpiar la base de datos. Se te enviara a la <a href="themes.php">intefaz de administracion de Temas</a>. <br />Esto NO borra tu configuracion de encabezado personalizado, puedes restaurar el encabezado original en <a href="themes.php?page=custom-header">esta pagina</a>.','unnamed')) ?></p>
		<form action="" method="post">
			<p class="submit">
				<input name="uninstall" id="uninstall" type="submit" value="<?php echo attribute_escape(__('Desinstalar tema &raquo;','unnamed')); ?>" />
			</p>
		</form>
	</div>
</div>

<?php  } 

// Custom Image Header Functions
define('HEADER_TEXTCOLOR','FFFFFF');
define('HEADER_IMAGE','%s/images/bg_header.png'); // %s is theme dir uri

if (get_option('unnamed_headerheight') == "") { define('HEADER_IMAGE_HEIGHT',78);
} else {
define('HEADER_IMAGE_HEIGHT',get_option('unnamed_headerheight'));
}

if (get_option('unnamed_headerwidth') == "") { define('HEADER_IMAGE_WIDTH',960);
} else {
define('HEADER_IMAGE_WIDTH',get_option('unnamed_headerwidth'));
}
 
function admin_header_style() { 
?>
<style type="text/css">
#headimg {
font-family:Georgia, "Times New Roman", Times, serif;
background-image:url(<?php header_image() ?>);
background-repeat:repeat !important;
height:<?php echo HEADER_IMAGE_HEIGHT; ?>px;
width:<?php echo HEADER_IMAGE_WIDTH; ?>px;
margin:0 0 10px;
}
#headimg h1 {
font-size:1.8em;
text-align:left;
margin:0;
padding:15px 0 0 20px;
}
#headimg h1 a {
color:#<?php header_textcolor() ?>;
text-decoration:none;
border-bottom:none;
}
#headimg #desc {
color:#<?php header_textcolor() ?>;
font-size:1em;
text-align:left;
padding:0 0 5px 20px;
}
<?php if ('blank' == get_header_textcolor()) {
?>
#headimg h1, #headimg #desc {
display:none;
}
#headimg h1 a, #headimg #desc {
color:#<?php echo HEADER_TEXTCOLOR ?>;
}
<?php
}
?>
</style>

<?php }

UnnamedOptions::unnamed_init();

wp_register_script('unnamed_livesearch',get_bloginfo('template_directory') . '/js/livesearch.js.php',array('scriptaculous-effects'));
wp_register_script('unnamed_comments',get_bloginfo('template_directory') . '/js/comments.js.php',array('scriptaculous-effects'));
wp_register_script('unnamed_functions',get_bloginfo('template_directory') . '/js/functions.js.php',array('scriptaculous-effects'));

add_custom_image_header('','admin_header_style');

?>