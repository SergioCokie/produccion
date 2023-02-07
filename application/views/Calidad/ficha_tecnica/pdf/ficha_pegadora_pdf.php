<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php
  setlocale(LC_TIME, "spanish");
  setlocale(LC_ALL, "es_ES");
  /*$fecha = $data[0]->fecha_creacion;
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
*/
  ?>
  <title>Ficha Pegadora</title>
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
      font-size: 5.5pt;
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
      padding-bottom: 2px;
      padding-top: 2px;
      margin: 0;

    }

    .tabla-subrayado span {
      font-weight: bold;
    }

    .tabla-subrayado p {
      width: 100%;
      border-bottom: 1px solid black;
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

    }

    .tabla1 tr td,
    .tabla-esp tr td,
    .tabla-int tr td {
      margin: 0px;
      padding-top: 0px;
      padding-bottom: 0px;
      padding-left: 5px;
      padding-right: 5px;
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

    p {
      padding: 1px;
      margin: 2px;
    }

    .tabla-posicion{
      margin-top: -4px;
    }
  </style>
</head>

<body>

  <!--****************** Encabezado ***********************-->
  <table class="tabla1" style="margin-bottom: 0px;">
    <tr>
      <td rowspan="4" style="width: 15%"><img src="<?php echo base_url("resources/generales/img/logoficha1.jpg") ?>" alt="" width="150px"></td>
      <td rowspan="2" class="titulo-pagina" style="width: 50%">RECOLECCION DE INFORMACIÓN</td>
      <td colspan="2" style="width: 35%">Fecha de creacion: <span>25/07/2022</span></td>
    </tr>
    <tr>
      <td>VERSION: <span></span></td>
      <td>FICHA: <span></span></td>
    </tr>
    <tr>
      <td rowspan="2" class="titulo-pagina">ESPECIFICA DEL PRODUCTO PEGADORA</td>
      <td colspan="2">DEPARTAMENTO: <span>CALIDAD</span> </td>
    </tr>
    <tr>
      <td colspan="2">Codigo: <span> F-CC-020-3</span></td>
    </tr>
  </table>

  <!--************* Especificaciones  ****************************-->
  <table class="tabla-esp tabla-subrayado" >
    <tr>
      <td colspan="6" class="titulo-tabla">Especificaciones</td>
    </tr>
    <tr>
      <td class="text-rigth">Cliente: </td>
      <td colspan="2"><span>
          <p><?php echo $data[0]->cliente ?></p>
        </span></td>
      <td class=" text-rigth">Producto: </td>
      <td colspan="2"><span>
          <p><?php echo $data[0]->producto ?></p>
        </span> </td>
    </tr>
    <tr>
      <td class=" text-rigth">TIPO DE PRODUCTO: </td>
      <td><span>
          <p><?php echo $data[0]->tipo_producto ?> </p>
        </span></td>
      <td class=" text-rigth">FECHA: </td>
      <td><span>
          <p><?php echo $data[0]->fecha_creacion ?></p>
        </span></td>
      <td class=" text-rigth">COD. PRODUCTO: </td>
      <td><span>
          <p><?php echo $data[0]->cod_producto ?></p>
        </span></td>
    </tr>
    <tr>
      <td class=" text-rigth" style="width: 15%;">OT:</td>
      <td style="width: 20%;"><span>
          <p><?php echo $data[0]->ot ?></p>
        </span></td>
      <td class=" text-rigth" style="width: 15%;">MAQUINA:</td>
      <td style="width: 20%;"><span>
          <p> <?php echo $data[0]->maquina ?> </p>
        </span></td>
      <td class=" text-rigth" style="width: 15%;">OPERARIO:</td>
      <td style="width: 20%;"><span>
          <p> <?php echo $data[0]->operario ?></p>
        </span></td>
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
      <td style="width: 30%;">+/- 0.001 milesima de pulgada</td>
    </tr>
  </table>
  
  <!--************* Especificaciones de pegado  ****************************-->
  <table class="tabla-posicion tabla-subrayado"  style="width: 100%;">
    <tr>
      <td class="titulo-tabla" colspan="4">ESPECIFICACIONES DE PEGADO</td>
    </tr>

    
    <tr>
      <td  style="width: 30%;" class="fondo-gris"> VELOCIDAD DE MAQUINA</td>
      <td colspan="2" style="width: 40%;"><span><?php echo $data[0]->velocidad_maquina_pegado_1  ?></span></td>
      <td style="width: 30%;"><?php echo $data[0]->velocidad_maquina_pegado_2 ?></td>
    </tr>
    <tr>
      <td  style="width: 30%;" class="fondo-gris"> PRESION DE BANDA COLECTORA</td>
      <td colspan="2" style="width: 40%;"><span><?php echo $data[0]->presion_banda_1  ?></span></td>
      <td style="width: 30%;"><?php echo $data[0]->presion_banda_2   ?></td>
    </tr>
    <tr>
      <td rowspan="4" style="width: 30%;" class="fondo-gris">TIPOS DE PEGADO</td>
      <td style="width: 20%;" class="fondo-gris">PEGADO DE LINEA RECTA</td>
      <td style="width: 20%;" class="fondo-gris"> <?php if($data[0]->pegado_linea_recta == "SI") {?><img src="<?php echo base_url("resources/icon/iconos_04.png") ?>" alt="" width="8px"> <?php } else { ?> <img src="<?php echo base_url("resources/icon/iconos_03.png") ?>" alt="" width="8px"> <?php }?>SI  <?php if($data[0]->pegado_linea_recta == "NO") {?><img src="<?php echo base_url("resources/icon/iconos_04.png") ?>" alt="" width="8px"> <?php } else { ?><img src="<?php echo base_url("resources/icon/iconos_03.png") ?>" alt="" width="8px"> <?php }?> NO </td>
      <td style="width: 30%;"></td>
    </tr>
    <tr>
      <td style="width: 20%;"><?php if ($data[0]->pegado_linea_recta_disco == "SI") { ?> <img src="<?php echo base_url("resources/icon/iconos_02.png") ?>" alt="" width="7px"> <?php } else { ?> <img src="<?php echo base_url("resources/icon/iconos_01.png") ?>" alt="" width="7px"> <?php }  ?> DISCO</td>
      <td style="width: 20%;"><?php if ($data[0]->pegado_linea_recta_pistola == "SI") { ?> <img src="<?php echo base_url("resources/icon/iconos_02.png") ?>" alt="" width="7px"> <?php } else { ?> <img src="<?php echo base_url("resources/icon/iconos_01.png") ?>" alt="" width="7px"> <?php }  ?>PISTOLA</td>
      <td style="width: 30%;">Marque la opción</td>
    </tr>
    <tr>
      <td style="width: 20%;" class="fondo-gris">PEGADO DE FONDO AUTOMATICO</td>
      <td style="width: 20%;" class="fondo-gris"><?php if($data[0]->pegado_fondo_automatico == "SI") {?><img src="<?php echo base_url("resources/icon/iconos_04.png") ?>" alt="" width="8px"> <?php } else { ?> <img src="<?php echo base_url("resources/icon/iconos_03.png") ?>" alt="" width="8px"> <?php }?> SI  <?php if($data[0]->pegado_fondo_automatico== "NO") {?><img src="<?php echo base_url("resources/icon/iconos_04.png") ?>" alt="" width="8px"> <?php } else { ?><img src="<?php echo base_url("resources/icon/iconos_03.png") ?>" alt="" width="8px"> <?php }?>NO </td>
      <td style="width: 30%;"></td>
    </tr>
    <tr>
      <td style="width: 20%;"><?php if ($data[0]->pegado_fondo_automatico_disco == "SI") { ?> <img src="<?php echo base_url("resources/icon/iconos_02.png") ?>" alt="" width="7px"> <?php } else { ?> <img src="<?php echo base_url("resources/icon/iconos_01.png") ?>" alt="" width="7px"> <?php }  ?>DISCO </td>
      <td style="width: 20%;"><?php if ($data[0]->pegado_fondo_automatico_pistola == "SI") { ?> <img src="<?php echo base_url("resources/icon/iconos_02.png") ?>" alt="" width="7px"> <?php } else { ?> <img src="<?php echo base_url("resources/icon/iconos_01.png") ?>" alt="" width="7px"> <?php }  ?>PISTOLA </td>
      <td style="width: 30%;">Marque la opción</td>
    </tr>
    
    <tr>
      <td rowspan="2" class="fondo-gris"> TIPO DE PEGA <br> Agregar codigo, marca</td>
      <td colspan="2" >DISCO:<span><?php echo $data[0]->tipo_pega_disco_1   ?></span></td>
      <td ><?php echo $data[0]->tipo_pega_disco_2  ?></td>
    </tr>
    <tr>
      <td colspan="2">PISTOLA: <span><?php echo $data[0]->tipo_pega_pistola_1  ?></span></td>
      <td><?php echo $data[0]->tipo_pega_pistola_2  ?></td>
    </tr>
  </table>

  <!--********************************** Disco   ****************************-->
  <table style="width: 100%;" class="tabla-posicion tabla-subrayado">
    <tr>
      <td class="titulo-tabla" colspan="5">DISCO</td>
    </tr>
    <tr>
      <td style="width: 15%;" class="fondo-gris"> LOTE</td>
      <td style="width: 15%;" class="fondo-gris"> VENCE</td>
      <td style="width: 20%;"><span> <?php echo $data[0]->disco_lote   ?></span></td>
      <td style="width: 20%;"><span> <?php echo $data[0]->disco_vence  ?></span></td>
      <td style="width: 30%;">Vence sin tolerancia</td>
    </tr>
  </table>
  <!--********************************** PISTOLA  ****************************-->
  <table style="width: 100%;" class="tabla-posicion tabla-subrayado">
    <tr>
      <td class="titulo-tabla" colspan="5">PISTOLA</td>
    </tr>
    <tr>
      <td style="width: 15%;" class="fondo-gris"> LOTE</td>
      <td style="width: 15%;" class="fondo-gris"> VENCE</td>
      <td style="width: 20%;"> <span> <?php echo $data[0]->pistola_vence  ?> </span></td>
      <td style="width: 20%;"> <span> <?php echo $data[0]->pistola_lote  ?> </span></td>
      <td style="width: 30%;">Vence sin tolerancia</td>
    </tr>
    <tr>
      <td colspan="2" style="width: 30%;" class="fondo-gris"> N° DE BANDAS A TRANSFERIR</td>
      <td colspan="2" style="width: 40%;"><span> <?php echo $data[0]->bandas_transferir  ?> </span></td>
      <td style="width: 30%;"><span><b>*Numero de bandas que pasan sobre la baja durante la producción maquina*</b></span></td>
    </tr>
  </table>
  <!--********************************** PEGADO DE ACETATO  ****************************-->
  <table style="width: 100%;" class="tabla-posicion tabla-subrayado">
    <tr>
      <td class="titulo-tabla" colspan="5">PEGADO DE ACETATO</td>
    </tr>
    <tr>
      <td colspan="2" style="width: 30%;" class="fondo-gris"> VELOCIDAD DE PEGADO</td>
      <td colspan="2" style="width: 40%;"><span><?php echo $data[0]->velocidad_pegado_1  ?></span></td>
      <td style="width: 30%;"><span><?php echo $data[0]->velocidad_pegado_2   ?></span></td>
    </tr>
    <tr>
      <td colspan="2" style="width: 30%;" class="fondo-gris">TIPO DE ACETATO</td>
      <td colspan="2" style="width: 40%;"><span><?php echo $data[0]->tipo_acetato_1   ?></span></td>
      <td style="width: 30%;"><span><?php echo $data[0]->tipo_acetato_2    ?></span></td>
    </tr>
    <tr>
      <td colspan="2" style="width: 30%;" class="fondo-gris">ESPESOR DE ACETATO</td>
      <td colspan="2" style="width: 40%;"><span><?php echo $data[0]->espesor_acetato_1  ?></span></td>
      <td style="width: 30%;"><span><?php echo $data[0]->espesor_acetato_2   ?></span></td>
    </tr>
    <tr>
      <td colspan="2" style="width: 30%;" class="fondo-gris">MEDIDA DE ACETATO</td>
      <td style="width: 20%;">ANCHO: <span> <?php echo $data[0]->medida_acetato_ancho    ?></span></td>
      <td style="width: 20%;">LARGO: <span> <?php echo $data[0]->medida_acetato_largo  ?></span></td>
      <td style="width: 30%;">+/- 2 mm</td>
    </tr>
    <tr>
      <td colspan="2" style="width: 30%;" class="fondo-gris">TIPO DE PEGA *Agregar codigo y marca*</td>
      <td style="width: 20%;">ANCHO: <span><?php echo $data[0]->tipo_pega_1  ?></td>
      <td style="width: 20%;">LARGO: <span><?php echo $data[0]->tipo_pega_2  ?></td>
      <td style="width: 30%;">+/- 2 mm</td>
    </tr>
    <tr>
      <td style="width: 15%;" class="fondo-gris"> LOTE</td>
      <td style="width: 15%;" class="fondo-gris"> VENCE</td>
      <td style="width: 20%;"><?php echo $data[0]->acetato_lote   ?></td>
      <td style="width: 20%;"><?php echo $data[0]->acetato_vence  ?></td>
      <td style="width: 30%;">Vence sin tolerancia</td>
    </tr>
    <tr>
      <td colspan="2" style="width: 30%;" class="fondo-gris">ALIMENTACION</td>
      <td style="width: 20%;">DOBLE: <?php if ($data[0]->alimentacion_doble   == "SI") { ?> checked <?php } ?></td>
      <td style="width: 20%;">INDIVIDUAL: <?php if ($data[0]->alimentacion_individual  == "SI") { ?> checked <?php  } ?></td>
      <td style="width: 30%;">Vence sin tolerancia</td>
    </tr>
  </table>

  <!--********************************** EMPACADO  ****************************-->
  <table style="width: 100%;" class="tabla-posicion">
    <tr>
      <td class="titulo-tabla" colspan="5">EMPACADO</td>
    </tr>
    <tr>
      <td colspan="2" style="width: 30%;" class="fondo-gris"> TIPO DE CORRUGADO</td>
      <td colspan="2" style="width: 40%;"><span><?php echo $data[0]->tipo_corrugado_1    ?></span></td>
      <td style="width: 30%;"><?php echo $data[0]->tipo_corrugado_2    ?></td>
    </tr>
    <tr>
      <td colspan="2" style="width: 30%;" class="fondo-gris"> UNIDADES DE CORRUGADO</td>
      <td colspan="2" style="width: 40%;"><span><?php echo $data[0]->unidades_corrugado_1   ?></span></td>
      <td style="width: 30%;"><?php echo $data[0]->unidades_corrugado_2   ?></td>
    </tr>
    <tr>
      <td colspan="2" style="width: 30%;" class="fondo-gris">PRODUCTO FAJADO</td>
      <td style="width: 20%;">SI: <?php if ($data[0]->producto_fajado == "SI") { ?> <img src="<?php echo base_url("resources/icon/iconos_04.png") ?>" alt="" width="8px"> <?php } else { ?> <img src="<?php echo base_url("resources/icon/iconos_03.png") ?>" alt="" width="8px"> <?php }  ?></td>
      <td style="width: 20%;">NO: <?php if ($data[0]->producto_fajado == "NO") { ?> <img src="<?php echo base_url("resources/icon/iconos_04.png") ?>" alt="" width="8px"> <?php } else { ?> <img src="<?php echo base_url("resources/icon/iconos_03.png") ?>" alt="" width="8px"> <?php }  ?></td>
      <td style="width: 30%;">Marque la opción</td>
    </tr>
    <tr>
      <td colspan="2" style="width: 30%;" class="fondo-gris"> UNIDADES POR FAJADO</td>
      <td colspan="2" style="width: 40%;"><span><?php echo $data[0]->unidades_fajado_1   ?></span></td>
      <td style="width: 30%;"><?php echo $data[0]->unidades_fajado_2   ?></td>
    </tr>
    <tr>
      <td colspan="5">Observaciones:</td>
    </tr>
    <tr>
      <td colspan="5"><textarea name="" id="" style="width: 98%;"><?php echo $data[0]->observaciones ?></textarea></td>
    </tr>
  </table>

  <!--*************Encargados Calidad  ****************************-->
  <br>
  <table class="tabla-encargados" style="margin-top: 0px;">
    <tr>
      <td class="titulo-tabla" colspan="4">ENCARGADOS CALIDAD:</td>
    </tr>
    <tr>
      <td>DEPARTAMENTO DE CALIDAD</td>
      <td><?php echo $data[0]->encargados_nombre    ?></td>
      <td>FIRMA</td>
      <td><?php echo date('d/m/Y') ?></td>
    </tr>
  </table>

</body>

</html>