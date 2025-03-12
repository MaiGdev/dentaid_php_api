<?php
class enfermedad
{

  public function index()
  {
    $enfermedad = new EnfermedadModel();
    $response = $enfermedad->all();

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

  public function get($id)
  {
    $enfermedad = new EnfermedadModel();

    $response = $enfermedad->get($id);

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

  public function create()
  {
    $inputJSON = file_get_contents('php://input');
    $object = json_decode($inputJSON);
    $enfermedad = new EnfermedadModel();
    $response = $enfermedad->create($object);

    if (isset($response) && !empty($response)) {
      $json = array(
        'status' => 200,
        'results' => "Enfermedad creada"
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
    $enfermedad = new EnfermedadModel();
    $response = $enfermedad->update($object);

    if (isset($response) && !empty($response)) {
      $json = array(
        'status' => 200,
        'results' => "Enfermedad modificada"
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

  public function delete($id)
  {
    $enfermedad = new EnfermedadModel();

    $response = $enfermedad->delete($id);

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
