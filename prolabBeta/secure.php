<?
//login o logout?
//+++++++++++++++++++++ANTES++++++++++++++++++++++++++++++++
/*
if (isset($logout) || isset($_GET["logout"]) || isset($_POST["logout"])) {
	//logout
	include("logout.php");
}else{
	//login
	include("checkLogin.php");
}
*/
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
session_start();
if (!isset($_SESSION["idUsuario"])) {
	//login
	include("checkLogin.php");
}
?>