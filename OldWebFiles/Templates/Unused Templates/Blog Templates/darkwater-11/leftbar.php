<!-- Start leftbar -->

	<div class="leftbar">
<ul>

<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>

	<li><h2>Navigation</h2>
		<ul>
		<li><a <?php if (is_home()) echo('class="current" '); ?>href="<?php bloginfo('url'); ?>">Home</a></li>
		<?php wp_list_pages('depth=1&title_li='); ?>
		</ul>
	</li>

	<li><h2><?php _e('Categories'); ?></h2>
		<ul>
			<?php wp_list_cats('sort_column=name'); ?>
		</ul>
	</li>

	<li><h2><?php _e('Archives'); ?></h2>
		<ul>
			<?php wp_get_archives('type=monthly'); ?>
		</ul>
	</li>
        
	<li><h2><?php _e('Calendar'); ?></h2>
		<ul>
			<li><?php get_calendar(); ?></li>
		</ul>
	</li>

<?php endif; ?>

</ul>
	</div>

<!-- End leftbar -->