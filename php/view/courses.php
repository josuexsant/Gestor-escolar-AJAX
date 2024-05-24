<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h3>Historial de cursos</h3>

  <?php
  include_once '../model/curso.php';
  $curso = new Curso();
  $cursos = $curso->getCursosTerminados();

  foreach ($cursos as $curso) {
    echo "<div class='card-box'>";
    echo "<table class='table-main'>";
    echo "<thead>";
    echo "<tr>";
    //echo "<th>NRC</th>";
    echo "<th>Clave</th>";
    echo "<th>Asignatura</th>";
    echo "<th>Creditos</th>";
    echo "<th>Calificación</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    echo "<tr>";
   // echo "<td>{$curso->getNrc()}</td>";
    echo "<td>{$curso->getClave()}</td>";
    echo "<td>{$curso->getAsignatura()}</td>";
    echo "<td>{$curso->getCreditos()}</td>";
    echo "<td>{$curso->getCalificacion()}</td>";
    echo "</tr>";
    echo "</tbody>";
    echo "</table>";

    echo "</div>";
  }
  ?>

</body>

</html>