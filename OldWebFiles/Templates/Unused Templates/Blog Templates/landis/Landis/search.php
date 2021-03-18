<?php get_header(); ?>
<?php get_sidebar(); ?>
	<div id="rightside">
		<h2 id="tagline"><?php echo bcthemetagline(); ?></h2>

	<?php if (have_posts()) : ?>
		<div class="post" id="post-<?php the_ID(); ?>">

			<h2 id="archive">Search Results for <span class="query"><?php the_search_query(); ?></span></h2>
	
			<?php while (have_posts()) : the_post(); ?>
	
			<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
			<div class="topics">Topics:<?php the_category(', ') ?></div>
	
			<?php $thetitle = get_the_title(get_the_ID()); ?>
			<p class="postmetadata"><?php edit_post_link('Edit ' . $thetitle, '', ' '); ?></p>

			<?php endwhile; ?>

	<?php else : ?>
			<div class="notfound">
				<h3>Archive not found.</h3>
				<p>Care to try again?</p>
				<?php include (TEMPLATEPATH . '/searchform.php'); ?>
			</div>
	<?php endif; ?>


			<div class="navigation">
				<div class="alignleft"><?php next_posts_link('Previous Entries') ?></div>
				<div class="alignright"><?php previous_posts_link('Next Entries') ?></div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>