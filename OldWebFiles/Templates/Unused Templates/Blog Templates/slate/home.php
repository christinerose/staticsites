<?php get_header(); ?>

<div id="wrapper">

	<div id="content">
	       
		        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div class="postheader">
                        <div id="date"><?php the_time('m.d.Y'); ?></div> 
		        <div id="posttitle"><h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1></div>
                </div>

		<?php the_content(__('Read more'));?><div style="clear:both;"></div>
		
		<div class="postmeta">
			<p><?php the_tags(); ?> Filed Under <?php the_category(', ') ?> | <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>&nbsp;<?php edit_post_link('(Edit)', '', ''); ?></p>
		</div>
	 			
		<!--
		<?php trackback_rdf(); ?>
		-->
		
		<?php endwhile; else: ?>
		
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
		<p><?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page'), __('Next Page &raquo;')); ?></p>
	
	</div>
	
<?php include(TEMPLATEPATH."/sidebar.php");?>
	


<?php get_footer(); ?>
</div>