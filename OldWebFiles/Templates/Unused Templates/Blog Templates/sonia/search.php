<?php get_header(); ?>


	<?php if (have_posts()) : ?>

		<div class="borderbottom">
		<h2 class="pagetitle">Search Results For '<?php echo  wp_specialchars($s, 1); ?>'</h2>
		
		<div class="navigation">
			<div class="alignleft"><?php previous_posts_link('&laquo; Previous Results') ?></div>
			<div class="alignright"><?php next_posts_link('More Results &raquo;') ?></div>
			<br />
		</div>
		</div>


		<?php while (have_posts()) : the_post(); ?>
				
			<div class="post" id="post-<?php the_ID(); ?>">
				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				<p><?php the_excerpt(); ?></p>
				<p class='datum'><?php the_time('F jS Y') ?> <img src="<?php bloginfo('template_directory'); ?>/images/strelica2.gif" alt='' /> <a href="<?php the_permalink() ?>">READ MORE</a> <img src="<?php bloginfo('template_directory'); ?>/images/strelica2.gif" alt='' /> <?php comments_popup_link('NO COMMENTS', '1 COMMENT', '% COMMENTS'); ?></p>	
			</div>
	
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php previous_posts_link('&laquo; Previous Results') ?></div>
			<div class="alignright"><?php next_posts_link('More Results &raquo;') ?></div>
			<br />
		</div>
	
	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<br />
		<p>Sorry, no matches were found for '<?php echo wp_specialchars($s, 1); ?>'
		<?php $showSidebar = TRUE; ?>


	<?php endif; ?>
		


<?php include(TEMPLATEPATH . '/footer.php'); ?>
