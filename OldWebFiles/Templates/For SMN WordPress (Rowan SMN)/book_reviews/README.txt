*********************************
*  VERSION	            	*
*********************************

This is version 1.3 of the book review plugin

Release Notes:

Updated to work with WordPress 2.3

Slight changes to code to point out when you have not select categories for the book review.


*********************************
*  CREDITS			*
*********************************

This plugin was originally created by Lee Penney, you can find out more about him at his blog, The Digerati Peninsula (www.thedigeratipeninsula.org.uk).  He also maintains a site with various WordPress add-ons and plugins at www.viewfinderdesign.co.uk which you might find useful.

The plugin is released completely free of charge and with no restrictions, feel free to use it and amend it however you like.

If you find the plugin useful, please think about making a donation at: www.viewfinderdesign.co.uk/donate/


*********************************
*  INSTALLATION			*
*********************************

Unzip the files

Copy/upload the entire book_reviews directory to the wp-content/plugins directory (not the contents, the entire directory)

Login to you WordPress admin section and activate the Book Reviews plugin

Now head on over to the Options panel under Options->Book Reviews and update the options to reflect how you will use the plugin

If you wish to use the supplied template files (book_review_page.php and whatever.php), upload them into your current them folder, located under: wp-content->themes->theme name


*********************************
*  UPGRADING  			*
*********************************

Delete the Book Reading folder in the wp-content/plugins directory and do a clean install as above.


*********************************
*  TO ADD A BOOK ENTRY		*
*********************************

Once the plugin has been activated you will find that you now have another option on the Write menu, alongside Write Post and Write Page you will also see the option for Write Book Entry.

If you click this you'll see the Write Book Entry page.

The Book Title box, rather obviously, is where you type in the book's title.

The Author box allows you to put in the book's author.

The Recommend drop-down allows you to pick if you would recommend the book (yes or no).

The Review box works like the ordinary WordPress content box and lets you add comments, information or a review of the book.

The Book Link box allows you to assign a URL to the book, for example, if you wanted to link the review to a page on Amazon where people could buy a copy.

The Image URL box is used if you want to associate an image with the book (the cover, for example).

The Link to Second Hand box allows you to assign a URL to where you might be selling you old copy of the book.

Edit Timestamp allows you to select when the entry will appear (so you can delay it's appearance on the site).

Once you've filled the details in, hit Publish.


*********************************
*  HOW TO USE			*
*********************************

The Book Reading Plugin provides several ways to get the information so you can include it in your posts.  Typically you would call these functions from inside a normal style post page (an example file is included) or a specialised page template (also included).

br_get_book_image()

This function grabs the text that you put in the Image URL box.

Usage: 
$variable = br_get_book_image(post_ID*);
echo "<img src=\"$variable\" />";

* in a typical post template you can use $id to provide the post_ID


br_get_book_author()

This function grabs the text that you put in the author box.

Usage: 
$variable = br_get_book_author(post_ID*);
echo "<img src=\"$variable\" />";

* in a typical post template you can use $id to provide the post_ID


br_get_book_link()

This function grabs the text that you put in the Book Link box.

Usage: 
$variable = br_get_book_link(post_ID*);
echo "<img src=\"$variable\" />";

* in a typical post template you can use $id to provide the post_ID


br_get_second_hand_link()

This function grabs the text that you put in the Book Link box.

Usage: 
$variable = br_get_second_hand_link(post_ID*);
echo "<img src=\"$variable\" />";

* in a typical post template you can use $id to provide the post_ID


br_get_book_recommendation()

This function grabs the option you picked from the recommend drop-down.

Usage: 
$variable = br_get_book_recommendation(post_ID*);
echo "<img src=\"$variable\" />";

* in a typical post template you can use $id to provide the post_ID


br_get_books()

This retrieves all of the posts in the category you supply and extracts the meta info and then packages it in a format that can easily be used.

Usage:
$variable = br_get_books(cat_ID*);

* the category ID for each category can be found on the categories page of the admin section


br_display_books()

This is a quick and easy way of showing all of the posts in the category you supply with the meta info formatted and output.  This is default to show how it can be done, just edit the html/php in the book_reading.php file to change the way it look, then drop it into your page.php template file to create a complete reading page/book list.

Usage:
br_display_books(cat_ID*);

* the category ID for each category can be found on the categories page of the admin section


br_get_books_by_author()

I've left this function in though it was only really built for me.  It retrieves a list of all the books, groups those with the same author, then outputs them along with some of their details alphabetically by author.

For an example of what it does, check out the reading page on my blog at: http://www.thedigeratipeninsula.org.uk/reading/

br_get_books_list(list style,before book,after book,between,sort order)

New in version 1.1 

This will retrieve a list of all of the book reviews you have published and display them in an order and style you specify.

Parameters:

list style
This determines the list format the will be displayed.  There are three options: <ul> to display an unordered list, <ol> to display an ordered list and <dl> to display a definition list

before book
This is what will be output before an individual book listing, typically you should set this to <li> for an unordered or ordered list and <dt> for a definition list.

after book
This is what will be output after an individual book listing, typically you set this to </li> for an unordered or ordered list and </dd> for a definition list.

between
This is what will be output between the title and author of a book, typically you might set this to </br>By for an unordered or ordered list and </dt><dd>By for a definition list.

sort order
This affects the order in which the books are returned, there are four options:

author: this groups the books together and outputs the author name in and H3, then a list of thier books in alphabetical order.

title: this returns all of the books sorted in alphabetical order by title

published_newest: this returns all of the books sorted by the date the review was published, newest to oldest

published_oldest: this returns all of the books sorted by the date the review was published, oldest to newest

Usage:

br_get_books_list('<ul>','<li>','</li>',' By ','author');
 - displays books grouped by author in an unordered list with the title and author on the same line, e.g. 
Title By Author

br_get_books_list('<ol>','<li>','</li>','<br/>By ','title');
 - displays books by title in an ordered list, with the author in a separate line, e.g.
1. Title
    By Author

br_get_books_list('<ul>','<li>','</li>',' - ','published_newest');
 - displays books by the published date, newest first, all on the same line, e.g.
Title - Author

br_get_books_list('<dl>','<dt>','</dd>','</dt><dd>','published_oldest');
 - displays books by the published date, oldest first, in a definition list, e.g.
Title
Author