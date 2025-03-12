<?php
require_once "vendor/autoload.php";

use Firebase\JWT\JWT;

class usuario
{

  private $secret_key = 'e0d17975bc9bd57eee132eecb6da6f11048e8a88506cc3bffc7249078cf2a77a';

  public function index()
  {
    //Obtener el listado del Modelo
    $usuario = new UsuarioModel();
    $response = $usuario->all();
    //Si hay respuesta
    if (isset($response) && !empty($response)) {
      //Armar el json
      $json = array(
        'status' => 200,
        'results' => $response
      );
    } else {
      $json = array(
        'status' => 400,
        'results' => "No hay registros"
      );
    }
    echo json_encode(
      $json,
      http_response_code($json["status"])
    );
  }

  public function get($id)
  {
    $usuario = new UsuarioModel();

    $response = $usuario->get($id);

    if (isset($response) && !empty($response)) {

      $json = array(
        'status' => 200,
        'results' => $response
      );
    } else {
      $json = array(
        'status' => 400,
        'results' => "No hay registros"
      );
    }
    echo json_encode(
      $json,
      http_response_code($json["status"])
    );
  }

  //POST
  public function create()
  {
    $inputJSON = file_get_contents('php://input');
    $object = json_decode($inputJSON);
    $usuario = new UsuarioModel();
    $response = $usuario->create($object);


    if (isset($response) && !empty($response)) {
      //Armar el json
      $json = array(
        'status' => 200,
        'results' => "Usuario creado"
      );
    } else {
      $json = array(
        'status' => 400,
        'results' => "No se hizo el registro"
      );
    }
    echo json_encode(
      $json,
      http_response_code($json["status"])
    );
  }

  public function login()
  {

    $inputJSON = file_get_contents('php://input');
    $object = json_decode($inputJSON);
    $usuario = new UsuarioModel();
    $response = $usuario->login($object);
    if (isset($response) && !empty($response) && $response != false) {
      $data = [
        'id' => $response->idUsuario,
        'correo' => $response->correo,
        'nombre' => $response->nombre,
        'primerApellido' => $response->primerApellido,
        'segundoApellido' => $response->segundoApellido,
        'rol' => $response->rol->tipo,
        'estado' => $response->estado,
        'telefonos' => $response->telefonos,
      ];
      // Generar el token JWT 
      $jwt_token = JWT::encode($data, $this->secret_key, 'HS256');
      $json = array(
        'status' => 200,
        'results' => $jwt_token
      );
    } else {
      $json = array(
        'status' => 400,
        'results' => "Usuario o contraseña incorrecta"
      );
    }
    echo json_encode(
      $json,
      http_response_code($json["status"])
    );
  }

  public function autorize()
  {

    try {

      $token = null;
      $headers = apache_request_headers();
      if (isset($headers['Authentication'])) {
        $matches = array();
        preg_match('/Bearer\s(\S+)/', $headers['Authentication'], $matches);
        if (isset($matches[1])) {
          $token = $matches[1];
          return true;
        }
      }
      return false;
    } catch (Exception $e) {
      return false;
    }
  }

  public function update()
  {
    $inputJSON = file_get_contents('php://input');
    $object = json_decode($inputJSON);
    $usuario = new UsuarioModel();
    $response = $usuario->update($object);

    if (isset($response) && !empty($response)) {
      $json = array(
        'status' => 200,
        'results' => "Modificación exitosa"
      );
    } else {
      $json = array(
        'status' => 400,
        'total' => 0,
        'results' => "No hay registros"
      );
    }
    echo json_encode(
      $json,
      http_response_code($json["status"])
    );
  }

  /*  */


  public function delete($id)
  {
    $usuario = new UsuarioModel();

    $response = $usuario->delete($id);

    if (isset($response) && !empty($response)) {

      $json = array(
        'status' => 200,
        'results' => $response
      );
    } else {
      $json = array(
        'status' => 400,
        'results' => "No se pudo eliminar"
      );
    }
    echo json_encode(
      $json,
      http_response_code($json["status"])
    );
  }


  /* ----Tipos------ */

  public function alltipos()
  {
    //Obtener el listado del Modelo
    $usuario = new UsuarioModel();
    $response = $usuario->alltipos();
    //Si hay respuesta
    if (isset($response) && !empty($response)) {
      //Armar el json
      $json = array(
        'status' => 200,
        'results' => $response
      );
    } else {
      $json = array(
        'status' => 400,
        'results' => "No hay registros"
      );
    }
    echo json_encode(
      $json,
      http_response_code($json["status"])
    );
  }

  public function getipo($id)
  {
    $usuario = new UsuarioModel();

    $response = $usuario->getipo($id);

    if (isset($response) && !empty($response)) {

      $json = array(
        'status' => 200,
        'results' => $response
      );
    } else {
      $json = array(
        'status' => 400,
        'results' => "No hay registros"
      );
    }
    echo json_encode(
      $json,
      http_response_code($json["status"])
    );
  }
}
