<?php

class MedicamentoModel
{

  public $enlace;

  public function __construct()
  {
    $this->enlace = new MySqlConnect();
  }

  public function all()
  {
    try {
      $sql = 'SELECT idMedicamento, nombre, descripcion FROM medicamento;';
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
      $sql = "SELECT idMedicamento, nombre, descripcion FROM medicamento where idMedicamento = $id";
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
      $sql = "INSERT INTO `DentAid`.`medicamento`(`nombre`,`descripcion`)" .
        "VALUES('$object->nombre','$object->descripcion');";

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
      $vSql = "UPDATE `DentAid`.`medicamento` SET `nombre` = '$objeto->nombre'," .
        "`descripcion` = '$objeto->descripcion' WHERE `idMedicamento` = $objeto->idMedicamento;";

      $this->enlace->connect();
      //Ejecutar la consulta
      $vResultado = $this->enlace->executeSQL_DML($vSql);
      // Retornar el objeto actualizado
      return $this->get($objeto->idMedicamento);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function delete($id)
  {
    try {
      $sql = "DELETE FROM medicamento WHERE idMedicamento = $id ;";

      $this->enlace->connect();
      return $this->enlace->executeSQL_DML($sql);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}
