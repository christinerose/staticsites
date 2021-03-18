<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
		<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
		<meta name="keywords" content="<?php bloginfo('description'); ?>" />
		<meta name="description" content="<?php bloginfo('description'); ?>" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		<?php wp_head(); ?>
	</head>
	<body>
		<div id="outer">
			<div id="header">
				<div id="headercontent" class="left">
					<h1><a href="<?php bloginfo('siteurl');?>/" title="<?php bloginfo('name');?>"><?php bloginfo('name');?></a></h1>
					<h2><?php bloginfo('description');?></h2>
				</div>
				<form id="searchform" method="get" action="<?php bloginfo('siteurl')?>/index.php" class="right">
					<div id="search">
						<input type="text" name="s" id="s" class="text" value="<?php echo wp_specialchars($s, 1); ?>" size="15" />
						<input type="submit" class="submit" value="Go" />
					</div>
				</form>
				<div id="headerimage" class="clear"></div>
			</div>
			<div id="headermenu">
				<ul>
					<li <?php if(is_home()){echo 'class="first current_page_item"';}?>><a href="<?php bloginfo('siteurl'); ?>/" title="Home">Home</a></li>
					<?php wp_list_pages('title_li=&depth=1');?>
				</ul>
			</div>
			<div class="divider"></div>
