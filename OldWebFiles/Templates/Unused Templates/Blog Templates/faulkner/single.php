<?php get_header(); ?>

				
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div class="entry">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<h3>Posted on <?php the_time('n/j/Y') ?> at <?php the_time('g:i:s A') ?></h3>
			<?php the_content('Read the rest of this entry &raquo;'); ?>
			<div class="comment">
			Posted on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?> 
				In <?php the_category(', ') ?> |
				<?php comments_rss_link('Comments RSS'); ?> 
				<?php edit_post_link('Edit',' | ',''); ?>
			</div>
		</div>
			
	
		
		<?php comments_template(); ?>
	
<?php endwhile; else: ?>
	
		<p>Sorry, no posts matched your criteria.</p>
	
<?php endif; ?>
	

<?php get_footer(); ?>
