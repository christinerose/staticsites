<?php get_header(); ?>
<?php get_sidebar(); ?>

	<div id="rightside">
		<h2 id="tagline"><?php echo bcthemetagline(); ?></h2>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<h3><?php the_title(); ?></h3>
					<div class="entry">
									
						<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
		
						<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
						
					</div>
									
				<?php $thetitle = get_the_title(get_the_ID()); ?>
				<p class="postmetadata"><?php edit_post_link('Edit ' . $thetitle, '', ' '); ?></p>
			</div>
	
		<?php endwhile; endif; ?>
	</div>

<?php get_footer(); ?>