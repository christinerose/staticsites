<?php get_header(); ?>
<div id="main-content">
<!-- START OF WORDPRESS ENGINE //-->

	<?php if (have_posts()) : ?>
		
		
		 <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle">Archive for the '<?php echo single_cat_title(); ?>' Category</h2>

 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h2>

	 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h2>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>

	  <?php /* If this is a search */ } elseif (is_search()) { ?>
		<h2 class="pagetitle">Search Results</h2>

	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle">Author Archive</h2>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">Blog Archives</h2>

		<?php } ?>


		
		<?php while (have_posts()) : the_post(); ?>
		
			
			<div class="post<?php if(is_home() && $post==$posts[0] && !is_paged()) echo ' firstpost';?>">
				<small class="postdatecolor"><?php the_time('F jS, Y') ?> </small>
				<h2 id="post-<?php the_ID(); ?>" style="padding: 0px; margin: 0px;"><a class="gl3nnx" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>

				
				<div class="entry">
					<?php the_content('Read more...'); ?><br />
					<div id="postfooter"><small>By <b><?php the_author() ?></b> in <?php the_category(',') ?>&nbsp;<?php edit_post_link(' (Edit...) ','',' '); ?>  .::.  <?php comments_popup_link('(<u>Add your comment</u>)', '<u>Read Comment (1)</u>', '<u>Read Comments (%)</u>'); ?></small></div>
				</div>
<br class="clearing" />
			</div>
	
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php posts_nav_link('','','&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php posts_nav_link('','Next Entries &raquo;','') ?></div>
			<br class="clearing" />
		</div>
		
	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center"><?php _e("Sorry, but you are looking for something that isn't here."); ?></p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>


<div class="entrytext">
			<br />
			<small>
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
			</div>
<?php comments_template(); ?>	

<!-- END OF WORDPRESS ENGINE //-->
</div>

 </div>
 </div>


<?php get_sidebar(); ?>

<?php get_footer(); ?>