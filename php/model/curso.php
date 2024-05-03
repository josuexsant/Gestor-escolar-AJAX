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
        $sql = 'SELECT c.nrc AS nrc, c.clave AS clave_curso, c.periodo, a.nombre AS nombre_asignatura, a.creditos AS creditos_asignatura FROM cursos c JOIN asignaturas a ON c.asignatura = a.id';
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
