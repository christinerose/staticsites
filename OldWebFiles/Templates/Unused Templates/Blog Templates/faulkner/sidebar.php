<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

<div class="right">
<h4>Categories</h4>
<ul>
	<?php wp_list_cats('sort_column=name&optioncount=0&hierarchical=0'); ?>
</ul>
</div>	


<div class="right">
<h4>Search</h4>
<form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="text" name="s" id="s" value="<?php echo wp_specialchars($s, 1); ?>" style="width: 100px;" />
<input type="submit" id="searchsubmit" value="Go" />
</form>
</div>


<div class="right">
<h4>Archives</h4>
<ul>
	<?php wp_get_archives('type=monthly'); ?>
</ul>
</div>

<div class="right">
<h4>Meta</h4>
<ul>
	<li><?php wp_loginout(); ?></li>
	<?php wp_register(); ?>
	<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
	<li><a href="<?php bloginfo('rss2_url');Ê?>">RSS 2.0 Feed</a></li>
	<?php wp_meta(); ?>
</ul>
</div>

<?php if (is_home()) { ?>
	<div class="right">
	<h4>Links</h4>
	<ul>
		<?php get_links('-1', '<li>', '</li>', ' - ', TRUE, 'url', FALSE); ?>
	</ul>
	</div>
<?php } ?>

<?php endif; ?>