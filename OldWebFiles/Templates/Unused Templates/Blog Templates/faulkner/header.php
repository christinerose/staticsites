<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php bloginfo('name'); ?><?php wp_title('-'); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
<?php wp_head(); ?>
</head>
<body>

<div id="wrap">

<div id="header">
<h1><img src="<?php bloginfo('template_directory'); ?>/images/title_left.gif" alt="" /><?php bloginfo('name'); ?><img src="<?php bloginfo('template_directory'); ?>/images/title_right.gif" alt="" /></h1>
<h2><?php bloginfo('description'); ?></h2>
<div id="nav">
	<ul>
		<li><a href="<?php echo get_settings('home'); ?>">Home</a></li>
		<?php wp_list_pages('depth=1&title_li=' ); ?> 
	</ul>
</div>
</div>

<div id="side">

<?php get_sidebar(); ?>

</div>

<div id="content">