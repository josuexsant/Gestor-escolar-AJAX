<?php
include 'nav.php';
echo $nav;
?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Document</title>
</head>

<body>
  <?php
  include '../model/estudiante.php';
  $estudiante = new Estudiante();
  $estudiante = $estudiante->obtenerEstudiante();  
  $nombre = $estudiante->getNombre();

  echo "<h1>Bienvenido $nombre</h1>";
  ?>

</body>

</html>