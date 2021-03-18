<?php get_header(); ?>


		<?php if (have_posts()) : ?>
		 <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>				
		<h2>Archive for the '<?php echo single_cat_title(); ?>' Category</h2>
		
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2>Archive for <?php the_time('F jS, Y'); ?></h2>
		
	 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2>Archive for <?php the_time('F Y'); ?></h2>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2>Archive for <?php the_time('Y'); ?></h2>
		
	  <?php /* If this is a search */ } elseif (is_search()) { ?>
		<h2>Search Results</h2>
		
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2>Author Archive</h2>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2>Blog Archives</h2>

		<?php } ?>


		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
			<br />
		</div>
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
		</div>
	
	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
		


<?php get_footer(); ?>