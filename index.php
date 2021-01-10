<?php
require_once './controllers.php';
require_once './model.php';
session_start();
define("access", true);
$request = $_SERVER['REQUEST_URI'];
$uri = explode('/', $request);
$uri1 = isset($uri[1]);
$uri2 = isset($uri[2]);
$uri3 = isset($uri[3]);

$path = $_SERVER['PATH_INFO'];

if ($uri2 == 'index.php' && $path == '/inicio') {
    validar_user();
} elseif ($uri2 == 'index.php' && $path == '/') {
    index();
} elseif ($uri2 == 'index.php' && $path == '/salir') {
    index();
} elseif ($uri2 == 'index.php' && $path == '/incidencias') {
    incidenciasProf();
} elseif ($uri2 == 'index.php' && $path == '/nueva' && isset($_GET['controller'])) {
    insertarIncidencia();
} elseif ($uri2 == 'index.php' && $path == '/nueva') {
    nuevaIncidencia();
}
