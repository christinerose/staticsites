<?php

////////////////////////////////////////////////////////////////////////////////
// Recent Comments
////////////////////////////////////////////////////////////////////////////////
function mw_recent_comments(
	$no_comments = 8,
	$show_pass_post = false,
	$title_length = 50, 	// shortens the title if it is longer than this number of chars
	$author_length = 30,	// shortens the author if it is longer than this number of chars
	$wordwrap_length = 50, // adds a blank if word is longer than this number of chars
	$type = 'all', 	// Comments, trackbacks, or both?
	$format = '<li>%date%: <a href="%permalink%" title="%title%">%title%</a> (von %author_full%)</li>',
	$date_format = 'd.m.y, H:i',
	$none_found = '<li>Keine Kommentare vorhanden.</li>',	// None found
	$type_text_pingback = 'Pingback von',
	$type_text_trackback = 'Trackback von',
	$type_text_comment = 'von'

	) {

	//Language...
	$mwlang_anonymous = 'Anonym'; // Anonymous
	$mwlang_authorurl_title_before = 'Webseite von &lsaquo;';
	$mwlang_authorurl_title_after = '&rsaquo; besuchen';


    global $wpdb;

    $request = "SELECT ID, comment_ID, comment_content, comment_author, comment_author_url, comment_date, post_title, comment_type
				FROM $wpdb->comments LEFT JOIN $wpdb->posts ON $wpdb->posts.ID=$wpdb->comments.comment_post_ID
				WHERE post_status IN ('publish','static')";

	switch($type) {
		case 'all':
			// add nothing
			break;
		case 'comment_only':
			//
			$request .= "AND $wpdb->comments.comment_type='' ";
			break;
		case 'trackback_only':
			$request .= "AND ( $wpdb->comments.comment_type='trackback' OR $wpdb->comments.comment_type='pingback' ) ";
			break;
	 default:
 		//
			break;

	}

	if (!$show_pass_post) $request .= "AND post_password ='' ";

	$request .= "AND comment_approved = '1' ORDER BY comment_ID DESC LIMIT $no_comments";

	$comments = $wpdb->get_results($request);
    $output = '';
	if ($comments) {
    	foreach ($comments as $comment) {

			// Permalink to post/comment
			$loop_res['permalink'] = get_permalink($comment->ID). '#comment-' . $comment->comment_ID;

			// Title of the post
			$loop_res['post_title'] = stripslashes($comment->post_title);
			$loop_res['post_title'] = wordwrap($loop_res['post_title'], $wordwrap_length, ' ' , 1);

			if (strlen($loop_res['post_title']) >= $title_length) {
				$loop_res['post_title'] = substr($loop_res['post_title'], 0, $title_length) . '&#8230;';
			}

			// Author's name only
        	$loop_res['author_name'] = stripslashes($comment->comment_author);
			$loop_res['author_name'] = wordwrap($loop_res['author_name'], $wordwrap_length, ' ' , 1);

			if ($loop_res['author_name'] == '') $loop_res['author_name'] = $mwlang_anonymous;
			if (strlen($loop_res['author_name']) >= $author_length) {
				$loop_res['author_name'] = substr($loop_res['author_name'], 0, $author_length) . '&#8230;';
			}

			// Full author (link, name)
			$author_url = $comment->comment_author_url;
			if (empty($author_url)) {
				$loop_res['author_full'] = $loop_res['author_name'];
			} else {
				$loop_res['author_full'] = '<a href="' . $author_url . '" title="' . $mwlang_authorurl_title_before . $loop_res['author_name'] . $mwlang_authorurl_title_after . '">' . $loop_res['author_name'] . '</a>';
			}

/*
			// Comment excerpt
			$comment_excerpt = strip_tags($comment->comment_content);
			$comment_excerpt = stripslashes($comment_excerpt);
			if (strlen($comment_excerpt) >= $comment_length) {
				$comment_excerpt = substr($comment_excerpt, 0, $comment_length) . '...';
			}

*/

			// Comment type
			if ( $comment->comment_type == 'pingback' ) {
				$loop_res['comment_type'] = $type_text_pingback;
			} elseif ( $comment->comment_type == 'trackback' ) {
				$loop_res['comment_type'] = $type_text_trackback;
			} else {
				$loop_res['comment_type'] = $type_text_comment;
			}

			// Date of comment
			$loop_res['comment_date'] = mysql2date($date_format, $comment->comment_date);

			// Output element
			$element_loop = str_replace('%permalink%', $loop_res['permalink'], $format);
			$element_loop = str_replace('%title%', $loop_res['post_title'], $element_loop);
			$element_loop = str_replace('%author_name%', $loop_res['author_name'], $element_loop);
			$element_loop = str_replace('%author_full%', $loop_res['author_full'], $element_loop);
			$element_loop = str_replace('%date%', $loop_res['comment_date'], $element_loop);
			$element_loop = str_replace('%type%', $loop_res['comment_type'], $element_loop);


			$output .= $element_loop . "\n";


		} //foreach

		$output = convert_smilies($output);

	} else {
		$output .= $none_found;
    }

    echo $output;
}


function get_leftbar(){
include (TEMPLATEPATH . "/left_sidebar.php");
}

// below are widget custom to custom the widget looks without the default //

if ( function_exists('register_sidebars') )  {

register_sidebars(2, array(
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
       ));

    function unregister_problem_widgets() {
unregister_sidebar_widget('Calendar');
unregister_sidebar_widget('RSS 1');
unregister_sidebar_widget('Search');
unregister_sidebar_widget('Links');
unregister_sidebar_widget('Recent Comments');
unregister_sidebar_widget('Recent Posts');
}
add_action('widgets_init','unregister_problem_widgets');
}




// below are widget custom to custom the widget looks without the default //

function widget_mytheme_blogroll() {
?>
<h3>Blogroll</h3>
		<ul>
		<?php get_links(-1, '<li>', '</li>', ' - '); ?>
		</ul>
<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Blogroll'), 'widget_mytheme_blogroll');

function widget_mytheme_mycalendar() {
?>
<?php get_calendar(2); ?>
<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Calendars'), 'widget_mytheme_mycalendar');

function widget_mytheme_myrecentcomment() {
?>
<h3>Recent Comments </h3>
		<ul>
		<?php mw_recent_comments(10, false, 35, 15, 35, 'all', '<li><a href="%permalink%" title="%title%"><strong>%author_name%</strong> in %title%</a></li>','d.m.y, H:i'); ?>
		</ul>
<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('LatestComment'), 'widget_mytheme_myrecentcomment');


function widget_mytheme_myrecentpost() {
?>

<h3>Recent Entries</h3>
<ul>
<?php get_archives('postbypost', 10); ?>
</ul>

<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Recentpost'), 'widget_mytheme_myrecentpost');


function widget_mytheme_mytranslator() {
?>

<h3>Translators</h3>
<a href="http://translate.google.com/translate?u=<?php bloginfo('url'); ?>&amp;langpair=en%7Cfr&amp;hl=fr&amp;ie=UTF-8&amp;ie=UTF-8&amp;oe=UTF-8&amp;prev=%2Flanguage_tools"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/fr.gif" alt="French" title="Translate in French" /></a>
	<a href="http://translate.google.com/translate?u=<?php bloginfo('url'); ?>&amp;langpair=en%7Cde&amp;hl=de&amp;ie=UTF-8&amp;ie=UTF-8&amp;oe=UTF-8&amp;prev=%2Flanguage_tools"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/de.gif" alt="German version" title="Translate in German" /></a>
	<a href="http://translate.google.com/translate?u=<?php bloginfo('url'); ?>&amp;langpair=en%7Ces&amp;hl=es&amp;ie=UTF-8&amp;ie=UTF-8&amp;oe=UTF-8&amp;prev=%2Flanguage_tools"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/es.gif" alt="Spanish version" title="Translate in Spanish" /></a>
	<a href="http://translate.google.com/translate?u=<?php bloginfo('url'); ?>&amp;langpair=en%7Cit&amp;hl=it&amp;ie=UTF-8&amp;ie=UTF-8&amp;oe=UTF-8&amp;prev=%2Flanguage_tools"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/it.gif" alt="Italian version" title="Translate in Italian" /></a>
   </ul>

<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('Translator'), 'widget_mytheme_mytranslator');



 function widget_mytheme_mysocial() {
?>

<h3>Social Network</h3>
		<ul>
       <li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>">Subscribes to feed</a></li>
<li><a href="http://www.stumbleupon.com/submit?url=<?php the_permalink() ?>&amp;title=<?php the_title(); ?>" target="_new" >Stumble this site <strong>main post</strong></a></li>
<li><a href="http://technorati.com/faves?add=<?php echo get_settings('home'); ?>">Add to my <strong>Technorati</strong> favourite</a></li>
</ul>

<?php
}
if ( function_exists('register_sidebar_widget') )
    register_sidebar_widget(__('MySocial'), 'widget_mytheme_mysocial');

?>