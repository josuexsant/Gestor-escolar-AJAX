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
  <div class='containter'>
    <h2>Autoservicios</h2>
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