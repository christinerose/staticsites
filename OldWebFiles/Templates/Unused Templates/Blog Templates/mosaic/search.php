<?php get_header(); ?>

<div id="content">

	<div class="post wide">

		<h1 class="title">Search Results</h1>

		<div class="entry">

		<?php if (have_posts()) : ?>

			<ul class="posts">
				
				<?php while (have_posts()) : the_post(); ?>
				<li>
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<p><small><?php the_time('l, F jS, Y') ?></small></p>
					<?php the_excerpt(); ?>
				</li>
				<?php endwhile; ?>
				
			</ul>

		<?php else : ?>

			<p>No posts found. Try a different search?</p>
			
		<?php endif; ?>

			<div class="navigation">
				<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
				<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
			</div>
			
		</div>
		<div class="bgbottom" style="clear: both;"></div>
	</div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>