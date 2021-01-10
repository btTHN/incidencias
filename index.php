<?php

/**
 * NO ES RESPONSIVE
 */
require_once './controllers.php';
require_once './model.php';
session_start();
define("access", true); //variable para controlar que no se acceda directamente con el nombre del archivo
$request = $_SERVER['REQUEST_URI'];
$uri = explode('/', $request);
$uri1 = isset($uri[1]);
$uri2 = isset($uri[2]);
$uri3 = isset($uri[3]);

$path = $_SERVER['PATH_INFO'];

if ($uri2 == 'index.php' && $path == '/inicio' && isset($_GET['action'])) {
    //Cambio de estado de incidencias a traves del administrado
    cambiarEstado();
} elseif ($uri2 == 'index.php' && $path == '/inicio') {
    //Valida con el que nos identificamos y dependiendo del usuario
    //nos mostrara "inicioProf.php" o "tareasAdmin.php"
    validar_user();
} elseif ($uri2 == 'index.php' && $path == '/') {
    //Formulario de autenticacion de usuario
    index();
} elseif ($uri2 == 'index.php' && $path == '/salir') {
    //Cerrar sesion del usuario
    index();
} elseif ($uri2 == 'index.php' && $path == '/incidencias') {
    //Historial de incidencias del usuario normal
    incidenciasProf();
} elseif ($uri2 == 'index.php' && $path == '/nueva' && isset($_GET['controller'])) {
    //Crea una nueva incidencia 
    insertarIncidencia();
} elseif ($uri2 == 'index.php' && $path == '/nueva') {
    //Formulario de nueva incidencia
    nuevaIncidencia();
} elseif ($uri2 == 'index.php' && $path == '/resueltas') {
    //Historial de incidencias resueltas del administrados
    tareasResueltasAdmin();
} elseif ($uri2 == 'index.php' && $path == '/newUser') {
    //Formulario para agregar un nuevo usuario
    nuevoUsuario();
} else {
    echo ("<h1>ERROR 404 PAGE NOT FOUND</h1>");
}
