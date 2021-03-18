<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">This post is password protected. Enter the password to view comments.</p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = '-alt';
?>

<!-- You can start editing here. -->
<div class="comments">

<?php if ($comments) : ?>
	<h3 class="comments">Comments</h3>


	<?php foreach ($comments as $comment) : ?>

		<div class="comment-box-top<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
			<div class="comment-box-bottom<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
				<div class="comment-box-middle<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
					<div class="avatar">
						<?php
						  if ( !empty( $comment->comment_author_email ) ) {
								  $md5 = md5( $comment->comment_author_email );
								  $default = urlencode( get_bloginfo('stylesheet_directory'). '/images/blank.gif' );
								  echo "<img class='foravatars' src='http://www.gravatar.com/avatar.php?gravatar_id=$md5&amp;size=60&amp;default=$default' alt='Gravatar' />";
						  }
						  ?>
					  </div>
					  <div class="commenttext"> 
							<cite><?php comment_author_link() ?></cite><span class="comment-date"><?php comment_date('jMy') ?></span>
							<?php if ($comment->comment_approved == '0') : ?>
							<em>Your comment is awaiting moderation.</em>
							<?php endif; ?>
							<br class="clear" />
							
							<?php comment_text() ?>
					</div>
				</div>
			</div>
		</div>
	
	<?php
		/* Changes every other comment to a different class */
		$oddcomment = ( empty( $oddcomment ) ) ? '-alt' : '';
	?>

	<?php endforeach; /* end for each comment */ ?>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<div id="leavecomment">
	<div class="comment-box-top">
		<div class="comment-box-bottom">
			<div class="comment-box-middle">

				<h3 id="respond">Leave a Comment</h3>
				
				<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
				<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
				<?php else : ?>
				
				<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
				
				<?php if ( $user_ID ) : ?>
				
				<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout</a></p>
				
				<?php else : ?>
				<div id="commentform">
					<div id="who">
						<p><label for="author">Name <em><?php if ($req) echo "(required)"; ?></em></label>
						<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" /></p>
						
						<p><label for="email">E-mail <em><?php if ($req) echo "(required)"; ?></em></label><br />
						<em>This will not be published</em>
						<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" /></p>
						
						<p><label for="url">Website</label>
						<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" /></p>
					</div>
					
					<?php endif; ?>
					
						<p><label for="comment">Comment</label>
						<textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>
						
						<p class="submit"><input name="submit" type="submit" id="submit" value="Submit Comment" tabindex="5" />
						<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>

				</div>
		</div>
	</div>
</div>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
</div>
