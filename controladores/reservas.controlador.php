<?php

Class ControladorReservas{
    /*Mostrar Reservas*/

    static public function ctrMostrarReservas($valor){
      
        $tabla1 = "habitaciones";
        $tabla2 = "agenda";
        $tabla3 = "categorias";

        
        $respuesta = ModeloReservas::mdlMostrarReservas($tabla1, $tabla2, $tabla3, $valor);

        return $respuesta;
    }

    static public function ctrMostrarCodigoReserva($valor){
      ;
        $tabla = "reservas";

        $respuesta = ModeloReservas::mdlMostrarCodigoReserva($tabla, $valor);

        return $respuesta;
    }
}