<?php
/* Mostrar errores */
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', "C:/xampp/htdocs/proyecto/php_error_log");

/* configuracion para que (CORS) el cual es un mecanismo que utiliza cabeceras HTTP adicionales para permitir que un user agent (en-US) obtenga permiso para acceder a recursos seleccionados desde un servidor, en un origen distinto (dominio) al que pertenece */
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");


/*--- Requerimientos Clases o librerías*/
require_once "models/MySqlConnect.php";

/***--- Agregar todos los modelos*/
require_once "models/UsuarioModel.php";
require_once "models/AlergiaModel.php";
require_once "models/EnfermedadModel.php";
require_once "models/MedicamentoModel.php";
require_once "models/MedicoModel.php";
require_once "models/HorarioModel.php";
require_once "models/RolModel.php";
require_once "models/PacienteModel.php";
require_once "models/CirugiaModel.php";
require_once "models/ExpedienteModel.php";


/***--- Agregar todos los controladores*/
require_once "controllers/UsuarioController.php";
require_once "controllers/AlergiaController.php";
require_once "controllers/EnfermedadController.php";
require_once "controllers/MedicamentoController.php";
require_once "controllers/MedicoController.php";
require_once "controllers/HorarioController.php";
require_once "controllers/PacienteController.php";
require_once "controllers/CirugiaController.php";
require_once "controllers/ExpedienteController.php";



//Enrutador
//RoutesController.php
require_once "controllers/RoutesController.php";
$index = new RoutesController();
$index->index();
