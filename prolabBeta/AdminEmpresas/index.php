<?php
session_start();
/*if (isset($_SESSION["nivela"])){
	header('location:menu.php');
	exit;
}else{
*/	session_destroy();
/*}*/

require_once('HTML/QuickForm.php');
require_once('HTML/QuickForm/Renderer/ITStatic.php');
require_once('HTML/Template/ITX.php');

$form =& new HTML_QuickForm('form','post', 'AdminEmpresas/login/validate.php','_parent');

$form -> addElement('text','user','Nombre de Usuario:',array('class' => 'caja','size' => '20', 'id'=>'user'));
$form -> addElement('password','pwd','Clave:',array('class' => 'caja','size' => '20'));
$form -> addElement('text','userMsg',$_GET['msgUser'],array('class' => 'LV_invalid','size' => '20'));

$form -> addElement('submit','boton','Entrar',array('class' => 'boton'));

$tpl =& new HTML_Template_ITX;
$tpl->loadTemplateFile('AdminEmpresas/login/login-NUEVO.htm');

$renderer =& new HTML_QuickForm_Renderer_ITStatic($tpl);

$form->accept($renderer);

$tpl->show();

?>