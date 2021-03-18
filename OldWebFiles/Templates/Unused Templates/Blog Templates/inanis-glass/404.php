<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && '404.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
  <div id="page">
    <div id="colwrap">
    <?php include 'banner.php'; ?>

      <div class="bant"><img src="<?php bloginfo('template_directory'); ?>/images/1pxtrans.gif" alt=" " /></div>
      <div class="banm">
        <div class="banner">
          <h1 style="text-align:center;"><br /><?php _e('Error 404 - Not found','inanis'); ?></h1>
        </div>
      </div>
      <div class="banb"><img src="<?php bloginfo('template_directory'); ?>/images/1pxtrans.gif" alt=" " /></div>
      
      <div style="clear:right;"></div>
      </div>
    </div>
  
<?php get_footer(); ?>
