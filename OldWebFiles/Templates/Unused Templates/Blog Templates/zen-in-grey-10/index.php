<?php get_header(); ?>
<?php include(TEMPLATEPATH."/l_sidebar.php");?>
			<div id="content">
				<div class="contentbar">
					<div id="primarycontent">
					<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
						<div class="post" id="post-<?php the_ID(); ?>">
							<div class="contenttitle">
								<div class="contenttitleinfo">
									<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
									<div class="details">Posted by <?php the_author() ?> on <?php the_time('M jS, Y') ?> </div>
								</div>
								<div class="contenttitledate">
									<div class="contenttitledate1"><?php the_time('Y'); ?></div>
									<div class="contenttitledate2"><?php the_time('M'); ?> <?php the_time('j'); ?></div>
								</div>
							</div>
							<div class="contentarea">
								<div class="entry">
									<?php the_content('Continue Reading &raquo;'); ?>
								</div>
								<ul class="controls">
									<li class="readmore"><?php the_category(' , ') ?> <?php edit_post_link('Edit'); ?></li>
									<li class="comments"><?php comments_popup_link('Comments(0)', 'Comments(1)', 'Comments(%)'); ?></li>						
								</ul>
							</div>
						</div>
					<div class="divider"></div>
					<?php endwhile; ?>
					<p align="center"><?php posts_nav_link(' - ','&#171; Prev','Next &#187;') ?></p>		
					<?php else : ?>
					<h2 class="center">Not Found</h2>
					<p class="center">Sorry, but you are looking for something that isn't here.</p>
					<?php endif; ?>
					</div>
				</div>
			</div>
<?php include(TEMPLATEPATH."/r_sidebar.php");?>
<?php get_footer(); ?>