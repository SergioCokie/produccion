<style>
    .tablenm {
        width: 100%;
        margin-bottom: 0rem;
        font-family: sans-serif;
        font-size: 12px;
    }

    thead th {
        position: -webkit-sticky;
        /* for Safari */
        position: sticky;
        top: 0;
        z-index: 2;
        border: 1px solid #e3e6f0;
    }

    thead tr:first-child {
        left: 0;
        z-index: 1;
    }

    thead th {
        position: -webkit-sticky;
        /* for Safari */
        position: sticky;
        left: 0;
        background: #FFF;
    }

    tbody th {
        position: -webkit-sticky;
        /* for Safari */
        position: sticky;
        left: 0;
        background: #FFF;
    }

    tbody tr {
        left: 0;
        top: 0;
        z-index: 3;
    }

    table tbody:nth-of-type(1) tr:nth-of-type(1) td {
        border-top: none !important;
    }

    table thead th {
        border-top: none !important;
        border-bottom: none !important;
        box-shadow: inset 0 1px 0 #e3e6f0,
            inset 0 -1px 0 #e3e6f0;
        padding: 2px 0;
    }

    table thead th {
        background-clip: padding-box
    }

    td,
    th {
        padding: 0em;
    }

    thead tr.first th,
    thead tr.first td {
        position: sticky;
        position: -webkit-sticky;
        /* Safari */
        top: 0;
        background: #FFFFFF;
    }

    thead tr.second th,
    thead tr.second td {
        position: sticky;
        position: -webkit-sticky;
        /* Safari */
        background: #FFFFFF;
    }

    .tablenm th,
    .tablenm td {
        padding: 0.25rem;
        vertical-align: top;
        border-top: 1px solid #e3e6f0;
    }

    .tablenm thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #e3e6f0;
    }

    .tablenm tbody+tbody {
        border-top: 2px solid #e3e6f0;
    }

    .tablenm-sm th,
    .tablenm-sm td {
        padding: 0.3rem;
    }

    .tablenm-bordered {
        border: 1px solid #e3e6f0;
    }

    .tablenm-bordered th,
    .tablenm-bordered td {
        border-top: none;
        border-bottom: 1px solid #e3e6f0;
        border-right: 1px solid #e3e6f0;
    }

    .tablenm-bordered thead th,
    .tablenm-bordered thead td {
        border-bottom-width: 2px;
    }
</style>
<?php
    print_r($prueba_de_otra_conexion);
?>

<div class="contenedor">
    <section class="section my-5 pb-5">
        <div style="height: 525px;">
            <table class="tablenm tablenm-bordered">
                <thead>
                    <tr class="align-middle text-center second" style=" font-size: 12px;color: #555;">
                        <th><strong>
                                <div class="row">
                                    <div class="col-8">
                                        POTENCIAL DE CLIENTE
                                    </div>
                                    <div class="col-4">
                                        CLIENTE
                                    </div>
                                </div>
                            </strong></th>
                        <th><strong>MEDIO DE CONTACTO</strong></th>
                        <th><strong>SECTOR</strong></th>
                        <th><strong>SUB SECTOR</strong></th>
                        <th><strong>PRODUCTOS A OFRECER</strong></th>
                        <th><strong>ESTADO</strong></th>
                        <th><strong>SEGUIMIENTO</strong></th>
                        <th><strong>CLIENTE FIDELIZADO</strong></th>
                        <th><strong>CONTACTO</strong></th>
                        <th><strong>TELEFONO</strong></th>
                        <th><strong>EMAIL</strong></th>
                        <th><strong>CONTACTO 2</strong></th>
                        <th><strong>EMAIL 2</strong></th>
                        <th><strong>DIRECCION</strong></th>
                        <th><strong>PAGINA WEB</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" value="" style="width: 30px;">

                                </div>
                                <div class="col-6">
                                    <input type="text" value="">

                                </div>
                            </div>

                        </th>
                        <td>651</td>
                        <td>2,116</td>
                        <td>78.4%</td>
                        <td>$3,306</td>
                        <td>$791</td>
                        <td>$2,572</td>
                        <td>77.8%</td>
                        <td>$200</td>
                        <td>$204</td>
                        <td>$662</td>
                        <td>330.8%</td>
                        <td>$3,506</td>
                        <td>$995</td>
                        <td>$3,234</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </section>
</div>
<script>
    $(document).ready(function() {
        var firstheight = $('.first').height();
        $("thead tr.second th, thead tr.second td").css("top", firstheight)
    });
</script>