<?php

require_once "conexion.php";

Class ModeloReservas{

	/*=============================================
	MOSTRAR HABITACIONES-RESERVAS-CATEGORIAS CON INNER JOIN
	=============================================*/
	
	static public function mdlMostrarReservas($tabla1, $tabla2, $tabla3, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.*, $tabla3.* FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id_h = $tabla2.id_habitacion INNER JOIN $tabla3 ON $tabla1.tipo_h = $tabla3.id  WHERE id_h = :id_h");

		$stmt -> bindParam(":id_h", $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	Mostrar Codigo Reserva Singular
	=============================================*/

	static public function mdlMostrarCodigoReserva($tabla, $valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE codigo_reserva = :codigo_reserva");

		$stmt -> bindParam(":codigo_reserva", $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
	
	}

	/*=============================================
	Guardar Reserva
	=============================================*/

	static public function mdlGuardarReserva($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_habitacion, id_usuario, pago_reserva, numero_transaccion, codigo_reserva, descripcion_reserva, fecha_ingreso, fecha_salida) VALUES (:id_habitacion, :id_usuario, :pago_reserva, :numero_transaccion, :codigo_reserva, :descripcion_reserva, :fecha_ingreso, :fecha_salida)");

		$stmt->bindParam(":id_habitacion", $datos["id_habitacion"], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datos["id_usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":pago_reserva", $datos["pago_reserva"], PDO::PARAM_STR);
		$stmt->bindParam(":numero_transaccion", $datos["numero_transaccion"], PDO::PARAM_STR);
		$stmt->bindParam(":codigo_reserva", $datos["codigo_reserva"], PDO::PARAM_STR);
		$stmt->bindParam(":descripcion_reserva", $datos["descripcion_reserva"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_ingreso", $datos["fecha_ingreso"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_salida", $datos["fecha_salida"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}



}