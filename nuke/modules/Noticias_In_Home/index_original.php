<?php

/* if (!eregi("modules.php", $PHP_SELF)){ 
  die ("You can't access this rows directly...");
} */

if (!defined('MODULE_FILE')) {
	die ("You can't access this file directly...");
}
$index = 1; 
require_once("mainfile.php");
$module_name = basename(dirname(__FILE__)); 
get_lang($module_name); 
include("header.php");
?>

<table align="center"  width="460px" border="0" bordercolor="red">

<tr>
	<td colspan="2">
	 &nbsp;
	</td>
</tr>
<tr>
  <td width="50%"  align="right">
	<img src="/html/img/CADWY51R.jpg" height="185px" width="210px">
  </td>
  <td width="50%" align="left">
	<img src="/html/img/CAQFOP6R.jpg" height="185px" width="210px">
  </td>
</tr>
<tr  align="center">
  <td width="50%" align="right">
	<img src="/html/img/CAMNSHA3.jpg" height="185px" width="210px">
  </td>
  <td width="50%" align="left">
	<img src="/html/img/CAGHG58V.jpg" height="185px" width="210px">
  </td>
</tr>

<tr  align="center">
          <td colspan="2" align="center" valign="top"> 
			<img src="/html/img/quehacemos.gif"  width="450px" height="660px" >
		  <td>
          
</tr>
</table> 

<?php
include("footer.php");
?>
