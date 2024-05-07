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

      <h2>Ultimas noticias</h2>
      <div class="card-box">
        <h1>Preparate este año para la FEPRO</h1>
        <iframe
          src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Ffeprofcc%2Fposts%2Fpfbid02eK8bZQyccNiZPdUhmPzaoAQKYMfavuQZFNLQrSHSuFVwqwCg2WTDo7optqgFky3ol&show_text=true&width=500&is_preview=true"
          width="500" height="403" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
          allowfullscreen="true"
          allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
      </div>
      <div class="card-box">
        <h1>Asi se vivio el LoboHack</h1>
        <iframe
          src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FVinculandoteFcc%2Fposts%2Fpfbid02wX6R4dPFtfgSqdSjxHdwdqz4Pw6fctNnGyPmS6Xyx4TRHvhqkqBPK773jE7FRQhPl&show_text=true&width=500&is_preview=true"
          width="100%" height="auto" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
          allowfullscreen="true"
          allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
      </div>
      <div class="card-box">
        <h1>Convocatoria</h1>
        <iframe
          src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2FVinculandoteFcc%2Fposts%2Fpfbid02hJfcqTFVntaUWtisAJXfEfHC3YrkaGNG79BcfXCUX3p9MTZvswk9cNm5jeSjkL8xl&show_text=true&width=500&is_preview=true"
          width="500" height="665" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
          allowfullscreen="true"
          allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
      </div>
    </div>
</body>

</html>