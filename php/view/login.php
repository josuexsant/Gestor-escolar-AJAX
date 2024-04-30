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
  <nav>
    <ul>
      <li><a href="#" id="home">Inicio</a></li>
      <li><a href="#" id="login-admin">Admin</a></li>
    </ul>
  </nav>
  <div class='containter'>
    <h2>Autoservicios</h2>
    
    <img src='#' alt='logo' id="logo-buap">
    
    <img src='#' alt='login-cover' id="login-cover">

    <form id='login-form'>
      <label for='matricula'>Matricula:</label>
      <input type='text' id='matricula' name='matricula' required><br><br>
      <label for='password'>Password:</label>
      <input type='password' id='password' name='password' required><br><br>
      <input type='submit' value='Ingresar'>
      <p id='message'></p>
    </form>
  </div>

</body>

</html>