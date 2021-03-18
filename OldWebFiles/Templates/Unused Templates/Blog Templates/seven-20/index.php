<?php get_header(); ?>
<div id="content">
<?php include(TEMPLATEPATH."/l_sidebar.php");?>
<div id="contentmiddle">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="contentdate">
	<h3><?php the_time('M'); ?></h3>
	<h4><?php the_time('j'); ?></h4>
	</div>
<div class="contenttitle">
<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
<p><img src="<?php bloginfo('stylesheet_directory'); ?>/images/cats.gif" alt="" /> Category: <?php the_category(', ') ?> <strong>|</strong> <?php edit_post_link('Edit','','<strong>|</strong>'); ?>  <img src="<?php bloginfo('stylesheet_directory'); ?>/images/comments.gif" alt="" />  <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?></p>
	</div>

<div class="entry"
	<?php the_content(__('Read more'));?>
</div>
	<!--
	<?php trackback_rdf(); ?>
	-->
<div class="postspace"></div>
	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?><br />
	<?php comments_template(); // Get wp-comments.php template ?>
<div class="navigation">
<div class="alignleft"><?php posts_nav_link('','','&laquo; Previous Entries') ?></div>
<div class="alignright"><?php posts_nav_link('','Next Entries &raquo;','') ?></div>
</div>
	</div>
<?php include(TEMPLATEPATH."/r_sidebar.php");?>
</div>
<?php get_footer(); ?>