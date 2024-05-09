<?php

include_once '../model/curso.php';

if ( isset( $_POST[ 'id' ] ) ) {
    $curso = new Curso();
    $cursos = $curso->getAvailableCourses( $_POST[ 'id' ] );

    echo '<h2>Cursos disponibles</h2>';
    foreach ( $cursos as $curso ) {
        echo "<div class='card-box' id='{$curso->getNrc()}'>";
        echo '<table class="table-main">';
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
        echo "<div class ='btns'>";
        echo "<button id='hideDetails-{$curso->getNrc()}' class='hideDetails btn' data-nrc='{$curso->getNrc()}' >Ocultar detalles</button>";
        echo "<button id='showDetails-{$curso->getNrc()}' class='showDetails btn' data-nrc='{$curso->getNrc()}' >Ver detalles</button>";
        echo "<button class='registate btn' data-nrc='{$curso->getNrc()}'>Inscribir</button>";
        echo '</div>';
        echo '</div>';

    }
} else {
    echo 'No se encontraron resultados';
}
?>