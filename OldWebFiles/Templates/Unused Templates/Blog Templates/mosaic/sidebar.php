<!-- start sidebar -->
<div id="sidebar" class="sidebar">
	<ul>
	<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar2')): ?>
		<li>Please add some widgets here.</li>
	<?php endif; ?>
	</ul>
</div>
<!-- end sidebar -->
