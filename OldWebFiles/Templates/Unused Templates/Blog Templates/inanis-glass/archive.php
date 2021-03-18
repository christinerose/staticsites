<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'archive.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
?>
<?php get_header(); ?>
<?php get_sidebar(); ?>
  <div id="page">
    <div id="colwrap">
    <?php include 'banner.php'; ?>
      
        <?php if (have_posts()) : ?> <div style="float:right;width:660px;"><div class="navigation">
        <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?> 
        <?php /* If this is a category archive */ if (is_category()) { ?> <h3><?php _e('Archive for the Category: ','inanis');?> ' 
        <?php echo single_cat_title(); ?> '</h3> 
        <?php /* If this is a daily archive */ } elseif (is_day()) { ?> <h3><?php _e('Archive for','inanis');?> 
        <?php the_time('F jS, Y'); ?></h3> 
        <?php /* If this is a monthly archive */ } elseif (is_month()) { ?> <h3><?php _e('Archive for','inanis');?> 
        <?php the_time('F, Y'); ?></h3> 
        <?php /* If this is a yearly archive */ } elseif (is_year()) { ?> <h3><?php _e('Archive for','inanis');?> 
        <?php the_time('Y'); ?></h3> 
        <?php /* If this is a search */ } elseif (is_search()) { ?> <h3><?php _e('Search Results','inanis');?></h3> 
        <?php /* If this is an author archive */ } elseif (is_author()) { ?> <h3><?php _e('Author Archive','inanis');?></h3> 
        <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?> <h3><?php _e('Blog Archives','inanis');?></h3> 
        <?php } elseif (is_tag()) { ?> <h3><?php _e('Posts tagged as','inanis');?> ' 
        <?php echo single_cat_title(); ?> ' ...</h3> 
       <?php } ?></div></div>
      

      <!-- Posts -->
      <?php while (have_posts()) : the_post(); ?>
      <div class="postcont">
      <Div class="alignright">
        <div class="PTtop"><img src="<?php bloginfo('template_directory'); ?>/images/1pxtrans.gif" alt=" " /></div>
        <div class="PTbar">
           <div class="PTds Ptime"><span class="ptblurl">&nbsp;</span><span class="blurt"><?php the_time('d M Y') ?> @ <?php the_time('g:i A') ?></span><span class="ptblurr">&nbsp;</span></div>
           <div class="edt"><?php edit_post_link('edit','[ ',' ] '); ?></div>
           <div class="PT PTds"><span class="ptblurl">&nbsp;</span><h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3><span class="ptblurr">&nbsp;</span></div>
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
            <img class="tagicon" src="<?php bloginfo('template_directory'); ?>/images/tags_50.png" alt="Tags" />
          </span>
          <span class="tagstyle spanchunk">
            <?php the_tags('<strong>'.__('Tags','inanis').': </strong>', ', ', '<br />'); ?>
            <strong><?php _e('Categories','inanis');?>:</strong> <?php the_category(', ') ?>  
          </span>
  
          <span class="tagstyle ts-sm spanchunk">
              <strong><?php _e('Posted By','inanis');?>:</strong> <?php the_author() ?><br />
              <strong><?php _e('Last Edit','inanis');?>:</strong> <?php the_modified_date('d M Y'); ?> @ <?php the_modified_date('h i A'); ?><br /><br />
              <a rel="nofollow" href="mailto:?subject=<?php the_title(); ?>&amp;body=<?php _e('I thought you might like this','inanis'); ?>: <?php the_permalink() ?>"><?php _e('Email','inanis'); ?></a> &bull; 
              <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to','inanis');?> <?php the_title(); ?>"><?php _e('Permalink','inanis') ?></a> &bull; 
              <?php comments_popup_link('Comments (0)', 'Comments (1)', 'Comments (%)'); ?>
            </span>
        </div>
        <div class="PFbtm"><img src="<?php bloginfo('template_directory'); ?>/images/1pxtrans.gif" alt=" " /></div>
        </div>
      </div>
      <?php endwhile; ?>
      
      <?php
      if(function_exists('pagination')) {
      pagination(2,array("Previous ","Next"));
      } else { ?> 
      <div style="float:right;width:660px;"><div class="navigation">
        <span style="float:left;"><?php next_posts_link('<img style="vertical-align:middle;" src="'.get_bloginfo('template_directory').'/images/arbk.png" alt=" " /> '.__('Previous Entries','inanis')) ?></span>
        <span style="float:right;"><?php previous_posts_link(__('Next Entries','inanis').' <img style="vertical-align:middle;" src="'.get_bloginfo('template_directory').'/images/arfw.png">') ?></span>
      </div></div>
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
</div></div>

<?php get_footer(); ?>