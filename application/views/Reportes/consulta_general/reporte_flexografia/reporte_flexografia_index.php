<div class="table-responsive">
    <table id="tabla_flexografia" class="table hover display responsive nowrap text-center p-0 mt-2 tablas_sistema" style="width:100% ">
        <thead class="thead-light">
            <tr>
                <th rowspan="3" style="font-size: 7pt; padding: 4px">HORA INICIO</th>
                <th rowspan="3" style="font-size: 7pt; padding: 4px">HORA FINAL</th>
                <th rowspan="3" style="font-size: 7pt; padding: 4px">TIEMPO <br>HH:MM:SS</th>
                <th rowspan="3" style="font-size: 7pt; padding: 4px">ID TRELLO</th>
                <th rowspan="3" style="font-size: 7pt; padding: 4px">LISTA TRELLO</th>
                <th rowspan="3" style="font-size: 7pt; padding: 4px">OT</th>
                <th rowspan="3" style="font-size: 7pt; padding: 4px">DESCRIPCION TRELLO</th>
                <th rowspan="3" style="font-size: 7pt; padding: 4px">CLIENTE</th>
                <th style="width: 10px;font-size: 7pt; padding: 4px" rowspan="3">C.O</th>
                <th rowspan="3" style="font-size: 7pt;padding: 4px">MATERIAL</th>
                <th rowspan="3" style="border-radius: 0px !important;font-size: 7pt;padding: 4px">ANCHO DE BOBINA</th>
            </tr>
            <tr style="border: #1F3558;">
                <th colspan="2" style="border-radius: 0px !important;font-size: 7pt;padding: 4px;">Producción (metros)</th>
                <th colspan="2" style="font-size: 7pt;padding: 4px;">Producción (unidades)</th>
                <th style="width: 10px;font-size: 7pt;padding: 4px" rowspan="3">COD. AUXILIAR</th>
                <th rowspan="3" style="font-size: 7pt; padding: 4px">OBSERVACIONES</th>
            </tr>
            <tr>
                <th style="border-radius: 0px !important;font-size: 7pt; padding: 4px">CANT. AJUSTE</th>
                <th style="font-size: 7pt;padding: 4px">CANT. PRODUCCION</th>
                <th style="font-size: 7pt;padding: 4px">CANT. SOLICITADA</th>
                <th style="border-radius: 0px !important;font-size: 7pt; padding: 4px"> CANT. PRODUCIDA</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($control_de_trabajo as $keyflexo => $value) { ?>
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
                        <?php echo $value->nombre_operacion ?>
                    </td>
                    <td style="height: 20px; font-size:8pt;">
                        <select class="js-select-basic-singles input-tabla-reporte to_validacion_de_arranque" id="" role="material" name="<?= $value->ID ?>">
                            <option value="<?= $value->material ?>"><?= $value->material ?></option>
                            <?php foreach ($material_flexografia as $key => $mat) { ?>
                                <option value="<?= $mat->id ?>">
                                    <?= $mat->id ?>-<?= $mat->nombre ?>
                                </option>
                            <?php } ?>
                        </select>
                        <?php echo $value->material_nombre ?>
                    </td>
                    <td>
                        <input type="text" class="form-control input-tabla-reporte solo_numeros" role="ancho_bobina" name="<?= $value->ID ?>" value="<?= $value->ancho_bobina ?>" placeholder="">
                    </td>
                    <td>
                        <input type="text" class="form-control input-tabla-reporte solo_numeros" role="cantidad_ajuste" name="<?= $value->ID ?>" value="<?= $value->cantidad_ajuste ?>" placeholder="">
                    </td>
                    <td>
                        <input type="text" class="form-control input-tabla-reporte solo_numeros input_acualizar_velocidades" role="cantidad_produccion" name="<?= $value->ID ?>" value="<?= $value->cantidad_produccion ?>" placeholder="">
                    </td>
                    <td>
                        <input type="text" class="form-control input-tabla-reporte solo_numeros" role="cantidad_solicitada" name="<?= $value->ID ?>" value="<?= $value->cantidad_solicitada ?>" placeholder="">
                    </td>
                    <td style="height: 20px; font-size:8pt;">
                        <input type="text" class="form-control input-tabla-reporte solo_numeros" role="cantidad_producida" name="<?= $value->ID ?>" value="<?= $value->cantidad_producida ?>" placeholder="">
                    </td>
                    <td style="height: 20px; font-size:8pt;">
                        <select class="js-select-basic-singles input-tabla-reporte <?php echo ($keyflexo == 0 ? 'cambiar_aux_todo_el_reporte' : ''); ?>" id="" role="codigo_auxiliar1" name="<?= $value->ID ?>">
                            <option value=""><?= $value->codigo_auxiliar1 ?></option>
                            <option value="">Ninguno</option>
                            <?php foreach ($auxiliares as $key => $aux) { ?>
                                <option value="<?= $aux->codigo_operador ?>">
                                    <?= $aux->codigo_operador ?>-<?= $aux->nombre_operador ?>
                                </option>
                            <?php } ?>
                        </select>
                        <select class="js-select-basic-singles input-tabla-reporte <?php echo ($keyflexo == 0 ? 'cambiar_aux_todo_el_reporte' : ''); ?>" id="" role="codigo_auxiliar2" name="<?= $value->ID ?>">
                            <option value=""><?= $value->codigo_auxiliar2 ?></option>
                            <option value="">Ninguno</option>
                            <?php foreach ($auxiliares as $key => $aux) { ?>
                                <option value="<?= $aux->codigo_operador ?>">
                                    <?= $aux->codigo_operador ?>-<?= $aux->nombre_operador ?>
                                </option>
                            <?php } ?>

                        </select>
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
<script src="<?php echo base_url("resources/app/Reportes/Consulta_general_de_reportes/js/reporte_flexografia/show_flexografia.js"); ?>"></script>
<script src="<?php echo base_url("resources/app/Reportes/Consulta_general_de_reportes/js/reporte_flexografia/update_flexografia.js"); ?>"></script>
<script src="<?php echo base_url("resources/app/Reportes/Consulta_general_de_reportes/js/reporte_flexografia/create_flexografia.js"); ?>"></script>
<script src="<?php echo base_url("resources/app/Reportes/Consulta_general_de_reportes/js/reportes/trello.js"); ?>"></script>
<script src="<?php echo base_url("resources/app/Reportes/Consulta_general_de_reportes/js/reportes/otros.js"); ?>"></script>