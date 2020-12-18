<?php
session_start();
function validar_user($usr, $psw)
{
    $datos = usuario::login_user($usr, $psw);
    if ($datos != null) {
        foreach ($datos as $row) {
            $_SESSION['usrid'] = $row;
        }
        require './inicioProf.php';
    }   
    else{
        echo 'hola';
    }
}
function index()
{
    require './login.php';
}
