<?php

Class ControladorCategorias{

	/*=============================================
	Mostrar Categorias
	=============================================*/

	static public function ctrMostrarCategorias(){

		$tabla = "categorias";

		$respuesta = ModeloCategorias::mdlMostrarCategorias($tabla);

		return $respuesta;

	}

}