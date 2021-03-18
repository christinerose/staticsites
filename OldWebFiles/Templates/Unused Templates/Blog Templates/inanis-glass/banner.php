<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'banner.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
?>
   <!-- Welcome Banner -->
  <div id="wrapper"></div>
  <div class="bant"><img src="<?php bloginfo('template_directory'); ?>/images/1pxtrans.gif" alt=" " /></div>
  <div class="banm">
    <div class="banner">
      <img class="blogicon" src="<?php bloginfo('template_directory'); ?>/images/blogicon.png" alt="Blog Icon" />
      <?php 
      $blog_title = get_bloginfo(); 
      if ($blog_title==""){echo '';}
      else {echo '<h1><a href="'.get_bloginfo('url').'">'.$blog_title.'</a></h1>';}
      ?>
      <div class="blogdesc"><?php bloginfo('description'); ?></div> 
    </div>
  </div>
  <div class="banb"><img src="<?php bloginfo('template_directory'); ?>/images/1pxtrans.gif" alt=" " /></div>
  <hr class="rule" />
  
  <!--[if gte IE 5.5]>
    <![if lt IE 7]>
      <div class="bant"><img src="<?php bloginfo('template_directory'); ?>/images/1pxtrans.gif" alt=" " /></div>
      <div class="banm">
        <div class="banner">
                <h4 class="ie6">
                  <?php _e('You are using Internet Explorer 6, or older. We highly suggest that you seek out an alternative or newer web browser, to bring your web surfing experience up to current standards.','inanis');?>
                </h4>
        </div>
      </div>
      <div class="banb"><img src="<?php bloginfo('template_directory'); ?>/images/1pxtrans.gif" alt=" " /></div>
    <![endif]>
  <![endif]-->