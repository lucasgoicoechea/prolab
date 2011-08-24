<?php
	session_start();

	if (! $_SESSION["usuario"]){
			header("location:errorAccess.html");
			exit;
		}
	
?>