<?php

use function PHPSTORM_META\map;

class AlergiaModel
{
  public $enlace;

  public function __construct()
  {
    $this->enlace = new MySqlConnect();
  }

  public function all()
  {
    try {
      //Consulta SQL
      $vSQL = "SELECT `idAlergia`, `nombre`,`reaccion`,`observaciones`,`idcategoriaAlergia` FROM `alergia`;";
      //Establecer conexión
      $this->enlace->connect();
      //Ejecutar la consulta
      $vResultado = $this->enlace->executeSQL($vSQL);

      /*       $categoria = $this->getCategoria($vResultado->idcategoriaAlergia);

      $vResultado->categorias = $categoria; */

      //Retornar el resultado
      return $vResultado;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function get($id)
  {
    try {
      //consulta
      $sql = "SELECT `idAlergia`, `nombre`,`reaccion`,`observaciones`,`idcategoriaAlergia` FROM `alergia` where idAlergia = $id";
      $this->enlace->connect();
      $result = $this->enlace->executeSQL($sql);

      return $result[0];
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function categorias()
  {
    try {
      //consulta
      $sql = "select * from categoriaAlergia";
      $this->enlace->connect();
      $result = $this->enlace->executeSQL($sql);

      return $result;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function getCategoria($id)
  {
    try {
      //consulta
      $sql = "select * from categoriaAlergia where idcategoriaAlergia = $id";
      $this->enlace->connect();
      $result = $this->enlace->executeSQL($sql);

      return $response = $result[0];
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function create($object)
  {
    try {
      $sql = "INSERT INTO `DentAid`.`alergia` (`nombre`,`reaccion`,`observaciones`,`idcategoriaAlergia`)" .
        "VALUES ('$object->nombre' ,'$object->reaccion','$object->observaciones','$object->idcategoriaAlergia');";

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
      $vSql = "UPDATE `DentAid`.`alergia` SET
        `nombre` = '$objeto->nombre',
        `reaccion` = '$objeto->reaccion',
        `observaciones` = '$objeto->observaciones',
        `idcategoriaAlergia` = $objeto->idcategoriaAlergia
      WHERE `idAlergia` = $objeto->idAlergia;";

      $this->enlace->connect();
      //Ejecutar la consulta
      $vResultado = $this->enlace->executeSQL_DML($vSql);
      // Retornar el objeto actualizado
      return $this->get($objeto->idAlergia);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function delete($id)
  {
    $sql = "DELETE FROM alergia WHERE idAlergia = $id ;";

    $this->enlace->connect();
    return $this->enlace->executeSQL_DML($sql);
  }
}
