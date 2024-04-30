<?php
//Verifica si la sesión está activa
session_start();

if ( isset( $_SESSION[ 'matricula' ] ) and $_SESSION[ 'estado' ] == 'activo' ) {
    //Si la sesión está activa, redirige al usuario a la página de inicio
    header( 'Location: php/view/home.php' );
    
} else {
    //Si la sesión no está activa, redirige al usuario a la página de login
    header( 'Location: php/view/login.php' );
}
?>