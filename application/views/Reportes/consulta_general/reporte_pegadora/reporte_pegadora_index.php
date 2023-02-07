<div class="table-responsive">
    <table id="tabla_pegadora" class="table hover display responsive nowrap text-center p-0 mt-2 tablas_sistema" style="width:100% ">
        <thead>
            <tr>
                <th style="font-size: 7pt;">HORA INICIO</th>
                <th style="font-size: 7pt;">HORA FINAL</th>
                <th style="font-size: 7pt;">TIEMPO<br>HH:MM:SS</th>
                <th style="font-size: 7pt;">ID TRELLO</th>
                <th style="font-size: 7pt;width: 84px;">LISTA TRELLO</th>
                <th style="font-size: 7pt;width: 84px;">OT</th>
                <th style="font-size: 7pt;">DESCRIPCION TRELLO</th>
                <th style="font-size: 7pt;">CLIENTE</th>
                <th style="font-size: 7pt;">C.O</th>
                <th style="font-size: 7pt;">C.P</th>
                <th style="font-size: 7pt;">CANTI.<br>RECIBIDA</th>
                <th style="font-size: 7pt;">CANT.<br>PRODUCIDA</th>
                <th style="font-size: 7pt;">CANT.NC</th>
                <th style="font-size: 7pt;">CANT.NC<br>OTROS</th>
                <th style="font-size: 7pt;">SOBRANTE</th>
                <th style="font-size: 7pt;">COD<br>AUXILIAR</th>
                <th style="font-size: 7pt;">VELOCIDAD<br>MAQUINA</th>
                <th style="font-size: 7pt;">OTROS</th>
                <th style="font-size: 7pt;">OBSERVACIONES</th>

            </tr>
        </thead>
  
        <tbody>
            <?php foreach ($control_de_trabajo as $keypegadora => $value) { ?>
                <tr role="<?= $value->ID ?>-<?= $value->tipo_recurso ?>" id="<?= $value->ID ?>" <?php echo ($value->MO == "OP" ? 'style="background-color: rgb(204, 246, 228)"' : ($value->MO == "AUX" ? 'style="background-color: rgb(240, 138, 127)"' : '')) ?>>
                    <td>
                        <input type="text" class="form-control solo_numeros single-input input-tabla-reporte tiempo" role="hora_inicial" name="<?= $value->ID ?>" value="<?= $value->hora_inicial ?>" placeholder="">
                        <input type="hidden" class="" role="producto" name="<?= $value->ID ?>" value="<?= $value->producto ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control solo_numeros single-input input-tabla-reporte tiempo input_acualizar_velocidades" role="hora_final" name="<?= $value->ID ?>" value="<?= $value->hora_final ?>" placeholder="">
                    </td>
                    <td>
                        <input type="text" class="form-control input-tabla-reporte" role="dif_tiempo" name="<?= $value->ID ?>" value="<?= $value->dif_tiempo ?>" readonly>
                    </td>
                    <td>
                        <input type="text" class="form-control solo_numeros input-tabla-reporte" role="id_trello" name="<?= $value->ID ?>" value="<?= $value->id_trello ?>" placeholder="">
                    </td>
                    <td>
                        <input type="text" class="form-control input-tabla-reporte" role="lista_trello" name="<?= $value->ID ?>" value="<?= $value->lista_trello ?>" placeholder="">
                    </td>
                    <td>
                        <input type="text" class="form-control  input-tabla-reporte" role="ot_trello" name="<?= $value->ID ?>" value="<?= $value->ot_trello ?>" placeholder="">
                    </td>
                    <td>
                        <textarea style="width: 140px;height: 183px;" class="form-control input-tabla-reporte" name="<?= $value->ID ?>" role="descripcion_trello"><?= $value->descripcion_trello ?></textarea>
                    </td>
                    <td>
                        <input type="text" class="form-control input-tabla-reporte" role="cliente" name="<?= $value->ID ?>" value="<?= $value->cliente ?>" placeholder="">
                    </td>
                    <td style="height: 20px; font-size:8pt;">
                        <!-- Operaciones impretas -->
                        <select class="js-select-basic-singles input-tabla-reporte to_validacion_de_arranque" id="" role="codigo_operacion" name="<?= $value->ID ?>">
                            <option value="<?= $value->codigo_operacion ?>"><?= $value->codigo_operacion ?></option>
                            <?php foreach ($operaciones as $key => $op) { ?>
                                <option value="<?= $op->codigo_operaciones ?>">
                                    <?= $op->codigo_operaciones ?>-<?= $op->operacion ?>
                                </option>
                            <?php } ?>
                        </select>
                        <?= $value->nombre_operacion ?>
                    </td>
                    <td style="height: 20px; font-size:8pt;">
                        <input type="text" class="form-control input-tabla-reporte" role="cod_producto" name="<?= $value->ID ?>" value="<?= $value->cod_producto ?>" placeholder="">
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
                    <td>
                        <input type="text" class="form-control input-tabla-reporte solo_numeros" role="cantidad_nc_proc" name="<?= $value->ID ?>" value="<?= $value->cantidad_nc_proc ?>" placeholder="">
                    </td>
                    <td style="height: 20px; font-size:8pt;">
                        <input type="text" class="form-control input-tabla-reporte solo_numeros" role="sobrante" name="<?= $value->ID ?>" value="<?= $value->sobrante ?>" placeholder="">
                    </td>



                    <td style="height: 20px; font-size:8pt;">
                        <select class="js-select-basic-singles input-tabla-reporte <?php echo ($keypegadora == 0 ? 'cambiar_aux_todo_el_reporte' : ''); ?>" id="" role="codigo_auxiliar1" name="<?= $value->ID ?>">
                            <option value=""><?= $value->codigo_auxiliar1 ?></option>
                            <option value="">Ninguno</option>
                            <?php foreach ($auxiliares as $key => $aux) { ?>
                                <option value="<?= $aux->codigo_operador ?>">
                                    <?= $aux->codigo_operador ?>-<?= $aux->nombre_operador ?>
                                </option>
                            <?php } ?>
                        </select>

                        <select class="js-select-basic-singles input-tabla-reporte <?php echo ($keypegadora == 0 ? 'cambiar_aux_todo_el_reporte' : ''); ?>" id="" role="codigo_auxiliar2" name="<?= $value->ID ?>">
                            <option value=""><?= $value->codigo_auxiliar2 ?></option>
                            <option value="">Ninguno</option>
                            <?php foreach ($auxiliares as $key => $aux) { ?>
                                <option value="<?= $aux->codigo_operador ?>">
                                    <?= $aux->codigo_operador ?>-<?= $aux->nombre_operador ?>
                                </option>
                            <?php } ?>

                        </select>
                        <select class="js-select-basic-singles input-tabla-reporte <?php echo ($keypegadora == 0 ? 'cambiar_aux_todo_el_reporte' : ''); ?>" id="" role="codigo_auxiliar3" name="<?= $value->ID ?>">
                            <option value=""><?= $value->codigo_auxiliar3 ?></option>
                            <option value="">Ninguno</option>
                            <?php foreach ($auxiliares as $key => $aux) { ?>
                                <option value="<?= $aux->codigo_operador ?>">
                                    <?= $aux->codigo_operador ?>-<?= $aux->nombre_operador ?>
                                </option>
                            <?php } ?>

                        </select>
                        <select class="js-select-basic-singles input-tabla-reporte <?php echo ($keypegadora == 0 ? 'cambiar_aux_todo_el_reporte' : ''); ?>" id="" role="codigo_auxiliar4" name="<?= $value->ID ?>">
                            <option value=""><?= $value->codigo_auxiliar4 ?></option>
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
                    <td style="height: 20px; font-size:8pt;">
                        alto
                        <input type="text" class="form-control input-tabla-reporte solo_numeros" role="alto" name="<?= $value->ID ?>" value="<?= $value->alto ?>" placeholder="">
                        ancho
                        <input type="text" class="form-control input-tabla-reporte solo_numeros" role="ancho" name="<?= $value->ID ?>" value="<?= $value->ancho ?>" placeholder="">
                        TIpo de cierre
                        <select class="js-select-basic-singles input-tabla-reporte" id="" role="codigo_auxiliar2" name="<?= $value->ID ?>">
                            <option value=""><?= $value->tipo_cierre ?></option>
                            <option value="">Ninguno</option>
                            <?php foreach ($cierres as $key => $val) { ?>
                                <option value="<?= $val->codigo ?>">
                                    <?= $val->codigo ?>-<?= $val->nombre ?>
                                </option>
                            <?php } ?>
                        </select>
                        ud.corrugado
                        <input type="text" class="form-control input-tabla-reporte solo_numeros" role="sobrante" name="<?= $value->ID ?>" value="<?= $value->und_corrugado ?>" placeholder="">
                    </td>
                    <td>
                        <textarea style="width: 140px;height: 183px;" class="form-control input-tabla-reporte" name="<?= $value->ID ?>" role="observaciones" name=""><?= $value->observaciones ?></textarea>
                    </td>
                </tr>
            <?php } ?>

        </tbody>


    </table>
</div>


<link rel="stylesheet" href="<?php echo base_url("resources/app/Reportes/Consulta_general_de_reportes/css/consulta_reporte_general.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("resources/app/Reportes/Consulta_general_de_reportes/css/reportes.css"); ?>">
<style>
    .myFont {
        font-size: 8pt;
    }
</style>

<script type="text/javascript">
    var url_analizada = /^(\w+):\/\/([^\/]+)([^]+)$/.exec(window.location);
    var parametros = url_analizada[3].split('/') //OBTENEMOS LOS PARAMETROS MAS IMPORTANTE [CODIGO_REPORTE,TIPO_REPORTE,CODIGO_MAQUINA]
</script>
<script src="<?php echo base_url("resources/app/Reportes/Consulta_general_de_reportes/js/reportes/trello.js"); ?>"></script>
<script src="<?php echo base_url("resources/app/Reportes/Consulta_general_de_reportes/js/reporte_pegadoras/show_pegadora.js"); ?>"></script>
<script src="<?php echo base_url("resources/app/Reportes/Consulta_general_de_reportes/js/reporte_pegadoras/create_pegadora.js"); ?>"></script>
<script src="<?php echo base_url("resources/app/Reportes/Consulta_general_de_reportes/js/reporte_pegadoras/update_pegadora.js"); ?>"></script>
<script src="<?php echo base_url("resources/app/Reportes/Consulta_general_de_reportes/js/reportes/otros.js"); ?>"></script>