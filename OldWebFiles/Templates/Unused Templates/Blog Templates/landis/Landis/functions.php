<?php

	function landistheme_settings_panel() {

		$landistheme_setting = get_option('landistheme_settings');

		//if form was submitted
		if(isset($_POST['submitted'])){

			if (isset($_POST['clear_cache']))
			    update_option('landistheme_cache_ts', 0);

			$new_settings = array(
				                'title' => $_POST['title'],
								'tagline' => $_POST['tagline'],
								);
			
			$replacethis = array('"','&', "'");
			$replacewith = array('&quote;', '&amp;', '&prime;');
			str_replace($replacethis, $replacewith, $new_settings);

			if ($new_settings != $landistheme_setting){
				update_option('landistheme_settings', $new_settings);
				$landistheme_setting = $new_settings;
			}

  		}//end if submitted

  		//if seeing the plugin admin for the first time
		if (empty($landistheme_setting)){
	        $landistheme_setting_default = array(
	                    'title' => '',
						'tagline' => '',
						);
			update_option('landistheme_settings', $landistheme_setting_default);
			$landistheme_setting = $landistheme_setting_default;
	 	}//end if settings available

		//so people can view " in the form
		function html_entities($s){
			$s = str_replace('&', '&amp;', $s);
			$s = str_replace('"', '&quot;', $s);
			$s = str_replace("'", '&prime;', $s);
			return $s;
		}

		?>
		<div class="wrap">
			<h2>Landis Custom Theme Settings</h2>

			<form name="landistheme-settings" action="<?php echo $_SERVER[PHP_SELF];?>?page=functions.php" method="post">
			<input type="hidden" name="version" value="<?php echo html_entities($landistheme_setting['version']); ?>" />
			<table width="100%" cellspacing="2" cellpadding="5" class="editform" summary="WP Audioscrobbler Settings">
			<tr valign="top">
				<th scope="row" width="33%"><label for="title">Custom Title:</label></th>
				<td><input name="title" type="text" size="40" value="<?php echo html_entities($landistheme_setting['title']); ?>" class="code"/>
				<br/>The title you want to be displayed using the alternating White/Green color scheme.
				<br/>Use spaces to alternate colors.</td>
			</tr>
			<tr valign="top">
				<th scope="row" width="33%"><label for="title">Custom Tagline:</label></th>
				<td><input name="tagline" type="text" size="40" value="<?php echo html_entities($landistheme_setting['tagline']); ?>" class="code"/>
				<br/>The tagline you want to appear above the page content.
				</td>
			</tr>
			</table>

			<br />


			<p class="submit"><input type="hidden" name="submitted" /><input type="submit" name="Submit" value="<?php _e($rev_action);?> Update Settings &raquo;" /></p>
			</form>
		</div> <!-- wrap -->

		<?php
	} /* end function: landistheme_settings_menu */

	function landisthemetitle(){
		$landistheme_setting = get_option('landistheme_settings');
		return $landistheme_setting['title'];
	}
	
	function bcthemetagline(){
		$landistheme_setting = get_option('landistheme_settings');
		return $landistheme_setting['tagline'];
	}


 	function landistheme_admin_menu(){
	   add_submenu_page('themes.php', 'Landis Settings', 'Landis Settings', 8, basename(__FILE__), 'landistheme_settings_panel');
	}

      add_action('admin_menu', 'landistheme_admin_menu');

if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<div class="box">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));

?>