<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'searchform.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
?>
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
  <div class="search-form">
    <input onfocus="SearchBoxFocus();" onblur="SearchBoxBlur();" id="searchbox1" type="text" value="" name="s" id="s" class="search-text"/><input type="submit" id="searchsubmit" value="" class="search-submit" />
  </div>
</form>
