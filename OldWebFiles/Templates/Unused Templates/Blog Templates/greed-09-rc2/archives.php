<?php
/*
Template Name: Archives Template
*/
?>

<?php get_header(); ?>

		<div id="content">

<?php get_sidebar(); ?>

			<div id="main">

				<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

				<div class="post" id="post-<?php the_ID(); ?>">

					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<div class="entry">

						<p>By Month:</p>
						<ul>
							<?php wp_get_archives('type=monthly'); ?>
						</ul>

						<p>By Subject:</p>
						<ul>
							 <?php wp_list_categories(); ?>
						</ul>

						<?php edit_post_link('Edit', '<p>', '</p>'); ?>

						<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>

					</div>
				</div>

				<?php endwhile; ?>

				<?php else : ?>

				<div class="post">

					<h2>404 Error</h2>
					<div class="entry"><p>The page you are looking for is not here.</p></div>

				</div>

				<?php endif; ?>

<?php include(TEMPLATEPATH . '/sidebar_2.php'); ?>

			</div><!-- end main -->

		</div><!-- end content -->

<?php include(TEMPLATEPATH . '/sidebar_3.php'); ?>

<?php get_footer(); ?>