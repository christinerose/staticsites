<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'page.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>


  <div id="page">
    <div id="colwrap">
    <?php include 'banner.php'; ?>
      <!-- Posts -->
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="postcont">
      <div class="alignright">
        <div class="PTtop"><img src="<?php bloginfo('template_directory'); ?>/images/1pxtrans.gif" alt=" " /></div>
        <div class="PTbar">
           <div class="PTds Ptime">&nbsp;</div>
           <div class="edt"><?php edit_post_link('edit','[ ',' ] '); ?></div>
           <div class="PT PTds"><span class="ptblurl">&nbsp;</span><h3><?php the_title(); ?></h3><span class="ptblurr">&nbsp;</span></div>
        </div>
        
          <div class="PTbtm"><img src="<?php bloginfo('template_directory'); ?>/images/1pxtrans.gif" alt=" " /></div>
          <div class="p1"><div style="overflow: auto">
              <?php 
                $content = get_the_content(__('More','inanis').' &raquo;');
                $content = str_replace('<embed', '<embed wmode="transparent"', $content);
                $content = str_replace('</object>', '<param name="wmode" value="transparent" /></object>', $content);
                $content = apply_filters('the_content', $content);
                echo $content;
              ?>
          </div></div>
        
        <div class="PFtop"><img src="<?php bloginfo('template_directory'); ?>/images/1pxtrans.gif" alt=" " /></div>
        <div class="PFpst">
        
        
          <span class="spanchunk tagiconbox">
            <img class="tagicon" src="<?php bloginfo('template_directory'); ?>/images/question.png" alt=" " />
          </span>
          <span class="tagstyle spanchunk">
            <strong><?php _e('Date Posted','inanis');?>:</strong> <?php the_time('d M Y') ?> @ <?php the_time('h i A') ?><br />
            <strong><?php _e('Last Modified','inanis');?>:</strong> <?php the_modified_date('d M Y'); ?> @ <?php the_modified_date('h i A'); ?><br />
            <strong><?php _e('Posted By','inanis');?>:</strong> <?php the_author() ?><br />
          </span>
  
          <span class="tagstyle ts-sm spanchunk">
            
            <a rel="nofollow" href="mailto:?subject=<?php the_title(); ?>&amp;body=<?php _e('I thought you might like this','inanis'); ?>: <?php the_permalink() ?>"><?php _e('Email','inanis');?></a> &bull; 
              <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to','inanis');?> <?php the_title(); ?>"><?php _e('Permalink','inanis') ?></a>
          </span>
        </div>
        <div class="PFbtm"><img src="<?php bloginfo('template_directory'); ?>/images/1pxtrans.gif" alt=" " /></div>
      </div>
      </div>
      
      <?php comments_template(); ?>
      
      <?php endwhile; ?>

      <?php endif; ?>
      <div style="clear:right;"></div>
      </div>
    </div>
<?php get_footer(); ?>
