<?php
include_once '../model/curso.php';
if ( isset( $_POST[ 'nrc' ] ) ) {
    $nrc = $_POST[ 'nrc' ];
    try {
        $curso = new Curso();
        $curso->inscribirCurso( $nrc );
        echo 200;
    } catch( Exception $e ) {
        echo $e->getMessage();
    }
}
?>