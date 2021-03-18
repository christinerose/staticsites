				<div id="leftside">
					<div id="splash"></div>
					
					<?php if ( !function_exists('dynamic_sidebar')|| !dynamic_sidebar() ) : ?>
					<div class="boxtop">
						<div class="boxbottom">
							<div class="boxmiddle">
								<h2>Categories</h2>
								<ul>
									<?php wp_list_categories('show_count=0&title_li='); ?>
								</ul>
							</div>
						</div>
					</div>
					
					<div class="box">
						<h2>Site Search</h2>
						<ul>
							<?php include (TEMPLATEPATH . '/searchform.php'); ?>
						</ul>
					</div>
		
					<div class="box">
						<h2>Elsewhere On The Net</h2>
						<ul>	
							<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
						</ul>
					</div>
					
					<div class="box">
						<h2>Meta</h2>
						<ul>
							<?php wp_register(); ?>
							<li><?php wp_loginout(); ?></li>
							<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
							<li><a href="http://www.tgpo.org/" target="_blank"  title="Business Class WordPress theme designed and built by tgpo.">tgpo.org</a></li>
							<?php wp_meta(); ?>
						</ul>
					</div>
					
					<?php endif; ?>
				</div>
