<?php

Class ControladorBanner{
    /*Mostrar Banner*/

    static public function mostrarBanner(){
       /*debe ir igual al nombre de la tabla que has creado en la base de datos hotellys, y el parametro $tabla va por banner.modelo.php*/
        $tabla = "banner";

        /*ModeloBanner viene de modelos --> banner.modelo de esa clase y ese metodo */
        $respuesta = ModeloBanner::mdlMostrarBanner($tabla);

        return $respuesta;
    }
}