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
                if ($_SESSION['role'] == 'ROLE_USER') {
                    inicioProf();
                } else {
                    tareasAdmin();
                }
            } else {
                $_SESSION['error'] = true;
                index();
            }
        } else {
            $_SESSION['error'] = true;
            index();
        }
    } else {
        if ($_SESSION['role'] == 'ROLE_USER') {
            inicioProf();
        } else {
            tareasAdmin();
        }
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
            switch ($row['prioridad']) {
                case 'BAJA':
                    $tablaInc .= "<td class='text-primary'>" . $row['prioridad'] . "</td>";
                    break;
                case 'MEDIO':
                    $tablaInc .= "<td class='text-warning'>" . $row['prioridad'] . "</td>";
                    break;
                case 'ALTA':
                    $tablaInc .= "<td class='text-danger'>" . $row['prioridad'] . "</td>";
                    break;
            }
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
    } else {
        $tablaInc = "<tr><td colspan=8><h4>Sin incidencias</h4></td></tr>";
    }
    require './head.php';
    require './inicioProf.php';
}

/**
 * Crea una variable de tipo string
 * que contiene una tabla con las incidencias
 * encontradas en la base de datos
 * si se da el caso que no hay incidencias
 * llenara esa tabla con la frase
 * "Sin incidencias"
 */
function incidenciasProf()
{
    if (isset($_SESSION['id_us'])) {
        $datosInci = usuario::leerIncProf();
        $tablaInc = "";
        if ($datosInci != null) {
            foreach ($datosInci as $row) {
                $tablaInc .= "<tr><td>" . $row['fecha_inicio'] . "</td>";
                $tablaInc .= "<td>" . $row['fecha_final'] . "</td>";
                $tablaInc .= "<td>" . $row['material'] . "</td>";
                $tablaInc .= "<td>" . $row['comentario'] . "</td>";
                $tablaInc .= "<td>" . $row['comentarioAdm'] . "</td>";
                $tablaInc .= "<td>" . $row['aula'] . "</td>";
                switch ($row['prioridad']) {
                    case 'BAJA':
                        $tablaInc .= "<td class='text-primary'>" . $row['prioridad'] . "</td>";
                        break;
                    case 'MEDIO':
                        $tablaInc .= "<td class='text-warning'>" . $row['prioridad'] . "</td>";
                        break;
                    case 'ALTA':
                        $tablaInc .= "<td class='text-danger'>" . $row['prioridad'] . "</td>";
                        break;
                }
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
        } else {
            $tablaInc = "<tr><td colspan=8><h4>Sin incidencias</h4></td></tr>";
        }
        require './head.php';
        require './incidenciasProf.php';
    } else {
        index();
    }
}

/**
 * Muestra la vista para crear una nueva incidencia
 */
function nuevaIncidencia()
{
    if (isset($_SESSION['id_us'])) {
        require './head.php';
        require './nuevaProf.php';
    } else {
        index();
    }
}

/**
 * Inserta una nueva incidencia en la base de datos
 * no se pide fecha porque la base de datos por defecto
 * introduce la fecha del momento de la creacion
 */
function insertarIncidencia()
{
    if (isset($_SESSION['id_us'])) {
        usuario::insertarIncidencia($_SESSION['id_us'], $_POST['material'], $_POST['comentario'], $_POST['aula'],$_POST['prioridad']);
        require './head.php';
        require './nuevaProf.php';
    } else {
        index();
    }
}

/**
 * Controlador para mostrar las tareas pendientes o en proceso
 * del administrador
 */
function tareasAdmin()
{
    $tareas = usuario::consultarTareas();
    $tablaTareas = "";
    if ($tareas != null) {
        foreach ($tareas as $row) {
            $tablaTareas .= "<tr>";
            $nombreUsuario = usuario::consultarUsuario($row['id_usuario']);
            if ($nombreUsuario != null) {
                foreach ($nombreUsuario as $user) {
                    $tablaTareas .= "<td>" . $user['nombre'] . "</td>";
                }
            } else {
                $tablaTareas .= "<td>NaN</td>";
            }
            $tablaTareas .= "<td>" . $row['fecha_inicio'] . "</td>";
            $tablaTareas .= "<td>" . $row['material'] . "</td>";
            $tablaTareas .= "<td>" . $row['comentario'] . "</td>";
            $tablaTareas .= "<td>" . $row['aula'] . "</td>";
            switch ($row['prioridad']) {
                case 'BAJA':
                    $tablaTareas .= "<td class='text-primary'>" . $row['prioridad'] . "</td>";
                    break;
                case 'MEDIO':
                    $tablaTareas .= "<td class='text-warning'>" . $row['prioridad'] . "</td>";
                    break;
                case 'ALTA':
                    $tablaTareas .= "<td class='text-danger'>" . $row['prioridad'] . "</td>";
                    break;
            }
            switch ($row['estado']) {
                case 0:
                    $tablaTareas .= "<td class='bg-danger estadoLista'>Pendiente</td>";
                    $tablaTareas .= "<td><a href='./inicio?id=" . $row['id'] . "&action=proceso'>En proceso</a></td>";
                    break;
                case 1:
                    $tablaTareas .= "<td class='bg-info estadoLista'>En proceso</td>";
                    $tablaTareas .= "<td><a href='./inicio?id=" . $row['id'] . "&action=finalizar'>Finalizar</a></td>";
                    break;
            }
            $tablaTareas .= "</tr>";
        }
    } else {
        $tablaTareas = "<tr><td colspan=8><h4>Sin incidencias</h4></td></tr>";
    }
    require './head.php';
    require './tareasAdmin.php';
}

/**
 * Controlador para cambiar de estado una incidencia
 * a "En proceso" o "Finalizada"
 */
function cambiarEstado()
{
    if ($_GET['action'] == 'proceso') {
        usuario::cambiarEstado();
        tareasAdmin();
    } elseif ($_GET['action'] == 'finalizar') {
        $datosIncidencia = [];
        $incidencia = usuario::consultarInci($_GET['id']);
        foreach ($incidencia as $row) {
            $datosInci = array("material" => $row['material'], "comentario" => $row['comentario'], "aula" => $row['aula']);
        }
        require './head.php';
        require './finalizarInci.php';
    } elseif ($_GET['action'] == 'final') {
        usuario::cambiarEstado();
        tareasAdmin();
    }
}

/**
 * Controlador para mostrar las tareas finalizadas
 */
function tareasResueltasAdmin()
{
    $tareasResueltas = usuario::consultarTerminadas();
    $tablaTareas = "";
    if ($tareasResueltas != null) {
        foreach ($tareasResueltas as $row) {
            $tablaTareas .= "<tr>";
            $nombreUsuario = usuario::consultarUsuario($row['id_usuario']);
            if ($nombreUsuario != null) {
                foreach ($nombreUsuario as $user) {
                    $tablaTareas .= "<td>" . $user['nombre'] . "</td>";
                }
            } else {
                $tablaTareas .= "<td>NaN</td>";
            }
            $tablaTareas .= "<td>" . $row['fecha_inicio'] . "</td>";
            $tablaTareas .= "<td>" . $row['fecha_final'] . "</td>";
            $tablaTareas .= "<td>" . $row['material'] . "</td>";
            $tablaTareas .= "<td>" . $row['comentario'] . "</td>";
            $tablaTareas .= "<td>" . $row['comentarioAdm'] . "</td>";
            $tablaTareas .= "<td>" . $row['aula'] . "</td>";
            $tablaTareas .= "<td class='bg-success estadoLista'>Finalizada</td>";
            $tablaTareas .= "</tr>";
        }
    } else {
        $tablaTareas = "<tr><td colspan=8><h4>Sin incidencias</h4></td></tr>";
    }
    require './head.php';
    require './resueltas.php';
}

/**
 * Controlador para agregar un nuevo usuario 
 * si existe "$_GET['new']" insertara el usuario en la
 * base de datos, si no existe solo muestra el formulario
 */
function nuevoUsuario()
{
    if (isset($_GET['new'])) {
        usuario::insertarUsuario($_POST['nombre'], $_POST['contra'], $_POST['email'], $_POST['tipo']);
    }
    require './head.php';
    require './nuevoUsuario.php';
}
