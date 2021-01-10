<?php defined('access') or exit('<h1>Error 404 page not found</h1>'); ?>
<script>
    $(document).ready(function() {
        $("#incidencias").DataTable();
    });
</script>

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
                            <a href="./resueltas" class="active"><i class="fas fa-folder-open"></i>Tareas resueltas</a>
                        </div>
                        <div id="item3" class="mb-3">
                            <a href="./newUser"><i class="fas fa-plus"></i>Crear usuario</a>
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
                                <h1>Tareas resueltas</h1>
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
                <div class="row h-75">
                    <div class="col mr-2 ml-2 mt-2 h-100" style="overflow-y:scroll">
                        <table id="incidencias" class="table table-striped table-bordered table-hover" style="width: 100%; height:100%;">
                            <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Fecha peticion</th>
                                    <th>Fecha final</th>
                                    <th>Material</th>
                                    <th>Comentario</th>
                                    <th>Comentario Administrador</th>
                                    <th>Aula</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php echo ($tablaTareas); ?>
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>