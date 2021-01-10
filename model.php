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
        material,comentario,comentarioAdm,aula,estado,prioridad 
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
        material,comentario,comentarioAdm,aula,estado,prioridad
        FROM incidencias 
        WHERE id_usuario = ' . $_SESSION['id_us'] . ' ORDER BY ' . 1 . ' DESC LIMIT ' . 0 . ',' . 5);
        if ($stm->rowCount() == 0) {
            return null;
        } else {
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    /**
     * Inserta una nueva incidencia en la tabla
     * de incidencias y con el id_usuario que 
     * nos hemos logeado
     */
    public static function insertarIncidencia($user, $material, $comen, $aula, $prioridad)
    {
        $link = connection::conectar();
        $stm = "INSERT INTO incidencias (id_usuario, material, comentario, aula,prioridad) VALUES (" . $user . ",'" . $material . "','" . $comen . "'," . $aula .",'".$prioridad."'". ")";
        $link->exec($stm);
    }

    /**
     * Consulta en la base de datos las tareas en estado "pendiente(0)"
     * o "en proceso(1)"
     */
    public static function consultarTareas()
    {
        $link = connection::conectar();
        $stm = $link->query("SELECT id,fecha_inicio,material,comentario,aula,estado,id_usuario,prioridad FROM incidencias WHERE estado IN (0,1)");
        if ($stm->rowCount() == 0) {
            return null;
        } else {
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    /**
     * Consulta el usuario segun su id
     */
    public static function consultarUsuario($id)
    {
        $link = connection::conectar();
        $stm = $link->query("SELECT nombre FROM usuarios WHERE id=" . $id);
        if ($stm->rowCount() == 0) {
            return null;
        } else {
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    /**
     * Actualiza el estado de una incidencia
     * dependiendo de "$_GET['action']"
     */
    public static function cambiarEstado()
    {
        $link = connection::conectar();
        if ($_GET['action'] == 'proceso') {
            $stm = "UPDATE incidencias SET estado = 1 WHERE id = " . $_GET['id'];
        } elseif ($_GET['action'] == 'final') {
            $stm = "UPDATE incidencias SET estado = 2,comentarioAdm = '" . $_POST['comentarioAdm'] . "',fecha_final = current_timestamp() WHERE id = " . $_GET['id'];
        }
        $link->exec($stm);
    }

    /**
     * Consulta una incidencia en concreto
     * segun su id
     */
    public static function consultarInci($id)
    {
        $link = connection::conectar();
        $stm = $link->query("SELECT material,comentario,aula FROM incidencias WHERE id=" . $id);
        if ($stm->rowCount() == 0) {
            return null;
        } else {
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    /**
     * Consulta las incidencias en estado "finalizada(2)"
     */
    public static function consultarTerminadas()
    {
        $link = connection::conectar();
        $stm = $link->query("SELECT id_usuario,fecha_inicio,fecha_final,material,comentario,comentarioAdm,aula FROM incidencias WHERE estado=2");
        if ($stm->rowCount() == 0) {
            return null;
        } else {
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    /**
     * Inserta un nuevo usuario en la base de datos
     */
    public static function insertarUsuario($nombre, $password, $email, $role)
    {
        $link = connection::conectar();
        $stm = "INSERT INTO usuarios (nombre,password,mail,role) VALUES ('" . $nombre . "','" . $password . "','" . $email . "','" . $role . "')";
        $link->exec($stm);
    }
}
