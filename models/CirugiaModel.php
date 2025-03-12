<?php


class CirugiaModel
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
      $vSQL = "SELECT * FROM DentAid.cirugia;";
      //Establecer conexión
      $this->enlace->connect();
      //Ejecutar la consulta
      $vResultado = $this->enlace->executeSQL($vSQL);

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
      $sql = "SELECT `idCirugia`,`nombre`, `fecha`,`lugar`,`idExpediente`FROM `DentAid`.`cirugia` where idCirugia = $id";
      $this->enlace->connect();
      $result = $this->enlace->executeSQL($sql);

      return $result[0];
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}
