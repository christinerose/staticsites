<?php get_header(); ?>
<div id="content_talia">
<div class="right-content-talia">
<div id="left-post">
<div id="put-image-here"></div>
<div id="post-entry">

<!--CODE FOR SCROLLING BOXES-->
<?php rewind_posts(); ?>

<!--BEGIN MEDIA COVERAGE LOOP-->
<!--END MEDIA COVERAGE LOOP-->

<!--BEGIN NEWS RELEASE LOOP-->
<h1 class="category">News Releases</h1>
<div id="post-entry">
<div id="content1">
<?php if (have_posts()) : ?>

<!--Box-->
<?php $my_query = new WP_Query('category_name=News Releases');while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;?>

<!--Post Titles-->
<div class="post-meta" id="post-<?php the_ID(); ?>">
<h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>

<!--Post Dates/Edit-->
<!--div class="posted-aut-cat">Posted in <?php the_time('F jS, Y') ?> <?php edit_post_link('Edit', '&#124; ', ''); ?></div-->

<!--AUTHOR/CATEGORY/POSTED CONTENT-->
<!--div class="posted-aut-cat">by <?php the_author_posts_link(); ?> in <?php the_category(', ') ?></div-->
<div class="post-content"><?php the_content('Continue reading this post...') ;?></div>

<!--Comments-->
<div class="post-commented">
<!--div class="post-box"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></div-->

</div>
</div>

<div class="post-fixed"></div>
<?php endwhile; ?>
<?php comments_template(); ?>
<div class="post-fixed"></div>
<div class="post-navs"><?php if(function_exists('wp_pagenavi')): ?> 
<?php wp_pagenavi(); ?><?php else : ?><?php posts_nav_link(); ?><?php endif; ?></div>

<div class="post-fixed"></div>
<?php else: ?>
<h3>Sorry The Post Have Been Removed</h3>
<?php endif; ?>

</div>
</div>


<!--END NEWS RELEASE LOOP-->


<!--BEGIN BOOK REVIEW LOOP-->
<h1 class="category">Book Reviews</h1>
<div id="post-entry">
<div id="content1">
<?php if (have_posts()) : ?>

<!--Box-->
<?php $my_query = new WP_Query('category_name=Book Reviews');while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;?>

<!--Post Titles-->
<div class="post-meta" id="post-<?php the_ID(); ?>">
<h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>

<!--Post Dates/Edit-->
<!--div class="posted-aut-cat">Posted in <?php the_time('F jS, Y') ?> <?php edit_post_link('Edit', '&#124; ', ''); ?></div-->

<!--AUTHOR/CATEGORY/POSTED CONTENT-->
<!--div class="posted-aut-cat">by <?php the_author_posts_link(); ?> in <?php the_category(', ') ?></div-->
<div class="post-content"><?php the_content('Continue reading this post...') ;?></div>

<!--Comments-->
<div class="post-commented">
<!--div class="post-box"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></div-->

</div>
</div>

<div class="post-fixed"></div>
<?php endwhile; ?><?php comments_template(); ?><div class="post-fixed"></div>

<div class="post-navs"><?php if(function_exists('wp_pagenavi')): ?> <?php wp_pagenavi(); ?><?php else : ?><?php posts_nav_link(); ?><?php endif; ?></div>

<div class="post-fixed"></div>
<?php else: ?>
<h3>Sorry The Post Have Been Removed</h3>
<?php endif; ?>

</div>
</div>



<!--END BOOK REVIEW LOOP-->


<!--BEGIN EVENTS LOOP-->
<h1 class="category">Events</h1>
<div id="post-entry">
<div id="content2">
<?php if (have_posts()) : ?>

<!--Box-->
<?php $my_query = new WP_Query('category_name=Events');while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID;?>

<!--Post Titles-->
<div class="post-meta" id="post-<?php the_ID(); ?>">
<h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>

<!--Post Dates/Edit-->
<!--div class="posted-aut-cat">Posted in <?php the_time('F jS, Y') ?> <?php edit_post_link('Edit', '&#124; ', ''); ?></div-->

<!--AUTHOR/CATEGORY/POSTED CONTENT-->
<!--div class="posted-aut-cat">by <?php the_author_posts_link(); ?> in <?php the_category(', ') ?></div-->
<div class="post-content"><?php the_content('Continue reading this post...') ;?></div>

<!--Comments-->
<div class="post-commented">
<!--div class="post-box"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></div-->

</div>
</div>

<div class="post-fixed"></div>
<?php endwhile; ?><?php comments_template(); ?><div class="post-fixed"></div>

<div class="post-navs"><?php if(function_exists('wp_pagenavi')): ?> <?php wp_pagenavi(); ?><?php else : ?><?php posts_nav_link(); ?><?php endif; ?></div>

<div class="post-fixed"></div>
<?php else: ?>
<h3>Sorry The Post Have Been Removed</h3>
<?php endif; ?>

</div>
</div>



<!--END EVENTS LOOP-->

</div>
</div>


<?php get_sidebar(); ?>
<?php get_leftbar(); ?>
<?php get_footer(); ?>