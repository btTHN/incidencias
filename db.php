<?php

class connection {
    private static $conn = NULL;

    private function __construct(){}

    private function __clone(){}

    public static function conectar(){
        if(!isset(self::$conn)){
            $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
            self::$conn = new PDO('mysql:host=localhost;dbname=jnoguera_gestion_incidencia','root','',$pdo_options);
        }
        return self::$conn;
    }
}