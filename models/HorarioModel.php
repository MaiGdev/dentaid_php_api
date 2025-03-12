<?php

class HorarioModel
{

  public $enlace;

  public function __construct()
  {
    $this->enlace = new MySqlConnect();
  }

  public function create($object)
  {


    try {
      $sql = "INSERT INTO `DentAid`.`horario` (`titulo`,`fechaHoraInicial`, `fechaHoraFinal`, `disponible`,`idMedicoConsulta`)
    VALUES 
    ('$object->titulo',(STR_TO_DATE('$object->inicio', '%m/%d/%Y, %h:%i:%s %p')),(STR_TO_DATE('$object->final', '%m/%d/%Y, %h:%i:%s %p')),'1', '$object->idMedicoConsulta');";

      $this->enlace->connect();
      $result = $this->enlace->executeSQL_DML_last($sql);

      return 'Registro exitoso';
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function update($object)
  {
    try {
      //Consulta sql
      $vSql = "UPDATE `horario` SET `titulo` = '$object->titulo', `fechaHoraInicial` = (STR_TO_DATE('$object->inicio', '%m/%d/%Y, %h:%i:%s %p')), `fechaHoraFinal` = (STR_TO_DATE('$object->final', '%m/%d/%Y, %h:%i:%s %p')), `disponible` = '1' WHERE `idHorario` = $object->idHorario;";

      $this->enlace->connect();
      //Ejecutar la consulta
      $vResultado = $this->enlace->executeSQL_DML($vSql);
      // Retornar el objeto actualizado
      return "Actualizado";
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}
