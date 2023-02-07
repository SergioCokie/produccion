<tr id="<?php echo $ultimo_insert_detalle ?>">

    <td><?php echo $numero_fila ?></td>
    <td colspan="2" class="pintado td_bulto" contenteditable="false" style="background-color: transparent;" id="td_bulto">
        <div style="width: auto;border-bottom: #1c2aa545  1px solid;">
            <button type="button" id="" value="<?php echo $ultimo_insert_detalle ?>" style="float: right;margin-right: -537px;margin-top: 9px;padding: 0 6px;border: 0; background-color: transparent;" class="agregar_especificaiones"><span type="button" style="font-size: 25px;" data-toggle="tooltip" data-placement="right" title="AGREGAR ESPECIFICACIONES DE DETALLE">+</span></button>

            <input type="text" class="w-25 especificacion_detalle pintado" style="background-color:transparent;border:none;height:38px;text-align:right" value="" id="cantidad_bultos" name="<?php echo $ultimo_especificaciones_detalle ?>" placeholder="0">
            X
            <input type="text" class="w-25 especificacion_detalle pintado" style="background-color:transparent;border:none;height:38px;text-align:left" value="" id="cantidad_cajas" name="<?php echo $ultimo_especificaciones_detalle ?>" placeholder="0">
            <input type="text" class="w-25 especificacion_detalle pintado" style="background-color:transparent;border:none;height:38px;" value="" id="tipo_unidad" name="<?php echo $ultimo_especificaciones_detalle ?>" placeholder="Unidad">
        </div>
    </td>

    <td colspan="1" class="pintado td_peso" contenteditable="false" style="background-color: transparent;" id="td_peso">
        <div style="width: auto;border-bottom: #1c2aa545  1px solid;">
            <input type="text" class="w-25 especificacion_detalle pintado" style="background-color:transparent;border:none;height:38px;text-align:center" value="" id="peso" name="<?php echo $ultimo_especificaciones_detalle ?>" placeholder="00"> Kg
        </div>
    </td>
    <td colspan="2" class="pintado td_comentario" contenteditable="false" style="background-color: transparent;" id="td_comentario">
        <div style="width: auto;border-bottom: #1c2aa545  1px solid;">
            <input type="text" class="w-100 especificacion_detalle pintado" style="background-color:transparent;border:none;height:38px;text-align:center" value="" id="comentario" name="<?php echo $ultimo_especificaciones_detalle ?>" placeholder="Comentario">
        </div>
    </td>
</tr>