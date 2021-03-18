<?php get_header(); ?>
<div id="content">
<?php include(TEMPLATEPATH."/l_sidebar.php");?>
<div id="contentmiddle">
<div id="art">
<?php
// I love Wordpress so
query_posts('cat=1,3,4,7&showposts=1');
?>
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



				<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
	<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?><br />        
        <div class="postspace"></div>
	

        </div>
<div class="col">
<ul>
<?php $my_query = new WP_Query('cat=5&showposts=1'); ?>
<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
			
<div class="post">
<h2 id="post-<?php the_ID(); ?>"> <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
<span class="post-cat">Topic: <?php the_category(', ') ?><strong>|</strong> <?php edit_post_link('Edit','','<strong>|</strong>'); ?></span> <span class="post-comments"><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></span>
<p>&nbsp;</p>
<?php the_excerpt(); ?>
</div>
<?php endwhile; ?>
</ul></div>
<div class="col">
<ul>
<?php $my_query = new WP_Query('cat=2&showposts=1'); ?>
<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
			
<div class="post">
<h2 id="post-<?php the_ID(); ?>"> <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
<span class="post-cat">Topic: <?php the_category(', ') ?><strong>|</strong> <?php edit_post_link('Edit','','<strong>|</strong>'); ?></span> <span class="post-comments"><?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></span>
<p>&nbsp;</p>
<?php the_excerpt(); ?>
</div>
<?php endwhile; ?>
</ul></div>
<div class="col2">
<h2>Del.icio.us</h2>
<ul>
<script type="text/javascript" src="http://del.icio.us/feeds/js/milo317?extended;count=12"></script>
<noscript><a href="http://del.icio.us/milo317">my del.icio.us</a></noscript>
</ul></div>

	</div>
<?php include(TEMPLATEPATH."/r_sidebar.php");?>
</div>
<?php get_footer(); ?>