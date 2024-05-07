<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="personal-data">
    <h3>Datos personales</h3>
    <div class="card-box">
      <br>
      <?php
      include '../model/estudiante.php';
      $estudiante = new Estudiante();
      $estudiante = $estudiante->obtenerEstudiante();
      $id = $estudiante->getId();
      $nombre = $estudiante->getNombre() . " " . $estudiante->getApellidoPaterno() . " " . $estudiante->getApellidoMaterno();
      $nss = $estudiante->getNss();
      $email = $estudiante->getEmail();

      echo "<p>ID: $id</p>";
      echo "<p>Nombre: $nombre</p>";
      echo "<p>NSS: $nss</p>";
      echo "<p>Email: $email</p>";
      ?>

      <buttom class="btn" id="update-email">Editar</buttom>
      <div id="edit-profile"></div>
    </div>
  </div>

  <div class="academic-data">
    <h3>Matricula</h3>
    <div class="card-box">
      <br>
      <?php
      include '../model/matricula.php';
      $matricula = new Matricula();
      $matricula = $matricula->obtenerMatricula();
      $id = $matricula->getId();
      $estado = $matricula->getEstado() == 1 ? "Activo" : "Inactivo";
      $ingreso = $matricula->getIngreso();
      $egreso = $matricula->getEgreso() == null ? "En curso" : $matricula->getEgreso();
      $carrera = $matricula->getCarrera() == 3 ? "Ingenria en Tecnologias de la Información" : "Ingenieria en Software";

      echo "<p>ID: $id</p>";
      echo "<p>Estado: $estado</p>";
      echo "<p>Ingreso: $ingreso</p>";
      echo "<p>Egreso: $egreso</p>";
      echo "<p>Carrera: $carrera</p>";
      ?>
      <br>
    </div>
  </div>

</body>

</html>