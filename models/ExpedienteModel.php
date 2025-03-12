<?php
class ExpedienteModel
{

  public $enlace;

  public function __construct()
  {
    $this->enlace = new MySqlConnect();
  }

  public function all()
  {
    try {
      $sql = 'SELECT * FROM DentAid.expediente;';
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
      $sql = "SELECT `expediente`.`idExpediente`,
    `expediente`.`sexo`,
    `expediente`.`fechaNacimiento`,
    `expediente`.`tipoSangre`,
    `expediente`.`residencia`,
    `expediente`.`idUsuario`
    FROM `DentAid`.`expediente` where idUsuario = $id";
      $this->enlace->connect();
      $result = $this->enlace->executeSQL($sql);

      return $result[0];
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }


  public function create($object)
  {

    $sql = "INSERT INTO `DentAid`.`expediente`
      (`sexo`,`fechaNacimiento`,`tipoSangre`,`residencia`,`idUsuario`)
      VALUES
      ('$object->sexo',(STR_TO_DATE('$object->fechaNacimiento', '%m/%d/%Y, %h:%i:%s %p')),'$object->tipoSangre','$object->residencia',$object->idUsuario);";

    $this->enlace->connect();
    $result = $this->enlace->executeSQL_DML_last($sql);

    return $this->get($object->idUsuario);
  }

  public function update($object)
  {
    try {

      $hayExpediente = $this->get($object->idUsuario);

      if ($hayExpediente != null) {
        $sqlUpdate = "UPDATE `DentAid`.`expediente`
      SET
      `sexo` = '$object->sexo',
      `fechaNacimiento` = (STR_TO_DATE('$object->fechaNacimiento', '%m/%d/%Y, %h:%i:%s %p')),
      `tipoSangre` = '$object->tipoSangre',
      `residencia` = '$object->residencia'
      WHERE `idExpediente` = $hayExpediente->idExpediente;";

        $this->enlace->connect();
        $result = $this->enlace->executeSQL_DML_last($sqlUpdate);
        return $this->get($object->idUsuario);
      }
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function createAlergia($object)
  {

    $hayExpediente = $this->get($object->idUsuario);

    $sqlDelete = "DELETE FROM `DentAid`.`expedienteAlergia`
    WHERE idExpediente = $hayExpediente->idExpediente";

    $this->enlace->connect();
    $result = $this->enlace->executeSQL_DML_last($sqlDelete);

    foreach ($object->Alergias as $alergia) {
      $dataAlergias[] = array($hayExpediente->idExpediente, $alergia);
    }
    foreach ($dataAlergias as $row) {
      $this->enlace->connect();
      $valores = implode(',', $row);
      $sql = "INSERT INTO `DentAid`.`expedienteAlergia`
    (`idExpediente`,`idAlergia`)
    VALUES(" . $valores . ");";
      $vResultado = $this->enlace->executeSQL_DML($sql);
    }

    return $this->get($object->idUsuario);
  }


  public function getAlergiaExpediente($id)
  {
    try {
      //consulta
      $sql = "SELECT ea.idExpediente, ea.idAlergia, a.nombre
    FROM expedienteAlergia ea , expediente e, alergia a 
    where e.idExpediente = ea.idExpediente and ea.idAlergia = a.idAlergia and e.idUsuario = $id";
      $this->enlace->connect();
      $result = $this->enlace->executeSQL($sql);

      return $result;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function createExpedienteCompartido($object)
  {


    $hayExpediente = $this->get($object->idUsuarioExpediente);

    $sql = "INSERT INTO `DentAid`.`espediente_compartido`
    (`permisos`,`idUsuario`,`idExpediente`)
    VALUES
    ('Solo lectura',$object->idUsuarioACompartir,$hayExpediente->idExpediente);";

    $this->enlace->connect();
    $result = $this->enlace->executeSQL_DML_last($sql);


    return $this->get($object->idUsuarioExpediente);
  }


  public function getAlergia($id)
  {
    try {
      //consulta

      $hayExpediente = $this->get($id);

      $sql = "SELECT a.idAlergia, a.nombre, a.reaccion,
        a.observaciones, a.idcategoriaAlergia
    FROM  alergia a, expedienteAlergia ea where a.idAlergia = ea.idAlergia and  ea.idExpediente = $hayExpediente->idExpediente";
      $this->enlace->connect();
      $result = $this->enlace->executeSQL($sql);


      return $result;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}
