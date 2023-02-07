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