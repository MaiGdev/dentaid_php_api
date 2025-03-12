<?php

$routesArray = explode("/", $_SERVER['REQUEST_URI']);
// Dejar solo los que tienen valores
$routesArray = array_filter($routesArray);
//print_r($routesArray);
//http://localhost:81/nombreProyecto/

//Sin solicitud al API
if (count($routesArray) == 1) {
  $json = array(
    'status' => 404,
    'result' => 'Not found'
  );
  echo json_encode(
    $json,
    http_response_code($json["status"])
  );
  return;
}

//Solicitud al API
//http://localhost:81/nombreProyecto/controlador/accion/parametro

if (count($routesArray) > 1 && isset($_SERVER['REQUEST_METHOD'])) {
  $controller = $routesArray[2];
  $action = "index";
  try {
    $response = new $controller();
    if (count($routesArray) <= 3) {
      /*       $nueva = $_SERVER['REQUEST_METHOD'];
      $nueva1 = $nueva; */
      if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Methods: PUT');
        header('Access-Control-Allow-Headers: Content-Type');
        header('Access-Control-Max-Age: 86400');
        exit(0);
      }
      switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
          $action = "index";

          /* Ruta especifica en usuario */
          if (in_array("alltipos", $routesArray)) {
            $action = "alltipos";
          }

          if (in_array("getipo", $routesArray)) {
            $action = "getipo";
          }

          /* Ruta especifica en alergias */
          if (in_array("categorias", $routesArray)) {
            $action = "categorias";
          }
          /* Ruta especifica de horario por medico */
          if (in_array("getHorarioPorMedico", $routesArray)) {
            $action = "getHorarioPorMedico";
          }

          break;
        case 'POST':
          $action = "create";
          break;
        case 'PUT':
        case 'PATCH':
          $action = "update";
          break;
        case 'DELETE':
          $action = "delete";
          break;
        default:
          $action = "index";
          /*           if ($_SERVER['REQUEST_METHOD'] === "OPTIONS") {
            $action = "create";
          } */
          break;
      }
      if (count($routesArray) == 3) {
        $param = $routesArray[3];

        switch ($_SERVER['REQUEST_METHOD']) {

          case 'GET':
            $action = "get";

            /* Ruta especifica en usuario */
            if ($routesArray[3] === "alltipos") {
              $action = "alltipos";
            }
            if ($routesArray[3] === "getipo") {
              $action = "getipo";
            }
            /* Ruta especifica en alergia */
            if ($routesArray[3] === "categorias") {
              $action = "categorias";
            }
            /* Ruta especifica de horario por medico */
            if ($routesArray[3] === "getHorarioPorMedico") {
              $action = "getHorarioPorMedico";
            }
            $response->$action($param);
            break;
          case 'POST':
            $action = $routesArray[3];
            $response->$action();
            break;
          default:
            $action = "index";
            $response->$action();
            break;
        }
      } else {
        $response->$action();
      }
    }

    if (count($routesArray) == 4) {
      $action = $routesArray[3];
      $param = $routesArray[4];
      $response->$action($param);
    }
  } catch (\Throwable $th) {
    $json = array(
      'status' => 404,
      'result' => $th
    );
    echo json_encode(
      $json,
      http_response_code($json["status"])
    );
  }
}
