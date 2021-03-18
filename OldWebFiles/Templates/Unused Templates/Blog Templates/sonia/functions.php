<?
//this function will get the pages without the <li> tags.
function sonia_get_pages() {


	$output = '';

	// Query pages.
	$pages = & get_pages($args);
	if ( $pages ) {

	
		// Now loop over all pages that were selected
		foreach ( $pages as $page ) {
						
			if ($page->post_parent == 0) {
				$output = $output . '<a href="' . get_page_link($page->ID) . '">' . $page->post_title . '</a>';
			}
		
		}
		
		
	}


	echo $output;
}



if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
    	'name' => 'Sidebar',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<p><strong>',
        'after_title' => '</strong></p>',
    ));
    
        register_sidebar(array(
    	'name' => 'Bottom Left',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<p><strong>',
        'after_title' => '</strong></p>',
    ));
    
        register_sidebar(array(
    	'name' => 'Bottom Right',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

}

?>