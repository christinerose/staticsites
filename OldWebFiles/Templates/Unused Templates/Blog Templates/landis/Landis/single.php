<?php get_header(); ?>
<?php get_sidebar(); ?>

	<div id="rightside">
		<h2 id="tagline"><?php echo bcthemetagline(); ?></h2>

		<?php if (have_posts()) : ?>
	
			<?php while (have_posts()) : the_post(); ?>

		<div class="post" id="post-<?php the_ID(); ?>">
			<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
					
			<div class="topics">Topics:<?php the_category(', ') ?></div>
			
			<?php $thedate = get_the_time('j') . get_the_time('M') . get_the_time('y') ?>
			
			<div class="date"><?php echo chunk_split($thedate,1," "); ?></div>


			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
				
			</div>
			
			<?php $thetitle = get_the_title(get_the_ID()); ?>
			<p class="postmetadata"><?php edit_post_link('Edit ' . $thetitle, '', ' '); ?></p>
		</div>


	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

	</div>
</div>
	
<?php get_footer(); ?>
