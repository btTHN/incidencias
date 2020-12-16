<?php
function validar_user($usr,$psw){
    $acceso=usuario::login_user($usr,$psw);
    if($acceso){
        require './inicioProf.php';
    }
}