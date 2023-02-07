<div class="contenedor">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <section class="section my-5 pb-5">

        <div class="row">
            <div class="col-lg-12 text-center">
                <h3 class="text-uppercase">Gestión de Colores 105 <br><small class="text-muted">Cuatricomía + 1 Pantone</small></h3>

            </div>
        </div>

        <!--formulario  -->
        <div>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                    <i class="fa fa-archive" aria-hidden="true"></i> <label for="norden">Número de orden:</label><br>
                    <input type="text" id="norden" name="norden" value="" placeholder="99999"><br>
                </div>
                <div class="col-lg-5">
                    <i class="fa fa-handshake-o" aria-hidden="true"></i> <label for="cliente">Cliente:</label><br>
                    <input type="text" id="cliente" name="cliente" value="" placeholder="Impresos Multiples" style=" width: 100%;"><br>
                </div>
                <div class="col-lg-1"></div>
            </div>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                    <br>
                    <i class="fa fa-cubes" aria-hidden="true"></i><label for="producto">Producto:</label><br>
                    <input type="text" id="producto" name="producto" value="" placeholder="Producto" style=" width: 100%;"><br>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <hr class="mt-2 mb-3" />
                </div>
                <div class="col-lg-1"></div>
            </div>

            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                    <i class="fa fa-user-o" aria-hidden="true"></i> <label for="operador">Operador:</label><br>
                    <select class="js-select-basic-single-pt tabla input_8" id="operador" name="operador" style="font-size: 8pt;width: 100%">
                        <!-- MAQUINA -->
                        <option value="">Operadores</option>
                        <?php foreach ($operador as $key => $value) { ?>
                            <option value="<?= $value->codigo_operador ?>"><?= $value->nombre_operador ?></option>

                        <?php } ?>
                    </select>
                </div>
                <div class="col-lg-5">
                    <i class="fa fa-user-o" aria-hidden="true"></i> <label for="auxiliar">Auxiliar:</label><br>
                    <select class="js-select-basic-single-pt tabla input_8" id="auxiliar" name="auxiliar" style="font-size: 8pt;width: 100%">
                        <option value="">Seleccione uno...</option>
                        <?php foreach ($auxiliar as $key => $value) { ?>
                            <option value="<?= $value->codigo_operador ?>"><?= $value->nombre_operador ?></option>

                        <?php } ?>
                    </select><br><br>
                </div>
                <div class="col-lg-1"></div>
            </div>

            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                    <i class="fa fa-sun-o" aria-hidden="true"></i> <label for="turno">Turno:</label><br>
                    <select class="js-select-basic-single-pt tabla input_8" id="turno" name="turno" style=" width: 100%;">
                        <option value="">Turno</option>
                            <option value="Mañana">Mañana</option>
                            <option value="Tarde">Tarde</option>
                            <option value="Noche">Noche</option>
                    </select>

                </div>
            </div>

            <!-- seccion x -->
            <div class="row">
                <div class="col-lg-1"></div>
                <div id="reloada" class="col-lg-5">
                    <i class="fa fa-user-o" aria-hidden="true"></i> <label for="supervisor">Supervisor:</label><br>
                    <select class="js-select-basic-single-pt tabla input_8" id="supervisor" name="supervisor" style=" width: 100%;">
                        <option value="">Supervisor...</option>
                        <?php foreach ($auxiliar as $key => $value) { ?>
                            <option value="<?= $value->codigo_operador ?>"><?= $value->nombre_operador ?></option>

                        <?php } ?>
                    </select>
                    <br>
                </div>
                <div class="col-lg-5">
                    <i class="fa fa-user-o" aria-hidden="true"></i> <label for="calidad">Calidad:</label><br>
                    <select class="js-select-basic-single-pt tabla input_8" id="calidad" name="calidad" style=" width: 100%;">
                        <option value="">Calidad...</option>
                        <?php foreach ($supervisar as $key => $value) { ?>
                            <option value="<?= $value->codigo_operador ?>"><?= $value->nombre_operador ?></option>

                        <?php } ?>
                    </select><br><br>
                </div>
                <div class="col-lg-1"></div>
            </div>

            <!--seccion y -->
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-3">
                    <i class="fa fa-eyedropper" aria-hidden="true"></i> <label for="ph">PH:</label><br>
                    <input type="number" id="ph" name="ph" value="5.01" step="0.01" placeholder="5.01" min="0" max="14" onkeypress="puntoYnumeros(event);"><br>
                </div>

                <div class="col-lg-3">
                    <i class="fa fa-thermometer-half" aria-hidden="true"></i> <label for="temperatura">Temperatura <span class="nota-tabla-im">(°C)</span>: </label><br>
                    <input type="number" id="temperatura" name="temperatura" value="11.01" step="0.01" min="0" max="100" onkeypress="puntoYnumeros(event);"><br>
                </div>

                <div class="col-lg-4">
                    <i class="fa fa-bolt" aria-hidden="true"></i> <label for="conductividad">Conductividad <span class="nota-tabla-im">(μS/m)</span>:</label><br>
                    <input type="number" id="conductividad" name="conductividad" value="1200" step="0.01" min="0" max="9999" onkeypress="puntoYnumeros(event);"><br>
                </div>
                <div class="col-lg-1"></div>
            </div>

            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <hr class="mt-2 mb-3" />
                </div>
                <div class="col-lg-1"></div>
            </div>

            <!-- Tabla -->
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <!-- ************************** Tablar ***********************-->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col" colspan="5" class="text-center text-white bg-secondary">Zona 1</th>
                                <th scope="col" colspan="5" class="text-center bg-light ">Zona 2</th>
                                <th scope="col" colspan="5" class="text-center text-white bg-secondary">Zona 3</th>
                            </tr>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col" class="text-center text-white bg-dark">K</th>
                                <th scope="col" class="text-center swatch-cyan text-border-black">C</th>
                                <th scope="col" class="text-center swatch-magenta text-border-black">M</th>
                                <th scope="col" class="text-center swatch-yellow text-border-black">Y</th>
                                <th scope="col" class="text-center swatch-p1 text-border-black">P1</th>

                                <th scope="col" class="text-center text-white bg-dark">K</th>
                                <th scope="col" class="text-center swatch-cyan text-border-black">C</th>
                                <th scope="col" class="text-center swatch-magenta text-border-black">M</th>
                                <th scope="col" class="text-center swatch-yellow text-border-black">Y</th>
                                <th scope="col" class="text-center swatch-p1 text-border-black">P1</th>

                                <th scope="col" class="text-center text-white bg-dark">K</th>
                                <th scope="col" class="text-center swatch-cyan text-border-black">C</th>
                                <th scope="col" class="text-center swatch-magenta text-border-black">M</th>
                                <th scope="col" class="text-center swatch-yellow text-border-black">Y</th>
                                <th scope="col" class="text-center swatch-p1 text-border-black">P1</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- ************************** TEMPERATURA DE AGUA ***********************-->
                            <tr>
                                <th scope="row" class="termometro-im">
                                    <i class="fa fa-balance-scale" aria-hidden="true"></i>
                                </th>
                                <td>
                                    <input type="text" id="KT1" name="KT1" value="" class="cell-table " onkeypress="puntoYnumeros(event);" placeholder="0%">
                                </td>
                                <td>
                                    <input type="text" id="CT1" name="CT1" value="" class="cell-table " onkeypress="puntoYnumeros(event);" placeholder="0%">
                                </td>
                                <td>
                                    <input type="text" id="MT1" name="MT1" value="" class="cell-table " onkeypress="puntoYnumeros(event);" placeholder="0%">
                                </td>
                                <td>
                                    <input type="text" id="YT1" name="YT1" value="" class="cell-table " onkeypress="puntoYnumeros(event);" placeholder="0%">
                                </td>
                                <td>
                                    <input type="text" id="P1T1" name="P1T1" value="" class="cell-table " onkeypress="puntoYnumeros(event);" placeholder="0%">
                                </td>

                                <td>
                                    <input type="text" id="KT2" name="KT2" value="" class="cell-table cell-table-noneB" disabled>
                                </td>
                                <td>
                                    <input type="text" id="CT2" name="CT2" value="" class="cell-table cell-table-noneB" disabled>
                                </td>
                                <td>
                                    <input type="text" id="MT2" name="MT2" value="" class="cell-table cell-table-noneB" disabled>
                                </td>
                                <td>
                                    <input type="text" id="YT2" name="YT2" value="" class="cell-table cell-table-noneB" disabled>
                                </td>
                                <td>
                                    <input type="text" id="P1T2" name="P1T2" value="" class="cell-table cell-table-noneB" disabled>
                                </td>


                                <td>
                                    <input type="text" id="KT3" name="KT3" value="" class="cell-table cell-table-noneB" disabled>
                                </td>
                                <td>
                                    <input type="text" id="CT3" name="CT3" value="" class="cell-table cell-table-noneB" disabled>
                                </td>
                                <td>
                                    <input type="text" id="MT3" name="MT3" value="" class="cell-table cell-table-noneB" disabled>
                                </td>
                                <td>
                                    <input type="text" id="YT3" name="YT3" value="" class="cell-table cell-table-noneB" disabled>
                                </td>
                                <td>
                                    <input type="text" id="P1T3" name="P1T3" value="" class="cell-table cell-table-noneB" disabled>
                                </td>

                            </tr>

                            <!-- ************************** VA ***********************-->
                            <tr>
                                <th scope="row" class="termometro-im"><i class="fa fa-rocket" aria-hidden="true"></i></th>
                                <td>
                                    <input type="text" id="Z11" name="Z11" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>
                                <td>
                                    <input type="text" id="Z12" name="Z12" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>
                                <td>
                                    <input type="text" id="Z13" name="Z13" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>
                                <td>
                                    <input type="text" id="Z14" name="Z14" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>
                                <td>
                                    <input type="text" id="Z15" name="Z15" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>

                                <td>
                                    <input type="text" id="Z21" name="Z21" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>
                                <td>
                                    <input type="text" id="Z22" name="Z22" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>
                                <td>
                                    <input type="text" id="Z23" name="Z23" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>
                                <td>
                                    <input type="text" id="Z24" name="Z24" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>
                                <td>
                                    <input type="text" id="Z25" name="Z25" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>

                                <td>
                                    <input type="text" id="Z31" name="Z31" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>
                                <td>
                                    <input type="text" id="Z32" name="Z32" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>
                                <td>
                                    <input type="text" id="Z33" name="Z33" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>
                                <td>
                                    <input type="text" id="Z34" name="Z34" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>
                                <td>
                                    <input type="text" id="Z35" name="Z35" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" class="termometro-im"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></th>
                                <td>
                                    <input type="text" id="L11" name="L11" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>
                                <td>
                                    <input type="text" id="L12" name="L12" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>
                                <td>
                                    <input type="text" id="L13" name="L13" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>
                                <td>
                                    <input type="text" id="L14" name="L14" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>
                                <td>
                                    <input type="text" id="L15" name="L15" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>

                                <td>
                                    <input type="text" id="L21" name="L21" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>
                                <td>
                                    <input type="text" id="L22" name="L22" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>
                                <td>
                                    <input type="text" id="L23" name="L23" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>
                                <td>
                                    <input type="text" id="L24" name="L24" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>
                                <td>
                                    <input type="text" id="L25" name="L25" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>

                                <td>
                                    <input type="text" id="L31" name="L31" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>
                                <td>
                                    <input type="text" id="L32" name="L32" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>
                                <td>
                                    <input type="text" id="L33" name="L33" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>
                                <td>
                                    <input type="text" id="L34" name="L34" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>
                                <td>
                                    <input type="text" id="L35" name="L35" value="" class="cell-table" onkeypress="puntoYnumeros(event);">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-1"></div>
            </div>

            <!-- Descripcion de tabla -->
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-3 nota-tabla-im"><i class="fa fa-balance-scale" aria-hidden="true"></i> Balance de agua y alcohol</div>
                <div class="col-lg-3 nota-tabla-im"><i class="fa fa-rocket" aria-hidden="true"></i> Valor de arranque</div>
                <div class="col-lg-4 nota-tabla-im"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Valores de lectura</div>
                <div class="col-lg-1"></div>
            </div>

            <!-- resultados -->
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <table id="sortable" class="table table-bordered ">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col"></th>
                                <th scope="col" colspan="5" class="text-center text-white bg-secondary">Zona 1</th>
                                <th scope="col" colspan="5" class="text-center bg-light ">Zona 2</th>
                                <th scope="col" colspan="5" class="text-center text-white bg-secondary">Zona 3</th>
                            </tr>
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">Día</th>
                                <th scope="col" class="text-center text-white bg-dark">K</th>
                                <th scope="col" class="text-center swatch-cyan text-border-black">C</th>
                                <th scope="col" class="text-center swatch-magenta text-border-black">M</th>
                                <th scope="col" class="text-center swatch-yellow text-border-black">Y</th>
                                <th scope="col" class="text-center swatch-p1 text-border-black">P1</th>

                                <th scope="col" class="text-center text-white bg-dark">K</th>
                                <th scope="col" class="text-center swatch-cyan text-border-black">C</th>
                                <th scope="col" class="text-center swatch-magenta text-border-black">M</th>
                                <th scope="col" class="text-center swatch-yellow text-border-black">Y</th>
                                <th scope="col" class="text-center swatch-p1 text-border-black">P1</th>

                                <th scope="col" class="text-center text-white bg-dark">K</th>
                                <th scope="col" class="text-center swatch-cyan text-border-black">C</th>
                                <th scope="col" class="text-center swatch-magenta text-border-black">M</th>
                                <th scope="col" class="text-center swatch-yellow text-border-black">Y</th>
                                <th scope="col" class="text-center swatch-p1 text-border-black">P1</th>
                            </tr>
                        </thead>
                        <tbody id="recargar2">
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-1"></div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <br><br>
                    <button class="ocultandoBoton" type="button" onclick=""></button>
                </div>
            </div>

    </section>
</div>
<script>
    $('.js-select-basic-single-pt').select2({
        width: 'resolve',
        dropdownAutoWidth: true,
        theme: "bootstrap4",
        dropdownCssClass: "myFont",
    });
</script>
<link rel="stylesheet" href="<?php echo base_url("resources/app/Calidad/control_densidad/css/style.css"); ?>">
<script type="text/javascript" src="<?php echo base_url("resources/app/Calidad/ficha_tecnica/js/show.js"); ?>"></script>