<?php

/*requerir una sola vez la conexion, esta conexion se encuentra en modelos
--> conexion.php
*/
require_once "conexion.php";


class ModeloReservas{
   
    /*mostrar habitaciones - reservas - categorias con INNER JOIN*/

    
    static public function mdlMostrarReservas($tabla1, $tabla2, $tabla3, $valor){

        $stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.* $tabla3.* FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id_h = $tabla2.id_habitacion INNER JOIN $tabla3 ON $tabla1.tipo_h = $tabla3.id WHERE id_h = :id_h");


        $stmt -> bindParam(":id_h", $valor, PDO::PARAM_STR);       

        $stmt -> execute();
        return $stmt -> fetchAll();
        $stmt -> close();
        $stmt = null;
    }
}