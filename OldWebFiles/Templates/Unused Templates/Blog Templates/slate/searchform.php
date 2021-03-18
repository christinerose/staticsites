		<form id="searchbox" method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>"/>
	   		<input type="text" value="Press enter to search." name="s" id="f" onfocus="if (this.value == 'Press enter to search.') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Press enter to search.';}" />
			</form>