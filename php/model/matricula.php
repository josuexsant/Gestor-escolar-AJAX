<?php
include_once '../config/conn.php';

class Matricula{
  private $id;
  private $estado;
  private $ingreso;
  private $egreso;
  private $carrera;
  private $db;

  public function __construct($id = null, $estado = null, $ingreso = null, $egreso = null, $carrera = null){
    global $db;
    $this->id = $id;
    $this->estado = $estado;
    $this->ingreso = $ingreso;
    $this->egreso = $egreso;
    $this->carrera = $carrera;
    $this->db = $db;
  }

  public function getId(){
    return $this->id;
  }

  public function getEstado(){
    return $this->estado;
  }

  public function getIngreso(){
    return $this->ingreso;
  }

  public function getEgreso(){
    return $this->egreso;
  }

  public function getCarrera(){
    return $this->carrera;
  }

  public function obtenerMatricula(){
    $id = $_SESSION['matricula'];
    $smtp = $this->db->prepare("SELECT * FROM matriculas WHERE id = ?");
    $smtp->execute([$id]);
    $row = $smtp->fetch(PDO::FETCH_ASSOC);


    $matricula = new Matricula($row['id'], $row['activo'], $row['ingreso'], $row['egreso'], $row['carrera']);
    return $matricula;
  }
}

?>