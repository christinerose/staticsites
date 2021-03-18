<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>
</head>
<body <?php if (is_home()) { ?>
class="home"

<?php } elseif (is_404()) { ?>
class="notfound"

<?php } elseif (is_date()) { ?>
class="archive"

<?php } elseif (is_category()) { ?>
class="category"

<?php } elseif (is_search()) { ?>
class="search"

<?php } elseif (is_page()) { ?>
class="page"

<?php } elseif (is_single()) { ?>
class="single"

<?php } elseif (is_author()) { ?>
class="author"

<?php } else { ?>
class="home"

<?php } ?> id="wpdc-greed">

<div id="container">
	<div id="page">
		<div id="header">

			<div class="skip"><a href="#main">Skip to Content</a></div>
			<h1><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>

		</div>

		<div class="clear"></div>

		<div id="banner"><?php include(TEMPLATEPATH . '/ads_728x90.php'); ?></div>

		<div class="clear"></div>

		<div id="links">
			<div class="feed"><a href="<?php bloginfo('rss2_url'); ?>" title="Subscribe to this site using RSS"><abbr title="Really Simple Syndication">RSS</abbr></a></div>
			<div class="nav">
				<ul>
					<li class="<?php if (is_home()) { ?>current_page_item<?php } else { ?>page_item<?php } ?>"><a href="<?php bloginfo('url'); ?>" title="Home">Home</a></li>
					<?php wp_list_pages('depth=1&title_li='); ?>
				</ul>
			</div>
		</div>

		<div class="clear"></div>