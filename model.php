<?php
require 'db.php';
class usuario
{
    public static function login_user($usr, $psw)
    {
        $link = connection::conectar();
        $datos_usr = array();
        try {
            foreach ($link->query('SELECT * FROM usuarios WHERE nombre = "' . $usr . '"') as $row) {
                $datos_usr[] = $row;
            }
            echo ($datos_usr[0][1]);
        } catch (PDOException $e) {
            echo 'Error de conexion ' . $e->getMessage();
        }
    }
}
