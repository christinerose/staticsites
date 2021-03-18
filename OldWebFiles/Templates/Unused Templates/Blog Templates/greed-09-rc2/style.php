<?php
require_once( dirname(__FILE__) . '../../../../wp-config.php');
require_once( dirname(__FILE__) . '/functions.php');
header("Content-type: text/css");

global $options;

foreach ($options as $value) {
	if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); } }
?>

body, h1, h2, h3, h4, h5, h6, address, blockquote, dd, dl, hr, p, form{
	margin: 0;
	padding: 0;
}

body{
	font-family: Arial, Helvetica, Verdana, Georgia, Sans-serif;
	font-size: 12px;
	text-align: center;
	vertical-align: top;
	background: #<?php echo $grd_body_background_color; ?> url(<?php echo $grd_body_background_image; ?>) repeat-x;
}

table{
	font-family: Arial, Helvetica, Verdana, Georgia, Sans-serif;
	font-size: 12px;
	text-align: left;
	vertical-align: top;
}

h1, h2, h3, h4, h5, h6{
	font-family: Arial, Helvetica, Verdana, Georgia, Sans-serif;
	font-size: 18px;
	font-weight: normal;
}

a{
	text-decoration: underline;
	color: #<?php echo $grd_link_color; ?>;
}

a:hover{
	text-decoration: none;
}

a img{
	border: 0;
}

address, dl, p{
	padding: 10px 0 5px;
}

blockquote{
	margin: 10px 0 0;
	border-top: 1px solid #ddd;
	background: #f7f7f7;
}

blockquote p{ padding: 10px; }

blockquote blockquote{
	margin: 0 10px;
	background: #fff;
}

code{
	background: #f9f9f9;
}

dd{
	padding: 0 0 0 20px;
}

p img{
	max-width: 100%;
}

img.centered{
	display: block;
	margin-left: auto;
	margin-right: auto;
}

img.alignright{
	padding: 4px;
	margin: 3px 0 2px 10px;
	display: inline;
}

img.alignleft{
	padding: 4px;
	margin: 3px 10px 2px 0;
	display: inline;
}

.alignleft{
	float: left;
}

.alignright{
	float: right;
}

.clear{
	margin: 0;
	padding: 0;
	clear: both;
}

small{
	font-size: 11px;
}

input, textarea{
	font-family: Arial, Helvetica, Georgia, sans-serif;
	font-size: 12px;
	padding: 2px;
}



/* Start Container - Holds everything together. Nothing sits outside of the container. */

#container{
	margin: 0 auto;
	max-width: 960px;
	width:expression(document.body.clientWidth > 960? "960px": "auto" );
	min-width: 750px;
	text-align: left;
}

/* End Container */



/* Start Page - Yellow top, white bottom background */

#page{
	float: left;
	width: 100%;
	background: #fff url(images/bg_page.gif) repeat-x;
}

/* End Page */



/* Start Header - Blog Title and Skip Link */

#header{
	display: block;
	margin: 10px 10px 0;
	padding: 9px 10px;
	background: #462217 url(images/bg_header.gif) repeat-x left bottom;
	color: #b76d56;
}

#header a{
	color: #cb7960;
}

#header h1{
	display: inline;
}

#header h1, #header h1 a{
	color: #fff;
}

#header h1 a{
	text-decoration: none;
}

#header h1 a:hover{
	text-decoration: underline;
}

.skip{
	float: right;
	line-height: 18px;
}

.skip a{
	padding: 0 26px 1px 0;
	background: url(images/icon_skip_to.gif) no-repeat right top;
}

/* End Header */




/* Start Banner - Be default, the banner is just a background image. */

#banner{
	display: block;
	margin: 10px 10px 0;
	height: 110px;
	overflow: hidden;
	text-align: right;
	background: #<?php echo $grd_banner_background_color; ?> url(<?php echo $grd_banner_background_image; ?>) no-repeat;
}

#banner img{
	margin: 10px 10px 0 0;
}

/* End Banner */




/* Start Horizontal Navigation Menu */

.feed{
	float: left;
	width: 18.75%;
	margin: 10px 0 0 10px;
	display: inline;
	padding: 11px 0;
	background: #f8fdd3 url(images/bg_feed.gif) no-repeat;
}

.feed a{
	font-family: Georgia, Arial, Helvetica, Sans-serif;
	font-size: 16px;
	font-weight: bold;
	padding: 0 10px 0 36px;
	background: url(images/icon_rss.gif) no-repeat 10px 2px;
}

.nav{
	float: right;
	width: 78.125%;
	margin: 10px 10px 0 0;
	display: inline;
	background: #bacc3f url(images/bg_nav.gif) repeat-x left bottom;
}

.nav ul{
	margin: 0;
	padding: 0 0 0 9px;
	list-style: none;
	background: #bacc3f url(images/bg_nav.gif) repeat-x;
}

.nav ul li{
	float: left;
	margin: 10px 0 0 1px;
	display: inline;
}

.nav ul li a{
	display: block;
	padding: 7px 10px 8px;
	background: #d2dd87 url(images/bg_nav_li.gif) repeat-x;
	color: #000;
}

.nav ul li a:hover{
	background: #F0F6CC;
	color: #000;
}

.nav ul li.current_page_item a{
	background: #fff;
}

/* End Horizontal Navigation Menu */




/* Start Content - Wraps the main column and first and second sidebars */

#content{
	margin: 10px 0 0;
}

/* End content */




/* Start Sidebars */

.sidebar{
	float: left;
	width: 180px;
	margin: 0 0 0 10px;
	display: inline;
}

.a{/* the first sidebar */
	float: <?php echo $grd_sidebar_a_float; ?>;
	margin: <?php echo $grd_sidebar_a_margins; ?>;
}

.b{ /* the second sidebar */
	float: <?php echo $grd_sidebar_b_float; ?>;
	margin: <?php echo $grd_sidebar_b_margins; ?>;
}

.sidebar ul{
	margin: 0;
	padding: 0;
	list-style: none;
}

.sidebar ul li{
	margin: 0 0 10px 0;
	background: #fcffe5;
}

.sidebar ul li#search form{
	padding: 0 10px 10px;
}

.sidebar ul li#search form input{
	margin: 10px 0 0;
}

.sidebar ul li#calendar table{
	margin: 0 10px;
}

.sidebar ul li#calendar table caption{
	padding: 10px;
}

.sidebar ul li#calendar table td{
	padding: 3px;
}

.sidebar ul li h2{
	padding: 10px;
	font-size: 16px;
	font-weight: bold;
	background: #ebf4a4 url(images/bg_h2_a.gif) repeat-x left bottom;
	color: #333;
}

.sidebar ul ul{
	line-height: 18px;
}

.sidebar ul ul li{
	margin: 0;
	padding: 10px;
	background: url(images/bg_dotted_a.gif) repeat-x;
}

.sidebar li#flickrrss img{
	margin: 5px 0 0 5px;
	width: 74px;
	height: 74px;
}

.sidebar ul ul ul li{
	padding: 10px 0 0 10px;
	background-color: transparent;
	background-image: none;
}

.c{ /* the main column sidebars */
	width: 31.5789%;
}

.c ul li{
	background: #fff;
}

.c ul li h2{
	background: #f7f7f7 url(images/bg_h2_b.gif) repeat-x left bottom;
}

.c ul ul li{
	background: url(images/bg_dotted_b.gif) repeat-x;
}

.d{ /* the bottom sidebars */
	width: 18.75%;
}

.d a{
	color: #fff;
}

.d ul li{
	background: #462115;
}

.d ul li h2{
	background: #321911;
	color: #c5ce88;
}

.d ul ul li{
	background: url(images/bg_dotted_d.gif) repeat-x;
}

/* End Sidebars */




/* Start Main - Where your main content sits */

#main{
	margin: <?php echo $grd_main_column_margins; ?>;
}

/* End Main */



/* Start Posts - Post titles, entries, and postmetadata */

.post{
	margin: 0 0 0 10px;
}

.post h2{
	font-size: 20px;
	padding: 8px 10px;
	background: #f7f7f7 url(images/bg_h2_b.gif) repeat-x left bottom;
}

/* End Posts */




/* Start Entries - Text and Titles within the content */

.entry{
	padding: 0 10px 10px;
	font-size: 14px;
	line-height: 24px;
	background: url(images/bg_dotted_b.gif) repeat-x;
}

.entry h1, .entry h2, .entry h3, .entry h4, .entry h5, .entry h6{
	margin: 0;
	padding: 10px 0 5px;
	background-color: transparent;
	background-image: none;
	font-weight: bold;
}

.entry h1{
	font-size: 24px;
	line-height: 30px;
	font-weight: normal;
}

.entry h2{
	font-weight: normal;
}

.entry h3{
	font-size: 16px;
}

.entry h4{
	font-size: 14px;
}

.entry h5{
	font-size: 12px;
}

.entry h6{
	font-size: 11px;
}

/* End Entries */




/* Start Postmetadata - Author, Date, Categories and Comments Number */

p.entrymetadata{
	font-size: 12px;
	line-height: 18px;
	color: #999;
}

p.entrymetadata a{
	color: #888;
}

.comments_number a{
	padding: 0 0 0 26px;
	background: url(images/icon_comment.gif) no-repeat;
}

/* End Postmetadata */




/* Start Previous and Next Links */

.navigation{
	margin: 0 0 0 10px;
	padding: 10px;
	font-size: 14px;
	line-height: 24px;
}

/* End Previous and Next Links */




/* Start Comments Template */

.comments_template{
	margin: 0 0 0 10px;
	padding: 0 0 10px 0;
}

.comments_template p.nocomments, .comments_template p.alert{
	padding: 10px;
	font-size: 14px;
}

.comments_template h3{
	font-size: 20px;
	padding: 8px 10px;
	background: #f7f7f7 url(images/bg_h2_b.gif) repeat-x left bottom;
}

.comments_template form#commentform{
	margin: 0;
	padding: 10px;
	background: #f7f7f7 url(images/bg_dotted_b.gif) repeat-x;
}

.comments_template form#commentform p{
	line-height: 18px;
}

ol.commentlist{
	margin: 10px 0;
	padding: 0;
	list-style: none;
	font-size: 14px;
	line-height: 24px;
}

ol.commentlist cite{
	font-style: normal;
	font-weight: bold;
}

ol.commentlist li{
	padding: 10px;
	background: url(images/bg_dotted_b.gif) repeat-x;
}

ol.commentlist li.alt{
	background: #f7f7f7 url(images/bg_dotted_b.gif) repeat-x;
}

ol.commentlist li.highlighted{
	background: #fcffe5 url(images/bg_dotted_a.gif) repeat-x;
}

.comment-number{ /* for Paged Comments plugin */
	float: right;
	font-family: Georgia, Arial, Verdana, Sans-serif;
	font-size: 18px;
	font-style: italic;
	color: #aaa;
}

/* End Comments Template */




/* Start bottom sidebars */

.secondary_content, .tertiary_content{
	float: left;
	width: 100%;
	padding: 10px 0 0;
	background: #462115 url(images/bg_dotted_c.gif) repeat-x;
	color: #b76d56;
}

.tertiary_content{
	background: #462115 url(images/bg_tertiary_content.gif) repeat-x;
}

/* End bottom sidebars */




/* Start Footer */

#footer{
	display: block;
	padding: 18px 20px;
	line-height: 18px;
	background: #321911 url(images/bg_dotted_e.gif) repeat-x;
	color: #b76d56;
}

#footer a{
	color: #cb7960;
}

#footer .skip a{
	background: url(images/icon_skip_back.gif) no-repeat right top;
}

#footer p{
	padding: 0;
	display: inline;
}

/* End Footer */




/* Start Ads */

.ads_468x60{
	margin: 10px 0 5px;
}

.ads_inline{
	padding: 5px;
	display: inline;
}

/* End Ads */