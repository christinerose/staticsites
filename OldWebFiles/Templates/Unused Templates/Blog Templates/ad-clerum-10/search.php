<?php get_header(); ?>


<?php include(TEMPLATEPATH."/left.php");?>

<?php include(TEMPLATEPATH."/right.php");?>
<div id="middlepic"></div>
<div id="content">


	<?php if (have_posts()) : ?>

		<h2>Search Results</h2>

		<?php next_posts_link('&laquo; Previous Entries') ?>

		<?php previous_posts_link('Next Entries &raquo;') ?>
		

		<?php while (have_posts()) : the_post(); ?>

				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
		<br/>

                           Posted in <?php the_category(', ') ?>

		<?php endwhile; ?>


		<?php next_posts_link('&laquo; Previous Entries') ?>

		<?php previous_posts_link('Next Entries &raquo;') ?>
		

	<?php else : ?>
<br/>
		Nothing found. Try again.

		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
		
</div>

<?php get_footer(); ?>