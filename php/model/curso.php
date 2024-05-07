<?php
include_once '../config/conn.php';
session_start();

class Curso {
    private $matricula;
    private $nrc;
    private $clave;
    private $periodo;
    private $asignatura;
    private $creditos;
    private $terminado;
    private $calificacion;
    private $db;

    public function __construct( $matricula = null, $nrc = null, $clave = null, $periodo = null, $asignatura = null, $creditos = null, $terminado = null, $calificacion = null ) {
        global $db;
        $this->matricula = $_SESSION[ 'matricula' ];
        $this->nrc = $nrc;
        $this->clave = $clave;
        $this->periodo = $periodo;
        $this->asignatura = $asignatura;
        $this->creditos = $creditos;
        $this->terminado = $terminado;
        $this->calificacion = $calificacion;
        $this->db = $db;
    }

    public function getCursosInscritos() {

        $matricula = $_SESSION[ 'matricula' ];
        $sql = 'SELECT ac.matricula, ac.curso AS nrc, c.clave AS clave_curso, c.periodo, a.nombre AS nombre_asignatura, a.creditos AS creditos_asignatura, ac.terminado, ac.calificacion FROM `asignacion-cursos` ac JOIN cursos c ON ac.curso = c.nrc JOIN asignaturas a ON c.asignatura = a.id WHERE ac.matricula = ? AND ac.terminado = 0';
        $stmt = $this->db->prepare( $sql );
        $stmt->execute( [ $matricula ] );
        $cursos = array();
        while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
            $curso = new Curso( $row[ 'matricula' ], $row[ 'nrc' ], $row[ 'clave_curso' ], $row[ 'periodo' ], $row[ 'nombre_asignatura' ], $row[ 'creditos_asignatura' ], $row[ 'terminado' ], $row[ 'calificacion' ] );
            array_push( $cursos, $curso );
        }
        return $cursos;

    }

    public function getCursos() {
        $sql = 'SELECT c.nrc AS nrc, c.clave AS clave_curso, c.periodo, a.nombre AS nombre_asignatura, a.creditos AS creditos_asignatura FROM cursos c JOIN asignaturas a ON c.asignatura = a.id AND c.periodo = 10';
        $stmt = $this->db->prepare( $sql );
        $stmt->execute();
        $cursos = array();
        while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
            $curso = new Curso( null, $row[ 'nrc' ], $row[ 'clave_curso' ], $row[ 'periodo' ], $row[ 'nombre_asignatura' ], $row[ 'creditos_asignatura' ] );
            array_push( $cursos, $curso );
        }
        return $cursos;
    }

    public function getCursosTerminados() {
        $matricula = $_SESSION[ 'matricula' ];
        $sql = 'SELECT ac.matricula, ac.curso AS nrc, c.clave AS clave_curso, c.periodo, a.nombre AS nombre_asignatura, a.creditos AS creditos_asignatura, ac.terminado, ac.calificacion FROM `asignacion-cursos` ac JOIN cursos c ON ac.curso = c.nrc JOIN asignaturas a ON c.asignatura = a.id WHERE ac.matricula = ? AND ac.terminado = 1';
        $stmt = $this->db->prepare( $sql );
        $stmt->execute( [ $matricula ] );
        $cursos = array();
        while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
            $curso = new Curso( $row[ 'matricula' ], $row[ 'nrc' ], $row[ 'clave_curso' ], $row[ 'periodo' ], $row[ 'nombre_asignatura' ], $row[ 'creditos_asignatura' ], $row[ 'terminado' ], $row[ 'calificacion' ] );
            array_push( $cursos, $curso );
        }
        return $cursos;
    }

    public function getDetails( $nrc ) {
        // Query to get details from the current table
        $sql = 'SELECT seccion, cupo FROM cursos WHERE nrc = ?';
        $stmt = $this->db->prepare( $sql );
        $stmt->execute( [ $nrc ] );
        $cursoDetails = $stmt->fetch( PDO::FETCH_ASSOC );

        // Query to get details from another table
        $sql = 'SELECT p.nombre, p.apellido_paterno, p.apellido_materno, p.email FROM profesores p JOIN `asignacion-profesores` ap ON ap.profesor = p.id WHERE ap.curso = ?';
        $stmt = $this->db->prepare( $sql );
        $stmt->execute( [ $nrc  ] );
        $asignaturaDetails = $stmt->fetch( PDO::FETCH_ASSOC );

        // Query for schedule
        $sql = 'SELECT salon, dia, hora_inicio, hora_fin FROM `asignacion-horario` WHERE curso = ?';
        $stmt = $this->db->prepare( $sql );
        $stmt->execute( [ 50875 ] );
        $horario = $stmt->fetch( PDO::FETCH_ASSOC );

        // Combine the results into a single array
        $details = [
            'curso' => $cursoDetails[ 'seccion' ],
            'cupo' => $cursoDetails[ 'cupo' ],
            'profesor' => $asignaturaDetails[ 'nombre' ] . ' ' . $asignaturaDetails[ 'apellido_paterno' ] . ' ' . $asignaturaDetails[ 'apellido_materno' ],
            'email' => $asignaturaDetails[ 'email' ],
            'salon' => $horario[ 'salon' ],
            'dia' => $horario[ 'dia' ],
            'hora_inicio' => $horario[ 'hora_inicio' ],
            'hora_fin' =>  $horario[ 'hora_fin' ],
        ];

        return json_encode( $details );
    }

    public function getHorario( $nrc ) {
        $dias = [ 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado' ];
        $horario = [];
        // Array to store the schedule

        for ( $i = 1; $i <= 6; $i++ ) {
            $sql = 'SELECT salon, dia, hora_inicio, hora_fin FROM `asignacion-horario` WHERE curso = ? AND dia = ?';
            $stmt = $this->db->prepare( $sql );
            $stmt->execute( [ $nrc, $i ] );
            $dia = $stmt->fetch( PDO::FETCH_ASSOC );

            if ( $dia ) {
                $horario[ $dias[ $i - 1 ] ] = [
                    'hora_inicio' => $dia[ 'hora_inicio' ],
                    'hora_fin' => $dia[ 'hora_fin' ],
                    'salon' => $dia[ 'salon' ]
                ];
            } else {
                $horario[ $dias[ $i - 1 ] ] = [
                    'hora_inicio' => '--:--',
                    'hora_fin' => '--:--',
                    'salon' => ''

                ];
            }
        }
        return json_encode( $horario );
    }
    //proximamente

    public function inscribirCurso( $nrc ) {
        $matricula = $_SESSION[ 'matricula' ];
        $sql = 'INSERT INTO `asignacion-cursos` (matricula, curso, terminado, calificacion) VALUES (?, ?, 0, null)';
        $stmt = $this->db->prepare( $sql );
        $stmt->execute( [ $matricula, $nrc ] );
    }

    public function deleteCurso( $nrc ) {
        $matricula = $_SESSION[ 'matricula' ];
        $sql = 'DELETE FROM `asignacion-cursos` WHERE matricula = ? AND curso = ?';
        $stmt = $this->db->prepare( $sql );
        $stmt->execute( [ $matricula, $nrc ] );
    }

    public function search( $value ) {
        $sql = 'SELECT c.nrc AS nrc, c.clave AS clave_curso, c.periodo, a.nombre AS nombre_asignatura, a.creditos AS creditos_asignatura FROM cursos c JOIN asignaturas a ON c.asignatura = a.id WHERE a.nombre LIKE ?';
        $stmt = $this->db->prepare( $sql );
        $stmt->execute( [ '%' . $value . '%' ] );
        $cursos = array();
        while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
            $curso = new Curso( null, $row[ 'nrc' ], $row[ 'clave_curso' ], $row[ 'periodo' ], $row[ 'nombre_asignatura' ], $row[ 'creditos_asignatura' ] );
            array_push( $cursos, $curso );
        }
        return $cursos;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    public function getNrc() {
        return $this->nrc;
    }

    public function getClave() {
        return $this->clave;
    }

    public function getPeriodo() {
        return $this->periodo;
    }

    public function getAsignatura() {
        return $this->asignatura;
    }

    public function getCreditos() {
        return $this->creditos;
    }

    public function getTerminado() {
        return $this->terminado;
    }

    public function getCalificacion() {
        return $this->calificacion;
    }

}
