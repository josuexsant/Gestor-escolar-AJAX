<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h2>Resultados</h2>
  <?php
  include_once '../model/curso.php';

  $curso = new Curso();
  $cursos = $curso->getAsignacionCursos();
  ?>
  <table class ="table-main">
    <tr>
      <th>Asignatura</th>
      <th>Número de veces</th>
    </tr>
    <?php foreach ($cursos as $curso): ?>
      <tr>
        <td><?php echo $curso['asignatura']; ?></td>
        <td><?php echo $curso['numero_veces']; ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>
