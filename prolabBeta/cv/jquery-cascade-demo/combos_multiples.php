<html>
	<head>
		<script type="text/javascript" src="jquery/jquery.js"></script>
        <script type="text/javascript" src="jquery/jquery.cascade.js"></script>            
        <script type="text/javascript" src="jquery/jquery.cascade.ext.js"></script> 
        <script type="text/javascript" src="jquery/jquery.templating.js"></script> 
		<script type="text/javascript">
			function commonTemplate(item) {
				return "<option value='" + item.Value + "'>" + item.Text + "</option>"; 
			};
			function commonTemplate2(item) {
				return "<option value='" + item.Value + "'>***" + item.Text + "***</option>"; 
			};
			
			function commonMatch(selectedValue) {
				return this.When == selectedValue; 
			};
			
		</script>
	</head>
	<body>
	
	<h1>Ubicacion</h1>
	<div>
	    <?php
			require_once "DB.php";
			require_once 'HTML/Table.php';	

			$query ="SELECT * FROM com_provincia ";
			include("consultar.php");
			echo "<label>Provincia<select id='provincia'>";
			while ($row = $result -> fetchRow(DB_FETCHMODE_ASSOC)){
				echo"<option value=".$row['c_id'].">".$row['d_descripcion']."</option>";
			}
			echo "</select></label></br>";
		?>
		
			
		<label>Partido
			<select id="partido"></select>
		</label></br>
		<label>Localidad
			<select id="localidad"></select>
		</label>		
	</div>
	
	<script type="text/javascript">
		jQuery(document).ready(function()
		{	
			$("#partido").cascade("#provincia",{
				ajax: {url: 'partidos.php'},
				template: commonTemplate,
				match: commonMatch
			});
			
			$("#localidad").cascade("#partido",{
				ajax: {url: 'localidades.php'},
				template: commonTemplate,
				match: commonMatch
			});			
			
			//forzamos un evento de cambio para que se carge por primera vez
			$("#provincia").change();
		});
	</script>
	
    </body>
</html>
