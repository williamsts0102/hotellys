<?php

Class ControladorReservas{

	/*=============================================
	Mostrar Reservas
	=============================================*/

	static public function ctrMostrarReservas($valor){

		$tabla1 = "habitaciones";
		$tabla2 = "reservas";
		$tabla3 = "categorias";

		$respuesta = ModeloReservas::mdlMostrarReservas($tabla1, $tabla2, $tabla3, $valor);

		return $respuesta;

	}


	/*=============================================
	Mostrar Código Reserva Singular
	=============================================*/
	
	static public function ctrMostrarCodigoReserva($valor){

		$tabla = "reservas";

		$respuesta = ModeloReservas::mdlMostrarCodigoReserva($tabla, $valor);

		return $respuesta;

	}

	/*=============================================
	Guardar Reserva
	=============================================*/
	
	static public function ctrGuardarReserva($valor){

		$tabla = "reservas";

		$respuesta = ModeloReservas::mdlGuardarReserva($tabla, $valor);

		return $respuesta;

	}


	/*=============================================
	Mostrar Reservas por usuario
	=============================================*/

	static public function ctrMostrarReservasUsuario($valor){

		$tabla = "reservas";

		$respuesta = ModeloReservas::mdlMostrarReservasUsuario($tabla, $valor);

		return $respuesta;
		
	}


}