<?php
if (!defined('MODULE_FILE')) {
	die ("You can't access this file directly...");
}
$index = 1; 
require_once("mainfile.php");
$module_name = basename(dirname(__FILE__)); 
get_lang($module_name); 
include("header.php");

////////////////////////////////////

echo "<br>"; 

echo "<br><br>";
opentable();
echo "<br>"; 

echo "<br><br>"; 

echo"Ingrese un dato";
echo "<input type=\"text\">";
echo "<a href=\"www.unlp.edu.ar\"> link a unlp";

echo "<form action=\"modules.php?name=$module_name\" method=\"POST\">"
."<input size=\"25\" type=\"text\" name=\"query\" value=\"$query\">&nbsp;&nbsp;"
."<input type=\"submit\" value=\""._SEARCH."\"><br><br>";

closetable();


?>