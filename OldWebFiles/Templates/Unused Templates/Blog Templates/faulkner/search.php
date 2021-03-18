<?php get_header(); ?>


	<?php if (have_posts()) : ?>

		<div class="borderbottom">
		<h1 class="pagetitle">Search Results For "<?php echo wp_specialchars($s, 1); ?>"</h1>
		
		<div class="navigation">
			<div class="alignleft"><?php previous_posts_link('&laquo; Previous Results') ?></div>
			<div class="alignright"><?php next_posts_link('More Results &raquo;') ?></div>
			<br />
		</div>
		</div>


		<?php while (have_posts()) : the_post(); ?>
				
			<div class="entry">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<h3>Posted on <?php the_time('n/j/Y') ?> at <?php the_time('g:i:s A') ?></h3>
				<?php the_excerpt(); ?>
				<div class="comment">Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit','',' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></div>
			</div>
	
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php previous_posts_link('&laquo; Previous Results') ?></div>
			<div class="alignright"><?php next_posts_link('More Results &raquo;') ?></div>
			<br />
		</div>
	
	<?php else : ?>

		<h1 class="pagetitle">Not Found</h1>
		<p>Sorry, no results were found for "<?php echo wp_specialchars($s, 1); ?>"</p>

	<?php endif; ?>
		


<?php get_footer(); ?>