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
	<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></a></h1>
	<p>&#8801; Category: <?php the_category(', ') ?> <strong>|</strong> <?php edit_post_link('Edit','','<strong>|</strong>'); ?>  &#8711;  <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?></p>
	</div>
	<?php the_excerpt(__('Read more'));?>
	<div class="postspace">
	</div>
	<!--
	<?php trackback_rdf(); ?>
	-->
	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
	<?php posts_nav_link(' &#8212; ', __('&laquo; go back'), __('keep looking &raquo;')); ?>
	</div>
<?php include(TEMPLATEPATH."/r_sidebar.php");?>
</div>
<?php get_footer(); ?>