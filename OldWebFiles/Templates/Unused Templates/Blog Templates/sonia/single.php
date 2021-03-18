<?php get_header(); ?>

				
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
			<br />
		</div>
	
			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				<?php the_content(); ?>
				<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
				<p class='datum'><?php the_time('F jS Y') ?> <img src="<?php bloginfo('template_directory'); ?>/images/strelica2.gif" alt='' /> <a href="<?php the_permalink() ?>">READ MORE</a> <img src="<?php bloginfo('template_directory'); ?>/images/strelica2.gif" alt='' /> <?php comments_popup_link('NO COMMENTS', '1 COMMENT', '% COMMENTS'); ?></p>	
			</div>
	

		
	<?php comments_template(); ?>
	
	<?php endwhile; else: ?>
	
		<p>Sorry, no posts matched your criteria.</p>
	
<?php endif; ?>
	

<?php get_footer(); ?>
