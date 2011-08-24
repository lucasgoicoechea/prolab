<?php

if (!eregi("modules.php", $PHP_SELF)){ 
  die ("You can't access this rows directly...");
}
$index = 1; 
require_once("mainfile.php");
$module_name = basename(dirname(__FILE__)); 
get_lang($module_name); 
include("header.php");

////////////////////////////////////

echo "<br>"; 
echo""._BENVETOPOMOD.""; 
echo "<br><br>";
opentable();
echo "<br>"; 
echo""._DESCRITOPOMOD.""; 
echo "<br><br>"; 
$resultpersons = sql_query("SELECT idperson, nameperson, valor 
                 FROM ".$prefix."_topolino", $dbi);
for ($m=0; $m < sql_num_rows($resultpersons, $dbi); $m++) { 
  list($idperson, $nameperson, $valor) = sql_fetch_row($resultpersons, $dbi);
  echo "$idperson - $nameperson - $valor<br>";
}
echo"Ingrese un dato";
echo "<input type=\"text\">";
echo "<a href=\"www.unlp.edu.ar\"> link a unlp";

echo "<form action=\"modules.php?name=$module_name\" method=\"POST\">"
."<input size=\"25\" type=\"text\" name=\"query\" value=\"$query\">&nbsp;&nbsp;"
."<input type=\"submit\" value=\""._SEARCH."\"><br><br>";

closetable();

include("footer.php");
?>

<?php

if (!eregi("admin.php", $_SERVER['PHP_SELF'])) { die ("Access Denied"); }
$querystr = "SELECT radminsuper, admlanguage FROM "
.$prefix."_authors where aid='$aid'";
$result = sql_query($querystr, $dbi) or die ("invalied query");
list($radminsuper) = sql_fetch_row($result, $dbi);
if ($radminsuper==1) {
   switch($op) {
      case "":
         mousedisplay();
         break;
      case "topolino";
         mousedisplay();
         break;
      case "mouseselect";
         mouseselect();
         break;
      case "mousemodify";
         mousemodify();
         break;
   }
}
else {
   echo "Access Denied";
}
function mousedisplay() {
   global $admin, $bgcolor2, $prefix, $dbi, $multilingual;
   include ("header.php");
   GraphicAdmin();
   Opentable();
   $querystr = "SELECT idperson, nameperson FROM ".$prefix."_topolino";
   $resultpersons = sql_query($querystr, $dbi) 
   or die ("invalid query in mousedisplay");
   for ($m=0; $m < sql_num_rows($resultpersons, $dbi); $m++)
   {
      list ($idperson, $nameperson) = mysql_fetch_row($resultpersons);
      $tmpLink = "<a href=\"admin.php?op=mouseselect&idtopo="
                  .$idperson."\">Select mouse</A><br>";
      echo   "$idperson - $nameperson $tmpLink";
   }
   closetable();
   include("footer.php");
}
function mouseselect() {
   global $admin, $bgcolor2, $prefix, $dbi, $multilingual, $idtopo;
   include ("header.php");
   GraphicAdmin();
   Opentable();
   echo "idtopo=".$idtopo;
   $querystr = "SELECT idperson, nameperson FROM ".$prefix."_topolino 
                where idperson='$idtopo'";
   $resultpersons = sql_query($querystr, $dbi) 
   or die ("Invalid query in mouseselect");
   for ($m=0; $m < sql_num_rows($resultpersons, $dbi); $m++)
   {
      list($idperson, $nameperson) = sql_fetch_row($resultpersons, $dbi);
      echo "<form action=\"admin.php\" method=\"post\">";
      echo "<input type=\"text\" name=\"nameperson\" size=\"20\" 
             maxlength=\"20\" value=\"$nameperson\"><br><br>";
      echo "<input type=\"hidden\" name=\"idperson\"value=\"$idtopo\" > ";
      echo "<input type=\"hidden\" name=\"op\" value=\"mousemodify\" > ";
      echo "<input type=\"submit\" value=\""._ADDTOPO."\" > ";
      echo "</form >";
   }
   closetable();
   include("footer.php");
}
function mousemodify() {
   global $admin, $bgcolor2, $prefix, $dbi, $multilingaul, $idtopo, 
          $nameperson, $idperson;
   include ("header.php");
   GraphicAdmin();
   Opentable();
   sql_query("Update ".$prefix."_topolino set nameperson=' $nameperson' 
              where idperson=$idperson", $dbi);
   echo"OK";
   die(mysql_error());
   closetable();
   include("footer.php");
}
?>



