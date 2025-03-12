<?php

class PacienteModel
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
    `usuario`.`estado`,`usuario`.`idTipoUsuario` FROM `DentAid`.`usuario` where idTipoUsuario = 3;';
      $this->enlace->connect();
      $resultado = $this->enlace->executeSQL($sql);
      return $resultado;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}
