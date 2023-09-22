<?php

/*requerir una sola vez la conexion, esta conexion se encuentra en modelos
--> conexion.php
*/
require_once "conexion.php";


class ModeloPlanes{
    /*mostrar el plan*/

    /*como se llama la tabla? es la que esta en la base de datos hotellys*/
    static public function mdlMostrarPLanes($tabla){
        /*Conexion proviene del archivo conexion.php que se encuentra en modelos */
        $cn = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        /*ejecutamos la sentencia sql*/
        $cn -> execute();

        /*cuando retornamos una fila: fetch, cuando retornamos varias filas fetchAll */
        return $cn -> fetchAll();

        /*por seguridad*/
        $cn -> close();
        $cn = null;
    }
}