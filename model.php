<?php
require 'db.php';
session_start();
class usuario
{
    public static function login_user($usr, $psw)
    {
        $permitir = false;
        $link = connection::conectar();
        $stm = $link->query('SELECT nombre, password, role FROM usuarios WHERE nombre = "' . $usr . '"');
        if ($stm->rowCount() != 0) {
            $results = $stm->fetchAll(PDO::FETCH_ASSOC);
            foreach ($results as $row) {
                if($row['nombre']==$usr&&$row['password']==$psw){
                    $permitir=true;
                    $_SESSION['usr']=$row['id'];
                }
            }            
        }
        return $permitir;
    }
}
