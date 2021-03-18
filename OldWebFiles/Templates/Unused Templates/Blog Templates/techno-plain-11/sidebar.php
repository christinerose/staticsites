<div id="sidebar">
<?php include (TEMPLATEPATH . '/searchform.php'); ?>
<div id="right-sidebar">
<!-- START OF WORDPRESS ENGINE -->
<h2>Recent entries</h2>
				<ul>
				<?php get_archives('postbypost','12','html'); ?>  
				</ul>
<br />

<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>
<h2><?php _e('Meta'); ?></h2>
<ul>
<?php wp_register(); ?>
<li><?php wp_loginout(); ?></li>
<li><a href="http://validator.w3.org/check/referer" title="<?php _e('This page validates as XHTML 1.0 Transitional'); ?>"><?php _e('Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr>'); ?></a></li>
<li><a href="http://jigsaw.w3.org/css-validator/check/referer" title="<?php _e('This page has a valid CSS'); ?>"><?php _e('Valid <abbr title="Cascading Style Sheets">CSS</abbr>'); ?></a></li>
<?php wp_meta(); ?>
</ul>
<br />

<?php /* [END] If this is the frontpage */ } ?>

<h2>Syndicate</h2>
				<ul>
					<li><a href="<?php bloginfo('rss2_url'); ?>">RSS 2.0 (Posts)</a></li>
					<li><a href="<?php bloginfo('comments_rss2_url'); ?>">RSS 2.0 (Comments)</a></li>
				</ul>

<br />

<?php /* If this is the frontpage */ if ( is_home() || is_page() )
{ ?>
<?php /* [END] If this is the frontpage */ } ?>			


<h2>Pages</h2>
<ul>
<?php wp_list_pages('title_li='); ?>
</ul>

<br />
<h2>Categories</h2>
<ul>
<?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0'); ?>
</ul>
<br />

<h2><?php _e('Archives'); ?></h2>
<ul>
<?php wp_get_archives('type=monthly'); ?>
</ul>
<br />
			
<?php /* If this is the frontpage */ if ( is_home() || is_page() ) { ?>

<?php get_links_list('id'); ?>

<?php } ?>






<!-- END OF WORDPRESS ENGINE -->

</div>

</div>
