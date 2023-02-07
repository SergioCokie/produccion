<div class="contenedor">
    <br><br>
    <!-- BOTONES SIGUIENTE Y ANTERIOR -->
    <?php
    $siguiente = '';
    $anterior = '';

    foreach ($before_after as $key => $value) {
        if ($value->id_reporte == $objetios_recibidos['id_reporte']) {
            if ($key == 0) {
                $anterior = $before_after[$key + 1]->ruta;
            } else if ($key == count($before_after) - 1) {
                $siguiente = $before_after[$key - 1]->ruta;
            } else {
                $anterior = $before_after[$key + 1]->ruta;
                $siguiente = $before_after[$key - 1]->ruta;
            }
        }
    }
    ?>

    <div class="encabezado-header ">
        <table>
            <tbody>
                <tr>
                    <td>
                        <div class="btn-group botonera-izquierda" role="group" aria-label="Basic example">
                            <a href="<?= base_url() ?>reportes/consulta_general/reporte/<?php echo (!empty($anterior) ? $anterior : '');  ?>">
                                <button type="button" class="btn btn-success">
                                    <img src="/produccion/resources/img/Anterior.png">
                                    <hr>
                                    <span>Anterior</span>
                                </button>
                            </a>
                            <a href="<?= base_url() ?>reportes/consulta_general/reporte/<?php echo (!empty($siguiente) ? $siguiente : '');  ?>">
                                <button type="button" class="btn btn-success">
                                    <img src="/produccion/resources/img/Siguiente.png">
                                    <hr>
                                    <span>Siguiente</span>
                                </button>
                            </a>
                            <!-- TODO: CUANDO NO HAY NINGUN REGISTRO ANRES O DESPUES VA ERROR -->
                            <?php
                            if ($this->session->userdata("id_rol") != 1) { ?>
                                <button type="button" id="Pendiente_revision" value="Pendiente de revisión" class="btn btn-warning btn-opciones cambiar_estado">
                                    <img src="/produccion/resources/img/Enviar.png">
                                    <hr>
                                    <span>ENVIAR</span>
                                </button>
                            <?php } ?>


                            <button type="button" id="Revisado" value="Revisado" class="btn btn-warning btn-opciones cambiar_estado">
                                <img src="/produccion/resources/img/Enviar.png">
                                <hr>
                                <span>REVISADO</span>
                            </button>
                            <button type="button" id="Cerrado" value="Cerrado" class="btn btn-warning btn-opciones cambiar_estado">
                                <img src="/produccion/resources/img/Enviar.png">
                                <hr>
                                <span>CERRAR</span>
                            </button>
                            </button>


                            <button type="button" class="btn btn-danger descargas" data-toggle="modal" data-target="#descargar_modal" value="">
                                <img src="/produccion/resources/img/descarga.png">
                                <hr>
                                <span>Descargar</span>
                            </button>
                            <div id="contenedor-dif1" class="seccion-3 prueba_de_select">

                                <select name="<?= $codigo_reporte[0]->id_codigo ?>" class="js-select-basic-single" role="turno" id="turno">
                                    <option selected value="<?= $codigo_reporte[0]->turno ?>"><?= $codigo_reporte[0]->turno ?></option>
                                    <option value="MAÑANA">MAÑANA</option>
                                    <option value="TARDE">TARDE</option>
                                    <option value="NOCHE">NOCHE</option>
                                </select>
                                <label for="turno">Turno</label>

                            </div>

                            <div id="contenedor-dif1" style="margin-left: 5px;" class="agregar-filas seccion-3">
                                <input type="text" name="filas" id="filas" placeholder="filas">
                                <label for="turno"><button id="add_rows"><i class="fa fa-plus" aria-hidden="true">+</i></button></label>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class=" botonera-centro">
                            <div class="btn-group">
                                <div id="contenedor-dif2">
                                    <label for="turno">VEL/NOM.</label>
                                    <input type="text" name="velocidad_nominal" value="">
                                </div>
                                <style>
                                    #msg-tiempo {
                                        background: black;
                                        opacity: 1;
                                        transition: opacity 1s;
                                    }

                                    #msg-tiempo.cumplido {
                                        color: black;
                                        background-color: white;
                                    }

                                    #msg-tiempo.fade {
                                        color: white;
                                        background-color: black;
                                    }
                                </style>
                                <script>
                                    animacion = function() {
                                        var fecha_actual = new Date();
                                        var timeArray = $('#tiempo-reporte').val().split(":");
                                        if (timeArray[0] >= '07') {
                                            document.getElementById('msg-tiempo').classList.toggle('cumplido');
                                            document.getElementById('msg-tiempo').innerText = 'TIEMP.CUMPLIDO';
                                        } else {
                                            $('#msg-tiempo').css('background-color', 'black');
                                            document.getElementById('msg-tiempo').innerText = 'TIEMPO';

                                        }
                                    }
                                    setInterval(animacion, 1000);
                                </script>


                                <div id="contenedor-dif2">
                                    <label for="turno">VEL/EFECT.</label>
                                    <input type="text" name="velocidad_efectiva" value="">
                                </div>
                                <div id="contenedor-dif2">
                                    <label for="turno" id="msg-tiempo" class="">TIEMPO</label>
                                    <input type="text" id="tiempo-reporte" name="tiempo_reporte" value="">
                                </div>
                            </div>
                        </div>
                    </td>



                    <td>
                        <div class="botonera-derecha">
                            <div id="auxiliares">
                                <p>Auxiliar</p>
                                <style>
                                    .tooltip-inner {
                                        white-space: pre-line;
                                    }
                                </style>
                                <div class="row" style="padding-top: 3px">
                                    <div class="col-6">
                                        <?php if (!empty($auxiliar_por_reporte)) { ?>
                                            <?php if (count($auxiliar_por_reporte) > 1) { ?>
                                                <span type="button" data-toggle="tooltip" data-placement="right" title="<?php foreach ($auxiliar_por_reporte as $key => $value) { ?>
                                                -<?= $value->nombre_operador ?>(<?= $value->codigo_auxiliar1 ?>)
                                            <?php } ?>">
                                                    <?php echo $auxiliar_por_reporte[0]->nombre_operador . "(" . $auxiliar_por_reporte[0]->codigo_auxiliar1 . ")"; ?>
                                                </span>
                                            <?php } else {
                                                echo $auxiliar_por_reporte[0]->nombre_operador . "(" . $auxiliar_por_reporte[0]->codigo_auxiliar1 . ")";
                                            } ?>
                                        <?php } ?>


                                    </div>
                                </div>
                            </div>

                            <div id="operador">
                                <p>Operador</p>
                                <p class="operador">
                                    <?php if (!empty($control_de_trabajo)) { ?>
                                        <?= $control_de_trabajo[0]->nombre_operador ?><br>(<?= $control_de_trabajo[0]->codigo_operador ?>)
                                    <?php } ?>
                                </p>
                            </div>
                            <div id="reporte">
                                <p>N° REPORTE</p>
                                <p id="codigo_reporte_en_header"></p>
                            </div>
                            <?php
                            $op = 0;
                            $aux = 0;
                            foreach ($control_de_trabajo as $key => $value) {
                                if ($value->MO == "OP") {
                                    $op++;
                                }
                                if ($value->MO == "AUX") {
                                    $aux++;
                                }
                            }
                            ?>
                            <div id="fecha" style="width: 85px;">
                                <p><input type="date" class="fecha-reporte" value="<?= date("Y-m-d", strtotime($codigo_reporte[0]->fecha_creacion)) ?>" name="fecha_reporte" style="font-size: 11px;margin-left: 4px;"></p>
                                <p id="mo-aux" style="margin-top: -13px;">MO-AUX: <span><?php echo $aux ?></span></p>
                                <p id="mo-op">MO-OP: <span><?php echo $op ?></span></p>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>


    <!--Modal Form Login with Avatar Demo-->
    <div class="modal fade" id="descargar_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
            <!--Content-->
            <div class="modal-content">

                <!--Header-->
                <div class="modal-header">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT-0e4MUQe_4BBGu_Yasn5Xr_EJAHylOcsqNE04Dt05pqq-WuZD-H7C3njBWPp3dVe_lMU&usqp=CAU" class="rounded-circle img-fluid">
                </div>
                <!--Body-->
                <div class="modal-body text-center mb-1">

                    <h5 class="mt-1 mb-2">D E S C A R G A R</h5>

                    <div class="text-center mt-4">
                        <button type="button" class="btn btn-pin">PDF<i class="fa fa-pinterest"></i></button>
                    </div>
                    <div class="text-center mt-4">
                        <button type="button" class="btn btn-slack">EXCEL<i class="fa fa-slack"></i></button>
                    </div>
                    <!--Pinterest-->
                    <!--Youtube-->

                </div>

            </div>
            <!--/.Content-->
        </div>
    </div>
    <!--Modal Form Login with Avatar Demo-->

    <script>
        // Tooltips Initialization
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <style>
        .tablas_sistema tbody tr:hover {
            background-color: rgba(31, 53, 88, 0.1);
        }

        .table-responsive input[type="text"]:disabled {
            background-color: rgba(31, 53, 88, 0.2);
        }

        .input-tabla-reporte:disabled {
            background-color: rgba(31, 53, 88, 0.2);
        }

        #segundo_header_tabla_flexo {
            background-color: #1f3558;
            color: white;
            text-align: center;
            position: sticky;
            top: 0;
            z-index: 10;
        }
    </style>