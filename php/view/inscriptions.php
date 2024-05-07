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

  <!-- Aquí se mostrarán las materias inscritas -->
  <?php
    include_once '../model/curso.php';
    $curso = new Curso();
    $cursos = $curso->getCursosInscritos();

    foreach ($cursos as $curso) {
          echo "<div class='card-box' id='{$curso->getNrc()}'>";
          echo "<table>";
          echo "<thead>";
          echo "<tr>";
          echo "<th>NRC</th>";
          echo "<th>Clave</th>";
          echo "<th>Asignatura</th>";
          echo "</tr>";
          echo "</thead>";
          echo "<tbody>";
          echo "<tr>";
          echo "<td><p id ='nrc'>{$curso->getNrc()}</p></td>";
          echo "<td>{$curso->getClave()}</td>";
          echo "<td>{$curso->getAsignatura()}</td>";
          echo "</tr>";
          echo "</tbody>";
          echo "</table>";
          echo "<div id='panel-inscription-{$curso->getNrc()}'></div>";
          echo "<button id='hideDetailsInscription-{$curso->getNrc()}' class='hideDetailsInscription btn' data-nrc='{$curso->getNrc()}' >Ocultar detalles</button>";
          echo "<button id='showDetailsInscription-{$curso->getNrc()}' class='showDetailsInscription btn' data-nrc='{$curso->getNrc()}' >Ver detalles</button>";
          echo "<button class='delete btn' data-nrc='{$curso->getNrc()}'>Eliminar</button>";
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
  //TODO: Mostrar los cursos disponibles
    include_once '../model/curso.php';
    $curso = new Curso();
    $cursos = $curso->getCursos();

    foreach ($cursos as $curso) {
      echo "<div class='card-box' id='{$curso->getNrc()}'>";
      echo "<table>";
      echo "<thead>";
      echo "<tr>";
      echo "<th>NRC</th>";
      echo "<th>Clave</th>";
      echo "<th>Asignatura</th>";
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";
      echo "<tr>";
      echo "<td><p id ='nrc'>{$curso->getNrc()}</p></td>";
      echo "<td>{$curso->getClave()}</td>";
      echo "<td>{$curso->getAsignatura()}</td>";
      echo "</tr>";
      echo "</tbody>";
      echo "</table>";
      echo "<div id='panel-{$curso->getNrc()}'></div>";
      echo "<button id='hideDetails-{$curso->getNrc()}' class='hideDetails btn' data-nrc='{$curso->getNrc()}' >Ocultar detalles</button>";
      echo "<button id='showDetails-{$curso->getNrc()}' class='showDetails btn' data-nrc='{$curso->getNrc()}' >Ver detalles</button>";
      echo "<button class='registate btn' data-nrc='{$curso->getNrc()}'>Inscribir</button>";
      echo "</div>";
  }
  ?>




</body>

</html>