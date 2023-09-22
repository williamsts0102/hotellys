<?php

//conexion a la base de datos hotellys

class Conexion{
    static public function conectar(){
        $link = new PDO("mysql:host=localhost;dbname=hotellys",
    "root","");

        /*bajo la estructura bajo utf8*/
        $link->exec("set names utf8");
        return $link;
    }
}