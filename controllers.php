<?php
function index()
{
    require './login.php';
}
function validar_user()
{
    if (!isset($_SESSION['id_us'])) {
        if (isset($_POST['user']) && isset($_POST['pswd'])) {
            $datos = usuario::login_user($_POST['user'], $_POST['pswd']);
            if ($datos != null) {
                $_SESSION['id_us'] = $datos['id'];
                require './head.php';
                require './inicioProf.php';
            } else {
                $_SESSION['error'] = true;
                index();
            }
        } else {
            $_SESSION['error'] = true;
            index();
        }
    } else {
        require './head.php';
        require './inicioProf.php';
    }
}
function inicioProf()
{
    $datosInc = usuario::leerIncProf();
    $tablaProf = '<table <table id="example" class="table table-striped table-bordered table-hover" style="width: 100%">';
    $tablaProf .= '<thead><tr><th>Name</th><th>Position</th><th>Office</th><th>Age</th><th>Start date</th><th>Salary</th></tr></thead>';
    if ($datosInc != null) {
        foreach ($datosInc as $row) {
            echo ($row['comentario']);
        }
    }
}
