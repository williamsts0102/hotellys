<?php

Class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=hotellys",
						"root",
						"");

		$link->exec("set names utf8");

		return $link;

	}


}