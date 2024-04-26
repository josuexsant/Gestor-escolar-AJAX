<?php
session_start();
if ( isset( $_SESSION[ 'matricula' ] ) and $_SESSION[ 'estado' ] == 'activo' ) {
    header( 'Location: php/view/home.php' );
} else {
    header( 'Location: php/view/login.php' );
}
?>