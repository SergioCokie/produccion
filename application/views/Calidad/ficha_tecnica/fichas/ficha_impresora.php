<style>
    .ficha-impresora {
        box-sizing: border-box;
        width: 1200px;
        /*border: solid #5B6DCD 10px;*/
        padding: 5px;
    }
</style>
<div class="ficha-impresora mx-auto container" st id="reporteria">
    <div class="row m-0 p-0" id="inicio">
        <div class="col-2">
            <img src="<?php echo base_url("resources/generales/img/logoficha1.jpg"); ?>" class="img-fluid">
        </div>
        <div class="col-7 text-center">
            <div class="row">
                <div class="col-12 ">
                    <h4>RECOLECCION DE INFORMACIÓN</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h4>ESPECIFICA DEL PRODUCTO IMPRESIÓN</h4>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="row">
                <div class="col-12">
                    FECHA DE CREACIÓN: hoy
                </div>
                <div class="col-12">
                    VERSION: <span id="<?php echo $data[0]->version  ?>" class="version_del_doc" style="margin-right: 80px;"><?php echo $data[0]->version  ?></span>
                    FICHA # <span id="<?php echo $data[0]->ID  ?>" class="codigo_del_doc"><?php echo $data[0]->ID  ?></span>
                    <span id="<?php echo $data[0]->estado  ?>" class="estado_ficha"></span>
                </div>
                <div class="col-12">
                    DEPARTAMENTO: CALIDAD
                </div>
                <div class="col-12">
                    CODIGO: F-CC-020-3
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" value="<?php echo $data[0]->ID  ?>" name="ID" id="codigo_ficha">
    <input type="hidden" value="impresora" name="tipo_ficha" id="tipo_ficha">

    <div class="row m-0 p-0 especificaciones" id="especificaciones">
        <div class="col-12" style="margin-bottom: -10px;">
            ESPECIFICACIONES
        </div>
        <div class="row  p-0 mx-auto" id="linea-subida">
            <div class="col-6">
                CLIENTE: <input type="text" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="cliente" value="<?php echo $data[0]->cliente ?>">
            </div>
            <div class="col-6">
                PRODUCTO: <input type="text" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="producto" value="<?php echo $data[0]->producto  ?>">
            </div>
        </div>
        <div class="row  p-0" id="linea-subida">
            <div class="col-4">
                TIPO DE PRODUCTO: <input type="text" class="input_ficha_impresora" style="width: 65%;font-size:10px" name="<?php echo $data[0]->ID ?>" id="tipo_producto" value="<?php echo $data[0]->tipo_producto  ?>">
            </div>
            <div class="col-4">
                FECHA: <input type="date" class="w-50 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="fecha_creacion" value="<?php echo $data[0]->fecha_creacion   ?>">
            </div>
            <div class="col-4">
                COD. PRODUCTO: <input type="text" class="w-50 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="cod_producto" value="<?php echo $data[0]->cod_producto   ?>">
            </div>
        </div>
        <div class="row  p-0" id="linea-subida">
            <div class="col-4">
                OT: <input type="text" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="ot" value="<?php echo $data[0]->ot  ?>">
            </div>
            <div class="col-4">
                MAQUINA: <input type="text" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="maquina" value="<?php echo $data[0]->maquina   ?>">
            </div>
            <div class="col-4">
                OPERARIO: <input type="text" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="operario" value="<?php echo $data[0]->operario   ?>">
            </div>
        </div>
    </div>


    <table class="table w-100 mt-3">
        <tr class="text-center bg-black text-light">
            <td colspan="2" class="border border-light" style="color: white;">ITEM</td>
            <td colspan="2" class="border border-light" style="color: white;">GENERALIDADES</td>
            <td colspan="2" class="border border-light"></td>
        </tr>
        <tr>
            <td class="pintado" colspan="2">TIPO DE MATERIAL</td>
            <td colspan="2"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="generalidad_1" value="<?php echo $data[0]->generalidad_1 ?>"></td>
            <td colspan="2">Sin tolerancia</td>
        </tr>
        <tr>
            <td class="pintado text-center">CALIBRE</td>
            <td class="pintado text-center">MARCA</td>
            <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="generalidad_2" value="<?php echo $data[0]->generalidad_2 ?>"></td>
            <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="generalidad_3" value="<?php echo $data[0]->generalidad_3  ?>"></td>
            <td colspan="2">+/- 0.001 milesima de pulgada</td>
        </tr>

        <tr class="text-center bg-black text-light ">
            <td colspan="2"></td>
            <td colspan="2" style="color:white;">PLANCHAS</td>
            <td colspan="2"></td>
        </tr>

        <tr>
            <td colspan="2" rowspan="6" class="align-middle text-center pintado">QUEMADO DE PLACHAS</td>
        <tr>

            <td colspan="2">Resolución: <input type="text" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="planchas_resolucion" value="<?php echo $data[0]->planchas_resolucion   ?>"></td>
            <td rowspan="5" class="align-middle text-center">
                <b>
                    <p>TIPO DE PLANCHA</p>
                </b>
                <input class="form-check-input" type="radio" name="tipo_plancha" id="tipo_plancha1" role="<?php echo $data[0]->ID ?>" value="NO" <?php echo ($data[0]->tipo_plancha == "NO") ? 'checked="checked"' : ' '; ?>>
                <label class="form-check-label" for="tipo_plancha1">NEGATIVA</label>
                <br>
                <input class="form-check-input " type="radio" name="tipo_plancha" id="tipo_plancha" role="<?php echo $data[0]->ID ?>" value="SI" <?php echo ($data[0]->tipo_plancha == "SI") ? 'checked="checked"' : ' '; ?>>
                <label class="form-check-label" for="tipo_plancha">POSITIVA</label>

            </td>

        </tr>
        <tr>
            <td colspan="2">Familia de tramado: <input type="text" class="w-50 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="planchas_familia" value="<?php echo $data[0]->planchas_familia   ?>"></td>
        </tr>
        <tr>
            <td colspan="2">Forma de punto: <input type="text" class="w-50 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="planchas_forma" value="<?php echo $data[0]->planchas_forma  ?>"></td>
        </tr>
        <tr>
            <td colspan="2">Lineatura/tamaño de punto: <input type="text" class="w-50 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="planchas_lineatura" value="<?php echo $data[0]->planchas_lineatura   ?>"></td>
        </tr>
        <tr>
            <td colspan="2">Curvas: <input type="text" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="planchas_curvas" value="<?php echo $data[0]->planchas_curvas  ?>"></td>

        </tr>

        </tr>

        <tr>
            <td colspan="2" rowspan="3" class="pintado align-middle text-center">
                *COLORES
            </td>
        <tr>

            <td colspan="2"><b>*TIRO:</b> <input type="text" class="input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="colores_tiro" value="<?php echo $data[0]->colores_tiro ?>" style="font-size: 12px;width:85%"></td>
            <td rowspan="2" class="text-center"> <b>*En caso de tener pantone se colocara <br> especificaciones de elaboracion en la parte <br>posterior de la ficha</b></td>
        </tr>
        <tr>
            <td colspan="2"><b>*RETIRO:</b> <input type="text" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="colores_retiro" value="<?php echo $data[0]->colores_retiro  ?>"></td>
        </tr>
        </tr>

        <tr>
            <td colspan="2" class="pintado text-center">**TINTAS (PROVEEDOR)</td>
            <td colspan="2"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="tintas_proveedor" value="<?php echo $data[0]->tintas_proveedor   ?>"></td>
            <td colspan="2" class="text-center"><b>**Los pantones son especificados al reverso.</b></td>

        </tr>



    </table>

    <table class="table w-100" id="tabla-cambios">
        <tr class="text-center bg-black text-light ">
            <td colspan="17" style="padding: 8px; font-size: 8pt; color: white;">ESPECIFICACIONES DE IMPRESIÓN</td>
        </tr>

        <tr class="text-center text-light">
            <td class="pintado m-0 p-0 align-middle" style="padding: 10px;" colspan="4">Maquina</td>

            <td class="pintado m-0 p-0 align-middle" style="padding: 10px; width: 50px;">Plancha</td>

            <td class="pintado m-0 p-0 align-middle" style="padding: 10px;" colspan="4">Maquina</td>

            <td class="pintado m-0 p-0 align-middle" style="padding: 10px; width: 100px;">Plancha</td>

            <td class="pintado m-0 p-0 align-middle" style="padding: 10px;" colspan="7">Maquina</td>
        </tr>


        <style>
            .texto-vertical-3 {
                writing-mode: vertical-lr;
                transform: rotate(180deg);
                padding: 10px;
            }
        </style>
        <tr class="text-center">
            <!-- MAQUINA -->
            <td class="pintado m-0 p-0 align-middle" style="padding: 25px;" rowspan="8"><span class="texto-vertical-3">SECUENCIA DE COLOR</span></td>

            <td colspan="2" rowspan="2" class="pintado" style="width: 200px; padding: 10px;font-size: 5pt;">
                <input class="form-check-input " type="checkbox" name="tiro_paso_1" value="SI" id="tiro_paso_11" role="<?php echo $data[0]->ID ?>" <?php echo ($data[0]->tiro_paso_1 == "SI") ? 'checked="checked"' : ' '; ?>>
                <label class="form-check-label" for="tiro_paso_11" style="color: black;font-size: 7pt">TIRO</label>
                &nbsp;
                &nbsp;
                &nbsp;
                &nbsp;
                &nbsp;
                <input class="form-check-input " type="checkbox" name="paso_1" value="SI" id="paso_11" role="<?php echo $data[0]->ID ?>" <?php echo ($data[0]->paso_1 == "SI") ? 'checked="checked"' : ' '; ?>>
                <label class="form-check-label" for="paso_11" style="color: black;font-size: 7pt">1°PASO</label>
            </td>
            <td class="pintado" rowspan="2" style="padding: 10px;"><span style="font-size: 8pt;">Distr lateral</span></td>
            <!-- PLANCHA -->
            <td class="pintado" rowspan="2" style="width: 100px; padding: 10px;font-size: 5pt;"><span>Angulo<br>de color</span></td>
            <!-- MAQUINA -->
            <td class="pintado" rowspan="2" style="padding: 10px;font-size: 5pt;"><span style="font-size: 8pt;">Presion<br>1</span></td>

            <td colspan="2" rowspan="2" class="pintado" style="width: 200px; padding: 10px;font-size: 5pt;">
                <input class="form-check-input " type="checkbox" name="retiro_paso_2" value="SI" id="retiro_paso_22" role="<?php echo $data[0]->ID ?>" <?php echo ($data[0]->retiro_paso_2 == "SI") ? 'checked="checked"' : ' '; ?>>
                <label class="form-check-label" for="retiro_paso_22" style="color: black;font-size: 7pt">RETIRO</label>
                &nbsp;
                &nbsp;
                &nbsp;
                &nbsp;
                &nbsp;
                <input class="form-check-input " type="checkbox" name="paso_2" value="SI" id="paso_2" role="<?php echo $data[0]->ID ?>" <?php echo ($data[0]->paso_2 == "SI") ? 'checked="checked"' : ' '; ?>>
                <label class="form-check-label" for="paso_2" style="color: black;font-size: 7pt">2°PASO</label>
            </td>
            <td class="pintado" rowspan="2" style="padding: 10px;"><span style="font-size: 8pt;">Distr lateral</span></td>
            <!-- PLANCHA -->
            <td class="pintado" rowspan="2" style="width: 100px; padding: 10px;font-size: 5pt;"><span>Angulo<br>de color</span></td>
            <!-- MAQUINA-->
            <td class="pintado" rowspan="2" style="padding: 10px;font-size: 5pt;"><span style="font-size: 8pt;">Presion<br>2</span></td>

            <td class="pintado" colspan="3" style="font-size: 5pt;padding: 0 10px"><span>Tiro/1°paso</span></td>
            <td class="pintado" colspan="3" style="font-size: 5pt;padding: 0 10px"><span>Retiro/2°paso</span></td>

        </tr>
        <tr class="text-center" style="padding: 0 0;">
            <td class="pintado" style="font-size: 5pt;padding: 0 10px;"><span style="font-size: 6pt;">Densidad</span></td>
            <td class="pintado" style="font-size: 5pt;padding: 0 10px"><span style="font-size: 6pt;">vueltas</span></td>
            <td class="pintado" style="font-size: 5pt;padding: 0 10px"><span style="font-size: 6pt;">% Agua</span></td>

            <td class="pintado" style="font-size: 5pt;padding: 0 10px"><span style="font-size: 6pt;">Densidad</span></td>
            <td class="pintado" style="font-size: 5pt;padding: 0 10px"><span style="font-size: 6pt;">vueltas</span></td>
            <td class="pintado" style="font-size: 5pt;padding: 0 10px"><span style="font-size: 6pt;">% Agua</span></td>

        </tr>

        <tr>
            <td class="unidad" style=" padding: 0;"><span style="padding-left: 7px;">Unidad 1:</span></td>
            <td class="unidad" style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="tiro_unidad_1" value="<?php echo $data[0]->tiro_unidad_1  ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="distribucion1_1" value="<?php echo $data[0]->distribucion1_1  ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="angulo_color1_1" value="<?php echo $data[0]->angulo_color1_1  ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="presion_1" value="<?php echo $data[0]->presion_1  ?>"></td>
            <td class="unidad" style="padding: 0;"><span style="padding-left: 7px;">Unidad 1:</span></td>
            <td class="unidad" style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="retiro_unidad_1" value="<?php echo $data[0]->retiro_unidad_1  ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="distribucion2_1" value="<?php echo $data[0]->distribucion2_1  ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="angulo_color2_1" value="<?php echo $data[0]->angulo_color2_1 ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" style="font-size: 7pt" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="presion_7" value="<?php echo $data[0]->presion_7  ?>"></td>

            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="densidad_1" value="<?php echo $data[0]->densidad_1   ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="vueltas_1_1" value="<?php echo $data[0]->vueltas_1_1 ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="agua_1" value="<?php echo $data[0]->agua_1   ?>"></td>

            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="densidad_7" value="<?php echo $data[0]->densidad_7   ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="vueltas_2_1" value="<?php echo $data[0]->vueltas_2_1   ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="agua_7" value="<?php echo $data[0]->agua_7   ?>"></td>
        </tr>

        <tr>
            <td class="unidad" style="padding: 0;"><span style="padding-left: 7px;">Unidad 2:</span></td>
            <td class="unidad" style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="tiro_unidad_2" value="<?php echo $data[0]->tiro_unidad_2  ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="distribucion1_2" value="<?php echo $data[0]->distribucion1_2   ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="angulo_color1_2" value="<?php echo $data[0]->angulo_color1_2   ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="presion_2" value="<?php echo $data[0]->presion_2   ?>"></td>
            <td class="unidad" style="padding: 0;"><span style="padding-left: 7px;">Unidad 2:</span></td>
            <td class="unidad" style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="retiro_unidad_2" value="<?php echo $data[0]->retiro_unidad_2  ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="distribucion2_2" value="<?php echo $data[0]->distribucion2_2  ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="angulo_color2_2" value="<?php echo $data[0]->angulo_color2_2   ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" style="font-size: 7pt" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="presion_8" value="<?php echo $data[0]->presion_8  ?>"></td>

            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="densidad_2" value="<?php echo $data[0]->densidad_2 ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="vueltas_1_2" value="<?php echo $data[0]->vueltas_1_2   ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="agua_2" value="<?php echo $data[0]->agua_2   ?>"></td>

            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="densidad_8" value="<?php echo $data[0]->densidad_8   ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="vueltas_2_2" value="<?php echo $data[0]->vueltas_2_2   ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="agua_8" value="<?php echo $data[0]->agua_8 ?>"></td>
        </tr>

        <tr>
            <td class="unidad" style="padding: 0;"><span style="padding-left: 7px;">Unidad 3:</span></td>
            <td class="unidad" style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="tiro_unidad_3" value="<?php echo $data[0]->tiro_unidad_3  ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="distribucion1_3" value="<?php echo $data[0]->distribucion1_3  ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="angulo_color1_3" value="<?php echo $data[0]->angulo_color1_3  ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="presion_3" value="<?php echo $data[0]->presion_3  ?>"></td>
            <td class="unidad" style="padding: 0;"><span style="padding-left: 7px;">Unidad 3:</span></td>
            <td class="unidad" style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="retiro_unidad_3" value="<?php echo $data[0]->retiro_unidad_3  ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="distribucion2_3" value="<?php echo $data[0]->distribucion2_3  ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="angulo_color2_3" value="<?php echo $data[0]->angulo_color2_3 ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" style="font-size: 7pt" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="presion_9" value="<?php echo $data[0]->presion_9  ?>"></td>

            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="densidad_3" value="<?php echo $data[0]->densidad_3 ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="vueltas_1_3" value="<?php echo $data[0]->vueltas_1_3   ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="agua_3" value="<?php echo $data[0]->agua_3   ?>"></td>

            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="densidad_9" value="<?php echo $data[0]->densidad_9   ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="vueltas_2_3" value="<?php echo $data[0]->vueltas_2_3   ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="agua_9" value="<?php echo $data[0]->agua_9   ?>"></td>
        </tr>

        <tr>
            <td class="unidad" style="padding: 0;"><span style="padding-left: 7px;">Unidad 4:</span></td>
            <td class="unidad" style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="tiro_unidad_4" value="<?php echo $data[0]->tiro_unidad_4  ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="distribucion1_4" value="<?php echo $data[0]->distribucion1_4  ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="angulo_color1_4" value="<?php echo $data[0]->angulo_color1_4  ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="presion_4" value="<?php echo $data[0]->presion_4  ?>"></td>
            <td class="unidad" style="padding: 0;"><span style="padding-left: 7px;">Unidad 4:</span></td>
            <td class="unidad" style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="retiro_unidad_4" value="<?php echo $data[0]->retiro_unidad_4  ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="distribucion2_4" value="<?php echo $data[0]->distribucion2_4  ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="angulo_color2_4" value="<?php echo $data[0]->angulo_color2_4   ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" style="font-size: 7pt" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="presion_10" value="<?php echo $data[0]->presion_10  ?>"></td>

            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="densidad_4" value="<?php echo $data[0]->densidad_4 ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="vueltas_1_4" value="<?php echo $data[0]->vueltas_1_4 ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="agua_4" value="<?php echo $data[0]->agua_4 ?>"></td>

            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="densidad_10" value="<?php echo $data[0]->densidad_10   ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="vueltas_2_4" value="<?php echo $data[0]->vueltas_2_4   ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="agua_10" value="<?php echo $data[0]->agua_10 ?>"></td>
        </tr>

        <tr>
            <td class="unidad" style="padding: 0;"><span style="padding-left: 7px;">Unidad 5:</span></td>
            <td class="unidad" style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="tiro_unidad_5" value="<?php echo $data[0]->tiro_unidad_5  ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="distribucion1_5" value="<?php echo $data[0]->distribucion1_5  ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="angulo_color1_5" value="<?php echo $data[0]->angulo_color1_5   ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="presion_4" value="<?php echo $data[0]->presion_4   ?>"></td>
            <td class="unidad" style="padding: 0;"><span style="padding-left: 7px;">Unidad 5:</span></td>
            <td class="unidad" style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="retiro_unidad_5" value="<?php echo $data[0]->retiro_unidad_5  ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="distribucion2_5" value="<?php echo $data[0]->distribucion2_5  ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="angulo_color2_5" value="<?php echo $data[0]->angulo_color2_5   ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" style="font-size: 7pt" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="presion_11" value="<?php echo $data[0]->presion_11  ?>"></td>

            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="densidad_5" value="<?php echo $data[0]->densidad_5 ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="vueltas_1_5" value="<?php echo $data[0]->vueltas_1_5   ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="agua_5" value="<?php echo $data[0]->agua_5   ?>"></td>

            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="densidad_11" value="<?php echo $data[0]->densidad_11   ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="vueltas_2_5" value="<?php echo $data[0]->vueltas_2_5 ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="agua_11" value="<?php echo $data[0]->agua_11   ?>"></td>
        </tr>

        <tr>
            <td class="unidad" style="padding: 0;"><span style="padding-left: 7px;">Unidad 6:</span></td>
            <td class="unidad" style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="tiro_unidad_6" value="<?php echo $data[0]->tiro_unidad_6  ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="distribucion1_6" value="<?php echo $data[0]->distribucion1_6  ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="angulo_color1_6" value="<?php echo $data[0]->angulo_color1_6  ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="presion_6" value="<?php echo $data[0]->presion_6  ?>"></td>
            <td class="unidad" style="padding: 0;"><span style="padding-left: 7px;">Unidad 6:</span></td>
            <td class="unidad" style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="retiro_unidad_6" value="<?php echo $data[0]->retiro_unidad_6  ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="distribucion2_6" value="<?php echo $data[0]->distribucion2_6  ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="angulo_color2_6" value="<?php echo $data[0]->angulo_color2_6   ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" style="font-size: 7pt" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="presion_12" value="<?php echo $data[0]->presion_12  ?>"></td>

            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="densidad_6" value="<?php echo $data[0]->densidad_6 ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="vueltas_1_6" value="<?php echo $data[0]->vueltas_1_6 ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="agua_6" value="<?php echo $data[0]->agua_6 ?>"></td>

            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="densidad_12" value="<?php echo $data[0]->densidad_12   ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="vueltas_2_6" value="<?php echo $data[0]->vueltas_2_6   ?>"></td>
            <td style="font-size: 7pt; padding: 7px;"><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="agua_12" value="<?php echo $data[0]->agua_12 ?>"></td>
        </tr>


        <div class="mb-3">
            Presión general de maquina: <input type="text" class="w-25 input_ficha_impresora" style="border: transparent;" placeholder="--" name="<?php echo $data[0]->ID ?>" id="presion_general" value="<?php echo $data[0]->presion_general   ?>">
        </div>

        <table class="table w-100" id="tabla-cambios">
            <tr class="text-center bg-black text-light ">
                <td colspan="12" style="color:white;">SECADO DE MAQUINA</td>
            </tr>
            <tr>
                <td colspan="3" class="pintado text-center">Especificaciones de prensa</td>
                <td colspan="3" class="pintado text-center">Potencia de lamparas IR</td>
                <td colspan="3" class="pintado text-center">% Potencia calorifica</td>
                <td colspan="3" class="pintado text-center">% De aire Soplador</td>
            </tr>

            <tr id="secado_maquina">
                <td class="pintado text-center" style="color: black; font-size: 8pt; padding-bottom: 0;" colspan="3">Cuerpo Intermedio <br> <span>*Solo para XL105</span></td>
                <td colspan="3" class="align-middle text-center w-25 input-sub" style="color: black; font-size: 8pt; padding-bottom: 0;">
                    <div class="row w-100 text-center mx-auto justify-content-center align-middle">
                        <div class="col-4" style="padding: 0;">
                            <span style="color: black;">1.</span>
                            <input type="text" style="font-size: 8pt;" class="w-50 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="potencia_lamparas_1" value="<?php echo $data[0]->potencia_lamparas_1  ?>">
                        </div>
                        <div class="col-4" style="padding: 0;">
                            <span style="color: black;">2.</span>
                            <input type="text" style="font-size: 8pt;" class="w-50 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="potencia_lamparas_2" value="<?php echo $data[0]->potencia_lamparas_2   ?>">
                        </div>
                        <div class="col-4" style="padding: 0;">
                            <span style="color: black;">3.</span>
                            <input type="text" style="font-size: 8pt;" class="w-50 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="potencia_lamparas_3" value="<?php echo $data[0]->potencia_lamparas_3   ?>">
                        </div>

                    </div>
                </td>
                <td colspan="3" class="align-middle text-center w-25 input-sub" style="color: black; font-size: 8pt; padding-bottom: 0;">
                    <div class="row w-100 text-center mx-auto justify-content-center align-middle">
                        <div class="col-3" style="padding: 0;">
                            <span style="color: black;">1.
                            </span> <input type="text" style="width: 65%;font-size: 8pt;" class="input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="potencia_calorifica_1" value="<?php echo $data[0]->potencia_calorifica_1  ?>">
                        </div>
                        <div class="col-3" style="padding: 0;">
                            <span style="color: black;">2.
                            </span> <input type="text" style="width: 65%;font-size: 8pt;" class="input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="potencia_calorifica_2" value="<?php echo $data[0]->potencia_calorifica_2   ?>">
                        </div>
                        <div class="col-3" style="padding: 0;">
                            <span style="color: black;">3.
                            </span> <input type="text" style="width: 65%;font-size: 8pt;" class="input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="potencia_calorifica_3" value="<?php echo $data[0]->potencia_calorifica_3   ?>">
                        </div>
                        <div class="col-3" style="padding: 0;">
                            <span style="color: black;">4.
                            </span> <input type="text" style="width: 65%;font-size: 8pt;" class="input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="potencia_calorifica_4" value="<?php echo $data[0]->potencia_calorifica_4  ?>">
                        </div>
                    </div>
                </td>
                <td colspan="3" class="align-middle text-center w-25 input-sub" style="color: black; font-size: 8pt; padding-bottom: 0;">
                    <div class="row w-100 text-center mx-auto justify-content-center align-middle">
                        <div class="col-3" style="padding: 0;">
                            <span style="color: black;">1.
                            </span> <input type="text" style="width: 65%;font-size: 8pt;" class="input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="aire_soplador_1" value="<?php echo $data[0]->aire_soplador_1   ?>">
                        </div>
                        <div class="col-3" style="padding: 0;">
                            <span style="color: black;">2.
                            </span> <input type="text" style="width: 65%;font-size: 8pt;" class="input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="aire_soplador_2" value="<?php echo $data[0]->aire_soplador_2  ?>">
                        </div>
                        <div class="col-3" style="padding: 0;">
                            <span style="color: black;">3.
                            </span> <input type="text" style="width: 65%;font-size: 8pt;" class="input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="aire_soplador_3" value="<?php echo $data[0]->aire_soplador_3    ?>">
                        </div>
                        <div class="col-3" style="padding: 0;">
                            <span style="color: black;">4.
                            </span> <input type="text" style="width: 65%;font-size: 8pt;" class="input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="aire_soplador_4" value="<?php echo $data[0]->aire_soplador_4    ?>">
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="pintado text-center" style="color: black; font-size: 8pt; padding-bottom: 0;">Salida</td>
                <td colspan="3" class="align-middle text-center w-25 input-sub" style="color: black; font-size: 8pt; padding-bottom: 0;">
                    <div class="row w-100 text-center mx-auto justify-content-center align-middle">
                        <div class="col-6">
                            <span style="color: black;">1.
                            </span> <input type="text" style="width: 65%;font-size: 8pt;" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="salida_1" value="<?php echo $data[0]->salida_1   ?>">
                        </div>
                        <div class="col-6">
                            <span style="color: black;">2.
                            </span> <input type="text" style="width: 65%;font-size: 8pt;" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="salida_2" value="<?php echo $data[0]->salida_2   ?>">
                        </div>

                    </div>
                </td>
                <td colspan="3" class="align-middle text-center w-25 input-sub" style="color: black; font-size: 8pt; padding-bottom: 0;">
                    <div class="row w-100 text-center mx-auto justify-content-center align-middle">
                        <div class="col-6">
                            <span style="color: black;">1.
                            </span> <input type="text" style="width: 65%;font-size: 8pt;" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="salida_3" value="<?php echo $data[0]->salida_3  ?>">
                        </div>
                        <div class="col-6">
                            <span style="color: black;">2.
                            </span> <input type="text" style="width: 65%;font-size: 8pt;" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="salida_4" value="<?php echo $data[0]->salida_4  ?>">
                        </div>

                    </div>
                </td>
                <td colspan="3" class="align-middle text-center w-25 input-sub" style="color: black; font-size: 8pt; padding-bottom: 0;">
                    <div class="row w-100 text-center mx-auto justify-content-center align-middle">
                        <div class="col-6">
                            <span style="color: black;">1.
                            </span> <input type="text" style="width: 65%;font-size: 8pt;" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="salida_5" value="<?php echo $data[0]->salida_5  ?>">
                        </div>
                        <div class="col-6">
                            <span style="color: black;">2.
                            </span> <input type="text" style="width: 65%;font-size: 8pt;" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="salida_6" value="<?php echo $data[0]->salida_6   ?>">
                        </div>

                    </div>
                </td>
            </tr>
            <tr>
                <td class="pintado text-center" style="color: black; font-size: 8pt; padding-bottom: 0;">Talco</td>
                <td colspan="3" class="align-middle text-center w-25 input-sub" style="color: black; font-size: 8pt; padding-bottom: 0;">
                    <div class="row w-100 text-center mx-auto justify-content-center align-middle">
                        <div class="col-12">
                            <span style="color: black;">% De Talco</span> <input type="text" style="width: 65%;font-size: 8pt;" class="w-25 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_talco" value="<?php echo $data[0]->porcentaje_talco  ?>">
                        </div>
                    </div>
                </td>
                <td colspan="3" class="align-middle text-center w-25 input-sub" style="color: black; font-size: 8pt; padding-bottom: 0;">
                    <div class="row w-100 text-center mx-auto justify-content-center align-middle">
                        <div class="col-12">
                            <span style="color: black;">Tipo de Talco</span> <input type="text" style="width: 65%;font-size: 8pt;" class="w-25 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="tipo_talco" value="<?php echo $data[0]->tipo_talco  ?>">
                        </div>


                    </div>
                </td>
                <td colspan="3" class="align-middle text-center w-25 input-sub" style="color: black; font-size: 8pt; padding-bottom: 0;">
                    -
                </td>
            </tr>
            <tr>
                <td class="pintado text-center" style="color: black; font-size: 8pt; padding-bottom: 0;">Temperatura de pila salida </td>

                <td class="align-middle text-center w-25" colspan="3" style="color: black; font-size: 8pt; padding-top: 0; padding-bottom: 0;">
                    <input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="pila_salida" value="<?php echo $data[0]->pila_salida  ?>">
                </td>
                <td colspan="3" class="align-middle text-center" style="color: black; font-size: 8pt; padding-top: 0; padding-bottom: 0;">
                    Automatico activado
                </td>
                <td colspan="3" class="align-middle text-center w-25 input-sub" style="color: black; font-size: 8pt; padding-top: 0; padding-bottom: 0;">
                    <div class="row w-100 text-center mx-auto justify-content-center align-middle">
                        <div class="col-3">
                            <input class="form-check-input " name="pila_automatico" role="<?php echo $data[0]->ID ?>" value="SI" type="radio" id="pila_automatico1" <?php echo ($data[0]->pila_automatico == "SI") ? 'checked="checked"' : ' '; ?>>
                            <label class="form-check-label" for="pila_automatico1" style="color: black; font-size: 8pt;">Si</label>
                        </div>
                        <div class="col-3">
                            <input class="form-check-input " name="pila_automatico" role="<?php echo $data[0]->ID ?>" value="NO" type="radio" id="pila_automatico2" <?php echo ($data[0]->pila_automatico == "NO") ? 'checked="checked"' : ' '; ?>>
                            <label class="form-check-label" for="pila_automatico2" style="color: black;font-size: 8pt;">No</label>
                        </div>

                    </div>
                </td>

            </tr>
            <tr class="text-center bg-black text-light ">
                <td colspan="12" style="color:white;">VARIABLES DE AGUA</td>
            </tr>
            <tr>
                <td colspan="3" class="text-center align-middle input-sub">
                    Variables de agua PH: <input type="text" class="w-25 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="variables_agua_PH" value="<?php echo $data[0]->variables_agua_PH   ?>">
                </td>
                <td colspan="3" class="text-center align-middle input-sub">
                    𝝻S: <input type="text" class="w-25 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="variables_agua_US" value="<?php echo $data[0]->variables_agua_US  ?>">
                </td>
                <td colspan="3" class="text-center align-middle input-sub">
                    Alcohol: <input type="text" class="w-25 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="variables_agua_alchohol" value="<?php echo $data[0]->variables_agua_alchohol   ?>">
                </td>
                <td colspan="3" class="text-center align-middle input-sub">
                    Temp: <input type="text" class="w-25 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="variables_agua_temp" value="<?php echo $data[0]->variables_agua_temp  ?>">
                </td>
            </tr>
        </table>


        <table class="table w-100" id="tabla-subida">
            <tr class="text-center bg-black text-light ">

                <td colspan="12" style="color:white;">BARNIZ</td>
            </tr>
            <tr>
                <td colspan="2" class="pintado text-center align-middle" style="padding: 0px;">
                    TIPO DE BARNIZ LINEA
                    <br>
                    <span> * Agregar codigo, y marca</span>
                </td>
                <td colspan="8" style="padding: 0px;">
                    <input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="tipo_barniz_linea_1" value="<?php echo $data[0]->tipo_barniz_linea_1  ?>">
                </td>
                <td colspan="2" class="text-center" style="padding: 0px;">
                    TIPO (DE REGISTRO):
                    <br>
                    <div class="row w-100 justify-content-center">
                        <div class="col-6">
                            <input class="form-check-input " type="checkbox" name="tipo_barniz_tipo_registro_pegue" role="<?php echo $data[0]->ID ?>" value="SI" id="tipo_barniz_tipo_registro_pegue" <?php echo ($data[0]->tipo_barniz_tipo_registro_pegue == "SI") ? 'checked="checked"' : ' '; ?>>
                            <label class="form-check-label" for="tipo_barniz_tipo_registro_pegue" style="color: black">PEGUE</label>
                        </div>
                        <div class="col-6">
                            <input class="form-check-input " type="checkbox" name="tipo_barniz_tipo_registro_lote" role="<?php echo $data[0]->ID ?>" value="SI" id="tipo_barniz_tipo_registro_lote" <?php echo ($data[0]->tipo_barniz_tipo_registro_lote == "SI") ? 'checked="checked"' : ' '; ?>>
                            <label class="form-check-label" for="tipo_barniz_tipo_registro_lote" style="color: black">TOTAL</label>
                        </div>
                    </div>
                    <div class="row w-100 justify-content-center">
                        <div class="col-6">
                            <input class="form-check-input " type="checkbox" name="tipo_barniz_tipo_registro_total" role="<?php echo $data[0]->ID ?>" value="SI" id="tipo_barniz_tipo_registro_total" <?php echo ($data[0]->tipo_barniz_tipo_registro_total == "SI") ? 'checked="checked"' : ' '; ?>>
                            <label class="form-check-label" for="tipo_barniz_tipo_registro_total" style="color: black">LOTE</label>
                        </div>
                        <div class="col-6">
                            <input class="form-check-input " type="checkbox" name="tipo_barniz_tipo_registro_sin_bl" role="<?php echo $data[0]->ID ?>" value="SI" id="tipo_barniz_tipo_registro_sin_bl" <?php echo ($data[0]->tipo_barniz_tipo_registro_sin_bl == "SI") ? 'checked="checked"' : ' '; ?>>
                            <label class="form-check-label" for="tipo_barniz_tipo_registro_sin_bl" style="color: black">SIN BUV</label>
                        </div>
                    </div>
                </td>
            </tr>

            <tr>
                <td class="text-center pintado">BRILLO</td>
                <td class="text-center pintado">GRADO DE MEDICION</td>
                <td colspan="4">
                    <input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="brillo_1" value="<?php echo $data[0]->brillo_1   ?>">
                </td>
                <td colspan="4">
                    <input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="grado_medicion_1" value="<?php echo $data[0]->grado_medicion_1    ?>">
                </td>
                <td colspan="2" class="text-center">
                    <span>Vence sin tolerancia</span>
                </td>
            </tr>


            <tr>
                <td class="text-center pintado">LOTE</td>
                <td class="text-center pintado">VENCE</td>
                <td colspan="4">
                    <input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="barniz_lote_1" value="<?php echo $data[0]->barniz_lote_1   ?>">
                </td>
                <td colspan="4">
                    <input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="barniz_vence_1" value="<?php echo $data[0]->barniz_vence_1    ?>">
                </td>
                <td colspan="2" class="text-center">
                    <span>Vence sin tolerancia</span>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="pintado text-center">
                    VISCOSIDAD DE BARNIZ LINEA
                </td>
                <td colspan="8">
                    <input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="viscocidad_barniz" value="<?php echo $data[0]->viscocidad_barniz  ?>">
                </td>
                <td colspan="2" class="text-center">
                    <span>* Segun tipo ver ficha tecnica</span>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="pintado text-center">
                    MAQUINA DE BARNIZ UV
                </td>
                <td colspan="8">
                    <input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="maquina_barniz" value="<?php echo $data[0]->maquina_barniz    ?>">
                </td>
                <td class="pintado">
                    OPERARIO :
                </td>
                <td>
                    <input type="text" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="operario_barniz" value="<?php echo $data[0]->operario_barniz ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center pintado">
                    TIPO DE BARNIZ UV <br>
                    <span>*Agregar codigo, marca</span>
                </td>
                <td colspan="9">
                    <input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="tipo_barniz_UV_registro" value="<?php echo $data[0]->tipo_barniz_UV_registro    ?>">
                </td>
                <td class="text-center">
                    TIPO (DE REGISTRO):
                    <br>
                    <div class="row w-100 justify-content-center">
                        <div class="col-6">
                            <input class="form-check-input " value="SI" type="checkbox" name="tipo_barniz_UV_registro_pegue" id="tipo_barniz_UV_registro_pegue" role="<?php echo $data[0]->ID ?>" <?php echo ($data[0]->tipo_barniz_UV_registro_pegue == "SI") ? 'checked="checked"' : ' '; ?>>
                            <label class="form-check-label" for="tipo_barniz_UV_registro_pegue" style="color: black; font-size: 8pt;">PEGUE</label>
                        </div>
                        <div class="col-6">
                            <input class="form-check-input " value="SI" type="checkbox" name="tipo_barniz_UV_registro_total" id="tipo_barniz_UV_registro_total" role="<?php echo $data[0]->ID ?>" <?php echo ($data[0]->tipo_barniz_UV_registro_total == "SI") ? 'checked="checked"' : ' '; ?>>
                            <label class="form-check-label" for="tipo_barniz_UV_registro_total" style="color: black;font-size: 8pt;">TOTAL</label>
                        </div>
                    </div>
                    <div class="row w-100 justify-content-center">
                        <div class="col-6">
                            <input class="form-check-input " value="SI" type="checkbox" name="tipo_barniz_UV_registro_lote" id="tipo_barniz_UV_registro_lote" role="<?php echo $data[0]->ID ?>" <?php echo ($data[0]->tipo_barniz_UV_registro_lote == "SI") ? 'checked="checked"' : ' '; ?>>
                            <label class="form-check-label" for="tipo_barniz_UV_registro_lote" style="color: black;font-size: 8pt;">LOTE</label>
                        </div>
                        <div class="col-6">
                            <input class="form-check-input " value="SI" type="checkbox" name="tipo_barniz_UV_registro_sin_bl" id="tipo_barniz_UV_registro_sin_bl" role="<?php echo $data[0]->ID ?>" <?php echo ($data[0]->tipo_barniz_UV_registro_sin_bl == "SI") ? 'checked="checked"' : ' '; ?>>
                            <label class="form-check-label" for="tipo_barniz_UV_registro_sin_bl" style="color: black;font-size: 8pt;">SIN BUV</label>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="text-center pintado">BRILLO</td>
                <td class="text-center pintado">GRADO DE MEDICION</td>
                <td colspan="4">
                    <input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="brillo_2" value="<?php echo $data[0]->brillo_2    ?>">
                </td>
                <td colspan="4">
                    <input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="grado_medicion_2" value="<?php echo $data[0]->grado_medicion_2    ?>">
                </td>
                <td colspan="2" class="text-center">
                    <span>Vence sin tolerancia</span>
                </td>
            </tr>
            <tr>
                <td class="text-center pintado">LOTE</td>
                <td class="text-center pintado">VENCE</td>
                <td colspan="4">
                    <input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="barniz_lote_2" value="<?php echo $data[0]->barniz_lote_2  ?>">
                </td>
                <td colspan="4">
                    <input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="barniz_vence_2" value="<?php echo $data[0]->barniz_vence_2  ?>">
                </td>
                <td colspan="2" class="text-center">
                    <span>Vence sin tolerancia</span>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="pintado text-center">
                    POTENCIA DE LAMPARAS UV
                </td>
                <td colspan="9" class="input-sub w-50">
                    <div class="row w-100 text-center mx-auto justify-content-center align-middle">
                        <div class="col-3">
                            <span style="color: black;">1</span> <input type="text" style="font-size: 10pt;" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="potencia_lamparas_UV_1" value="<?php echo $data[0]->potencia_lamparas_UV_1  ?>">
                        </div>
                        <div class="col-3">
                            <span style="color: black;">2</span> <input type="text" style="font-size: 10pt;" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="potencia_lamparas_UV_2" value="<?php echo $data[0]->potencia_lamparas_UV_2   ?>">
                        </div>
                        <div class="col-3">
                            <span style="color: black;">3</span> <input type="text" style="font-size: 10pt;" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="potencia_lamparas_UV_3" value="<?php echo $data[0]->potencia_lamparas_UV_3 ?>">
                        </div>
                        <div class="col-3">
                            <span style="color: black;">4</span> <input type="text" style="font-size: 10pt;" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="potencia_lamparas_UV_4" value="<?php echo $data[0]->potencia_lamparas_UV_4   ?>">
                        </div>
                    </div>
                </td>
                <td class="text-center">
                    <span>Segun maquina (% o potencia)

                    </span>
                </td>
            </tr>
            <tr>
                <td colspan="12">
                    Observaciones:
                </td>
            </tr>
            <tr>
                <td colspan="12">
                    <input type="text" class="w-100 input_ficha_impresora" id="firma" disabled>

                    <input class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="observaciones" cols="20" rows="2" value="<?php echo $data[0]->observaciones ?>">

                </td>
            </tr>
            <tr class="text-center bg-black text-light">

                <td colspan="12">
                    <span style="color: white; font-size: 12px;">ENCARGADOS CALIDAD:</span>
                </td>
                <center>
            <tr>
                <div class="pie">
                    <td colspan="2" class="border border-white pie">DEPARTAMENTO DE CALIDAD</td>
                    <td class="border border-white" colspan="8">
                        <input type="text" class="w-100 input_ficha_impresora" placeholder="NOMBRE" name="<?php echo $data[0]->ID ?>" id="encargados_nombre" value="<?php echo $data[0]->encargados_nombre ?>">
                    </td>
                    <td class="border border-white">
                        <input type="text" class="w-100 input_ficha_impresora" placeholder="FIRMA" id="firma" disabled>
                    </td>
                    <td class="border border-white">
                        <p><?php echo date('d/m/Y') ?></p>
                    </td>
            </tr>

</div>

</center>
</tr>
</table>

<br>
<div class="bg-black text-light text-center w-100 p-2">
    GENERALIDADES DE FORMULACION DE TINTAS
</div>



<div class="row m-0 w-100 justify-content-center mx-auto text-center mt-3 mb-3">
    <div class="col-6">
        <span style="font-size: 10pt; color: black;">FORMULADO POR:</span> <input type="text" class="w-75 input_ficha_impresora" style="border: transparent;border-bottom: 0.5px solid black; font-size:10pt;" name="<?php echo $data[0]->ID ?>" id="formulado" value="<?php echo $data[0]->formulado  ?>">
    </div>
    <div class="col-6">
        <span style="font-size: 10pt; color: black;">FECHA:</span> <input type="text" class="w-75 input_ficha_impresora" style="border: transparent;border-bottom: 0.5px solid black; font-size:10pt;" name="" value="<?php echo date('d/m/Y') ?>">
    </div>
</div>
<table class="w-100 table" id="tintas">

    <tr>
        <td class="pintado text-center">PINTADO</td>
        <td class="pintado text-center">REFERENCIA</td>
        <td class="pintado text-center">CIE L*a*b</td>
        <td class="pintado text-center">DESCRIPCION DE TINTA</td>
        <td class="pintado text-center">PROVEEDOR</td>
        <td class="pintado text-center">% DE TINTA</td>
    </tr>
    <tr>
        <td rowspan="7" class="align-middle mx-auto"><input type="text" class="w-100 text-center input_ficha_impresora" placeholder="Escribe aqui" name="<?php echo $data[0]->ID ?>" id="pintado_1" value="<?php echo $data[0]->pintado_1  ?>"></td>
        <td rowspan="7" class="align-middle mx-auto"><input type="text" class="w-100 text-center input_ficha_impresora" placeholder="Escribe aqui" name="<?php echo $data[0]->ID ?>" id="referencia_1" value="<?php echo $data[0]->referencia_1 ?>"></td>
        <!-- aquiiiiii -->
    <tr>
        <td rowspan="2" class="align-middle">L=<input type="text" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="ciel_L_1" value="<?php echo $data[0]->ciel_L_1 ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_1" value="<?php echo $data[0]->descripcion_tinta_1  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_1" value="<?php echo $data[0]->proveedor_1  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_1" value="<?php echo $data[0]->porcentaje_tinta_1  ?>"></td>
    </tr>
    <tr>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_2" value="<?php echo $data[0]->descripcion_tinta_2  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_2" value="<?php echo $data[0]->proveedor_2   ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_2" value="<?php echo $data[0]->porcentaje_tinta_2  ?>"></td>
    </tr>
    <tr>
        <td rowspan="2" class="align-middle">a=<input type="text" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="ciel_a_1" value="<?php echo $data[0]->ciel_a_1 ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_3" value="<?php echo $data[0]->descripcion_tinta_3  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_3" value="<?php echo $data[0]->proveedor_3  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_3" value="<?php echo $data[0]->porcentaje_tinta_3  ?>"></td>
    </tr>
    <tr>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_4" value="<?php echo $data[0]->descripcion_tinta_4  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_4" value="<?php echo $data[0]->proveedor_4   ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_4" value="<?php echo $data[0]->porcentaje_tinta_4  ?>"></td>
    </tr>
    <tr>
        <td rowspan="2" class="align-middle">b=<input type="text" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="ciel_b_1" value="<?php echo $data[0]->ciel_b_1 ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_5" value="<?php echo $data[0]->descripcion_tinta_5  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_5" value="<?php echo $data[0]->proveedor_5  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_5" value="<?php echo $data[0]->porcentaje_tinta_5  ?>"></td>
    </tr>
    <tr>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_6" value="<?php echo $data[0]->descripcion_tinta_6  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_6" value="<?php echo $data[0]->proveedor_6   ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_6" value="<?php echo $data[0]->porcentaje_tinta_6  ?>"></td>
    </tr>

    </tr>

    <tr>
        <td rowspan="7" class="align-middle mx-auto"><input type="text" class="w-100 text-center input_ficha_impresora" placeholder="Escribe aqui" name="<?php echo $data[0]->ID ?>" id="pintado_2" value="<?php echo $data[0]->pintado_2  ?>"></td>
        <td rowspan="7" class="align-middle mx-auto"><input type="text" class="w-100 text-center input_ficha_impresora" placeholder="Escribe aqui" name="<?php echo $data[0]->ID ?>" id="referencia_2" value="<?php echo $data[0]->referencia_2 ?>"></td>

    <tr>
        <td rowspan="2" class="align-middle">L=<input type="text" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="ciel_L_2" value="<?php echo $data[0]->ciel_L_2 ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_7" value="<?php echo $data[0]->descripcion_tinta_7  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_7" value="<?php echo $data[0]->proveedor_7  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_7" value="<?php echo $data[0]->porcentaje_tinta_7  ?>"></td>
    </tr>
    <tr>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_8" value="<?php echo $data[0]->descripcion_tinta_8  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_8" value="<?php echo $data[0]->proveedor_8   ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_8" value="<?php echo $data[0]->porcentaje_tinta_8  ?>"></td>
    </tr>
    <tr>
        <td rowspan="2" class="align-middle">a=<input type="text" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="ciel_a_2" value="<?php echo $data[0]->ciel_a_2 ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_9" value="<?php echo $data[0]->descripcion_tinta_9  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_9" value="<?php echo $data[0]->proveedor_9  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_9" value="<?php echo $data[0]->porcentaje_tinta_9  ?>"></td>
    </tr>
    <tr>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_10" value="<?php echo $data[0]->descripcion_tinta_10  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_10" value="<?php echo $data[0]->proveedor_10   ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_10" value="<?php echo $data[0]->porcentaje_tinta_10  ?>"></td>
    </tr>
    <tr>
        <td rowspan="2" class="align-middle">b=<input type="text" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="ciel_b_2" value="<?php echo $data[0]->ciel_b_2 ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_11" value="<?php echo $data[0]->descripcion_tinta_11  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_11" value="<?php echo $data[0]->proveedor_11  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_11" value="<?php echo $data[0]->porcentaje_tinta_11  ?>"></td>
    </tr>
    <tr>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_12" value="<?php echo $data[0]->descripcion_tinta_12  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_12" value="<?php echo $data[0]->proveedor_12   ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_12" value="<?php echo $data[0]->porcentaje_tinta_12  ?>"></td>
    </tr>

    </tr>

    <tr>
        <td rowspan="7" class="align-middle mx-auto"><input type="text" class="w-100 text-center input_ficha_impresora" placeholder="Escribe aqui" name="<?php echo $data[0]->ID ?>" id="pintado_3" value="<?php echo $data[0]->pintado_3  ?>"></td>
        <td rowspan="7" class="align-middle mx-auto"><input type="text" class="w-100 text-center input_ficha_impresora" placeholder="Escribe aqui" name="<?php echo $data[0]->ID ?>" id="referencia_3" value="<?php echo $data[0]->referencia_3 ?>"></td>

    <tr>
        <td rowspan="2" class="align-middle">L=<input type="text" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="ciel_L_3" value="<?php echo $data[0]->ciel_L_3 ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_13" value="<?php echo $data[0]->descripcion_tinta_13  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_13" value="<?php echo $data[0]->proveedor_13  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_13" value="<?php echo $data[0]->porcentaje_tinta_13  ?>"></td>
    </tr>
    <tr>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_14" value="<?php echo $data[0]->descripcion_tinta_14  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_14" value="<?php echo $data[0]->proveedor_14   ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_14" value="<?php echo $data[0]->porcentaje_tinta_14  ?>"></td>
    </tr>
    <tr>
        <td rowspan="2" class="align-middle">a=<input type="text" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="ciel_a_3" value="<?php echo $data[0]->ciel_a_3 ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_15" value="<?php echo $data[0]->descripcion_tinta_15  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_15" value="<?php echo $data[0]->proveedor_15  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_15" value="<?php echo $data[0]->porcentaje_tinta_15  ?>"></td>
    </tr>
    <tr>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_16" value="<?php echo $data[0]->descripcion_tinta_16  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_16" value="<?php echo $data[0]->proveedor_16   ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_16" value="<?php echo $data[0]->porcentaje_tinta_16  ?>"></td>
    </tr>
    <tr>
        <td rowspan="2" class="align-middle">b=<input type="text" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="ciel_b_3" value="<?php echo $data[0]->ciel_b_3 ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_17" value="<?php echo $data[0]->descripcion_tinta_17  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_17" value="<?php echo $data[0]->proveedor_17  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_17" value="<?php echo $data[0]->porcentaje_tinta_17  ?>"></td>
    </tr>
    <tr>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_18" value="<?php echo $data[0]->descripcion_tinta_18  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_18" value="<?php echo $data[0]->proveedor_18  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_18" value="<?php echo $data[0]->porcentaje_tinta_18  ?>"></td>
    </tr>

    </tr>




    <tr>
        <td rowspan="7" class="align-middle mx-auto"><input type="text" class="w-100 text-center input_ficha_impresora" placeholder="Escribe aqui" name="<?php echo $data[0]->ID ?>" id="pintado_4" value="<?php echo $data[0]->pintado_4  ?>"></td>
        <td rowspan="7" class="align-middle mx-auto"><input type="text" class="w-100 text-center input_ficha_impresora" placeholder="Escribe aqui" name="<?php echo $data[0]->ID ?>" id="referencia_3" value="<?php echo $data[0]->referencia_3 ?>"></td>

    <tr>
        <td rowspan="2" class="align-middle">L=<input type="text" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="ciel_a_4" value="<?php echo $data[0]->ciel_L_4 ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_19" value="<?php echo $data[0]->descripcion_tinta_19  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_19" value="<?php echo $data[0]->proveedor_19  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_19" value="<?php echo $data[0]->porcentaje_tinta_19  ?>"></td>
    </tr>
    <tr>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_20" value="<?php echo $data[0]->descripcion_tinta_20  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_20" value="<?php echo $data[0]->proveedor_20   ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_20" value="<?php echo $data[0]->porcentaje_tinta_20  ?>"></td>
    </tr>
    <tr>
        <td rowspan="2" class="align-middle">a=<input type="text" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="ciel_a_4" value="<?php echo $data[0]->ciel_a_4 ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_21" value="<?php echo $data[0]->descripcion_tinta_21  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_21" value="<?php echo $data[0]->proveedor_21  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_21" value="<?php echo $data[0]->porcentaje_tinta_21  ?>"></td>
    </tr>
    <tr>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_22" value="<?php echo $data[0]->descripcion_tinta_22  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_22" value="<?php echo $data[0]->proveedor_22   ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_22" value="<?php echo $data[0]->porcentaje_tinta_22  ?>"></td>
    </tr>
    <tr>
        <td rowspan="2" class="align-middle">b=<input type="text" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="ciel_b_4" value="<?php echo $data[0]->ciel_b_4 ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_1" value="<?php echo $data[0]->descripcion_tinta_23  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_23" value="<?php echo $data[0]->proveedor_23  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_23" value="<?php echo $data[0]->porcentaje_tinta_23  ?>"></td>
    </tr>
    <tr>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_24" value="<?php echo $data[0]->descripcion_tinta_24  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_24" value="<?php echo $data[0]->proveedor_24  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_24" value="<?php echo $data[0]->porcentaje_tinta_24  ?>"></td>
    </tr>

    </tr>

    <tr>
        <td rowspan="7" class="align-middle mx-auto"><input type="text" class="w-100 text-center input_ficha_impresora" placeholder="Escribe aqui" name="<?php echo $data[0]->ID ?>" id="pintado_5" value="<?php echo $data[0]->pintado_5  ?>"></td>
        <td rowspan="7" class="align-middle mx-auto"><input type="text" class="w-100 text-center input_ficha_impresora" placeholder="Escribe aqui" name="<?php echo $data[0]->ID ?>" id="referencia_5" value="<?php echo $data[0]->referencia_5 ?>"></td>

    <tr>
        <td rowspan="2" class="align-middle">L=<input type="text" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="ciel_L_5" value="<?php echo $data[0]->ciel_L_5 ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_25" value="<?php echo $data[0]->descripcion_tinta_25  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_25" value="<?php echo $data[0]->proveedor_25  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_25" value="<?php echo $data[0]->porcentaje_tinta_25  ?>"></td>
    </tr>
    <tr>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_26" value="<?php echo $data[0]->descripcion_tinta_26 ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_26" value="<?php echo $data[0]->proveedor_26  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_26" value="<?php echo $data[0]->porcentaje_tinta_26  ?>"></td>
    </tr>
    <tr>
        <td rowspan="2" class="align-middle">a=<input type="text" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="ciel_a_5" value="<?php echo $data[0]->ciel_a_5 ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_27" value="<?php echo $data[0]->descripcion_tinta_27  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_27" value="<?php echo $data[0]->proveedor_27  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_27" value="<?php echo $data[0]->porcentaje_tinta_27  ?>"></td>
    </tr>
    <tr>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_28" value="<?php echo $data[0]->descripcion_tinta_28  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_28" value="<?php echo $data[0]->proveedor_28   ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_28" value="<?php echo $data[0]->porcentaje_tinta_28  ?>"></td>
    </tr>
    <tr>
        <td rowspan="2" class="align-middle">b=<input type="text" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="ciel_b_5" value="<?php echo $data[0]->ciel_b_5 ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_29" value="<?php echo $data[0]->descripcion_tinta_29  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_29" value="<?php echo $data[0]->proveedor_29  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_29" value="<?php echo $data[0]->porcentaje_tinta_29  ?>"></td>
    </tr>
    <tr>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="descripcion_tinta_30" value="<?php echo $data[0]->descripcion_tinta_30  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="proveedor_30" value="<?php echo $data[0]->proveedor_30  ?>"></td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="porcentaje_tinta_30" value="<?php echo $data[0]->porcentaje_tinta_30  ?>"></td>
    </tr>

    </tr>


    <!-- FORMULACION TINTA -->

    <?php foreach ($formulacion_tinta as $key => $value) { ?>
        <tr>
            <td rowspan="7" class="align-middle mx-auto "><input type="text" class="w-100 text-center formulacion_tinta" placeholder="Escribe aqui" name="<?php echo $value->id_tinta  ?>" id="pintado" value="<?php echo $value->pintado  ?>"></td>
            <td rowspan="7" class="align-middle mx-auto "><input type="text" class="w-100 text-center formulacion_tinta" placeholder="Escribe aqui" name="<?php echo $value->id_tinta  ?>" id="referencia" value="<?php echo $value->referencia ?>"></td>
        <tr>
            <td rowspan="2" class="align-middle">L=<input type="text" class="w-75 formulacion_tinta" name="<?php echo $value->id_tinta ?>" id="cie_L" value="<?php echo $value->cie_L ?>"></td>
            <td><input type="text" class="w-100 formulacion_tinta" name="<?php echo $value->id_tinta  ?>" id="descripcion_1" value="<?php echo $value->descripcion_1  ?>"></td>
            <td><input type="text" class="w-100 formulacion_tinta" name="<?php echo $value->id_tinta  ?>" id="proveedor_1" value="<?php echo $value->proveedor_1   ?>"></td>
            <td><input type="text" class="w-100 formulacion_tinta" name="<?php echo $value->id_tinta  ?>" id="porcentaje_tinta_1" value="<?php echo $value->porcentaje_tinta_1   ?>"></td>
        </tr>
        <tr>
            <td><input type="text" class="w-100 formulacion_tinta" name="<?php echo $value->id_tinta  ?>" id="descripcion_2" value="<?php echo $value->descripcion_2  ?>"></td>
            <td><input type="text" class="w-100 formulacion_tinta" name="<?php echo $value->id_tinta  ?>" id="proveedor_2" value="<?php echo $value->proveedor_2   ?>"></td>
            <td><input type="text" class="w-100 formulacion_tinta" name="<?php echo $value->id_tinta  ?>" id="porcentaje_tinta_2" value="<?php echo $value->porcentaje_tinta_2  ?>"></td>
        </tr>
        <tr>
            <td rowspan="2" class="align-middle">a=<input type="text" class="w-75 formulacion_tinta" name="ciel_a_4" id="cie_A" value="<?php echo $value->cie_A  ?>"></td>
            <td><input type="text" class="w-100 formulacion_tinta" name="<?php echo $value->id_tinta  ?>" id="descripcion_3" value="<?php echo $value->descripcion_3   ?>"></td>
            <td><input type="text" class="w-100 formulacion_tinta" name="<?php echo $value->id_tinta  ?>" id="proveedor_3" value="<?php echo $value->proveedor_3   ?>"></td>
            <td><input type="text" class="w-100 formulacion_tinta" name="<?php echo $value->id_tinta  ?>" id="porcentaje_tinta_3" value="<?php echo $value->porcentaje_tinta_3   ?>"></td>
        </tr>
        <tr>
            <td><input type="text" class="w-100 formulacion_tinta" name="<?php echo $value->id_tinta  ?>" id="descripcion_4" value="<?php echo $value->descripcion_4   ?>"></td>
            <td><input type="text" class="w-100 formulacion_tinta" name="<?php echo $value->id_tinta  ?>" id="proveedor_4" value="<?php echo $value->proveedor_4   ?>"></td>
            <td><input type="text" class="w-100 formulacion_tinta" name="<?php echo $value->id_tinta  ?>" id="porcentaje_tinta_4" value="<?php echo $value->porcentaje_tinta_4  ?>"></td>
        </tr>
        <tr>
            <td rowspan="2" class="align-middle">b=<input type="text" class="w-75 formulacion_tinta" name="<?php echo $value->id_tinta  ?>" id="cie_B" value="<?php echo $value->cie_B  ?>"></td>
            <td><input type="text" class="w-100 formulacion_tinta" name="<?php echo $value->id_tinta  ?>" id="descripcion_5" value="<?php echo $value->descripcion_5  ?>"></td>
            <td><input type="text" class="w-100 formulacion_tinta" name="<?php echo $value->id_tinta  ?>" id="proveedor_5" value="<?php echo $value->proveedor_5   ?>"></td>
            <td><input type="text" class="w-100 formulacion_tinta" name="<?php echo $value->id_tinta  ?>" id="porcentaje_tinta_5" value="<?php echo $value->porcentaje_tinta_5  ?>"></td>
        </tr>
        <tr>
            <td><input type="text" class="w-100 formulacion_tinta" name="<?php echo $value->id_tinta  ?>" id="descripcion_6" value="<?php echo $value->descripcion_6  ?>"></td>
            <td><input type="text" class="w-100 formulacion_tinta" name="<?php echo $value->id_tinta  ?>" id="proveedor_6" value="<?php echo $value->proveedor_6   ?>"></td>
            <td><input type="text" class="w-100 formulacion_tinta" name="<?php echo $value->id_tinta  ?>" id="porcentaje_tinta_6" value="<?php echo $value->porcentaje_tinta_6  ?>"></td>
        </tr>
        </tr>
    <?php } ?>





    <tr>
        <td colspan="2">DATOS DE INSTRUMENTO</td>
        <td><input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="datos_instrumento" value="<?php echo $data[0]->datos_instrumento ?>"></td>
        <td><b>CALIBRACION DE PAPEL</b></td>
        <td class="text-center">
            <input class="form-check-input " type="radio" name="calibracion_papel" value="SI" id="calibracion_papel1" role="<?php echo $data[0]->ID ?>" value="SI" <?php echo ($data[0]->calibracion_papel == "SI") ? 'checked="checked"' : ' '; ?>>
            <label class="form-check-label" for="calibracion_papel1">SI</label>
        <td class="text-center">
            <input class="form-check-input " type="radio" name="calibracion_papel" value="NO" id="calibracion_papel2" role="<?php echo $data[0]->ID ?>" value="NO" <?php echo ($data[0]->calibracion_papel == "NO") ? 'checked="checked"' : ' '; ?>>
            <label class="form-check-label" for="calibracion_papel2">NO</label>
    </tr>


</table>
<!-- 
    <button class="" name=""  style="float: right;margin-right:-35px;margin-top:-120px; font-size: 12px;">
        a
    </button> -->
<button type="button" id="<?php echo $data[0]->ID ?>" style="float: right;margin-right:-35px;margin-top:-120px; font-size: 12px; color: white;" class="btn btn-git agregar-tintas botones">+</button>


<?php /* print_r($formulacion_tinta) */ ?>
<table class="table w-100">
    <tr>
        <td colspan="3" class="text-center">
            <b>Filtro de densidad</b>
        </td>
        <td class="text-center" colspan="2">
            <b>Filtro polarizador</b>
        </td>
        <td class="text-left" colspan="3">
            <b>Referencia de blanco</b>
        </td>
    </tr>
    <tr>

        <td class="text-center pintado">
            DENSIDAD
        </td>
        <td class="text-center pintado">
            <input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="filtro_densidad" value="<?php echo $data[0]->filtro_densidad   ?>">
        </td>
        <td> </td>
        <td class="text-center pintado">
            <input type="text" class="w-75 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="filtro_polarizador_1" value="<?php echo $data[0]->filtro_polarizador_1  ?>">
        </td>
        <td></td>
        <td class="text-center pintado">
            <input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="referencia_blanco_1" value="<?php echo $data[0]->referencia_blanco_1  ?>">
        </td>
        <td></td>
        <td class="text-center">

        </td>
    </tr>
    <tr>
        <td colspan="3" class="text-center">
            <b>Iluminacion/Observador</b>
        </td>
        <td class="text-center" colspan="2">
            <b>Filtro polarizador</b>
        </td>
        <td class="text-center" colspan="2">
            <b>Referencia de blanco</b>
        </td>
        <td class="text-center">
            <b>Condicion de medicion</b>
        </td>
    </tr>
    <tr>
        <td class="text-center pintado">
            CIE *L*a*b
        </td>
        <td class="text-center pintado">
            <input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="iluminacion_observador" value="<?php echo $data[0]->iluminacion_observador   ?>">
        </td>
        <td> </td>
        <td class="text-center pintado">
            <input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="filtro_polarizador_2" value="<?php echo $data[0]->filtro_polarizador_2 ?>">
        </td>
        <td></td>
        <td class="text-center pintado">
            <input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="referencia_blanco_2" value="<?php echo $data[0]->referencia_blanco_2   ?>">
        </td>
        <td></td>
        <td class="text-center">
            <input type="text" class="w-100 input_ficha_impresora" name="<?php echo $data[0]->ID ?>" id="condicion_medicion" value="<?php echo $data[0]->condicion_medicion  ?>">
        </td>
    </tr>
</table>
</div>

<script type="text/javascript" src="<?php echo base_url("resources/app/Calidad/ficha_tecnica/js/ficha_impresora.js"); ?>"></script>