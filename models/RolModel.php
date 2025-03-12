<?php
class rolModel
{
  public $enlace;
  public function __construct()
  {

    $this->enlace = new MySqlConnect();
  }
  public function all()
  {
    try {
      //Consulta sql
      $vSql = "SELECT * FROM tipousuario;";
      $this->enlace->connect();
      //Ejecutar la consulta
      $vResultado = $this->enlace->ExecuteSQL($vSql);

      // Retornar el objeto
      return $vResultado;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

  public function get($id)
  {
    try {
      //Consulta sql
      $vSql = "SELECT * FROM tipoUsuario where idTipoUsuario=$id";
      $this->enlace->connect();
      //Ejecutar la consulta
      $vResultado = $this->enlace->ExecuteSQL($vSql);
      // Retornar el objeto
      return $vResultado;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
  public function getRolUser($idUser)
  {
    try {
      //Consulta sql
      $vSql = "SELECT r.id,r.name
            FROM rol r,user u 
            where r.id=u.rol_id and u.id=$idUser";
      $vSql = "SELECT t.idTipoUsuario, t.tipo
FROM tipoUsuario t, usuario u where t.idTipoUsuario = u.idTipoUsuario and u.idUsuario =$idUser;";
      $this->enlace->connect();
      //Ejecutar la consulta
      $vResultado = $this->enlace->ExecuteSQL($vSql);
      // Retornar el objeto
      return $vResultado[0];
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
}
