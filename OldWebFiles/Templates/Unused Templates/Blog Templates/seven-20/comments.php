<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>

<p class="nocomments">
  <?php _e("This post is password protected. Enter the password to view comments."); ?>
<p>
  <?php
				return;
            }
        }
		/* This variable is for alternating comment background */
		$oddcomment = 'alt';
?>
<div id="commentblock">

	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
	<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment. </p>
    <?php else : ?>
    
   <h2>Comments</h2>
  <?php if ($comments) : ?>
<small>
						This entry was posted
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?> 
						on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?>
						and is filed under <?php the_category(', ') ?>.
						You can follow any responses to this entry through the <?php comments_rss_link('RSS 2.0'); ?> feed. 
						
						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(display); ?>">trackback</a> from your own site.
						
						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Responses are currently closed, but you can <a href="<?php trackback_url(display); ?> ">trackback</a> from your own site.
						
						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							You can skip to the end and leave a response. Pinging is currently not allowed.
			
						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							Both comments and pings are currently closed.			
						
						<?php } edit_post_link('Edit this entry.','',''); ?>
						
					</small>
<h2><?php comments_number(__('No Comment'), __('1 Comment so far'), __('% Comments so far')); ?></h2>
<br />
  <ol id="commentlist">
    <?php foreach ($comments as $comment) : ?>
    <li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
        <?php comment_author_link()?> on 
        <?php comment_date('F j, Y') ?>
        <?php comment_time()?>
		<?php edit_comment_link(__("Edit This"), ''); ?> 

      <?php if ($comment->comment_approved == '0') : ?>
      <em>Your comment is awaiting moderation.</em>
      <?php endif; ?>
      <?php 
					if(the_author('', false) == get_comment_author())
						echo "<div class='commenttext-admin'>";
					else
						echo "<div class='commenttext'>";
					comment_text();
					echo "</div>";
					
					?>
    </li>
    <?php /* Changes every other comment to a different class */	
					if ('alt' == $oddcomment){
						$oddcomment = 'standard';
					}
					else {
						$oddcomment = 'alt';
					}
				?>
    <?php endforeach; /* end for each comment */ ?>
  </ol>
  <?php else : // this is displayed if there are no comments so far ?>
  <?php if ('open' == $post-> comment_status) : ?>
  <!-- If comments are open, but there are no comments. -->
  <?php else : // comments are closed ?>
  <!-- If comments are closed. -->
  <p class="nocomments">Comments are closed.</p>
  <?php endif; ?>
  <?php endif; ?>
  <?php if ('open' == $post-> comment_status) : ?>
  <?php endif; // If registration required and not logged in ?>
  <?php endif; // if you delete this the sky will fall on your head ?>
  
<div id="commentsform">
    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
      <?php if ( $user_ID ) : ?>
      
      <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="<?php _e('Log out of this account') ?>"> Logout &raquo; </a> </p>
      <?php else : ?>
      
      <p><?php _e('Name ');?><?php if ($req) _e('(required)'); ?><br />
      <input type="text" name="author" id="s1" value="<?php echo $comment_author; ?>" size="30" tabindex="1" />
      </p>
      
      <p><?php _e('Email ');?><?php if ($req) _e('(required)'); ?><br />
      <input type="text" name="email" id="s2" value="<?php echo $comment_author_email; ?>" size="30" tabindex="2" />
      </p>
      
      <p><?php _e('Website');?><br />
      <input type="text" name="url" id="s3" value="<?php echo $comment_author_url; ?>" size="30" tabindex="3" />
      </p>
      
      <?php endif; ?>
      <p>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></p>
      <p><?php _e('Share your wisdom');?><br />
      <textarea name="comment" id="s4" cols="90" rows="10" tabindex="4"></textarea>
      </p>
      
      <p>
        <input name="submit" type="submit" id="hbutt" tabindex="5" value="Submit" />
        <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
      </p>
      <?php do_action('comment_form', $post->ID); ?>
    </form>

  </div>
</div>