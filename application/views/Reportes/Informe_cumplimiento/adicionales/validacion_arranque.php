<?php foreach ($validacion_arranque as $key => $value) { ?>
    <div style="margin-left: 70px;margin-right: -65px; border-style: solid 5px black;">
        <div style="margin-left: 240px;">
            <label for="fecha" style="font-size: 12px;">Fecha</label>
            <input disabled type="date" name="fecha" id="fecha" style="font-size: 12px;border: none; border-bottom: 1px solid black;" value="<?= $value->fecha ?>">
        </div>
        <br>
        <div class="row">
            <div class="col-5 mb-2">
                <label for="cliente" style="font-size: 12px;float:left;margin-top: 5px;padding-right: 19px;">Cliente:</label>
                <input disabled type="text" style="float: left;width:71%;border: none; border-bottom: 1px solid black; font-size: 10pt;" name="cliente" id="cliente" value="<?= $value->cliente ?>">
            </div>
            <div class="col-5">
                <label for="cliente" style="font-size: 12px;float:left;margin-top: 5px;padding-right: 19px;font-size: 10px;margin-top: 6px;">Producto:</label>
                <input disabled type="text" style="width: 73%;border: none; border-bottom: 1px solid black; font-size: 10pt;" name="producto" id="producto" value="<?= $value->producto ?>">
            </div>
            <div class="col-5 mb-2">
                <label for="maquina" style="font-size: 12px;float:left;margin-top: 5px;padding-right: 10px;">Maquina:</label>
                <input disabled type="text" style="float: left;width:71%;border: none; border-bottom: 1px solid black; font-size: 10pt;" name="maquina" id="maquina" value="<?= $value->maquina ?>">
            </div>
            <div class="col-5">
                <label for="ot" style="font-size: 12px;float:left;margin-top: 5px;padding-right: 57px;">OT:</label>
                <input disabled type="text" style="width:72%;border: none; border-bottom: 1px solid black; font-size: 10pt;" name="ot" id="ot" value="<?= $value->ot ?>">
            </div>
            <div class="col-5">
                <label for="operador" style="font-size: 12px;float:left;margin-top: 5px;padding-right: 6px;">Operador:</label>
                <input disabled type="text" style="float: left;width:71%;border: none; border-bottom: 1px solid black; font-size: 10pt;" name="operador" id="operador" value="<?= $value->operador ?>">
            </div>
            <div class="col-5">
                <label for="supervisor" style="font-size: 12px;float:left;margin-top: 5px;padding-right: 6px;">supervisor:</label>
                <input disabled type="text" style="float: left;width:71%;border: none; border-bottom: 1px solid black; font-size: 10pt;" name="supervisor" id="supervisor" value="<?= $value->supervisor ?>">
            </div>
            <div class="col-5">
                <label for="turno" style="font-size: 12px;float:left;margin-top: 5px;padding-right: 10px;">Turno:</label>
                <span class="float-end" id="dif">
                    <input disabled class="form-check-input disabled input disableds_validacion_arranque" <?php echo ($value->turno == "dia" ? 'checked' : '') ?> type="radio">
                    <label class="form-check-label" for="dia">Dia</label>
                    <input disabled class="form-check-input disabled input disableds_validacion_arranque" <?php echo ($value->turno == "noche" ? 'checked' : '') ?> type="radio">
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
                <tbody id="<?= $value->id ?>">
                    <script>
                        $.ajax({
                            type: "POST",
                            url: "Informe_cumplimiento/get_contenido_validacion_arranque2",
                            data: {
                                id_validacion: <?= $value->id ?>
                            },
                            success: function(response) {
                                $("tbody#<?= $value->id ?>").append(response);
                            }
                        });
                    </script>
                </tbody>
            </table>
        </div>

        <label for="barniz">Barniz utilizado:</label>
        <input disabled type="text" class="input disableds_validacion_arranque" style="width:65%;border: none; border-bottom: 1px solid black" name="" role="barniz" id="barniz" value="<?= $value->barniz ?>">
        <br>
        <label for="barniz">Observaciones:</label>
        <input disabled type="text" class="input disableds_validacion_arranque" style="width:65%;border: none; border-bottom: 1px solid black" name="" role="observaciones" id="observaciones" value="<?= $value->observaciones ?>">
        <div style="margin-top:20px">
            <div class="row">

                <div class="col-5">
                    <label for="encargado_calidad" style="font-size: 12px;float:left;margin-top: 5px;padding-right: 6px;">Calidad:</label>
                    <input disabled readonly="" type="text" style="float: left;width:60%;border: none; border-bottom: 1px solid black; font-size: 10pt;" value="<?= $value->encargado_calidad ?>">
                </div>
                <div class="col-5">
                    <label for="operador" style="font-size: 12px;float:left;margin-top: 5px;padding-right: 6px;">Operador:</label>
                    <input disabled readonly="" type="text" style="float: left;width:60%;border: none; border-bottom: 1px solid black; font-size: 10pt;" value="<?= $value->operador ?>">
                </div>
            </div>
        </div>
    </div>
    <br>
    <?php if (count($validacion_arranque) > 1) { ?>
        <br>
        <div style="width: 764px;border-bottom: 2px dotted black;"></div> <!-- Este div pondra una marca como esta  - - - - - - - - - -->
        <br>
    <?php } ?>

<?php } ?>