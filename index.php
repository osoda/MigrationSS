<?php 

// maximum execution time in seconds
set_time_limit (24 * 60 * 60);
?>
<title>Host To Host</title>
<link rel="stylesheet" href="Style.css" />
<center>

</br</p></br</p>
<form method="post" class="box effect7" style="background: #DC2D44" >
  <h1>Transferir archivos de Host a Host</h1>
  <input name="submit" type="submit" id="submit" />
  <p>PHP Tiempo de ejecucion : <?php echo ini_get('max_execution_time');?></p>
</form>



<?php
  // include_once("creararchivos.php");
  // include_once("ListarArchivos.php");

  $nombre_archivo;
  $arrayArchivos;
  //var_dump($arrayArchivos);
  //echo "nombre del archivo es: <strong>$nombre_archivo</strong>";

/**INICIO: Segmento de codigo que copia el archivo*/

if (!isset($_POST['submit'])) die();



//$url = $_POST['url'];

//codigo modificado
?>
<form name="frmDescargar" method="post" class="box effect7">
  Se han descargado los siguienetes archivos: 
<?php
/**INICIO: Segmento de codigo que copia el archivo*/
// maximum execution time in seconds

set_time_limit (24 * 60 * 60);

if (!isset($_POST['submit'])) die();

listarTxt($arrayArchivos, $nombre_archivo, $contArchivos, $mensaje);
echo "</break>";
// folder to save downloaded files to. must end with slash
$destination_folder = 'files/';

//var_dump($arrayArchivos);

foreach ($arrayArchivos as $arch) {
  $url = $arch;
  $newfname = $destination_folder . basename($url);

  //echo "</break>".basename($url);
  $url = str_replace(" ", "%20", $url);
  $file = fopen ($url, "rb");
  if ($file) {
    $newf = fopen ($newfname, "wb");

    if ($newf)
    while(!feof($file)) {
      fwrite($newf, fread($file, 1024 * 8 ), 1024 * 8 );
    }
  }

  if ($file) {
    fclose($file);
  }

  if ($newf) {
    fclose($newf);
  }
}

//$url = $_POST['url'];

?>
</form>
</center>
<!--FIN: Segmento de codigo que copia el archivo-->

