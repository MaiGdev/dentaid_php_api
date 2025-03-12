<?php

class UsuarioModel
{
  public $enlace;
  public function __construct()
  {
    $this->enlace = new MySqlConnect();
  }
  //Listar 
  /* http://localhost:81/DentAid/usuario */
  public function all()
  {
    try {
      //Consulta SQL
      $vSQL = "SELECT `usuario`.`idUsuario`,`usuario`.`correo`,`usuario`.`nombre`,`usuario`.`primerApellido`,`usuario`.`segundoApellido`,`usuario`.`contrasena`,`usuario`.`estado`,
    `usuario`.`idTipoUsuario`FROM `DentAid`.`usuario`;";

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


  /*Obtener el tipo de rol del usuario según el id de usuario */
  public function get($id)
  {
    try {

      $rolM = new rolModel();
      //consulta
      /*       $sql = "SELECT `usuario`.`idUsuario`,`usuario`.`correo`,`usuario`.`nombre`,`usuario`.`primerApellido`,`usuario`.`segundoApellido`,
    `usuario`.`contrasena`,`usuario`.`estado` FROM ``.`usuario` where idUsuario = $id;"; */
      $sql = "SELECT `usuario`.`idUsuario`,`usuario`.`correo`,`usuario`.`nombre`,`usuario`.`primerApellido`,`usuario`.`segundoApellido`,
    `usuario`.`contrasena`,`usuario`.`estado`, `telefono`.`telefono`, `telefono`.`telefonoEmergencia` FROM `usuario`, `telefono`
    where telefono.idUsuario = usuario.idUsuario and usuario.idUsuario = $id;";
      $this->enlace->connect();
      $result = $this->enlace->executeSQL($sql);

      if ($result) {
        $vResultado = $result[0];
        $telefonos = $this->getTelefono($id);
        $rol = $rolM->getRolUser($id);
        $vResultado->rol = $rol;
        $vResultado->telefonos = $telefonos;
        // Retornar el objeto
        return $vResultado;
      } else {
        return null;
      }

      return $response = $result[0];
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function login($objeto)
  {
    try {

      $vSql = "SELECT * from usuario where correo='$objeto->correo'";
      $this->enlace->connect();
      //Ejecutar la consulta
      $vResultado = $this->enlace->ExecuteSQL($vSql);
      if (is_object($vResultado[0])) {
        $user = $vResultado[0];
        /*         if (password_verify($objeto->contrasena, $user->contrasena)) {
          return $this->get($user->idUsuario);
        } */
        if ($objeto->contrasena === $user->contrasena) {
          return $this->get($user->idUsuario);
        }
      } else {
        return false;
      }
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }


  /*Crear Usuario*/
  public function create($objeto)
  {
    try {
      /*       if (isset($objeto->contrasena) && $objeto->contrasena != null) {
        $crypt = password_hash($objeto->contrasena, PASSWORD_BCRYPT);
        $objeto->contrasena = $crypt;
      } */

      $this->enlace->connect();

      $sql = "INSERT INTO `DentAid`.`usuario`(`correo`,`nombre`,`primerApellido`,`segundoApellido`,`contrasena`,`estado`,`idTipoUsuario`)
      VALUES ('$objeto->correo','$objeto->nombre','$objeto->primerApellido','$objeto->segundoApellido','$objeto->contrasena','$objeto->estado',$objeto->idTipoUsuario);";

      $resultado = $this->enlace->executeSQL_DML_last($sql);

      $telefono =  $this->createTelefono($objeto, $resultado);
      return $this->get($resultado);
    } catch (\Throwable $th) {
      //throw $th;
    }
  }

  /*Actualizar */
  public function update($objeto)
  {
    try {

      $this->updateTelefono($objeto);
      //Consulta sql
      $vSql = "UPDATE `DentAid`.`usuario` SET `correo` = '$objeto->correo', `nombre` = '$objeto->nombre',`primerApellido` = '$objeto->primerApellido',`segundoApellido` = '$objeto->segundoApellido', `estado` = '$objeto->estado' WHERE `idUsuario` = '$objeto->idUsuario';";

      $this->enlace->connect();
      //Ejecutar la consulta
      $vResultado = $this->enlace->executeSQL_DML($vSql);
      // Retornar el objeto actualizado
      return $this->get($objeto->idUsuario);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }


  /*Crear telefonoUsuario*/
  public function createTelefono($objeto, $idUsuario)
  {
    try {

      $this->enlace->connect();

      /*       $sql = "INSERT INTO `dentaid`.`telefono`
      (`telefono`,`telefonoEmergencia`,`idUsuario`)
      VALUES
      (`$objeto->telefono`,`$objeto->telEmergencia`,`$idUsuario`); "; */
      $sql = "INSERT INTO `DentAid`.`telefono`
        (`telefono`,`telefonoEmergencia`,`idUsuario`)
        VALUES
        ('$objeto->telefono','$objeto->telEmergencia',$idUsuario); ";

      $resultado = $this->enlace->executeSQL_DML_last($sql);
      return "Creado";
    } catch (\Throwable $e) {
      die($e->getMessage());
    }
  }

  public function updateTelefono($objeto)
  {
    try {

      $telefonoAnterior = $this->getTelefono($objeto->idUsuario);

      //Consulta sql
      $vSql = "UPDATE `DentAid`.`telefono`
                SET
                `telefono` = '$objeto->telefono',
                `telefonoEmergencia` = '$objeto->telefonoEmergencia',
                `idUsuario` =$objeto->idUsuario
                WHERE `id` = $telefonoAnterior->id;";

      $this->enlace->connect();
      //Ejecutar la consulta
      $vResultado = $this->enlace->executeSQL_DML($vSql);
      // Retornar el objeto actualizado
      return $this->get($objeto->idUsuario);
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function getTelefono($idUsuario)
  {
    try {

      //consulta
      $sql = "SELECT * FROM DentAid.telefono where telefono.idUsuario = $idUsuario;";
      $this->enlace->connect();
      $result = $this->enlace->executeSQL($sql);

      return $response = $result[0];
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }



  /*  */


  public function delete($id)
  {
    $sql = "DELETE FROM usuario WHERE idUsuario = $id ;";

    $this->enlace->connect();
    return $this->enlace->executeSQL_DML($sql);
  }


  /* ------Tipo------ */
  public function alltipos()
  {
    try {
      //Consulta SQL
      $vSQL = "SELECT idTipoUsuario,tipo FROM tipoUsuario;";
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

  /*Obtener el tipo de rol del usuario según el id de usuario */
  public function getipo($id)
  {
    try {
      //consulta
      $sql = "select t.tipo from tipoUsuario t, usuario u where u.idUsuario = $id and u.idTipoUsuario = t.idTipoUsuario";
      $this->enlace->connect();
      $result = $this->enlace->executeSQL($sql);

      return $response = $result[0];
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }


  public function createTipo($objeto)
  {

    $this->enlace->connect();

    $sql = "Insert into tipoUsuario (tipo) values ('$objeto->tipo')";
    $resultado = $this->enlace->executeSQL_DML($sql);
    return $this->get($resultado);
  }
}
