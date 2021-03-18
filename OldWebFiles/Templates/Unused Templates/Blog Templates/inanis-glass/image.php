<?php
/*
Template Name: attachment
*/
?>
<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'image.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
  <div id="page">
    <div id="colwrap">
    <?php include 'banner.php'; ?>
      <!-- Referrer Hints -->
      <?php
      if((function_exists('ls_getinfo')) && (ls_getinfo('isref'))) { ?> 
      <div class="mission">
        <h2><?php ls_getinfo('terms'); ?></h2> 
        <p><?php _e('You came here from','inanis');?> 
          <?php ls_getinfo('referrer'); ?> <?php _e('searching for','inanis');?> <i>
          <?php ls_getinfo('terms'); ?></i>. <?php _e('These posts might be of interest:','inanis');?>
        </p>
        <ul>
          <?php ls_related(5, 10, '<li>', '</li>', '', '', false, false); ?> 
        </ul>
      </div>
      <?php } else { ?> 
      <?php } ?>
      
      <!-- Posts -->
      <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?> 
      <div class="postcont">
        <div class="alignright">
          <div class="PTtop"><img src="<?php bloginfo('template_directory'); ?>/images/1pxtrans.gif" alt=" " /></div>
          <div class="PTbar">
             <div class="PTds Ptime"><span class="ptblurl">&nbsp;</span><span class="blurt"><?php the_time('d M Y') ?> @ <?php the_time('g:i A') ?></span><span class="ptblurr">&nbsp;</span></div>
             <div class="edt"><?php edit_post_link('edit','[ ',' ] '); ?></div>
             <div class="PT PTds"><span class="ptblurl">&nbsp;</span><h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3><span class="ptblurr">&nbsp;</span></div>
          </div>
  
            <div class="PTbtm"><img src="<?php bloginfo('template_directory'); ?>/images/1pxtrans.gif" alt=" " /></div>
            <div class="p1">
            
              <p class="attachment">
                <a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'medium' ); ?></a>
              </p>
              <div class="caption">
                <?php if ( !empty($post->post_excerpt) ) the_excerpt(); // this is the "caption" ?>
              </div>
              <?php the_content(' More &raquo;'); ?>
              
              <span style="display:inline-block;width:100%;">
                <div class="imgleft"><?php previous_image_link() ?></div>
                <div class="imgright"><?php next_image_link() ?></div>
              </span>
              
            </div>
          
          <div class="PFtop"><img src="<?php bloginfo('template_directory'); ?>/images/1pxtrans.gif" alt=" " /></div>
          <div class="PFpst">
            
            <span class="spanchunk tagiconbox">
              <img class="tagicon" src="<?php bloginfo('template_directory'); ?>/images/tags_50.png" alt="Tags" />
            </span>
            <span class="tagstyle spanchunk">
              <?php the_tags('<strong>'.__('Tags','inanis').': </strong>', ', ', '<br />'); ?>
              <strong><?php _e('Categories','inanis');?>:</strong> <?php the_category(', ') ?>
            </span>
    
            <span class="tagstyle ts-sm spanchunk">
              <strong><?php _e('Posted By:','inanis');?></strong> <?php the_author() ?><br />
              <strong><?php _e('Last Edit:','inanis');?></strong> <?php the_modified_date('d M Y'); ?> @ <?php the_modified_date('h i A'); ?><br /><br />
              <a rel="nofollow" href="mailto:?subject=<?php the_title(); ?>&amp;body=<?php _e('I thought you might like this','inanis'); ?>: <?php the_permalink() ?>"><?php _e('Email','inanis');?></a> &bull; 
              <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to','inanis');?> <?php the_title(); ?>"><?php _e('Permalink','inanis') ?></a> &bull; 
              <?php comments_popup_link(__('Comments','inanis').' (0)', __('Comments','inanis').' (1)', __('Comments','inanis').' (%)'); ?>
            </span>
          </div>
          <div class="PFbtm"><img src="<?php bloginfo('template_directory'); ?>/images/1pxtrans.gif" alt=" " /></div>
        </div>
      </div>
      <hr class="rule" />
      <?php endwhile; ?>
        
      <?php
      if(function_exists('pagination')) {
      pagination(2,array("Previous ","Next"));
      } else { ?> 
      <div class="navigation">
        <span style="float:left;"><?php next_posts_link('<img style="vertical-align:middle;" src="'.get_bloginfo('template_directory').'/images/arbk.png" alt=" " /> '.__('Previous Entries','inanis')) ?></span>
        <span style="float:right;"><?php previous_posts_link(__('Next Entries','inanis').' <img style="vertical-align:middle;" src="'.get_bloginfo('template_directory').'/images/arfw.png">') ?></span>
      </div>
      <?php } ?> 
      <?php else : ?> 
     
      
        <div class="bant"><img src="<?php bloginfo('template_directory'); ?>/images/1pxtrans.gif" alt=" " /></div>
        <div class="banm">
          <div class="banner">
            <h1><?php _e('Not Found','inanis');?></h1> 
            <p><?php _e('You seemed to have found a mislinked file, page, or search query with no results. If you feel you have reached this page in error, double check your search query and search again.','inanis');?></p>
            <?php
            if(function_exists('UTW_ShowTagsForCurrentPost')) { ?> <h2><?php _e('Browse by tag','inanis');?></h2> 
            <?php UTW_ShowWeightedTagSetAlphabetical("coloredsizedtagcloud","","120") ?> 
            <?php } ?> <h2><?php _e('Search','inanis');?></h2> 
            <?php include (TEMPLATEPATH . "/searchform.php"); ?>
            <br />
          </div>
        </div>
        <div class="banb"><img src="<?php bloginfo('template_directory'); ?>/images/1pxtrans.gif" alt=" " /></div>

      <?php endif; ?>
      <div style="clear:right;"></div>
      </div>
    </div>
  
<?php get_footer(); ?>