	<div id="sidebar">
	<ul>
	<?php include(TEMPLATEPATH."/searchform.php");?>
<?php if ( !function_exists('dynamic_sidebar') == !dynamic_sidebar() ) : else : ?>

	<li id="Categories">
	<h2>Categories</h2>
		<ul>
			<?php wp_list_categories('sort_column=name&title_li='); ?>
		</ul>
	</li>
		
	<li id="Archives">
	<h2>Archives</h2>
		<ul>
			<?php wp_get_archives('type=monthly'); ?>
		</ul>
	</li>
	
	<li id="Blogroll">
	<h2>Blogroll</h2>
		<ul>
			<?php get_links(-1, '<li>', '</li>', ' - '); ?>
		</ul>
	</li>
		
	<li id="Admin">
	<h2>Admin</h2>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<li><a href="http://www.wordpress.org/">WordPress</a></li>
			<?php wp_meta(); ?>
			<li><a href="http://validator.w3.org/check?uri=referer">XHTML</a></li>
		</ul>
	</li>
		
	<?php endif; ?>
	</ul>
			
</div>

