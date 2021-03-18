<?php get_header(); ?>


	<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>
			
			
			
			<div class="entry">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<h3>Posted on <?php the_time('n/j/Y') ?> at <?php the_time('g:i:s A') ?></h3>
				<?php the_content('Read the rest of this entry &raquo;'); ?>
				<div class="comment">Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit','',' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></div>
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


<?php get_footer(); ?>


