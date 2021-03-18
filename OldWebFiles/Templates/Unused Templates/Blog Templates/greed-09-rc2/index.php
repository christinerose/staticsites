<?php get_header(); ?>

		<div id="content">

<?php get_sidebar(); ?>

			<div id="main">

				<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

				<div class="post" id="post-<?php the_ID(); ?>">

					<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
					<div class="entry">
						<p class="entrymetadata">Posted by <?php the_author() ?> on <?php the_time('F jS, Y') ?> in <?php the_category(', ') ?> <?php edit_post_link('Edit', '&#124; ', ''); ?></p>

						<?php the_content('Continue reading this post...') ;?>

						<p class="comments_number"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></p>

						<!--
						<?php trackback_rdf(); ?>
						-->

					</div>
				</div>

				<?php endwhile; ?>

				<div class="navigation">

					<?php if(function_exists("wp_pagenavi")) { ?>
					<?php wp_pagenavi(); ?>
					<?php } else { ?>

					<?php posts_nav_link() ?>

					<?php } ?>

				</div>

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