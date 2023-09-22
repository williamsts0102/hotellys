<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/ruta.controlador.php";

/*requerir el controlador y el modelo*/
require_once "controladores/banner.controlador.php";
require_once "modelos/banner.modelo.php";

/*requerir el controlador y modelo de planes*/
require_once "controladores/planes.controlador.php";
require_once "modelos/planes.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
