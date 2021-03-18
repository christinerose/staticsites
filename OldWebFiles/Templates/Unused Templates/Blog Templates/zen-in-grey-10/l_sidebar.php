<div id="l_sidebar">
	<div class="sidebar">
		<ul id="l_sidebarwidgeted">
		<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>		
			<li id="Recent">
				<ul>
					<?php get_calendar() ?>
				</ul>
			</li>
			<li id="Categories">
				<h2>Categories</h2>
				<ul>
					<?php wp_list_cats('sort_column=name&hide_empty=0'); ?>
				</ul>
			</li>
			<li id="Archives">
				<h2>Archives</h2>
				<ul>
					<?php wp_get_archives('type=monthly&show_post_count=true'); ?>
				</ul>
			</li>
			<li id="Blogroll">
				<h2>Links</h2>
				<ul>
					<?php get_links('-1', '<li>', '</li>', '<br />', FALSE, 'id', FALSE, FALSE, -1, FALSE); ?>
				</ul>
			</li>
		<?php endif; ?>
		</ul>
	</div>
</div>