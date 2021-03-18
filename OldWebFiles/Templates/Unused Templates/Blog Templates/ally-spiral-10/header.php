<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>
</head>

<body>

<div id="header">

 <table border="0" cellpadding="0" cellspacing="0" width="100%">
  <tr>
   <td id="logo" valign="top"><h1><a href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
   <div class="description"><?php bloginfo('description'); ?></div></td>
   <td id="search" align="right">
	<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
	<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" />
	<input type="image" id="searchsubmit" src="<?php bloginfo('stylesheet_directory'); ?>/images/search.gif" style="border:0; margin-bottom: -5px;" />
	</form>
   <a href="http://www.wpthemesfree.com/"><img src="<?php bloginfo('template_directory'); ?>/images/wordpress.gif" alt="Wordpress Themes" border="0" /></a>
	</td>
  </tr>
 </table>
  
</div>
<div id="nav"><ul><li class="page_item"><a href="<?php bloginfo('url'); ?>/"><?php _e('Home'); ?></a></li><?php wp_list_pages('title_li=' . __('')); ?></ul></div>
<div id="page">
 <div style="padding: 20px 25px 20px 60px">
  <div id="content">