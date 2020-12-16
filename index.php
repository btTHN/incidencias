<?php
require './controllers.php';
require './model.php';
define("access",true);
if($_SERVER['PATH_INFO']=='inicio'){
    validar_user($_POST['user'],$_POST['pswd']);
}
else{
index();
}


