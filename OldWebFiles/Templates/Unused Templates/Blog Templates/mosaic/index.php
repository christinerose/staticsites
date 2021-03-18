<?php get_header(); ?>

	<!-- start content -->
	<div id="content">
	
	<?php if (have_posts()) : ?>
	
		<?php while (have_posts()) : the_post(); ?>
			<div class="post" id="post-<?php the_ID(); ?>">
				<p class="meta">
					<span class="date">
						<span class="d"><?php the_time('j') ?><small><?php the_time('S') ?></small></span>
						<span class="m"><?php the_time('F') ?></span>
					</span>
					&nbsp;&nbsp;&nbsp;
					<?php comments_popup_link('<span class="c">No</span> Comments', '<span class="c">1</span> Comment', '<span class="c">%</span> Comments', 'comments'); ?>
				</p>
				<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>
				<p class="tags bgbottom" style="clear: both; padding-left: 169px;"><strong>Tags:</strong> <?php the_tags(' ', ' ', ' '); ?></p>
			</div>
		<?php endwhile; ?>

			<!-- start contentbar -->
			<div id="contentbar" class="sidebar">
				<ul>
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar1')): ?>
					<li>Please add some widgets here.</li>
				<?php endif; ?>
				</ul>
			</div>
			<!-- end contentbar -->

	<?php else : ?>

		<div class="post wide">
			<h2 class="title">Page Not Found</h2>
			<div class="entry">
				<p>Sorry, but you are looking for something that isn't here.</p>
			</div>
			<div class="bgbottom" style="clear: both;"></div>
		</div>

	<?php endif; ?>

	</div>
	<!-- end content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
