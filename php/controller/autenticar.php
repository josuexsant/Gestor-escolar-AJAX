<?php
include '../config/conn.php';
if ( isset( $_POST[ 'matricula' ] ) && isset( $_POST[ 'password' ] ) ) {
    $matricula = $_POST[ 'matricula' ];
    $pass = $_POST[ 'password' ];

    $query = 'SELECT password FROM passwords WHERE matricula = :matricula';
    $stmt = $db->prepare( $query );
    $stmt->bindValue( ':matricula', $matricula );
    $stmt->execute();
    $result = $stmt->fetch();


    if ( $result ) {
        $password_from_db = $result[ 'password' ];
        // Aquí comparas la contraseña ingresada con la contraseña de la base de datos
        if ( $pass == $password_from_db ) {
            session_start();
            $_SESSION[ 'matricula' ] = $matricula;
            $_SESSION[ 'estado' ] = 'activo';

            echo 200;
        } else {
            echo 401;
        }
    }
}
?>
