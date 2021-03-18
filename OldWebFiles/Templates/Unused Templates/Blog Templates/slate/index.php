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
			<p><?php the_tags(); ?> Filed Under <?php the_category(', ') ?>&nbsp;<?php edit_post_link('(Edit)', '', ''); ?></p>
		</div>
	 			
		<!--
		<?php trackback_rdf(); ?>
		-->
		
		<h4 class="grande2">Comments</h4>
		<?php comments_template(); // Get wp-comments.php template ?>
		
		<?php endwhile; else: ?>
		
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
	
	</div>
	
<?php include(TEMPLATEPATH."/sidebar.php");?>

<?php get_footer(); ?>
</div>