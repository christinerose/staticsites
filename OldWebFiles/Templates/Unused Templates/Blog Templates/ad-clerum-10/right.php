<div id="right">

<div id="rpic"></div>

<?php include (TEMPLATEPATH . '/searchform.php'); ?>

<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar(2) ) : ?>

<h2>Latest Sermons</h2>
	<ul>
	<li><a href="#">Mathew</a></li>
	<li><a href="#">Romans</a></li>	
	<li><a href="#">Revelations</a></li>
	<li><a href="#">Ruth</a></li>
	</ul>


	
<h2>Recent Forum Posts</h2>
	<ul>
	<li><a href="#">Prayer Request</a></li>
	<li><a href="#">Recommended Books</a></li>	
	<li><a href="http://opendesigns.org">Open Designs Community</a></li>
	<li><a href="#">How to...</a></li>
	</ul>


<?php endif; ?>

</div>