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


<div id="commentblock">
<?php if ($comments) : ?>


	<ol class="commentlist">

	<?php foreach ($comments as $comment) : ?>

		<li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
                       
                        <?php echo get_avatar( $comment, 48); ?>                        
			<p class="bump_up"><span class="grande3"><?php comment_author_link() ?></span> on
			<?php if ($comment->comment_approved == '0') : ?>
			<em>Your comment is awaiting moderation.</em>
			<?php endif; ?>
			<?php comment_date('m.d.Y') ?> <?php edit_comment_link('(Edit)','',''); ?></p>
                   	<div class="commenttext">
			<?php comment_text() ?>
			</div>

		</li>

	<?php /* Changes every other comment to a different class */
		if ('alt' == $oddcomment) $oddcomment = '';
		else $oddcomment = 'alt';
	?>

	<?php endforeach; /* end for each comment */ ?>

	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p></div>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

<p class="grande2">Leave a Reply</p>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>

<?php else : ?>

<p class="label"><label for="author">Name <?php if ($req) echo "(Required)"; ?></label><br />
<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" tabindex="1" /></p>

<p class="label"><label for="email">Email Address <?php if ($req) echo "(Required)"; ?></label><br />
<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" /></p>

<p class="label"><label for="url">Website</label><br />
<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" /></p>

<?php endif; ?>

<p class="label2"><textarea name="comment" id="comment" cols="40" rows="10" tabindex="4"></textarea></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>

<?php do_action('comment_form', $post->ID); ?>

</form>
</div>

<?php endif; ?>

<?php endif; ?>