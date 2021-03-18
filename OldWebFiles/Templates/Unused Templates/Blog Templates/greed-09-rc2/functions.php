<?php
if ( function_exists('register_sidebar') )
    register_sidebars(10);

$themename = "Greed";
$shortname = "grd";
$options = array (

	array(	"name" => "Body background color",
			"id" => $shortname."_body_background_color",
			"std" => "582b1d",
			"type" => "text"),

	array(	"name" => "Body background image",
			"id" => $shortname."_body_background_image",
			"std" => "images/bg_body.gif",
			"type" => "text"),

	array(	"name" => "Banner background color",
			"id" => $shortname."_banner_background_color",
			"std" => "d1e701",
			"type" => "text"),

	array(	"name" => "Banner background image",
			"id" => $shortname."_banner_background_image",
			"std" => "images/bg_banner.gif",
			"type" => "text"),

	array(	"name" => "Link color",
			"id" => $shortname."_link_color",
			"std" => "801f02",
			"type" => "text"),

	array(	"name" => "Main column margins",
			"id" => $shortname."_main_column_margins",
			"std" => "0 200px 0 190px",
			"type" => "text"),

	array(	"name" => "Sidebar A float",
			"id" => $shortname."_sidebar_a_float",
			"std" => "left",
			"type" => "text"),

	array(	"name" => "Sidebar A margins",
			"id" => $shortname."_sidebar_a_margins",
			"std" => "0 0 0 10px",
			"type" => "text"),

	array(	"name" => "Sidebar B float",
			"id" => $shortname."_sidebar_b_float",
			"std" => "right",
			"type" => "text"),

	array(	"name" => "Sidebar B margins",
			"id" => $shortname."_sidebar_b_margins",
			"std" => "0 10px 0 0",
			"type" => "text"),
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

    add_theme_page($themename." Options", "Greed Theme Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

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
	
if ($value['type'] == "text") { ?>
		
<tr valign="top"> 
	<th scope="row"><?php echo $value['name']; ?>:</th>
	<td>
		<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" />
	</td>
</tr>

<?php } elseif ($value['type'] == "select") { ?>

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

function mytheme_wp_head() { ?>
<link href="<?php bloginfo('template_directory'); ?>/style.php" rel="stylesheet" type="text/css" />
<?php }

add_action('wp_head', 'mytheme_wp_head');
add_action('admin_menu', 'mytheme_add_admin'); ?>