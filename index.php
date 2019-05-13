<?php


require_once "controllers/template.controller.php";
require_once "controllers/administradores.controlador.php";
require_once "controllers/ventas.controlador.php";
require_once "controllers/visitas.controlador.php";
require_once "controllers/usuarios.controlador.php";
require_once "controllers/productos.controlador.php";
require_once "controllers/comercio.controlador.php";
require_once "controllers/slide.controlador.php";


require_once "models/ventas.modelo.php";
require_once "models/visitas.modelo.php";
require_once "models/administradores.modelo.php";
require_once "models/usuarios.modelo.php";
require_once "models/productos.modelo.php";
require_once "models/comercio.modelo.php";
require_once "models/slide.modelo.php";


require_once "models/rutas.php";

$template= new controllerTemplate();

$template->template();

?>