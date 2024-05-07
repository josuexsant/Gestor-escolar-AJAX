<?php

include_once '../model/curso.php';

if ( isset( $_POST[ 'nrc' ] ) ) {
    $curso = new Curso();
    $details = $curso->getDetails( $_POST[ 'nrc' ] );
    $horario = $curso->getHorario( 50875 );
    if ( $details ) {
        $details = json_decode( $details, true );
        $horario = json_decode( $horario, true );
        echo "<hr>";
        echo "
        <h3>Detalles del Curso</h3>
        <p>Curso: {$details['curso']}</p>
        <p>Cupo: {$details['cupo']}</p>
        <p>Profesor: {$details['profesor']}</p>
        <p>Email: {$details['email']}</p>
        <p>Salon: {$details['salon']}</p>
      ";
        echo "<hr>";

        echo "
<h3>Horario del Curso</h3>
<table>
  <tr>
    <th></th>";
        // Celda vacía para la esquina superior izquierda
        foreach ( $horario as $dia => $horas ) {
            echo "
    <th>{$dia}</th>";
            // Encabezado de columna con el nombre del día
        }
        echo "
  </tr>
     <td>Salón</td>";
        foreach ( $horario as $dia => $horas ) {
            echo "
    <td>{$horas['salon']}</td>";
            // Valor del salón para cada día
        }
        echo "
  <tr>
    <td>Hora de inicio</td>";
        foreach ( $horario as $dia => $horas ) {
            echo "
    <td>{$horas['hora_inicio']}</td>";
            // Valor de hora de inicio para cada día
        }
        echo "
  </tr>
  <tr>
    <td>Hora de fin</td>";
        foreach ( $horario as $dia => $horas ) {
            echo "
    <td>{$horas['hora_fin']}</td>";
            // Valor de hora de fin para cada día
        }
        echo "
  </tr>
  <tr>
 
</table>";

    } else {
        echo 'No se encontraron detalles para el curso con NRC: ' . $_POST[ 'nrc' ];
    }
} else {
    echo 'No se ha seleccionado un curso';
}
?>