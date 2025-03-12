<?php
class medico
{

  public function index()
  {
    //Obtener el listado del Modelo
    $medico = new MedicoModel();
    $response = $medico->all();
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

  public function create()
  {
    $inputJSON = file_get_contents('php://input');
    $object = json_decode($inputJSON);
    $medico = new MedicoModel();
    $response = $medico->createHorario($object);

    if (isset($response) && !empty($response)) {
      $json = array(
        'status' => 200,
        'results' => "Horario creado"
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

  public function getHorarioPorMedico($id)
  {
    $medico = new MedicoModel();
    $response = $medico->getHorarioPorMedico($id);

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
