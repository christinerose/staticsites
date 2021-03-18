  <ul>
   <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
   <h2>Categories</h2>
   <ul><li><?php wp_list_cats('sort_column=name&hierarchical=0'); ?></li></ul>
   <h2>Archives</h2>
   <ul><li><?php wp_get_archives('type=monthly'); ?></li></ul>
   <h2>Links</h2>
   <ul><?php get_links('-1','<li>','</li>'); ?></ul>
   <h2>Meta</h2>
   <ul>
    <li><?php wp_register(); ?></li>
    <li><?php wp_loginout(); ?></li>
    <li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
    <li><a href="http://gmpg.org/xfn/"><abbr title="XHTML Friends Network">XFN</abbr></a></li>
    <li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
    <?php wp_meta(); ?>
   </ul>
   <?php endif; ?>
  </ul>