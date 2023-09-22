<?php

Class ControladorPlanes{
    /*Mostrar Planes*/

    static public function mostrarPlanes(){
       /*debe ir igual al nombre de la tabla que has creado en la base de datos hotellys, y el parametro $tabla va por banner.planes.php*/
        $tabla = "planes";

        /*ModeloPlanes viene de modelos --> banner.planes de esa clase y ese metodo */
        $respuesta = ModeloPlanes::mdlMostrarPlanes($tabla);

        return $respuesta;
    }
}