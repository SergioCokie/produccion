<div class="contenedor">
    <section class="section my-5 pb-5">
        <form action="" id="buscar_reporte" method="POST">
            <div class="row justify-content-center">

                <!--Grid column-->
                <div class="col-md-2 mb-2 div-select-personalizado">
                    <label for="familia" style="font-size: 10pt;color: black">Tipo</label>
                    <select class="js-select-selec2 tabla input_8" id="tipo_maquina" name="tipo_maquina" data-validetta="required">
                        <!-- MAQUINA -->

                        
                        <?php if (($zona == "pegadoras" || $zona == "troqueladoras") && $this->session->userdata("id_rol") == "2") { ?>
                            <option value=""></option>
                            <option value="troqueladoras">Troqueladoras</option>
                            <option value="pegadoras">Pegadora</option>
                        <?php } else { ?>
                            <option value=""></option>
                            <option value="imprentas">Imprentas</option>
                            <option value="troqueladoras">Troqueladoras</option>
                            <option value="pegadoras">Pegadora</option>
                            <option value="flexografia">Flexografia</option>
                        <?php } ?>
                    </select>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-2 mb-2">
                    <label for="familia" style="font-size: 10pt;color: black">Fecha Inicial</label>
                    <input style="color: black;" placeholder="Desde" type="text" id="fecha_inicial" name="fecha_inicial" class="form-control datepicker">

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-2 mb-2">
                    <label for="familia" style="font-size: 10pt;color: black">Fecha Final</label>
                    <input style="color: black;" placeholder="Hasta" type="text" id="fecha_final" name="fecha_final" class="form-control datepicker" disabled>

                </div>
                <!--Grid column-->


                <!--Grid column-->
                <div class="col-md-2 mb-2 div-select-personalizado">

                    <label for="fecha-3" style="font-size: 10pt;color: black">Intervalo</label>
                    <select class="js-select-selec2 tabla" id="intervalos" name="intervalos" data-validetta="">
                        <option value=""></option>
                        <option value="hoy">Ahora</option>
                        <option value="semana">Esta Semana</option>
                        <option value="mes">Este Mes</option>
                        <!-- <option value="anio">Este Año</option> -->
                    </select>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-2 mb-2">
                    <div style="margin-top: 42px;">
                        <button type="submit" class="btn botones" style="background-color: green;" id="buscar">
                            <img src="/Produccion/resources/img/buscar.png" style="width: 30px;height:28px">
                            <span>Buscar</span>
                        </button>
                    </div>
                </div>
                <!--Grid column-->
            </div>
        </form>
        <div class="tab-content">
            <!--imprentas-->
            <div class="tab-pane fade " id="imprentas" role="imprentas">
                <!-- table imprentas-->
                <div class="table-responsive">
                    <table id="tabla_imprentas" class="table table-striped hover display responsive nowrap text-center p-0 mt-2 tablas_sistema" style="width:100% ">
                        <thead>
                            <tr>
                                <th style="font-size: 8pt;">ID</th>
                                <th style="font-size: 8pt;">Equipo</th>
                                <th style="font-size: 8pt;">Fecha</th>
                                <th style="font-size: 8pt;">Tipo de <br>recurso</th>
                                <th style="font-size: 8pt;">Cod <br>Operador</th>
                                <th style="font-size: 8pt;">Operador</th>
                                <th style="font-size: 8pt;">OT</th>
                                <th style="font-size: 8pt;">Descripcion</th>
                                <th style="font-size: 8pt;">Hora Inicio</th>
                                <th style="font-size: 8pt;">Hora Fin</th>
                                <th style="font-size: 8pt;">Cantidad<br> Producida</th>
                                <th style="font-size: 8pt;">T/R</th>
                                <th style="font-size: 8pt;">Código <br>Operacion</th>
                                <th style="font-size: 8pt;">Operacion</th>
                                <th style="font-size: 8pt;">N° reporte</th>
                                <th style="font-size: 8pt;">Acciones</th>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th></th>
                                <th>
                                    <select name="maquinas" id="maquinas" class="js-select-selec2">
                                        <option value=""></option>
                                        <?php foreach ($maquinas_impresora as $key => $value) { ?>
                                            <option value="<?= $value->codigo_maquina ?>"><?= $value->codigo_maquina ?></option>
                                        <?php } ?>

                                    </select>
                                </th>
                                <th></th>
                                <th>
                                    <select name="recurso" id="recurso" class="js-select-selec2">
                                        <option value=""></option>
                                        <option value="MO">MO</option>
                                        <option value="MQ">MQ</option>
                                    </select>
                                </th>
                                <th>
                                    <select name="codigo_operador" id="codigo_operador" class="js-select-selec2">
                                        <option value=""></option>
                                        <?php foreach ($auxiliares_imprentas as $key => $value) { ?>
                                            <option value="<?= $value->codigo_operador ?>"><?= $value->codigo_operador ?></option>
                                        <?php } ?>
                                    </select>
                                </th>
                                <th>
                                    <input type="text" name="operador" id="operador" class="tabla tabla_imprenta ">
                                </th>
                                <th><input type="text" name="OT" id="OT" class="tabla tabla_imprenta "></th>
                                <th><input type="text" class="tabla tabla_imprenta "></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>
                                    <select name="operaciones" id="operaciones" class="js-select-selec2">
                                        <option value=""></option>
                                        <?php foreach ($operaciones_impresoras as $key => $value) { ?>
                                            <option value="<?= $value->codigo_operaciones ?>"><?= $value->codigo_operaciones ?>-<?= $value->operacion ?></option>

                                        <?php } ?>
                                    </select>
                                </th>
                                <th style="width: 20px;"></th>
                                <th><input type="text" class="tabla tabla_imprenta"></th>
                                <th id="acciones"></th>
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
                                <th style="font-size: 8pt;">ID</th>
                                <th style="font-size: 8pt;">Nombre<br>de equipo</th>
                                <th style="font-size: 8pt;">Fecha</th>
                                <th style="font-size: 8pt;">Tipo<br>de recurso</th>
                                <th style="font-size: 8pt;">Cod<br>Operador</th>
                                <th style="font-size: 8pt;">Nombre<br>de Operador</th>
                                <th style="font-size: 8pt;">OT</th>
                                <th style="font-size: 8pt;">Descripcion<br>de Trabajo</th>
                                <th style="font-size: 8pt;">Hora<br>Inicio</th>
                                <th style="font-size: 8pt;">Hora<br>Fin</th>
                                <th style="font-size: 8pt;">Cantidad<br>Producida</th>
                                <th style="font-size: 8pt;">Código<br>Operacion</th>
                                <th style="font-size: 8pt;">Descripcion<br>Código</th>
                                <th style="font-size: 8pt;">N°<br>reporte</th>
                                <th id="acciones" style="font-size: 8pt;">Acciones</th>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th></th>
                                <th>
                                    <select name="" id="" class="js-select-selec2">
                                        <option value="" selected=""></option>
                                        <?php foreach ($maquinas_troqueladoras as $key => $value) { ?>
                                            <option value="<?= $value->codigo_maquina ?>"><?= $value->codigo_maquina ?></option>
                                        <?php } ?>
                                    </select>
                                </th>
                                <th></th>
                                <th>


                                    <select name="" id="" class="js-select-selec2">
                                        <option value="" selected=""></option>
                                        <option value="MO">MO</option>
                                        <option value="MQ">MQ</option>
                                    </select>
                                </th>
                                <th>
                                    <select name="" id="" class="js-select-selec2">
                                        <?php foreach ($auxiliares_troqueladoras as $key => $value) { ?>
                                            <option value="<?= $value->codigo_operador ?>"><?= $value->codigo_operador ?></option>
                                        <?php } ?>
                                    </select>
                                </th>
                                <th>
                                    <input type="text" name="" id="" class="tabla tabla_imprenta ">
                                </th>
                                <th>
                                    <input type="text" name="" id="" class="tabla tabla_imprenta ">
                                </th>
                                <th>
                                    <input type="text" name="" id="" class="tabla tabla_imprenta ">
                                </th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>
                                    <select name="" id="" class="js-select-selec2">
                                        <option value="" selected=""></option>
                                        <?php foreach ($operaciones_troqueladoras as $key => $value) { ?>
                                            <option value="<?= $value->codigo_operaciones ?>"><?= $value->codigo_operaciones ?>-<?= $value->operacion ?></option>
                                        <?php } ?>
                                    </select>
                                </th>
                                <th>
                                    <input type="text" name="" id="" class="tabla tabla_imprenta ">
                                </th>
                                <th></th>
                                <th id="acciones"></th>
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
                <div class="table-responsive-flex">
                    <table id="tabla_pegadoras" class="table table-striped display responsive nowrap text-center p-0 mt-2 tablas_sistema" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 22.7875px; font-size: 8pt;">ID</th>
                                <th style="width: 93.325px;font-size: 8pt;">Nombre<br>de equipo</th>
                                <th style="width: 43.7125px;font-size: 8pt;">Fecha</th>
                                <th style="width: 81.6375px;font-size: 8pt;">Tipo<br>de recurso</th>
                                <th style="width: 80.7625px;font-size: 8pt;">Cod<br>Operador</th>
                                <th style="width: 99.75px;font-size: 8pt;">Nombre<br>de Operador</th>
                                <th style="width: 80px;font-size: 8pt;">OT</th>
                                <th style="width: 245.875px;font-size: 8pt;">Descripcion<br>de Trabajo</th>
                                <th style="width: 55.4125px;font-size: 8pt;">Hora Inicio</th>
                                <th style="width: 54.2875px;font-size: 8pt;">Hora Fin</th>
                                <th style="width: 68.5625px;font-size: 8pt;">Cantidad<br>Producida</th>
                                <th style="width: 83.875px;font-size: 8pt;">Código<br>Operacion</th>
                                <th style="width: 84.85px;font-size: 8pt;">Descripcion<br>Código</th>
                                <th style="width: 143.163px;font-size: 8pt;">N°<br>reporte</th>
                                <th id="acciones" style="width: 54.4px;font-size: 8pt;">Acciones</th>
                            </tr>
                        </thead>
                        <thead id="thead_filtros" style="text-align: center;">
                            <tr>
                                <th></th>
                                <th>
                                    <select name="" id="" class="js-select-selec2">
                                        <option value="" selected=""></option>
                                        <?php foreach ($operaciones_pegadoras as $key => $value) { ?>
                                            <option value="<?= $value->codigo_maquina ?>"><?= $value->codigo_maquina ?></option>
                                        <?php } ?>
                                    </select>


                                </th>
                                <th></th>
                                <th>


                                    <select name="" id="" class="js-select-selec2">
                                        <option value="" selected=""></option>
                                        <option value="MO">MO</option>
                                        <option value="MQ">MQ</option>
                                    </select>
                                </th>
                                <th>
                                    <select name="" id="" class="js-select-selec2">
                                        <option value="" selected=""></option>
                                        <?php foreach ($auxiliares_pegadoras as $key => $value) { ?>
                                            <option value="<?= $value->codigo_operador ?>"><?= $value->codigo_operador ?></option>
                                        <?php } ?>
                                    </select>
                                </th>
                                <th>
                                    <input type="text" name="" id="" class="tabla tabla_imprenta ">
                                </th>
                                <th>
                                    <input type="text" name="" id="" class="tabla tabla_imprenta ">
                                </th>
                                <th>
                                    <input type="text" name="" id="" class="tabla tabla_imprenta ">
                                </th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>
                                    <select name="" id="" class="js-select-selec2">
                                        <?php foreach ($operaciones_pegadoras as $key => $value) { ?>
                                            <option value="<?= $value->codigo_operaciones ?>"><?= $value->codigo_operaciones ?>-<?= $value->operacion ?></option>
                                        <?php } ?>

                                    </select>
                                </th>
                                <th>
                                    <input type="text" name="" id="" class="tabla tabla_imprenta ">
                                </th>
                                <th></th>
                                <th id="acciones"></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>
                </div>

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
                                <th style="width: 19.575px; font-size:7pt;">ID</th>
                                <th style="width: 81.2px;font-size:7pt">Nombre<br>de equipo</th>
                                <th style="width: 40.7625px;font-size:7pt">Fecha</th>
                                <th style="width: 80.4625px;font-size:7pt">Tipoe<br>de recurso</th>
                                <th style="width: 80.2125px;font-size:7pt">Code<br>Operador</th>
                                <th style="width: 83.1625px;font-size:7pt">Nombre<br>de Operador</th>
                                <th style="width: 80px;font-size:7pt">OT</th>
                                <th style="width: 116.6px;font-size:7pt">Descripcione<br>de Trabajo</th>
                                <th style="width: 54.6px;font-size:7pt">Hora<br>Inicio</th>
                                <th style="width: 54.25px;font-size:7pt">Horae<br>Fin</th>
                                <th style="width: 69.175px;font-size:7pt">Cantida<br>Produccion</th>
                                <th style="width: 57.6875px;font-size:7pt">Cantida<br>Ajuste</th>
                                <th style="width: 61.1375px;font-size:7pt">Cantida<br>Solicitada</th>
                                <th style="width: 62.9375px;font-size:7pt">Cantida<br>Producida</th>
                                <th style="width: 81.1125px;font-size:7pt">Codigo<br>Operacion</th>
                                <th style="width: 82.05px;font-size:7pt">Descripcion<br>Código</th>
                                <th style="width: 97.3875px;font-size:7pt">N°e<br>reporte</th>
                                <th style="width: 97.3875px;font-size:7pt">Accion</th>
                            </tr>
                        </thead>
                        <thead id="thead_filtros" style="text-align: center;">
                            <tr>
                                <th></th>
                                <th>
                                    <select name="" id="" class="js-select-selec2">
                                        <option value="" selected=""></option>
                                        <?php foreach ($maquinas_flexografia as $key => $value) { ?>
                                            <option value="<?= $value->codigo_maquina ?>"><?= $value->codigo_maquina ?></option>
                                        <?php } ?>

                                    </select>

                                </th>
                                <th></th>
                                <th>
                                    <select name="" id="" class="js-select-selec2">
                                        <option value="" selected=""></option>
                                        <option value="MO">MO</option>
                                        <option value="MQ">MQ</option>
                                    </select>
                                </th>
                                <th>
                                    <select name="" id="" class="js-select-selec2">
                                        <option value="" selected=""></option>
                                        <?php foreach ($auxiliares_flexografia as $key => $value) { ?>
                                            <option value="<?= $value->codigo_operador ?>"><?= $value->codigo_operador ?></option>
                                        <?php } ?>
                                    </select>
                                </th>
                                <th>
                                    <input type="text" name="" id="" class="tabla tabla_imprenta ">
                                </th>
                                <th>
                                    <input type="text" name="" id="" class="tabla tabla_imprenta ">
                                </th>
                                <th>
                                    <input type="text" name="" id="" class="tabla tabla_imprenta ">
                                </th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>
                                    <select name="" id="" class="js-select-selec2">
                                        <option value="" selected=""></option>
                                        <?php foreach ($operaciones_flexografia as $key => $value) { ?>
                                            <option value="<?= $value->codigo_operaciones ?>"><?= $value->codigo_operaciones ?>-<?= $value->operacion ?></option>
                                        <?php } ?>
                                    </select>
                                </th>
                                <th>
                                    <input type="text" name="" id="" class="tabla tabla_imprenta ">
                                </th>
                                <th></th>
                                <th id="acciones"></th>
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
    </section>

</div>

<link href="<?php echo base_url("resources/app/Reportes/Detalle_reporte/css/index_detalle_reporte.css"); ?>" rel="stylesheet" media="screen" />

<script>
    $('.js-select-selec2').select2({
        width: 'resolve',
        dropdownAutoWidth: true,
        theme: "bootstrap4",
        dropdownCssClass: "myFont",
    });



    $('.datepicker').pickadate({
        monthsFull: ['Enero', 'Febrero', 'Marzo', 'April', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
        weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
        format: 'dddd, dd mmm, yyyy',
        formatSubmit: 'yyyy/mm/dd',
        hiddenName: true,
        today: 'Ahora',
        clear: 'Limpiar',
        close: 'Cerrar',
        closeOnSelect: false,
    });
</script>
<script type="text/javascript" src="<?php echo base_url("resources/app/Reportes/Detalle_reporte/js/show.js"); ?>"></script>