<tr id="contenido">
    <td id="numero_fila" name="numero_fila" contenteditable="false" style="background-color: transparent;"><?php echo $numero_fila ?></td>

    <td id="cantidad" name="cantidad" class=" " contenteditable="false" style="background-color: transparent;">
        <input type="text" class="w-100 producto_terminado_contenido_cantidad pintado" style="background-color:transparent;border:none;height:38px;text-align:center" value="" id="cantidad" name="<?php echo $ultimo_insert_contenido ?>" placeholder="Sin comas">
    </td>
    <td colspan="2" id="trello" name="id_trello" class="pintado" contenteditable="true" style="background-color: transparent;"></td>
    <td id="maquina" contenteditable="false" style="background-color: transparent;">
        <select class="js-select-basic-single-pt select_maquina" id="" name="<?php echo $ultimo_insert_contenido ?>" style="font-size: 8pt;width: 100%">
            <option value="">Maquinas</option>
            <?php foreach ($maquinas as $key => $value) { ?>
                <option value="<?= $value->codigo_maquina ?>"> <?= $value->codigo_maquina ?></option>
            <?php } ?>
        </select>
    </td>
    <td id="codigo_producto" name="codigo_producto" contenteditable="false" style="background-color: transparent;">
        <input type="text" class="w-100 producto_terminado_contenido_codigo" style="background-color:transparent;border:none;height:38px;text-align:center" value="" id="codigo_producto" name="<?php echo $ultimo_insert_contenido ?>" placeholder="">
    </td>
    <td id="descripcion_trello" name="descripcion_trello" contenteditable="false" style="background-color: transparent;">
        <!-- <textarea readonly name=""  id="descripcion_trello" class="pintado" style="background-color: transparent;text-align:center;height:140px;"></textarea> -->
    </td>
    <td id="producto" name="producto" class="pintado value_per_visit" contenteditable="false" style="background-color: transparent;">
        <textarea name="<?php echo $ultimo_insert_contenido ?>" id="producto" class="pintado" style="background-color: transparent;text-align:center;height:140px; padding: 10px"></textarea>
    </td>

</tr>
<script>
    $('.js-select-basic-single-pt').select2({
        width: 'resolve',
        dropdownAutoWidth: true,
        theme: "bootstrap4",
        dropdownCssClass: "myFont",
    });
</script>