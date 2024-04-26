<!DOCTYPE html>
<html>
<head>
  <title>Grid de Botones</title>
  <style>
    .grid {
      display: grid;
      grid-template-columns: repeat(9, 1fr);
      grid-gap: 10px;
    }
    .button {
      width: 50px;
      height: 50px;
      background-color: #ccc;
      border: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="grid">
    <?php
    for ($i = 1; $i <= 9; $i++) {
      for ($j = 1; $j <= 9; $j++) {
        echo '<button class="button"></button>';
      }
    }
    ?>
  </div>
</body>
</html>