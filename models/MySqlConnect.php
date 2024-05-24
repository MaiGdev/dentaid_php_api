<?php

class MySqlConnect
{
  private $result;
  private $sql;
  private $username;
  private $password;
  private $host;
  private $dbname;
  private $port;
  private $link;
  public function __construct()
  {
    // Parametros de conexión
    /* Zeabur */
    /*     $this->host = 'sfo1.clusters.zeabur.com';
    $this->username = 'root';
    $this->password = 'lA738D1qLsNWz0VQ5cK64GSjd9i2OXBJ';
    $this->dbname = 'DentAid';
    $this->port = '31150'; */

    $this->host = 'roundhouse.proxy.rlwy.net';
    $this->username = 'root';
    $this->password = 'jHkkvaUjydfcClHjGjJiojDsGEEOvXYk';
    $this->dbname = 'DentAid';
    $this->port = '52350';

    /* LocalHost */
    /*     $this->host = 'localhost';
    $this->username = 'root';
    $this->password = '123456';
    $this->dbname = 'dentaid'; */
  }

  /**
   * Establecer la conexión
   */
  public function connect()
  {
    try {
      $this->link = new mysqli($this->host, $this->username, $this->password, $this->dbname, $this->port);
    } catch (Exception $e) {
      throw new \Exception('Error: ' . $e->getMessage());
    }
  }
  /**
   * Ejecutar una setencia SQL tipo SELECT
   * @param $sql - string sentencia SQL
   * @param $resultType - tipo de formato del resultado (obj,asoc,num)
   * @returns $resultType
   */
  //
  public function executeSQL($sql, $resultType = "obj")
  {
    $lista = NULL;
    try {

      if ($result = $this->link->query($sql)) {
        for ($num_fila = $result->num_rows - 1; $num_fila >= 0; $num_fila--) {
          $result->data_seek($num_fila);
          switch ($resultType) {
            case "obj":
              $lista[] = mysqli_fetch_object($result);
              break;
            case "asoc":
              $lista[] = mysqli_fetch_assoc($result);
              break;
            case "num":
              $lista[] = mysqli_fetch_row($result);
              break;
            default:
              $lista[] = mysqli_fetch_object($result);
              break;
          }
        }
      } else {
        throw new \Exception('Error: Falló la ejecución de la sentencia' . $this->link->errno . ' ' . $this->link->error);
      }
      $this->link->close();
      return $lista;
    } catch (Exception $e) {
      throw new \Exception('Error: ' . $e->getMessage());
    }
  }
  /**
   * Ejecutar una setencia SQL tipo INSERT,UPDATE
   * @param $sql - string sentencia SQL
   * @returns $num_result - numero de resultados de la ejecución
   */
  //
  public function executeSQL_DML($sql)
  {
    $num_results = 0;
    $lista = NULL;
    try {
      if ($result = $this->link->query($sql)) {
        $num_results = mysqli_affected_rows($this->link);
      }
      $this->link->close();
      return $num_results;
    } catch (Exception $e) {
      throw new \Exception('Error: ' . $e->getMessage());
    }
  }
  /**
   * Ejecutar una setencia SQL tipo INSERT,UPDATE
   * @param $sql - string sentencia SQL
   * @returns $num_result- última id insertado
   */
  //
  public function executeSQL_DML_last($sql)
  {
    $num_results = 0;
    $lista = NULL;
    try {
      if ($result = $this->link->query($sql)) {
        $num_results = $this->link->insert_id;
      }

      $this->link->close();
      return $num_results;
    } catch (Exception $e) {
      throw new \Exception('Error: ' . $e->getMessage());
    }
  }
  /**
   * Escapa caracteres especiales en una cadena para su uso en una sentencia SQL
   * @param $field - campo
   * @returns $field- campo escapado
   */
  //
  public function escape_field($field)
  {
    $field = $this->link->real_escape_string($field);
    return $field;
  }
  public function __destruct()
  {
    //$this->link->close();
  }
}
