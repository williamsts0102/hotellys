<?php

Class ControladorHabitaciones{

    static public function ctrMostrarHabitaciones($valor){

        $tabla1 = "categorias";
        $tabla2 = "habitaciones";

        $respuesta = ModeloHabitaciones::mdlMostrarHabitaciones($tabla1, $tabla2, $valor);
        
        
        return $respuesta;

    }




}
