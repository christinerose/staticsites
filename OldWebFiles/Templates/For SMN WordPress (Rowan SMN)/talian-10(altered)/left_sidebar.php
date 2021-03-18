	  </div>

	  <div class="left-content-talia">
	    <div id="left-sidebars">

		  <div class="sidebar-box">

           <?php if(function_exists("wp_theme_switcher")) : ?>
             <ul>
<li><?php wp_theme_switcher('dropdown'); ?></li>
</ul>
<?php endif; ?>


         <?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar(1) ) : ?>

		<h3>Translators</h3>
<a href="http://translate.google.com/translate?u=<?php bloginfo('url'); ?>&amp;langpair=en%7Cfr&amp;hl=fr&amp;ie=UTF-8&amp;ie=UTF-8&amp;oe=UTF-8&amp;prev=%2Flanguage_tools"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/fr.gif" alt="French" title="Translate in French" /></a>
	<a href="http://translate.google.com/translate?u=<?php bloginfo('url'); ?>&amp;langpair=en%7Cde&amp;hl=de&amp;ie=UTF-8&amp;ie=UTF-8&amp;oe=UTF-8&amp;prev=%2Flanguage_tools"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/de.gif" alt="German version" title="Translate in German" /></a>
	<a href="http://translate.google.com/translate?u=<?php bloginfo('url'); ?>&amp;langpair=en%7Ces&amp;hl=es&amp;ie=UTF-8&amp;ie=UTF-8&amp;oe=UTF-8&amp;prev=%2Flanguage_tools"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/es.gif" alt="Spanish version" title="Translate in Spanish" /></a>
	<a href="http://translate.google.com/translate?u=<?php bloginfo('url'); ?>&amp;langpair=en%7Cit&amp;hl=it&amp;ie=UTF-8&amp;ie=UTF-8&amp;oe=UTF-8&amp;prev=%2Flanguage_tools"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/it.gif" alt="Italian version" title="Translate in Italian" /></a>
   </ul>

<h3>Categories</h3>
		<ul>
		<?php wp_list_cats('sort_column=name&optioncount=0'); ?>
		</ul>

		<h3>Archives</h3>
		<ul>
		<?php wp_get_archives('type=monthly'); ?>
		</ul>

		<h3>Pages</h3>
		<ul>
         <li><a href="<?php echo get_settings('home'); ?>">Home</a></li>
<?php wp_list_pages('sort_column=menu_order&depth=1&title_li='); ?>
		</ul>

		<h3>Blogroll</h3>
		<ul>
<?php get_links(-1, '<li>', '</li>', ' - '); ?>
</ul>

<h3>Meta</h3>
		<ul>
        <?php wp_register(); ?>
<li><?php wp_loginout(); ?></li>
<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid XHTML</a></li>
<li><a href="http://jigsaw.w3.org/css-validator/validator?uri=<?php echo get_settings('home'); ?>&amp;usermedium=all">Valid CSS</a></li>
<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">WordPress</a></li>
<li><a href="http://www.va4business.com/" title="Virtual Marketing Assistant for small business">Virtual Internet Marketing Assistant</a></li>
<?php wp_meta(); ?>
		</ul>

       <?php endif; ?>
</div>

</div>
</div>