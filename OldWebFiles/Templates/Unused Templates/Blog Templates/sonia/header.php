<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title><?php bloginfo('name'); ?><?php wp_title(' - '); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
</head>
<body>
	<div id="bg">
		<div id="sadrzaj">
			<div id="toplinks">
				<a href="<?php echo get_settings('home'); ?>">Home</a>
				<?php sonia_get_pages() ?>
			</div>

			<div id="zaglavlje">
				<div id="title">
					<a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name'); ?></a>
				</div>
				<div id="title_info">
						<form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>" style="margin:0;" >
							<i>Search:</i>
							<input type="text" name="s" id="s" value="<?php echo wp_specialchars($s, 1); ?>" />
							<input type="submit" id="searchsubmit" value="Go" />
						</form>
				</div>
			</div>

			<div id="navigacija">
				<ul id="navlist">
				<li><a href="<?php echo get_settings('home'); ?>">Home</a></li>
				<?php wp_list_pages('depth=1&title_li=' ); ?> 
				</ul>

				<div class="lijevo">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?>
					
					<p><strong>Categories</strong></p>
					<ul>
						<?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0'); ?>
					</ul>

					<p><strong>Archives</strong></p>
					<ul>
						<?php wp_get_archives('type=monthly'); ?>
					</ul>
					
					<?php endif; ?>
				</div>
			</div>

			<div id="clanci">