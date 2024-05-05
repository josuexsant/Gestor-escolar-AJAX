<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <div class="container">

    <div class="container-cover">
     
    </div>

    <div class="container-form">
      <img src="img/logo.png" alt='logo' id='logo-buap'>
      <h2>Autoservicios</h2>
      <form id='login-form' method='POST'>
        <label for='matricula'>Matricula:</label>
        <br>
        <input type='text' class="input-text" id='matricula' name='matricula' required><br><br>
        <label for='password'>Password:</label>
        <br>
        <input type='password' class="input-text" id='password' name='password' required><br><br>
        <input type='submit' class="btn" value='Ingresar'>
        <p id='message'></p>
      </form>
    </div>
  </div>

</body>

</html>
</div>