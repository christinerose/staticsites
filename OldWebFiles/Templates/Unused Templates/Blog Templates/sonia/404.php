<?php get_header(); ?>

	<div class="error">

		<h2>Error 404</h2>
		<p><b>The page you were looking for was not found</b></p>
		<p>Please check the URL and try again. <br />
		 <a href="<?php echo get_settings('home'); ?>">Home</a></p>
		

	</div>


<?php $showSidebar = TRUE; ?>
<?php include(TEMPLATEPATH . '/footer.php'); ?>

