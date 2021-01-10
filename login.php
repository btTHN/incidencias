<?php defined('access') or exit('<h1>Error 404 page not found</h1>'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <style>
        html {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #58b9ee;
            height: 100%;
        }



        .container {
            margin: auto;
            display: flex;
            height: auto;
            justify-content: center;
            align-items: center;
        }

        .card {
            width: 420px;
            border-radius: 30px;
        }

        .card-body {
            text-align: center;
        }
    </style>
</head>


<body>
    <div class="container h-100 w-50">
        <div class="card tarjetas ">
            <img class="card-img-top" src="../img/logo.png" height="250">
            <div class="card-body">
                <form action="./inicio" method="post">
                    <div class="input-group mb-4">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Usuario" name="user" required>
                    </div>
                    <div class="input-group mb-4">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="Password" name="pswd" required>
                    </div>
                    <?php
                    if (isset($_SESSION['error'])) {
                        echo ("<div class='alert alert-danger'>Usuario o contraseña incorrectos</div>");
                    }
                    ?>
                    <div class="input-group mb-4">
                        <button type="submit" class="btn btn-outline-primary btn-block" name="enviar">Enviar</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    </div>
</body>

</html>