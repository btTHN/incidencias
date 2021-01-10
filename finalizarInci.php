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
                                <h1>Tareas</h1>
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
                        <form action="./inicio?id=<?php echo($_GET['id'].'&action=final"'); ?> method="post">
                            <h4>Cerrar incidencia</h4>
                            <div class="form-group">
                                <label for="material">Material:</label>
                                <input type="text" class="form-control" id="material" name="material" readonly value=<?php echo ("'" . $datosInci['material'] . "'") ?>>
                            </div>
                            <div class="form-group">
                                <label for="aula">Aula:</label>
                                <input type="text" class="form-control" id="aula" name="aula" readonly value=<?php echo ("'" . $datosInci['aula'] . "'") ?>>
                            </div>
                            <div class="form-group">
                                <label for="comentario">Comentario del profesor:</label>
                                <input type="text" class="form-control" id="comentario" name="comentario" readonly value=<?php echo ("'" . $datosInci['comentario'] . "'") ?>>
                            </div>
                            <div class="form-group">
                                <label for="comentarioadm">Comentario sobre la averia:</label>
                                <textarea name="comentarioAdm" id="comentarioadm" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary btn-block" name="finalizar">Finalizar</button>
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