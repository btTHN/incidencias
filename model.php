<?php
require 'db.php';
class usuario
{
    public static function login_user($usr, $psw)
    {
        $link = connection::conectar();
        $stm = $link->query('SELECT id,nombre, password, role FROM usuarios WHERE nombre = "' . $usr . '" and 
        password = "' . $psw . '"');
        if ($stm->rowCount() == 0) {
            return null;
        } else {
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }
    public static function leerIncProf()
    {
        $link = connection::conectar();
        $stm = $link->query('SELECT id_usuario,fecha_inicio,material,comentario,aula,estado FROM incidencia WHERE id_usuario='
            . $_SESSION['id_us']);
        if ($stm->rowCount() == 0) {
            return null;
        } else {
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
}
