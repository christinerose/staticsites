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
<!-- END OF WORDPRESS ENGINE //-->
</div>

 </div>
 </div>


<?php get_sidebar(); ?>

<?php get_footer(); ?>