<?php
/*Template Name: Plugins*/
?>
<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'plugins.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
?>
<?php get_header(); ?><?php get_sidebar(); ?><div id="wrapper"><div id="bodycontents"><div class="post"><div class="itcat"><h1>Plugins Used</h1><ul><?php displayPluginsAsList(); ?></ul></div><br clear="all" /></div></div></div><?php get_footer(); ?>
