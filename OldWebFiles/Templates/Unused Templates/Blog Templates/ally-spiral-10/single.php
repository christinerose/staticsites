<?php get_header(); ?>

<?php

if (have_posts()) {
	while (have_posts()) {

		the_post();
		?>

   <div class="post">
    <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
    <?php the_content('Full Story &raquo;'); ?>
    <div class="comment">
     <div class="left">Posted by <?php the_author(); ?></div>
    </div>
   </div><?php

	}
	?>
   
   <?php comments_template(); ?>
   
   <?php

} else {
	?>

  <div class="post">
   <h1><a href="/">Not Found</a></h1>
   Sorry, I cant find the page/post you are looking for.
  </div><?php

}
?>

<?php get_footer(); ?>