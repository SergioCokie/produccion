$(document).ready(function () {
	//METODOS PARA FILTRAR 
	let date = new Date()

	let day = date.getDate()
	let month = date.getMonth() + 1
	let year = date.getFullYear()

	let datos_detalle = {
		tipo: '',
		fecha_desde: '',
		fecha_hasta: '',
	}
	$("#tipo_maquina").change(function (e) {
		datos_detalle.tipo = $(this).val();
	});

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


	$('#buscar_reporte').validetta({
		realTime: true,
		display: 'inline',
		errorTemplateClass: 'validetta-inline',
		onValid: function (event) {
			event.preventDefault();

			$(".tab-pane").removeClass("in show active");//le eliminamos estas clases al div (en caso contrario se pondria uno encima de otros)
			$("#" + $("#tipo_maquina").val() + "").addClass("in show active");//obtenemos el div que tenga este id y le agregarmos estas clases para mostrarlo

			if ($("#fecha_inicial").val() != "" && $("#fecha_final").val() != "" || $("#intervalos").val() != "") {

				if ($("#fecha_inicial").val() != "" && $("#fecha_final").val() != "") {
					datos_detalle = {
						tipo: $("#tipo_maquina").val(),
						fecha_desde: $("input[name=fecha_inicial]").val(),//fecha desde
						fecha_hasta: $("input[name=fecha_final]").val(),//fecha hasta
					}

					if ($("#tipo_maquina").val() == "imprentas") {
						$("table#tabla_imprentas").dataTable().fnDestroy();//reiniciamos el datatble 
						mostrar_tabla_imprentas(datos_detalle)
					} else if ($("#tipo_maquina").val() == "troqueladoras") {
						$("table#tabla_troqueladora").dataTable().fnDestroy();//reiniciamos el datatble 
						mostrar_tabla_troqueladora(datos_detalle)
					} else if ($("#tipo_maquina").val() == "pegadoras") {
						$("table#tabla_pegadoras").dataTable().fnDestroy();//reiniciamos el datatble 
						mostrar_tabla_pegadora(datos_detalle)
					} else if ($("#tipo_maquina").val() == "flexografia") {
						$("table#tabla_flexografia").dataTable().fnDestroy();//reiniciamos el datatble 
						mostrar_tabla_flexografia(datos_detalle)
					}

				} else if ($("#intervalos").val() != "") {

					if ($("#tipo_maquina").val() == "imprentas") {
						$("table#tabla_imprentas").dataTable().fnDestroy();//reiniciamos el datatble 
						mostrar_tabla_imprentas(datos_detalle)

					} else if ($("#tipo_maquina").val() == "troqueladoras") {
						$("table#tabla_troqueladora").dataTable().fnDestroy();//reiniciamos el datatble 
						mostrar_tabla_troqueladora(datos_detalle)

					} else if ($("#tipo_maquina").val() == "pegadoras") {
						$("table#tabla_pegadoras").dataTable().fnDestroy();//reiniciamos el datatble 
						mostrar_tabla_pegadora(datos_detalle)
					}
					else if ($("#tipo_maquina").val() == "flexografia") {
						$("table#tabla_flexografia").dataTable().fnDestroy();//reiniciamos el datatble 
						mostrar_tabla_flexografia(datos_detalle)
					}
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



	function mostrar_tabla_imprentas(params) {
		var table = $("table#tabla_imprentas").DataTable({
			ajax: {
				method: "POST",
				url: "Detalle_reporte/get_detalle",
				data: params,
				complete: function (data) { },
			}, //imprimimos las columnas en un div para poder controlar el espacio en cada td y asi poder colocarlos en toda la pantalla los 10 td
			columns: [
				{ data: "ID" },
				{ data: "codigo_equipo" },
				{ data: "fecha" },
				{ data: "tipo_recurso" },
				{ data: "codigo_operador" },
				{
					data: "nombre_operador",
					render: function (nombre_operador) {
						return (
							`<td>
								<div class="wrap">`+ (nombre_operador != null ? nombre_operador : "-") + `</div>
							</td>`
						);
					},
				},
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

				{ data: "Hora_Inicio" },
				{ data: "Hora_Final" },
				{ data: "cantidad_produc" },
				{ data: "tiro_retiro" },
				{
					data: "codigo_operacion",
					render: function (codigo_operacion) {
						return (
							`<td>
								<div class="wrap">`+ (codigo_operacion != null ? codigo_operacion : "-") + `</div>
							</td>`
						);
					},
				},
				{
					data: "operacion",
					render: function (operacion) {
						return (
							`<td>
								<div class="wrap">`+ (operacion != null ? operacion : "-") + `</div>
							</td>`
						);
					},
				},
				{
					data: "id_reporte",
					render: function (id_reporte) {
						return (
							`<td>
								<div class="wrap">`+ (id_reporte != null ? id_reporte : "-") + `</div>
							</td>`
						);
					},
				},
				{
					data: "ruta",
					render: function (ruta) {
						return (
							`<a type="button" href="consulta_general/reporte/` + ruta + `" target="_blank" class="btn ver_reporte botones">
								<img src="/Produccion/resources/img/Ver.png">
							</a>`
						);
					},
				},
			],
			sDom: '<"top"fli>t<"bottom"p><"clear">f',
			bProcessing: true,
			//order: [[0, "asc"]],
			bAutoWidth: false,
			bLengthChange: false,
			ordering: false,
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
		var filas = $("#tabla_imprentas thead tr:eq(1) th");
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
		$("#tabla_imprentas_filter").remove();//eliminando los filtros que pone datatable por defecto
		$(".dataTables_filter").remove();//se eliminan manualmente por que la propiedad seraching:flase evita que se filtren los datos
	}

	function mostrar_tabla_troqueladora(params) {
		/* $.ajax({
			type: "POST",
			url: "Detalle_reporte/get_detalle",
			data: params,
			success: function (response) {
				console.log(response);	
			}
		}); */
		var table = $("table#tabla_troqueladora").DataTable({
			ajax: {
				method: "POST",
				url: "Detalle_reporte/get_detalle",
				data: params,
				complete: function (data) { },
			}, //imprimimos las columnas en un div para poder controlar el espacio en cada td y asi poder colocarlos en toda la pantalla los 10 td
			columns: [
				{ data: "ID" },
				{ data: "codigo_equipo" },
				{ data: "fecha" },
				{ data: "tipo_recurso" },
				{ data: "codigo_operador" },
				{
					data: "nombre_operador",
					render: function (nombre_operador) {
						return (
							`<td>
								<div class="wrap">`+ (nombre_operador != null ? nombre_operador : "-") + `</div>
							</td>`
						);
					},
				},
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

				{ data: "Hora_Inicio" },
				{ data: "Hora_Final" },
				{ data: "cantidad_produc" },
				{
					data: "codigo_operacion",
					render: function (codigo_operacion) {
						return (
							`<td>
								<div class="wrap">`+ (codigo_operacion != null ? codigo_operacion : "-") + `</div>
							</td>`
						);
					},
				},
				{
					data: "operacion",
					render: function (operacion) {
						return (
							`<td>
								<div class="wrap">`+ (operacion != null ? operacion : "-") + `</div>
							</td>`
						);
					},
				},
				{
					data: "id_reporte",
					render: function (id_reporte) {
						return (
							`<td>
								<div class="wrap">`+ (id_reporte != null ? id_reporte : "-") + `</div>
							</td>`
						);
					},
				},
				{
					data: "ruta",
					render: function (ruta) {
						return (
							`<a type="button" href="consulta_general/reporte/` + ruta + `" target="_blank" class="btn ver_reporte botones">
								<img src="/Produccion/resources/img/Ver.png">
							</a>`
						);
					},
				},
			],
			sDom: '<"top"fli>t<"bottom"p><"clear">f',
			bProcessing: true,
			//order: [[0, "asc"]],
			bAutoWidth: false,
			bLengthChange: false,
			ordering: false,
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
		var filas = $("#tabla_troqueladora thead tr:eq(1) th");
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
		$("#tabla_troqueladora_filter").remove();//eliminando los filtros que pone datatable por defecto
		$(".dataTables_filter").remove();//se eliminan manualmente por que la propiedad seraching:flase evita que se filtren los datos

	}

	function mostrar_tabla_pegadora(params) {
		var table = $("table#tabla_pegadoras").DataTable({
			ajax: {
				method: "POST",
				url: "Detalle_reporte/get_detalle",
				data: params,
				complete: function (data) { },
			}, //imprimimos las columnas en un div para poder controlar el espacio en cada td y asi poder colocarlos en toda la pantalla los 10 td
			columns: [
				{ data: "ID" },
				{ data: "codigo_equipo" },
				{ data: "fecha" },
				{ data: "tipo_recurso" },
				{ data: "codigo_operador" },
				{
					data: "nombre_operador",
					render: function (nombre_operador) {
						return (
							`<td>
								<div class="wrap">`+ (nombre_operador != null ? nombre_operador : "-") + `</div>
							</td>`
						);
					},
				},
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

				{ data: "Hora_Inicio" },
				{ data: "Hora_Final" },
				{ data: "cantidad_produc" },
				{
					data: "codigo_operacion",
					render: function (codigo_operacion) {
						return (
							`<td>
								<div class="wrap">`+ (codigo_operacion != null ? codigo_operacion : "-") + `</div>
							</td>`
						);
					},
				},
				{
					data: "operacion",
					render: function (operacion) {
						return (
							`<td>
								<div class="wrap">`+ (operacion != null ? operacion : "-") + `</div>
							</td>`
						);
					},
				},
				{
					data: "id_reporte",
					render: function (id_reporte) {
						return (
							`<td>
								<div class="wrap">`+ (id_reporte != null ? id_reporte : "-") + `</div>
							</td>`
						);
					},
				},
				{
					data: "ruta",
					render: function (ruta) {
						return (
							`<a type="button" href="consulta_general/reporte/` + ruta + `" target="_blank" class="btn ver_reporte botones">
								<img src="/Produccion/resources/img/Ver.png">
							</a>`
						);
					},
				},
			],
			sDom: '<"top"fli>t<"bottom"p><"clear">f',
			bProcessing: true,
			//order: [[0, "asc"]],
			bAutoWidth: false,
			bLengthChange: false,
			ordering: false,
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
		var filas = $("#tabla_pegadoras thead tr:eq(1) th");
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
		$("#tabla_pegadoras_filter").remove();//eliminando los filtros que pone datatable por defecto
		$(".dataTables_filter").remove();//se eliminan manualmente por que la propiedad seraching:flase evita que se filtren los datos

	}

	function mostrar_tabla_flexografia(params) {
		var table = $("table#tabla_flexografia").DataTable({
			ajax: {
				method: "POST",
				url: "Detalle_reporte/get_detalle",
				data: params,
				complete: function (data) { },
			}, //imprimimos las columnas en un div para poder controlar el espacio en cada td y asi poder colocarlos en toda la pantalla los 10 td
			columns: [
				{
					data: "ID",
					render: function (ID) {
						return (
							`<td>
								<div class="wrap">`+ (ID != null ? ID : "-") + `</div>
							</td>`
						);
					},
				},
				{ data: "codigo_equipo" },
				{
					data: "fecha",
					render: function (fecha) {
						return (
							`<td>
								<div class="wrap">`+ (fecha != null ? fecha : "-") + `</div>
							</td>`
						);
					},
				}, { data: "tipo_recurso" },
				{ data: "codigo_operador" },
				{
					data: "nombre_operador",
					render: function (nombre_operador) {
						return (
							`<td>
								<div class="wrap">`+ (nombre_operador != null ? nombre_operador : "-") + `</div>
							</td>`
						);
					},
				},
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

				{
					data: "Hora_Inicio",
					render: function (Hora_Inicio) {
						return (
							`<td>
								<div class="wrap">`+ (Hora_Inicio != null ? Hora_Inicio : "-") + `</div>
							</td>`
						);
					},
				},
				{
					data: "Hora_Final",
					render: function (Hora_Final) {
						return (
							`<td>
								<div class="wrap">`+ (Hora_Final != null ? Hora_Final : "-") + `</div>
							</td>`
						);
					},
				},
				{ data: "cantidad_produccion" },
				{ data: "cantidad_ajuste" },
				{ data: "cantidad_solicitada" },
				{ data: "cantidad_producida" },
				{
					data: "codigo_operacion",
					render: function (codigo_operacion) {
						return (
							`<td>
								<div class="wrap">`+ (codigo_operacion != null ? codigo_operacion : "-") + `</div>
							</td>`
						);
					},
				},
				{
					data: "operacion",
					render: function (operacion) {
						return (
							`<td>
								<div class="wrap">`+ (operacion != null ? operacion : "-") + `</div>
							</td>`
						);
					},
				},
				{
					data: "id_reporte",
					render: function (id_reporte) {
						return (
							`<td>
								<div class="wrap">`+ (id_reporte != null ? id_reporte : "-") + `</div>
							</td>`
						);
					},
				},
				{
					data: "ruta",
					render: function (ruta) {
						return (
							`<a type="button" href="consulta_general/reporte/` + ruta + `" target="_blank" class="btn ver_reporte botones">
								<img src="/Produccion/resources/img/Ver.png">
							</a>`
						);
					},
				},
			],
			sDom: '<"top"fli>t<"bottom"p><"clear">f',
			bProcessing: true,
			//order: [[0, "asc"]],
			bAutoWidth: false,
			bLengthChange: false,
			ordering: false,
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
		var filas = $("#tabla_flexografia thead tr:eq(1) th");
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
		$("#tabla_flexografia_filter").remove();//eliminando los filtros que pone datatable por defecto
		$(".dataTables_filter").remove();//se eliminan manualmente por que la propiedad seraching:flase evita que se filtren los datos

	}






});