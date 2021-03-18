<?php get_header(); ?>


<?php include(TEMPLATEPATH."/left.php");?>

<?php include(TEMPLATEPATH."/right.php");?>

<div id="content">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
				

				<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
	<p><b>By <?php the_author(); ?></b> | <?php the_time('F j, Y'); ?> </p>
		<div class="postspace2">
	</div>	

					<?php the_content('Read the rest of this entry &raquo;'); ?>

		
				<p><b>Topics:</b> <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
	<div class="postspace">
	</div>		

		<?php endwhile; ?>
<br/>
                <?php next_posts_link('&laquo; Previous Entries') ?>
		<?php previous_posts_link('Next Entries &raquo;') ?>
		

	<?php else : ?>

		Not Found
		Sorry, but you are looking for something that isn't here.
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>


</div>
	


<?php get_footer(); ?>
