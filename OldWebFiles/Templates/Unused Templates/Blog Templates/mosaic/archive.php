<?php get_header(); ?>

<div id="content">

<?php if (have_posts()) : ?>

	<div class="post wide">
	
		<?php $post = $posts[0]; ?>
		
		<h1 class="title">
		
		<?php if (is_category()) : ?>
			Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category
		<?php elseif (is_day()) : ?>
			Archive for <?php the_time('F jS, Y'); ?>
		<?php elseif (is_month()) : ?>
			Archive for <?php the_time('F, Y'); ?>
		<?php elseif (is_year()) : ?>
			Archive for <?php the_time('Y'); ?>
		<?php elseif (is_author()) : ?>
			Author Archive
		<?php elseif (isset($_GET['paged']) && !empty($_GET['paged'])) : ?>
			Blog Archives
		<?php endif; ?>
		
		</h1>
	
		<div class="entry">
		
			<ul class="posts">
			
				<?php while (have_posts()) : the_post(); ?>
				<li>
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<p><small><?php the_time('l, F jS, Y') ?></small></p>
					<?php the_excerpt(); ?>
				</li>
				<?php endwhile; ?>
				
			</ul>
			
			<div class="navigation">
				<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
				<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
			</div>
			
		</div>

		<div class="bgbottom" style="clear: both;"></div>
	</div>		
	
<?php else : ?>

	<div class="post wide">
		<h2 class="title">Page Not Found!</h2>
		<div class="entry">
			<p>Sorry, but you are looking for something that isn't here.</p>
		</div>
		<div class="bgbottom" style="clear: both;"></div>
	</div>
	
<?php endif; ?>

</div>



<?php get_sidebar(); ?>

<?php get_footer(); ?>
