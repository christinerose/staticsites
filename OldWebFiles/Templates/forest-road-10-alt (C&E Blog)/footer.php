						
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
				<td width="20px"></td>
				<td class="menu">
					<a href="<?php bloginfo('url'); ?>">journal</a>
				</td>
				<td class="sep">|</td>
				<td class="menu">
					<a href="?page_id=2">bios</a>
				</td>
				<td class="sep">|</td>
				<td class="menu">
					<a href="?page_id=38">writing</a>
				</td>
				<td class="sep">|</td>
				<td class="menu">
					<a href="http://rowanofthewood.com/newsroom/">newsroom</a>
				</td>
				<td class="sep">|</td>
				<td class="menu">
					<a href="?page_id=39">faq</a>
				</td>
				<td class="sep">|</td>
				<td class="menu">
					<a href="?page_id=40">resources</a>
				</td>
			</tr>
		</table>	</div>
</div>

<div id="footer">
	<div id="footer_pad">
		<div id="footer_copy">
			Copyright &copy; Christine & Ethan Rose. All Rights Reserved.<br>heme made free by <a href="http://www.mesotheliomawise.org/mesothelioma_description.html">Mesothelioma</a> and <a href="http://www.cyberdiabetes.com/free-glucose-meter.html">Free Glucose Meter</a><br>altered by <a href="http://www.bluemoosefilms.com">Blue Moose Diversions</A></div>
	</div>
</div>
		<?php wp_footer(); ?>

</div>
</center>
<body>
<!--INSERTED FOR SNAPSHOTS-->
<?php do_action('echo_snapshots'); ?>
<!--END-->
</body>
</html>