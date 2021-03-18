			<div id="desna_rubrika">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom Right') ) : ?>
				<h3>Recent articles</h3>
				<p>
				<?php get_archives('postbypost', '10', 'custom', '', '', FALSE); ?>
				</p>
				<?php endif; ?>

    	
				<div id="podaci">
    				<p>Validate > <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | 
					<a href="http://validator.w3.org/check?uri=referer">XHTML 1.0 Strict!</a></p>
    				<p>&copy; <a href="<?php echo get_settings('home'); ?>"><?php bloginfo('name'); ?></a> &#62; Designed by <a href="mailto:luka@solucija.com">Luka Cvrk</a> &#62; Powered By <a href="http://wordpress.org/">WordPress</a>
					</p>	
    			</div>
			</div>

			<div id="lijeva_rubrika">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom Left') ) : ?>

				<p><b>Links</b><br />
				<?php get_links('-1', '', ' ', ' - ', TRUE, 'url', TRUE, FALSE, 15); ?>				
				</p>
				
				<?php endif; ?>
			</div>