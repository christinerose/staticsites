<h2>Search</h2>

<div id="searchdiv">
 <form id="searchform" method="get" action="/index.php">
  <input type="text" name="s" id="s" size="22"
value="type, hit enter" onblur="setTimeout('closeResults()',2000); if (this.value == '') {this.value = '';}"  onfocus="if (this.value == 'type, hit enter') {this.value = '';}" />
<div style="visibility:hidden"> <input name="sbutt" type="submit" value="Find" alt="Submit"  /></div>
</form></div>


