<?php


require_once "controllers/template.controller.php";
require_once "controllers/administradores.controlador.php";


require_once "models/administradores.modelo.php";

require_once "models/rutas.php";

$template= new controllerTemplate();

$template->template();

?>