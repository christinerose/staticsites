<?php get_header(); ?>


<?php include(TEMPLATEPATH."/left.php");?>

<?php include(TEMPLATEPATH."/right.php");?>

<div id="content">

	
		
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<br/>
<p><?php previous_post_link('&laquo; %link  |') ?>  <a href="<?php bloginfo('url'); ?>">Main</a>  <?php next_post_link('|  %link &raquo;') ?></p>
	

			<h2 id="post-<?php the_ID(); ?>"><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<p><b>By <?php the_author(); ?></b> | <?php the_time('F j, Y'); ?></p>
<div class="postspace2">
	</div>			

			<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
	

			<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>

<p><b>Topics:</b> <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
				
<div class="postspace">
	</div>


	<?php comments_template(); ?>
	

	<?php endwhile; else: ?>
	
	Sorry, no posts matched your criteria.


<?php endif; ?>
	

</div>



<?php get_footer(); ?>