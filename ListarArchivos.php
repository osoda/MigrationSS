<?php 
	include_once("variables.php");
	//$arrayArchivos;
	if ($dir = opendir($directorio)) {
		if(file_exists($nombre_archivo))
		{
		    $mensaje = "El Archivo $nombre_archivo se ha vuelto a crear";
		    //unlink($nombre_archivo);
		    $txt = fopen($nombre_archivo, "w");//Borra el contenido del archiv de texto
		    fclose($txt);
		}
		else
		{
		    $mensaje = "El Archivo $nombre_archivo se ha creado";
		}
		$urla = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].$directorio."/";
		//echo $urla;
				
		while ($archivo = readdir($dir)) {
			if ($archivo != '.' && $archivo != '..' && $archivo != '') {
				$contArchivos++;
			    if($txt = fopen($nombre_archivo, "a"))
			    {
			        if(!fwrite($txt, $urla.$archivo . PHP_EOL))
			        {
			           $mensaje = "Hubo un problema al crear el archivo";
			        }
			        fclose($txt);
			    }
			}
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Listar Archivos</title>
	<link rel="stylesheet" href="Style.css" />
</head>
<body>
	<div class="box effect7" style="background: #A26921">
		<h1>Archivos existentes en el directorio</h1>
		<form name="frmListarArchivos" method="post" > 
		Buscar, guardar y listar los archivos en el directorio
			<input type="submit" id="submit"name="btnListarArchivos" value="Listar" disable=true></input>
		</form>
		<?php 
			if (isset($_POST['btnListarArchivos'])) {
				listarTxt($arrayArchivos, $nombre_archivo, $contArchivos, $mensaje);
			}
			
		 ?>
	</div>
</body>
</html>
<?php 
	function listarTxt(&$arrayArchivos, $nombre_archivo, $contArchivos, $mensaje)
	{
		$i = 0;
		$temp = "";
		if ($txt = fopen($nombre_archivo, "r")) {
			echo "Total de archivos: <strong>$contArchivos</strong><br/>";
			echo $mensaje . "<br/>";
			//echo "Ruta de archivos: <strong>$urla</strong></br>";
			$contArchivos = 1;
			//$nombre = "";
			while (!feof($txt)) {
				$temp = trim(fgets($txt));
				if ($temp != "") {
					echo $contArchivos++.": ". $temp . '<br/>';
					$arrayArchivos[$i] = $temp;
		        	$i++;
				}
			}
			/*if(isset($arrayArchivos[$i-1]) )
			{
				unset($arrayArchivos[$i-1]);
			}*/
		}
		fclose($txt);
	}
 ?>