<?php
/*
Template Name: Links
*/
?>

<?php get_header(); ?>

<h1>Links</h1>


<ul class="nostyle"> 
 <?php 
 $link_cats = $wpdb->get_results("SELECT cat_id, cat_name FROM $wpdb->linkcategories"); 
 foreach ($link_cats as $link_cat) { 
 ?> 
  <li id="linkcat-<?php echo $link_cat->cat_id; ?>"><h2><?php echo $link_cat->cat_name; ?></h2> 
   <ul> 
    <?php // wp_get_links($link_cat->cat_id); ?> 
    <?php get_links($link_cat->cat_id, '<li>', '</li>', ' - ', FALSE, '', TRUE); ?>
   </ul> 
  </li> 
 <?php } ?> 
</ul> 



<?php get_footer(); ?>
