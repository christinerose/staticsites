<?php get_header(); ?>
<div id="content">
<?php include(TEMPLATEPATH."/l_sidebar.php");?>
<div id="contentmiddle">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2><br /><br />
	<?php the_content(__('Read more'));?>
	<!--
	<?php trackback_rdf(); ?>
	-->
	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
	</div>
<?php include(TEMPLATEPATH."/r_sidebar.php");?>
</div>
<?php get_footer(); ?>