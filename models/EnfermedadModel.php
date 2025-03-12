<?php
class EnfermedadModel
{

  public $enlace;

  public function __construct()
  {
    $this->enlace = new MySqlConnect();
  }

  public function all()
  {
    try {
      $sql = 'SELECT `idEnfermedad`,`nombre`,`observaciones` FROM `enfermedad`;';
      $this->enlace->connect();
      $resultado = $this->enlace->executeSQL($sql);
      return $resultado;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function get($id)
  {
    try {
      //consulta
      $sql = "SELECT `idEnfermedad`,`nombre`,`observaciones` FROM `enfermedad` where idEnfermedad = $id";
      $this->enlace->connect();
      $result = $this->enlace->executeSQL($sql);

      return $result[0];
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function create($object)
  {
    try {
      $sql = "INSERT INTO `DentAid`.`enfermedad` (`nombre`,`observaciones`)" .
        "VALUES ('$object->nombre', '$object->observaciones');";

      $this->enlace->connect();
      $result = $this->enlace->executeSQL_DML_last($sql);

      return $this->get($result);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function update($objeto)
  {
    try {
      //Consulta sql
      $sql = "UPDATE `DentAid`.`enfermedad` SET `nombre` = '$objeto->nombre',`observaciones` = '$objeto->observaciones' WHERE `idEnfermedad` = '$objeto->idEnfermedad';";

      $this->enlace->connect();
      //Ejecutar la consulta
      $vResultado = $this->enlace->executeSQL_DML($sql);
      // Retornar el objeto actualizado
      return $this->get($objeto->idEnfermedad);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function delete($id)
  {
    $sql = "DELETE FROM enfermedad WHERE idEnfermedad = $id ;";

    $this->enlace->connect();
    return $this->enlace->executeSQL_DML($sql);
  }
}
