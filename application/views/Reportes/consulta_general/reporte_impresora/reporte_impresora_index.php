<div class="table-responsive">
    <table id="tabla_imprentas" class="table hover display responsive nowrap text-center p-0 mt-2 tablas_sistema" style="width:100% ">
        <thead>
            <tr>
                <th style="font-size: 7pt;">HORA INICIO</th>
                <th style="font-size: 7pt;">HORA FINAL</th>
                <th style="font-size: 7pt;">TIEMPO<br>HH:MM:SS</th>
                <th style="font-size: 7pt;">ID TRELLO</th>
                <th style="font-size: 7pt;">LISTA TRELLO</th>
                <th style="font-size: 7pt;">OT</th>
                <th style="font-size: 7pt;">DESCRIPCION TRELLO</th>
                <th style="font-size: 7pt;">CLIENTE</th>
                <th style="font-size: 7pt;">C.O</th>
                <th style="font-size: 7pt;">T/R</th>
                <th style="font-size: 7pt;">CANT.RECIBIDA</th>
                <th style="font-size: 7pt;">CANT<br>PRODUCIDA</th>
                <th style="font-size: 7pt;">CANT.NC</th>
                <th style="font-size: 7pt;">COD.<br>AUXILIAR</th>
                <th style="font-size: 7pt;">VELOCIDAD<br>MAQUINA</th>
                <th style="font-size: 7pt;">OBSERVACIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($control_de_trabajo as $key => $value) { ?>
                <tr role="<?= $value->ID ?>-<?= $value->tipo_recurso ?>" id="<?= $value->ID ?>" <?php echo ($value->MO == "OP" ? 'style="background-color: rgb(204, 246, 228)"' : ($value->MO == "AUX" ? 'style="background-color: rgb(240, 138, 127)"' : '')) ?>>
                    <td>
                        <input type="text" class="form-control single-input input-tabla-reporte solo_numeros tiempo input_acualizar_velocidades" role="hora_inicial" name="<?= $value->ID ?>" value="<?= $value->hora_inicial ?>" placeholder="">
                        <input type="hidden" class="" role="producto" name="<?= $value->ID ?>" value="<?= $value->producto ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control single-input input-tabla-reporte solo_numeros tiempo input_acualizar_velocidades" role="hora_final" name="<?= $value->ID ?>" value="<?= $value->hora_final ?>" placeholder="">
                    </td>
                    <td>
                        <input type="text" class="form-control input-tabla-reporte" role="dif_tiempo" name="<?= $value->ID ?>" value="<?= $value->dif_tiempo ?>" readonly>
                    </td>
                    <td>
                        <input type="text" class="form-control input-tabla-reporte solo_numeros" role="id_trello" name="<?= $value->ID ?>" value="<?= $value->id_trello ?>" placeholder="">
                    </td>
                    <td>
                        <input type="text" class="form-control input-tabla-reporte" role="lista_trello" name="<?= $value->ID ?>" value="<?= $value->lista_trello ?>" placeholder="">
                    </td>
                    <td>
                        <input type="text" class="form-control  input-tabla-reporte" role="ot_trello" name="<?= $value->ID ?>" value="<?= $value->ot_trello ?>" placeholder="">
                    </td>
                    <td>
                        <textarea style="width: 140px;" class="form-control input-tabla-reporte" name="<?= $value->ID ?>" role="descripcion_trello"><?= $value->descripcion_trello ?></textarea>
                    </td>
                    <td>
                        <input type="text" class="form-control input-tabla-reporte" role="cliente" name="<?= $value->ID ?>" value="<?= $value->cliente ?>" placeholder="">
                        <?php
                        foreach ($validacion_de_arranque as $keys => $validacion) {
                            if ($value->codigo_operacion == "I" && $value->tipo_recurso == "MQ") { //DONE: MOSTRANDO LA TABLA SOLO A LAS MQ
                                if ($validacion->id_fila == $value->ID) { ?>
                                    <div class="validaciones_de_arranques" id="tabla-validacion-arranque<?= $keys ?>" role="<?= $value->ID ?>">
                                        <table class="table table-bordered" id="tabla<?= $keys ?>" role="<?= $validacion->id ?>" style="font-size: 8px;width: 128px !important;padding: 0px !important;margin: 0 auto;height: 0px;margin-top: 0px;text-align: center;">
                                            <thead>
                                                <tr>
                                                    <td colspan="3" style="font-size: 6pt;;">Aprobador</td>
                                                </tr>
                                                <tr class="align-middle">
                                                    <td style="font-size: 6pt;">Colores</td>
                                                    <td style="font-size: 6pt;">Densidades</td>
                                                    <td style="font-size: 6pt;">% Agua</td>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                        <?php }
                            }
                        } ?>

                    </td>
                    <td style="height: 20px; font-size:8pt;">
                        <!-- Operaciones impretas -->
                        <select class="js-select-basic-singles input-tabla-reporte to_validacion_de_arranque input_acualizar_velocidades" id="" role="codigo_operacion" name="<?= $value->ID ?>">
                            <option value="<?= $value->codigo_operacion ?>"><?= $value->codigo_operacion ?></option>
                            <?php foreach ($operaciones as $key => $op) { ?>
                                <option value="<?= $op->codigo_operaciones ?>">
                                    <?= $op->codigo_operaciones ?>-<?= $op->operacion ?>
                                </option>
                            <?php } ?>
                        </select>
                        <?php echo $value->nombre_operacion ?>
                        <?php if ($value->codigo_operacion == "I" && $value->tipo_recurso == "MQ")/*MOSTRANDO EL BOTON SOLO A LAS MQ*/ {  ?>
                            <div id="tabla-validacion-buton" style="padding-top: 40px;">
                                <?php if ($this->session->userdata("id_rol") == 4 || $this->session->userdata("id_rol") == 1) { ?>
                                    <button type="button" class="boton_modal_arranque_validacion boton_validacion" style="background-color: transparent; border: none;" data-toggle="modal"
                                    id="<?php foreach ($validacion_de_arranque as $key => $validacion) {
                                        if ($validacion->id_fila == $value->ID) {
                                            echo $validacion->id;
                                        }
                                        } ?>" data-target="<?php foreach ($validacion_de_arranque as $key => $validacion) {
                                        if ($validacion->id_fila == $value->ID) {
                                            echo "#modal_validacion_arranque";
                                        }
                                        } ?>" role="<?php foreach ($validacion_de_arranque as $key => $validacion) {
                                        if ($validacion->id_fila == $value->ID) {
                                            if ($validacion->estado == "cerrado") {
                                                echo "cerrado";
                                            }
                                        }
                                        } ?>" name="<?= $value->ID ?>" style="margin: 0px auto; padding: 5px 5px;">
                                        <img src="/produccion2/resources/generales/img/icons/009-rueda-de-color.png" height="30px;">
                                    </button>
                                <?php } ?>


                            </div>
                        <?php } else { ?>
                            <div id="tabla-validacion-buton" style="padding-top: 40px;">
                                <button type="button" class="boton_modal_arranque_validacion" id="" style="background-color: transparent; border: none; display:none;" name="<?= $value->ID ?>" style="margin: 0px auto; padding: 5px 5px;">
                                    <img src="/produccion2/resources/generales/img/icons/009-rueda-de-color.png" height="30px;">
                                </button>
                            </div>
                        <?php } ?>

                    </td>
                    <td style="height: 20px; font-size:8pt;">
                        <select class="js-select-basic-singles input-tabla-reporte" id="" role="tiro_retiro" name="<?= $value->ID ?>">
                            <?php
                            $tipo_retiro = array("0" =>  "0", "1" =>  "T", "2" => "R");
                            foreach ($tipo_retiro as $key => $tr) { ?>
                                <option value="<?= $tr ?>" <?php echo ($tr == $value->tiro_retiro) ? 'selected' : ' '; ?>>
                                    <?= $tr ?>
                                </option>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <input type="text" class="form-control input-tabla-reporte solo_numeros" role="cantidad_recibida" name="<?= $value->ID ?>" value="<?= $value->cantidad_recibida ?>" placeholder="">
                    </td>
                    <td>
                        <input type="text" class="form-control input-tabla-reporte solo_numeros input_acualizar_velocidades" role="cantidad_produc" name="<?= $value->ID ?>" value="<?= $value->cantidad_produc ?>" placeholder="">
                    </td>
                    <td>
                        <input type="text" class="form-control input-tabla-reporte solo_numeros" role="cantidad_nc" name="<?= $value->ID ?>" value="<?= $value->cantidad_nc ?>" placeholder="">
                    </td>
                    <td style="height: 20px; font-size:8pt;">
                        <select class="js-select-basic-singles input-tabla-reporte <?php echo ($value->ID == 1 ? 'cambiar_aux_todo_el_reporte' : ''); ?>" id="" role="codigo_auxiliar1" name="<?= $value->ID ?>">
                            <option value=""><?= $value->codigo_auxiliar1 ?></option>
                            <option value="">Ninguno</option>
                            <?php foreach ($auxiliares as $key => $aux) { ?>
                                <option value="<?= $aux->codigo_operador ?>">
                                    <?= $aux->codigo_operador ?>-<?= $aux->nombre_operador ?>
                                </option>
                            <?php } ?>

                        </select>
                    </td>
                    <td>
                        <input type="text" class="form-control input-tabla-reporte solo_numeros" role="velocidad_maquina" name="<?= $value->ID ?>" value="<?= $value->velocidad_maquina ?>" placeholder="">
                    </td>
                    <td>
                        <textarea style="width: 140px;" class="form-control input-tabla-reporte" name="<?= $value->ID ?>" role="observaciones" name=""><?= $value->observaciones ?></textarea>
                    </td>
                </tr>
            <?php } ?>

        </tbody>

    </table>
</div>


<!-- Central Modal Large Info-->
<div class="modal fade" id="modal_validacion_arranque" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-notify modal-info" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <p class="heading lead">VALIDACION DE ARRANQUE</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <div style="margin-left: 70px;margin-right: -65px;">
                    <div style="margin-left: 240px;">
                        <label for="fecha" style="font-size: 12px;">Fecha</label>
                        <input type="date" name="fecha" id="fecha" style="font-size: 12px;border: none; border-bottom: 1px solid black;" value="">
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-5 mb-2">
                            <label for="cliente" style="font-size: 12px;float:left;margin-top: 5px;padding-right: 19px;">Cliente:</label>
                            <input type="text" style="float: left;width:71%;border: none; border-bottom: 1px solid black; font-size: 10pt;" name="cliente" id="cliente" value="">
                        </div>
                        <div class="col-5">
                            <label for="cliente" style="font-size: 12px;float:left;margin-top: 5px;padding-right: 19px;font-size: 10px;margin-top: 6px;">Producto:</label>
                            <input type="text" style="width: 73%;border: none; border-bottom: 1px solid black; font-size: 10pt;" name="producto" id="producto" value="">
                        </div>
                        <div class="col-5 mb-2">
                            <label for="maquina" style="font-size: 12px;float:left;margin-top: 5px;padding-right: 10px;">Maquina:</label>
                            <input type="text" style="float: left;width:71%;border: none; border-bottom: 1px solid black; font-size: 10pt;" name="maquina" id="maquina" value="">
                        </div>
                        <div class="col-5">
                            <label for="ot" style="font-size: 12px;float:left;margin-top: 5px;padding-right: 57px;">OT:</label>
                            <input type="text" style="width:72%;border: none; border-bottom: 1px solid black; font-size: 10pt;" name="ot" id="ot" value="">
                        </div>
                        <div class="col-5">
                            <label for="operador" style="font-size: 12px;float:left;margin-top: 5px;padding-right: 6px;">Operador:</label>
                            <input type="text" style="float: left;width:71%;border: none; border-bottom: 1px solid black; font-size: 10pt;" name="operador" id="operador" value="">
                        </div>
                        <div class="col-5">
                            <label for="supervisor" style="font-size: 12px;float:left;margin-top: 5px;padding-right: 10px;">Supervisor:</label>
                            <table>
                                <tr>
                                    <td style="width: 200px;">
                                        <select name="" class="js-select-basic-singles inputs_validacion_arranque" role="supervisor" id="supervisor" style="width:72%;border: none; border-bottom: 1px solid black;">
                                            <option value="Gabriel Sanchez">Gabriel Sanchez</option>
                                            <option value="Marvin Grande">Marvin Grande</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-5">
                            <label for="turno" style="font-size: 12px;float:left;margin-top: 5px;padding-right: 10px;">Turno:</label>
                            <span class="float-end" id="dif">
                                <input class="form-check-input inputs_validacion_arranque" type="radio" role="turno" name="" id="dia" value="dia">
                                <label class="form-check-label" for="dia">Dia</label>

                                <input class="form-check-input inputs_validacion_arranque" type="radio" role="turno" name="" id="noche" value="noche">
                                <label class="form-check-label" for="noche">Noche</label>
                            </span>

                        </div>
                    </div>
                    <div class="reportes-impresoras" id="reportes-impresoras">
                        <table cellspacing="0" cellpadding="0" class="table table-bordered" id="tabla_modal_validacion_arranque" style="width:82%">
                            <thead>
                                <tr>
                                    <th style="font-size: 8pt;">#</th>
                                    <th style="font-size: 8pt;">COLORES</th>
                                    <th style="font-size: 8pt;">DENSIDADES</th>
                                    <th style="font-size: 8pt;">% AGUA</th>
                                    <th style="font-size: 8pt;">ΔE</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                    <label for="barniz">Barniz utilizado:</label>
                    <input type="text" class="inputs_validacion_arranque" style="width:65%;border: none; border-bottom: 1px solid black" name="" role="barniz" id="barniz" value="">
                    <br>
                    <label for="barniz">Observaciones:</label>
                    <input type="text" class="inputs_validacion_arranque" style="width:65%;border: none; border-bottom: 1px solid black" name="" role="observaciones" id="observaciones" value="">
                    <div style="margin-top:20px">
                        <div class="row">
                            <div class="col-5">
                                <label for="Calidad" style="font-size: 12px;float:left;margin-top: 5px;padding-right: 10px;">Calidad:</label>
                                <table>
                                    <tr>
                                        <td style="width: 200px;">
                                            <select class="js-select-basic-singles inputs_validacion_arranque" name="" role="encargado_calidad" id="encargado_calidad" style="">
                                                <option value="" id="first"></option>
                                                <option value="Susana Leiva">Susana Leiva</option>
                                                <option value="Fatima Ramirez">Fatima Ramirez</option>
                                                <option value="Isis Alfaro">Isis Alfaro</option>
                                                <option value="Juan Carlos Rogel">Juan Carlos Rogel</option>
                                                <option value="Rony Castillo">Rony Castillo</option>
                                                <option value="Raphael Figueroa">Raphael Figueroa</option>
                                                <option value="Ing. Nicolas Díaz">Ing. Nicolas Díaz</option>
                                                <option value="Gabriel Valladares">Gabriel Valladares</option>
                                                <option value="Beatriz Molina">Beatriz Molina</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>

                            </div>
                            <div class="col-6">
                                <label for="operador" style="font-size: 12px;float:left;margin-top: 5px;padding-right: 6px;">Operador:</label>
                                <input readonly type="text" style="float: left;width:60%;border: none; border-bottom: 1px solid black; font-size: 10pt;" name="operador" id="operador" value="">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!--Footer-->
            <div class="modal-footer">
                <button class="btn botones" id="btn_cambiar_estado" role="" name="" style="background-color: #D35400; color: white;">Guardar</button>
                <a type="button" class="btn btn-outline-success" data-dismiss="modal">No, Gracias</a>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Central Modal Large Info-->
<link rel="stylesheet" href="<?php echo base_url("resources/app/Reportes/Consulta_general_de_reportes/css/consulta_reporte_general.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("resources/app/Reportes/Consulta_general_de_reportes/css/reportes.css"); ?>">


<style>
    .myFont {
        font-size: 8pt;
        /* <!-- Esto le da el tamaño a los select de fuente --> */
    }
</style>

<script type="text/javascript">
    var url_analizada = /^(\w+):\/\/([^\/]+)([^]+)$/.exec(window.location);
    var parametros = url_analizada[3].split('/') //OBTENEMOS LOS PARAMETROS MAS IMPORTANTE [CODIGO_REPORTE,TIPO_REPORTE,CODIGO_MAQUINA]
</script>
<script src="<?php echo base_url("resources/app/Reportes/Consulta_general_de_reportes/js/reporte_imprentas/show_impresora.js"); ?>"></script>
<script src="<?php echo base_url("resources/app/Reportes/Consulta_general_de_reportes/js/reporte_imprentas/create_impresora.js"); ?>"></script>
<script src="<?php echo base_url("resources/app/Reportes/Consulta_general_de_reportes/js/reporte_imprentas/update_impresora.js"); ?>"></script>
<script src="<?php echo base_url("resources/app/Reportes/Consulta_general_de_reportes/js/reportes/trello.js"); ?>"></script>
<script src="<?php echo base_url("resources/app/Reportes/Consulta_general_de_reportes/js/reportes/otros.js"); ?>"></script>