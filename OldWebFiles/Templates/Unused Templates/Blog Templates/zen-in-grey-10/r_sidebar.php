<div id="r_sidebar">
	<div class="sidebar">
		<ul id="r_sidebarwidgeted">
		<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>
			<li id="Recent">
				<h2>Recent Posts</h2>
				<ul>
					<?php wp_get_archives('type=postbypost&limit=8'); ?>
				</ul>
			</li>
			<li id="Recent">
				<h2>Recent Comments</h2>
				<?php if (function_exists('get_recent_comments')) { ?>
                <ul>
					<?php get_recent_comments(); ?>
                </ul>
                <?php } ?>
			</li> 
		<?php endif; ?>
		</ul>
	</div>
</div>