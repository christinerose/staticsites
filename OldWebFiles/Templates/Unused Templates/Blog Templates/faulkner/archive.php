<?php get_header(); ?>


		<?php if (have_posts()) : ?>
		
		
		 <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php /* If this is a category archive */ if (is_category()) { ?>				
		<h1 class="pagetitle">Archive for the '<?php echo single_cat_title(); ?>' Category</h1>
		
 	  	<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h1 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h1>
		
	 	<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h1 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h1>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h1 class="pagetitle">Archive for <?php the_time('Y'); ?></h1>
		
	  	<?php /* If this is a search */ } elseif (is_search()) { ?>
		<h1 class="pagetitle">Search Results</h1>
		
	  	<?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h1 class="pagetitle">Author Archive</h1>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h1 class="pagetitle">Blog Archives</h1>

		<?php } ?>


		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
			<br />
		</div>
		
		
		
		<?php while (have_posts()) : the_post(); ?>


			<div class="entry">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<h3>Posted on <?php the_time('n/j/Y') ?> at <?php the_time('g:i:s A') ?></h3>
				<?php the_excerpt(); ?>
				<div class="comment">Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit','',' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></div>
			</div>
	
		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Previous Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Next Entries &raquo;') ?></div>
		</div>
		<br />
	
	<?php else : ?>

		<h1>Not Found</h1>

	<?php endif; ?>
		


<?php get_footer(); ?>