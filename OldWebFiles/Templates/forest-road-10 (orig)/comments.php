<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

			<p class="nocomments">This post is password protected. Enter the password to view comments.<p>

			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$oddcomment = 'alt';
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>
	<div class="blog_comm">
		<div class="comm_title">
			Comments:
		</div>
		<div class="comm_count">
			<?php comments_number('0 Comments', '1 Comment', '% Comments' );?> posted on "<?php the_title(); ?>"
		</div>
	<?php foreach ($comments as $comment) : ?>
		
		<div class="comm_data">
			<div class="comm_data_pad">
				<b><?php comment_author_link() ?></b> on <?php comment_date('F jS, Y') ?> at <?php comment_time() ?> #
			</div>
		</div>
		<div class="comm_text">
			<?php comment_text() ?>
		</div>
		<div class="bl_line"></div>
		<br />

	<?php /* Changes every other comment to a different class */
		if ('alt' == $oddcomment) $oddcomment = '';
		else $oddcomment = 'alt';
	?>

	<?php endforeach; /* end for each comment */ ?>
		
	</div>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<div id="comm_form">

<?php if (
		get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<div class="form_table">
	<div id="form_title">
		<div id="form_title_text">Post a comment</div>
	</div>
<table cellpadding="2"> 
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<tr>
	<td align="right" width="110"></td>
	<td>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></td>
</tr>

<?php else : ?>

<tr>
	<td align="right" width="110">Name:&nbsp;</td>
	<td><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="30" tabindex="1" /></td>
</tr>
<tr>
	<td align="right">Email:&nbsp;</td>
	<td><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="30" tabindex="2" /></td>
</tr>
<tr>
	<td align="right">URL:&nbsp;</td>
	<td><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="30" tabindex="3" /></td>
</tr>

<?php endif; ?>

<!--<p><small><strong>XHTML:</strong> You can use these tags: <?php echo allowed_tags(); ?></small></p>-->
<tr>
	<td align="right" valign="top">Comments:&nbsp;</td>
	<td><textarea cols="38" rows="5" name="comment" id="comment"></textarea></td>
</tr>
<tr>
	<td></td>
	<td>
		<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
		<input type="image" src="<?php bloginfo('stylesheet_directory'); ?>/images/sub.png" width="65" height="25" id="submit" tabindex="5" />
	</td>
</tr>
<?php do_action('comment_form', $post->ID); ?>

</form>
</table>
								<div class="form_comm_end"></div>
							</div>

<?php endif; // If registration required and not logged in ?>
							</div>

<?php endif; // if you delete this the sky will fall on your head ?>
