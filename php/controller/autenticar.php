<?php
include '../config/conn.php';
session_start();
if ( isset( $_POST[ 'matricula' ] ) && isset( $_POST[ 'password' ] ) ) {
    $matricula = $_POST[ 'matricula' ];
    $pass = $_POST[ 'password' ];

    $query = 'SELECT password FROM passwords WHERE matricula = :matricula';
    $stmt = $db->prepare( $query );
    $stmt->bindValue( ':matricula', $matricula );
    $stmt->execute();
    $result = $stmt->fetch();

    if ( $result ) {
        $password_hash = $result[ 'password' ];
        if ( password_verify( $pass, $password_hash ) ) {

            $_SESSION[ 'matricula' ] = $matricula;
            $_SESSION[ 'estado' ] = 'activo';

            echo 200;
        }
} }
?>