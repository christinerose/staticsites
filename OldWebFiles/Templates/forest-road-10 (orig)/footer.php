
						
					</div>
				</td>
				<td id="blog_right" valign="top">
					<!-- left -->
					<div id="sidebar2">
						<?php //get_sidebar(); ?>
						<ul>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ){
?>
<?
} else { ?>		
								<?php get_links_list(); ?>
								<li class="widget_meta"><h2>Meta</h2>
									<ul>
										<?php wp_register(); ?>
										<li><?php wp_loginout(); ?></li>
										<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
										<li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
										<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
										<?php wp_meta(); ?>
									</ul>
								</li>
<?php } ?>
							</ul>
					</div>
					<!-- end left -->
				</td>
			</tr>
		</table>
	</div>
</div>

<div id="menu2">
	<div id="menu2_pad">
		<table cellpadding="0" cellspacing="0">
			<tr>
				<td id="menu2_search">
					<form method="get" style="display:inline;" action="<?php bloginfo('home'); ?>/">
					<table cellpadding="3" cellspacing="0" align="right">
						<tr>
							<td>
								Search: 
							</td>
							<td>
								<input type="text" value="<?php the_search_query(); ?>" name="s" />
							</td>
						</tr>
					</table>
					</form>
				</td>
				<td width="25px"></td>
				<td class="menu">
					<a href="<?php bloginfo('url'); ?>">home</a>
				</td>
				<td class="sep">|</td>
				<td class="menu">
					<a href="#">about us</a>
				</td>
				<td class="sep">|</td>
				<td class="menu">
					<a href="#">archives</a>
				</td>
				<td class="sep">|</td>
				<td class="menu">
					<a href="#">links</a>
				</td>
				<td class="sep">|</td>
				<td class="menu">
					<a href="#">contact</a>
				</td>
				<td class="sep">|</td>
				<td class="menu">
					<a href="#">blogs</a>
				</td>
			</tr>
		</table>
	</div>
</div>

<div id="footer">
	<div id="footer_pad">
		<div id="footer_copy">
			Copyright &copy;. <?php bloginfo('name'); ?>. All Rights Reserved.<br>heme made free by <a href="http://www.mesotheliomawise.org/mesothelioma_description.html">Mesothelioma</a> and <a href="http://www.cyberdiabetes.com/free-glucose-meter.html">Free Glucose Meter</a></div>
	</div>
</div>
		<?php wp_footer(); ?>

</div>
</center>
<body>
</body>
</html>