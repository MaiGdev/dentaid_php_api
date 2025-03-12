<?php
class medicamento
{

  public function index()
  {
    //Obtener el listado del Modelo
    $medicamento = new MedicamentoModel();
    $response = $medicamento->all();
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
    $medicamento = new MedicamentoModel();
    $response = $medicamento->get($id);

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
    $medicamento = new MedicamentoModel();
    $response = $medicamento->create($object);

    if (isset($response) && !empty($response)) {
      $json = array(
        'status' => 200,
        'results' => "Medicamento creado"
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
    $medicamento = new MedicamentoModel();
    $response = $medicamento->update($object);

    if (isset($response) && !empty($response)) {
      $json = array(
        'status' => 200,
        'results' => "Medicamento modificado"
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
    $medicamento = new MedicamentoModel();

    $response = $medicamento->delete($id);

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
