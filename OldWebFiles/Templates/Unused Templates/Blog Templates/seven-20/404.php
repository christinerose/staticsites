<?php get_header(); ?>
<div id="content">
<?php include(TEMPLATEPATH."/l_sidebar.php");?>
<div id="contentmiddle">
<div class="contenttitle">
	<h2>Sorry, Not Found, Error 404</h2><br />
	<p>You 
<?php
#some variables for the script to use
#if you have some reason to change these, do.  but wordpress can handle it
$adminemail = get_bloginfo('admin_email'); #the administrator email address, according to wordpress
$website = get_bloginfo('url'); #gets your blog's url from wordpress
$websitename = get_bloginfo('name'); #sets the blog's name, according to wordpress
  if (!isset($_SERVER['HTTP_REFERER'])) {
    #politely blames the user for all the problems they caused
        echo "tried going to "; #starts assembling an output paragraph
	$casemessage = "All is not lost!";
  } elseif (isset($_SERVER['HTTP_REFERER'])) {
    #this will help the user find what they want, and email me of a bad link
	echo "clicked a link to"; #now the message says You clicked a link to...
        #setup a message to be sent to me
	$failuremess = "A user tried to go to $website"
        .$_SERVER['REQUEST_URI']." and received a 404 (page not found) error. ";
	$failuremess .= "It wasn't their fault, so try fixing it.  
        They came from ".$_SERVER['HTTP_REFERER'];
	mail($adminemail, "Bad Link To ".$_SERVER['REQUEST_URI'],
        $failuremess, "From: $websitename <noreply@$website>"); #email you about problem
	$casemessage = "An administrator has been emailed 
        about this problem, too.";#set a friendly message
  }
  echo " ".$website.$_SERVER['REQUEST_URI']; ?> 
and it doesn't exist. <?php echo $casemessage; ?>  You can click back 
and try again or search for what you're looking for:
  <?php include(TEMPLATEPATH . "/searchform.php"); ?> or
go to the <li><a href="<?php echo get_settings('siteurl'); ?>" title="Go to the blog homepage">homepage</a></li> or
 read the last <li><?php echo $getOptions["num_posts"]; ?> blogs &#8594;</li>
<h2>Last <?php print(isset($getOptions["num_posts"])?$getOptions["num_posts"]:"8"); ?> blog posts</h2>
                                                <ol>
                                                        <?php get_archives('postbypost', isset($getOptions["num_posts"])?$getOptions["num_posts"]:8, '<li>', '</li>'); ?>
                                                </ol>
                                                <ol>
                                                        <?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0&feed=RSS'); ?>
                                                </ol>
</p>
	</div>
<?php include(TEMPLATEPATH."/r_sidebar.php");?>
</div>
<?php get_footer(); ?>