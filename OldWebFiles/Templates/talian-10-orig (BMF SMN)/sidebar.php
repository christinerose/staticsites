<div id="right-sidebars">
		<div class="sidebar-box">

         <?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar(2) ) : ?>

<h3>Recent Entries</h3>
		<ul>
		<?php get_archives('postbypost', 10); ?>
		</ul>


		<h3>Recent Comments </h3>
		<ul>
		<?php mw_recent_comments(10, false, 35, 15, 35, 'all', '<li><a href="%permalink%" title="%title%"><strong>%author_name%</strong> in %title%</a></li>','d.m.y, H:i'); ?>
		</ul>


         <h3>Social Network</h3>
		<ul>
       <li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>">Subscribes to feed</a></li>
<li><a href="http://www.stumbleupon.com/submit?url=<?php the_permalink() ?>&amp;title=<?php the_title(); ?>" target="_new" >Stumble this site <strong>main post</strong></a></li>
<li><a href="http://technorati.com/faves?add=<?php echo get_settings('home'); ?>">Add to my <strong>Technorati</strong> favourite</a></li>
</ul>



        <?php get_calendar(); ?>

		<?php endif; ?>


		  </div>
		</div>