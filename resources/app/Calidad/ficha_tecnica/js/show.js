$(document).ready(function () {
	mostrar_ficha();
	//metodo para mostrar datos en la tabla (el metodo tiene parametros por si se quiere utilizar como filtro y traer datos en especifico) */
	function mostrar_ficha(param) {
		var table = $("table#tabla_ficha_tecnica").DataTable({
			ajax: {
				method: "POST",
				url: base_url + "Calidad/Ficha_tecnica/get_all_fichas",
				data: param,
				complete: function (data) {
					//$("table#tabla_ficha_tecnica").dataTable().fnDestroy();
				},
			},
			columns: [
				{
					data: "ot",
					render: function (ot) {
						return "<td>" + '<div class="wrap">' + ot + "</div>" + "</td>";
					},
				},
				{
					data: "maquina",
					render: function (maquina) {
						return "<td>" + '<div class="wrap">' + maquina + "</div>" + "</td>";
					},
				},
				{
					data: "fecha_creacion",
					render: function (fecha_creacion) {
						return (
							"<td>" +
							'<div class="wrap">' +
							fecha_creacion +
							"</div>" +
							"</td>"
						);
					},
				},
				{
					data: "cliente",
					render: function (cliente) {
						return "<td>" + '<div class="wrap">' + cliente + "</div>" + "</td>";
					},
				},
				{
					data: "producto",
					render: function (producto) {
						return (
							"<td>" + '<div class="wrap">' + producto + "</div>" + "</td>"
						);
					},
				},
				{
					data: "cod_producto",
					render: function (cod_producto) {
						return "<td>" + '<div class="wrap">' + cod_producto != null
							? cod_producto
							: "----" + "</div>" + "</td>";
					},
				},
				{
					data: "tipo_producto",
					render: function (tipo_producto) {
						return (
							"<td>" + '<div class="wrap">' + tipo_producto + "</div>" + "</td>"
						);
					},
				},
				{
					data: "encargados_nombre",
					render: function (encargados_nombre) {
						return (
							"<td>" +
							'<div class="wrap">' +
							encargados_nombre +
							"</div>" +
							"</td>"
						);
					},
				},
				{
					data: "tipo_ficha",
					render: function (tipo_ficha) {
						return (
							"<td>" + '<div class="wrap">' + tipo_ficha + "</div>" + "</td>"
						);
					},
				},
				{
					data: "version",
					render: function (version) {
						return "<td>" + '<div class="wrap">' + version + "</div>" + "</td>";
					},
				},
				{
					data: "ruta",
					render: function (ruta) {
						var classe = "";
						var id;
						rol_id != 6 ? (classe = "disabled") : (classe = "");

						return (
							"<td>" +
							'<a type="button" class="btn ver_ficha botones" target="_blank" href = "ficha_tecnica/fichas/' +
							ruta +
							'">' +
							'<img src="/Produccion/resources/img/Ver.png">' +
							"</a>" +
							'<button class="eliminar btn btn-danger botones" id="' +
							ruta +
							'" '+classe+'>' +
							'<img src="/Produccion/resources/img/Eliminar.png" alt="">' +
							"</button>" +
							"</td>"
						);
					},
				},
			],
			bPaginate: false, //Ocultar paginación
			rowId: "staffId",
			sDom: '<"top"fli>t<"bottom"p><"clear">f',
			bProcessing: true,
			bAutoWidth: false,
			searching: false,
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
	//'+classe+'

	/* FILTRADOOOOOOOO---------------------------------------------------------------- */
	let inputs_busqueda = document.getElementsByClassName("tabla");
	let timeout;

	var busqueda;
	var data = {
		ot: "",
		maquina: "",
		fecha_creacion: "",
		cliente: "",
		producto: "",
		cod_producto: "",
		tipo_producto: "",
		encargados_nombre: "",
		tipo_ficha: "",
		version: "",
	};
	for (var i = 0; i < inputs_busqueda.length; i++) {
		inputs_busqueda[i].addEventListener("keydown", () => {
			clearTimeout(timeout);
			timeout = setTimeout(() => {
				for (let j = 1; j <= 10; j++) {
					var ot;
					var maquina;
					var fecha_creacion;

					var cliente;
					var producto;
					var cod_producto;

					var tipo_producto;
					var encargados_nombre;
					var tipo_ficha;

					var version;

					$(".input_" + j).attr("id") == "ot"? (ot = $(".input_" + j).val()): "";
					$(".input_" + j).attr("id") == "maquina"? (maquina = $(".input_" + j).val()): "";
					$(".input_" + j).attr("id") == "fecha_creacion"? (fecha_creacion = $(".input_" + j).val()): "";

					$(".input_" + j).attr("id") == "cliente"? (cliente = $(".input_" + j).val()): "";$(".input_" + j).attr("id") == "producto"? (producto = $(".input_" + j).val()): "";
					$(".input_" + j).attr("id") == "cod_producto"? (cod_producto = $(".input_" + j).val()): "";

					$(".input_" + j).attr("id") == "tipo_producto"? (tipo_producto = $(".input_" + j).val()): "";
					$(".input_" + j).attr("id") == "encargados_nombre"? (encargados_nombre = $(".input_" + j).val()): "";
					$(".input_" + j).attr("id") == "tipo_ficha"? (tipo_ficha = $(".input_" + j).val()): "";

					$(".input_" + j).attr("id") == "version"? (version = $(".input_" + j).val()): "";

					data = {
						ot: ot,
						maquina: maquina,
						fecha_creacion: fecha_creacion,
						cliente: cliente,
						producto: producto,
						cod_producto: cod_producto,
						tipo_producto: tipo_producto,
						encargados_nombre: encargados_nombre,
						tipo_ficha: tipo_ficha,
						version: version,
					};

					if (j == 10) {
						console.log(data);
						$("table#tabla_ficha_tecnica").dataTable().fnDestroy();
						mostrar_ficha(data);
					}
				}
				clearTimeout(timeout);
			}, 1500);
		});
	}

	$("#fecha_creacion").on("change", function () {
		data.fecha_creacion = $(this).val();
		$("table#tabla_ficha_tecnica").dataTable().fnDestroy();
		mostrar_ficha(data);
	});
	$("#tipo_ficha").on("change", function () {
		data.tipo_ficha = $(this).val();
		$("table#tabla_ficha_tecnica").dataTable().fnDestroy();
		mostrar_ficha(data);
	});

	$("#mostrar_todo").click(function () {
		alert("coming soon"); //se plenea mostrar todos los datos
	});

	$(document).on("click","#tabla_ficha_tecnica tbody tr button.eliminar",function () {
			Swal.fire({
				title: "Esta seguro?",
				text: "No podra revertir este cambio!",
				icon: "warning",
				showCancelButton: true,
				confirmButtonText: "Si, Borrar!",
				cancelButtonText: "No, cancelar!",
				reverseButtons: true,
			}).then((result) => {
				if (result.isConfirmed) {
					Swal.fire("Eliminado!", "Tu registro ha sido borrado.", "success");
					var ruta = $(this).attr("id");
					id = ruta.split("/");
					var data = {
						ID: id[1],
						tipo: id[0],
					};
					$.ajax({
						type: "POST",
						url: base_url + "Calidad/Ficha_tecnica/eliminar_ficha",
						data: data,
						dataType: "dataType",
						success: function (response) {
						},
					});
				} else if (
					/* Read more about handling dismissals below */
					result.dismiss === Swal.DismissReason.cancel
				) {
					Swal.fire("Cancelado", "Tu registro esta a salvo :)", "error");
				}
			});
		}
	);
});
