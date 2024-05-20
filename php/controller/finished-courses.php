<?php

include_once '../model/curso.php';
$curso = new Curso();
$cursos = $curso->getIds();
echo json_encode($cursos);
?>