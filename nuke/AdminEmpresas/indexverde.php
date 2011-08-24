<?php
/*session_start();
if (isset($_SESSION["nivela"])){
	header('location:menu.php');
	exit;
}else{
	session_destroy();
}*/

require_once('HTML/QuickForm.php');
require_once('HTML/QuickForm/Renderer/ITStatic.php');
require_once('HTML/Template/ITX.php');

$form =& new HTML_QuickForm('form','post', 'login/validate.php','_parent');

$form -> addElement('text','user','Nombre de Usuario:',array('class' => 'caja','size' => '12'));
$form -> addElement('password','pwd','Clave:',array('class' => 'caja','size' => '12'));

$form -> addElement('submit','boton','Entrar',array('class' => 'boton'));

$tpl =& new HTML_Template_ITX;
$tpl->loadTemplateFile('login/login.htm');

$renderer =& new HTML_QuickForm_Renderer_ITStatic($tpl);

$form->accept($renderer);

$tpl->show();

?>