<?php
if ( function_exists('register_sidebars') )
    register_sidebars(3);
?>
<?php //Begin Theme Options Code (many thanks to the undersigned for the great tutorial)
$themename = "Stripped";
$shortname = "st";
$options = array (
	
	array(	"name" => "Feedburner Address",
			"id" => $shortname."_feedburner_address",
			"std" => "",
			"type" => "text"),
	
	array(	"name" => "Color Scheme",
			"id" => $shortname."_color_scheme",
			"std" => "Default",
			"type" => "select",
            "options" => array("Default","Red","Blue","Green","Orange","Pink","Purple"))
);

function mytheme_add_admin() {

	global $themename, $shortname, $options;

	if ( $_GET['page'] == basename(__FILE__) ) {
	
		if ( 'save' == $_REQUEST['action'] ) {

				foreach ($options as $value) {
					update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

				foreach ($options as $value) {
					if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

				header("Location: themes.php?page=functions.php&saved=true");
				die;

		} else if( 'reset' == $_REQUEST['action'] ) {

			foreach ($options as $value) {
				delete_option( $value['id'] ); }

			header("Location: themes.php?page=functions.php&reset=true");
			die;

		}
	}

    add_theme_page($themename." Options", "Current Theme Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

	global $themename, $shortname, $options;

	if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
	if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
	
?>
<div class="wrap">
<h2><?php echo $themename; ?> settings</h2>

<form method="post">

<table class="optiontable">

<?php foreach ($options as $value) { 
	
if ($value['type'] == "text") { //If we have configured this for text options ... ?>
		
<tr valign="top"> 
	<th scope="row"><?php echo $value['name']; ?>:</th>
	<td>
		<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" />
	</td>
</tr>

<?php } elseif ($value['type'] == "select") { //If we have configured this for select box options ... ?>

	<tr valign="top"> 
		<th scope="row"><?php echo $value['name']; ?>:</th>
		<td>
			<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
				<?php foreach ($value['options'] as $option) { ?>
				<option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
				<?php } ?>
			</select>
		</td>
	</tr>

<?php 
} 
}
?>

</table>

<p><a href="http://www.nathanrice.net/themes/stripped/">Additional color schemes are available</a> for just <strong>$5</strong> per color, or <strong>$20</strong> for the multi-color package.</p>
<p>If you need support for this theme, <a href="http://www.nathanrice.net/themes/stripped/#comments">leave a comment</a> at the release page.</p>
<p>Also, if you would like to keep this theme up to date, be sure to <a href="http://www.feedburner.com/fb/a/emailverifySubmit?feedId=1231841&loc=en_US" target="_blank">sign up for the theme update newsletter</a>.</p>

<p class="submit">
<input name="save" type="submit" value="Save changes" />	
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>

<?php
}
add_action('admin_menu', 'mytheme_add_admin'); 
?>