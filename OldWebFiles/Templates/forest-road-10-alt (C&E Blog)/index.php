<?php get_header(); ?>

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
			<div class="blog_item">
				<div class="blog_item_title">
					<div class="blog_item_title_top">
					</div>

					<table width="100%" cellpadding="0" cellspacing="0">
						<tr>
						<td width="10">
	<!--CHRISTINE INSERTED-->
<div class="post-date">
<span class="post-month"><?php the_time('M') ?></span> <span class="post-day"><?php the_time('d') ?></span></div>
	<!--END CHRISTINE INSERTED-->
							</td> 
							<td>
								<div class="item_text1">
									<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
								</div>
								<div class="item_text2">
									Posted by <i><?php the_category(', ') ?> </i>
								</div>
							</td>
						</tr>
					<tr>
                                             <td width="10"></td>
                                                   <td>
					<div class="blog_item_title_end">
					</div>
				</div>
				<div class="blog_text3">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>
<!--CHRISTINE INSERTED for FRIEND FEED-->
<BR><a href="http://friendfeed.com/?url=<?php the_permalink() ?>&amp;title=<?php the_title() ?>" target="_blank"><img src="http://friendfeed.com/static/images/chiclet.png" alt="Share on FriendFeed"/></a>
<!--END CMR INSTERED-->


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
                                </td>
                                     </tr>
                                           </table>

<!--I ALSO ALTERED THE TABLE TO MAKE IT EXTEND THROUGH THE BOTTOM OF THE BLOG POST. IF NEEDED TO REVERT, CONSULT ORIGINAL FILE-->
			<br />
			<br />

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

<?php get_footer(); ?>
