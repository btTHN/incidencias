<?php
require './controllers.php';
require './model.php';
define("access",true);
$path = $_SERVER['PATH_INFO'];
echo('REQUEST_URI: '.$_SERVER['REQUEST_URI']);
echo("<br>");
echo("PATH_INFO: ".$path);
if(empty($_SERVER['PATH_INFO'])){
    echo 'hola';
}
if($path=='/inicio'){
    validar_user($_POST['user'],$_POST['pswd']);
}
else{
index();
}


