<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="description" content="" />
<meta name="keywords" content="wordpress themes" />
<meta name="copyright" content="" />
<title><?php wp_title(); ?> <?php bloginfo('name'); ?>: <?php bloginfo('description'); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>"  />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>"  />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="icon" href="/favicon.ico" type="image/x-icon" />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://scott-m.net/xmlrpc.php?rsd" />
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<?php wp_get_archives('type=monthly&format=link'); ?>
<?php wp_head(); ?>

</head>

<body>
<div id="wrap_talia">
  <div id="container_talia">
    <div id="header_talia">
	  <div class="header_site_desc">
      <h1><a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name'); ?></a></h1>
      <p><?php bloginfo('description'); ?></p>
	  </div>

	  <div class="header_nav_box">
	    <div id="searchform">
		<form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<p>
        <input name="submit" type="image" src="<?php bloginfo('stylesheet_directory');?>/images/search_button.gif" alt="search" />
        </p>
		<p><input name="s" type="text" class="src_field" value="<?php the_search_query(); ?>" /></p>
		</form>
		</div>
<div class="navigators">
       <ul>
<li><a href="<?php echo get_settings('home'); ?>">Newsroom</a></li>
<?php wp_list_pages('title_li=&depth=1'); ?>
<li><a href="http://www.bluemoosefilms.com/SMN">Films</a></li>
<li><a href="http://www.christineandethanrose.com">Blog</a></li>
<li><a href="http://www.rowanofthewood.com">Rowan Home</a></li>
		</ul>
		</div>

	  </div>

    </div>