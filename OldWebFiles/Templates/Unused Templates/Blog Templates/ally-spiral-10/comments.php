<?php if (!empty($post->post_password) && $_COOKIE['wp-postpass_'.COOKIEHASH]!=$post->post_password) : ?>
	<p id="comments-locked">Enter your password to view comments.</p>
<?php return; endif; ?>

<?php if ($comments) : ?>

<?php 

	/* Author values for author highlighting */
	/* Enter your email and name as they appear in the admin options */
	$author = array(
			"highlight" => "highlight",
			"email" => "YOUR EMAIL HERE",
			"name" => "YOUR NAME HERE"
	); 

	/* Count the totals */
	$numPingBacks = 0;
	$numComments  = 0;

	/* Loop throught comments to count these totals */
	foreach ($comments as $comment) {
		if (get_comment_type() != "comment") { $numPingBacks++; }
		else { $numComments++; }
	}
	
	/* Used to stripe comments */
	$thiscomment = 'odd'; 
?>

<?php

	/* This is a loop for printing pingbacks/trackbacks if there are any */
	if ($numPingBacks != 0) : ?>

	<h1><?php _e($numPingBacks); ?> Trackbacks/Pingbacks</h1>
	<ol id="trackbacks">
	
<?php foreach ($comments as $comment) : ?>
<?php if (get_comment_type()!="comment") : ?>

	<li id="comment-<?php comment_ID() ?>" class="<?php _e($thiscomment); ?>">
	<?php comment_type(__('Comment'), __('Trackback'), __('Pingback')); ?>: 
	<?php comment_author_link(); ?> on <?php comment_date(); ?>
	</li>
	
	<?php if('odd'==$thiscomment) { $thiscomment = 'even'; } else { $thiscomment = 'odd'; } ?>
	
<?php endif; endforeach; ?>

	</ol>

<?php endif; ?>

<?php 

	/* This is a loop for printing comments */
	if ($numComments != 0) : ?>

	<div class="post">
	<h1><?php _e($numComments); ?> Comments</h1>

	<ol id="comments">
	
	<?php foreach ($comments as $comment) : ?>
	<?php if (get_comment_type()=="comment") : ?>
	
		<li id="comment-<?php comment_ID(); ?>" class="<?php 
		
		/* Highlighting class for author or regular striping class for others */
		
		/* Get current author name/e-mail */
		$this_name = $comment->comment_author;
        $this_email = $comment->comment_author_email;
        
        /* Compare to $author array values */
        if (strcasecmp($this_name, $author["name"])==0 && strcasecmp($this_email, $author["email"])==0)
			_e($author["highlight"]); 
		else 
			_e($thiscomment); 
		
		?>">
		<div class="content archive"><div class="contentin"><div class="conin">
			<div class="comment-meta">
				<span class="comment-author"><?php comment_author_link() ?></span>, 
				<span class="comment-date"><?php comment_date() ?></span>:
			</div>
			<div class="comment-text">
				<?php comment_text(); ?>
			</div>
		</div></div></div>
		</li>
		
	<?php if('odd'==$thiscomment) { $thiscomment = 'even'; } else { $thiscomment = 'odd'; } ?>
	
	<?php endif; endforeach; ?>
	
	</ol>
   </div>
	<?php endif; ?>
	
<?php else : 

	/* No comments at all means a simple message instead */ 
?>

	<h1>No Comments Yet - You can be the first to comment!</h1>
	
<?php endif; ?>

<?php if (comments_open()) : ?>

	<div class="post">
	<h1>Leave a comment</h1>
	<?php if (get_option('comment_registration') && !$user_ID ) : ?>
		<p id="comments-blocked">You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=
		<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

	<?php if ($user_ID) : ?>
	
	<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php">
		<?php echo $user_identity; ?></a>. 
		<a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" 
		title="Log out of this account">Logout</a>
	</p>
	
	<?php else : ?>
	
		<p><input class="cf" type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" />
		<label for="author">Name<?php if ($req) _e(' (required)'); ?></label></p>
		
		<p><input class="cf" type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" />
		<label for="email">E-mail (will not be published)<?php if ($req) _e(' (required)'); ?></label></p>
		
		<p><input class="cf" type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" />
		<label for="url">Website</label></p>
	
	<?php endif; ?>

		<p><textarea name="comment" id="comment" rows="5" cols="30"></textarea></p>
		
		<p><button type="submit" name="submit" id="sub">Submit</button>
		<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>
	
	<?php do_action('comment_form', $post->ID); ?>

	</form><br />
    </div>

<?php endif; // If registration required and not logged in ?>

<?php else : // Comments are closed ?>
	<p id="comments-closed">Sorry, comments for this entry are closed at this time.</p>
<?php endif; ?>