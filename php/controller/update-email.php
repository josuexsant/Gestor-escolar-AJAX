<?php

include '../model/estudiante.php';

if ( isset( $_POST[ 'email' ] ) ) {
    $estudiante = new Estudiante();
    $estudiante = $estudiante->obtenerEstudiante();
    $estudiante->setEmail( $_POST[ 'email' ] );
    $estudiante->actualizarEstudiante();
    echo 200;
} else {
    echo 400;
}
?>