<?php
if (eregi("block-Marquesina.php", $PHP_SELF)) {
  Header("Location: index.php");
  die();
}
global $prefix, $dbi;
/*

*/
//$content ="";
$content ="<table bordercolor=\"#006600\" width=\"100%\" border=\"1\" align=\"center\" cellpadding=\"2\" cellspacing=\"0\">";
$content.="<tr>";
$content.="<td align=\"center\" valign=\"middle\">";
$content.="<!-- BANNER 1 -->";
$content.="<script>escribe();</script>";
$content.="</td>";
$content.="</tr>";
$content.="<tr>";
$content.="<td align=\"center\" valign=\"middle\">";
$content.="<!-- BANNER 2 -->";
$content.="<script>escribeB();</script>";		
$content.="</td>";    
$content.="</tr>";  
$content.="</table>";


//$content ="petolanza";



?>