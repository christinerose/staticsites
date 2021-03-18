<div id="r_sidebar">
	<ul id="r_sidebarwidgeted">
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>
<a title="Subscribe to my RSS Feed" href="feed:<?php bloginfo('rss2_url'); ?>"><img class="centered" src="<?php bloginfo('stylesheet_directory'); ?>/images/feed.jpg" alt="RSS" /></a>
<h2>About</h2>
<ul>
<p>The Seven theme is built with PS, glass paintings, custom brushes and patterns by <a href="http://milo.peety-passion.com">milo IIIIVII</a>. 
Check my <a href="http://milo.peety-passion.com/tag/custom_wordpress_theme/">other</a> <a href="http://themes.wordpress.net/index.php?s=milo">themes</a> too.<br />Open right sidebar.php in the theme folder to edit this message.
</ul>
<li id="Recent"><h2>Recent Post</h2>
<ul>
<?php get_archives('postbypost', 9); ?>				
</ul>
</li>  


		
<?php endif; ?>
		</ul>
</div>