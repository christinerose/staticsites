<!-- Start Sidebar -->

<div class="sidebar">

	<ul>

<div class="syndication">
<ul class="rss">
	<li class="sub"><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>" class="feed"><span></span><?php _e('<abbr title="Really Simple Syndication">RSS</abbr> Syndication'); ?></a></li>
	
</ul>

</div>

	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2)) : else : ?>

		

	<?php get_links_list(); ?>

	<br/>

	<li><h2><?php _e('Meta'); ?></h2>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional"><?php _e('Valid'); ?> <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
			<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
			<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
			<li><a href="http://Antbag.com/" title="Theme by Anthony Baggett">Antbag.com</a></li>

			<?php wp_meta(); ?>
		</ul>
	</li>

<?php endif; ?>

</ul>
	</div>

<!-- End Sidebar -->