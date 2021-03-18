<?php
/*
Plugin Name: Book Reviews
Plugin URI: http://www.viewfinderdesign.co.uk/
Description: Allows you to easily manage and maintain book lists and reviews
Version: 1.3
Author: Lee Penney
Author URI: http://www.thedigeratipeninsula.org.uk/

copyright (c) 2005/6/7 Lee Penney
Released under the terms of the GNU GPL
*/

function br_add_book_review_options() {
    if (function_exists('add_options_page')) {
			add_options_page('Book Reviews', 'Book Reviews', 1, basename(__FILE__), 'br_book_options_subpanel');
    }
}

function br_book_options_subpanel() {
  if (isset($_POST['info_update'])) {
	  if ($_POST['options_exist'] == 'yes') {
		 if ($_POST['post_category']) {
		   update_option('book_review_categories', $_POST['post_category']);
		 }
			update_option('book_review_second_hand', $_POST['second_hand']);
			update_option('book_review_images', $_POST['images']);
			update_option('book_review_links', $_POST['links']);
			update_option('book_review_recommending', $_POST['recs']);
		} else {
	    add_option('book_review_categories', $_POST['post_category'], 'Category listings for Book Reviews', 'yes');
			add_option('book_review_second_hand', $_POST['second_hand'], 'Provide option of second hand book links', 'yes');
			add_option('book_review_images', $_POST['images'], 'Provide option of link to book image', 'yes');
			add_option('book_review_links', $_POST['links'], 'Provide option of link to more info', 'yes');
			add_option('book_review_recommending', $_POST['recs'], 'Provide option of recommendations', 'yes');
	  }
    ?><div class="updated"><p><strong><?php _e('Book Review Plugin Options Saved.', 'Localization name') ?></strong></p></div>
<?php
	} ?>
<div class="wrap">
  <form method="post" id="book_review_options">
    <h2>Book Review Plugin Options</h2>
  <fieldset id="categorydiv">
  <legend><strong>Assigned Book Category</strong></legend>
	<p>Pick which categories you want books to be assigned to <!--(<strong>you need to do this each time you save</strong>)-->:</p>
	<div><?php dropdown_categories(); 
	?></div>
	<p>Currently books are associated with the following categories:</p>
	<?php $book_cats = get_option('book_review_categories');
	if ($book_cats) {
	foreach ($book_cats as $book_cat) {
		$catnames .= "<li>".get_the_category_by_ID($book_cat)."</li>\n";
	}
	echo "<ul>$catnames</ul>\n"; 
	}
	?>
  </fieldset>
	<fieldset name="set1">
	<legend><strong><?php _e('Second Hand Books', 'Localization name') ?></strong></legend>
	<p>Do you want to have links to where you sell your old books (e.g. to somewhere like <a href="http://www.listbooks.co.uk/">List Books.co.uk</a>)?</p>
  <?php $shyn = get_option('book_review_second_hand'); ?>
  <label for="second_hand_yes" class="selectit"><input id="second_hand_yes" name="second_hand" value="yes" type="radio" <?php if ($shyn == 'yes') { echo "checked=\"checked\""; } ?>> Yes</label>
	<label for="second_hand_no" class="selectit"><input id="second_hand_no" name="second_hand" value="no" type="radio" <?php if ($shyn == 'no' || $shyn == '') { echo "checked=\"checked\""; } ?>> No</label>
     </fieldset>
	<fieldset name="set2">
	<legend><strong><?php _e('Book Images', 'Localization name') ?></strong></legend>
	<p>Do you wish to allow links to an image of the book?</p>
  <?php $bimg = get_option('book_review_images'); ?>
  <label for="images_yes" class="selectit"><input id="images_yes" name="images" value="yes" type="radio" <?php if ($bimg == 'yes') { echo "checked=\"checked\""; } ?>> Yes</label>
	<label for="images_no" class="selectit"><input id="images_no" name="images" value="no" type="radio" <?php if ($bimg == 'no' || $bimg == '') { echo "checked=\"checked\""; } ?>> No</label>
     </fieldset>
	<fieldset name="set3">
	<legend><strong><?php _e('Book Links', 'Localization name') ?></strong></legend>
	<p>Do you wish to allow links to more information about a book (e.g. Amazon or author links)?</p>
  <?php $links = get_option('book_review_links'); ?>
  <label for="links_yes" class="selectit"><input id="links_yes" name="links" value="yes" type="radio" <?php if ($links == 'yes') { echo "checked=\"checked\""; } ?>> Yes</label>
	<label for="links_no" class="selectit"><input id="links_no" name="links" value="no" type="radio" <?php if ($links == 'no' || $links == '') { echo "checked=\"checked\""; } ?>> No</label>
     </fieldset>
	<fieldset name="set4">
	<legend><strong><?php _e('Recommendations', 'Localization name') ?></strong></legend>
	<p>Do you want to have the ability to say whether you recommend a book or not?</p>
  <?php $recs = get_option('book_review_recommending'); ?>
  <label for="rec_yes" class="selectit"><input id="rec_yes" name="recs" value="yes" type="radio" <?php if ($recs == 'yes') { echo "checked=\"checked\""; } ?>> Yes</label>
	<label for="rec_no" class="selectit"><input id="rec_no" name="recs" value="no" type="radio" <?php if ($recs == 'no' || $recs =='') { echo "checked=\"checked\""; } ?>> No</label>
     </fieldset>
	<div class="clear"></div>
	<br/>
	<input type="hidden" name="options_exist" value="<?php
	$option_test = get_option('book_review_second_hand');
	if (!$option_test) {
	  echo "no";
	} else {
	  echo "yes";
	} ?>" />
<div class="submit">
  <input type="submit" name="info_update" value="<?php _e('Update options', 'Localization name')?>" /></div>
  </form>
 </div><?php
}

function br_add_book_panels() {
  add_submenu_page('post-new.php', 'Write Book Review', 'Write Book Review', 1, basename(__FILE__), 'br_create_new_book_review');
	add_management_page('Manage Book Reviews', 'Manage Book Reviews', 1, basename(__FILE__), 'br_manage_book_reviews');
}

function add_book_meta($post_ID) {
	global $wpdb;
	
	$author     = $wpdb->escape( stripslashes( trim($_POST['author']) ) );
	$book_image	= $wpdb->escape( stripslashes( trim($_POST['book_image']) ) );
	$book_link	= $wpdb->escape( stripslashes( trim($_POST['book_link']) ) );
	$recommend	= $wpdb->escape( stripslashes( trim($_POST['recommend']) ) );
	$sh_link 		= $wpdb->escape( stripslashes( trim($_POST['second_hand']) ) );
  
	if ($author) {
	  $result = $wpdb->query("INSERT INTO $wpdb->postmeta (post_id,meta_key,meta_value) VALUES ('$post_ID','author','$author') ");
  }
	$bimg = get_option('book_review_images'); if ($bimg == 'yes' && $book_image) {
    $result = $wpdb->query("INSERT INTO $wpdb->postmeta (post_id,meta_key,meta_value) VALUES ('$post_ID','book_image','$book_image') ");
  }
	$blinks = get_option('book_review_links'); if ($blinks == 'yes' && $book_link) {
    $result = $wpdb->query("INSERT INTO $wpdb->postmeta (post_id,meta_key,meta_value) VALUES ('$post_ID','book_link','$book_link') ");
  }
	$recs = get_option('book_review_recommending'); if ($recs == 'yes' && $recommend) {
    $result = $wpdb->query("INSERT INTO $wpdb->postmeta (post_id,meta_key,meta_value) VALUES ('$post_ID','recommended','$recommend') ");
  }
  $shyn = get_option('book_review_second_hand'); if ($shyn == 'yes' && $sh_link) {
	  $result = $wpdb->query("INSERT INTO $wpdb->postmeta (post_id,meta_key,meta_value) VALUES ('$post_ID','second_hand_link','$sh_link') ");
	}
	
} // add_book_meta

function br_insert_new_book_review() {
	
  $post_ID = write_post();
	
	add_book_meta($post_ID);
	
	return $post_ID;
	
}

function update_book_meta($post_ID) {
	global $wpdb;
	
	$author     = $wpdb->escape( stripslashes( trim($_POST['author']) ) );
	$book_image	= $wpdb->escape( stripslashes( trim($_POST['book_image']) ) );
	$book_link	= $wpdb->escape( stripslashes( trim($_POST['book_link']) ) );
	$recommend	= $wpdb->escape( stripslashes( trim($_POST['recommend']) ) );
	$sh_link 		= $wpdb->escape( stripslashes( trim($_POST['second_hand']) ) );
  
	if ($author) {
	  update_post_meta($post_ID, 'author', $author);
  }
	$bimg = get_option('book_review_images'); if ($bimg == 'yes' && $book_image) {
    if (!update_post_meta($post_ID, 'book_image', $book_image)) {
		  $result = $wpdb->query("INSERT INTO $wpdb->postmeta (post_id,meta_key,meta_value) VALUES ('$post_ID','book_image','$book_image') ");
		}
  }
	$blinks = get_option('book_review_links'); if ($blinks == 'yes' && $book_link) {
    if (!update_post_meta($post_ID, 'book_link', $book_link)) {
		  $result = $wpdb->query("INSERT INTO $wpdb->postmeta (post_id,meta_key,meta_value) VALUES ('$post_ID','book_link','$book_link') ");
		}
  }
	$recs = get_option('book_review_recommending'); if ($recs == 'yes' && $recommend) {
    if (!update_post_meta($post_ID, 'recommended', $recommend)) {
		  $result = $wpdb->query("INSERT INTO $wpdb->postmeta (post_id,meta_key,meta_value) VALUES ('$post_ID','recommended','$recommend') ");
    }
  }
  $shyn = get_option('book_review_second_hand'); if ($shyn == 'yes' && $sh_link) {
	  if (!update_post_meta($post_ID, 'second_hand_link', $sh_link)) {
		  $result = $wpdb->query("INSERT INTO $wpdb->postmeta (post_id,meta_key,meta_value) VALUES ('$post_ID','second_hand_link','$sh_link') ");
		}
	}
	
} // update_book_meta

function br_update_book_review() {
	
  $post_ID = edit_post();
	
	update_book_meta($post_ID);
	
	return $post_ID;
	
}

function br_create_new_book_review() {
  if (isset($_POST['publish'])) {
	$post_ID = br_insert_new_book_review();
    ?>
	<div class="updated"><p><strong><?php _e('Book Review Saved.', 'Localization name') ?></strong></p></div>
<?php
	} elseif ($_POST['action'] == 'editpost') {  
	$post_ID = br_update_book_review();
	 ?>
	<div class="updated"><p><strong><?php _e('Book Review Updated.', 'Localization name') ?></strong></p></div>
<?php
	}
?>
<div class="wrap">
  <form method="post" id="book_review" action="post-new.php?page=book_reviews.php&action=publish">
<?php
if (0 == $post_ID) {
	$form_action = 'post';
	$temp_ID = -1 * time(); // don't change this formula without looking at wp_write_post()
	$form_extra = "<input type='hidden' id='post_ID' name='temp_ID' value='$temp_ID' />";
	wp_nonce_field('add-post');
} else {
	$form_action = 'editpost';
	$form_extra = "<input type='hidden' id='post_ID' name='post_ID' value='$post_ID' />";
	wp_nonce_field('update-post_' .  $post_ID);
}
?>
    <h2>Write Book Review</h2>
<?php
$book_post_cats = get_option('book_review_categories');
if ($book_post_cats[0] == '') {
  $slashpos = strrpos($_SERVER['SCRIPT_NAME'],'/');
  $optionsURL = substr ($_SERVER['SCRIPT_NAME'], 0,$slashpos);
  $optionsURL = "http://".$_SERVER['SERVER_NAME'].$optionsURL."/options-general.php?page=book_reviews.php";
    echo "<p style=\"color:#FF0000\">You have not selected the category/categories book reviews should be assigned to, please do this on the <a href=\"$optionsURL\">Book Reviews options page</a> before proceeding.</p>";
}
?>
<?php
if ($_GET['post']) {
  $post_ID = $_GET['post'];
	$post = get_post_to_edit($post_ID);
	$form_action = 'editpost';
	echo "<input type='hidden' name='post_ID' value='$post_ID' />";
} elseif (0 == $post_ID) {
	$form_action = 'post';
	$temp_ID = -1 * time();
	$form_extra = "<input type='hidden' name='temp_ID' value='$temp_ID' />";
} else {
	$form_action = 'editpost';
	$form_extra = "<input type='hidden' name='post_ID' value='$post_ID' />";
} 

if (empty($post->post_status)) $post->post_status = 'draft';
$user = wp_get_current_user();
?>		
<!--<input type="hidden" name="user_ID" value="<?php echo $user_ID ?>" />-->
<input type="hidden" name="user_ID" value="<?php echo $user->ID ?>" />
<input type="hidden" id="hiddenaction" name="action" value="<?php echo $form_action ?>" />
<input type="hidden" id="originalaction" name="originalaction" value="<?php echo $form_action ?>" />
<input type="hidden" name="post_author" value="<?php echo $post->post_author ?>" />
<input type="hidden" id="post_type" name="post_type" value="post" />
		
<script type="text/javascript">
<!--
function focusit() { // focus on first input field
	document.getElementById('title').focus();
}
addLoadEvent(focusit);
//-->
</script>
<div id="poststuff">

<div id="moremeta">

<?php $rcmds = get_option('book_review_recommending'); if ($rcmds == 'yes') { ?>
<fieldset id="recommend">
<legend><?php _e('Recommend Book?') ?></legend> 
<div><select name="recommend">
<?php $rec_check =  get_post_meta($post_ID, 'recommended', true); 
if ($rec_check == 'yes') { ?>
<option value='yes' selected="selected"><?php _e('Yes'); ?></option>
<option value='no'><?php _e('No'); ?></option>
<?php } elseif ($rec_check == 'no') { ?>
<option value='no' selected="selected"><?php _e('No'); ?></option>
<option value='yes'><?php _e('Yes'); ?></option>
<?php } else { ?>
<option value='no'><?php _e('No'); ?></option>
<option value='yes'><?php _e('Yes'); ?></option>
<?php
}
?>
</select>
</div>
</fieldset>
<?php } ?>

<?php if ( current_user_can('edit_posts') ) : ?>
<fieldset id="timestamp">
<legend><?php _e('Timestamp'); ?>:</legend>
<div><?php touch_time(('editcomment' == $action), 0); ?></div>
</fieldset>
<?php endif; ?>
</div>

<fieldset id="titlediv">
  <legend><?php _e('Book Title') ?></legend> 
  <div><input type="text" name="post_title" size="30" tabindex="1" value="<?php echo $post->post_title; ?>" id="title" /></div>
</fieldset>

<fieldset id="titlediv">
  <legend><?php _e('Author') ?></legend>
  <div><input type="text" name="author" size="30" tabindex="2" value="<?php if ($post_ID != 0 && $_GET['action'] == 'edit') { echo get_post_meta($post_ID, 'author', true); } ?>" id="author" /></div>
</fieldset>

<fieldset id="<?php echo user_can_richedit() ? 'postdivrich' : 'postdiv'; ?>">
<legend><?php _e('Review') ?></legend>

<?php the_editor($post->post_content); ?>

<?php echo $form_pingback ?>
<?php echo $form_prevstatus ?>

<p class="submit">
<span id="autosave"></span>
<?php //echo $saveasdraft; 
if ($post_ID != 0) {
?>
<input type="submit" name="submit" value="<?php _e('Save') ?>" style="font-weight: bold;" tabindex="4" /> 
<?php
}
if ('publish' != $post->post_status || 0 == $post_ID) {
?>
<?php if ( current_user_can('publish_posts') ) : ?>
	<input name="publish" type="submit" id="publish" tabindex="5" accesskey="p" value="<?php _e('Publish') ?>" /> 
<?php endif; ?>
<?php
}
?>
<input name="referredby" type="hidden" id="referredby" value="<?php 
if ( !empty($_REQUEST['popupurl']) )
	echo wp_specialchars($_REQUEST['popupurl']);
else if ( url_to_postid($_SERVER['HTTP_REFERER']) == $post_ID )
	echo 'redo';
else
	echo wp_specialchars($_SERVER['HTTP_REFERER']);
?>" /></p>

<?php do_action('edit_form_advanced'); ?>

<div id="advancedstuff" class="dbx-group" >

<fieldset id="postcustom" class="dbx-box">
<h3 class="dbx-handle"><?php _e('Other Book Info') ?></h3>
<div id="postcustomstuff" class="dbx-content">

<?php $blinks = get_option('book_review_links'); if ($blinks == 'yes') { ?>
<fieldset id="titlediv">
  <legend><?php _e('Book Link') ?></legend> 
  <div><input type="text" name="book_link" size="30" tabindex="7" value="<?php if ($post_ID != 0 && $_GET['action'] == 'edit') { echo get_post_meta($post_ID, 'book_link', true); } ?>" id="book_link" /></div>
</fieldset>
<?php 
}
$bimgs = get_option('book_review_images'); if ($bimgs == 'yes') { ?>
<fieldset id="titlediv">
  <legend><?php _e('Book Image') ?></legend>
  <div><input type="text" name="book_image" size="30" tabindex="8" value="<?php if ($post_ID != 0 && $_GET['action'] == 'edit') { echo get_post_meta($post_ID, 'book_image', true); } ?>" id="book_image" /></div>
</fieldset>
<?php 
}
$shyn = get_option('book_review_second_hand'); if ($shyn == 'yes') { ?>
<fieldset id="titlediv">
  <legend><?php _e('Link to Second Hand Copy') ?></legend> 
  <div><input type="text" name="second_hand" size="30" tabindex="9" value="<?php if ($post_ID != 0 && $_GET['action'] == 'edit') { echo get_post_meta($post_ID, 'second_hand_link', true); } ?>" id="second_hand" /></div>
</fieldset>
<?php } 
if ($shyn == 'no' && $bimgs == 'no' && $blinks == 'no') {
  echo "<p>You have disabled all these options, you can renable them via the options page.";
}
?>

</div>
</fieldset>

<?php
if (current_user_can('upload_files')) { ?>
<h3 class="dbx-handle"><?php _e('Upload Cover Image') ?></h3>
<p>You can use this to upload an image of the book's cover.<br/></p>
<?php
	$uploading_iframe_ID = (0 == $post_ID ? $temp_ID : $post_ID);
	$uploading_iframe_src = wp_nonce_url("upload.php?style=inline&amp;tab=upload&amp;post_id=$uploading_iframe_ID", 'inlineuploading');
	$uploading_iframe_src = apply_filters('uploading_iframe_src', $uploading_iframe_src);
	if ( false != $uploading_iframe_src )
		echo '<iframe id="uploading" frameborder="0" src="' . $uploading_iframe_src . '">' . __('This feature requires iframe support.') . '</iframe>';
}
?>

</div>

<?php if ('edit' == $action) : ?>
<input name="deletepost" class="button" type="submit" id="deletepost" tabindex="10" value="<?php _e('Delete this review') ?>" <?php echo "onclick=\"return confirm('" . sprintf(__("You are about to delete this review \'%s\'\\n  \'Cancel\' to stop, \'OK\' to delete."), addslashes($post->post_title) ) . "')\""; ?> />
<?php endif; ?>

</div>

</div>
  <input type="hidden" name="action" value="<?php echo $form_action ?>" />
	<?php 
	if ($book_post_cats[0] != '') {
	  foreach ($book_post_cats as $book_cats) {
	    echo "<input type=\"hidden\" name=\"post_category[]\" value=\"$book_cats\" />\n";
	  } 
	} ?>
</form>
<?php
}

function br_manage_book_reviews() {
?>
  <div class="wrap">
<h2>Manage Book Reviews</h2>

<?php

$book_post_cats = get_option('book_review_categories');
if ($book_post_cats[0] == '') {
  $slashpos = strrpos($_SERVER['SCRIPT_NAME'],'/');
  $optionsURL = substr ($_SERVER['SCRIPT_NAME'], 0,$slashpos);
  $optionsURL = "http://".$_SERVER['SERVER_NAME'].$optionsURL."/options-general.php?page=book_reviews.php";
    echo "<p style=\"color:#FF0000\">You have not selected the category/categories book reviews are assigned to, please do this on the <a href=\"$optionsURL\">Book Reviews options page</a> before proceeding.</p>";
} else {
$c = 0;
foreach ($book_post_cats as $book_cats) {
  if ($c == 0) {
	  $query_text = "wp_term_taxonomy.term_id='$book_cats' ";
	} else {
	  $query_text .= "OR wp_term_taxonomy.term_id='$book_cats' ";
	}
	$c++;
}

//$reviews = mysql_query("SELECT DISTINCT wp_posts.ID as postID, post_author, post_date, post_title, guid, user_login FROM wp_posts,wp_term_relationships,wp_users WHERE ($query_text) AND wp_posts.ID=wp_term_relationships.object_id AND wp_users.ID=wp_posts.post_author ORDER BY post_date DESC");

$reviews = mysql_query("SELECT DISTINCT wp_posts.ID as postID, post_author, post_date, post_title, guid, user_login FROM wp_posts,wp_term_taxonomy,wp_term_relationships,wp_users WHERE ($query_text) AND wp_term_relationships.term_taxonomy_id=wp_term_taxonomy.term_taxonomy_id AND wp_posts.ID=wp_term_relationships.object_id AND wp_users.ID=wp_posts.post_author ORDER BY post_date DESC");

if (@mysql_num_rows($reviews) == 0) {
  echo "<p>No Reviews Found</p>";
} else {

?>

<table id="the-list-x" width="100%" cellpadding="3" cellspacing="3"> 
	<tr>
  <th>ID</th>
	<th>Date</th>
	<th>Title/Author</th>
	<th>Review Author</th>
	<th></th>
	<th></th>
	<th></th>
	</tr>
<?php 
while ($reviews_result = mysql_fetch_array($reviews)) {

$class = ('alternate' == $class) ? '' : 'alternate';
?> 
<tr id='post-<?php echo $reviews_result[postID]; ?>' class='<?php echo $class; ?>'>

	  <td><?php echo $reviews_result['postID']; ?></th>
		<td><?php echo date('Y-m-d \<\b\r \/\> g:i:s a',strtotime($reviews_result['post_date'])); ?></td>
		<td><strong><?php echo $reviews_result['post_title']; ?></strong><br/>by 
		<?php $author = get_post_meta($reviews_result['postID'], 'author', 'single'); echo $author; ?>
		</td>
		<td><?php echo $reviews_result['user_login']; ?></td>
		<td><a href="<?php echo $reviews_result['guid']; ?>" rel="permalink" class="edit"><?php _e('View'); ?></a></td>
		<td><?php if ( current_user_can('edit_post',$reviews_result['postID']) ) { echo "<a href='post-new.php?page=book_reviews.php&amp;action=edit&amp;post=$reviews_result[postID]' class='edit'>" . __('Edit') . "</a>"; } ?></td>
		<td><?php if ( current_user_can('edit_post',$reviews_result['postID']) ) { echo "<a href='post-new.php?action=delete&amp;post=$reviews_result[postID]' class='delete' onclick=\"return deleteSomething( 'post', " . $reviews_result['postID'] . ", '" . sprintf(__("You are about to delete this post &quot;%s&quot;.\\n&quot;OK&quot; to delete, &quot;Cancel&quot; to stop."), wp_specialchars($reviews_result['post_title'], 1) ) . "' );\">" . __('Delete') . "</a>"; } ?></td>

</tr> 
<?php
}
?>
<?php
?> 
</table>
<?php
}
?>
</div>
<?
}
}

function br_add_book_styles() {
  $url = get_settings('siteurl');
  $url = $url . '/wp-content/plugins/book_reading/book_reading.css';
  echo '<link rel="stylesheet" type="text/css" href="' . $url . '" />';
}

function br_get_book_image($post_ID) {
  global $wpdb;
  $image_url = $wpdb->get_col("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key='book_image' AND post_id='$post_ID'");
	return $image_url[0];
}

function br_get_book_author($post_ID) {
  global $wpdb;
  $author = $wpdb->get_col("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key='author' AND post_id='$post_ID'");
	return $author[0];
}

function br_get_book_link($post_ID) {
  global $wpdb;
  $book_link = $wpdb->get_col("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key='book_link' AND post_id='$post_ID'");
	return $book_link[0];
}

function br_get_second_hand_link($post_ID) {
  global $wpdb;
  $sh_link = $wpdb->get_col("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key='second_hand_link' AND post_id='$post_ID'");
	return $sh_link[0];
}

function br_get_book_recommendation($post_ID) {
  global $wpdb;
  $recommendation = $wpdb->get_col("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key='recommend' AND post_id='$post_ID'");
	return $recommendation[0];
}

function br_get_books($cat_ID) {
  global $wpdb;
	
	$sql = "SELECT object_id FROM $wpdb->term_relationships,$wpdb->term_taxonomy WHERE $wpdb->term_relationships.term_taxonomy_id=$wpdb->term_taxonomy.term_taxonomy_id AND $wpdb->term_taxonomy.term_id='$cat_ID' ORDER BY object_id DESC";
	$query = mysql_query($sql);
		
	$c = 0;
	
	while ($book = mysql_fetch_array($query)) {
		$book_img = br_get_book_image($book['object_id']);
		$book_link = br_get_book_link($book['object_id']);
		$author = br_get_book_author($book['object_id']);
		$recommend = br_get_book_recommendation($book['object_id']);
		$titletemp = $wpdb->get_row("SELECT post_title,post_content FROM $wpdb->posts WHERE ID='$book[object_id]'",'ARRAY_N');
		$title = $titletemp[0];
		$content = $titletemp[1];
		$booklist[$c] = $title."|".$author."|".$recommend."|".$book_img."|".$book_link."|".$content."|".$book['post_id']; 
		$c++;
	}
	
	return $booklist;
}

function br_display_books($cat_ID) {
  $books = br_get_books($cat_ID);
	$c = 0;
  foreach ($books as $book) {
	  $details = explode("|",$book);
		$title = $details[0];
		$author = $details[1];
		$recommend = ucwords($details[2]);
		$image = $details[3];
		$link = $details[4];
		$content = $details[5];
		$id = $details[6];

		echo "<div class=\"book\">";
		if ($image != '' && $link != '') {
		  echo "<a href=\"$link\" title=\"$title\"><img src=\"$image\" alt=\"$title book cover\" class=\"bookimg\" /></a>";
		}	elseif ($image != '') {
		  echo "<img src=\"$image\" alt=\"$title book cover\" class=\"bookimg\" />";
		}
	  echo "<h3>$title</h3>";
		echo "<p class=\"author\">by $author</p>";
		echo "<p>Recommend: $recommend</p>";
		$content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    echo $content;
		echo "<p><a href=\"$link\" title=\"Buy $title from Amazon\">Buy from Amazon.co.uk</a></p>";
		echo "</div>";
	}
}

function br_get_books_by_author() {
global $wpdb;

$authors = $wpdb->get_col("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key='author' GROUP BY meta_value");

foreach ($authors as $author) {
  echo "<h3>$author</h3>\n";
	$books = $wpdb->get_results("SELECT * FROM $wpdb->postmeta INNER JOIN $wpdb->posts ON $wpdb->postmeta.post_id=$wpdb->posts.ID WHERE meta_value='$author' AND ($wpdb->posts.post_status='publish' OR $wpdb->posts.post_status='static')", ARRAY_A);
  echo "<ul class=\"books\">\n";
	$c = 0;
	foreach ($books as $book) {
	  $link = $wpdb->get_col("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key='book_link' AND $wpdb->postmeta.post_id='$book[post_id]'");
    $mylink = $wpdb->get_col("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key='second_hand_link' AND $wpdb->postmeta.post_id='$book[post_id]'");
    $recommended = $wpdb->get_col("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key='recommended' AND $wpdb->postmeta.post_id='$book[post_id]'");
    if ( $c % 2 ) {
      echo "<li class=\"alt\"><h6>$book[post_title]";
		} else {
		  echo "<li><h6>$book[post_title]";
		}
		if ($recommended[0] != '') { ?>
		<img src="<?php bloginfo('template_url') ?>/images/rec_<?php echo $recommended[0]; ?>.gif" alt="<?php echo $recommended[0]; ?> recommended image" width="16px" height="16px"></h6> 
    <?php } else {
		  echo "<span class=\"rec\">&nbsp;</span></h6>";
		}
		echo "<p class=\"bookmeta\">";
		if ($book['post_content'] != '') {
		printf("<a href=\"%s\" title=\"Read Review of %s\">Read Review</a> | ",$book['guid'],$book['post_title']);
		}
		
	  if ($link[0] != '') { 
	  printf("<a href=\"%s\" title=\"Buy %s New\">Buy New</a> | ",$link[0],$book['post_title']);
		}
		
		if ($mylink[0] != '') { 
	  printf("<a href=\"%s\" title=\"Buy %s Second Hand\">Buy My Copy</a>",$mylink[0],$book['post_title']);
		}
		
	  echo "</p><div class=\"clear\"></div></li>\n";
		$c++;
	}
	echo "</ul>\n";
}

}

function br_get_books_list($liststyle='<ul>',$beforebook='',$afterbook='',$between='',$sortorder='author') {
global $wpdb;

if ($sortorder == 'author') {
$authors = $wpdb->get_col("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key='author' GROUP BY meta_value");

foreach ($authors as $author) {
  echo "<h3 class=\"author\">$author</h3>\n";
	$books = $wpdb->get_results("SELECT * FROM $wpdb->postmeta INNER JOIN $wpdb->posts ON $wpdb->postmeta.post_id=$wpdb->posts.ID WHERE meta_value='$author' AND ($wpdb->posts.post_status='publish' OR $wpdb->posts.post_status='static')", ARRAY_A);
  switch ($liststyle) {
	case '<ul>':
    echo "<ul class=\"books\">\n";
	  break;
	case '<ol>':
	  echo "<ol class=\"books\">\n";
		break;
	case '<dl>':
	  echo "<dl class=\"books\">\n";
		break;
	}
	$c = 0;
	foreach ($books as $book) {
    if ( $c % 2 ) {
		  $altbefore  = str_replace('>',' class="alt">',$beforebook);
      echo $altbefore."<span class=\"btitle\"><a href=\"$book[guid]\" title=\"Read review of $book[post_title]\">$book[post_title]</a></span>".$afterbook;
		} else {
		  echo $beforebook."<span class=\"btitle\"><a href=\"$book[guid]\" title=\"Read review of $book[post_title]\">$book[post_title]</a></span>".$afterbook;
		}
		$c++;
	}
	switch ($liststyle) {
	case '<ul>':
    echo "</ul>\n";
	  break;
	case '<ol>':
	  echo "</ol>\n";
		break;
	case '<dl>':
	  echo "</dl>\n";
		break;
	}
}
} // if author
elseif ($sortorder == 'title') {
  $book_category = get_option('book_review_categories');
	$catcheck = '(';
	foreach ($book_category AS $key=>$category) {
	  if ($key == 0) {
	    $catcheck .= "$wpdb->term_relationships.term_taxonomy_id='".$category."'";
		} elseif ($key == count($book_category)) {
		  $catcheck .= " OR "."$wpdb->term_relationships.term_taxonomy_id='".$category."'";
		} else {
		  $catcheck .= " OR "."$wpdb->term_relationships.term_taxonomy_id='".$category."'";
		}
	}
	$catcheck .= ')';
  $books = $wpdb->get_results("SELECT * FROM $wpdb->postmeta INNER JOIN $wpdb->posts ON $wpdb->postmeta.post_id=$wpdb->posts.ID INNER JOIN $wpdb->term_relationships ON $wpdb->postmeta.post_id=$wpdb->term_relationships.object_id WHERE $catcheck AND $wpdb->postmeta.meta_key='author' AND ($wpdb->posts.post_status='publish' OR $wpdb->posts.post_status='static') AND $wpdb->posts.post_type!='page' ORDER BY $wpdb->posts.post_title", ARRAY_A);
  switch ($liststyle) {
	case '<ul>':
    echo "<ul class=\"books\">\n";
	  break;
	case '<ol>':
	  echo "<ol class=\"books\">\n";
		break;
	case '<dl>':
	  echo "<dl class=\"books\">\n";
		break;
	}
	$c = 0;
	foreach ($books as $book) {
	  $author = br_get_book_author($book['ID']);
    if ( $c % 2 ) {
		  $altbefore  = str_replace('>',' class="alt">',$beforebook);
      echo $altbefore."<span class=\"btitle\"><a href=\"$book[guid]\" title=\"Read review of $book[post_title]\">$book[post_title]</a></span>".$between."<span class=\"author\">$author</span>".$afterbook;
		} else {
		  echo $beforebook."<span class=\"btitle\"><a href=\"$book[guid]\" title=\"Read review of $book[post_title]\">$book[post_title]</a></span>".$between."<span class=\"author\">$author</span>".$afterbook;
		}
		$c++;
	}
	switch ($liststyle) {
	case '<ul>':
    echo "</ul>\n";
	  break;
	case '<ol>':
	  echo "</ol>\n";
		break;
	case '<dl>':
	  echo "</dl>\n";
		break;
	}
}  //if title
elseif ($sortorder == 'published_newest' || $sortorder == 'published_oldest') {
  $book_category = get_option('book_review_categories');
	$catcheck = '(';
	foreach ($book_category AS $key=>$category) {
	  if ($key == 0) {
	    $catcheck .= "$wpdb->term_relationships.term_taxonomy_id='".$category."'";
		} elseif ($key == count($book_category)) {
		  $catcheck .= " OR "."$wpdb->term_relationships.term_taxonomy_id='".$category."'";
		} else {
		  $catcheck .= " OR "."$wpdb->term_relationships.term_taxonomy_id='".$category."'";
		}
	}
	$catcheck .= ')';
	if ($sortorder == 'published_newest') {
	  $order = 'DESC';
	} elseif ($sortorder == 'published_oldest') {
	  $order = 'ASC';
	}
  //$books = $wpdb->get_results("SELECT * FROM $wpdb->postmeta INNER JOIN $wpdb->posts ON $wpdb->postmeta.post_id=$wpdb->posts.ID INNER JOIN $wpdb->term_relationships ON $wpdb->postmeta.post_id=$wpdb->term_relationships.object_id WHERE $catcheck AND $wpdb->postmeta.meta_key='author' AND ($wpdb->posts.post_status='publish' OR $wpdb->posts.post_status='static') AND $wpdb->posts.post_type!='page' ORDER BY $wpdb->posts.post_date $order", ARRAY_A);
  $books = $wpdb->get_results("SELECT * FROM $wpdb->postmeta INNER JOIN $wpdb->posts ON $wpdb->postmeta.post_id=$wpdb->posts.ID INNER JOIN $wpdb->term_relationships ON $wpdb->postmeta.post_id=$wpdb->term_relationships.object_id WHERE $catcheck AND $wpdb->postmeta.meta_key='author' AND ($wpdb->posts.post_status='publish' OR $wpdb->posts.post_status='static') AND $wpdb->posts.post_type!='page' ORDER BY $wpdb->posts.post_date $order", ARRAY_A);
  switch ($liststyle) {
	case '<ul>':
    echo "<ul class=\"books\">\n";
	  break;
	case '<ol>':
	  echo "<ol class=\"books\">\n";
		break;
	case '<dl>':
	  echo "<dl class=\"books\">\n";
		break;
	}
	$c = 0;
	foreach ($books as $book) {
	  $author = br_get_book_author($book['ID']);
    if ( $c % 2 ) {
		  $altbefore  = str_replace('>',' class="alt">',$beforebook);
      echo $altbefore."<span class=\"btitle\"><a href=\"$book[guid]\" title=\"Read review of $book[post_title]\">$book[post_title]</a></span>".$between."<span class=\"author\">$author</span>".$afterbook;
		} else {
		  echo $beforebook."<span class=\"btitle\"><a href=\"$book[guid]\" title=\"Read review of $book[post_title]\">$book[post_title]</a></span>".$between."<span class=\"author\">$author</span>".$afterbook;
		}
		$c++;
	}
	switch ($liststyle) {
	case '<ul>':
    echo "</ul>\n";
	  break;
	case '<ol>':
	  echo "</ol>\n";
		break;
	case '<dl>':
	  echo "</dl>\n";
		break;
	}
}  //if published date

} //end function

add_action('admin_menu', 'br_add_book_panels');
add_action('admin_head', 'br_add_book_styles');
add_action('admin_menu', 'br_add_book_review_options');

?>