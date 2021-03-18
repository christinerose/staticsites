<?php get_header(); ?>

<?

if (have_posts()) {
	while (have_posts()) {

		the_post();
		?>

  
   <div class="post">
    <div class="details"><?php the_time('F j, Y') ?></div>
    <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
    <?php the_content('Full Story &raquo;'); ?>
    <div class="comment">
     <div class="left">Posted by <?php the_author(); ?></div>
     <div class="right">
      <?php comments_rss_link(__('<img style="float:right" src="'.get_settings('home').'/wp-content/themes/ally_spiral/images/rss.gif" alt="" border="0" align="right" />')); ?>
      <?php comments_popup_link(__('0 Comments'), __('1 Comment'), __('% Comments')); ?>
     </div>
    </div>
   </div><?php

	}
	?>

<div class="navigation">
 <div style="float:left"><?php next_posts_link('&laquo; Previous Entries') ?></div>
 <div style="float:right"><?php previous_posts_link('Next Entries &raquo;') ?></div>
</div><?php

} else {
	?>

  <div class="post">
   <h1><a href="/">Not Found</a></h1>
   Sorry, I cant find the page/post you are looking for.
  </div><?php

}
?>

<?php get_footer(); ?>