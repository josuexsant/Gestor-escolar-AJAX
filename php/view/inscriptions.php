<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h3>Periodo: Otoño 2024</h3>
  <h3>Materias inscritas</h3>
  <?php
  include_once '../model/curso.php';
  $curso = new Curso();
  $cursos = $curso->getCursosInscritos();

  foreach ($cursos as $curso) {
    echo "<div class='card-box'>";
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>NRC</th>";
    echo "<th>Clave</th>";
    echo "<th>Asignatura</th>";
    echo "<th>Creditos</th>";
    echo "<th>Calificación</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    echo "<tr>";
    echo "<td>{$curso->getNrc()}</td>";
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
  <h3>Inscribir materias</h3>
  <div class="buscador">
    <label for="buscador">Buscar materia</label>
    <input type="text" id="buscador" placeholder="Buscar materia">
    <button id="buscar">Buscar</button>
  </div>

  <!-- Aquí se mostrarán los resultados de la búsqueda -->
  <?php
    include_once '../model/curso.php';
    $curso = new Curso();
    $cursos = $curso->getCursos();

    foreach ($cursos as $curso) {
      echo "<div class='card-box'>";
      echo "<table>";
      echo "<thead>";
      echo "<tr>";
      echo "<th>NRC</th>";
      echo "<th>Clave</th>";
      echo "<th>Asignatura</th>";
      echo "<th>Creditos</th>";
      echo "<th>Calificación</th>";
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";
      echo "<tr>";
      echo "<td>{$curso->getNrc()}</td>";
      echo "<td>{$curso->getClave()}</td>";
      echo "<td>{$curso->getAsignatura()}</td>";
      echo "<td>{$curso->getCreditos()}</td>";
      echo "<td>{$curso->getCalificacion()}</td>";
      echo "</tr>";
      echo "</tbody>";
      echo "</table>";
      echo "<button>Ver detalles</button>";
      echo "<button>Inscribit</button>";
      echo "</div>";
  }
  ?>

  


</body>

</html>