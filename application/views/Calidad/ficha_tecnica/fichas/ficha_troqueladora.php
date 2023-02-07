<style>
    .ficha-troquelado {
        box-sizing: border-box;
        width: 1200px;
        /*border: solid #5B6DCD 10px;*/
        padding: 5px;
    }
</style>
<div class="ficha-troquelado mx-auto container" id="reporteria">

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
                    <h4>ESPECIFICA DEL PRODUCTO TROQUELADO</h4>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="row">
                <div class="col-12">
                    FECHA DE CREACIÓN: HOY
                </div>
                <div class="col-12">
                    VERSION: <span id="doc-version" style="margin-right: 80px;"></span> FICHA # <?php echo  $data[0]->ID   ?>
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

    <div class="row m-0 p-0 especificaciones">
        <div class="col-12">
            ESPECIFICACIONES
        </div>

        <div class="row m-0 p-0 mx-auto">
            <div class="col-6">
                CLIENTE: <input type="text" class="w-75" name="cliente" value="<?php echo $data[0]->cliente  ?>">
            </div>
            <div class="col-6">
                PRODUCTO: <input type="text" class="w-75" name="producto" value="<?php echo $data[0]->producto  ?>">
            </div>
        </div>
        <div class="row m-0 p-0">
            <div class="col-4">
                TIPO DE PRODUCTO: <input type="text" class="w-50" name="tipo_producto" value="<?php echo $data[0]->tipo_producto  ?>">
            </div>
            <div class="col-4">
                FECHA: <input type="date" class="w-75" name="fecha_creacion" value="<?php echo $data[0]->fecha_creacion   ?>">
            </div>
            <div class="col-4">
                COD. PRODUCTO: <input type="text" class="w-50" name="cod_producto" value="<?php echo $data[0]->cod_producto   ?>">
            </div>
        </div>
        <div class="row m-0 p-0">
            <div class="col-4">
                OT: <input type="text" class="w-75" name="ot" value="<?php echo $data[0]->ot ?>">
            </div>
            <div class="col-4">
                MAQUINA: <input type="text" class="w-75" name="maquina" value="<?php echo $data[0]->maquina  ?>">
            </div>
            <div class="col-4">
                OPERARIO: <input type="text" class="w-75" name="operario" value="<?php echo $data[0]->operario  ?>">
            </div>
        </div>
    </div>



    <table class="table w-100 mt-3">
        <tr class="text-center bg-black text-light ">
            <td colspan="2" class="border border-light">ITEM</td>
            <td colspan="2" class="border border-light">GENERALIDADES</td>
            <td colspan="2" class="border border-light"></td>
        </tr>
        <tbody>
            <tr>
                <td colspan="2" class="pintado">TIPO DE MATERIAL: <input type="text" class="w-50" name="tipo_material" value="<?php echo $data[0]->tipo_material  ?>"></td>
                <td colspan="2"><input type="text" class="w-100" name="generalidad_1" value="<?php echo $data[0]->generalidad_1  ?>"></td>
                <td colspan="2">Sin tolerancia</td>
            </tr>
            <tr>
                <td class="pintado text-center">CALIBRE</td>
                <td class="pintado text-center">PROVEEDOR</td>
                <td><input type="text" class="w-100" name="generalidad_2" value="<?php echo $data[0]->generalidad_2  ?>"></td>
                <td><input type="text" class="w-100" name="generalidad_3" value="<?php echo $data[0]->generalidad_3  ?>"></td>
                <td colspan="2">+/- 0.001 milesima de pulgada</td>
            </tr>
            <tr>
                <td colspan="2" class="pintado pt-0 pb-0">MEDIDA ANCHO SIN ARMAR</td>
                <td colspan="2" class="pt-0 pb-0"><input type="text" class="w-100" name="medida_ancho_sin_armar" value="<?php echo $data[0]->medida_ancho_sin_armar ?>"></td>
                <td colspan="2" class="pt-0 pb-0">+- 1milimetro</td>
            </tr>
            <tr>
                <td colspan="2" class="pintado pt-0 pb-0">MEDIDA LARGO SIN ARMAR</td>
                <td colspan="2" class="pt-0 pb-0"><input type="text" class="w-100" name="medida_largo_sin_armar" value="<?php echo $data[0]->medida_largo_sin_armar  ?>"></td>
                <td colspan="2" class="pt-0 pb-0">+- 1milimetro</td>
            </tr>

            <tr>
                <td colspan="2" class="pintado pt-0 pb-0">MEDIDA ALTO ARMADA</td>
                <td colspan="2" class="pt-0 pb-0"><input type="text" class="w-100" name="medida_alto_armada" value="<?php echo $data[0]->medida_alto_armada ?>"></td>
                <td colspan="2" class="pt-0 pb-0">+- 1milimetro</td>
            </tr>
            <tr>
                <td colspan="2" class="pintado pt-0 pb-0">MEDIDA ANCHO ARMADA</td>
                <td colspan="2" class="pt-0 pb-0"><input type="text" class="w-100" name="medida_ancho_armada" value="<?php echo $data[0]->medida_ancho_armada  ?>"></td>
                <td colspan="2" class="pt-0 pb-0">+- 1milimetro</td>
            </tr>
            <tr>
                <td colspan="2" class="pintado pt-0 pb-0">MEDIDA LARGO ARMADA</td>
                <td colspan="2" class="pt-0 pb-0"><input type="text" class="w-100" name="medida_largo_armada" value="<?php echo $data[0]->medida_largo_armada  ?>"></td>
                <td colspan="2" class="pt-0 pb-0">+- 1milimetro</td>
            </tr>

            <tr class="text-center bg-black text-light">
                <td colspan="2"></td>
                <td colspan="2">
                    ESPECIFICACIONES DE TROQUELADO
                </td>
                <td colspan="2">

                </td>
            </tr>
            <tr>
                <td colspan="2" class="pintado">
                    VELOCIDAD DE MAQUINA EN TROQUEL
                </td>
                <td colspan="2"><input type="text" class="w-100" name="velocidad_maquina_troquel" value="<?php echo $data[0]->velocidad_maquina_troquel  ?>"></td>
                <td colspan="2">En pliegos/Hora</td>

            </tr>
            <tr>
                <td colspan="2" class="pintado">
                    PRESION EN MAQUINA
                </td>
                <td colspan="2"><input type="text" class="w-100" name="presion_maquina1_troquelado" value="<?php echo $data[0]->presion_maquina1_troquelado ?>"></td>
                <td colspan="2"><input type="text" class="w-100" name="presion_maquina_2_troquelado" value="<?php echo $data[0]->presion_maquina_2_troquelado  ?>"></td>
            </tr>
            <tr>
                <td colspan="2" class="pintado">
                    CODIGO INTERNO DE TROQUEL
                </td>
                <td colspan="2"><input type="text" class="w-100" name="codigo_interno_troquel" value="<?php echo $data[0]->codigo_interno_troquel  ?>"></td>
                <td colspan="2">Sin tolerancia</td>

            </tr>
            <tr>
                <td colspan="2" class="pintado">
                    TIPO DE MATRIZ
                    <span>* Agregar codigo o nombre, y marca * </span>
                </td>
                <td colspan="2"><input type="text" class="w-100" name="tipo_matriz" value="<?php echo $data[0]->tipo_matriz  ?>"></td>
                <td colspan="2">Sin tolerancia</td>
            </tr>

            <tr class="text-center bg-black text-light">
                <td colspan="2"></td>
                <td colspan="2">
                    TIPO DE PLECA
                </td>
                <td colspan="2">

                </td>
            </tr>
            <tr>
                <td class="pintado" colspan="2">PLECA DE SISA <span>*Medidas</span></td>
                <td colspan="2"><input type="text" class="w-100" name="pleca_sisa_1" value="<?php echo $data[0]->pleca_sisa_1 ?>"></td>
                <td colspan="2"><input type="text" class="w-100" name="pleca_sisa_2" value="<?php echo $data[0]->pleca_sisa_2 ?>"></td>
            </tr>

            <tr>
                <td class="pintado" colspan="2">PLECA DE CORTE <span>*Medidas</span></td>
                <td colspan="2"><input type="text" class="w-100" name="pleca_corte_1" value="<?php echo $data[0]->pleca_corte_1  ?>"></td>
                <td colspan="2"><input type="text" class="w-100" name="pleca_corte_2" value="<?php echo $data[0]->pleca_corte_2 ?>"></td>
            </tr>

            <tr>
                <td colspan="2" class="pintado pt-0 pb-0"> AYUDAS DE PEGUE (PERFORADO EN AREA DE PEGUE)</td>
                <td class="pt-0 pb-0 text-center align-middle" style="font-size:15px;">
                    LINEA RECTA: SI<input type="radio" name="linea_recta" <?php if ($data[0]->linea_recta == "SI") { ?> checked <?php } ?> id="linea_recta" class="m-2" value="SI"> NO<input type="radio" name="linea_recta" <?php if ($data[0]->linea_recta == "NO") { ?> checked <?php } ?> id="linea_recta" class="m-2" value="NO">
                </td>
                <td class="pt-0 pb-0 text-center align-middle" style="font-size:15px;">
                    45°: SI<input type="radio" name="cuatro_5" <?php if ($data[0]->cuatro_5 == "SI") { ?> checked <?php } ?> class="m-2" value="SI" id="cuatro_5"> NO<input type="radio" name="cuatro_5" <?php if ($data[0]->cuatro_5 == "NO") { ?> checked <?php } ?> id="cuatro_5" class="m-2" value="NO">
                </td>
                <td colspan="2" class="align-middle pt-0 pb-0">Marque las opciones</td>
            </tr>

            <tr>
                <td colspan="2" class="pintado">AJUGEROS(TAMAÑO)</td>
                <td colspan="2">
                    <input type="text" class="w-100" name="agujeros_tamano" value="<?php echo $data[0]->agujeros_tamano  ?>">
                </td>

                <td colspan="2" class="align-middle">Tamaño en mm y pulgadas</td>
            </tr>

            <tr>
                <td colspan="2" rowspan="3" class="pintado align-middle"> DESBASURADO EN MAQUINA</td>

            <tr>
                <td><span>AGUJERO</span></td>

                <td class="text-center">
                    SI<input type="radio" name="agujero" <?php if ($data[0]->agujero == "SI") { ?> checked <?php } ?> id="agujero" class="m-2" value="SI"> NO<input type="radio" name="agujero" <?php if ($data[0]->agujero == "NO") { ?> checked <?php } ?> id="agujero" class="m-2" value="NO">
                </td>
                <td colspan="2" rowspan="2" class="align-middle">Marque las opciones</td>
            </tr>
            <tr>

                <td><span>BASURA DE MATERIAL</span></td>
                <td class="text-center">
                    SI<input type="radio" name="basura_material" <?php if ($data[0]->basura_material == "SI") { ?> checked <?php } ?> id="basura_material" class="m-2" value="SI"> NO<input type="radio" name="basura_material" <?php if ($data[0]->basura_material == "NO") { ?> checked <?php } ?> id="basura_material" class="m-2" value="NO">
                </td>

            </tr>

            </tr>

            <tr>
                <td colspan="2" class="pintado">REPETICIONES POR TROQUEL</td>
                <td colspan="2">
                    <input type="text" class="w-100" name="repeticiones_troquel" value="<?php echo $data[0]->repeticiones_troquel ?>">
                </td>

                <td colspan="2" class="align-middle">Numero de piezas troqueladas</td>
            </tr>

            <tr class="text-center bg-black text-light">
                <td colspan="2"></td>
                <td colspan="2">
                    REALZADO
                </td>
                <td colspan="2">

                </td>
            </tr>
            <tr>
                <td class="pintado" colspan="2">VELOCIDAD DE MAQUINA</td>

                <td colspan="2"><input type="text" class="w-100" name="velocidad_maquina_realzado" value="<?php echo $data[0]->velocidad_maquina_realzado  ?>"></td>
                <td colspan="2">En Pliegos/Hora</td>
            </tr>
            <tr>
                <td class="pintado" colspan="2">PRESION EN MAQUINA</td>
                <td colspan="2"><input type="text" class="w-100" name="presion_maquina_realzado_1" value="<?php echo $data[0]->presion_maquina_realzado_1 ?>"></td>
                <td colspan="2"><input type="text" class="w-100" name="presion_maquina_realzado_2" value="<?php echo $data[0]->presion_maquina_realzado_2  ?>"></td>
            </tr>

            <tr>
                <td colspan="2" class="pintado pt-0 pb-0a align-middle">TIPO DE CLICHE</td>
                <td class="text-center pt-0 pb-0 align-middle">MACHO: <input type="checkbox" name="tipo_cliche_realzado_macho" <?php if ($data[0]->tipo_cliche_realzado_macho == "SI") { ?> checked <?php } ?> id="tipo_cliche_realzado_macho"></td>
                <td class="text-center pt-0 pb-0 align-middle">HEMBRA: <input type="checkbox" name="tipo_cliche_realzado_hembra" <?php if ($data[0]->tipo_cliche_realzado_hembra == "SI") { ?> checked <?php } ?> id="tipo_cliche_realzado_hembra"></td>
                <td colspan="2" class="pt-0 pb-0 align-middle">Marque las opciones</td>
            </tr>
            <tr>
                <td colspan="2" class="pintado align-middle">CANTIDAD DE REALZADOS</td>
                <td colspan="2"><input type="text" class="w-100" name="cantidad_realzados" value="<?php echo $data[0]->cantidad_realzados  ?>"></td>
                <td colspan="2">Numero de realzados hechos en 1 pasada de maquina</td>
            </tr>

            <tr class="text-center bg-black text-light">
                <td colspan="2"></td>
                <td colspan="2">
                    HOT FOIL
                </td>
                <td colspan="2">

                </td>
            </tr>
            <tr>
                <td colspan="2" class="pintado">VELOCIDAD DE MAQUINA</td>
                <td colspan="2"><input type="text" class="w-100" name="velocidad_maquina_hot" value="<?php echo $data[0]->velocidad_maquina_hot ?>"></td>
                <td colspan="2">En Pliegos/Hora</td>
            </tr>
            <tr>
                <td colspan="2" class="pintado">TIPO DE FOIL(COLOR Y PROVEEDOR)</td>
                <td><input type="text" class="w-100" name="tipo_foil_1" value="<?php echo $data[0]->tipo_foil_1 ?>"></td>
                <td><input type="text" class="w-100" name="tipo_foil_2" value="<?php echo $data[0]->tipo_foil_2 ?>"></td>
                <td colspan="2"><input type="text" class="w-100" name="tipo_foil_3" value="<?php echo $data[0]->tipo_foil_3 ?>"></td>
            </tr>
            <tr>
                <td colspan="2" class="pintado">CODIGO DE FOIL</td>
                <td colspan="2"><input type="text" class="w-100" name="codigo_foil_1" value="<?php echo $data[0]->codigo_foil_1  ?>"></td>
                <td colspan="2"><input type="text" class="w-100" name="codigo_foil_2" value="<?php echo $data[0]->codigo_foil_2 ?>"></td>
            </tr>
            <tr>
                <td colspan="2" class="pintado">LOTE DE FOIL</td>
                <td colspan="2"><input type="text" class="w-100" name="lote_foil_1" value="<?php echo $data[0]->lote_foil_1 ?>"></td>
                <td colspan="2"><input type="text" class="w-100" name="lote_foil_2" value="<?php echo $data[0]->lote_foil_2 ?>"></td>
            </tr>
            <tr>
                <td colspan="2" class="pintado">PRESION DE MAQUINA</td>
                <td colspan="2"><input type="text" class="w-100" name="presion_maquina_hot_1" value="<?php echo $data[0]->presion_maquina_hot_1 ?>"></td>
                <td colspan="2"><input type="text" class="w-100" name="presion_maquina_hot_2" value="<?php echo $data[0]->presion_maquina_hot_2 ?>"></td>
            </tr>
            <tr>
                <td colspan="2" class="pintado">TEMPERATURA DE LAMINA</td>
                <td colspan="2"><input type="text" class="w-100" name="temperatura_lamina" value="<?php echo $data[0]->temperatura_lamina ?>"></td>
                <td colspan="2">En la medida que la maquina indique</td>
            </tr>
            <tr>
                <td colspan="2" class="pintado pt-0 pb-0 align-middle">TIPO DE CLICHE</td>
                <td class="text-center pt-0 pb-0  align-middle">MACHO: <input type="checkbox" name="tipo_cliche_hot_macho" <?php if ($data[0]->tipo_cliche_hot_macho == "SI") { ?> checked <?php } ?> id="tipo_cliche_hot_macho"></td>
                <td class="text-center pt-0 pb-0 align-middle">HEMBRA: <input type="checkbox" name="tipo_cliche_hot_hembra" <?php if ($data[0]->tipo_cliche_hot_hembra == "SI") { ?> checked <?php } ?> id="tipo_cliche_hot_hembra"></td>
                <td colspan="2" class="pt-0 pb-0 align-middle">Marque las opciones</td>
            </tr>

            <tr>
                <td colspan="2" class="pintado">CANTIDAD DE GRABADOS</td>
                <td colspan="2"><input type="text" class="w-100" name="cantidad_grabados" value="<?php echo $data[0]->cantidad_grabados ?>"></td>
                <td colspan="2">Numeros de grabados hechos en 1 pasada en maquina</td>
            </tr>
            <tr>
                <td colspan="6">Observaciones</td>
            </tr>
            <tr>
                <td colspan="6">
                    <textarea class="w-100" name="observaciones" id="observaciones" cols="20" rows="4"><?php echo $data[0]->observaciones    ?></textarea>
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
                        <input type="text" class="w-100" placeholder="NOMBRE" name="encargados_nombre" value="<?php echo $data[0]->encargados_nombre  ?>">
                    </td>
                    <td class="border border-white">
                        <input type="text" class="w-100" placeholder="FIRMA" disabled>
                    </td>
                    <td class="border border-white">
                        <input type="text" class="w-100 text-center" placeholder="FECHA" value="<?php echo date('d/m/Y')  ?>" disabled>
                    </td>
                </tr>
            </center>

        </tbody>
    </table>
</div>