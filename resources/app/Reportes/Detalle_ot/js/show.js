$(document).ready(function () {


    mostrar_detalle_ot();
    function mostrar_detalle_ot(params) {
        var table = $("table#tabla_resumen_ot").DataTable({
            ajax: {
                method: "POST",
                url: "Resumen/get_detalle_ot",
                data: params,
                complete: function () { },
            },
            columns: [
                { data: "ot" },
                {
                    data: "cliente",
                    render: function (cliente) {
                        return (
                            `<div class="wrap">` + (cliente != null ? cliente : "-") + `</div>`
                        );
                    },
                },
                { data: "vendedor" },
                { data: "fecha_ingreso" },
                { data: "fecha_entrega" },
                { data: "fecha_solicitada" },
                { data: "fecha_entrega_producto_terminado" },
                { data: "cantidad" },
                { data: "cantidad_producto" },
                { data: "lista" },
            ],
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

    }
});