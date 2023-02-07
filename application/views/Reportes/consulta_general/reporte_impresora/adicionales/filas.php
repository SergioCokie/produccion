<tr id="">
    <td>
        <input type="text" class="form-control single-input input-tabla-reporte" id="hora_inicial"  placeholder="">
    </td>
    <td>
        <input type="text" class="form-control input-tabla-reporte" id="hora_final"  placeholder="">
    </td>
    <td>
        <input type="text" class="form-control input-tabla-reporte" id="dif_tiempo"   placeholder="">
    </td>
    <td>
        <input type="text" class="form-control input-tabla-reporte" id="id_trello"   placeholder="">
    </td>
    <td>
        <input type="text" class="form-control input-tabla-reporte" id="lista_trello"  placeholder="">
    </td>
    <td>
        <input type="text" class="form-control  input-tabla-reporte" id="ot_trello"  placeholder="">
    </td>
    <td>
        <textarea class="form-control input-tabla-reporte"  id="descripcion_trello"></textarea>
    </td>
    <td>
        <input type="text" class="form-control input-tabla-reporte" id="cliente"  placeholder="">
    </td>
    <td style="height: 20px; font-size:8pt;">
        <!-- Operaciones impretas -->
        <select class="js-select-basic-singles" id="" name="">
       <?php foreach ($operaciones as $key => $op) { ?>
                <option value="<?= $op->codigo_operaciones ?>">
                    <?= $op->codigo_operaciones ?>-<?= $op->operacion ?>
                </option>
            <?php } ?>

        </select>
    </td>
    <td style="height: 20px; font-size:8pt;">
        <select class="js-select-basic-singles" id="" name="">
            <?php
            $tipo_retiro = array("0" =>  "", "1" =>  "T", "2" => "R");
            foreach ($tipo_retiro as $key => $tr) { ?>
                <option value="<?= $tr ?>">
                    <?= $tr ?>
                </option>
            <?php } ?>
        </select>
    </td>
    <td>
        <input type="text" class="form-control input-tabla-reporte" id=""  placeholder="">
    </td>
    <td>
        <input type="text" class="form-control input-tabla-reporte" id=""  placeholder="">
    </td>
    <td>
        <input type="text" class="form-control input-tabla-reporte" id=""  placeholder="">
    </td>
    <td style="height: 20px; font-size:8pt;">
        <select class="js-select-basic-singles" id="" name="">
           
            <?php foreach ($auxiliares as $key => $aux) { ?>
                <option value="<?= $aux->codigo_operador ?>">
                    <?= $aux->codigo_operador ?>-<?= $aux->nombre_operador ?>
                </option>
            <?php } ?>

        </select>
    </td>
    <td>
        <input type="text" class="form-control input-tabla-reporte" id=""  placeholder="">
    </td>
    <td>
        <textarea class="form-control input-tabla-reporte" name="" id="" name=""></textarea>
    </td>
</tr>
<script type="text/javascript">
    $('.js-select-basic-singles').select2({
        width: 'resolve',
        dropdownAutoWidth: true,
        theme: "bootstrap4",
        dropdownCssClass: "myFont",
    });

    $('.single-input').clockpicker({
        placement: 'right',
        align: 'right',
        autoclose: true,
        default: '00:00',
        donetext: 'Hecho'

    });
</script>