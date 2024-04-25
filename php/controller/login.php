<?php
include 'conn.php';

if ( isset( $_POST[ 'username' ] ) && isset( $_POST[ 'password' ] ) ) {
    $user = $_POST[ 'username' ];
    $pass = $_POST[ 'password' ];

    $stmt = $mysqli->prepare( 'SELECT password FROM passwords WHERE id_matricula = ?' );
    $stmt->bind_param( 's', $user );

    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ( $row ) {
        $password = $row[ 'password' ];
        if ( password_verify( $pass, $password ) ) {
            echo 'Login correcto';
        } else {
            echo 'Contraseña incorrecta';
        }
    } else {
        echo 'Usuario no encontrado';
    }
} else {
    echo 'Por favor, proporciona un nombre de usuario y una contraseña';
}
?>