
<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Document</title>
</head>

<body>

  <div class='main-panel'>

    <div class='dashboard'>
      <li>
        <ul>
          <a href='#' id='profile'>Perfil</a>
        </ul>
        <ul>
          <a href='#' id='courses'>Mis cursos</a>
        </ul>
        <ul>
          <a href='#' id='inscriptions'>Inscribir curso</a>
        </ul>
        <ul>
          <a href='#' id='map'>Mapa carrera</a>
        </ul>
        <ul>
          <a href='#' id='logout'>Salir</a>
        </ul>
      </li>
    </div>

    <div class='panel' id='panel'>
      <?php
        include '../model/estudiante.php';
        $estudiante = new Estudiante();
        $estudiante = $estudiante->obtenerEstudiante();

        $nombre = $estudiante->getNombre();
        echo "<h1>Bienvenido $nombre</h1>";
      ?>
    </div>
  </div>
</body>

</html>