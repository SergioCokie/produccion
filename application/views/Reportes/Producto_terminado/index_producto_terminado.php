<div class="contenedor">
    <section class="section my-5 pb-5">
        <div class="row">
            <div class="col-sm-12 col-lg-9"></div>
            <div class="col-sm-12 col-lg-3">
                <?php if ($this->session->userdata("id_rol") == 8 || $this->session->userdata("id_rol") == 1 || $this->session->userdata("username") == "op_amanda") { ?>
                    <button type="button" id="crear_nuevo_documento" style="right: 0;float:right;" class="btn btn-xs crear mx-auto botones crear_documento" data-toggle="modal" data-target="#modal_producto_terminado">
                        <img src="<?php echo base_url() ?>resources/generales/img/icons/Maquina.png" alt="crear">
                        <span>Crear documento</span>
                    </button>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <!-- table -->
            <div class="table-responsive">

                <table id="tabla_producto_terminado" class="table table-striped display responsive nowrap text-center p-0 mt-2 tablas_sistema" style="width:100%; border-collapse: collapse">
                    <thead>
                        <tr>
                            <th style="font-size: 8pt; width:10px;">ID</th>
                            <th style="font-size: 8pt; width:10px;">ID<br>Trello</th>
                            <th style="font-size: 8pt;">N° de<br>Ingreso</th>
                            <th style="font-size: 8pt;">Cantidad</th>
                            <th style="font-size: 8pt;">Descripción Trello</th>
                            <th style="font-size: 8pt;">Cod.<br>Producto </th>
                            <th style="font-size: 8pt;">Producto </th>
                            <th style="font-size: 8pt;">Maquina </th>
                            <th style="font-size: 8pt;">Area que<br>Entrega</th>
                            <th style="font-size: 8pt;">Area que<br>Recibe </th>
                            <th style="font-size: 8pt;">Creado Por</th>
                            <th style="font-size: 8pt;">Estado</th>
                            <th style="font-size: 8pt;width:10px;">Fecha</th>
                            <th style="font-size: 8pt; width:10px;">
                                <span id="mostrar_todo" style="padding: 0;">
                                    <img src="<?php echo base_url("resources/generales/img/icons/actualizar.png"); ?>" alt="" height="20px">
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <thead id="thead_filtros" style="text-align: center;">
                        <tr>
                            <th><input style="width: 60px;" type="text" class="tabla input_1" name="id" id="id"></th><!-- ID -->
                            <th><input style="width: 60px;" type="text" class="tabla input_2" name="id_trello" id="id_trello"></th><!-- ID TRELLO -->
                            <th><input style="width: 60px;" type="text" class="tabla input_3" name="numero_ingreso" id=""></th><!-- N INGRESO -->
                            <th><input style="width: 60px;" type="text" class="tabla input_4" name="cantidad" id="cantidad"></th><!-- CANTIDAD -->
                            <th><input style="width: 125px;" type="text" class="tabla input_5" name="descripcion_trello" id="descripcion_trello"></th><!-- DESCRIPCION -->
                            <th><input style="width: 70px;" type="text" class="tabla input_6" name="codigo_producto" id="codigo_producto"></th><!-- COD PRODUCTO -->
                            <th><input style="width: 90px;" type="text" class="tabla input_7" name="producto" id="producto"></th><!-- PRODUCTO -->
                            <th>
                                <select class="js-select-basic-single-pt tabla input_8" id="maquina" name="maquina" style="font-size: 8pt;width: 100%">
                                    <!-- MAQUINA -->
                                    <option value="">Maquina</option>
                                    <?php foreach ($maquinas as $key => $value) { ?>
                                        <option value="<?= $value->codigo_maquina ?>"> <?= $value->codigo_maquina ?></option>
                                    <?php } ?>

                                </select>
                            </th>
                            <th>
                                <select class="js-select-basic-single-pt tabla input_9" id="area_entrega_t" name="area_entrega" style="font-size: 8pt;">
                                    <!-- AREA QUE ENTREGA -->
                                    <option value="">Entrega</option>
                                    <?php foreach ($areas as $key => $value) { ?>
                                        <option value="<?= $value->nombre ?>"> <?= $value->nombre ?></option>
                                    <?php } ?>
                                </select>
                            </th>
                            <th>
                                <select class="js-select-basic-single-pt tabla input_10" id="area_recibe_t" name="area_recibe">
                                    <!-- AREA QUE RECIBE -->
                                    <option value="">Recibe</option>
                                    <option value="Logística">Logística</option>
                                    <option value="Bodega">Bodega</option>
                                </select>
                            </th>
                            <th><input style="width: 80px;" type="text" class="tabla input_11" name="nombre_produccion" id=""></th><!-- CREADO POR -->
                            <th>
                                <select class="js-select-basic-single-pt tabla input_12" id="" name="estado">
                                    <!-- ESTADO -->
                                    <option value="">Estado</option>
                                    <option value="Abierto">Abierto</option>
                                    <option value="Transferido">Transferido</option>
                                    <option value="Aprobado">Aprobado</option>
                                    <option value="Rechazado">Rechazado</option>
                                </select>
                            </th>
                            <th><input type="date" style="width: 100px; font-size: 8pt;" class="tabla input_13" name="fecha_entrega" id="fecha_entrega"></th><!-- FECHA -->
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>

            </div>
            <!-- table -->
        </div>

        <!-- Central Modal Large Info-->
        <div class="modal fade" id="modal_producto_terminado" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-notify" role="document">
                <!--Content-->
                <div class="modal-content">
                    <!--Header-->
                    <div class="modal-header">
                        <div style="right: 0;float:right;text-align: center;width: 100%;">
                            <a id="btndescargar" class="btn botones" href="">
                                <img src="/Produccion/resources/img/descarga.png" alt="">
                                <span>DESCARGAR</span>
                            </a>

                            <?php if ($this->session->userdata("id_rol") == 3 || $this->session->userdata("id_rol") == 1 || $this->session->userdata("id_rol") == 5 || $this->session->userdata("id_rol") == 8) { ?>
                                <button id="btnTransferir" name="" class="btn align-middle cerrar_ficha botones acutalizar_estado">
                                    <img src="/Produccion/resources/img/enviar.png" alt="">
                                    <span>TRANSFERIR</span>
                                </button>
                            <?php } ?>

                            <?php if ($this->session->userdata("id_rol") == 9 || $this->session->userdata("id_rol") == 10 || $this->session->userdata("id_rol") == 1) { ?>
                                <button id="btnAprobar" name="" class="btn align-middle cerrar_ficha botones acutalizar_estado">
                                    <img src="/Produccion/resources/img/enviar.png" alt="">
                                    <span>APROBAR</span>
                                </button>
                                <button id="btnRechazar" name="" class="btn align-middle botones acutalizar_estado">
                                    <img src="/Produccion/resources/img/enviar.png" alt="">
                                    <span>RECHAZAR</span>
                                </button>
                            <?php } ?>

                        </div>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="black-text">&times;</span>
                        </button>

                    </div>
                    <!--Body-->
                    <div class="modal-body" id="global">
                        <div class="text-center ficha-impresora">
                            <?php if ($this->session->userdata("username") == "admin_sergio") { ?>
                                <div class=" row justify-content-center" style="font-size: 10px;--bs-gutter-x: 0rem; padding-bottom: 1.3em;">
                                    <span style="font-size: 9pt; color: black;">Estado</span>
                                    <select class="js-select-basic-single-pt select_estado_documento" id="" name="">
                                        <option value="Abierto">Abierto</option>
                                        <option value="Transferido">Transferido</option>
                                        <option value="Aprobado">Aprobado</option>
                                        <option value="Rechazado">Rechazado</option>
                                    </select>
                                </div>
                            <?php } ?>

                            <div class="container crear-producto-terminado" id="crear-producto-terminado">
                                <div class="row">

                                    <div class="col-md-2" id="">
                                        <div class="row" style="float: right;">
                                            <div class="switch">
                                                Para Imprimir
                                                <label>
                                                    OFF
                                                    <input id="to_print" name="" value="0" type="checkbox">
                                                    <span class="lever"></span>
                                                    ON
                                                </label>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="titulo mx-auto text-center">
                                            <h4>Entrega de Producto Terminado</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-2" id="datos_extras">
                                        <div class="row" style="float: right;">
                                            <span id="codigo_doc" style="padding-left: 55px;">0000</span>
                                            <div class="col-md-12">
                                                <div class="input-group pull-left">
                                                    <span style="float: right;font-size: 12px;margin-top: 5px;">N° de ingreso:</span>
                                                    <input type="text" style="background-color: transparent;border:none;width:50px;float:right;border-bottom:2px solid black;font-size: 12px;" name="numero_ingreso" id="numero_ingreso" value="">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-md-12">
                                                <div class="input-group pull-left">
                                                    <span id="hora_ficha" style="float: right;font-size: 12px;margin-top: 5px;padding-left: 55px;"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="encabezado">
                                    <div class="row mx-auto">
                                        <div class="col-6">
                                            <label for="fecha_entrega">Fecha de Entrega:</label>
                                            <input type="date" name="fecha_entrega" id="fecha_entrega" class="pintado" value="<?php echo date("Y-m-d") ?>">
                                        </div>
                                        <div class="col-6">
                                            <label for="fecha_sistema">Fecha Ingreso a Sistema:</label>
                                            <input type="date" name="fecha_sistema" id="fecha_sistema" value="<?php echo date("Y-m-d") ?>" disabled>
                                        </div>
                                       
                                    </div>
                                    <div class="row mx-auto">
                                        <div class="col-6" id="contedor-cliente">
                                            <label for="cliente">Cliente:</label>
                                            <input readonly type="text" name="cliente" id="cliente">
                                        </div>
                                        <div class="col-2" id="contedor-op">
                                            <label for="op">OP:</label>
                                            <input type="text" name="ot" id="ot" readonly>
                                        </div>

                                        <div class="col-2" id="contedor-op">
                                            <label for="op">OC:</label>
                                            <input type="text" class="pintado numeros" value="" name="" id="orden_compra">
                                        </div>
                                    </div>
                                </div>
                                <div id="contenedor_tabla_principal">

                                </div>
                                <center>
                                    <div class="mt-2 bajo">
                                        <label for="numero_corrugados">Número de corrugados totales:</label>
                                        <input type="text" id="numero_corrugados" name="" class="pintado numeros">

                                        <label for="numero_tarimas">Número de tarimas:</label>
                                        <input type="text" id="numero_tarimas" name="" class="pintado numeros">
                                    </div>
                                </center>

                                <div class="row footer mt-4">
                                    <div class="col-4 text-center">
                                        <input type="text" name="nombre_produccion" id="nombre_produccion" value="" class="text-center" disabled><br>
                                        <label for="">Producción</label>
                                    </div>
                                    <div class="col-4 text-center">
                                        <input type="text" id="nombre_area_recibe" disabled name="nombre_area_recibe"><br>
                                        <label id="area_recibe"></label>
                                    </div>
                                    <div class="col-4 text-center">

                                        <input class="form-check-input" type="radio" name="selector" id="parcial" role="" value="parcial">
                                        <label class="form-check-label" for="parcial">Parcial</label>
                                        &nbsp;&nbsp;&nbsp;&nbsp
                                        <input class="form-check-input" type="radio" name="selector" id="completo" role="" value="completo">
                                        <label class="form-check-label" for="completo">Completo</label>

                                    </div>
                                    <div class="col-4"></div>
                                    <div class="col-4"></div>
                                </div>


                            </div>
                        </div>

                    </div>

                    <!--Footer-->
                    <!-- <div class="modal-footer">
                        <a type="button" class="btn btn-info">Get it now <i class="fa fa-diamond ml-1"></i></a>
                        <a type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">No, thanks</a>
                    </div> -->
                </div>
                <!--/.Content-->
            </div>
        </div>
        <!-- Central Modal Large Info-->



    </section>
</div>
<style>
    .myFont {
        font-size: 8pt;
    }
</style>
<script>
    $('.js-select-basic-single-pt').select2({
        width: 'resolve',
        dropdownAutoWidth: true,
        theme: "bootstrap4",
        dropdownCssClass: "myFont",
    });
</script>
<link rel="stylesheet" href="<?php echo base_url("resources/app/Reportes/Producto_terminado/css/index.css"); ?>">
<script type="text/javascript" src="<?php echo base_url("resources/app/Reportes/Producto_terminado/js/show.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("resources/app/Reportes/Producto_terminado/js/update.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("resources/app/Reportes/Producto_terminado/js/create.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("resources/app/Reportes/Producto_terminado/js/trello.js"); ?>"></script>