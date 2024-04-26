<?php

//Obtenemos una conexión a la base de datos
include_once '../config/conn.php';

class Estudiante {
    private $id;
    private $nombre;
    private $apellidoPaterno;
    private $apellidoMaterno;
    private $nss;
    private $email;
    private $db;

    public function __construct( $id = null, $nombre = null, $apellidoPaterno = null, $apellidoMaterno = null, $nss = null, $email = null ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidoPaterno = $apellidoPaterno;
        $this->apellidoMaterno = $apellidoMaterno;
        $this->nss = $nss;
        $this->email = $email;
        $this->db = new PDO( 'mysql:host=localhost;dbname=mydb', 'usuario', 'contraseña' );
        $this->db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre( $nombre ) {
        $this->nombre = $nombre;
    }

    public function getApellidoPaterno() {
        return $this->apellidoPaterno;
    }

    public function setApellidoPaterno( $apellidoPaterno ) {
        $this->apellidoPaterno = $apellidoPaterno;
    }

    public function getApellidoMaterno() {
        return $this->apellidoMaterno;
    }

    public function setApellidoMaterno( $apellidoMaterno ) {
        $this->apellidoMaterno = $apellidoMaterno;
    }

    public function getNss() {
        return $this->nss;
    }

    public function setNss( $nss ) {
        $this->nss = $nss;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail( $email ) {
        $this->email = $email;
    }

    public function obtenerEstudiante(){
        $matricula = $_SESSION['matricula'];
        $stmt = $this->db->prepare( 'SELECT * FROM estudiantes WHERE matricula = ?' );
        $stmt->execute( [ $matricula ] );
        $row = $stmt->fetch( PDO::FETCH_ASSOC );
        return new Estudiante( $row[ 'id' ], $row[ 'nombre' ], $row[ 'apellido_paterno' ], $row[ 'apellido_materno' ], $row[ 'nss' ], $row[ 'email' ] );  
    }

    public function obtenerEstudiantes() {
        $stmt = $this->db->query( 'SELECT * FROM estudiantes' );
        $estudiantes = [];
        while ( $row = $stmt->fetch( PDO::FETCH_ASSOC ) ) {
            $estudiante = new Estudiante( $row[ 'id' ], $row[ 'nombre' ], $row[ 'apellido_paterno' ], $row[ 'apellido_materno' ], $row[ 'nss' ], $row[ 'email' ] );
            $estudiantes[] = $estudiante;
        }
        return $estudiantes;
    }

    public function agregarEstudiante() {
        $stmt = $this->db->prepare( 'INSERT INTO estudiantes (nombre, apellido_paterno, apellido_materno, nss, email) VALUES (?, ?, ?, ?, ?)' );
        $stmt->execute( [ $this->nombre, $this->apellidoPaterno, $this->apellidoMaterno, $this->nss, $this->email ] );
        $this->id = $this->db->lastInsertId();
        return $this->id;
    }

    public function obtenerEstudiantePorId( $id ) {
        $stmt = $this->db->prepare( 'SELECT * FROM estudiantes WHERE id = ?' );
        $stmt->execute( [ $id ] );
        $row = $stmt->fetch( PDO::FETCH_ASSOC );
        return new Estudiante( $row[ 'id' ], $row[ 'nombre' ], $row[ 'apellido_paterno' ], $row[ 'apellido_materno' ], $row[ 'nss' ], $row[ 'email' ] );
    }

    public function actualizarEstudiante() {
        $stmt = $this->db->prepare( 'UPDATE estudiantes SET nombre = ?, apellido_paterno = ?, apellido_materno = ?, nss = ?, email = ? WHERE id = ?' );
        $stmt->execute( [ $this->nombre, $this->apellidoPaterno, $this->apellidoMaterno, $this->nss, $this->email, $this->id ] );
        return $stmt->rowCount();
    }

    public function eliminarEstudiante() {
        $stmt = $this->db->prepare( 'DELETE FROM estudiantes WHERE id = ?' );
        $stmt->execute( [ $this->id ] );
        return $stmt->rowCount();
    }
}
?>