<?php 
						if (!isset($_GET['op'])){
						  if (isset($_SESSION['idUsuario'])){
							  $opcion="operador.php";
							}
							else{
								$opcion="principal.html";
							}
						}
						else{
							$opcion=$_GET['op'].".php";
						}
						cargarPagina($opcion);
					?>
