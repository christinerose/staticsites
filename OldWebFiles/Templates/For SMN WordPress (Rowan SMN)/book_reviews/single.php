<?php get_header();
/* This works out what categories your books are in so it can compare it to the category of this post */ 
$book_category = get_option('book_review_categories');
$catlist = get_the_category();
$checkcat = 0;
foreach ($catlist as $cat) {
  if (in_array($cat->cat_ID,$book_category)) {
	  $checkcat = 1;
	}
}
?>

	<div id="content" class="widecolumn">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>

		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php
		/* If a book, add the author */
		if ($checkcat == 1) { echo "<span style=\"font-style:italic\">By ".br_get_book_author($id)."</span>"; } ?>

			<div class="entry">
			  <?php
				/* If a book, and it has an image, display it */
				if ($checkcat == 1 && '' != br_get_book_image($id)) { ?>
				<img src="<?php echo br_get_book_image($id); ?>" />
				<?php } ?>
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
				
				<?php 
				/* If a book, and it has a link, create a link to it with the text Book Link */
				if ($checkcat == 1 && '' != br_get_book_link($id)) {
    			$booklink = br_get_book_link($id);
	  			echo "<p><a href=\"$booklink\" title=\"Link for $title\">Book Link</a></p>";
				}
				?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

				<p class="postmetadata alt">
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
							You can <a href="#respond">leave a response</a>, or <a href="<?php trackback_url(true); ?>" rel="trackback">trackback</a> from your own site.

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Responses are currently closed, but you can <a href="<?php trackback_url(true); ?> " rel="trackback">trackback</a> from your own site.

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							You can skip to the end and leave a response. Pinging is currently not allowed.

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							Both comments and pings are currently closed.

						<?php } edit_post_link('Edit this entry.','',''); ?>

					</small>
				</p>

			</div>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

	</div>

<?php get_footer(); ?>
