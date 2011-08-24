<?
//revisamos si es login por sesiones o por formulario
if (!isset($_POST['usuario_digitado']) && !isset($_POST['clave_digitada'])) {
	//Vanessa: yo comente la sigueinte linea:
//	session_start();
	//usamos los valores de las sesiones
	$usuario = $_SESSION['usuario'];
	$clave = $_SESSION['clave'];
}else{
	//usamos los datos ingresados
	//Vanessa: yo comente la sigueinte linea:
	//session_start();
	//borramos las sesiones por si existen
	unset($_SESSION['usuario']);
	unset($_SESSION['clave']);
	
	$usuario = $_POST['usuario_digitado'];
	$clave = $_POST['clave_digitada'];
	$_SESSION['usuario'] = $usuario;
	$_SESSION['clave'] = $clave;
}

if (!$usuario) {
	//no hay login disponible
	include("interface.php");
	exit;
}
if (!$clave) {
	//no hay contraseña
	$mensaje = "contaseña incorrecta";
	include("interface.php");
	exit;
}
//nos conectamos a la bd
$cnx = conectar();
//buscamos el usuario
$userQuery = mysql_query("SELECT * FROM usuarios WHERE usuario = '$usuario'") or die (mysql_error());
//revisamos usuario y password
if (mysql_num_rows($userQuery) > 0) {
	//usuario existe, seguimos
	$userArray = mysql_fetch_array($userQuery);
	if ($usuario != $userArray['usuario']){
		//caso sensitivo, usuario no esta presente en bd
		$message = "Usuario no Existe";
		echo $message;
		include("interface.php");
		exit;
	}
	if (!$userArray['clave']){
		//no tiene clave en bd, no entra
		$message = "No se encontró contraseña para el usuario";
		include("interface.php");
		exit;
	}
	if (stripslashes($userArray['clave']) != $clave) {
		//contraseña es incorrecta
		$message = "Contraseña es incorrecta";
		include("interface.php");
		exit;
	}else{
	//todo joya	
	$_SESSION["idUsuario"]=$userArray['id'];
	}
}else{
	//usuario no existe del todo
	$message = "Usuario no Existe";
	include("interface.php");
	exit;
}
//si hemos llegado hasta aqui significa que el login es correcto
?>