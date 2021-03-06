<?php // Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'newcomments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) { ?>
	<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
<?php
	return;
}

// add a microid to all the comments
function comment_add_microid($classes) {
	$c_email=get_comment_author_email();
	$c_url=get_comment_author_url();
	if (!empty($c_email) && !empty($c_url)) {
		$microid = 'microid-mailto+http:sha1:' . sha1(sha1('mailto:'.$c_email).sha1($c_url));
		$classes[] = $microid;
	}
	return $classes;	
}
add_filter('comment_class','comment_add_microid');

?>

<div class="postcont">
<div class="alignright">
  <div class="PTtop"><img src="<?php bloginfo('template_directory'); ?>/images/1pxtrans.gif" alt=" " /></div>
  <div class="PTbar">
     <div class="PT PTds"><span class="ptblurl">&nbsp;</span><h3><a name="comments"></a><?php _e('Responses to this post','inanis');?> &raquo; (<?php comments_number(__('None','inanis'), __('One Total','inanis'), __('% Total','inanis') );?>)</h3><span class="ptblurr">&nbsp;</span></div>
  </div>
  <div class="PTbtm"><img src="<?php bloginfo('template_directory'); ?>/images/1pxtrans.gif" alt=" " /></div>
  <div class="p1">
    <?php // show the comments
    if ( have_comments() ) : ?>
    	<ol class="commentlist" id="singlecomments">
    	<?php wp_list_comments(array('avatar_size'=>48, 'reply_text'=>__('Reply to this Comment','inanis'))); ?>
    	</ol>
    	<div>
    		<div class="alignleft"><?php previous_comments_link() ?></div>
    		<div class="alignright"><?php next_comments_link() ?></div>
    		<div style="clear:both;"></div>
    	</div>
     <?php else : // this is displayed if there are no comments so far ?>
    
    	<?php if ('open' == $post->comment_status) :
    		// none
    	else : 
    		?><p class="nocomments" style="text-align:center;margin:35px 0 35px 0;"><?php _e('Sorry, but comments are closed. Check out another post and speak up!','inanis');?></p><?php
    	endif;
    endif;
    if ('open' == $post-> comment_status) : 
    
    // show the form
    ?>
    <div id="respond"><h3><?php comment_form_title(__('Post a Comment','inanis'),__('Post a Reply to %s','inanis')); ?></h3>
    
    <div id="cancel-comment-reply">
    	<small><?php cancel_comment_reply_link(); ?></small>
    </div>
    
    <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
    
    <p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
    
    <?php else : ?>
    
    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
    
    <?php if ( $user_ID ) : ?>
    
    <p><?php _e('Logged in as ','inanis');?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.
    <?php
        $vers = get_bloginfo('version');
        if ($vers >= "2.7"){
          /* Logout button for 2.7 and up */ 
          $logoutbtn1 = '<a title="'.__('Logout','inanis').'" href="' . wp_logout_url() . '"><span>'.__('Logout','inanis').' &raquo;</span>';
        }
        else {
          /* Logout Button for Less than 2.7 */
          $logoutbtn1 = '<a title="'.__('Logout','inanis').'" href="' . get_option('siteurl') . '/wp-login.php?action=logout"><span>'.__('Logout','inanis').' &raquo;</span>';
        }
        $logoutbtn2 = '</a>';
    ?>

    <?php echo $logoutbtn1;echo $logoutbtn2;?>
    <?php else : ?>
    
    <p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
    <label for="author"><small><?php _e('Name','inanis'); if ($req) _e('(required)','inanis'); ?></small></label></p>
    <p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
    <label for="email"><small><?php _e('Email (will not be published)','inanis'); if ($req) _e('(required)','inanis'); ?></small></label></p>
    <p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
    <label for="url"><small><?php _e('Website','inanis');?></small></label></p>
    
    <?php endif; ?>
    
    <div>
    <?php comment_id_fields(); ?>
    <input type="hidden" name="redirect_to" value="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>" /></div>
    
    <p><small><strong>XHTML:</strong> <?php _e('You can use these tags','inanis');?>: <?php echo allowed_tags(); ?></small></p>
    
    <p><textarea name="comment" id="comment" cols="50%" rows="10" tabindex="4" class="form-textarea"></textarea></p>
    
    <?php if (get_option("comment_moderation") == "1") { ?>
     <p><small><strong>Please note:</strong> Comment moderation is enabled and may delay your comment. There is no need to resubmit your comment.</small></p>
    <?php } ?>
    
    <p><input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Comment now','inanis');?>" class="form-submit"/></p>
    <?php do_action('comment_form', $post->ID); ?>
    
    </form>
    <?php endif; ?>
    </div>
    <?php 
    endif;?>
  </div>
  <div class="PFtop"><img src="<?php bloginfo('template_directory'); ?>/images/1pxtrans.gif" alt=" " /></div>
  <div class="PFpst">
    <span class="tagstyle spanchunk">
      <img class="tagicon" src="<?php bloginfo('template_directory'); ?>/images/feed_50.png" alt=" " />
      <small><strong><?php _e('Comment Meta','inanis');?>:</strong></small><br />
      <?php comments_rss_link(__('<abbr title="Really Simple Syndication">RSS</abbr> Feed for comments','inanis')); ?><br />
      <?php if ( pings_open() ) : ?> 
        <a href="<?php trackback_url() ?>" rel="trackback"><?php _e('TrackBack <abbr title="Uniform Resource Identifier">URI</abbr>','inanis'); ?></a> 
      <?php endif; ?>
    </span>
  </div>
  <div class="PFbtm"><img src="<?php bloginfo('template_directory'); ?>/images/1pxtrans.gif" alt=" " /></div>
  </div>
</div>
<?php
