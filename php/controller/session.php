<?php
// this code is used to check if the user is logged in
session_start();
if (isset($_SESSION['matricula']) && $_SESSION['estado'] == 'activo') {
    if ($_SESSION['tipo'] == 'admin') {
        echo 201; // User is authenticated and session is active
    } else {
        echo 200; // User is authenticated and session is active
    }
} else {
    echo 401; // User is not authenticated or session is invalid
}
?>  
