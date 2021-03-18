<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(''); if (function_exists('is_tag') and is_tag()) { ?>Tag Archive for <?php echo $tag; } if (is_archive()) { ?> archive<?php } elseif (is_search()) { ?> Search for <?php echo wp_specialchars($s,1); } if ( !(is_404()) && (is_search()) or (is_single()) or (is_page()) or (function_exists('is_tag') and is_tag()) or (is_archive()) ) { ?> | <?php } ?> <?php bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="shortcut icon" type="image/ico" href="<?php bloginfo('template_url'); ?>/favicon.ico" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<script src="<?php bloginfo('template_directory'); ?>/js/addEvent.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/sweetTitles.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/sweetTitles.css" media="screen,projection" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_get_archives('type=monthly&format=link'); ?>
<?php wp_head(); ?>
</head>
<body>
<div id="header">
	<a title="Home is where the heart is" href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name'); ?></a><div class="description"><?php bloginfo('description'); ?></div>
<div id="topmenu">
<ul>
<li onmouseover="this.className='msiefix'" onmouseout="this.className=''" ><a href="#">Menu</a>
<ul>
<li class="page_item"><a href="<?php echo get_settings('home'); ?>">Home</a></li>
<?php wp_list_pages('title_li=&depth=1' ); ?>
</ul></li>
<li onmouseover="this.className='msiefix'" onmouseout="this.className=''" ><a href="#">Topics</a>
<ul>
<?php list_cats(0, '', 'name', 'asc', '', 1, 0, 0, 1, 1, 1, 0,'','','','','') ?>
</ul>
</li>
<li onmouseover="this.className='msiefix'" onmouseout="this.className=''" ><a href="#">Archive</a>
<ul>
<?php wp_get_archives('type=monthly'); ?>
</ul>
</li>
<li onmouseover="this.className='msiefix'" onmouseout="this.className=''" ><a href="#">Recent</a>
<ul>
<?php get_archives('postbypost', 8); ?>
</ul>
</li>
</ul>
</div>
</div>
<div id="wrap">