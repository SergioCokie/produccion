<style>
    table thead th {
        font-weight: bold;
    }
</style>
<button type="button" id="agregar_1" role="<?= $contenido_producto_terminado[0]->id_producto ?>" <?php echo ($contenido_producto_terminado[0]->estado == "Transferido" ? 'disabled' : ($contenido_producto_terminado[0]->estado == "Aprobado" ? 'disabled' : '')) ?> style="float: right;margin-right:-67px;margin-top:10px; font-size: 25px; padding: 0 10px; border: 0; background-color: transparent;" class="agregar-tintas"><span type="button" data-toggle="tooltip" data-placement="right" title="AGREGAR CONTENIDO">+</span></button>

<table id="crear-procucto">
    <thead>
        <th id="numero_fila">#</th>
        <th id="cantidad">Cantidad</th>
        <th id="trello" colspan="2">ID Trello</th>
        <th id="maquina">Maquina</th>
        <th id="codigo_producto">Cod. producto</th>
        <th id="descripcion-trello" style="width:275px">Descripcion Trello</th>
        <th id="producto" style="width: 144px;">Producto</th>
    </thead>
    <tbody id="contenido">
        <?php foreach ($contenido_producto_terminado as $key => $values) { ?>
            <?php if ($this->session->userdata("id_rol") == 1) { ?>
                <tr id="contenido">
                    <td id="numero_fila" name="numero_fila" contenteditable="false" style="background-color: transparent;"><?= $values->numero_fila ?></td>
                    <td id="cantidad" name="cantidad" contenteditable="false" style="background-color: transparent;">
                        <input type="text" class="w-100 producto_terminado_contenido_cantidad pintado" style="background-color:transparent;border:none;height:38px;text-align:center" value="<?= $values->cantidad ?>" id="cantidad" name="<?= $values->id ?>" placeholder="Sin comas">
                    </td>
                    <td colspan="2" id="trello" name="<?= $values->cantidad ?>" class="pintado producto_terminado_contenido" contenteditable="true" style="background-color: transparent;"><?= $values->id_trello ?></td>
                    <td id="maquina" contenteditable="false" style="background-color: transparent;">
                        <select class="js-select-basic-single-pt-modal select_maquina" id="" name="<?= $values->id ?>" style="font-size: 8pt;width: 100%">
                            <!-- MAQUINA -->
                            <option value="">Maquinas</option>
                            <?php foreach ($maquinas as $key => $value) { ?>
                                <option value="<?= $value->codigo_maquina ?>" <?php echo ($value->codigo_maquina == $values->maquina) ? 'selected' : ' '; ?>> <?= $value->codigo_maquina ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td id="codigo_producto" name="codigo_producto" contenteditable="false" style="background-color: transparent;">
                        <input type="text" class="w-100 producto_terminado_contenido_codigo " style="background-color:transparent;border:none;height:38px;text-align:center" value="<?= $values->codigo_producto ?>" id="codigo_producto" name="<?= $values->id ?>" placeholder="">
                    </td>
                    <td id="descripcion_trello" name="descripcion_trello" class="" contenteditable="false" style="background-color: transparent;">
                        <?= $values->descripcion_trello ?>
                    </td>
                    <td id="producto" name="producto" class="value_per_visit" contenteditable="false" style="background-color: transparent;">
                        <textarea id="producto" name="<?= $values->id ?>" class="pintado textarea_contenido" style="background-color: transparent;text-align:center;height:140px; padding: 10px"><?= $values->producto ?></textarea>
                    </td>
                </tr>
            <?php } else { ?>
                <tr id="contenido">
                    <td id="cantidad" name="cantidad" contenteditable="false" style="background-color: transparent;">
                        <input type="text" <?php echo ($values->estado == "Transferido" ? 'disabled' : ($values->estado == "Aprobado" ? 'disabled' : '')) ?> class="w-100 producto_terminado_contenido_cantidad pintado" style="background-color:transparent;border:none;height:38px;text-align:center" value="<?= $values->cantidad ?>" id="cantidad" name="<?= $values->id ?>" placeholder="Sin comas">
                    </td>
                    <td id="trello" name="<?= $values->cantidad ?>" <?php echo ($values->estado == "Transferido" ? 'disabled' : ($values->estado == "Aprobado" ? 'disabled' : '')) ?> class="pintado producto_terminado_contenido" contenteditable="true" style="background-color: transparent;"><?= $values->id_trello ?></td>
                    <td id="maquina" class="pintado" contenteditable="false" style="background-color: transparent;">
                        <select class="js-select-basic-single-pt-modal select_maquina" id="" <?php echo ($values->estado == "Transferido" ? 'disabled' : ($values->estado == "Aprobado" ? 'disabled' : '')) ?> name="<?= $values->id ?>" style="font-size: 8pt;width: 100%">
                            <!-- MAQUINA -->
                            <option value="">Maquinas</option>
                            <?php foreach ($maquinas as $key => $value) { ?>
                                <option value="<?= $value->codigo_maquina ?>" <?php echo ($value->codigo_maquina == $values->maquina) ? 'selected' : ' '; ?>> <?= $value->codigo_maquina ?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td id="codigo_producto" name="codigo_producto" contenteditable="false" style="background-color: transparent;">
                        <input type="text" <?php echo ($values->estado == "Transferido" ? 'disabled' : ($values->estado == "Aprobado" ? 'disabled' : '')) ?> class="w-100 producto_terminado_contenido_codigo" style="background-color:transparent;border:none;height:38px;text-align:center" value="<?= $values->codigo_producto ?>" id="codigo_producto" name="<?= $values->id ?>" placeholder="">
                    </td>
                    <td id="descripcion_trello" name="descripcion_trello" class="" contenteditable="false" style="background-color: transparent;">
                        <?= $values->descripcion_trello ?>
                    </td>
                    <td id="producto" name="producto" class="value_per_visit" contenteditable="false" style="background-color: transparent;">
                        <textarea id="producto" name="<?= $values->id ?>" <?php echo ($values->estado == "Transferido" ? 'disabled' : ($values->estado == "Aprobado" ? 'disabled' : '')) ?> class="pintado textarea_contenido" style="background-color: transparent;text-align:center;height:140px; padding: 10px"><?= $values->producto ?></textarea>
                    </td>
                </tr>
            <?php  } ?>

        <?php } ?>
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" contenteditable="false" style="padding: 7px 0 ;">Área que Entrega</td>
            <td colspan="6" contenteditable="false" style="padding: 7px 0 ;">Detalle</td>
        </tr>
        <tr>
            <td colspan="2" name="" id="">
                <?php if ($this->session->userdata("id_rol") == 1) { ?>
                    <select class="js-select-basic-single-pt-modal areas" id="area_entrega" name="<?= $contenido_producto_terminado[0]->id_producto ?>" style="font-size: 8pt;">
                        <!-- AREA QUE ENTREGA -->
                        <option value="">Entrega</option>
                        <?php foreach ($areas as $key => $value) { ?>
                            <option value="<?= $value->nombre ?>" <?php echo ($producto_terminado[0]->area_entrega == $value->nombre) ? 'selected' : ' '; ?>> <?= $value->nombre ?></option>
                        <?php } ?>
                    </select>
                <?php } else { ?>
                    <select class="js-select-basic-single-pt-modal areas" id="area_entrega" name="<?= $contenido_producto_terminado[0]->id_producto ?>" <?php echo ($contenido_producto_terminado[0]->estado == "Transferido" ? 'disabled' : ($contenido_producto_terminado[0]->estado == "Aprobado" ? 'disabled' : '')) ?> style="font-size: 8pt;">
                        <!-- AREA QUE ENTREGA -->
                        <option value="">Entrega</option>
                        <?php foreach ($areas as $key => $value) { ?>
                            <option value="<?= $value->nombre ?>" <?php echo ($producto_terminado[0]->area_entrega == $value->nombre) ? 'selected' : ' '; ?>> <?= $value->nombre ?></option>
                            <?php } ?>xml_error_string
                    </select>
                <?php } ?>
            </td>
            <td colspan="" contenteditable="false">#</td>
            <td colspan="2" contenteditable="false">Bultos</td>
            <td contenteditable="false" colspan="1">Peso</td>
            <td contenteditable="false" colspan="2">Comentario</td>
        </tr>
    </tbody>
    <tbody id="detalle">
        <tr>
            <td colspan="2" contenteditable="false" id="first_detalle" rowspan="<?= count($detalle_producto_terminado) + 1 ?>">Área que Recibe</td>
        </tr>
        <?php foreach ($detalle_producto_terminado as $llave_detalle => $value) { ?>

            <tr id="<?= $value->id ?>">

                <td><?= $value->numero_fila ?></td>

                <td colspan="2" class="pintado td_bulto" contenteditable="false" style="background-color: transparent;" id="td_bulto">
                    <?php if ($this->session->userdata("id_rol") == 1) { ?>
                        <button type="button" id="" value="<?= $value->id ?>" style="float: right;margin-right: -537px;margin-top: 9px;padding: 0 6px;border: 0; background-color: transparent;" class="agregar_especificaiones"><span type="button" data-toggle="tooltip" data-placement="right" style="font-size: 25px;" title="AGREGAR ESPECIFICACIONES DE DETALLE">+</span></button>
                    <?php } else { ?>
                        <button type="button" id="" <?php echo ($contenido_producto_terminado[0]->estado == "Transferido" ? 'disabled' : ($contenido_producto_terminado[0]->estado == "Aprobado" ? 'disabled' : '')) ?> value="<?= $value->id ?>" style="float: right;margin-right: -537px;margin-top: 9px;padding: 0 6px;border: 0; background-color: transparent;" class="agregar_especificaiones"><span type="button" data-toggle="tooltip" data-placement="right" style="font-size: 25px;" title="AGREGAR ESPECIFICACIONES DE DETALLE">+</span></button>
                    <?php } ?>
                </td>

                <td colspan="1" class="pintado td_peso" contenteditable="false" style="background-color: transparent;" id="td_peso">

                </td>
                <td colspan="2" class="pintado td_comentario" contenteditable="false" style="background-color: transparent;" id="td_comentario">

                </td>
            </tr>

        <?php } ?>
    </tbody>

    <tbody>
        <tr>
            <td colspan="2">
                <?php if ($this->session->userdata("id_rol") == 1) { ?>
                    <select class="js-select-basic-single-pt-modal areas" id="area_recibe" name="<?= $contenido_producto_terminado[0]->id_producto ?>">
                        <option value="">Recibe</option>
                        <?php
                        $area_e = array(2 => "Logística", 3  => "Bodega");
                        foreach ($area_e as $key => $value) { ?>
                            <option value="<?= $value ?>" <?php echo ($producto_terminado[0]->area_recibe == $value) ? 'selected' : ' '; ?>><?= $value ?></option>
                        <?php } ?>
                    </select>
                <?php } else { ?>
                    <select class="js-select-basic-single-pt-modal areas" id="area_recibe" <?php echo ($contenido_producto_terminado[0]->estado == "Transferido" ? 'disabled' : ($contenido_producto_terminado[0]->estado == "Aprobado" ? 'disabled' : '')) ?> name="<?= $contenido_producto_terminado[0]->id_producto ?>">
                        <option value="">Recibe</option>
                        <?php
                        $area_e = array(2 => "Logística", 3  => "Bodega");
                        foreach ($area_e as $key => $value) { ?>
                            <option value="<?= $value ?>" <?php echo ($producto_terminado[0]->area_recibe == $value) ? 'selected' : ' '; ?>><?= $value ?></option>
                        <?php } ?>
                    </select>
                <?php } ?>
            </td>
            <td colspan="6" contenteditable="false"></td>
        </tr>
        <tr id="esconder">
            <td contenteditable="false"></td>
            <td colspan="4" contenteditable="false"></td>
        </tr>
        <tr>
            <?php if ($this->session->userdata("id_rol") == 1) { ?>
                <td colspan="2" style="padding: 10px;" contenteditable="false">Número de entrega:</td>
                <td name="numero_entrega" colspan="6" class="value_per_visit" contenteditable="false" style="padding: 10px;background-color: transparent;">
                    <textarea style="padding: 0 0;font-size: 10pt; width: 500px; background-color: transparent; text-align: center;" name="<?= $contenido_producto_terminado[0]->id_producto ?>" id="numero_entrega" cols="30" rows="3" class="pintado text_area_inputs" style="background-color: transparent;"><?= $contenido_producto_terminado[0]->numero_entrega ?></textarea>
                </td>
            <?php } else { ?>
                <td style="padding: 10px;" contenteditable="false">Número de entrega:</td>
                <td name="numero_entrega" colspan="6" class="value_per_visit" contenteditable="false" style="padding: 10px;background-color: transparent;">
                    <textarea <?php echo ($contenido_producto_terminado[0]->estado == "Transferido" ? 'disabled' : ($contenido_producto_terminado[0]->estado == "Aprobado" ? 'disabled' : '')) ?> style="padding: 0 0;font-size: 10pt; width: 500px; background-color: transparent; text-align: center;" name="<?= $contenido_producto_terminado[0]->id_producto ?>" id="numero_entrega" cols="30" rows="3" class="pintado text_area_inputs" style="background-color: transparent;"><?= $contenido_producto_terminado[0]->numero_entrega ?></textarea>
                </td>

            <?php } ?>
        </tr>
    </tbody>
</table>

<!-- MOSTRANDO DATOS ANTERIORES DE LA TABLA DE DETALLE -->
<?php if (!empty($detalle_producto_terminado[0]->detalle_bultos)) { ?>
    <table>
        <tbody id="detalle">
            <thead>
                <tr>
                    <th colspan="6">
                        DATOS ANTERIORES (DETALLES)
                    </th>
                </tr>
                <tr>
                    <th colspan="3">
                        BULTOS
                    </th>
                    <th colspan="3">
                        PESO
                    </th>
                </tr>
            </thead>
            <?php foreach ($detalle_producto_terminado as $key => $value) { ?>
                <tr>
                    <td colspan="3" contenteditable="false">
                        <textarea disabled id="detalle_bultos" cols="30" rows="3" class="textarea_detalle" style="background-color: #9f78d794;"><?= $value->detalle_bultos ?></textarea>
                    </td>
                    <td colspan="3" ontenteditable="false">
                        <textarea disabled id="detalle_peso" cols="30" rows="3" class="textarea_detalle" style="background-color: #9f78d794;"><?= $value->detalle_peso ?></textarea>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>



<!-- <button type="button" id="agregar_2" <?php echo ($contenido_producto_terminado[0]->estado == "Transferido" ? 'disabled' : ($contenido_producto_terminado[0]->estado == "Aprobado" ? 'disabled' : '')) ?> role="<?= $contenido_producto_terminado[0]->id_producto ?>" style="float: right;margin-right:-67px;margin-top:-198px; font-size: 25px; padding: 0 10px; border: 0; background-color: transparent;" class="gregar-tintas"><span type="button" data-toggle="tooltip" data-placement="right" title="AGREGAR DETALLE">+</span></button>
 -->
<script>
    $('.js-select-basic-single-pt-modal').select2({
        width: 'resolve',
        dropdownAutoWidth: true,
        theme: "bootstrap4",
        dropdownCssClass: "myFont",
    });
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>