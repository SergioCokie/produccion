<div class="contenedor">
    <br><br>
    <?php if ($this->session->userdata("id_rol") == 4) { ?>
        <button type="button" class="btn btn-success botones" data-toggle="modal" data-target="#modalLRFormDemo">
            <img src="/Produccion/resources/img/Agregar.png"><span>&nbsp; Crear Reporte</span>
        </button>
    <?php } ?>

    <!--Modal: Crear Rerporte / Reporte Form Demo-->
    <div class="modal fade" id="modalLRFormDemo" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header justify-content-center">
                    <p class="heading lead">Crear Reporte De Maquina</p>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <div class="text-center">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt vero illo error eveniet
                            cum.
                        </p>
                        <select class="js-select-basic-singles input-tabla-reporte" id="seleccionar_maquina" name="">

                            <option value="">Maquinas</option>
                            <?php foreach ($maquinas as $key => $value) { ?>
                                <option value="<?= $value->codigo_maquina ?>-<?= $value->tipo ?>"><?= $value->nombre_maquina ?></option>

                            <?php } ?>

                        </select>
                    </div>
                </div>

                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <a type="button" class="btn btn-warning" id="crear_reporte_boton_modal">Crear Reporte <i class="fa fa-diamond ml-1"></i></a>
                    <a type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">No, Gracias</a>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!--Modal: Crear Rerporte / Reporte Form Demo/-->

    <section class="section my-5 pb-5">
        <div class="row">
            <div class="col-12 mt-3">
                <!-- Nav tabs -->
                <div class="tabs-wrapper">
                    <ul class="nav nav-tabs mt-2" id="maquinas">
                        <?php foreach ($maquinas as $key => $value) {
                            if ($key == 0) { ?>
                                <li class="nav-item">
                                    <a class="nav-link waves-light active waves-effect waves-light todas_las_maquinas" data-toggle="tab" id="<?= $value->codigo_maquina ?>" href="#<?= $value->tipo ?>" role="<?= $value->tipo ?>">
                                        <?= $value->nombre_maquina ?>
                                    </a>
                                </li>
                            <?php } else { ?>
                                <li class="nav-item">
                                    <a class="nav-link waves-light waves-effect waves-light todas_las_maquinas" data-toggle="tab" id="<?= $value->codigo_maquina ?>" href="#<?= $value->tipo ?>" role="<?= $value->tipo ?>">
                                        <?= $value->nombre_maquina ?>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
                <div class="tab-content">
                    <!--imprentas-->
                    <div class="tab-pane fade " id="imprentas" role="imprentas">
                        <!-- table imprentas-->
                        <div class="table-responsive">
                            <table id="tabla_imprentas" class="table table-striped hover display responsive nowrap text-center p-0 mt-2 tablas_sistema" style="width:100% ">
                                <thead>
                                    <tr>
                                        <th>Reporte ID</th>
                                        <th>Fecha</th>
                                        <th>Turno</th>
                                        <th>Operador</th>
                                        <th>Tiempo</th>
                                        <th>Tiro</th>
                                        <th>Retiro</th>
                                        <th>Total</th>
                                        <th>Estado</th>
                                        <th>
                                            <span id="mostrar_todo">
                                                <img src="<?php echo base_url("resources/generales/img/icons/actualizar.png"); ?>" alt="" height="25px">
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <thead id="thead_filtros" style="text-align: center;">
                                    <tr>
                                        <th><input type="text" class="tabla tabla_imprenta input_1" name="id_reporte" id="id_reporte_imprentas"></th>
                                        <th><input type="date" class="tabla tabla_imprenta input_2" name="fecha" id="fecha_imprentas"></th>
                                        <th>
                                            <select class="js-select-basic-single tabla_imprenta input_3" id="turno_imprentas" name="turno">
                                                <option value="">Turno&nbsp;&nbsp;</option>
                                                <option value="MAÑANA">Mañana</option>
                                                <option value="TARDE">Tarde&nbsp;</option>
                                                <option value="NOCHE">Noche</option>
                                            </select>
                                        </th>
                                        <th><input type="text" class="tabla tabla_imprenta input_4" name="nombre_operador_imprentas" id="nombre_operador"></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>
                                            <select class="js-select-basic-single tabla_imprenta input_5" id="estado_imprentas" name="estado">
                                                <option value="">Estado&nbsp;&nbsp;</option>
                                                <option value="Abierto">Abierto</option>
                                                <option value="Revisado">Revisado</option>
                                                <option value="Cerrado">Cerrado</option>
                                                <option value="Pendiente de revisión">Pendiente de revisión</option>
                                            </select>
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>

                            </table>
                        </div>
                        <!-- table imprentas-->
                    </div>
                    <!--/.imprentas-->

                    <!--Troqueladora-->
                    <div class="tab-pane fade" id="troqueladoras" role="troqueladoras">
                        <!-- table Troqueladora-->
                        <div class="table-responsive">

                            <table id="tabla_troqueladora" class="table table-striped display responsive nowrap text-center p-0 mt-2 tablas_sistema" style="width:100% ">
                                <thead>
                                    <tr>
                                        <th>Reporte ID</th>
                                        <th>Fecha</th>
                                        <th>Turno</th>
                                        <th>Operador</th>
                                        <th>Unidades Troqueladas</th>
                                        <th>Pliegos Troquelados</th>
                                        <th>Tiempo</th>
                                        <th>Estado</th>
                                        <th>
                                            <span id="mostrar_todo">
                                                <img src="<?php echo base_url("resources/generales/img/icons/actualizar.png"); ?>" alt="" height="25px">
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <thead id="thead_filtros" style="text-align: center;">
                                    <tr>
                                        <th><input type="text" class="tabla tabla_troqueladora input_troqueladora_1" name="id_reporte" id="id_reporte_troqueladora"></th>
                                        <th><input type="date" class="tabla tabla_troqueladora input_troqueladora_2" name="fecha" id="fecha_troqueladora"></th>
                                        <th>
                                            <select class="js-select-basic-single tabla tabla_troqueladora input_troqueladora_3" id="turno_troqueladora" name="turno">
                                                <option value="">Turno&nbsp;&nbsp;</option>
                                                <option value="MAÑANA">Mañana</option>
                                                <option value="TARDE">Tarde&nbsp;</option>
                                                <option value="NOCHE">Noche</option>
                                            </select>
                                        </th>
                                        <th><input type="text" class="tabla tabla_troqueladora input_troqueladora_4" name="nombre_operador" id="nombre_operador_troqueladora"></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>
                                            <select class="js-select-basic-single tabla tabla_troqueladora input_troqueladora_5" id="estado_troqueladora" name="estado">
                                                <option value="">Estado&nbsp;&nbsp;</option>
                                                <option value="Abierto">Abierto</option>
                                                <option value="Revisado">Revisado</option>
                                                <option value="Cerrado">Cerrado</option>
                                                <option value="Pendiente de revisión">Pendiente de revisión</option>
                                            </select>
                                        </th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>

                            </table>

                        </div>
                        <!-- table Troqueladora-->
                    </div>
                    <!--/.Troqueladora -->

                    <!--pegadoras-->
                    <div class="tab-pane fade" id="pegadoras" role="pegadoras">
                        <!-- table pegadoras-->
                        <table id="tabla_pegadoras" class="table table-striped display responsive nowrap text-center p-0 mt-2 tablas_sistema" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Reporte ID</th>
                                    <th>Fecha</th>
                                    <th>Turno</th>
                                    <th>Operador</th>
                                    <th>Unidades pegadas</th>
                                    <th>Tiempo</th>
                                    <th>Estado</th>
                                    <th>
                                        <span id="mostrar_todo">
                                            <img src="<?php echo base_url("resources/generales/img/icons/actualizar.png"); ?>" alt="" height="25px">
                                        </span>
                                    </th>
                                </tr>
                            </thead>
                            <thead id="thead_filtros" style="text-align: center;">
                                <tr>
                                    <th><input type="text" class="tabla tabla_pegadora input_pegadora_1" name="id_reporte_pegadora" id="id_reporte_pegadora"></th>
                                    <th><input type="date" class="tabla tabla_pegadora input_pegadora_2" name="fecha_pegadora" id="fecha_pegadora"></th>
                                    <th>
                                        <select class="js-select-basic-single tabla tabla_pegadora input_pegadora_3" id="turno_pegadora" name="turno_pegadora">
                                            <option value="">Turno&nbsp;&nbsp;</option>
                                            <option value="MAÑANA">Mañana</option>
                                            <option value="TARDE">Tarde&nbsp;</option>
                                            <option value="NOCHE">Noche</option>
                                        </select>
                                    </th>
                                    <th><input type="text" class="tabla tabla_pegadora input_pegadora_4" name="nombre_perador_pegadora" id="nombre_perador_pegadora"></th>
                                    <th></th>
                                    <th></th>
                                    <th>
                                        <select class="js-select-basic-single tabla tabla_pegadora input_pegadora_5" id="estado_pegadora" name="estado_pegadora">
                                            <option value="">Estado&nbsp;&nbsp;</option>
                                            <option value="Abierto">Abierto</option>
                                            <option value="Revisado">Revisado</option>
                                            <option value="Cerrado">Cerrado</option>
                                            <option value="Pendiente de revisión">Pendiente de revisión</option>
                                        </select>
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>

                        </table>
                        <!-- table pegadoras-->
                    </div>
                    <!--/.pegadoras-->

                    <!-- flexografia-->
                    <div class="tab-pane fade" id="flexografia" role="flexografia">
                        <!-- table flexografia-->
                        <div class="table-responsive">

                            <table id="tabla_flexografia" class="table table-striped display responsive nowrap text-center p-0 mt-2 tablas_sistema" style="width:100% ">
                                <thead>
                                    <tr>
                                        <th style="font-size: 10pt;">Reporte ID</th>
                                        <th style="font-size: 10pt;">Fecha</th>
                                        <th style="font-size: 10pt;">Turno</th>
                                        <th style="font-size: 10pt;">Operador</th>
                                        <th style="font-size: 10pt;">Tiempo</th>
                                        <th style="font-size: 8pt;">CANT. AJUSTE<br>(METROS)</th>
                                        <th style="font-size: 8pt;">CANT. PRODUCCION<br>(METROS)</th>
                                        <th style="font-size: 8pt;">CANT. SOLICITADA<br>(UNIDADES)</th>
                                        <th style="font-size: 8pt;">CANT. SOLICITADA<br>(UNIDADES)</th>
                                        <th style="font-size: 8pt;">Estado</th>
                                        <th>
                                            <span id="mostrar_todo">
                                                <img src="<?php echo base_url("resources/generales/img/icons/actualizar.png"); ?>" alt="" height="25px">
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <thead id="thead_filtros" style="text-align: center;">
                                    <tr>
                                        <th><input type="text" class="tabla tbl_flexo input_flexografia_1" name="id_reporte_flexografia" id="id_reporte_flexografia"></th>
                                        <th><input type="date" class="tabla tbl_flexo input_flexografia_2" name="fecha_flexografia" id="fecha_flexografia"></th>
                                        <th>
                                            <select class="js-select-basic-single tabla tbl_flexo input_flexografia_3" id="turno_flexografia" name="turno_flexografia">
                                                <option value="">Turno&nbsp;&nbsp;</option>
                                                <option value="MAÑANA">Mañana</option>
                                                <option value="TARDE">Tarde&nbsp;</option>
                                                <option value="NOCHE">Noche</option>
                                            </select>
                                        </th>
                                        <th><input type="text" class="tabla tbl_flexo input_flexografia_4" name="nombre_operador_flexografia" id="nombre_operador_flexografia"></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th>
                                            <select class="js-select-basic-single tbl_flexo tabla input_flexografia_5" id="estado_flexografia" name="estado_flexografia">
                                                <option value="">Estado&nbsp;&nbsp;</option>
                                                <option value="Abierto">Abierto</option>
                                                <option value="Revisado">Revisado</option>
                                                <option value="Cerrado">Cerrado</option>
                                                <option value="Pendiente de revisión">Pendiente de revisión</option>
                                            </select>
                                        </th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>

                            </table>

                        </div>
                        <!-- table flexografia-->
                    </div>
                    <!--/.flexografia-->
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $('.js-select-basic-singles').select2({
            width: 'resolve',
            dropdownAutoWidth: true,
            theme: "bootstrap4",
            dropdownCssClass: "myFont",
        });
    </script>

</div>
<link rel="stylesheet" href="<?php echo base_url("resources/app/Reportes/Consulta_general_de_reportes/css/index.css"); ?>">
<script type="text/javascript" src="<?php echo base_url("resources/app/Reportes/Consulta_general_de_reportes/js/show.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("resources/app/Reportes/Consulta_general_de_reportes/js/create.js"); ?>"></script>