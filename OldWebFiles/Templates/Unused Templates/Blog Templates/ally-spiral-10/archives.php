<?php get_header(); ?>

<?php include (TEMPLATEPATH . '/searchform.php'); ?>

<div class="post">
<h1>Archives by Month:</h1>
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul>

<h2>Archives by Subject:</h2>
	<ul>
		 <?php wp_list_categories(); ?>
	</ul>

</div>

<?php get_footer(); ?>
