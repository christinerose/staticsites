<div id="l_sidebar">
<ul id="l_sidebarwidgeted">
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
<ul>
<?php get_calendar(); ?>
</ul>
<li id="Recent"><h2>Categories</h2>
<ul>
<?php wp_list_cats('sort_column=name&hide_empty=0'); ?>
</ul>
</li> 	
<li id="Recent"><h2>Archives</h2>
<ul>
<?php wp_get_archives('type=monthly&show_post_count=true'); ?>
</ul>
</li> 
<li id="Recent"><h2>Liens</h2>	
<ul>
<?php get_links('-1', '<li>', '</li>', '<br />', FALSE, 'id', FALSE, FALSE, -1, FALSE); ?>
</ul>
</li> 
<li id="Recent"><h2>Find</h2>
<ul>
<?php include (TEMPLATEPATH . '/searchform.php'); ?>
</ul>
</li> 
<?php endif; ?>
</ul>
</div>