<?php defined('access') or exit('<h1>Error 404 page not found</h1>'); ?>

<body>
    <div class="container-fluid mx-0 px-0 my-0 py-0 h-100">
        <!-- Fila principal -->
        <div class="row w-100 flex-nowrap mx-0 px-0 h-100">
            <!-- Menu lateral -->
            <div class="col-3 mx-0 px-0" id="menu">
                <div class="menu-lateral">
                    <div class="title">
                        <img src="../img/logo.png" width="250" alt="logo">
                    </div>
                    <div id="items">
                        <div id="item1" class="mb-3">
                            <a href="./inicio"><i class="fas fa-home"></i>Tareas pendientes</a>
                        </div>
                        <div id="item2" class="mb-3">
                            <a href="./resueltas"><i class="fas fa-folder-open"></i>Tareas resueltas</a>
                        </div>
                        <div id="item3" class="mb-3">
                            <a href="./newUser" class="active"><i class="fas fa-plus"></i>Crear usuario</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mx-0 px-0">
                <!-- Barra superior con el titulo de la seccion -->
                <div class="row">
                    <div class="col">
                        <div id="barra-superior">
                            <div class="btitle w-50">
                                <h1>Crear usuario</h1>
                            </div>
                            <div class="icons w-50">
                                <div class="btn-toolbar" role="toolbar">
                                    <div class="btn-group">
                                        <a href=""><span><i class="fas fa-cog"></i></span></a>
                                        <a href="./salir"><i class="fas fa-sign-out-alt"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row w-100 h-75 justify-content-center align-content-center">
                    <div class="col-sm-5">
                        <form action="./newUser?new=yes" method="post">
                            <h4>Nuevo usuario</h4>
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="form-group">
                                <label for="contra">Contraseña:</label>
                                <input type="password" id="contra" name="contra" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="tipo">Tipo de usuario:</label>
                                <select name="tipo" id="tipo" class="form-control">
                                    <option value="ROLE_USER">Usuario</option>
                                    <option value="ROLE_ADMIN">Administrador</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary btn-block" name="enviar">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>