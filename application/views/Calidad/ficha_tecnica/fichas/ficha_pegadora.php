<style>
    .ficha-pegadora {
        box-sizing: border-box;
        width: 1200px;
        /*border: solid #5B6DCD 10px;*/
        padding: 5px;
    }
</style>
<var class="tipo_ficha" id="pegadora"></var>
<div class="ficha-pegadora mx-auto container" id="reporteria">
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
                    <h4>ESPECIFICA DEL PRODUCTO PEGADORA</h4>
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
    <input type="hidden" value="pegadora" name="tipo_ficha" id="tipo_ficha">

    <div class="row m-0 p-0 especificaciones">
        <div class="col-12">
            ESPECIFICACIONES
        </div>

        <div class="row m-0 p-0 mx-auto">
            <div class="col-6">
                CLIENTE: <input type="text" class="w-75 ficha_pegadora input_ficha_pegadora" id="cliente" name="<?php echo $data[0]->ID ?>" value="<?php echo $data[0]->cliente  ?>">
            </div>
            <div class="col-6">
                PRODUCTO: <input type="text" class="w-75 input_ficha_pegadora" id="producto" name="<?php echo $data[0]->ID ?>" value="<?php echo $data[0]->producto  ?>">
            </div>
        </div>
        <div class="row m-0 p-0">
            <div class="col-4">
                TIPO DE PRODUCTO: <input type="text" class="w-50 input_ficha_pegadora" id="tipo_producto" name="<?php echo $data[0]->ID ?>" value="<?php echo $data[0]->tipo_producto  ?>">
            </div>
            <div class="col-4">
                FECHA: <input type="date" class="w-75 input_ficha_pegadora" id="fecha_creacion" name="<?php echo $data[0]->ID ?>" value="<?php echo $data[0]->fecha_creacion   ?>">
            </div>
            <div class="col-4">
                COD. PRODUCTO: <input type="text" class="w-50 input_ficha_pegadora" id="codigo_producto" name="<?php echo $data[0]->ID ?>" value="<?php echo $data[0]->cod_producto   ?>">
            </div>
        </div>
        <div class="row m-0 p-0">
            <div class="col-4">
                OT: <input type="text" class="w-75 input_ficha_pegadora" id="ot" name="<?php echo $data[0]->ID ?>" value="<?php echo $data[0]->ot ?>">
            </div>
            <div class="col-4">
                MAQUINA: <input type="text" class="w-75 input_ficha_pegadora" id="maquina" name="<?php echo $data[0]->ID ?>" value="<?php echo $data[0]->maquina  ?>">
            </div>
            <div class="col-4">
                OPERARIO: <input type="text" class="w-75 input_ficha_pegadora" id="operario" name="<?php echo $data[0]->ID ?>" value="<?php echo $data[0]->operario  ?>">
            </div>
        </div>
    </div>



    <table class="table w-100 mt-3">
        <tr class="text-center bg-black text-light ">
            <td colspan="2" class="border border-light" style="color: white;">ITEM</td>
            <td colspan="2" class="border border-light" style="color: white;">GENERALIDADES</td>
            <td colspan="2" class="border border-light"></td>
        </tr>

        <tbody>
            <tr>
                <td colspan="2" class="pintado">TIPO DE MATERIAL: <input type="text" class="w-50 input_ficha_pegadora" id="tipo_material" name="<?php echo $data[0]->ID ?>" value="<?php echo $data[0]->tipo_material   ?>"></td>
                <td colspan="2"><input type="text" class="w-100 input_ficha_pegadora" id="generalidad_1" name="<?php echo $data[0]->ID ?>" value="<?php echo $data[0]->generalidad_1 ?>"></td>
                <td colspan="2">Sin tolerancia</td>
            </tr>
            <tr>
                <td class="pintado text-center">CALIBRE</td>
                <td class="pintado text-center">PROVEEDOR</td>
                <td><input type="text" class="w-100 input_ficha_pegadora" id="generalidad_2" name="<?php echo $data[0]->ID ?>" value="<?php echo $data[0]->generalidad_2 ?>"></td>
                <td><input type="text" class="w-100 input_ficha_pegadora" id="generalidad_3" name="<?php echo $data[0]->ID ?>" value="<?php echo $data[0]->generalidad_3  ?>"></td>
                <td colspan="2">+/- 0.001 milesima de pulgada</td>
            </tr>

            <tr class="text-center bg-black text-light">
                <td colspan="2"></td>
                <td colspan="2" style="color: white;">
                    ESPECIFICACIONES DE PEGADO
                </td>
                <td colspan="2">

                </td>
            </tr>
            <tr>
                <td colspan="2" class="pintado">
                    VELOCIDAD DE MAQUINA
                </td>
                <td colspan="2"><input type="text" class="w-100 input_ficha_pegadora" id="velocidad_maquina_pegado_1" name="<?php echo $data[0]->ID ?>" value="<?php echo $data[0]->velocidad_maquina_pegado_1  ?>"></td>
                <td colspan="2"><input type="text" class="w-100 input_ficha_pegadora" id="velocidad_maquina_pegado_2" name="<?php echo $data[0]->ID ?>" value="<?php echo $data[0]->velocidad_maquina_pegado_2 ?>"></td>

            </tr>
            <tr>
                <td colspan="2" class="pintado">
                    PRESION DE BANDA COLECTORA
                </td>
                <td colspan="2"><input type="text" class="w-100 input_ficha_pegadora" id="presion_banda_1" name="<?php echo $data[0]->ID ?>" value="<?php echo $data[0]->presion_banda_1  ?>"></td>
                <td colspan="2"><input type="text" class="w-100 input_ficha_pegadora" id="presion_banda_2" name="<?php echo $data[0]->ID ?>" value="<?php echo $data[0]->presion_banda_2   ?>"></td>
            </tr>
            <tr>
                <td rowspan="5" colspan="2" class="align-middle text-center pintado">
                    TIPO DE PEGADO
                </td>
            <tr>
                <td colspan="2" class="pintado">
                    PEGADO DE LINEA RECTA
                    <span class="float-end" id="dif">
                        <input class="form-check-input" type="radio" role="<?php echo $data[0]->ID ?>" name="pegado_linea_recta" id="pegado_linea_recta_1" value="SI" <?php echo ($data[0]->pegado_linea_recta == "SI") ? 'checked="checked"' : ' '; ?>>
                        <label class="form-check-label" for="pegado_linea_recta_1">SI</label>

                        <input class="form-check-input" type="radio" role="<?php echo $data[0]->ID ?>" name="pegado_linea_recta" id="pegado_linea_recta_2" value="NO" <?php echo ($data[0]->pegado_linea_recta == "NO") ? 'checked="checked"' : ' '; ?>>
                        <label class="form-check-label" for="pegado_linea_recta_2">NO</label>
                    </span>
                </td>
                <td colspan="2">
                    <input type="text" class="w-100" disabled>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <span class="float-start" id="dif">
                        <input class="form-check-input" type="checkbox" role="<?php echo $data[0]->ID ?>" name="pegado_linea_recta_disco" value="SI" id="pegado_linea_recta_disco" <?php echo ($data[0]->pegado_linea_recta_disco == "SI") ? 'checked="checked"' : ' '; ?>>
                        <label class="form-check-label" for="pegado_linea_recta_disco" style="color: black;font-size: 10pt">DISCO</label>
                    </span>
                    <span class="float-end" id="dif">
                        <input class="form-check-input" type="checkbox" role="<?php echo $data[0]->ID ?>" name="pegado_linea_recta_pistola" value="SI" id="pegado_linea_recta_pistola1" <?php echo ($data[0]->pegado_linea_recta_pistola == "SI") ? 'checked="checked"' : ' '; ?>>
                        <label class="form-check-label" for="pegado_linea_recta_pistola1" style="color: black;font-size: 10pt">PISTOLA</label>
                    </span>
                </td>
                <td colspan="2"> Marque la opcion</td>
            </tr>
            <tr>
                <td colspan="2" class="pintado">PEGADO DE FONDO AUTOMATICO:
                    <span class="float-end" id="dif">
                        <input class="form-check-input" type="radio" role="<?php echo $data[0]->ID ?>" name="pegado_fondo_automatico" id="pegado_fondo_automatico" value="SI" <?php echo ($data[0]->pegado_fondo_automatico == "SI") ? 'checked="checked"' : ' '; ?>>
                        <label class="form-check-label" for="pegado_fondo_automatico">SI</label>
                        <input class="form-check-input" type="radio" role="<?php echo $data[0]->ID ?>" name="pegado_fondo_automatico" id="pegado_fondo_automatico1" value="NO" <?php echo ($data[0]->pegado_fondo_automatico == "NO") ? 'checked="checked"' : ' '; ?>>
                        <label class="form-check-label" for="pegado_fondo_automatico1">NO</label>
                    </span>
                </td>
                <td colspan="2"><input type="text" class="w-100"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <span class="float-start" id="dif">
                        <input class="form-check-input" type="checkbox" role="<?php echo $data[0]->ID ?>" name="pegado_fondo_automatico_disco" value="SI" id="pegado_fondo_automatico_disco1" <?php echo ($data[0]->pegado_linea_recta_disco == "SI") ? 'checked="checked"' : ' '; ?>>
                        <label class="form-check-label" for="pegado_fondo_automatico_disco1" style="color: black;font-size: 10pt">DISCO</label>
                    </span>
                    <span class="float-end" id="dif">
                        <input class="form-check-input" type="checkbox" role="<?php echo $data[0]->ID ?>" name="pegado_fondo_automatico_disco" value="NO" id="pegado_fondo_automatico_disco2" <?php echo ($data[0]->pegado_linea_recta_pistola == "SI") ? 'checked="checked"' : ' '; ?>>
                        <label class="form-check-label" for="pegado_fondo_automatico_disco2" style="color: black;font-size: 10pt">PISTOLA</label>
                    </span>
                <td colspan="2"> Marque la opcion</td>
            </tr>
            </tr>
            <tr>
                <td colspan="2" rowspan="3" class="align-middle text-center pintado">
                    TIPO DE PEGA
                    <p>Agregar codigo, marca</p>
                </td>
            <tr>
                <td colspan="2">DISCO: <input type="text" class="w-75 input_ficha_pegadora" name="<?php echo $data[0]->ID ?>" id="tipo_pega_disco_1" value="<?php echo $data[0]->tipo_pega_disco_1   ?>"></td>
                <td colspan="2"><input type="text" class="w-100 input_ficha_pegadora" name="<?php echo $data[0]->ID ?>" id="tipo_pega_disco_2" value="<?php echo $data[0]->tipo_pega_disco_2  ?>"></td>
            </tr>
            <tr>
                <td colspan="2">PISTOLA: <input type="text" class="w-75 input_ficha_pegadora" name="<?php echo $data[0]->ID ?>" id="tipo_pega_pistola_1" value="<?php echo $data[0]->tipo_pega_pistola_1  ?>"></td>
                <td colspan="2"><input type="text" class="w-100 input_ficha_pegadora" name="<?php echo $data[0]->ID ?>" id="tipo_pega_pistola_2" value="<?php echo $data[0]->tipo_pega_pistola_2  ?>"></td>
            </tr>
            </tr>

            <tr class="text-center bg-black text-light">
                <td colspan="2"></td>
                <td colspan="2" style="color:white;">
                    DISCO
                </td>
                <td colspan="2">

                </td>
            </tr>
            <tr>
                <td class="pintado">LOTE</td>
                <td class="pintado">VENCE</td>
                <td><input type="text" class="w-100 input_ficha_pegadora" name="<?php echo $data[0]->ID ?>" id="disco_lote" value="<?php echo $data[0]->disco_lote   ?>"></td>
                <td><input type="text" class="w-100 input_ficha_pegadora" name="<?php echo $data[0]->ID ?>" id="disco_lote" value="<?php echo $data[0]->disco_vence   ?>"></td>
                <td colspan="2">Vence sin tolerancia</td>
            </tr>
            <tr class="text-center bg-black text-light">
                <td colspan="2"></td>
                <td colspan="2" style="color:white;">
                    PISTOLA
                </td>
                <td colspan="2">

                </td>
            </tr>
            <tr>
                <td class="pintado">LOTE</td>
                <td class="pintado">VENCE</td>
                <td><input type="text" class="w-100 input_ficha_pegadora" name="<?php echo $data[0]->ID ?>" id="pistola_vence" value="<?php echo $data[0]->pistola_vence  ?>"></td>
                <td><input type="text" class="w-100 input_ficha_pegadora" name="<?php echo $data[0]->ID ?>" id="pistola_lote" value="<?php echo $data[0]->pistola_lote  ?>"></td>
                <td colspan="2">Vence sin tolerancia</td>
            </tr>
            <tr>
                <td class="pintado" colspan="2">N° DE BANDAS A TRANSFERIR</td>
                <td colspan="2"><input type="text" class="w-100 input_ficha_pegadora" name="<?php echo $data[0]->ID ?>" id="bandas_transferir" value="<?php echo $data[0]->bandas_transferir  ?>"></td>
                <td colspan="2"><span>*Numero de bandas que pasan sobre la caja durante la producción maquina*</span></td>
            </tr>
            <tr class="text-center bg-black text-light">
                <td colspan="2"></td>
                <td colspan="2" style="color:white;">
                    PEGADO DE ACETATO
                </td>
                <td colspan="2">

                </td>
            </tr>
            <tr>
                <td colspan="2" class="pintado">VELOCIDAD DE PEGADO</td>
                <td colspan="2"><input type="text" class="w-100 input_ficha_pegadora" name="<?php echo $data[0]->ID ?>" id="velocidad_pegado_1" value="<?php echo $data[0]->velocidad_pegado_1  ?>"></td>
                <td colspan="2"><input type="text" class="w-100 input_ficha_pegadora" name="<?php echo $data[0]->ID ?>" id="velocidad_pegado_2" value="<?php echo $data[0]->velocidad_pegado_2   ?>"></td>
            </tr>
            <tr>
                <td colspan="2" class="pintado">TIPO DE ACETATO</td>
                <td colspan="2"><input type="text" class="w-100 input_ficha_pegadora" name="<?php echo $data[0]->ID ?>" id="tipo_acetato_1" value="<?php echo $data[0]->tipo_acetato_1   ?>"></td>
                <td colspan="2"><input type="text" class="w-100 input_ficha_pegadora" name="<?php echo $data[0]->ID ?>" id="tipo_acetato_2" value="<?php echo $data[0]->tipo_acetato_2    ?>"></td>
            </tr>
            <tr>
                <td colspan="2" class="pintado">ESPESOR DE ACETATO</td>
                <td colspan="2"><input type="text" class="w-100 input_ficha_pegadora" name="<?php echo $data[0]->ID ?>" id="espesor_acetato_1" value="<?php echo $data[0]->espesor_acetato_1  ?>"></td>
                <td colspan="2"><input type="text" class="w-100 input_ficha_pegadora" name="<?php echo $data[0]->ID ?>" id="espesor_acetato_2" value="<?php echo $data[0]->espesor_acetato_2   ?>"></td>
            </tr>
            <tr>
                <td colspan="2" class="pintado">MEDIDA DE ACETATO</td>
                <td>ANCHO: <input type="text" class="w-50 input_ficha_pegadora" name="<?php echo $data[0]->ID ?>" id="medida_acetato_ancho" value="<?php echo $data[0]->medida_acetato_ancho    ?>"></td>
                <td>LARGO: <input type="text" class="w-50 input_ficha_pegadora" name="<?php echo $data[0]->ID ?>" id="medida_acetato_largo" value="<?php echo $data[0]->medida_acetato_largo  ?>"></td>
                <td colspan="2">+/- 2 mm</td>

            </tr>
            <tr>
                <td colspan="2" class="text-center pintado">TIPO DE PEGA <span>*Agregar codigo y marca*</span></td>
                <td>ANCHO: <input type="text" class="w-50 input_ficha_pegadora" name="<?php echo $data[0]->ID ?>" id="tipo_pega_1" value="<?php echo $data[0]->tipo_pega_1  ?>"></td>
                <td>LARGO: <input type="text" class="w-50 input_ficha_pegadora" name="<?php echo $data[0]->ID ?>" id="tipo_pega_2" value="<?php echo $data[0]->tipo_pega_2   ?>"></td>
                <td colspan="2">+/- 2 mm</td>
            </tr>
            <tr>
                <td class="pintado">LOTE</td>
                <td class="pintado">VENCE</td>
                <td><input type="text" class="w-100 input_ficha_pegadora" name="<?php echo $data[0]->ID ?>" id="acetato_lote" value="<?php echo $data[0]->acetato_lote   ?>"></td>
                <td><input type="text" class="w-100 input_ficha_pegadora" name="<?php echo $data[0]->ID ?>" id="acetato_vence" value="<?php echo $data[0]->acetato_vence  ?>"></td>
                <td colspan="2">Vence sin tolerancia</td>
            </tr>

            <tr>
                <td colspan="2" class="pintado">ALIMENTACION</td>
                <td>
                    <span class="float-start" id="dif">
                        <input class="form-check-input" type="checkbox" role="<?php echo $data[0]->ID ?>" name="alimentacion_doble" value="SI" id="alimentacion_doble" <?php echo ($data[0]->alimentacion_doble == "SI") ? 'checked="checked"' : ' '; ?>>
                        <label class="form-check-label" for="alimentacion_doble" style="color: black;font-size: 10pt">DOBLE</label>
                    </span>
                </td>
                <td>
                    <span class="float-start" id="dif">
                        <input class="form-check-input" type="checkbox" role="<?php echo $data[0]->ID ?>" name="alimentacion_individual" value="SI" id="alimentacion_individual" <?php echo ($data[0]->alimentacion_individual == "SI") ? 'checked="checked"' : ' '; ?>>
                        <label class="form-check-label" for="alimentacion_individual" style="color: black;font-size: 10pt">INDIVIDUAL</label>
                    </span>
                </td>
                <td colspan="2">Vence sin tolerancia</td>
            </tr>
            <tr class="text-center bg-black text-light">
                <td colspan="2"></td>
                <td colspan="2">
                    EMPACADO
                </td>
                <td colspan="2">
                </td>
            </tr>

            <tr>
                <td colspan="2" class="pintado">
                    TIPO DE CORRUGADO
                </td>
                <td colspan="2"><input type="text" class="w-100 input_ficha_pegadora" id="tipo_corrugado_1" name="<?php echo $data[0]->ID ?>" value="<?php echo $data[0]->tipo_corrugado_1    ?>"></td>
                <td colspan="2"><input type="text" class="w-100 input_ficha_pegadora" id="tipo_corrugado_2" name="<?php echo $data[0]->ID ?>"" value=" <?php echo $data[0]->tipo_corrugado_2   ?>"></td>
            </tr>

            <tr>
                <td colspan="2" class="pintado">
                    UNIDADES DE CORRUGADO
                </td>
                <td colspan="2"><input type="text" class="w-100 input_ficha_pegadora" id="unidades_corrugado_1" name="<?php echo $data[0]->ID ?>"" value=" <?php echo $data[0]->unidades_corrugado_1   ?>"></td>
                <td colspan="2"><input type="text" class="w-100 input_ficha_pegadora" id="unidades_corrugado_2" name="<?php echo $data[0]->ID ?>"" value=" <?php echo $data[0]->unidades_corrugado_2   ?>"></td>
            </tr>
            <tr>
                <td colspan="2" class="pintado">
                    PRODOUCTO FAJADO
                </td>
                <td colspan="2" class="text-center">

                    <span class="float-end" id="dif">
                        <input class="form-check-input" type="radio" role="<?php echo $data[0]->ID ?>" name="producto_fajado" id="producto_fajado1" value="SI" <?php echo ($data[0]->producto_fajado == "SI") ? 'checked="checked"' : ' '; ?>>
                        <label class="form-check-label" for="producto_fajado1">SI</label>
                        <input class="form-check-input" type="radio" role="<?php echo $data[0]->ID ?>" name="producto_fajado" id="producto_fajado2" value="NO" <?php echo ($data[0]->producto_fajado == "NO") ? 'checked="checked"' : ' '; ?>>
                        <label class="form-check-label" for="producto_fajado2">NO</label>
                    </span>


                </td>
                <td colspan="2">Marque la opcion</td>
            </tr>
            <tr>
                <td colspan="2" class="pintado">
                    UNIDADES POR FAJADO
                </td>
                <td colspan="2"><input type="text" class="w-100 input_ficha_pegadora" name="<?php echo $data[0]->ID ?>" id="unidades_fajado_1" value="<?php echo $data[0]->unidades_fajado_1   ?>"></td>
                <td colspan="2"><input type="text" class="w-100 input_ficha_pegadora" name="<?php echo $data[0]->ID ?>" id="unidades_fajado_2" value="<?php echo $data[0]->unidades_fajado_2   ?>"></td>
            </tr>
            <tr>
                <td colspan="6">Observaciones</td>
            </tr>
            <tr>
                <td colspan="6">
                    <textarea class="w-100 input_ficha_pegadora" name="<?php echo $data[0]->ID ?>" id="observaciones" cols="20" rows="3"><?php echo $data[0]->observaciones ?></textarea>
                </td>
            </tr>
            <tr style="height:25px"></tr>
            <tr class="text-center bg-black text-light">
                <td colspan="2"></td>
                <td colspan="2">
                    ENCARGADOS CALIDAD:
                </td>
                <td colspan="2">
                </td>
            </tr>

            <center>
                <tr>
                    <td colspan="2" class="border border-white">DEPARTAMENTO DE CALIDAD</td>
                    <td class="border border-white" colspan="2">
                        <input type="text" class="w-100 input_ficha_pegadora" id="encargados_nombre" placeholder="NOMBRE" id="nombre" name="encargados_nombre" value="<?php echo $data[0]->encargados_nombre    ?>">
                    </td>
                    <td class="border border-white">
                        <input type="text" class="w-100" placeholder="FIRMA" disabled id="firma">
                    </td>
                    <td class="border border-white">
                        <input type="text" class="w-100 text-center" placeholder="FECHA" value="<?php echo date('d/m/Y')  ?>" disabled id="fecha">
                    </td>
                </tr>
            </center>

        </tbody>
    </table>

</div>

<script type="text/javascript" src="<?php echo base_url("resources/app/Calidad/ficha_tecnica/js/ficha_pegadora.js"); ?>"></script>