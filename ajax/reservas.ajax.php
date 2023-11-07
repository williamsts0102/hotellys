<?php

require_once "../controladores/reservas.controlador.php";
require_once "../modelos/reservas.modelo.php";

class AjaxReservas{
    
    public $idHabitacion;

    public function ajaxTraerReserva(){
        $valor = $this->idHabitacion;
        $respuesta = ControladorReservas::ctrMostrarReservas($valor);
        echo json_encode($respuesta);

    }

}
if (isset($_POST["idHabitacion"])) {
    $idHabitacion = new AjaxReservas();
    $idHabitacion -> idHabitacion = $_POST["idHabitacion"];
    $idHabitacion -> ajaxTraerReserva();

}
