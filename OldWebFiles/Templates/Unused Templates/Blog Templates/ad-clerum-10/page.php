<?php get_header(); ?>

<?php include(TEMPLATEPATH."/left.php");?>

<?php include(TEMPLATEPATH."/right.php");?>

<div id="content">


    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		

		<h2 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h2>
		<div class="postspace2">
	</div>	

				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>


				<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
	

	  <?php endwhile; endif; ?>


	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	
</div>


<?php get_footer(); ?>