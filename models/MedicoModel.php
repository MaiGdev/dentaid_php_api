<?php

class MedicoModel
{

  public $enlace;

  public function __construct()
  {
    $this->enlace = new MySqlConnect();
  }

  public function all()
  {
    try {
      $sql = 'SELECT `usuario`.`idUsuario`,`usuario`.`correo`,`usuario`.`nombre`,`usuario`.`primerApellido`,`usuario`.`segundoApellido`,
    `usuario`.`estado`,`usuario`.`idTipoUsuario` FROM `DentAid`.`usuario` where idTipoUsuario = 2;';
      $this->enlace->connect();
      $resultado = $this->enlace->executeSQL($sql);
      return $resultado;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function getHorarioPorMedico($id)
  {
    try {
      //consulta
      $sql = "SELECT idHorario, titulo,fechaHoraInicial,fechaHoraFinal,disponible,idMedicoConsulta
            FROM horario where horario.idMedicoConsulta = $id and disponible = 1;";
      $this->enlace->connect();
      $result = $this->enlace->executeSQL($sql);

      return $result;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }


  public function createHorario($object)
  {

    $sql = "INSERT INTO `DentAid`.`horario` (`titulo`,`fechaHoraInicial`, `fechaHoraFinal`, `disponible`,`idMedicoConsulta`)
    VALUES 
    ('$object->titulo',(STR_TO_DATE('$object->inicio', '%m/%d/%Y, %h:%i:%s %p')),(STR_TO_DATE('$object->final', '%m/%d/%Y, %h:%i:%s %p')),'1', '$object->idMedicoConsulta');";

    $this->enlace->connect();
    $result = $this->enlace->executeSQL_DML_last($sql);

    return 'Registro exitoso';
  }
}
