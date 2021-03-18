<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

	<head profile="http://gmpg.org/xfn/11">
		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

		<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
		
		<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
		
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
		<!--[if lt IE 7]><link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie6sucks.css" type="text/css" media="screen" /><![endif]-->
		<!--[if IE 7]><link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/ie7sucks.css" type="text/css" media="screen" /><![endif]-->
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
		
		<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/jquery.js"></script>
		<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/landis.js"></script>

		<?php
		$string = landisthemetitle();
		$name="";
		$i=0;
		
		$string = explode(" ",$string);
		
		foreach ($string as $value) {
			if ($i == 0) {
				$name = $name . $value;
				$i=1;
			}
			else {
				$name = $name . '<span class="alt">' . $value . '</span>';
				$i=0;
			}
		}
		
		 ?>
		<?php wp_head(); ?>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<div id="logo">
					<h1><a href="<?php echo get_option('home'); ?>/"><?php if ($name == ""){bloginfo('name');}else{echo $name;} ?></a></h1>
					<div class="description"><?php bloginfo('description'); ?></div>
				</div>
				
				<div id="navcontainer">
					<ul id="topnav">
						<li class="page_item"><a title="Home" href="<?php echo get_option('home'); ?>/">Home</a></li>
						<?php wp_list_pages('title_li=&sort_order=asc' ); ?>
						<li class="page_item"><a title="Contact" href="mailto:<?php echo get_option('admin_email'); ?>">Contact</a></li>
					</ul>
				</div>
			</div>
			
			<div id="page">