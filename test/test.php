<?php
include_once '../php/config/conn.php';
$query = 'SELECT * FROM dias';

$stmt = $db->prepare( $query );
$stmt->execute();

while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
    echo $row[ 'nombre' ] . '<br>';
}
?>
