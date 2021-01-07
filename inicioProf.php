<?php defined('access') or exit('<h1>Error 404 page not found</h1>'); ?>

<body>
    <div class="container-fluid mx-0 px-0 my-0 py-0">
        <!-- Fila principal -->
        <div class="row w-100 flex-nowrap mx-0 px-0">
            <!-- Menu lateral -->
            <div class="col-3 mx-0 px-0" id="menu">
                <div class="menu-lateral">
                    <div class="title">
                        <img src="../img/logo.png" width="250" alt="logo">
                    </div>
                    <div id="items">
                        <div id="item1" class="mb-3">
                            <a href="./inicio" class="active"><i class="fas fa-home"></i>Inicio</a>
                        </div>
                        <div id="item2" class="mb-3">
                            <a href="./incidencias"><i class="fas fa-folder-open"></i>Mis incidencias</a>
                        </div>
                        <div id="item3" class="mb-3">
                            <a href="./nueva"><i class="fas fa-plus"></i>Crear incidencias</a>
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
                                <h1>Inicio</h1>
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
                <br>
                <!-- Tarjetas con el estado de las incidencias -->
                <div class="row ml-2">
                    <div class="col">
                        <div class="row flex-nowrap h-100" id="estados">
                            <div class="col-sm-6 col-lg-4">
                                <div class="card bg-success" style="max-width: 15rem;">
                                    <div class="card-header bg-behance content-center text-center">
                                        <h1>
                                            <?php
                                            echo "$resueltas";
                                            ?>
                                        </h1>
                                    </div>
                                    <div class="card-body row text-center">
                                        <div class="col">
                                            <h4>Resueltas</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card bg-info" style="max-width: 15rem;">
                                    <div class="card-header bg-dribbble content-center text-center">
                                        <h1>
                                            <?php
                                            echo "$proceso";
                                            ?>
                                        </h1>
                                    </div>
                                    <div class="card-body row text-center">
                                        <div class="col">
                                            <h4>Proceso</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="card bg-danger" style="max-width: 15rem;">
                                    <div class="card-header content-center text-center">
                                        <h1>
                                            <?php
                                            echo "$pendientes";
                                            ?>
                                        </h1>
                                    </div>
                                    <div class="card-body row text-center">
                                        <div class="col">
                                            <h4>Pendientes</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <hr>
                <!-- Tabla de incidencias recientes -->
                <div class="row w-100 flex-nowrap ml-2" id="recientes">
                    <div class="col">
                        <div>
                            <h3>Incidencias recientes</h3>
                            <table id="listaIni" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Fecha peticion</th>
                                        <th>Fecha final</th>
                                        <th>Material</th>
                                        <th>Comentario</th>
                                        <th>Comentario del tecnico</th>
                                        <th>Aula</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php echo $tablaInc ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>