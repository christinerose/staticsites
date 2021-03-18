<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
									Posted by <i><?php the_category(', ') ?> on <?php the_time('M d, Y') ?></i>
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

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

<?php get_footer(); ?>
