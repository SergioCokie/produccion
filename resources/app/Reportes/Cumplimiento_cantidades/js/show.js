$(document).ready(function () {
    jQuery.extend({
        getValues: function (url) {
            var resultado_validacion = null;
            $.ajax({
                type: "POST",
                url: "Informe_cumplimiento/test",
                async: false,
                success: function (res) {
                    var datos = JSON.parse(res);
                    resultado_validacion = datos;
                },
            });
            return resultado_validacion;
        },
    });
    var resultado_validacion = $.getValues("url string");//ESTO TRAE TODA LAS VALIDACIONES DE ARRANQUES


    let date = new Date()
    let day = date.getDate()
    let month = date.getMonth() + 1
    let year = date.getFullYear()

    let datos_detalle = {
        fecha_desde: '',
        fecha_hasta: '',
    }

    $("#intervalos").change(function (e) {
        if ($("#intervalos").val() == "hoy") {
            datos_detalle.fecha_desde = month < 10 ? `${year}/0${month}/${day}` : `${year}/${month}/${day}`
            datos_detalle.fecha_hasta = month < 10 ? `${year}/0${month}/${day}` : `${year}/${month}/${day}`
        } else if ($("#intervalos").val() == "semana") {
            datos_detalle.fecha_desde = month < 10 ? `${year}/0${month}/${day - 7}` : `${year}/${month}/${day - 7}`
            datos_detalle.fecha_hasta = month < 10 ? `${year}/0${month}/${day}` : `${year}/${month}/${day}`
        } else {
            datos_detalle.fecha_desde = month < 10 ? `${year}/0${month - 1}/${day}` : `${year}/${month - 1}/${day}`
            datos_detalle.fecha_hasta = month < 10 ? `${year}/0${month}/${day}` : `${year}/${month}/${day}`
        }
    });


    $('#buscar_informe_cumplimiento').validetta({
        realTime: true,
        display: 'inline',
        errorTemplateClass: 'validetta-inline',
        onValid: function (event) {
            event.preventDefault();


            if ($("#fecha_inicial").val() != "" && $("#fecha_final").val() != "" || $("#intervalos").val() != "") {

                if ($("#fecha_inicial").val() != "" && $("#fecha_final").val() != "") {
                    datos_detalle = {
                        fecha_desde: $("input[name=fecha_inicial]").val(),//fecha desde
                        fecha_hasta: $("input[name=fecha_final]").val(),//fecha hasta
                    }
                    console.log(datos_detalle);
                    $("table#tabla_cumplimiento_cantidades").dataTable().fnDestroy();//reiniciamos el datatble 
                    mostrar_tabla_detalle_cumplimiento(datos_detalle)

                    $(".tab-pane").removeClass("in show active");//le eliminamos estas clases al div (en caso contrario se pondria uno encima de otros)
                    $("#contenedor_tabla_cumpli_cant").addClass("in show active");//obtenemos el div que tenga este id y le agregarmos estas clases para mostrarlo


                } else if ($("#intervalos").val() != "") {
                    console.log(datos_detalle);

                    $("table#tabla_cumplimiento_cantidades").dataTable().fnDestroy();//reiniciamos el datatble 
                    mostrar_tabla_detalle_cumplimiento(datos_detalle)

                    $(".tab-pane").removeClass("in show active");//le eliminamos estas clases al div (en caso contrario se pondria uno encima de otros)
                    $("#contenedor_tabla_cumpli_cant").addClass("in show active");//obtenemos el div que tenga este id y le agregarmos estas clases para mostrarlo
                }
            } else {
                toastr["warning"]('LLene los demas campos')
            }

        },
        onError: function (event) {
            toastr["error"]('Seleccione un tipo de maquina')
        }
    });


    $("#fecha_inicial").change(function (e) {

        if ($(this).val() != "") {
            $("#fecha_final").attr("disabled", false);
            $("#intervalos").attr("disabled", true);
            //TODOl seleccionar el vacio de intervalo
        } else {
            $("#fecha_final").attr("disabled", true);
            $("#intervalos").attr("disabled", false);
            $("#fecha_final").val("");
        }
    });

    function mostrar_tabla_detalle_cumplimiento(params) {
        var table = $("table#tabla_cumplimiento_cantidades").DataTable({
            ajax: {
                method: "POST",
                url: "Informe_cumplimiento/get_informe",
                data: params,
                complete: function () {
                    color()
                },
            }, //imprimimos las columnas en un div para poder controlar el espacio en cada td y asi poder colocarlos en toda la pantalla los 10 td
            columns: [
                {
                    data: "ID",
                    render: function (ID) {
                        return (
                            ""
                        );//aqui no imprimimos nada
                    },
                },
                { data: "fecha" },
                { data: "turno" },
                { data: "codigo_equipo" },
                { data: "tipo" },
                { data: "id_trello" },
                { data: "ot_trello" },
                {
                    data: "descripcion_trello",
                    render: function (descripcion_trello) {
                        return (
                            `<td>
								<div class="wrap">`+ (descripcion_trello != null ? descripcion_trello : "-") + `</div>
							</td>`
                        );
                    },
                },
                { data: "cantidad_produc" },
                {
                    data: "descripcion_trello",
                    render: function (descripcion_trello) {
                        let cantidad_esperada = ""
                        if (descripcion_trello != null) {
                            let cantidad = descripcion_trello?.split("-");
                            cantidad_esperada = parseInt(cantidad[cantidad.length - 1]);

                        }
                        return (
                            `<td>
								<div class="wrap">`+ (cantidad_esperada != null ? cantidad_esperada : "-") + `</div>
							</td>`
                        );
                    },
                },
                {
                    data: {
                        cantidad_produc: 'cantidad_produc.0',
                        descripcion_trello: 'descripcion_trello.0',
                    },
                    render: function (data) {
                        let cantidad_faltante = ""
                        if (data.descripcion_trello != null) {
                            let cantidad = data.descripcion_trello.split("-");
                            let cantidad_esperada = parseInt(cantidad[cantidad.length - 1]);
                            cantidad_faltante = data.cantidad_produc - cantidad_esperada;
                        }
                        return (
                            `<td>
								<div class="wrap">`+ (cantidad_faltante != null ? cantidad_faltante : "-") + `</div>
							</td>`
                        );
                    },

                },
                {
                    data: {
                        cantidad_produc: 'cantidad_produc.0',
                        descripcion_trello: 'descripcion_trello.0',
                    },
                    render: function (data) {
                        let porcentaje = ""
                        if (data.descripcion_trello != null) {
                            let cantidad = data.descripcion_trello.split("-");
                            let cantidad_esperada = parseInt(cantidad[cantidad.length - 1]);
                            let cantidad_faltante = data.cantidad_produc - cantidad_esperada;
                            porcentaje = cantidad_faltante / cantidad_esperada;
                        }
                        return (
                            `<td>
								<div class="wrap porcentaje" role="`+ (porcentaje * 100).toFixed(2) + `">` + (porcentaje != null ? (porcentaje * 100).toFixed(2) + "%" : "-") + `</div>
							</td>`
                        );
                    },

                },
                { data: "cantidad_produc" },//TODO: CANTIDAD PNC QUEDA PENTIENDE *muestra datos solo en 0*
                {
                    data: {
                        id_reporte: 'id_reporte.0',
                        tipo: 'tipo.0',
                        codigo_equipo: 'codigo_equipo.0',
                    },
                    render: function (data) {
                        let reportes = data.id_reporte.split(',');
                        let botones = "";
                        for (let i = 0; i < reportes.length; i++) {

                            botones += `<br>
                            <a href="`+base_url+`reportes/consulta_general/reporte/`+ reportes[i] + `/` + data.tipo + `/` + data.codigo_equipo + `"target="_blank" class="btn btn-success mb-1 botones" style="width:20px;">
                                <center>
                                        <img style="margin-left: -16px" src="/Produccion/resources/img/Reportes.png">  
                                </center>
                            </a>
                            <br>
                            <p style="font-size:6pt;">`+ reportes[i] + `</p>`
                        }
                        return (
                            botones
                        );
                    },
                },
                {
                    data: {
                        cantidad_produc: 'cantidad_produc.0',
                        descripcion_trello: 'descripcion_trello.0',
                        ot_trello: 'ot_trello.0',
                    },
                    render: function (data) {
                        let botones_ver_validacion = `<p style="display:none;">NO</p>`
                        for (let i = 0; i < resultado_validacion.length; i++) {
                            if (resultado_validacion[i].ot == data.ot_trello) {
                                botones_ver_validacion = `<br>
                                    <button type="button" id="` + data.ot_trello + `" class="btn btn-primary botones boton_aprobacion" data-toggle="modal" style="width: 25px;"data-target="#modal_validacion_arranque">
                                        <img style="margin-left: -12px" src="/Produccion/resources/img/Ver.png"> 
                                    </button><p style="display:none;">SI</p>`
                            }
                        }
                        return (
                            botones_ver_validacion
                        );
                    },

                },],
            sDom: '<"top"fli>t<"bottom"p><"clear">f',
            bProcessing: true,
            //order: [[0, "asc"]],
            bAutoWidth: false,
            bLengthChange: false,
            aLengthMenu: [
                [25, 50, 100, 200, -1],
                [25, 50, 100, 200, "All"]
            ],
            language: {
                decimal: "",
                emptyTable: "No hay registros",
                info: "Mostrando _TOTAL_ registros",
                infoEmpty: "Mostrando desde el 0 al 0 del total de  0 registros",
                infoFiltered: "(Filtrados del total de _MAX_ registros)",
                infoPostFix: "",
                thousands: ",",
                lengthMenu: "",

                loadingRecords: "Cargando...",
                search: "Filtrar:",
                zeroRecords: "No se ha encontrado nada  atraves de ese filtrado.",
                aria: {
                    sortAscending: ": activate to sort column ascending",
                    sortDescending: ": activate to sort column descending",
                },
            },
            columnDefs: [
                {
                    targets: "_all",
                    sortable: false,
                    ordering: false,
                    searching: true,
                },
            ],

        });

        var filas = $("#tabla_cumplimiento_cantidades thead tr:eq(1) th");
        filas.each(function (i) {
            $("input", this).on("keyup change", function () {
                if (table.column(i).search() !== this.value) {
                    table.column(i).search(this.value).draw();
                }
            });
            $("select", this).on("change", function () {
                table.column(i).search(this.value).draw();
            });
        });
        $("#tabla_cumplimiento_cantidades_filter").remove();//eliminando los filtros que pone datatable por defecto
        $(".dataTables_filter").remove();//se eliminan manualmente por que la propiedad seraching:flase evita que se filtren los datos
    }

    $(document).on("click", "#tabla_cumplimiento_cantidades tbody tr button.boton_aprobacion", function () {//abriendo modal y llenandolo
        $.ajax({
            type: "POST",
            url: "Informe_cumplimiento/get_validacion_arranque2",
            data: { orden_trabajo: $(this).attr("id") },
            success: function (response) {
                $(".modal-body").append(response);
            }
        });
    });

    $("#modal_validacion_arranque").on('hidden.bs.modal', function () {//borrar contenido del modal al cerrar, asi no se duplicaran o aran adicciones que no deberian
        $(".modal-body").empty();

    });

    function color() {//metodo para pintar cada fila dependiendo del porcentaje de cumplimiento (ver validaciones)
        $('#tabla_cumplimiento_cantidades tr').each(function (i) {
            var ch = $(this).find("div.porcentaje").attr("role");
            if (ch < 0) {
                $(this).css("background-color", "rgb(240, 138, 127)");
            } else if (ch >= 0 && ch <= 10) {
                $(this).css("background-color", "rgb(245 252 126)")
            }

        });
    }

});
