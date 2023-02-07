<div class="contenedor">
    <style>
        .modal-dialog.modal-notify.modal-success .badge,
        .modal-dialog.modal-notify.modal-success .modal-header {
            background-color: #a11c27;
        }
    </style>

    <section class="section my-5 pb-5">
        <div class="row gx-5">
            <div class="col-sm-12 col-lg-4">
                <table id="resumen" class="table table-bordered text-center p-0 mt-2">
                    <tbody>
                        <tr>
                            <td>FICHA FICHA IMPRESORAS<br /><?php echo $resumen[0]->CONTAR_IMPRESORAS  ?></td>
                            <td>FICHA PEGADORAS<br /><?php echo $resumen[0]->CONTAR_PEGADORAS  ?></td>
                            <td>FICHA TROQUELADORAS<br /><?php echo $resumen[0]->CONTAR_TROQUELADORAS  ?></td>
                        </tr>
                        <tr>
                            <td>TOTAL <?php echo $resumen[0]->TOTAL  ?></td>
                            <td colspan="2">FECHA MAS RECIENTE <?php echo $resumen[0]->FECHA_MAYOR  ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-12 col-lg-4">
                <center>

                    <button class="btn crear mt-2 mb-2 botones" data-toggle="modal" data-target="#sideModalTRSuccessDemo" id="crear_ficha_modal" data-backdrop="false">
                        <img src="<?php echo base_url("resources/generales/img/icons/Reportes.png"); ?>"><span class="span_boton">Crear Ficha</span>
                    </button>

                </center>
            </div>
        </div>

        <div class="row">
            <!-- table -->
            <div class="table-responsive">

                <table id="tabla_ficha_tecnica" class="table table-striped display responsive nowrap text-center p-0 mt-2 tablas_sistema" style="width:100% ">
                    <thead>
                        <tr>
                            <th>OT</th>
                            <th>Maquina</th>
                            <th>Fecha de documento</th>
                            <th>Cliente</th>
                            <th>Producto</th>
                            <th>Cod. Producto </th>
                            <th>Tipo de Producto </th>
                            <th>Elaborado por </th>
                            <th>Tipo ficha </th>
                            <th>Version </th>
                            <th>
                                <span id="mostrar_todo">
                                    <img src="<?php echo base_url("resources/generales/img/icons/actualizar.png"); ?>" alt="" height="25px">
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <thead id="thead_filtros" style="text-align: center;">
                        <tr>
                            <th><input type="text" class="tabla input_1" name="ot" id="ot"></th>
                            <th><input type="text" class="tabla input_2" name="maquina" id="maquina"></th>
                            <th><input type="date" class="tabla input_3" name="fecha_creacion" id="fecha_creacion"></th>
                            <th><input type="text" class="tabla input_4" name="cliente" id="cliente"></th>
                            <th><input type="text" class="tabla input_5" name="producto" id="producto"></th>
                            <th><input type="text" class="tabla input_6" name="cod_producto" id="cod_producto"></th>
                            <th><input type="text" class="tabla input_7" name="tipo_producto" id="tipo_producto"></th>
                            <th><input type="text" class="tabla input_8" name="encargados_nombre" id="encargados_nombre"></th>
                            <th><select class="js-select-basic-single tabla input_9" id="tipo_ficha" name="state">
                                    <option value="">Tipo de Fichas</option>
                                    <option value="ficha impresora"> Impresora</option>
                                    <option value="ficha pegadora"> Pegadora</option>
                                    <option value="ficha troqueladora"> Troqueladora</option>

                                </select></th>
                            <th><input type="text" class="tabla input_10" name="version" id="version"></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>

                </table>

            </div>
            <!-- table -->
        </div>

    </section>

    <!-- Side Modal Top Right Success-->
    <div class="modal fade right" id="sideModalTRSuccessDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-side modal-top-right modal-notify modal-success" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <p class="heading lead">Crear Ficha Tecnica</p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>

                        <div class="row">
                            <!--Grid column-->
                            <div class="col-12">
                                <div class="list-group z-depth-1">
                                    <a href="#" class="list-group-item list-group-item-action" id="impresoras"> Ficha Impresora</a>
                                    <a href="#" class="list-group-item list-group-item-action" id="pegadoras">Ficha Pegadora</a>
                                    <a href="#" class="list-group-item list-group-item-action" id="troqueladoras">Ficha Troqueladora</a>
                                </div>
                            </div>
                            <!--Grid column-->

                        </div>
                    </div>
                </div>

                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <button type="button" id="crear_ficha" class="btn botones" style="border: black solid 1px; color: #3c5180;" disabled>Crear Ficha <i class="fa fa-diamond ml-1"></i></button>
                    <a type="button" class="btn btn-outline-danger waves-effect botones" data-dismiss="modal">No, Gracias</a>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- Side Modal Top Right Success-->



</div>
<link rel="stylesheet" href="<?php echo base_url("resources/app/Calidad/ficha_tecnica/css/style.css"); ?>">
<script type="text/javascript" src="<?php echo base_url("resources/app/Calidad/ficha_tecnica/js/show.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("resources/app/Calidad/ficha_tecnica/js/create.js"); ?>"></script>