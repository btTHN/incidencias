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

            <div class="card-body">
                <h3 class="card-title">BIENVENIDO</h3>
                <svg class="card-img-top mb-3" width="8em" height="8em" viewBox="0 0 16 16" class="bi bi-person-badge-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z" />
                </svg>
                <hr>
                <form action="" method="post">
                    <div class="input-group mb-4">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Usuario">
                    </div>
                    <div class="input-group mb-4">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="input-group mb-4">
                        <button type="submit" class="btn btn-outline-primary btn-block">Enviar</button>
                </form>
            </div>
        </div>

    </div>
    </div>
</body>

</html>