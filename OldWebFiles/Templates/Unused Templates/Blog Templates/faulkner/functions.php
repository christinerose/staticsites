<?php
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<div class="right">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
?>