<?php get_header(); ?>

<div id="wrapper">

	<div id="content">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="postheader">
		<h1><?php the_title(); ?></h1>
                </div>	
		<?php the_content(__('Read more'));?><div style="clear:both;"></div>
				
		<!--
		<?php trackback_rdf(); ?>
		-->
		
		<?php endwhile; else: ?>
		
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
	
	</div>
	
<?php include(TEMPLATEPATH."/sidebar.php");?>
	

<?php get_footer(); ?>
</div>