<?php
require './controllers.php';
require './model.php';

$urlPath=$_SERVER['REQUEST_URI']; ///incidencias/index.php

$rut= explode('/',$urlPath);

$path = $_SERVER['PATH_INFO'];

if($path){
    echo 'hola';
}
else{
    echo 'adios';
}
