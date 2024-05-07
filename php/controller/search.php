<?php

include_once '../model/curso.php';

if ( isset( $_POST[ 'value' ] ) ) {
    $curso = new Curso();
    $cursos = $curso->search( $_POST[ 'value' ] );

    foreach ( $cursos as $curso ) {
        echo "<div class='card-box' id='{$curso->getNrc()}'>";
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>NRC</th>';
        echo '<th>Clave</th>';
        echo '<th>Asignatura</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '<tr>';
        echo "<td><p id ='nrc'>{$curso->getNrc()}</p></td>";
        echo "<td>{$curso->getClave()}</td>";
        echo "<td>{$curso->getAsignatura()}</td>";
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
        echo "<div id='panel-{$curso->getNrc()}'></div>";
        echo "<button id='hideDetails-{$curso->getNrc()}' class='hideDetails btn' data-nrc='{$curso->getNrc()}' >Ocultar detalles</button>";
        echo "<button id='showDetails-{$curso->getNrc()}' class='showDetails btn' data-nrc='{$curso->getNrc()}' >Ver detalles</button>";
        echo "<button class='registate btn' data-nrc='{$curso->getNrc()}'>Inscribir</button>";
        echo '</div>';

    }
} else {
    echo 'No se encontraron resultados';
}
?>