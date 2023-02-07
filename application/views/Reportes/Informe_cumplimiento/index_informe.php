<div class="contenedor">
    <section class="section my-5 pb-5">
        <form action="" id="buscar_informe_cumplimiento" method="POST">
            <div class="row justify-content-center">


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
            <div class="tab-pane fade in" id="contenedor_tabla_cumpli_cant" role="contenedor_tabla_cumpli_cant">
                <!-- table imprentas-->
                <div class="table-responsive">
                    <table id="tabla_cumplimiento_cantidades" class="table table-striped hover display responsive nowrap text-center p-0 mt-2 tablas_sistema" style="width:100% ">
                        <thead>
                            <tr>
                                <th style="width: 20px; font-size:8pt;"><img src="/Produccion/resources/img/actualizar.png" style="width: 20px;margin-top: -22px;"></th>
                                <th style="width: 140px;font-size:8pt;">FECHA</th>
                                <th style="width: 65.2727px;font-size:8pt;">TURNO</th>
                                <th style="width: 102.364px; font-size:8pt;">MAQUINA</th>
                                <th style="width: 92.1818px; font-size:8pt;">FAMILIA</th>
                                <th style="width: 41.4432px; font-size:8pt;">ID TRELLO</th>
                                <th style="width: 59.8977px; font-size:8pt;">OT</th>
                                <th style="width: 182.602px; font-size:8pt;">DESCRIPCION</th>
                                <th style="width: 59.2727px; font-size:8pt;">CANTIDAD<br>PRODUCIDA</th>
                                <th style="width: 52.0682px; font-size:8pt;">CANTIDAD<br>ESPERADA</th>
                                <th style="width: 71.2045px; font-size:8pt;">(-)FALTANTE<br>(+)SOBRANTE</th>
                                <th style="width: 71.8409px; font-size:8pt;">%<br>CUMPLIMIENTO</th>
                                <th style="width: 50.3636px; font-size:8pt;">CANTIDAD<br>PNC</th>
                                <th style="width: 118.534px; font-size:8pt;"></th>
                                <th style="width: 62.0455px; font-size:8pt;">APROBADAS</th>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th></th>
                                <th><input type="date" style="width: 110px; font-size:8pt;" class="form-control"></th>
                                <th>
                                    <select name="" id="" class="js-select-selec2">
                                        <option value=""></option>
                                        <option value="MAÑANA">MAÑANA</option>
                                        <option value="TARDE">TARDE</option>
                                        <option value="NOCHE">NOCHE</option>
                                    </select>
                                </th>
                                <th>
                                    <select name="" id="" class="js-select-selec2">
                                        <option value=""></option>
                                        <option value="XL105">XL105</option>
                                        <option value="SORM">SORM</option>
                                        <option value="SM74">SM74</option>
                                        <option value="SM52">SM52</option>
                                        <option value="SM102">SM102</option>
                                        <option value="TRO_DGM">TRO_DGM</option>
                                        <option value="TRO_BOBST">TRO_BOBST</option>
                                        <option value="TC2">TC2</option>
                                        <option value="TC1">TC1</option>
                                        <option value="PEG_QUN_YING">PEG_QUN_YING</option>
                                        <option value="PEG_DGM">PEG_DGM</option>
                                        <option value="PEG_BOBST">PEG_BOBST</option>
                                        <option value="PEGADORA_800">PEGADORA_800</option>
                                        <option value="MINERVA_M3">MINERVA_M3</option>
                                        <option value="MINERVA_M2">MINERVA_M2</option>
                                        <option value="MINERVA_M1">MINERVA_M1</option>
                                        <option value="GALLUS">GALLUS</option>;
                                    </select>
                                </th>

                                <th>
                                    <select name="" id="" class="js-select-selec2">
                                        <option value=""></option>
                                        <option value="flexografia">flexografia</option>
                                        <option value="troqueladoras">troqueladoras</option>
                                        <option value="pegadoras">pegadoras</option>
                                        <option value="imprentas">imprentas</option>
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
                                        <option value=""></option>
                                        <option value="rgb(255, 255, 255)" style="background-color: rgbrgb(255, 255, 255);"></option>
                                        <option value="rgb(255, 158, 143)" style="background-color: rgb(255, 158, 143);"></option>
                                        <option value="rgb(255, 254, 194)" style="background-color: rgb(255, 254, 194);"></option>
                                    </select>
                                </th>
                                <th></th>
                                <th></th>
                                <th>
                                    <select name="" id="" class="js-select-selec2">
                                        <option value=""></option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </th>
                            </tr>

                        </thead>
                        <tbody>

                        </tbody>

                    </table>
                </div>
                <!-- table imprentas-->
            </div>
            <!--/.imprentas-->
        </div>
    </section>

</div>



<!-- Central Modal Large Info-->
<div class="modal fade" id="modal_validacion_arranque" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <p class="heading lead">impresos multiples</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">


            </div>

            <!--Footer-->
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Central Modal Large Info-->

<style>
    .myFont {
        font-size: 10pt;
    }
</style>
<link rel="stylesheet" href="<?php echo base_url("resources/app/Reportes/Consulta_general_de_reportes/css/consulta_reporte_general.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("resources/app/Reportes/Consulta_general_de_reportes/css/reportes.css"); ?>">

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
<script type="text/javascript" src="<?php echo base_url("resources/app/Reportes/Cumplimiento_cantidades/js/show.js"); ?>"></script>