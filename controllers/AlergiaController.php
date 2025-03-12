<?php
class alergia
{

  public function index()
  {
    //Obtener el listado del Modelo
    $alergia = new AlergiaModel();
    $response = $alergia->all();
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

  public function categorias()
  {
    //Obtener el listado del Modelo
    $alergia = new AlergiaModel();
    $response = $alergia->categorias();
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
    $alergia = new AlergiaModel();

    $response = $alergia->get($id);

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
    $alergia = new AlergiaModel();
    $response = $alergia->create($object);

    if (isset($response) && !empty($response)) {
      $json = array(
        'status' => 200,
        'results' => "Alergia creada"
      );
    } else {
      $json = array(
        'status' => 400,
        'results' => "No se creo el recurso"
      );
    }
    echo json_encode(
      $json,
      http_response_code($json["status"])
    );
  }

  public function update()
  {
    $inputJSON = file_get_contents('php://input');
    $object = json_decode($inputJSON);
    $alergia = new AlergiaModel();
    $response = $alergia->update($object);

    if (isset($response) && !empty($response)) {
      $json = array(
        'status' => 200,
        'results' => "Alergia actualizada"
      );
    } else {
      $json = array(
        'status' => 400,
        'results' => "No se actualizo el recurso"
      );
    }
    echo json_encode(
      $json,
      http_response_code($json["status"])
    );
  }


  public function delete($id)
  {
    $alergia = new AlergiaModel();

    $response = $alergia->delete($id);

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
}
