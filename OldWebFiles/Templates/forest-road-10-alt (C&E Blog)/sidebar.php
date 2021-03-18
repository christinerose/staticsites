	<div id="sidebar">
				<table width="100%">
					<tr>
						<td align="left" width="50%" valign="top" class="td_left">
							<ul>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ){
?>
<?
} else{ ?>
								<li class="widget_categories"><h2>Categories</h2>
									<ul>
									<?php wp_list_cats('sort_column=name&optioncount=1'); ?>
									</ul>
								</li>
								<?php get_links_list(); ?>
<?php } ?>
							</ul>
						</td>
						<td width="1px" class="td_border"></td>
						<td align="left" width="49%" valign="top" class="td_right">
							<ul>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ){
?>
<?
} else { ?>		
								<li><h2>Archives</h2>
									<ul>
									<?php wp_get_archives('type=monthly'); ?>
									</ul>
								</li>
						
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
						</td>
					</tr>
				</table>
	</div>
