<?php get_header(); ?>


	<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>
				
			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				<?php the_excerpt(); ?>
				<p class='datum'><?php the_time('F jS Y') ?> <img src="<?php bloginfo('template_directory'); ?>/images/strelica2.gif" alt='' /> <a href="<?php the_permalink() ?>">READ MORE</a> <img src="<?php bloginfo('template_directory'); ?>/images/strelica2.gif" alt='' /> <?php comments_popup_link('NO COMMENTS', '1 COMMENT', '% COMMENTS'); ?></p>	
			</div>
			
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
			<br />
		</div>
		
	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>

	<?php endif; ?>


<?php $showSidebar = TRUE; ?>
<?php include(TEMPLATEPATH . '/footer.php'); ?>
