<?php get_header(); ?>

		<?php if (have_posts()) : ?>

		 <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle">Archive for the &#8216;<?php echo single_cat_title(); ?>&#8217; Category</h2>

 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h2>

	 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h2>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>

	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle">Author Archive</h2>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">Blog Archives</h2>

		<?php } ?>


		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>

		<?php while (have_posts()) : the_post(); ?>
			<div class="blog_item">
				<div class="blog_item_title">
					<div class="blog_item_title_top">
					</div>
					<table width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td width="10">
							</td>
							<td>
								<div class="item_text1">
									<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
								</div>
								<div class="item_text2">
									Filed Under <i>(<?php the_category(', ') ?>) by <?php the_author() ?> on <?php the_time('d-m-Y') ?></i>
								</div>
							</td>
						</tr>
					</table>
					<div class="blog_item_title_end">
					</div>
				</div>
				<div class="blog_text3">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>
				<div class="panel">
					<div class="panel_links">
						<span class="comm">
							<?php comments_popup_link('(0) Comments', '(1) Comment', '(%) Comments'); ?>
						</span>
						&nbsp;&nbsp;
						<a href="<?php the_permalink() ?>" class="readmore">Read More</a>
	
						&nbsp;&nbsp;
						<span class="comm">
							<?php edit_post_link('Edit', '', ''); ?>
						</span>
					</div>
				</div>
			</div>
			<br />
			<br />

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

<?php get_footer(); ?>
