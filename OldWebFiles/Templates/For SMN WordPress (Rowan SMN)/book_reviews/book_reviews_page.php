<?php
/*
Template Name: Book Reviews
*/
?>

<?php get_header(); ?>

<h2>By Author</h2>
<?php br_get_books_list('<ul>','<li>','</li>','<br/>','author'); ?>

<h2>By Title</h2>
<?php br_get_books_list('<ul>','<li>','</li>','<br/>By ','title'); ?>

<h2>By Published Date (newest)</h2>
<?php br_get_books_list('<ul>','<li>','</li>','<br/>By ','published_newest'); ?>

<h2>By Published Date (oldest)</h2>
<?php br_get_books_list('<ul>','<li>','</li>','<br/>By ','published_oldest'); ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>