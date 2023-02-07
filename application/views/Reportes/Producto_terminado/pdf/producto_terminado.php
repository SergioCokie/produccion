<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php
  //setlocale(LC_TIME, "spanish");
  // setlocale(LC_ALL, "es_ES");
  //  $fecha = $data[0]->fecha_creacion;
  // $newDate = date("F-Y", strtotime($fecha));
  //$mes = strftime("%B", strtotime($newDate));
  //$year = strftime("%Y", strtotime($newDate));
  //$mes = date("F", $newDate);
  //  $year = date ("Y",$newDate);
  /*
 
  */
  // <title><?php echo $id_ficha 
  $n = 0;
  $numero = intval($producto_terminado[0]->id);
  do {
    $numero = floor($numero / 10);
    $n = $n + 1;
  } while ($numero > 0);

  $ceros = abs(7 - $n);
  $codigo = "";
  for ($i = 0; $i < $ceros; $i++) {
    $codigo .= "0";
  }
  $id_ficha = $codigo . $producto_terminado[0]->id;

  ?>
  </title>
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
      font-size: 8pt;
      /*  word-spacing: 0.25em;*/
    }

    .saltopagina {
      page-break-after: always;
    }

    table,
    th,
    td {
      border: 3px solid black;
      border-collapse: collapse;
      padding-left: 5px;
      padding-right: 5px;
      padding-bottom: 3px;
      padding-top: 3px;
      /** line-height: 5px; */
    }

    p {
      padding: 0;
      margin: 0;
    }

    .titulo-tabla {
      font-weight: bold;
      font-size: 18pt !important;
    }



    .tabla-sinborder,
    .tabla-sinborder th,
    .tabla-sinborder td {
      border: none
    }

    .tabla-subrayado span {
      font-weight: bold;
    }

    .tabla-subrayado p {
      width: 100%;
      border-bottom: 1px solid black;
    }

    .titulo-center-fila td {
      text-align: center;
      font-weight: bold;
    }

    .titulo-center-todo tr td {
      text-align: center;
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

    .border-div {
      border: 2px solid black;
      padding: 5px;
    }

    .espaciado {
      padding-bottom: 20px;
      padding-top: 20px;
    }
  </style>
</head>

<body>

  <div class="pricipal" style="border: 2px solid black; padding: 10px;">

    <table class="tabla-sinborder" style="width: 100%;">
      <tr>
        <td rowspan="3" style="width: 20%;"></td>
        <td rowspan="3" style="width: 60%;">
          <center>
            <div class=" border-div"><span class="titulo-tabla">Entrega de Producto Terminado</span></div>
          </center>
        </td>
        <td style="width: 20%;" class="text-rigth"><?php echo $id_ficha ?></td>
      </tr>
      <tr>
        <td class="text-rigth">N de ingreso: <span class="subrayado"><?php echo ($producto_terminado[0]->numero_ingreso=="")?"-":$producto_terminado[0]->numero_ingreso?></span></td>
      </tr>
      <tr>
        <td class="text-rigth">Hora: <span><?php echo ($producto_terminado[0]->hora=="")?"-":$producto_terminado[0]->hora?></span></td>
      </tr>
    </table>

    <table class="tabla-sinborder tabla-subrayado" style="width: 100%;">
      <tr>
        <td class="text-rigth">Fecha de Entrega:</td>
        <td>
          <p class="subrayado"><span><?php echo $contenido_producto_terminado[0]->fecha_entrega ?></span></p>
        </td>
        <td></td>
        <td class="text-rigth" colspan="2">Fecha ingreso a Sistema:</td>
        <td>
          <p><Span><?php echo $producto_terminado[0]->fecha_sistema ?></Span></p>
        </td>
      </tr>
      <tr>
        <td class="text-rigth">Cliente:</td>
        <td>
          <p><span><?php echo $producto_terminado[0]->cliente ?></span></p>
        </td>
        <td></td>
        <td class="text-rigth">OP:</td>
        <td>
          <p><span><?php echo $producto_terminado[0]->ot ?></span></p>
        </td>
        <td></td>
      </tr>
    </table>

    <table style="width: 100%;" class="titulo-center-todo">
      <tr class="titulo-center-fila fondo-gris">
        <td style="width: 15%;">Cantidad</td>
        <td style="width: 15%;">ID Trello</td>
        <td style="width: 15%;">Maquina</td>
        <td style="width: 10%;">Cod. <br> Producto</td>
        <td style="width: 30%;">Descripcion Trello</td>
        <td style="width: 15%;">Producto</td>
      </tr>
      <?php foreach ($contenido_producto_terminado as $key => $value) {
      ?>
        <tr>
          <td><?php echo ($value->cantidad == "" ? "-" : $value->cantidad) ?></td>
          <td><?php echo ($value->id_trello == "" ? "-" : $value->id_trello) ?></td>
          <td><?php echo ($value->maquina == "" ? "-" : $value->maquina) ?></td>
          <td><?php echo ($value->codigo_producto == "" ? "-" : $value->codigo_producto) ?></td>
          <td><?php echo ($value->descripcion_trello == "" ? "-" : $value->descripcion_trello) ?></td>
          <td><?php echo ($value->producto == "" ? "-" : $value->producto) ?></td>
        </tr>
      <?php
      }
      ?>
      <tr class="fondo-gris">
        <td>Area que Entrega</td>
        <td colspan="5"> Detalle</td>
      </tr>

      <tr>
        <td><?php echo ($producto_terminado[0]->area_entrega == "" ? "-" : $producto_terminado[0]->area_entrega) ?></td>
        <td colspan="2">Bultos</td>
        <td colspan="3">Peso</td>
      </tr>
      <?php
      $count1 = 0;
      $rows = count($detalle_producto_terminado);
      foreach ($detalle_producto_terminado as $key => $value) {
      ?>
        <tr>
          <?php echo ($count1 == 0 ? "<td  rowspan=\"$rows\" class=\"fondo-gris\">Area que Recibe</td>" : ""); $count1++; ?>
          <td colspan="2" class="espaciado"><?php echo  ($value->detalle_bultos==""?"-":$value->detalle_bultos) ?></td>";
          <td colspan="3"><?php echo  ($value->detalle_peso==""?"-":$value->detalle_peso) ?></td>";
        </tr>";
      <?php
      }
      ?>
      <tr>
        <td class=""><?php echo ($producto_terminado[0]->area_recibe == "" ? "-" : $producto_terminado[0]->area_recibe) ?></td>
        <td colspan="2"></td>
        <td colspan="3"></td>
      </tr>
    </table>

    <table style="width: 100%;">
      <tr>
        <td style="width: 15%;">Número de entrega:</td>
        <td style="width: 85%;"> <?php echo  $producto_terminado[0]->numero_entrega ?></td>
      </tr>
    </table>

    <table class="tabla-sinborder" style="width: 100%;">
      <tr>
        <td style="width: 10%;"></td>
        <td style="width: 25%;" class="text-rigth">Número de corrugados totales:</td>
        <td style="width: 15%;">
          <p class="subrayado"><span><?php echo  $producto_terminado[0]->numero_corrugados ?></span></p>
        </td>
        <td style="width: 15%;" class="text-rigth">Número de tarimas:</td>
        <td style="width: 25%;">
          <p class="subrayado"><span><?php echo  $producto_terminado[0]->numero_tarimas ?></span></p>
        </td>
        <td style="width: 10%;"></td>
      </tr>
    </table>

    <table class="tabla-sinborder" style="width: 100%;">
      <tr>
        <td style="width: 35%;">
          <center>
            <div style="border: 2px solid gray; padding: 10px;"><?php echo  $producto_terminado[0]->nombre_produccion?></div>
          </center>
        </td>
        <td style="width: 45%;">
          <center>
            <p style="border: 2px solid gray; padding: 10px;"> <?php echo  $producto_terminado[0]->nombre_area_recibe?></p>
          </center>
        </td>
        <td style="width: 20%;" rowspan="2"> 
        <center>
        <?php if ($producto_terminado[0]->selector == "parcial") { ?>  <img src="<?php echo base_url("resources/icon/iconos_04.png") ?>" alt="" width="15px"> <?php } else { ?> <img src="<?php echo base_url("resources/icon/iconos_03.png") ?>" alt="" width="15px"> <?php } ?> Parcial  <br>
        <?php if ($producto_terminado[0]->selector == "completo") { ?>  <img src="<?php echo base_url("resources/icon/iconos_04.png") ?>" alt="" width="15px"> <?php } else { ?> <img src="<?php echo base_url("resources/icon/iconos_03.png") ?>" alt="" width="15px"> <?php } ?>    Completo 
        </center>  
      </td>
      </tr>
      <tr>
        <td class="text-center">Produccion</td>
        <td class="text-center">Bodega</td>
      </tr>
    </table>





  </div>



</body>

</html>