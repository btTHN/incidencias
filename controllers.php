<?php

/**
 * Controlador de la pagina de
 * inicio de sesion
 */
function index()
{
    if (isset($_SESSION['id_us'])) {
        unset($_SESSION['id_us']);
    }
    require './login.php';
}

/**
 * Controlador de validación
 * del usuario
 */
function validar_user()
{
    if (!isset($_SESSION['id_us'])) {
        if (isset($_POST['user']) && isset($_POST['pswd'])) {
            $datos = usuario::login_user($_POST['user'], $_POST['pswd']);
            if ($datos != null) {
                $_SESSION['id_us'] = $datos['id'];
                $_SESSION['role'] = $datos['role'];
                inicioProf();
            } else {
                $_SESSION['error'] = true;
                index();
            }
        } else {
            $_SESSION['error'] = true;
            index();
        }
    } else {
        inicioProf();
    }
}
function inicioProf()
{
    /**
     * Depende del estado de la incidencia sumara una variable u otra
     * y las mostrara en la vista a traves de una Card
     */
    $resueltas = 0;
    $proceso = 0;
    $pendientes = 0;
    $datosInci = usuario::leerIncProf();
    if ($datosInci != null) {
        foreach ($datosInci as $row) {
            switch ($row['estado']) {
                case 0:
                    $pendientes++;
                    break;
                case 1:
                    $proceso++;
                    break;
                case 2:
                    $resueltas++;
                    break;
            }
        }       
    }

    /**
     * Creara una tabla con las 5 incidencias recientes
     * si no encuentra incidencias por defecto mostrara
     * "Sin incidencias"
     */
    $datosInci = usuario::incidenciasRecientes();
    if ($datosInci != null) {
        $tablaInc = "";
        foreach ($datosInci as $row) {
            $tablaInc .= "<tr><td>" . $row['fecha_inicio'] . "</td>";
            $tablaInc .= "<td>" . $row['fecha_final'] . "</td>";
            $tablaInc .= "<td>" . $row['material'] . "</td>";
            $tablaInc .= "<td>" . $row['comentario'] . "</td>";
            $tablaInc .= "<td>" . $row['comentarioAdm'] . "</td>";
            $tablaInc .= "<td>" . $row['aula'] . "</td>";
            switch ($row['estado']) {
                case 0:
                    $tablaInc .= "<td class='bg-danger estadoLista'>Pendiente</td>";
                    break;
                case 1:
                    $tablaInc .= "<td class='bg-info estadoLista'>En proceso</td>";
                    break;
                case 2:
                    $tablaInc .= "<td class='bg-success estadoLista'>Finalizada</td>";
                    break;
            }
            $tablaInc .= "</tr>";
        }
    }
    else{
        $tablaInc="<tr><td colspan=7><h4>Sin incidencias</h4></td></tr>";
    }
    require './head.php';
    require './inicioProf.php';
}

function incidenciasProf(){
    $datosInci = usuario::leerIncProf();
    $tablaInc="";
    if ($datosInci != null) {        
        foreach ($datosInci as $row) {
            $tablaInc .= "<tr><td>" . $row['fecha_inicio'] . "</td>";
            $tablaInc .= "<td>" . $row['fecha_final'] . "</td>";
            $tablaInc .= "<td>" . $row['material'] . "</td>";
            $tablaInc .= "<td>" . $row['comentario'] . "</td>";
            $tablaInc .= "<td>" . $row['comentarioAdm'] . "</td>";
            $tablaInc .= "<td>" . $row['aula'] . "</td>";
            switch ($row['estado']) {
                case 0:
                    $tablaInc .= "<td class='bg-danger estadoLista'>Pendiente</td>";
                    break;
                case 1:
                    $tablaInc .= "<td class='bg-info estadoLista'>En proceso</td>";
                    break;
                case 2:
                    $tablaInc .= "<td class='bg-success estadoLista'>Finalizada</td>";
                    break;
            }
            $tablaInc .= "</tr>";
        }       
    }
    else{
        $tablaInc="<tr><td colspan=7><h4>Sin incidencias</h4></td></tr>";
    }
    require './head.php';
    require './incidenciasProf.php';
}
