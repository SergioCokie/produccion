<div style="text-align: center;width: 100%;">
        <a id="descargar" class="btn botones" href="<?= base_url() ?>calidad/ficha_tecnica/print/<?php echo $type ?>/<?php echo $data[0]->ID ?>">
            <img src="/Produccion/resources/img/descarga.png" alt="">
            <span>DESCARGAR</span>
        </a>

        <button id="editar" class="btn align-middle botones">
            <img src="/Produccion/resources/img/Editar.png" alt="" width="34px" height="29px">
            <span>Editar</span>
        </button>

        <button id="<?= $data[0]->ID ?>" name="<?= $type ?>" class="btn align-middle cerrar_ficha botones">
            <img src="/Produccion/resources/img/enviar.png" alt="">
            <span>Cerrar</span>
        </button>

</div>

<style>
    * {
        font-weight: bold;

    }

    textarea {
        border: none;
        outline: none;
    }

    input:disabled {
        font-weight: bold;
        color: black;
        background-color: transparent !important;
    }



    button#descargar {
        background-color: #823d64;
        color: white;

    }

    button#descargar span {
        border-left: 2px solid white;
        padding: 10px 5px 10px 5px;
    }

    button#editar {
        background-color: #65A753;
        color: white;
    }

    button#editar span {
        border-left: 2px solid white;
        padding: 10px 5px 10px 5px;
    }

    button#cerrar {
        background-color: #1F3558;
        color: white;
    }

    button#cerrar span {
        border-left: 2px solid white;
        padding: 10px 5px 10px 5px;
    }


    /*FICHA TECNICA-TABLA*/
    div.ficha-tecnica table {
        font-size: 14px;
    }

    div.ficha-tecnica table thead:nth-child(1) th {
        background-color: #1F3558;
        color: white;
        text-align: center;
        position: sticky;
        top: 0;
        z-index: 10;
    }

    div.ficha-tecnica table thead:nth-child(1) th:first-child {
        border-top-left-radius: 20px;
    }

    div.ficha-tecnica table thead:nth-child(1) th:last-child {
        border-top-right-radius: 20px;
    }

    div.ficha-tecnica table thead:nth-child(2) select {
        width: 100% !important;
        font-size: 10px;
        height: 38px;
    }

    div.ficha-tecnica table thead:nth-child(2) input,
    div.ficha-tecnica table thead:nth-child(2) select {
        border-color: transparent;
        background-color: rgba(31, 53, 88, 0.2);
        border-radius: 10px;
        text-align: center;
        width: 80%;
        margin: 0 auto;
        border-color: black;
    }

    div.ficha-tecnica table thead:nth-child(2) input[type=date] {
        width: 90%;
    }

    div.ficha-tecnica hr {
        padding: 0 !important;
        margin: 5px 0px 5px 0px !important;
        width: 100%;
        color: white;
        height: 2px;
    }

    div.ficha-tecnica button.crear {
        background-color: #65A753;
        color: white;
        border-radius: 10px;
    }

    div.ficha-tecnica table a,
    a.ver {
        background-color: #1F3558;
        color: white;
        border-radius: 10px;
    }

    div.ficha-tecnica table button:hover {
        color: white;
    }

    div.ficha-tecnica span,
    span#span {
        border-left: white 2px solid;
        padding-left: 8px;
        margin-left: 8px;
    }



    /*FICHA-IMPRESORAS*/
    div.ficha-impresora table#tabla-cambios {
        font-size: 10px;
    }


    div.ficha-impresora input {
        outline: none;
        background-color: transparent;
    }

    div.ficha-impresora .pintado {
        background-color: rgba(31, 53, 88, 0.2);
        font-weight: bold;
    }

    div.ficha-impresora td span {
        font-weight: bold;
        font-size: 10px;
    }

    div.ficha-impresora td span#dif {
        font-weight: normal;
        font-size: 14px;

    }

    td.unidad {
        width: 80px;
    }

    td.input-sub input {
        border-bottom: 0.5px solid black !important;
    }

    /*ENCABEZADO*/
    div.ficha-impresora input[type=checkbox] {
        width: 12px;
        height: 12px;
        margin-top: 5px;

    }

    div.ficha-impresora>div.row>div.col-2,
    div.ficha-impresora>div.row>div.col-3,
    div.ficha-impresora div#encabezado div.col-2,
    div.ficha-impresora div#encabezado div.col-3 {
        border: 0.5px solid black;
    }

    div.ficha-impresora>div.row>div.col-7>div.row:nth-child(1) div.col-12,
    div.ficha-impresora div#encabezado div.col-7 div.row:nth-child(1) div.col-12 {
        border: 0.5px solid black;
        border-right: transparent;
        border-left: transparent;
    }

    div.ficha-impresora>div.row>div.col-7>div.row:nth-child(2) div.col-12,
    div.ficha-impresora div#encabezado div.col-7 div.row:nth-child(2) div.col-12 {
        border-bottom: 0.5px solid black;
    }


    div.ficha-impresora>div.row div.col-3:last-child,
    div.ficha-impresora div#encabezado div.col-3:last-child {
        font-size: 11px;
        font-weight: bold;


    }

    div.ficha-impresora>div.row div.col-3:last-child div.col-12,
    div.ficha-impresora div#encabezado div.col-3:last-child div.col-12 {
        border-bottom: 0.5px solid black;
    }

    div.ficha-impresora>div.row div.col-3:last-child div.col-12:last-child {
        border-bottom: transparent;
    }


    div.ficha-impresora div.especificaciones div.col-12 {
        text-align: center;
        background-color: black;
        color: white;
        font-size: 12px;
        font-weight: bold;

    }

    div.ficha-impresora div.especificaciones div.row {
        text-align: center;

        font-size: 11px;
        margin-top: 15px !important;

    }

    div.ficha-impresora div.especificaciones div.row input {
        border: transparent;
        border-bottom: 0.5px solid black;

    }

    div.ficha-impresora table td {
        border: 0.5px solid black;
    }

    div.ficha-impresora table tbody input {
        border: transparent;

    }

    div.ficha-impresora table:nth-child(2) thead th:nth-child(1),
    div.ficha-impresora table:nth-child(2) thead th:nth-child(3) {
        width: 25%;
    }



    /*FICHA PEGADORA*/


    div.ficha-pegadora input {
        outline: none;
        background-color: transparent;
    }

    div.ficha-pegadora .pintado {
        background-color: rgba(31, 53, 88, 0.2);
        font-weight: bold;
    }

    div.ficha-pegadora td span {
        font-weight: bold;
        font-size: 10px;
    }

    div.ficha-pegadora td span#dif {
        font-weight: normal;
        font-size: 14px;

    }

    /*ENCABEZADO*/
    div.ficha-pegadora input[type=checkbox] {
        width: 14px;
        height: 14px;
        margin-top: 5px;

    }

    div.ficha-pegadora>div.row>div.col-2,
    div.ficha-pegadora>div.row>div.col-3 {
        border: 0.5px solid black;
    }

    div.ficha-pegadora>div.row>div.col-7>div.row:nth-child(1) div.col-12 {
        border: 0.5px solid black;
        border-right: transparent;
        border-left: transparent;
    }

    div.ficha-pegadora>div.row>div.col-7>div.row:nth-child(2) div.col-12 {
        border-bottom: 0.5px solid black;
    }


    div.ficha-pegadora>div.row div.col-3:last-child {
        font-size: 11px;
        font-weight: bold;


    }

    div.ficha-pegadora>div.row div.col-3:last-child div.col-12 {
        border-bottom: 0.5px solid black;
    }

    div.ficha-pegadora>div.row div.col-3:last-child div.col-12:last-child {
        border-bottom: transparent;
    }


    div.ficha-pegadora div.especificaciones div.col-12 {
        text-align: center;
        background-color: black;
        color: white;
        font-size: 12px;
        font-weight: bold;

    }

    div.ficha-pegadora div.especificaciones div.row {
        text-align: center;

        font-size: 11px;
        margin-top: 15px !important;

    }

    div.ficha-pegadora div.especificaciones div.row input {
        border: transparent;
        border-bottom: 0.5px solid black;

    }

    div.ficha-pegadora table td {
        border: 0.5px solid black;
    }

    div.ficha-pegadora table tbody input {
        border: transparent;

    }

    div.ficha-pegadora table:nth-child(2) thead th:nth-child(1),
    div.ficha-pegadora table:nth-child(2) thead th:nth-child(3) {
        width: 25%;
    }

    /*FICHA TROQUELADO*/


    div.ficha-troquelado input {
        outline: none;
        background-color: transparent;
    }

    div.ficha-troquelado .pintado {
        background-color: rgba(31, 53, 88, 0.2);
        font-weight: bold;
    }

    div.ficha-troquelado td span {
        font-weight: bold;
        font-size: 10px;
    }

    div.ficha-troquelado td span#dif {
        font-weight: normal;
        font-size: 14px;

    }

    /*ENCABEZADO*/
    div.ficha-troquelado input[type=checkbox] {
        width: 12px;
        height: 12px;
        margin-top: 5px;

    }

    div.ficha-troquelado>div.row>div.col-2,
    div.ficha-troquelado>div.row>div.col-3 {
        border: 0.5px solid black;
    }

    div.ficha-troquelado>div.row>div.col-7>div.row:nth-child(1) div.col-12 {
        border: 0.5px solid black;
        border-right: transparent;
        border-left: transparent;
    }

    div.ficha-troquelado>div.row>div.col-7>div.row:nth-child(2) div.col-12 {
        border-bottom: 0.5px solid black;
    }


    div.ficha-troquelado>div.row div.col-3:last-child {
        font-size: 11px;
        font-weight: bold;


    }

    div.ficha-troquelado>div.row div.col-3:last-child div.col-12 {
        border-bottom: 0.5px solid black;
    }

    div.ficha-troquelado>div.row div.col-3:last-child div.col-12:last-child {
        border-bottom: transparent;
    }


    div.ficha-troquelado div.especificaciones div.col-12 {
        text-align: center;
        background-color: black;
        color: white;
        font-size: 12px;
        font-weight: bold;

    }

    div.ficha-troquelado div.especificaciones div.row {
        text-align: center;

        font-size: 11px;
        margin-top: 15px !important;

    }

    div.ficha-troquelado div.especificaciones div.row input {
        border: transparent;
        border-bottom: 0.5px solid black;

    }

    div.ficha-troquelado table td {
        border: 0.5px solid black;
    }

    div.ficha-troquelado table tbody input {
        border: transparent;

    }

    div.ficha-troquelado table:nth-child(2) thead th:nth-child(1),
    div.ficha-troquelado table:nth-child(2) thead th:nth-child(3) {
        width: 25%;
    }
</style>

<style>
    #global {
        height: auto;
        width: auto;
        /*border: 1px solid #ddd;*/
        /*background: #f1f1f1;*/
        overflow-y: scroll;
    }
</style>

<div id="global">