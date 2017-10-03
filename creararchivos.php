<div class="box effect7">
	<form name="frmCrearArchivos" method="post">
		<h1>Crear 10 archivos de prueba</h1>
		<input type="submit" id="submit"name="btnCrearArchivos" value="Crear"></input>
	</form>
	<?php
		if (isset($_POST['btnCrearArchivos'])) {
			$numeroArchivos = 10;
			$nombreArchivo = "n";
			for ($i=1; $i <= 10; $i++) { 
				$name = "d/".$nombreArchivo . $i . ".txt";
				if ($txt = fopen($name, "a")) {
					if (!fwrite($txt, "Este es el archivo numero " . PHP_EOL . "$i" . ".txt")) {
						echo "Hubo un problema al crear el archivo #$i";
					}
				}
			}
			echo "Se creo un total de <strong>". ($i-1) . "<strong/> directorios";
		  }else
		  {
		  	echo "No ha creado archivos";
		  }
	?>
</div>