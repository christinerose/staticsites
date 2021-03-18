<div style="clear:both;"></div>
</div>
<div id="footer">
<p><?php 
$numposts = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = 'publish'");
if (0 < $numposts) $numposts = number_format($numposts); 

$numcmnts = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = '1'");
if (0 < $numcmnts) $numcmnts = number_format($numcmnts);
?>
<p>There are <?php echo $numposts ;?> posts and <?php echo $numcmnts ;?> comments so far. Feel invited to browse the <a href="/archive/">archives</a>, read the <a href="/about/">about</a> or comment on the latest post. <br />Copyright &copy; <?php echo date("Y"); ?> <a title="The sweetest ever..." href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name'); ?></a>  |  Created by <a title="The support page for your theme." href="http://milo.peety-passion.com">milo</a><a title="Custom themes" href="http://insomnia.peety-passion.com">IIIIVII</a> | <?php wp_loginout(); ?> | <img src="<?php bloginfo('stylesheet_directory'); ?>/images/rss.gif" alt="" /><a href="feed:<?php bloginfo('rss2_url'); ?>"> Entries RSS</a> | <img src="<?php bloginfo('stylesheet_directory'); ?>/images/rss.gif" alt="" /><a href="feed:<?php bloginfo('comments_rss2_url'); ?>"> Comments RSS</a>. <br /><?php echo $wpdb->num_queries; ?> queries. <?php timer_stop(1); ?> seconds.</p>
</div>
<?php do_action('wp_footer'); ?>

</body>
</html>