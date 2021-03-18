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
	<p>&#8801; Category: <?php the_category(', ') ?> <strong>|</strong> <?php edit_post_link('Edit','','<strong>|</strong>'); ?>  &#8711;  <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?></p>
	</div>
<div class="entry">
	<?php the_content(__('Read more'));?><br /><br />
</div>
	<!--
	<?php trackback_rdf(); ?>
	-->

<div class="navigation">
			<div class="alignleft"><?php previous_post('&laquo; %','','yes') ?></div>
			<div class="alignright"><?php next_post(' % &raquo;','','yes') ?></div>
		</div>
<h2>Possibly related:</h2>
<ul>

<?php
if ( is_single() or is_page() ) {
if( function_exists('cattag_related_posts') ) {
$relatedposts = cattag_related_posts();
if ($relatedposts === false) {
// echo '<p>No related posts</p>';
} else {
echo '<div class="related-posts">
<ul>' . $relatedposts . '</ul>
</div> <!-- [related-posts] -->';
}
}
}
?> 
</ul>

				<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?><br />        
        <div class="postspace"></div>
	<?php comments_template(); // Get wp-comments.php template ?>
	</div>
<?php include(TEMPLATEPATH."/r_sidebar.php");?>
</div>
<?php get_footer(); ?>