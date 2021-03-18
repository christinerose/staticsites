==========
DESCRIPTION
==========
Released under GPL, Greed is a three-column to five-column hybrid WordPress theme,
with ten widget-ready sidebars, by Small Potato from Wpdesigner.com

=========
HOME PAGE
=========
For full instruction, documentation, usage notes, and list of features, visit:
http://www.wpdesigner.com/2007/05/27/greed-wordpress-theme/

===========
INSTALLATION
===========

1. Obviously, you've already unzipped the downloaded zip file.
2. Upload the "greed" folder to "wp-content/themes/"
3. Log into WordPress Administration Panel.
4. Click on the "Presentation" link.
5. Find the thumbnail or link for the Greed theme.
6. Click on it to install.

(7. Refresh your blog to see the newly installed theme.)

=========
QUICK TIPS
=========

Addling class="alignleft" or class="alignright" to an image tag will make that image float left or right.
Adding class="centered" will center that image.

====================
UNLOCK HIDDEN FEATURES
====================

To switch to a double right sidebars layout, go to the Greed Theme Options page and edit the values to match the following:

    * Main column margins: 0 390px 0 0
    * Sidebar A float: right
    * Sidebar A margins: 0 10px 0 0
    * Sidebar B float: right
    * Sidebar B margins: 0 10px 0 0

To switch to a double left sidebars layout:

    * Main column margins: 0 10px 0 380px
    * Sidebar A float: left
    * Sidebar A margins: 0 0 0 10px
    * Sidebar B float: left
    * Sidebar B margins: 0 0 0 10px

How to add more widget-ready sidebars:

   1. Open the sidebar_3.php file
   2. Copy everything. Go to the bottom of the same page and skip several lines.
   3. Paste
   4. Change the pasted "secondary_content" to "tertiary_content"
   5. Below the tertiary_content area, find the numbers 6, 7, 8, 9, 10. Change them to 11, 12,… 15.
   6. Save the sidebar_3.php file
   7. Open the functions.php file
   8. Find the number 10. Change it 15.
   9. Save the functions.php file
  10. Upload the edited sidebar_3.php and functions.php file to see the change.

How to add more non-widget-ready sidebars:

   1. Follow the widget-ready sidebars instruction above, except for the steps that involve functions.php
   2. Next, for every new sidebar, remove:
      <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar() ) : else : ?> and <?php endif; ?>

How to use the pre-defined advertisement styles and files:

    * Place your codes within the ads_728×90.php, ads_468×60.php, or ads_inline.php file.
    * If you’re using the 468 or Inline ads, include them on your pages by using <div class="ads_your_choice_here"><?php include(TEMPLATEPATH . '/ads_your_choice_here.php'); ?></div>

=======
SUPPORT
=======
For all questions and answers, use the Wpdesigner forums at:
http://www.wpdesigner.com/forums/ 