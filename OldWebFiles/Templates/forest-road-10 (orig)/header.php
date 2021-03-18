<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<style type="text/css" media="screen">

<?php
// Checks to see whether it needs a sidebar or not
if ( !$withcomments && !is_single() ) {
?>
	#page { background: url("<?php bloginfo('stylesheet_directory'); ?>/images/kubrickbg.jpg") repeat-y top; border: none; }
<?php } else { // No sidebar ?>
	#page { background: url("<?php bloginfo('stylesheet_directory'); ?>/images/kubrickbgwide.jpg") repeat-y top; border: none; }
<?php } ?>

</style>

<?php wp_head(); ?>
</head>

<body>
<center>
<div id="page">

<div id="header">
	<div id="header_menu">
		<table cellpadding="0" cellspacing="0" align="right">
			<tr>
				<td>
					<a href="<?php bloginfo('url'); ?>">Home</a>&nbsp;-&nbsp;
				</td>
				<td>
					<a href="#">Projects</a>&nbsp;-&nbsp;
				</td>
				<td>
					<a href="#">Help!</a>&nbsp;-&nbsp;
				</td>
				<td>
					<a href="#">About blog</a>&nbsp;-&nbsp;
				</td>
				<td>
					<a href="#">Contact</a>
				</td>
			</tr>
		</table>
	</div>
	<div id="header_title">
		<?php bloginfo('name'); ?>
	</div>
</div>

<div id="menu">
	<div id="menu_pad">
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td id="menu_search">
					<form method="get" style="display:inline;" action="<?php bloginfo('home'); ?>/">
					<table cellpadding="3" cellspacing="0" align="right">
						<tr>
							<td>
								Search: 
							</td>
							<td>
								<input type="text" value="<?php the_search_query(); ?>" name="s" />
							</td>
						</tr>
					</table>
					</form>
				</td>
				<td width="25px"></td>
				<td class="menu">
					<a href="<?php bloginfo('url'); ?>">home</a>
				</td>
				<td class="sep">|</td>
				<td class="menu">
					<a href="#">about us</a>
				</td>
				<td class="sep">|</td>
				<td class="menu">
					<a href="#">archives</a>
				</td>
				<td class="sep">|</td>
				<td class="menu">
					<a href="#">links</a>
				</td>
				<td class="sep">|</td>
				<td class="menu">
					<a href="#">contact</a>
				</td>
				<td class="sep">|</td>
				<td class="menu">
					<a href="#">blogs</a>
				</td>
			</tr>
		</table>
	</div>
</div>

<div id="blog">
	<div id="blog_pad">
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td id="blog_left" valign="top">
					<!-- left -->
					<?php //get_sidebar(); ?>
					<div id="sidebar1">
						<ul>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ){
?>
<?
} else{ ?>
								<li class="widget_categories"><h2>Categories</h2>
									<ul>
									<?php wp_list_cats('sort_column=name&optioncount=1'); ?>
									</ul>
								</li>
								<li><h2>Archives</h2>
									<ul>
									<?php wp_get_archives('type=monthly'); ?>
									</ul>
								</li>
<?php } ?>
						</ul>
					</div>
					<!-- end left -->
				</td>
				<td id="blog_center" valign="top">
					<div class="item_class">