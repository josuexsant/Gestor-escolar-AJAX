<?php
session_start();

if ( isset( $_SESSION[ 'matricula' ] ) && $_SESSION[ 'estado' ] == 'activo' ) {
    // user is logged in
    $nav = '  <nav>
    <ul>
      <li><a href="#" id="home">Inicio</a></li>
      <li><a href="#" id="logout">Salir</a></li>
    </ul>
  </nav>';
} else {
    // user is not logged in
    $nav = '  <nav>
    <ul>
      <li><a href="#" id="home">Inicio</a></li>
      <li><a href="#" id="login-admin">Admin</a></li>
    </ul>
  </nav>';
}
echo $nav;
?>