<?php
include 'nav.php';
echo $nav;
?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
   <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js'></script>
  <script src='../../js/funciones.js'></script>
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

  <a href='#' id='registrarCursos' >Registrar cursos</a>
  <a href='#' id='editar'>Editar datos</a>
  <a href='#' id='projection'>Proyeccion de materias</a>

  <div id='registro'></div>
</body>

</html>