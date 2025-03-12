<?php
class horario
{

  public function create()
  {
    $inputJSON = file_get_contents('php://input');
    $object = json_decode($inputJSON);
    $horario = new HorarioModel();
    $response = $horario->create($object);

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

  public function update()
  {
    $inputJSON = file_get_contents('php://input');
    $object = json_decode($inputJSON);
    $horario = new HorarioModel();
    $response = $horario->update($object);

    if (isset($response) && !empty($response)) {
      $json = array(
        'status' => 200,
        'results' => "Horario modificado"
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
