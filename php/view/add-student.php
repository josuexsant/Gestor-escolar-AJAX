<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h2>Agregar estudiante</h2>
  <form id='add-student-form' method='POST'>
    <label for='matricula'>Matricula:</label>
    <br>
    <input type='text' class="input-text" id='matricula' name='matricula' required><br><br>
    <label for='nombre'>Nombre:</label>
    <br>
    <input type='text' class="input-text" id='nombre' name='nombre' required><br><br>
    <label for='apellido'>Apellido:</label>
    <br>
    <input type='text' class="input-text" id='apellido' name='apellido' required><br><br>
    <label for='email'>Email:</label>
    <br>
    <input type='email' class="input-text" id='email' name='email' required><br><br>
    <label for='nss'>NSS:</label>
    <br>
    <input type='text' class="input-text" id='nss' name='nss' required><br><br>
    <input type='submit' class="btn" value='Agregar'>
    <p id='message'></p>
  
</body>
</html>