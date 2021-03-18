<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="distribution" content="global" />
<meta name="robots" content="follow, all" />
<meta name="language" content="en, sv" />

<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<!-- leave this for stats please -->

<link rel="Shortcut Icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_get_archives('type=monthly&format=link'); ?>
<?php wp_head(); ?>
<style type="text/css" media="screen">
<!-- @import url( <?php bloginfo('stylesheet_url'); ?> ); -->
</style>
</head>

<body>

	<div id="header">
	
		<div id="headertitle">
			<h1><?php bloginfo('name'); ?></h1>
		</div>
		<div id="tag">
			<?php bloginfo('description'); ?>
		</div>
		<div id="nav">
			<ul>
				 <li class="left <?php if ( is_home() ) { ?>current_page_item<?php } ?>"><a href="<?php echo get_option('home'); ?>/" title="<?php _e('A link to home page', 'default'); ?>"><?php _e('Home', 'default'); ?></a></li>				 
				 <?php wp_list_pages('sort_column=menu_order&depth=1&title_li');?>

<li><a href="<?php bloginfo('rss2_url'); ?>">RSS</a></li>
			</ul>
		</div>



               <div id="contenttop">
                        <img alt="" height="21px" src="<?php bloginfo('template_url'); ?>/images/contenttop.png" width="960" />
               </div>
	</div>
<div style="clear:both;"></div>	

	
