<?php
class cirugia
{

  public function index()
  {
    //Obtener el listado del Modelo
    $cirugia = new CirugiaModel();
    $response = $cirugia->all();
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
    $cirugia = new CirugiaModel();

    $response = $cirugia->get($id);

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
