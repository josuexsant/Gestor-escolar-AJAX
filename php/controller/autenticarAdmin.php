<?php
include '../config/conn.php';

if ( isset( $_POST[ 'matricula' ] ) && isset( $_POST[ 'password' ] ) ) {
    $matricula = $_POST[ 'matricula' ];
    $pass = $_POST[ 'password' ];

    if ( $pass == '1234' && $matricula == 'admin') {
        session_start();
        $_SESSION[ 'matricula' ] = $matricula;
        $_SESSION[ 'estado' ] = 'activo';
        $_SESSION[ 'tipo' ] = 'admin';
        echo 200;
    } else {
        echo 401;
    }
}
?>
