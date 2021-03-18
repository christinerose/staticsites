<?php // Do not delete these lines

if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))

die ('Please do not load this page directly. Thanks!');

if (!empty($post->post_password)) { // if there's a password

if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie

?>

<h3><?php _e("This post is password protected. Enter the password to view comments."); ?></h3>

<?php

return;

}

}

$commentalt = '_alt';

$commentcount = 1;

?>

<div id="comment-temps">
			 <h2><?php comments_number('No user', '1 user', '% users' );?> commented in &quot; <?php the_title(); ?> &quot; </h2>
			<span class="rssfeed">
            Follow-up <?php comments_rss_link('comment rss'); ?> or Leave a <a href="<?php trackback_url(display); ?>">Trackback</a>
            </span>
            <p><script type="text/javascript"><!--
google_ad_client = "";
google_ad_width = 468;
google_ad_height = 60;
google_ad_format = "468x60_as";
google_ad_type = "text";
google_ad_channel = "";
google_color_border = "ffffff";
google_color_bg = "ffffff";
google_color_link = "333333";
google_color_text = "333333";
google_color_url = "80856B";
//-->
</script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></p>

<div class="post-fixed"></div>

<?php if ($comments) : ?>

<?php foreach ($comments as $comment) : ?>

<div class="com-box<?php echo $commentalt; ?>">
			<div class="author_com"><?php comment_author_link(); ?> said,</div>
			<div class="author_date">
            in <?php comment_date('F jS, Y') ?> at <?php comment_time() ?> <?php edit_comment_link('edit','',''); ?>
            </div>
			<div class="author_com_text">
            <?php comment_text() ?>
            </div>
			</div>

			<div class="com-fixed"></div>

<?php

($commentalt == "_alt")?$commentalt="":$commentalt="_alt";

$commentcount++;

?>

<?php endforeach; /* end for each comment */ ?>

<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>

<?php if (get_option('comment_registration') && !$user_ID) : ?>


<?php else : ?>


<div class="com-fixed"></div>
<p><script type="text/javascript"><!--
google_ad_client = "";
google_ad_width = 468;
google_ad_height = 60;
google_ad_format = "468x60_as";
google_ad_type = "text";
google_ad_channel = "";
google_color_border = "ffffff";
google_color_bg = "ffffff";
google_color_link = "333333";
google_color_text = "333333";
google_color_url = "80856B";
//-->
</script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></p>

<h4>Leave A Reply</h4>


<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
<?php if (!$user_ID) : ?>
<div id="comment-box">
<p><input name="author" type="text" value="<?php echo $comment_author; ?>"/>&nbsp;Username (*required)</p>
<p><input name="email" type="text" value="<?php echo $comment_author_email; ?>"/>&nbsp;Email Address (*private)</p>
<p><input name="url" type="text" value="<?php echo $comment_author_url; ?>"/>&nbsp;Website (*optional)</p>
</div>
<?php endif; ?>


<div id="comment-area">
<p><textarea name="comment" cols="50%" rows="8"></textarea></p>
<p><input name="submit" type="submit" value="Post My Comment" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>
</div>
</form>
<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>
</div>