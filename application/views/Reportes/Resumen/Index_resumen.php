<style>
    .wrap,
    .wrap2 {
        width: 70px;
        white-space: pre-line;
        /* CSS3 */
        white-space: -moz-pre-wrap;
        /* Firefox */
        white-space: -pre-wrap;
        /* Opera <7 */
        white-space: -o-pre-wrap;
        /* Opera 7 */
        word-wrap: break-word;
        /* IE */
        font-size: 8pt;
    }

    .wrap {
        height: auto;
        width: auto;
    }

    .wrap2 {
        border: 1px solid blue;
        height: 100px;
        overflow: auto;
        width: 20px;
    }

    .table-responsive table tbody tr td {
        font-size: 8pt;
    }

    .table-responsive-flex table tbody tr td {
        font-size: 7pt;
    }
</style>
<div class="contenedor">
    <section class="section my-5 pb-5">
        <form action="" id="buscar_informe_cumplimiento" method="POST">
            <div class="row justify-content-center">

                <!--Grid column-->
                <div class="col-md-2 mb-2">
                    <label for="familia" style="font-size: 10pt;color: black">Numero de OT</label>
                    <input style="color: black;" placeholder="" type="text" id="" name="" class="form-control">
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-2 mb-2">
                    <div style="margin-top: 22px;">
                        <button type="submit" class="btn botones" style="background-color: green;" id="buscar">
                            <img src="/Produccion/resources/img/buscar.png" style="width: 30px;height:28px">
                            <span>Buscar</span>
                        </button>
                    </div>
                </div>
                <!--Grid column-->
            </div>
        </form>

        <!-- table imprentas-->
        <div class="table-responsive">
            <table id="tabla_resumen_ot" class="table table-striped hover display responsive nowrap text-center p-0 mt-2 tablas_sistema" style="width:100% ">
                <thead>
                    <tr>
                        <th style="font-size: 8pt;">OT</th>
                        <th style="font-size: 8pt;">CLIENTE</th>
                        <th style="font-size: 8pt;">VENDEDOR</th>
                        <th style="font-size: 8pt;">FECHAR<br>DE INGRESO</th>
                        <th style="font-size: 8pt;">FECHAR<br>DE ENTREGA ACTUAL</th>
                        <th style="font-size: 8pt;">FECHA<br>DE ENTREGA<br>ORIGINAL</th>
                        <th style="font-size: 8pt;">FECHA<br>DE ENTREGA<br>PRODUCTO TERMINADO</th>
                        <th style="font-size: 8pt;">CANTIDAD<br>SOLICITADA</th>
                        <th style="font-size: 8pt;">CANTIDAD<br>ENTREGADA</th>
                        <th style="font-size: 8pt;">LISTA</th>
                    </tr>
                </thead>
                <thead>
                    <tr>
                        <th>
                            <input type="text" name="" id="" class="tabla tabla_imprenta ">
                        </th>
                        <th>
                            <input type="text" name="" id="" class="tabla tabla_imprenta ">
                        </th>
                        <th>
                            <select name="" id="" class="js-select-selec2">
                                <option value=""></option>
                                <option value="MAÑANA">MAÑANA</option>
                                <option value="TARDE">TARDE</option>
                                <option value="NOCHE">NOCHE</option>
                            </select>
                        </th>
                        <th>
                            <input type="date" style="width: 110px; font-size:8pt;" class="form-control">
                        </th>
                        <th>
                            <input type="date" style="width: 110px; font-size:8pt;" class="form-control">
                        </th>
                        <th>
                            <input type="date" style="width: 110px; font-size:8pt;" class="form-control">
                        </th>
                        <th>
                            <input type="date" style="width: 110px; font-size:8pt;" class="form-control">
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
                    </tr>

                </thead>
                <tbody>


                </tbody>

            </table>
        </div>
        <!-- table imprentas-->


    </section>
</div>

<style>
    .myFont {
        font-size: 10pt;
    }
</style>
<script>
    $('.js-select-selec2').select2({
        width: 'resolve',
        dropdownAutoWidth: true,
        theme: "bootstrap4",
        dropdownCssClass: "myFont",
    });


</script>
<script type="text/javascript" src="<?php echo base_url("resources/app/Reportes/Detalle_ot/js/show.js"); ?>"></script>
