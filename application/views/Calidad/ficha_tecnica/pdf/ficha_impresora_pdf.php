<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php
  setlocale(LC_TIME, "spanish");
  setlocale(LC_ALL, "es_ES");
  $fecha = $data[0]->fecha_creacion;
  $newDate = date("F-Y", strtotime($fecha));
  //$mes = strftime("%B", strtotime($newDate));
  //$year = strftime("%Y", strtotime($newDate));
  //$mes = date("F", $newDate);
  //  $year = date ("Y",$newDate);
  $n = 0;
  $numero = intval($data[0]->ID);
  do {
    $numero = floor($numero / 10);
    $n = $n + 1;
  } while ($numero > 0);

  $ceros = abs(7 - $n);
  $codigo = "";
  for ($i = 0; $i < $ceros; $i++) {
    $codigo .= "0";
  }
  $id_ficha = $codigo . $data[0]->ID;

  ?>
  <title><?php echo $id_ficha ?></title>
  <style>
    @font-face {
      font-family: 'Poppins';
      font-style: normal;
      font-weight: 300;
      src: url(<?php echo base_url("resources/fonts/Poppins-Light.ttf") ?>);
    }

    @font-face {
      font-family: 'Poppins';
      font-style: normal;
      font-weight: 400;
      src: url(<?php echo base_url("resources/fonts/Poppins-Regular.ttf") ?>);
    }

    @font-face {
      font-family: 'Poppins';
      font-style: normal;
      font-weight: 700;
      src: url(<?php echo base_url("resources/fonts/Poppins-Bold.ttf") ?>);
    }

    * {
      font-family: 'Poppins' !important;
      font-size: 5pt;
      word-spacing: 0.25em;
    }

    .saltopagina {
      page-break-after: always;
    }

    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
      padding-left: 5px;
      padding-right: 5px;
      padding-bottom: 1px;
      padding-top: 1px;
      line-height: 5px;
    }



    .tabla1,
    .tabla-esp,
    .tabla-esp2,
    .tabla-general,
    .tabla-planchas,
    .tabla-secado,
    .tabla-agua,
    .tabla-barniz,
    .tabla-encargados,
    .tabla-formulacion,
    .table-final {
      width: 100%;
    }

    .tabla-esp,
    .tabla-esp th,
    .tabla-esp td,
    .tabla-encargados,
    .tabla-encargados th,
    .tabla-encargados td {
      border: none;
      line-height: 5px;
    }

    .tabla1 tr td,
    .tabla-esp tr td,
    .tabla-int tr td {
      margin: 0px;
      padding-top: 0px;
      padding-bottom: 0px;
      padding-left: 5px;
      padding-right: 5px;
      line-height: 5px;
    }


    .tabla1 tr col1 {
      width: 20%;
    }

    .tabla1 tr col2 {
      width: 60%;
    }

    .tabla1 tr col3 {
      width: 5%;
    }

    .tabla1 tr col4 {
      width: 15%;
    }

    .tabla1,
    .tabla-esp {
      text-transform: uppercase;
    }

    .tabla1 span,
    .tabla-esp span,
    .tabla-general span,
    .tabla-planchas span,
    .tabla-esp2 span {
      font-weight: 700;
    }


    .text-rigth {
      text-align: right;
    }

    .text-center {
      text-align: center;
    }

    .subrayado {
      width: 95%;
      border-bottom: 1px solid black;
    }

    .subrayado2 {
      width: 85%;
      border-bottom: 1px solid black;
    }

    .titulo-tabla {
      text-align: center;
      background-color: black;
      color: white;
      text-transform: uppercase;
      font-weight: 700;
    }

    .titulo-pagina {
      text-align: center;
      text-transform: uppercase;
      font-size: 10pt;
      font-weight: 700;
    }

    .fondo-gris {
      background-color: rgba(31, 53, 88, 0.2);
      font-weight: bold;
    }

    .letra-pequenya tr td,
    .letra-pequenya span {
      font-size: 5pt;
    }
  </style>
</head>

<body>

  <!--****************** Encabezado ***********************-->
  <table class="tabla1" style="margin-bottom: 0px;">
    <tr>
      <td rowspan="4" style="width: 15%"><img src="<?php echo base_url("resources/generales/img/logoficha1.jpg") ?>" alt="" width="150px"></td>
      <td rowspan="2" class="titulo-pagina" style="width: 50%">RECOLECCION DE INFORMACIÓN</td>
      <td colspan="2" style="width: 35%">Fecha de creacion: <span><?php echo $newDate ?></span></td>
    </tr>
    <tr>
      <td>VERSION: <span><?php echo $data[0]->version ?></span></td>
      <td>FICHA: <span><?php echo $id_ficha ?></span></td>
    </tr>
    <tr>
      <td rowspan="2" class="titulo-pagina">ESPECIFICA DEL PRODUCTO IMPRESIÓN</td>
      <td colspan="2">DEPARTAMENTO: <span>CALIDAD</span> </td>
    </tr>
    <tr>
      <td colspan="2">Codigo: <span> F-CC-020-3</span></td>
    </tr>
  </table>
  <!--************* Especificaciones  ****************************-->
  <table class="tabla-esp " style="margin-top: -4px;">
    <tr>
      <td colspan="6" class="titulo-tabla">Especificaciones</td>
    </tr>
    <tr>
      <td class="text-rigth">Cliente: </td>
      <td colspan="2"><span>
          <p class="subrayado""><?php echo $data[0]->cliente ?></p></p></span></td>
            <td class=" text-rigth">Producto: </td>
      <td colspan="2"><span>
          <p class="subrayado""><?php echo $data[0]->producto ?></p></span> </td>
        </tr>
        <tr>
            <td class=" text-rigth">TIPO DE PRODUCTO: </td>
      <td><span>
          <p class="subrayado""><?php echo $data[0]->tipo_producto ?> </p></span></td>
            <td class=" text-rigth">FECHA: </td>
      <td><span>
          <p class="subrayado""><?php echo $data[0]->fecha_creacion ?>  </p></span></td>
            <td class=" text-rigth">COD. PRODUCTO: </td>
      <td><span>
          <p class="subrayado""><?php echo $data[0]->cod_producto ?>  </p></span></td>
        </tr>
        <tr>
            <td class=" text-rigth" style="width: 15%;">OT:</td>
      <td style="width: 20%;"><span>
          <p class="subrayado"" ><?php echo $data[0]->ot ?> </p></span></td>
            <td class=" text-rigth" style="width: 15%;">MAQUINA:</td>
      <td style="width: 20%;"><span>
          <p class="subrayado"" > <?php echo $data[0]->maquina ?></p></span></td>
            <td class=" text-rigth" style="width: 15%;">OPERARIO:</td>
      <td style="width: 20%;"><span>
          <p class="subrayado"" > <?php echo $data[0]->operario ?></p></span></td>
        </tr>
    </table>

    <!--************* Generalidades  ****************************-->
    <table class=" tabla-general">
    <tr>
      <td colspan="2" class="titulo-tabla "> ITEM</td>
      <td colspan="2" class="titulo-tabla"> GENERALIDADES</td>
      <td class="titulo-tabla"></td>
    </tr>
    <tr>
      <td colspan="2" class="fondo-gris">TIPO DE MATERIAL</td>
      <td colspan="2"><span><?php echo $data[0]->generalidad_1 ?></span></td>
      <td>Sin Tolerancia</td>
    </tr>
    <tr>
      <td style="width: 15%;" class="fondo-gris">CALIBRE</td>
      <td style="width: 15%;" class="fondo-gris">MARCA</td>
      <td style="width: 20%;"><span><?php echo $data[0]->generalidad_2 ?></span></td>
      <td style="width: 20%;"><span><?php echo $data[0]->generalidad_3 ?></span></td>
      <td style="width: 30%; ">+/- 0.001 milesima de pulgada</td>
    </tr>
  </table>
  <!--************* Planchas  ****************************-->
  <table class="tabla-planchas" style="margin-top: -4px;">
    <tr>
      <td class="titulo-tabla" colspan="3">Planchas</td>
    </tr>
    <tr>
      <td rowspan="5" class="fondo-gris"> QUEMADO DE PLANCHAS</td>
      <td>Resolució: <span><?php echo $data[0]->planchas_resolucion   ?></span></td>
      <td rowspan="5" class="text-center">
        TIPO DE PLANCHA
        <br>
        NEGATIVO: <?php if ($data[0]->tipo_plancha == "NO") { ?> <img src="<?php echo base_url("resources/icon/iconos_04.png") ?>" alt="" width="5px"> <?php } else { ?> <img src="<?php echo base_url("resources/icon/iconos_03.png") ?>" alt="" width="5px"> <?php }  ?>
        <br>
        POSITIVA: <?php if ($data[0]->tipo_plancha == "SI") { ?> <img src="<?php echo base_url("resources/icon/iconos_04.png") ?>" alt="" width="5px"> <?php } else { ?> <img src="<?php echo base_url("resources/icon/iconos_03.png") ?>" alt="" width="5px"> <?php }  ?>
      </td>
    </tr>
    <tr>
      <td>Familia de tramado: <span><?php echo $data[0]->planchas_familia ?> </span></td>
    </tr>
    <tr>
      <td>Forma de punto: <span><?php echo $data[0]->planchas_forma ?></span></td>
    </tr>
    <tr>
      <td>Lineatura/tamaño de punto: <span><?php echo $data[0]->planchas_lineatura   ?></span> </td>
    </tr>
    <tr>
      <td>Curvas: <span><?php echo $data[0]->planchas_curvas  ?></span></td>
    </tr>

    <tr>
      <td rowspan="2" class="fondo-gris">*COLORES</td>
      <td>*TIRO: <span><?php echo $data[0]->colores_tiro ?> </span></td>
      <td rowspan="2" class="text-center"><b>*En caso de tener pantone se colocara <br> especificaciones de elaboracion en la parte <br>posterior de la ficha</b></td>
    </tr>
    <tr>
      <td>*RETIRO: <span><?php echo $data[0]->colores_retiro  ?></span></td>
    </tr>
    <tr>
      <td class="fondo-gris" style="width: 30%;">**TINTAS <br>(PROVEEDOR) </td>
      <td style="width: 40%;"><span><?php echo $data[0]->tintas_proveedor   ?></span></td>
      <td style="width: 30%;"><b>**Los pantones son especificados al reverso.</b></td>
    </tr>
  </table>
  <!--*************Especificacioesn de impresion   ****************************-->
  <table class="table-esp2" style="margin-top:-4px;">

  </table>

  <!--*************Especificacioesn de impresion   ****************************-->
  <!--*************Especificacioesn de impresion   ****************************-->
  <!--*************Especificacioesn de impresion   ****************************-->
  <!--*************Especificacioesn de impresion   ****************************-->

  <table class="tabla-esp2 letra-pequenya" style="margin-top:-4px;">
    <tr>
      <td colspan="17" class="titulo-tabla">ESPECIFICACIONES DE IMPRESION</td>
    </tr>
    <!--17 columnas -->
    <tr class="text-center fondo-gris">
      <td colspan="4">MAQUINA</td>

      <td>PLANCHA</td>

      <td style="padding: 10px;" colspan="4">MAQUINA</td>

      <td style="padding: 10px;">PLANCHA</td>

      <td style="padding: 10px;" colspan="7">MAQUINA</td>
    </tr>
    <!--17 columnas -->
    <tr class="text-center fondo-gris">
      <!-- MAQUINA -->
      <td colspan=" " rowspan="8" style="width: 1%; "> <span class="" style="font-size: 4pt; padding: 0px; line-height : 5px;">S<br>E<br>C<br>U<br>E<br>N<br>C<br>I<br>A<br><br> D<br>E<br><br>C<br>O<br>L<br>O<br>R<br>E<br>S</span></td>
      <td colspan=" " rowspan=" "><span>TIRO</span></td>
      <td colspan=" " rowspan=" "><span>1 PRIMER PASO</span></td>
      <td colspan=" " rowspan="2"><span>DISTR LATELRAL</span></td>
      <!--PLANCHA -->
      <td colspan=" " rowspan="2"><span>ANGULO DE COLOR</span></td>
      <!-- MAQUINA -->
      <td colspan=" " rowspan="2"><span>PRESION 1</span></td>
      <td colspan=" " rowspan=" "><span>TIRO</span></td>
      <td colspan=" " rowspan=" "><span>2 PRIMER PASO</span></td>
      <td colspan=" " rowspan="2"><span>DIST LATERAL</span></td>

      <!-- PLANCHA-->
      <td class=" pintado" rowspan="2" style="padding: 10px;"><span>ANGULO DE COLOR</span></td>

      <!-- MAQUINA-->
      <td rowspan="2" style="padding: 10px;"><span>PRESION 2</span></td>
      <td colspan="3" style="padding: 10px;"><span>tiro 1 paso</span></td>
      <td colspan="3" style="padding: 10px;"><span>tiro 2 paso</span></td>
    </tr>
    <!--Columnas  9 columnas ocupadas 
    faltantes 8-->
    <tr class="text-center">
      <td class="fondo-gris"><?php if ($data[0]->tiro_paso_1 == "SI") { ?> <img src="<?php echo base_url("resources/icon/iconos_02.png") ?>" alt="" width="5px"> <?php } else { ?> <img src="<?php echo base_url("resources/icon/iconos_01.png") ?>" alt="" width="5px"> <?php }  ?></td>
      <td class="fondo-gris"><?php if ($data[0]->paso_1 == "SI") { ?> <img src="<?php echo base_url("resources/icon/iconos_02.png") ?>" alt="" width="5px"> <?php } else { ?> <img src="<?php echo base_url("resources/icon/iconos_01.png") ?>" alt="" width="5px"> <?php }  ?></td>
      <td class="fondo-gris"><?php if ($data[0]->retiro_paso_2 == "SI") { ?> <img src="<?php echo base_url("resources/icon/iconos_02.png") ?>" alt="" width="5px"> <?php } else { ?> <img src="<?php echo base_url("resources/icon/iconos_01.png") ?>" alt="" width="5px"> <?php }  ?></td>
      <td class="fondo-gris"><?php if ($data[0]->paso_1 == "SI") { ?> <img src="<?php echo base_url("resources/icon/iconos_02.png") ?>" alt="" width="5px"> <?php } else { ?> <img src="<?php echo base_url("resources/icon/iconos_01.png") ?>" alt="" width="5px"> <?php }  ?></td>
      <td class="" style="padding: 10px;"><span>Densidad</span></td>
      <td class="" style="padding: 10px;"><span>vueltas</span></td>
      <td class="" style="padding: 10px;"><span>% Agua</span></td>

      <td class="" style="padding: 10px;"><span>Densidad</span></td>
      <td class="" style="padding: 10px;"><span>vueltas</span></td>
      <td class="" style="padding: 10px;"><span>% Agua</span></td>

    </tr>

    <tr>
      <td>UN1:</td>
      <td><span><?php echo $data[0]->tiro_unidad_1  ?></span></td>
      <td><span><?php echo $data[0]->distribucion1_1  ?></span></td>
      <td><span><?php echo $data[0]->angulo_color1_1  ?></span></td>
      <td><span><?php echo $data[0]->presion_1  ?></span></td>
      <td>UN1:</td>
      <td><span><?php echo $data[0]->retiro_unidad_1   ?></span></td>
      <td><span><?php echo $data[0]->distribucion2_1  ?></span></td>
      <td><span><?php echo $data[0]->angulo_color2_1  ?></span></td>
      <td><span><?php echo $data[0]->presion_7  ?></span></td>
      <td><span><?php echo $data[0]->densidad_1 ?></span></td>
      <td><span><?php echo $data[0]->vueltas_1_1 ?></span></td>
      <td><span><?php echo $data[0]->agua_1   ?></span></td>
      <td><span><?php echo $data[0]->densidad_7  ?></span></td>
      <td><span><?php echo $data[0]->vueltas_2_1 ?></span></td>
      <td><span><?php echo $data[0]->agua_7   ?></span></td>
    </tr>


    <tr>
      <td>UN2:</td>
      <td><span><?php echo $data[0]->tiro_unidad_2  ?></span></td>
      <td><span><?php echo $data[0]->distribucion1_2  ?></span></td>
      <td><span><?php echo $data[0]->angulo_color1_2  ?></span></td>
      <td><span><?php echo $data[0]->presion_2  ?></span></td>
      <td>UN2:</td>
      <td><span><?php echo $data[0]->retiro_unidad_2   ?></span></td>
      <td><span><?php echo $data[0]->distribucion2_2  ?></span></td>
      <td><span><?php echo $data[0]->angulo_color2_2  ?></span></td>
      <td><span><?php echo $data[0]->presion_8  ?></span></td>
      <td><span><?php echo $data[0]->densidad_2 ?></span></td>
      <td><span><?php echo $data[0]->vueltas_1_2 ?></span></td>
      <td><span><?php echo $data[0]->agua_2   ?></span></td>
      <td><span><?php echo $data[0]->densidad_8  ?></span></td>
      <td><span><?php echo $data[0]->vueltas_2_2 ?></span></td>
      <td><span><?php echo $data[0]->agua_8   ?></span></td>
    </tr>

    <tr>
      <td>UN3:</td>
      <td><span><?php echo $data[0]->tiro_unidad_3  ?></span></td>
      <td><span><?php echo $data[0]->distribucion1_3  ?></span></td>
      <td><span><?php echo $data[0]->angulo_color1_3  ?></span></td>
      <td><span><?php echo $data[0]->presion_3  ?></span></td>
      <td>UN3:</td>
      <td><span><?php echo $data[0]->retiro_unidad_3   ?></span></td>
      <td><span><?php echo $data[0]->distribucion2_3  ?></span></td>
      <td><span><?php echo $data[0]->angulo_color2_3  ?></span></td>
      <td><span><?php echo $data[0]->presion_9  ?></span></td>
      <td><span><?php echo $data[0]->densidad_3 ?></span></td>
      <td><span><?php echo $data[0]->vueltas_1_3 ?></span></td>
      <td><span><?php echo $data[0]->agua_3   ?></span></td>
      <td><span><?php echo $data[0]->densidad_9  ?></span></td>
      <td><span><?php echo $data[0]->vueltas_2_3 ?></span></td>
      <td><span><?php echo $data[0]->agua_9   ?></span></td>
    </tr>
    <tr>
      <td>UN4:</td>
      <td><span><?php echo $data[0]->tiro_unidad_4  ?></span></td>
      <td><span><?php echo $data[0]->distribucion1_4  ?></span></td>
      <td><span><?php echo $data[0]->angulo_color1_4  ?></span></td>
      <td><span><?php echo $data[0]->presion_4  ?></span></td>
      <td>UN4:</td>
      <td><span><?php echo $data[0]->retiro_unidad_4   ?></span></td>
      <td><span><?php echo $data[0]->distribucion2_4  ?></span></td>
      <td><span><?php echo $data[0]->angulo_color2_4  ?></span></td>
      <td><span><?php echo $data[0]->presion_10  ?></span></td>
      <td><span><?php echo $data[0]->densidad_4 ?></span></td>
      <td><span><?php echo $data[0]->vueltas_1_4 ?></span></td>
      <td><span><?php echo $data[0]->agua_4   ?></span></td>
      <td><span><?php echo $data[0]->densidad_10  ?></span></td>
      <td><span><?php echo $data[0]->vueltas_2_4 ?></span></td>
      <td><span><?php echo $data[0]->agua_10   ?></span></td>
    </tr>
    <tr>
      <td>UN5:</td>
      <td><span><?php echo $data[0]->tiro_unidad_5  ?></span></td>
      <td><span><?php echo $data[0]->distribucion1_5  ?></span></td>
      <td><span><?php echo $data[0]->angulo_color1_5  ?></span></td>
      <td><span><?php echo $data[0]->presion_4  ?></span></td>
      <td>UN5:</td>
      <td><span><?php echo $data[0]->retiro_unidad_5   ?></span></td>
      <td><span><?php echo $data[0]->distribucion2_5  ?></span></td>
      <td><span><?php echo $data[0]->angulo_color2_5  ?></span></td>
      <td><span><?php echo $data[0]->presion_11  ?></span></td>
      <td><span><?php echo $data[0]->densidad_5 ?></span></td>
      <td><span><?php echo $data[0]->vueltas_1_5 ?></span></td>
      <td><span><?php echo $data[0]->agua_5   ?></span></td>
      <td><span><?php echo $data[0]->densidad_11 ?></span></td>
      <td><span><?php echo $data[0]->vueltas_2_5 ?></span></td>
      <td><span><?php echo $data[0]->agua_11   ?></span></td>
    </tr>
    <tr>
      <td>UN6:</td>
      <td><span><?php echo $data[0]->tiro_unidad_6  ?></span></td>
      <td><span><?php echo $data[0]->distribucion1_6  ?></span></td>
      <td><span><?php echo $data[0]->angulo_color1_6  ?></span></td>
      <td><span><?php echo $data[0]->presion_6  ?></span></td>
      <td>UN6:</td>
      <td><span><?php echo $data[0]->retiro_unidad_6   ?></span></td>
      <td><span><?php echo $data[0]->distribucion2_6  ?></span></td>
      <td><span><?php echo $data[0]->angulo_color2_6  ?></span></td>
      <td><span><?php echo $data[0]->presion_12  ?></span></td>
      <td><span><?php echo $data[0]->densidad_6 ?></span></td>
      <td><span><?php echo $data[0]->vueltas_1_6 ?></span></td>
      <td><span><?php echo $data[0]->agua_6   ?></span></td>
      <td><span><?php echo $data[0]->densidad_12 ?></span></td>
      <td><span><?php echo $data[0]->vueltas_2_6 ?></span></td>
      <td><span><?php echo $data[0]->agua_12   ?></span></td>
    </tr>

  </table>
  <p style="padding-left: 10px; margin: 0;">Presión general de maquina: <span><?php echo $data[0]->presion_general   ?></span> </p>
  <!--*************Especificacioesn de secado   ****************************-->
  <table class="tabla-secado">
    <tr>
      <td colspan="4" class="titulo-tabla">SECADO DE MAQUINA</td>
    </tr>
    <tr>
      <td class="fondo-gris">Especificaciones de prensa</td>
      <td class="fondo-gris">Potencia de lamparas IR</td>
      <td class="fondo-gris">% Potencia calorifica</td>
      <td class="fondo-gris">% De aire Soplador</td>
    </tr>
    <tr>
      <td class="fondo-gris">Cuerpo Intermedio <br>*Solo para XL105</td>
      <td>
        <table class="tabla-esp tabla-int" style="width: 100%;">
          <tr>
            <td style="width: 5%; padding: 0px;">1</td>
            <td><span>
                <p class="subrayado2 "><?php echo $data[0]->potencia_lamparas_1 ?></p>
              </span></td>
            <td style="width: 5%; padding: 0px;">2</td>
            <td><span>
                <p class="subrayado2"><?php echo $data[0]->potencia_lamparas_2  ?></p>
              </span></td>
            <td style="width: 5%; padding: 0px;">3</td>
            <td><span>
                <p class="subrayado2"><?php echo $data[0]->potencia_lamparas_3  ?>
              </span></p>
            </td>
          </tr>
        </table>
      </td>
      <td>
        <table class="tabla-esp tabla-int" style="width: 100%;">
          <tr>
            <td style="width: 5%; padding: 0px;">1</td>
            <td><span>
                <p class="subrayado2 "><?php echo $data[0]->potencia_calorifica_1 ?></p>
              </span></td>
            <td style="width: 5%; padding: 0px;">2</td>
            <td><span>
                <p class="subrayado2"><?php echo $data[0]->potencia_calorifica_2  ?></p>
              </span></td>
            <td style="width: 5%; padding: 0px;">3</td>
            <td><span>
                <p class="subrayado2"><?php echo $data[0]->potencia_calorifica_3  ?>
              </span></p>
            </td>
            <td style="width: 5%; padding: 0px;">4</td>
            <td><span>
                <p class="subrayado2"><?php echo $data[0]->potencia_calorifica_4  ?>
              </span></p>
            </td>
          </tr>
        </table>
      </td>
      <td>
        <table class="tabla-esp tabla-int" style="width: 100%;">
          <tr>
            <td style="width: 5%; padding: 0px;">1</td>
            <td><span>
                <p class="subrayado2 "><?php echo $data[0]->aire_soplador_1 ?></p>
              </span></td>
            <td style="width: 5%; padding: 0px;">2</td>
            <td><span>
                <p class="subrayado2"><?php echo $data[0]->aire_soplador_2  ?></p>
              </span></td>
            <td style="width: 5%; padding: 0px;">3</td>
            <td><span>
                <p class="subrayado2"><?php echo $data[0]->aire_soplador_3  ?>
              </span></p>
            </td>
            <td style="width: 5%; padding: 0px;">4</td>
            <td><span>
                <p class="subrayado2"><?php echo $data[0]->aire_soplador_4  ?>
              </span></p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td class="fondo-gris">Salida</td>
      <td>
        <table class="tabla-esp tabla-int" style="width: 100%;">
          <tr>
            <td style="width: 5%; padding: 0px;">1</td>
            <td><span>
                <p class="subrayado2 "><?php echo $data[0]->salida_1 ?></p>
              </span></td>
            <td style="width: 5%; padding: 0px;">2</td>
            <td><span>
                <p class="subrayado2"><?php echo $data[0]->salida_2  ?></p>
              </span></td>
          </tr>
        </table>
      </td>
      <td>
        <table class="tabla-esp tabla-int" style="width: 100%;">
          <tr>
            <td style="width: 5%; padding: 0px;">1</td>
            <td><span>
                <p class="subrayado2 "><?php echo $data[0]->salida_3 ?></p>
              </span></td>
            <td style="width: 5%; padding: 0px;">2</td>
            <td><span>
                <p class="subrayado2"><?php echo $data[0]->salida_4  ?></p>
              </span></td>
          </tr>
        </table>
      </td>
      <td>
        <table class="tabla-esp tabla-int" style="width: 100%;">
          <tr>
            <td style="width: 5%; padding: 0px;">1</td>
            <td><span>
                <p class="subrayado2 "><?php echo $data[0]->salida_5 ?></p>
              </span></td>
            <td style="width: 5%; padding: 0px;">2</td>
            <td><span>
                <p class="subrayado2"><?php echo $data[0]->salida_6  ?></p>
              </span></td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td class="fondo-gris">Talco</td>
      <td>
        <table class="tabla-esp tabla-int" style="width: 100%;">
          <tr>
            <td style="width: 5%; padding: 0px;">1</td>
            <td><span>
                <p class="subrayado2 "><?php echo $data[0]->salida_5 ?></p>
              </span></td>
            <td style="width: 5%; padding: 0px;">2</td>
            <td><span>
                <p class="subrayado2"><?php echo $data[0]->salida_6  ?></p>
              </span></td>
          </tr>
        </table>
      </td>
      <td>
        <table class="tabla-esp tabla-int" style="width: 100%;">
          <tr>
            <td style="width: 5%; padding: 0px;">1</td>
            <td><span>
                <p class="subrayado2 "><?php echo $data[0]->salida_5 ?></p>
              </span></td>
            <td style="width: 5%; padding: 0px;">2</td>
            <td><span>
                <p class="subrayado2"><?php echo $data[0]->salida_6  ?></p>
              </span></td>
          </tr>
        </table>
      </td>
      <td>-</td>
    </tr>
    <tr>
      <td class="fondo-gris">Temperatura de pila salida</td>
      <td><?php echo $data[0]->pila_salida  ?></td>
      <td>Automatico activado</td>
      <td>SI <?php if ($data[0]->pila_automatico == "SI") { ?>  <img src="<?php echo base_url("resources/icon/iconos_04.png") ?>" alt="" width="5px"> <?php } else { ?> <img src="<?php echo base_url("resources/icon/iconos_03.png") ?>" alt="" width="5px"> <?php }  ?>No<?php if ($data[0]->pila_automatico == "NO") { ?>  <img src="<?php echo base_url("resources/icon/iconos_04.png") ?>" alt="" width="5px"> <?php } else { ?> <img src="<?php echo base_url("resources/icon/iconos_03.png") ?>" alt="" width="5px"> <?php }  ?> </td>
    </tr>
  </table>
  <!--*************Especificacioesn de agua  ****************************-->
  <table class="tabla-agua" style="margin-top: -4px;">
    <tr class="titulo-tabla">
      <td colspan="4">VARIABLES DE AGUA</td>
    </tr>
    <tr>
      <td>Variables de agua PH: <span class="subrayado2" style="padding-left: 5px;"><?php echo $data[0]->variables_agua_PH   ?></span></td>
      <td>??uS: <span class="subrayado2" style="padding-left: 5px;"><?php echo $data[0]->variables_agua_US  ?></span></td>
      <td>Alcohol: <span class="subrayado2" style="padding-left: 5px;"><?php echo $data[0]->variables_agua_alchohol   ?></span></td>
      <td>Temp: <span class="subrayado2" style="padding-left: 5px;"><?php echo $data[0]->variables_agua_temp  ?></span></td>
    </tr>
  </table>
  <!--*************Especificacioesn de barniz   ****************************-->
  <table class="tabla-barniz">
    <tr>
      <td class="titulo-tabla" colspan="7">BARNIZ</td>
    </tr>
    <tr>
      <td class="fondo-gris" colspan="2" style="width: 20%;">TIPO DE BARNIZ LINEA <br> * Agregar codigo, y marca</td>
      <td colspan="2"><?php echo $data[0]->tipo_barniz_linea_1  ?></td>
      <td colspan="3">
        <table class="tabla-esp tabla-int">
          <tr>
            <td colspan="4" class="text-center"> TIPO (DE REGISTRO)</td>
          </tr>
          <tr>
            <td>PEGUE</td>
            <td><?php if ($data[0]->tipo_barniz_tipo_registro_pegue == "SI") { ?><img src="<?php echo base_url("resources/icon/iconos_02.png") ?>" alt="" width="5px"> <?php } else { ?> <img src="<?php echo base_url("resources/icon/iconos_01.png") ?>" alt="" width="5px"> <?php }  ?></td>
            <td>TOTAL</td>
            <td><?php if ($data[0]->tipo_barniz_tipo_registro_lote == "SI") { ?> <img src="<?php echo base_url("resources/icon/iconos_02.png") ?>" alt="" width="5px"> <?php } else { ?> <img src="<?php echo base_url("resources/icon/iconos_01.png") ?>" alt="" width="5px"> <?php }  ?></td>
          </tr>
          <tr>
            <td>LOTE</td>
            <td><?php if ($data[0]->tipo_barniz_tipo_registro_total == "SI") { ?> <img src="<?php echo base_url("resources/icon/iconos_02.png") ?>" alt="" width="5px"> <?php } else { ?> <img src="<?php echo base_url("resources/icon/iconos_01.png") ?>" alt="" width="5px"> <?php }  ?></td>
            <td>SIN BUV</td>
            <td><?php if ($data[0]->tipo_barniz_tipo_registro_sin_bl == "SI") { ?> <img src="<?php echo base_url("resources/icon/iconos_02.png") ?>" alt="" width="5px"> <?php } else { ?> <img src="<?php echo base_url("resources/icon/iconos_01.png") ?>" alt="" width="5px"> <?php }  ?></td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td class="fondo-gris">BRILLO</td>
      <td class="fondo-gris">GRADO DE MEDICION</td>
      <td><?php echo $data[0]->brillo_1   ?></td>
      <td><?php echo $data[0]->grado_medicion_1    ?></td>
      <td colspan="3"><span>Vence sin tolerancia</span></td>
    </tr>
    <tr>
      <td class="fondo-gris">LOTE</td>
      <td class="fondo-gris">VENCE</td>
      <td><?php echo $data[0]->barniz_lote_1   ?></td>
      <td><?php echo $data[0]->barniz_vence_1    ?></td>
      <td colspan="3"><span>Vence sin tolerancia</span></td>
    </tr>
    <tr>
      <td class="fondo-gris" colspan="2"> VISCOSIDAD DE BARNIZ LINEA</td>
      <td colspan="2"><?php echo $data[0]->viscocidad_barniz  ?></td>
      <td colspan="3"><span>* Segun tipo ver ficha tecnica</span></td>
    </tr>
    <tr>
      <td class="fondo-gris" colspan="2"> MAQUINA DE BARNIZ UV</td>
      <td colspan="2"><?php echo $data[0]->maquina_barniz  ?></td>
      <td class="fondo-gris">OPERARIO</td>
      <td colspan="2"><span><?php echo $data[0]->operario_barniz ?></span> </td>
    </tr>
    <tr>
      <td class="fondo-gris" colspan="2">TIPO DE BARNIZ UV <br>*Agregar codigo, marca</td>
      <td colspan="4"><span><?php echo $data[0]->tipo_barniz_UV_registro  ?></span> </td>
      <td>
        <table class="tabla-esp tabla-int">
          <tr>
            <td colspan="4" class="text-center"> TIPO (DE REGISTRO)</td>
          </tr>
          <tr>
            <td>PEGUE</td>
            <td><?php if ($data[0]->tipo_barniz_UV_registro_pegue == "SI") { ?> <img src="<?php echo base_url("resources/icon/iconos_02.png") ?>" alt="" width="5px"> <?php } else { ?> <img src="<?php echo base_url("resources/icon/iconos_01.png") ?>" alt="" width="5px"> <?php }  ?></td>
            <td>TOTAL</td>
            <td><?php if ($data[0]->tipo_barniz_UV_registro_total == "SI") { ?> <img src="<?php echo base_url("resources/icon/iconos_02.png") ?>" alt="" width="5px"> <?php } else { ?> <img src="<?php echo base_url("resources/icon/iconos_01.png") ?>" alt="" width="5px"> <?php }  ?></td>
          </tr>
          <tr>
            <td>LOTE</td>
            <td><?php if ($data[0]->tipo_barniz_UV_registro_lote == "SI") { ?> <img src="<?php echo base_url("resources/icon/iconos_02.png") ?>" alt="" width="5px"> <?php } else { ?> <img src="<?php echo base_url("resources/icon/iconos_01.png") ?>" alt="" width="5px"> <?php }  ?></td>
            <td>SIN BUV</td>
            <td><?php if ($data[0]->tipo_barniz_UV_registro_sin_bl == "SI") { ?> <img src="<?php echo base_url("resources/icon/iconos_02.png") ?>" alt="" width="5px"> <?php } else { ?> <img src="<?php echo base_url("resources/icon/iconos_01.png") ?>" alt="" width="5px"> <?php }  ?></td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td class="fondo-gris">BRILLO</td>
      <td class="fondo-gris">GRADO DE MEDICION</td>
      <td><?php echo $data[0]->brillo_2   ?></td>
      <td><?php echo $data[0]->grado_medicion_2    ?></td>
      <td colspan="3"><span>Vence sin tolerancia</span></td>
    </tr>
    <tr>
      <td class="fondo-gris">LOTE</td>
      <td class="fondo-gris">VENCE</td>
      <td><?php echo $data[0]->barniz_lote_2  ?></td>
      <td><?php echo $data[0]->barniz_vence_2  ?></td>
      <td colspan="3"><span>Vence sin tolerancia</span></td>
    </tr>
    <tr>
      <td class="fondo-gris" colspan="2">Potencia de Lamparas UV</td>
      <td colspan="3" style="padding: 0px; ">
        <table class="tabla-esp tabla-int" style="width: 100%; padding: 0px; margin: 0px;">
          <tr style="width: 100%;">
            <td style="width: 5%;">1</td>
            <td style="width: 20%;">
              <p class="subrayado2"><?php echo $data[0]->potencia_lamparas_UV_1  ?></p>
            </td>
            <td style="width: 5%;">2</td>
            <td style="width: 20%;">
              <p class="subrayado2"><?php echo $data[0]->potencia_lamparas_UV_2   ?></p>
            </td>
            <td style="width: 5%;">3</td>
            <td style="width: 20%;">
              <p class="subrayado2"><?php echo $data[0]->potencia_lamparas_UV_3 ?></p>
            </td>
            <td style="width: 5%;">4</td>
            <td style="width: 20%;">
              <p class="subrayado2"><?php echo $data[0]->potencia_lamparas_UV_4   ?></p>
            </td>
          </tr>
        </table>
      </td>
      <td colspan="2" class="text-center"><span>Segun maquina (% o potencia)</span></td>
    </tr>
    <tr>
      <td colspan="7">Observaciones:</td>
    </tr>
    <tr>
      <td colspan="7"><textarea style="width: 98%; border: none;"><?php echo $data[0]->observaciones    ?></textarea></td>
    </tr>
  </table>

  <!--*************Encargados Calidad  ****************************-->
  <table class="tabla-encargados" style="margin-top: -4px;">
    <tr>
      <td class="titulo-tabla" colspan="4">ENCARGADOS CALIDAD:</td>
    </tr>
    <tr>
      <td>DEPARTAMENTO DE CALIDAD</td>
      <td><?php echo $data[0]->encargados_nombre ?></td>
      <td>FIRMA</td>
      <td><?php echo date('d/m/Y') ?></td>
    </tr>
  </table>

  <!--*************SALTO DE PAGINA  ****************************-->
  <!--*************SALTO DE PAGINA  ****************************-->
  <div clas='saltopagina'>
    <div style="page-break-after:always;"></div>
    <!--****************** Encabezado ***********************-->
    <table class="tabla1" style="margin-bottom: 0px;">
      <tr>
        <td rowspan="4" style="width: 15%"><img src="<?php echo base_url("resources/generales/img/logoficha1.jpg") ?>" alt="" width="150px"></td>
        <td rowspan="2" class="titulo-pagina" style="width: 50%">RECOLECCION DE INFORMACIÓN</td>
        <td colspan="2" style="width: 35%">Fecha de creacion: <span><?php echo $newDate ?></span></td>
      </tr>
      <tr>
        <td>VERSION: <span>version</span></td>
        <td>FICHA: <span><?php echo $id_ficha ?></span></td>
      </tr>
      <tr>
        <td rowspan="2" class="titulo-pagina">ESPECIFICA DEL PRODUCTO IMPRESIÓN</td>
        <td colspan="2">DEPARTAMENTO: <span>CALIDAD</span> </td>
      </tr>
      <tr>
        <td colspan="2">Codigo: <span> F-CC-020-3</span></td>
      </tr>
    </table>

    <!--*************Generalidades de formulacion de tintas  ****************************-->
    <table class="tabla-encargados">
      <tr>
        <td class="titulo-tabla" colspan="4">GENERALIDADES DE FORMULACION DE TINTAS</td>
      </tr>
      <tr>
        <td style="width: 20%;">FORMULADO POR: </span></p>
        </td>
        <td style="width: 60%;">
          <p class="subrayado2"><span><?php echo $data[0]->formulado  ?>
        </td>
        <td style="width: 10%;">FECHA: </span></p>
        </td>
        <td style="width: 20%;">
          <p class="subrayado2"><span><?php echo date('d/m/Y') ?>
        </td>
      </tr>
    </table>

    <!--*************Generalidades de formulacion de tintas  ****************************-->
    <table class="tabla-formulacion">
      <tr>
        <td class="fondo-gris">PINTADO</td>
        <td class="fondo-gris">REFERENCIA</td>
        <td class="fondo-gris">CIE L*a*b</td>
        <td class="fondo-gris">DESCRIPCION DE TINTA</td>
        <td class="fondo-gris">PROVEEDOR</td>
        <td class="fondo-gris">% DE TINTA</td>
      </tr>
      <tr>
        <td rowspan="6"> <?php echo $data[0]->pintado_1  ?></td>
        <td rowspan="6"> <?php echo $data[0]->referencia_1 ?></td>
        <td rowspan="2">L=</td>
        <td><?php echo $data[0]->descripcion_tinta_1  ?></td>
        <td><?php echo $data[0]->proveedor_1  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_1  ?></td>
      </tr>
      <tr>
        <td><?php echo $data[0]->descripcion_tinta_2  ?></td>
        <td><?php echo $data[0]->proveedor_2  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_2  ?></td>
      </tr>
      <tr>
        <td rowspan="2">a=<?php echo $data[0]->ciel_a_1 ?></td>
        <td><?php echo $data[0]->descripcion_tinta_3  ?></td>
        <td><?php echo $data[0]->proveedor_3  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_3  ?></td>
      </tr>
      <tr>
        <td><?php echo $data[0]->descripcion_tinta_4  ?></td>
        <td><?php echo $data[0]->proveedor_4  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_4  ?></td>
      </tr>
      <tr>
        <td rowspan="2">b=<?php echo $data[0]->ciel_b_1 ?></td>
        <td><?php echo $data[0]->descripcion_tinta_5  ?></td>
        <td><?php echo $data[0]->proveedor_5  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_5  ?></td>
      </tr>
      <tr>
        <td><?php echo $data[0]->descripcion_tinta_6  ?></td>
        <td><?php echo $data[0]->proveedor_6  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_6  ?></td>
      </tr>
      <!-- Pantone 2-->
      <tr>
        <td rowspan="6"> <?php echo $data[0]->pintado_2  ?></td>
        <td rowspan="6"> <?php echo $data[0]->referencia_2 ?> </td>
        <td rowspan="2">L=<?php echo $data[0]->ciel_L_2 ?></td>
        <td><?php echo $data[0]->descripcion_tinta_7  ?></td>
        <td><?php echo $data[0]->proveedor_7  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_7  ?></td>
      </tr>
      <tr>
        <td><?php echo $data[0]->descripcion_tinta_8  ?></td>
        <td><?php echo $data[0]->proveedor_8  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_8  ?></td>
      </tr>
      <tr>
        <td rowspan="2">a=<?php echo $data[0]->ciel_a_2 ?></td>
        <td><?php echo $data[0]->descripcion_tinta_9  ?></td>
        <td><?php echo $data[0]->proveedor_9  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_9  ?></td>
      </tr>
      <tr>
        <td><?php echo $data[0]->descripcion_tinta_10  ?></td>
        <td><?php echo $data[0]->proveedor_10  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_10  ?></td>
      </tr>
      <tr>
        <td rowspan="2">b=<?php echo $data[0]->ciel_b_2 ?></td>
        <td><?php echo $data[0]->descripcion_tinta_11  ?></td>
        <td><?php echo $data[0]->proveedor_11  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_11  ?></td>
      </tr>
      <tr>
        <td><?php echo $data[0]->descripcion_tinta_12  ?></td>
        <td><?php echo $data[0]->proveedor_12  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_12  ?></td>
      </tr>
      <!-- Pantone 3-->
      <tr>
        <td rowspan="6"> <?php echo $data[0]->pintado_3  ?></td>
        <td rowspan="6"> <?php echo $data[0]->referencia_3 ?> </td>
        <td rowspan="2">L=<?php echo $data[0]->ciel_L_3 ?></td>
        <td><?php echo $data[0]->descripcion_tinta_13  ?></td>
        <td><?php echo $data[0]->proveedor_13  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_13  ?></td>
      </tr>
      <tr>
        <td><?php echo $data[0]->descripcion_tinta_14  ?></td>
        <td><?php echo $data[0]->proveedor_14  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_14  ?></td>
      </tr>
      <tr>
        <td rowspan="2">a=<?php echo $data[0]->ciel_a_3 ?></td>
        <td><?php echo $data[0]->descripcion_tinta_15  ?></td>
        <td><?php echo $data[0]->proveedor_15  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_15  ?></td>
      </tr>
      <tr>
        <td><?php echo $data[0]->descripcion_tinta_16  ?></td>
        <td><?php echo $data[0]->proveedor_16  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_16  ?></td>
      </tr>
      <tr>
        <td rowspan="2">b=<?php echo $data[0]->ciel_b_3 ?></td>
        <td><?php echo $data[0]->descripcion_tinta_17  ?></td>
        <td><?php echo $data[0]->proveedor_17  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_17  ?></td>
      </tr>
      <tr>
        <td><?php echo $data[0]->descripcion_tinta_18  ?></td>
        <td><?php echo $data[0]->proveedor_18  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_18  ?></td>
      </tr>
      <!-- Pantone 4-->
      <tr>
        <td rowspan="6"> <?php echo $data[0]->pintado_4  ?></td>
        <td rowspan="6"> <?php echo $data[0]->referencia_4 ?> </td>
        <td rowspan="2">L=<?php echo $data[0]->ciel_L_4 ?></td>
        <td><?php echo $data[0]->descripcion_tinta_19  ?></td>
        <td><?php echo $data[0]->proveedor_19  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_19  ?></td>
      </tr>
      <tr>
        <td><?php echo $data[0]->descripcion_tinta_20  ?></td>
        <td><?php echo $data[0]->proveedor_20  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_20  ?></td>
      </tr>
      <tr>
        <td rowspan="2">a=<?php echo $data[0]->ciel_a_4 ?></td>
        <td><?php echo $data[0]->descripcion_tinta_21  ?></td>
        <td><?php echo $data[0]->proveedor_21  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_21  ?></td>
      </tr>
      <tr>
        <td><?php echo $data[0]->descripcion_tinta_22  ?></td>
        <td><?php echo $data[0]->proveedor_22  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_22  ?></td>
      </tr>
      <tr>
        <td rowspan="2">b=<?php echo $data[0]->ciel_b_4 ?></td>
        <td><?php echo $data[0]->descripcion_tinta_23  ?></td>
        <td><?php echo $data[0]->proveedor_23  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_23  ?></td>
      </tr>
      <tr>
        <td><?php echo $data[0]->descripcion_tinta_24  ?></td>
        <td><?php echo $data[0]->proveedor_24  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_24  ?></td>
      </tr>
      <!-- Pantone 5-->
      <tr>
        <td rowspan="6"> <?php echo $data[0]->pintado_5  ?></td>
        <td rowspan="6"> <?php echo $data[0]->referencia_5 ?> </td>
        <td rowspan="2">L=<?php echo $data[0]->ciel_L_5 ?></td>
        <td><?php echo $data[0]->descripcion_tinta_25  ?></td>
        <td><?php echo $data[0]->proveedor_25  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_25  ?></td>
      </tr>
      <tr>
        <td><?php echo $data[0]->descripcion_tinta_26  ?></td>
        <td><?php echo $data[0]->proveedor_26  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_26  ?></td>
      </tr>
      <tr>
        <td rowspan="2">a=<?php echo $data[0]->ciel_a_5 ?></td>
        <td><?php echo $data[0]->descripcion_tinta_27  ?></td>
        <td><?php echo $data[0]->proveedor_27  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_27  ?></td>
      </tr>
      <tr>
        <td><?php echo $data[0]->descripcion_tinta_28  ?></td>
        <td><?php echo $data[0]->proveedor_28  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_28  ?></td>
      </tr>
      <tr>
        <td rowspan="2">b=<?php echo $data[0]->ciel_b_5 ?></td>
        <td><?php echo $data[0]->descripcion_tinta_29  ?></td>
        <td><?php echo $data[0]->proveedor_29  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_29  ?></td>
      </tr>
      <tr>
        <td><?php echo $data[0]->descripcion_tinta_30  ?></td>
        <td><?php echo $data[0]->proveedor_30  ?></td>
        <td><?php echo $data[0]->porcentaje_tinta_30  ?></td>
      </tr>
      <?php foreach ($formulacion_tinta as $key => $value) { ?>
        <tr>
          <td rowspan="6"> <?php echo $value->pintado ?></td>
          <td rowspan="6"> <?php echo $value->referencia  ?> </td>
          <td rowspan="2">L=<?php echo  $value->cie_L  ?></td>
          <td><?php echo $value->descripcion_1  ?></td>
          <td><?php echo $value->proveedor_1  ?></td>
          <td><?php echo $value->porcentaje_tinta_1  ?></td>
        </tr>
        <tr>
          <td><?php echo $value->descripcion_2  ?></td>
          <td><?php echo $value->proveedor_2  ?></td>
          <td><?php echo  $value->porcentaje_tinta_2   ?></td>
        </tr>
        <tr>
          <td rowspan="2">a=<?php echo $value->cie_A ?></td>
          <td><?php echo  $value->descripcion_3  ?></td>
          <td><?php echo  $value->proveedor_3 ?></td>
          <td><?php echo $value->porcentaje_tinta_3 ?></td>
        </tr>
        <tr>
          <td><?php echo $value->descripcion_4 ?></td>
          <td><?php echo $value->proveedor_4   ?></td>
          <td><?php echo $value->porcentaje_tinta_4 ?></td>
        </tr>
        <tr>
          <td rowspan="2">b=<?php echo $value->cie_B ?></td>
          <td><?php echo $value->descripcion_5 ?></td>
          <td><?php echo $value->proveedor_5 ?></td>
          <td><?php echo $value->porcentaje_tinta_5  ?></td>
        </tr>
        <tr>
          <td><?php echo $value->descripcion_6    ?></td>
          <td><?php echo $value->proveedor_6  ?></td>
          <td><?php echo $value->porcentaje_tinta_6  ?></td>
        </tr>
      <?php } ?>

      <!-- Aqui los demas pantones o boton-->
      <tr>
        <td colspan="2">DATOS DE INSTRUMENTOS</td>
        <td><?php echo $data[0]->datos_instrumento ?></td>
        <td>CALIBRACION DE PAPEL</td>
        <td>SI<?php if ($data[0]->calibracion_papel == "SI") { ?>  <img src="<?php echo base_url("resources/icon/iconos_04.png") ?>" alt="" width="5px"> <?php } else { ?> <img src="<?php echo base_url("resources/icon/iconos_03.png") ?>" alt="" width="5px"> <?php }  ?></td>
        <td>NO<?php if ($data[0]->calibracion_papel == "NO") { ?> <img src="<?php echo base_url("resources/icon/iconos_04.png") ?>" alt="" width="5px"> <?php } else { ?> <img src="<?php echo base_url("resources/icon/iconos_03.png") ?>" alt="" width="5px"> <?php }  ?></td>
      </tr>
    </table>

    <!--************* FILTRO DE DENSIDAD ****************************-->
    <br>
    <table class="table-final">
      <tr>
        <td colspan="3">Filtro de densidad</td>
        <td colspan="2">Filtro polarizador</td>
        <td colspan="3">Referencia de blanco</td>
      </tr>
      <tr>
        <td class="fondo-gris">DENSIDAD</td>
        <td class="fondo-gris"><?php echo $data[0]->filtro_densidad   ?></td>
        <td></td>
        <td class="fondo-gris"><?php echo $data[0]->filtro_polarizador_1  ?></td>
        <td></td>
        <td class="fondo-gris"><?php echo $data[0]->referencia_blanco_1  ?></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td colspan="3">Iluminacion/Observador</td>
        <td colspan="2">Filtro polarizador</td>
        <td colspan="2">Referencia de blanco</td>
        <td>Condicion de medicion</td>
      </tr>
      <tr>
        <td class="fondo-gris">CIE *L*a*b</td>
        <td class="fondo-gris"><?php echo $data[0]->iluminacion_observador   ?></td>
        <td></td>
        <td class="fondo-gris"><?php echo $data[0]->filtro_polarizador_2 ?></td>
        <td></td>
        <td class="fondo-gris"><?php echo $data[0]->referencia_blanco_2   ?></td>
        <td></td>
        <td><?php echo $data[0]->condicion_medicion  ?></td>
      </tr>
    </table>
</body>

</html>