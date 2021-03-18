<div id="sidebar">
<ul>

  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>

    <?php 
    global $notfound;
    if (is_page() and ($notfound != '1')) {
        $current_page = $post->ID;
        while($current_page) {
            $page_query = $wpdb->get_row("SELECT ID, post_title, post_status, post_parent FROM $wpdb->posts WHERE ID = '$current_page'");
            $current_page = $page_query->post_parent;
        }
        $parent_id = $page_query->ID;
        $parent_title = $page_query->post_title;

        // if ($wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = '$parent_id' AND post_status != 'attachment'")) {
        if ($wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = '$parent_id' AND post_type != 'attachment'")) {
    ?>

    <li>
      <h3 class="sidebartitle"><?php echo $parent_title; ?> <?php _e('Subpages'); ?></h3>
      <ul class="list-page">
        <?php wp_list_pages('sort_column=menu_order&title_li=&child_of='. $parent_id); ?>
      </ul>
    </li>

    <?php } } ?>

<li class="bar_calendar">
<?php get_calendar(true); ?>

</li>
<li> 
  <h3 class="sidebartitle" >Recently Post</h3>
  	<?php query_posts('showposts=5'); ?>
	<ul class="list-rec">
	<?php while (have_posts()) : the_post(); ?>
	<li>
	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to'); ?> <?php the_title(); ?>"><?php the_title(); ?></a><br />
	</li>
              <?php endwhile;?>
            </ul>
           </li>
          <li>
      <h3 class="sidebartitle"><?php _e('Archives'); ?></h3>
      <ul class="list-archives">
        <?php wp_get_archives('type=monthly'); ?>
      </ul>
    </li>
<li>
<h3 class="sidebartitle"><?php _e('Tags'); ?></h3>
      <ul class="list-cat">        <?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0'); ?>
      </ul>
    </li>
     <li>
      <h3 class="sidebartitle"><?php _e('Links'); ?></h3>
      <ul class="list-blogroll">
        <?php get_links('-1', '<li>', '</li>', '<br />', FALSE, 'id', FALSE, FALSE, -1, FALSE); ?>
      </ul>
    </li>

<li>
<h3 class="sidebartitle" >Search</h3>
 <?php include (TEMPLATEPATH . '/searchform.php'); ?>
    </li>


<?php endif; ?>

<li>
<h3 class="sidebartitle"><?php _e('Meta'); ?></h3>
   <ul class="list-meta">
     <?php wp_register(); ?>
     <li><?php wp_loginout(); ?></li>
    <li><a href="http://www.wpthemesfree.com/" title="Wordpress Themes">Wordpress Themes</a></li>
         <?php wp_meta(); ?>
       </ul>
     </li>
<li>
<h3 class="sidebartitle" >Feed</h3>
<ul class="list-rss">
<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>"><?php _e('<abbr title="Really Simple Syndication"> Feed RSS</abbr>'); ?></a></li>
		<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS'); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>


</ul>
</li>

</ul>
</div>
<!--/sidebar -->