<?php get_header(); ?>

<?php

if (have_posts()) {

	$post = $posts[0];
	if (is_category()) {
		?><h1 style="margin-bottom: 10px">Archive for the '<?php echo single_cat_title(); ?>' Category</h1><?php
	}
	elseif (is_day()) {
		?><h1 style="margin-bottom: 10px">Archive for <?php the_time('F jS, Y'); ?></h1><?php
	}
	elseif (is_month()) {
		?><h1 style="margin-bottom: 10px">Archive for <?php the_time('F, Y'); ?></h1><?php
	}
	elseif (is_year()) {
		?><h1 style="margin-bottom: 10px">Archive for <?php the_time('Y'); ?></h1><?php
	}
	elseif (is_search()) {
		?><h1 style="margin-bottom: 10px">Search Results</h1><?php
	}
	elseif (is_author()) {
		?><h1 style="margin-bottom: 10px">Author Archive</h1><?php
	}
	elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
		?><h1 style="margin-bottom: 10px">Blog Archives</h1><?php
	}

	while (have_posts()) {
		the_post();
		?>

   <div class="post">
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