$(document).ready(function () {
	//TODO ESTO SON PARA MOSTRAR LAS TABLAS DEL MODULO DE REPORTE DE CONSULTA GENERAL Y FILTRAR LAS MISMAS

	var data = {
		tipo: $(".active").attr("role"),
		maquina: $(".active").attr("id"),
	};


	$("#" + $(".active").attr("role") + "").addClass("in show active");

	$(".active").attr("role") == "imprentas" ? llenar_tabla_imprentas(data) : '';
	$(".active").attr("role") == "troqueladoras" ? llenar_tabla_troqueladoras(data) : '';
	$(".active").attr("role") == "pegadoras" ? llenar_tabla_pegadoras(data) : '';
	$(".active").attr("role") == "flexografia" ? llenar_tabla_flexografia(data) : '';


	$(".todas_las_maquinas").click(function () {
		data.tipo = $(this).attr("role");
		data.maquina = $(this).attr("id");

		if ($(this).attr("role") == "imprentas") {
			$("table#tabla_imprentas").dataTable().fnDestroy();
			llenar_tabla_imprentas(data);
		} else if ($(this).attr("role") == "troqueladoras") {
			$("table#tabla_troqueladora").dataTable().fnDestroy();
			llenar_tabla_troqueladoras(data);
		} else if ($(this).attr("role") == "pegadoras") {
			$("table#tabla_pegadoras").dataTable().fnDestroy();
			llenar_tabla_pegadoras(data);
		}
		else if ($(this).attr("role") == "flexografia") {
			$("table#tabla_flexografia").dataTable().fnDestroy();
			llenar_tabla_flexografia(data);
		}
	});

	function llenar_tabla_imprentas(param) {
		var table = $("table#tabla_imprentas").DataTable({
			ajax: {
				method: "POST",
				url: base_url + "Reportes/Consulta_general/get_all_reportes",
				data: param,
				complete: function (data) { },
			}, //imprimimos las columnas en un div para poder controlar el espacio en cada td y asi poder colocarlos en toda la pantalla los 10 td
			columns: [
				{ data: "id_reporte" },
				{ data: "fecha" },
				{ data: "turno" },
				{ data: "nombre_operador" },
				{ data: "Tiempo" },
				{ data: "Tiro" },
				{ data: "Retiro" },
				{ data: "Total" },
				{ data: "estado" },
				{
					data: "ruta",
					render: function (ruta) {
						return (
							'<a type="button" href="consulta_general/reporte/' + ruta + '/" target="_blank" class="btn mb-2 ver_reporte botones">' +
							'<img src="/Produccion/resources/img/Ver.png">' +
							"</a>" +
							'<button class="eliminar btn btn-danger botones" id="borrar_rerporte_test">' +
							'<img src="/Produccion/resources/img/Eliminar.png" alt="">' +
							"</button>"
						);
					},
				},
			],
			bPaginate: false, //Ocultar paginación
			sDom: '<"top"fli>t<"bottom"p><"clear">f',
			bProcessing: true,
			bAutoWidth: false,
			searching: false,
			info: false,
			order: [[0, 'desc']],
			language: {
				decimal: "",
				emptyTable: "No hay registros",
				info: "Mostrando _TOTAL_ registros",
				infoEmpty: "Mostrando desde el 0 al 0 del total de  0 registros",
				infoFiltered: "(Filtrados del total de _MAX_ registros)",
				infoPostFix: "",
				thousands: ",",
				lengthMenu: "Mostrar _MENU_ registros por página",
				loadingRecords: "Cargando...",
				search: "Filtrar:",
				zeroRecords: "No se ha encontrado nada  atraves de ese filtrado.",

				aria: {
					sortAscending: ": activate to sort column ascending",
					sortDescending: ": activate to sort column descending",
				},
			},
		});
	}

	function llenar_tabla_troqueladoras(param) {
		var table = $("table#tabla_troqueladora").DataTable({
			ajax: {
				method: "POST",
				url: base_url + "Reportes/Consulta_general/get_all_reportes",
				data: param,
				complete: function (data) { },
			}, //imprimimos las columnas en un div para poder controlar el espacio en cada td y asi poder colocarlos en toda la pantalla los 10 td
			columns: [
				{ data: "id_reporte" },
				{ data: "fecha" },
				{ data: "turno" },
				{ data: "nombre_operador" },
				{ data: "cajas_troqueladas" },
				{ data: "cantidad_produc" },
				{ data: "Tiempo" },
				{ data: "estado" },
				{
					data: "ruta",
					render: function (ruta) {
						return (
							'<a type="button" href="consulta_general/reporte/' + ruta + '/" target="_blank" class="btn mb-2 ver_reporte botones">' +
							'<img src="/Produccion/resources/img/Ver.png">' +
							"</a>" +
							'<button class="eliminar btn btn-danger botones">' +
							'<img src="/Produccion/resources/img/Eliminar.png" alt="">' +
							"</button>"
						);
					},
				},
			],
			bPaginate: false, //Ocultar paginación
			sDom: '<"top"fli>t<"bottom"p><"clear">f',
			bProcessing: true,
			bAutoWidth: false,
			searching: false,
			info: false,
			order: [[0, 'desc']],
			language: {
				decimal: "",
				emptyTable: "No hay registros",
				info: "Mostrando _TOTAL_ registros",
				infoEmpty: "Mostrando desde el 0 al 0 del total de  0 registros",
				infoFiltered: "(Filtrados del total de _MAX_ registros)",
				infoPostFix: "",
				thousands: ",",
				lengthMenu: "Mostrar _MENU_ registros por página",
				loadingRecords: "Cargando...",
				search: "Filtrar:",
				zeroRecords: "No se ha encontrado nada  atraves de ese filtrado.",

				aria: {
					sortAscending: ": activate to sort column ascending",
					sortDescending: ": activate to sort column descending",
				},
			},
		});
	}
	function llenar_tabla_pegadoras(param) {
		var table = $("table#tabla_pegadoras").DataTable({
			ajax: {
				method: "POST",
				url: base_url + "Reportes/Consulta_general/get_all_reportes",
				data: param,
				complete: function (data) { },
			}, //imprimimos las columnas en un div para poder controlar el espacio en cada td y asi poder colocarlos en toda la pantalla los 10 td
			columns: [
				{ data: "id_reporte" },
				{ data: "fecha" },
				{ data: "turno" },
				{ data: "nombre_operador" },
				{ data: "cantidad_produc" },
				{ data: "Tiempo" },
				{ data: "estado" },
				{
					data: "ruta",
					render: function (ruta) {
						return (
							'<a type="button" href="consulta_general/reporte/' + ruta + '/" target="_blank" class="btn mb-2 ver_reporte botones">' +
							'<img src="/Produccion/resources/img/Ver.png">' +
							"</a>" +
							'<button class="eliminar btn btn-danger botones">' +
							'<img src="/Produccion/resources/img/Eliminar.png" alt="">' +
							"</button>"
						);
					},
				},
			],
			bPaginate: false, //Ocultar paginación
			sDom: '<"top"fli>t<"bottom"p><"clear">f',
			bProcessing: true,
			bAutoWidth: false,
			searching: false,
			info: false,
			order: [[0, 'desc']],
			language: {
				decimal: "",
				emptyTable: "No hay registros",
				info: "Mostrando _TOTAL_ registros",
				infoEmpty: "Mostrando desde el 0 al 0 del total de  0 registros",
				infoFiltered: "(Filtrados del total de _MAX_ registros)",
				infoPostFix: "",
				thousands: ",",
				lengthMenu: "Mostrar _MENU_ registros por página",
				loadingRecords: "Cargando...",
				search: "Filtrar:",
				zeroRecords: "No se ha encontrado nada  atraves de ese filtrado.",

				aria: {
					sortAscending: ": activate to sort column ascending",
					sortDescending: ": activate to sort column descending",
				},
			},
		});
	}
	function llenar_tabla_flexografia(param) {
		var table = $("table#tabla_flexografia").DataTable({
			ajax: {
				method: "POST",
				url: base_url + "Reportes/Consulta_general/get_all_reportes",
				data: param,
				complete: function (data) { },
			}, //imprimimos las columnas en un div para poder controlar el espacio en cada td y asi poder colocarlos en toda la pantalla los 10 td
			columns: [
				{ data: "id_reporte" },
				{ data: "fecha" },
				{ data: "turno" },
				{ data: "nombre_operador" },
				{ data: "Tiempo" },
				{ data: "cantidad_ajuste" },
				{ data: "cantidad_produccion" },
				{ data: "cantidad_solicitada" },
				{ data: "cantidad_producida" },
				{ data: "estado" },
				{
					data: "ruta",
					render: function (ruta) {
						return (
							'<a type="button" href="consulta_general/reporte/' + ruta + '/" target="_blank" class="btn mb-2 ver_reporte botones">' +
							'<img src="/Produccion/resources/img/Ver.png">' +
							"</a>" +
							'<button class="eliminar btn btn-danger botones">' +
							'<img src="/Produccion/resources/img/Eliminar.png" alt="">' +
							"</button>"
						);
					},
				},
			],
			bPaginate: false, //Ocultar paginación
			sDom: '<"top"fli>t<"bottom"p><"clear">f',
			bProcessing: true,
			bAutoWidth: false,
			searching: false,
			info: false,
			order: [[0, 'desc']],
			language: {
				decimal: "",
				emptyTable: "No hay registros",
				info: "Mostrando _TOTAL_ registros",
				infoEmpty: "Mostrando desde el 0 al 0 del total de  0 registros",
				infoFiltered: "(Filtrados del total de _MAX_ registros)",
				infoPostFix: "",
				thousands: ",",
				lengthMenu: "Mostrar _MENU_ registros por página",
				loadingRecords: "Cargando...",
				search: "Filtrar:",
				zeroRecords: "No se ha encontrado nada  atraves de ese filtrado.",

				aria: {
					sortAscending: ": activate to sort column ascending",
					sortDescending: ": activate to sort column descending",
				},
			},
		});
	}


	//FILTRO DE IMPRESORAS
	function llenar_tabla_imprentas_busqueda(param) {
		var table = $("table#tabla_imprentas").DataTable({
			ajax: {
				method: "POST",
				url: base_url + "Reportes/Consulta_general/filtrado_tablas_maquinas",
				data: param,
				complete: function (data) { },
			}, //imprimimos las columnas en un div para poder controlar el espacio en cada td y asi poder colocarlos en toda la pantalla los 10 td
			columns: [
				{ data: "id_reporte" },
				{ data: "fecha" },
				{ data: "turno" },
				{ data: "nombre_operador" },
				{ data: "Tiempo" },
				{ data: "Tiro" },
				{ data: "Retiro" },
				{ data: "Total" },
				{ data: "estado" },
				{
					data: "ruta",
					render: function (ruta) {
						return (
							'<a type="button" href="consulta_general/reporte/' + ruta + '/" target="_blank" class="btn mb-2 ver_reporte botones">' +
							'<img src="/Produccion/resources/img/Ver.png">' +
							"</a>" +
							'<button class="eliminar btn btn-danger botones">' +
							'<img src="/Produccion/resources/img/Eliminar.png" alt="">' +
							"</button>"
						);
					},
				},
			],
			bPaginate: false, //Ocultar paginación
			sDom: '<"top"fli>t<"bottom"p><"clear">f',
			bProcessing: true,
			bAutoWidth: false,
			searching: false,
			info: false,
			language: {
				decimal: "",
				emptyTable: "No hay registros",
				info: "Mostrando _TOTAL_ registros",
				infoEmpty: "Mostrando desde el 0 al 0 del total de  0 registros",
				infoFiltered: "(Filtrados del total de _MAX_ registros)",
				infoPostFix: "",
				thousands: ",",
				lengthMenu: "Mostrar _MENU_ registros por página",
				loadingRecords: "Cargando...",
				search: "Filtrar:",
				zeroRecords: "No se ha encontrado nada  atraves de ese filtrado.",

				aria: {
					sortAscending: ": activate to sort column ascending",
					sortDescending: ": activate to sort column descending",
				},
			},
		});
	}
	let input_imprenta_busqueda = document.getElementsByClassName("tabla_imprenta");
	let timeout_impresora;
	//var busqueda;
	var busqueda_impresora = {
		data,
		detalle: {
			id_reporte: "",
			fecha: "",
			turno: "",
			nombre_operador: "",
			estado: "",
		},
	};
	for (var i = 0; i < input_imprenta_busqueda.length; i++) {
		input_imprenta_busqueda[i].addEventListener("keydown", () => {
			clearTimeout(timeout_impresora);
			timeout_impresora = setTimeout(() => {
				for (let j = 1; j <= 5; j++) {
					var id_reporte;
					var fecha;
					var turno;

					var nombre_operador;
					var estado;

					$(".input_" + j).attr("id") == "id_reporte_imprentas" ? (id_reporte = $(".input_" + j).val()) : "";
					$(".input_" + j).attr("id") == "fecha_imprentas" ? (fecha = $(".input_" + j).val()) : "";
					$(".input_" + j).attr("id") == "turno_imprentas" ? (turno = $(".input_" + j).val()) : "";

					$(".input_" + j).attr("id") == "nombre_operador_imprentas" ? (nombre_operador = $(".input_" + j).val()) : "";
					$(".input_" + j).attr("id") == "estado_imprentas" ? (estado = $(".input_" + j).val()) : "";


					busqueda_impresora = {
						data,
						detalle: {
							id_reporte: id_reporte,
							fecha: fecha,
							turno: turno,
							nombre_operador: nombre_operador,
							estado: estado,
						},
					};

					if (j == 5) {
						//console.log(data);
						//console.log(busqueda);
						$("table#tabla_imprentas").dataTable().fnDestroy();

						llenar_tabla_imprentas_busqueda(busqueda_impresora)


					}
				}
				clearTimeout(timeout_impresora);
			}, 1500);
		});
	}
	$("#fecha_imprentas").on("change", function () {
		busqueda_impresora.detalle.fecha = $(this).val()
		console.log(busqueda_impresora);
		$("table#tabla_imprentas").dataTable().fnDestroy();
		llenar_tabla_imprentas_busqueda(busqueda_impresora);
	});
	$("#turno_imprentas").on("change", function () {
		busqueda_impresora.detalle.turno = $(this).val()
		console.log(busqueda_impresora);
		$("table#tabla_imprentas").dataTable().fnDestroy();
		llenar_tabla_imprentas_busqueda(busqueda_impresora);
	});
	$("#estado_imprentas").on("change", function () {
		busqueda_impresora.detalle.estado = $(this).val()
		console.log(busqueda_impresora);
		$("table#tabla_imprentas").dataTable().fnDestroy();
		llenar_tabla_imprentas_busqueda(busqueda_impresora);
	});
	//FIN DE FILTRO IMPRESORA


	//FILTRO TROQUELADORAS
	function llenar_tabla_troqueladoras_busqueda(param) {
		var table = $("table#tabla_troqueladora").DataTable({
			ajax: {
				method: "POST",
				url: base_url + "Reportes/Consulta_general/filtrado_tablas_maquinas",
				data: param,
				complete: function (data) { },
			}, //imprimimos las columnas en un div para poder controlar el espacio en cada td y asi poder colocarlos en toda la pantalla los 10 td
			columns: [
				{ data: "id_reporte" },
				{ data: "fecha" },
				{ data: "turno" },
				{ data: "nombre_operador" },
				{ data: "cajas_troqueladas" },
				{ data: "cantidad_produc" },
				{ data: "Tiempo" },
				{ data: "estado" },
				{
					data: "ruta",
					render: function (ruta) {
						return (
							'<a type="button" href="consulta_general/reporte/' + ruta + '/" target="_blank" class="btn mb-2 ver_reporte botones">' +
							'<img src="/Produccion/resources/img/Ver.png">' +
							"</a>" +
							'<button class="eliminar btn btn-danger botones">' +
							'<img src="/Produccion/resources/img/Eliminar.png" alt="">' +
							"</button>"
						);
					},
				},
			],
			bPaginate: false, //Ocultar paginación
			sDom: '<"top"fli>t<"bottom"p><"clear">f',
			bProcessing: true,
			bAutoWidth: false,
			searching: false,
			info: false,
			order: [[0, 'desc']],
			language: {
				decimal: "",
				emptyTable: "No hay registros",
				info: "Mostrando _TOTAL_ registros",
				infoEmpty: "Mostrando desde el 0 al 0 del total de  0 registros",
				infoFiltered: "(Filtrados del total de _MAX_ registros)",
				infoPostFix: "",
				thousands: ",",
				lengthMenu: "Mostrar _MENU_ registros por página",
				loadingRecords: "Cargando...",
				search: "Filtrar:",
				zeroRecords: "No se ha encontrado nada  atraves de ese filtrado.",

				aria: {
					sortAscending: ": activate to sort column ascending",
					sortDescending: ": activate to sort column descending",
				},
			},
		});
	}
	let input_troqueladoras_busqueda = document.getElementsByClassName("tabla_troqueladora");
	let timeout_troqueladoras;
	//var busqueda;
	var busqueda_troqueladora = {
		data,
		detalle: {
			id_reporte: "",
			fecha: "",
			turno: "",
			nombre_operador: "",
			estado: "",
		},
	};
	for (var i = 0; i < input_troqueladoras_busqueda.length; i++) {
		input_troqueladoras_busqueda[i].addEventListener("keydown", () => {
			clearTimeout(timeout_troqueladoras);
			timeout_troqueladoras = setTimeout(() => {
				for (let j = 1; j <= 5; j++) {
					var id_reporte;
					var fecha;
					var turno;

					var nombre_operador;
					var estado;

					$(".input_troqueladora_" + j).attr("id") == "id_reporte_troqueladora" ? (id_reporte = $(".input_troqueladora_" + j).val()) : "";
					$(".input_troqueladora_" + j).attr("id") == "fecha_troqueladora" ? (fecha = $(".input_troqueladora_" + j).val()) : "";
					$(".input_troqueladora_" + j).attr("id") == "turno_troqueladora" ? (turno = $(".input_troqueladora_" + j).val()) : "";

					$(".input_troqueladora_" + j).attr("id") == "nombre_operador_troqueladora" ? (nombre_operador = $(".input_" + j).val()) : "";
					$(".input_troqueladora_" + j).attr("id") == "estado_troqueladora" ? (estado = $(".input_troqueladora_" + j).val()) : "";


					busqueda_troqueladora = {
						data,
						detalle: {
							id_reporte: id_reporte,
							fecha: fecha,
							turno: turno,
							nombre_operador: nombre_operador,
							estado: estado,
						},
					};

					if (j == 5) {
						//console.log(data);
						console.log(busqueda_troqueladora);
						$("table#tabla_troqueladora").dataTable().fnDestroy();

						llenar_tabla_troqueladoras_busqueda(busqueda_troqueladora)


					}
				}
				clearTimeout(timeout_troqueladoras);
			}, 1500);
		});
	}
	$("#fecha_troqueladora").on("change", function () {
		busqueda_troqueladora.detalle.fecha = $(this).val()
		console.log(busqueda_troqueladora);

		$("table#tabla_troqueladora").dataTable().fnDestroy();
		llenar_tabla_troqueladoras_busqueda(busqueda_troqueladora);
	});
	$("#turno_troqueladora").on("change", function () {
		busqueda_troqueladora.detalle.turno = $(this).val()
		console.log(busqueda_troqueladora);

		$("table#tabla_troqueladora").dataTable().fnDestroy();
		llenar_tabla_troqueladoras_busqueda(busqueda_troqueladora);
	});
	$("#estado_troqueladora").on("change", function () {
		busqueda_troqueladora.detalle.estado = $(this).val()
		console.log(busqueda_troqueladora);

		$("table#tabla_troqueladora").dataTable().fnDestroy();
		llenar_tabla_troqueladoras_busqueda(busqueda_troqueladora);
	});
	//FIN FILTRO TROQUELADORA


	//FILTRO PEGADORA

	function llenar_tabla_pegadora_busqueda(param) {
		var table = $("table#tabla_pegadoras").DataTable({
			ajax: {
				method: "POST",
				url: base_url + "Reportes/Consulta_general/filtrado_tablas_maquinas",
				data: param,
				complete: function (data) { },
			}, //imprimimos las columnas en un div para poder controlar el espacio en cada td y asi poder colocarlos en toda la pantalla los 10 td
			columns: [
				{ data: "id_reporte" },
				{ data: "fecha" },
				{ data: "turno" },
				{ data: "nombre_operador" },
				{ data: "cantidad_produc" },
				{ data: "Tiempo" },
				{ data: "estado" },
				{
					data: "ruta",
					render: function (ruta) {
						return (
							'<a type="button" href="consulta_general/reporte/' + ruta + '/" target="_blank" class="btn mb-2 ver_reporte botones">' +
							'<img src="/Produccion/resources/img/Ver.png">' +
							"</a>" +
							'<button class="eliminar btn btn-danger botones">' +
							'<img src="/Produccion/resources/img/Eliminar.png" alt="">' +
							"</button>"
						);
					},
				},
			],
			bPaginate: false, //Ocultar paginación
			sDom: '<"top"fli>t<"bottom"p><"clear">f',
			bProcessing: true,
			bAutoWidth: false,
			searching: false,
			info: false,
			language: {
				decimal: "",
				emptyTable: "No hay registros",
				info: "Mostrando _TOTAL_ registros",
				infoEmpty: "Mostrando desde el 0 al 0 del total de  0 registros",
				infoFiltered: "(Filtrados del total de _MAX_ registros)",
				infoPostFix: "",
				thousands: ",",
				lengthMenu: "Mostrar _MENU_ registros por página",
				loadingRecords: "Cargando...",
				search: "Filtrar:",
				zeroRecords: "No se ha encontrado nada  atraves de ese filtrado.",

				aria: {
					sortAscending: ": activate to sort column ascending",
					sortDescending: ": activate to sort column descending",
				},
			},
		});
	}

	let input_pagadoras_busqueda = document.getElementsByClassName("tabla_pegadora");
	let timeout_pegadoras;
	//var busqueda;
	var busqueda_pegadora = {
		data,
		detalle: {
			id_reporte: "",
			fecha: "",
			turno: "",
			nombre_operador: "",
			estado: "",
		},
	};
	for (var i = 0; i < input_pagadoras_busqueda.length; i++) {
		input_pagadoras_busqueda[i].addEventListener("keydown", () => {
			clearTimeout(timeout_pegadoras);
			input_pagadoras_busqueda = setTimeout(() => {
				for (let j = 1; j <= 5; j++) {
					var id_reporte;
					var fecha;
					var turno;

					var nombre_operador;
					var estado;

					$(".input_pegadora_" + j).attr("id") == "id_reporte_pegadora" ? (id_reporte = $(".input_pegadora_" + j).val()) : "";
					$(".input_pegadora_" + j).attr("id") == "fecha_pegadora" ? (fecha = $(".input_pegadora_" + j).val()) : "";
					$(".input_pegadora_" + j).attr("id") == "turno_pegadora" ? (turno = $(".input_pegadora_" + j).val()) : "";

					$(".input_pegadora_" + j).attr("id") == "nombre_perador_pegadora" ? (nombre_operador = $(".input_pegadora_" + j).val()) : "";
					$(".input_pegadora_" + j).attr("id") == "estado_pegadora" ? (estado = $(".input_pegadora_" + j).val()) : "";

					busqueda_pegadora = {
						data,
						detalle: {
							id_reporte: id_reporte,
							fecha: fecha,
							turno: turno,
							nombre_operador: nombre_operador,
							estado: estado,
						},
					};

					if (j == 5) {
						//console.log(data);
						console.log(busqueda_pegadora);
						$("table#tabla_pegadoras").dataTable().fnDestroy();

						llenar_tabla_pegadora_busqueda(busqueda_pegadora)
					}
				}
				clearTimeout(timeout_pegadoras);
			}, 1500);
		});
	}
	$("#fecha_pegadora").on("change", function () {
		busqueda_pegadora.detalle.fecha = $(this).val()
		console.log(busqueda_pegadora);
		$("table#tabla_pegadoras").dataTable().fnDestroy();
		llenar_tabla_pegadora_busqueda(busqueda_pegadora)
	});
	$("#turno_pegadora").on("change", function () {
		busqueda_pegadora.detalle.turno = $(this).val()
		console.log(busqueda_pegadora);
		$("table#tabla_pegadoras").dataTable().fnDestroy();
		llenar_tabla_pegadora_busqueda(busqueda_pegadora)
	});
	$("#estado_pegadora").on("change", function () {
		busqueda_pegadora.detalle.estado = $(this).val()
		console.log(busqueda_pegadora);
		$("table#tabla_pegadoras").dataTable().fnDestroy();
		llenar_tabla_pegadora_busqueda(busqueda_pegadora)
	});
	//FIN FULTRO PEGADORA

	//FILTROS FLEXOGRAFIA 
	function llenar_tabla_flexografia_busqueda(param) {
		var table = $("table#tabla_flexografia").DataTable({
			ajax: {
				method: "POST",
				url: base_url + "Reportes/Consulta_general/filtrado_tablas_maquinas",
				data: param,
				complete: function (data) { },
			}, //imprimimos las columnas en un div para poder controlar el espacio en cada td y asi poder colocarlos en toda la pantalla los 10 td
			columns: [
				{ data: "id_reporte" },
				{ data: "fecha" },
				{ data: "turno" },
				{ data: "nombre_operador" },
				{ data: "Tiempo" },
				{ data: "cantidad_ajuste" },
				{ data: "cantidad_produccion" },
				{ data: "cantidad_solicitada" },
				{ data: "cantidad_producida" },
				{ data: "estado" },
				{
					data: "ruta",
					render: function (ruta) {
						return (
							'<a type="button" href="consulta_general/reporte/' + ruta + '/" target="_blank" class="btn mb-2 ver_reporte botones">' +
							'<img src="/Produccion/resources/img/Ver.png">' +
							"</a>" +
							'<button class="eliminar btn btn-danger botones">' +
							'<img src="/Produccion/resources/img/Eliminar.png" alt="">' +
							"</button>"
						);
					},
				},
			],
			bPaginate: false, //Ocultar paginación
			sDom: '<"top"fli>t<"bottom"p><"clear">f',
			bProcessing: true,
			bAutoWidth: false,
			searching: false,
			info: false,
			language: {
				decimal: "",
				emptyTable: "No hay registros",
				info: "Mostrando _TOTAL_ registros",
				infoEmpty: "Mostrando desde el 0 al 0 del total de  0 registros",
				infoFiltered: "(Filtrados del total de _MAX_ registros)",
				infoPostFix: "",
				thousands: ",",
				lengthMenu: "Mostrar _MENU_ registros por página",
				loadingRecords: "Cargando...",
				search: "Filtrar:",
				zeroRecords: "No se ha encontrado nada  atraves de ese filtrado.",

				aria: {
					sortAscending: ": activate to sort column ascending",
					sortDescending: ": activate to sort column descending",
				},
			},
		});
	}
	let input_flexografia_busqueda = document.getElementsByClassName("tbl_flexo");
	let timeout_flexografia;
	//var busqueda;
	var busqueda_flexografia = {
		data,
		detalle: {
			id_reporte: "",
			fecha: "",
			turno: "",
			nombre_operador: "",
			estado: "",
		},
	};
	for (var i = 0; i < input_flexografia_busqueda.length; i++) {
		input_flexografia_busqueda[i].addEventListener("keydown", () => {
			clearTimeout(timeout_flexografia);
			input_flexografia_busqueda = setTimeout(() => {
				for (let j = 1; j <= 5; j++) {
					var id_reporte;
					var fecha;
					var turno;

					var nombre_operador;
					var estado;

					$(".input_flexografia_" + j).attr("id") == "id_reporte_flexografia" ? (id_reporte = $(".input_flexografia_" + j).val()) : "";
					$(".input_flexografia_" + j).attr("id") == "fecha_flexografia" ? (fecha = $(".input_flexografia_" + j).val()) : "";
					$(".input_flexografia_" + j).attr("id") == "turno_flexografia" ? (turno = $(".input_flexografia_" + j).val()) : "";

					$(".input_flexografia_" + j).attr("id") == "nombre_operador_flexografia" ? (nombre_operador = $(".input_flexografia_" + j).val()) : "";
					$(".input_flexografia_" + j).attr("id") == "estado_flexografia" ? (estado = $(".input_flexografia_" + j).val()) : "";

					busqueda_flexografia = {
						data,
						detalle: {
							id_reporte: id_reporte,
							fecha: fecha,
							turno: turno,
							nombre_operador: nombre_operador,
							estado: estado,
						},
					};

					if (j == 5) {
						//console.log(data);
						console.log(busqueda_flexografia);
						$("table#tabla_flexografia").dataTable().fnDestroy();

						llenar_tabla_flexografia_busqueda(busqueda_flexografia)
					}
				}
				clearTimeout(timeout_flexografia);
			}, 1500);
		});
	}
	//FIN FILTRO FLEXOGRAFIA

});
