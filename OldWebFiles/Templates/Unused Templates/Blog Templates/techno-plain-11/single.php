<?php get_header(); ?>
<div id="main-content">
<!-- START OF WORDPRESS ENGINE //-->

	<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>
				
			<div class="post<?php if(is_home() && $post==$posts[0] && !is_paged()) echo ' firstpost';?>">
				<small class="postdatecolor"><?php the_time('F jS, Y') ?> </small>
				<h2 id="post-<?php the_ID(); ?>" style="padding: 0px; margin: 0px;"><a class="gl3nnx" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>

				
				<div class="entry">
					<?php the_content('Read more...'); ?><br />
					<div class="postfooter"><small>By <b><?php the_author() ?></b> in <?php the_category(',') ?>&nbsp;</small></div>
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