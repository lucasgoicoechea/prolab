<?php
if (eregi("block-Flash_Right.php", $PHP_SELF)) {
  Header("Location: index.php");
  die();
}
global $prefix, $dbi;
/*
*/
//$content = "<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0\" width=\"150px\" height=\"350\"><param name=\"movie\" value=\"img/botones.swf\" /><param name=\"quality\" value=\"high\" /><param name=\"wmode\" value=\"transparent\" /><embed src=\"img/botones.swf\" width=\"160\" height=\"200\" quality=\"high\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" wmode=\"transparent\"></embed></object>";
      
//$content = "<A HREF=dejatucv.htm></A> <A HREF=of_laborales.php></A> <!-- text used in the movie--><OBJECT classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0\" WIDTH=\"160\" HEIGHT=\"350px\" id=\"botones\" ALIGN=\"\"> <PARAM NAME=movie VALUE=\"img2/botones.swf\"> <PARAM NAME=menu VALUE=false> <PARAM NAME=quality VALUE=high> <PARAM NAME=bgcolor VALUE=#F5F5F5> <EMBED src=\"img2/botones.swf\" menu=false quality=high bgcolor=#F5F5F5  WIDTH=\"160\" HEIGHT=\"200\" NAME=\"botones\" ALIGN=\"\" TYPE=\"application/x-shockwave-flash\" wmode=\"transparent\" PLUGINSPAGE=\"http://www.macromedia.com/go/getflashplayer\"></EMBED></OBJECT>";

//$content= "<!-- URL's used in the movie--><A HREF=dejatucv.htm></A> <A HREF=areaE.htm></A> <A HREF=of_laborales.php></A> <!-- text used in the movie--><OBJECT classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\"codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0\" WIDTH=\"160\" HEIGHT=\"200\" id=\"BOTONES_Nuevo\" ALIGN=\"\"> <PARAM NAME=movie VALUE=\"img2/BOTONES_Nuevo.swf\"> <PARAM NAME=menu VALUE=false> <PARAM NAME=quality VALUE=low> <PARAM NAME=bgcolor VALUE=#F5F5F5> <EMBED src=\"img2/BOTONES_Nuevo.swf\" menu=false quality=low bgcolor=#F5F5F5  WIDTH=\"160\" HEIGHT=\"200\" NAME=\"BOTONES_Nuevo\" ALIGN=\"\" TYPE=\"application/x-shockwave-flash\"PLUGINSPAGE=\"http://www.macromedia.com/go/getflashplayer\" wmode=\"transparent\"></EMBED></OBJECT>";
//$content= "<!-- URL's used in the movie--><A HREF=dejatucv.htm></A> <A HREF=of_laborales.php></A> <!-- text used in the movie--><OBJECT classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0\" WIDTH=\"150\" HEIGHT=\"250\" id=\"botonesHOY\" ALIGN=\"\"> <PARAM NAME=movie VALUE=\"img2/botonesHOY.swf\"> <PARAM NAME=quality VALUE=high> <PARAM NAME=bgcolor VALUE=#F5F5F5> <EMBED src=\"img2/botonesHOY.swf\" quality=high bgcolor=#F5F5F5  WIDTH=\"150\" HEIGHT=\"250\" NAME=\"botonesHOY\" ALIGN=\"\" TYPE=\"application/x-shockwave-flash\" PLUGINSPAGE=\"http://www.macromedia.com/go/getflashplayer\"></EMBED></OBJECT>";

//$content="<!-- URL's used in the movie--> <A HREF=dejatucv.htm></A> <A HREF=of_laborales.php></A> <!-- text used in the movie--> <OBJECT classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0\" WIDTH=\"160\" HEIGHT=\"350\" id=\"botonesDerecha\" ALIGN=\"\"> <PARAM NAME=movie VALUE=\"img2/botonesDerecha.swf\"> <PARAM NAME=quality VALUE=high> <PARAM NAME=wmode VALUE=transparent> <PARAM NAME=bgcolor VALUE=#F5F5F5> <EMBED src=\"img2/botonesDerecha.swf\" quality=high wmode=transparent bgcolor=#F5F5F5  WIDTH=\"150\" HEIGHT=\"250\" NAME=\"botonesDerecha\" ALIGN=\"\" TYPE=\"application/x-shockwave-flash\" PLUGINSPAGE=\"http://www.macromedia.com/go/getflashplayer\"></EMBED></OBJECT>";
/*
$content ="<!--url's used in the movie-->
<a href=\"www.prolab.unlp.edu.ar/dejatucv.htm\"></a>
<a href=\"www.prolab.unlp.edu.ar/of_laborales.php\"></a>
<!--text used in the movie-->
<!-- saved from url=(0013)about:internet -->
<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0\" width=\"160\" height=\"350px\" id=\"botonesDerecha2\" align=\"middle\">
<param name=\"allowScriptAccess\" value=\"sameDomain\" />
<param name=\"movie\" value=\"img/botonesDerecha2.swf\" /><param name=\"quality\" value=\"high\" /><param name=\"wmode\" value=\"transparent\" /><param name=\"bgcolor\" value=\"#f5f5f5\" /><embed src=\"botonesDerecha2.swf\" quality=\"high\" wmode=\"transparent\" bgcolor=\"#f5f5f5\" width=\"150\" height=\"250\" name=\"botonesDerecha2\" align=\"middle\" allowScriptAccess=\"sameDomain\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" />
</object>";
*/
/*$content = "<!--url's used in the movie-->
<a href=\"www.prolab.unlp.edu.ar/dejatucv.htm\"></a>
<a href=\"www.prolab.unlp.edu.ar/of_laborales.php\"></a>
<!--text used in the movie-->
<!-- saved from url=(0013)about:internet -->
<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0\" width=\"160\" height=\"350\" id=\"botonesDerecha2\" align=\"middle\">
<param name=\"allowScriptAccess\" value=\"sameDomain\" />
<param name=\"movie\" value=\"img/botonesDerecha2.swf\" /><param name=\"quality\" value=\"high\" /><param name=\"wmode\" value=\"transparent\" /><param name=\"bgcolor\" value=\"#f5f5f5\" /><embed src=\"botonesDerecha2.swf\" quality=\"high\" wmode=\"transparent\" bgcolor=\"#f5f5f5\" width=\"150\" height=\"250\" name=\"botonesDerecha2\" align=\"middle\" allowScriptAccess=\"sameDomain\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" />
</object>";
*/
/*
$content = "<!--url's used in the movie-->
<a href=\"http://www.prolab.unlp.edu.ar/dejatucv.htm\"></a>
<a href=\"http://www.prolab.unlp.edu.ar/of_laborales.php\"></a>
<!--text used in the movie-->
<!-- saved from url=(0013)about:internet -->
<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0\" width=\"176\" height=\"350\" id=\"botonesDerecha3\" align=\"middle\">
<param name=\"allowScriptAccess\" value=\"sameDomain\" />
<param name=\"movie\" value=\"img/botonesDerecha3.swf\" /><param name=\"quality\" value=\"high\" /><param name=\"wmode\" value=\"transparent\" /><param name=\"bgcolor\" value=\"#f5f5f5\" /><embed src=\"botonesDerecha3.swf\" quality=\"high\" wmode=\"transparent\" bgcolor=\"#f5f5f5\" width=\"150\" height=\"250\" name=\"botonesDerecha3\" align=\"middle\" allowScriptAccess=\"sameDomain\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" />
</object>";
*/
$content ="<!--url's used in the movie-->
<a href=\"http://www.prolab.unlp.edu.ar/cv/login/login.htm\"></a>
<a href=\"http://www.prolab.unlp.edu.ar/of_laborales.php\"></a>
<!--text used in the movie-->
<!-- saved from url=(0013)about:internet -->
<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" codebase=\"http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0\" width=\"176\" height=\"350\" id=\"botonesDerecha4\" align=\"middle\">
<param name=\"allowScriptAccess\" value=\"sameDomain\" />
<param name=\"movie\" value=\"img/botonesDerecha4.swf\" /><param name=\"quality\" value=\"high\" /><param name=\"wmode\" value=\"transparent\" /><param name=\"bgcolor\" value=\"#f5f5f5\" /><embed src=\"botonesDerecha4.swf\" quality=\"high\" wmode=\"transparent\" bgcolor=\"#f5f5f5\" width=\"150\" height=\"250\" name=\"botonesDerecha4\" align=\"middle\" allowScriptAccess=\"sameDomain\" type=\"application/x-shockwave-flash\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" />
</object>";
?>

