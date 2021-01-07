<?php
require 'db.php';
class usuario
{
    /**
     * Verifica el usuario y la contraseña 
     * proporcionada por el profesor o administrador
     */
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

    /**
     * Lee las incidencias el usuario
     * con el que nos hayamos logeado
     */
    public static function leerIncProf()
    {
        $link = connection::conectar();
        $stm = $link->query('SELECT id_usuario,fecha_inicio,fecha_final,
        material,comentario,comentarioAdm,aula,estado 
        FROM incidencias WHERE id_usuario='
            . $_SESSION['id_us']);
        if ($stm->rowCount() == 0) {
            return null;
        } else {
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    /**
     * Consulta las incidencias y las ordena por
     * fecha de inicio en forma descendente
     * y devuelve las 5 primeras filas
     */
    public static function incidenciasRecientes()
    {
        $link = connection::conectar();
        $stm = $link->query('SELECT fecha_inicio,fecha_final,
        material,comentario,comentarioAdm,aula,estado 
        FROM incidencias 
        WHERE id_usuario = ' . $_SESSION['id_us'] . ' ORDER BY '. 1 .' DESC LIMIT '. 0 .','. 5);
        if ($stm->rowCount() == 0) {
            return null;
        } else {
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
}
