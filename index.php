<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/ruta.controlador.php";

/*requerir el controlador y el modelo*/
require_once "controladores/banner.controlador.php";
require_once "modelos/banner.modelo.php";

/*requerir el controlador y modelo de planes*/
require_once "controladores/planes.controlador.php";
require_once "modelos/planes.modelo.php";


require_once "controladores/categorias.controlador.php";
require_once "modelos/categorias.modelo.php";

require_once "controladores/recorrido.controlador.php";
require_once "modelos/recorrido.modelo.php";

require_once "controladores/restaurante.controlador.php";
require_once "modelos/restaurante.modelo.php";


require_once "controladores/habitaciones.controlador.php";
require_once "modelos/habitaciones.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
