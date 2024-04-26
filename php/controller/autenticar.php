<?php
include '../config/conn.php';
include '../config/log.php';
error_log( 'login.php' );

if ( isset( $_POST[ 'matricula' ] ) && isset( $_POST[ 'password' ] ) ) {
    $matricula = $_POST[ 'matricula' ];
    $pass = $_POST[ 'password' ];

    $hash = password_hash( $pass, PASSWORD_DEFAULT );

    $query = 'SELECT password FROM passwords WHERE matricula = :matricula';
    $stmt = $db->prepare( $query );
    $stmt->bindValue( ':matricula', $matricula );
    $stmt->execute();
    $result = $stmt->fetch();

    if ( $result ) {
        $password = $result[ 'password' ];
        if ( password_verify( $pass, $hash ) ) {
            session_start();
            $_SESSION[ 'matricula' ] = $matricula;
            $_SESSION['estado'] = 'activo';
            echo 'success';
        } else {
            die();
            echo 'error';
        }
    } else {
        echo 'Usuario no encontrado';
    }
} else {
    echo 'Por favor, proporciona un nombre de usuario y una contraseña';
}
?>