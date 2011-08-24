<?php

/************************************************************************/
/* PHP-NUKE Theme: Core theme pack v1.0                                 */
/* For PHP-Nuke 6.8 and above                                           */
/* Copyright (c) 2005 by Disipal (disipal@disipal.net)                  */
/* http://www.disipal.net                                               */
/************************************************************************/

if (eregi("headerlinks.php", $_SERVER['SCRIPT_NAME'])){ die("Access Denied"); }

$link1 ="Home";
$link2 ="Account";
$link3 ="Forums";
$link4 ="Downloads";

$link1url ="index.php";
$link2url ="modules.php?name=Your_Account";
$link3url ="modules.php?name=Forums";
$link4url ="modules.php?name=Downloads";

?>