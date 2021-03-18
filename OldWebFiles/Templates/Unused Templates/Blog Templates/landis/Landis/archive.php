<?php get_header(); ?>
<?php get_sidebar(); ?>
	<div id="rightside">
		<h2 id="tagline"><?php echo bcthemetagline(); ?></h2>

		<?php if (have_posts()) : ?>
		<div class="post" id="post-<?php the_ID(); ?>">

						
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 id="archive">Archive for the <span class="query"><?php single_cat_title(); ?> Category</span></h2>
		
		<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 id="archive">Archive for <span class="query"><?php the_time('F jS, Y'); ?></span></h2>
		
		<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 id="archive">Archive for <span class="query"><?php the_time('F, Y'); ?></span></h2>
		
		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 id="archive">Archive for <span class="query"><?php the_time('Y'); ?></span></h2>
		
		<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 id="archive">Author Archive</h2>
		
		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 id="archive">Blog Archives</h2>
		
		<?php } ?>
		
		<?php while (have_posts()) : the_post(); ?>
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
				<div class="topics">Topics:<?php the_category(', ') ?></div>
				
				<?php $thedate = get_the_time('j') . get_the_time('M') . get_the_time('y') ?>
			
				<div class="date"><?php echo chunk_split($thedate,1," "); ?></div>
				<div class="entry">
					<?php the_content() ?>
				</div>

			<?php $thetitle = get_the_title(get_the_ID()); ?>
			<p class="postmetadata"><?php edit_post_link('Edit ' . $thetitle, '', ' '); ?></p>

		<?php
		/* Changes every other comment to a different class */
		$oddcomment = ( empty( $oddcomment ) ) ? ' alt' : '';
		?>
		<?php endwhile; ?>

	<?php else : ?>
				<div class="notfound">
					<h3>Archive not found.</h3>
					<p>Care to try again?</p>
					<?php include (TEMPLATEPATH . '/searchform.php'); ?>
				</div>

	<?php endif; ?>


			</div>
			<div class="navigation">
				<div class="alignleft"><?php next_posts_link('&#171; Previous Entries') ?></div>
				<div class="alignright"><?php previous_posts_link('Next Entries &#187;') ?></div>
			</div>

		</div>



<?php get_footer(); ?>
