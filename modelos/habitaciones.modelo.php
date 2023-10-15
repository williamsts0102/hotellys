<?php

require_once "conexion.php";

class ModeloHabitaciones{

        static public function mdlMostrarHabitaciones($tabla1, $tabla2, $valor){

        $stmt = conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.*FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id = $tabla2.tipo_h WHERE ruta = :ruta");


        $stmt -> bindParam(":ruta", $valor, PDO::PARAM_STR);       

        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
        $stmt = null;




        }


}