 <form action="logout.php" method="post" class="menuBody" id="menuBodyLogin">
  <center>
 <div class="rbroundbox" style="width: 100%; margin-top: 0px; margin-bottom: 0px;">
				<div class="rbtop">
					<div></div>
				</div>
				<div class="rbcontent">
					 <img src="img/login.gif" alt="Llaves" border="0" align="middle">
					 <span class="titulo3">Bienvenido</span>
				</div><!-- /rbcontent -->
				<div class="rbbot">
					<div></div>
				</div>
  </div>
  <div class="menu" style="border-top: 0px; margin-top: -12px;"><br><br>
	 <?php 
		echo "<div class='subtitulo'>".$_SESSION['nombre']." ".$_SESSION['apellido']."</div>";
		//echo "(".strtolower($_SESSION['alias']).")";
		if(isset($_SESSION['razon_social']) && !isset($_SESSION['idUsr'])){
			echo "(".strtoupper($_SESSION['razon_social']).")";
		}
	 ?>
	 <br><br>  
	 <input type="submit" name="Salir" value="Salir" class="boton">
	 <br><br> 
  </div>
  </center>
 </form>
