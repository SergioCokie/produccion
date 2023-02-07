$(document).ready(function () {
	llenar_tabla_producto_terminado()


	function llenar_tabla_producto_terminado(param) {
		var table = $("table#tabla_producto_terminado").DataTable({
			ajax: {
				method: "POST",
				url: base_url + "Reportes/Producto_terminado/get_producto_terminado",
				data: param,
				complete: function (data) { },
			}, //imprimimos las columnas en un div para poder controlar el espacio en cada td y asi poder colocarlos en toda la pantalla los 10 td
			columns: [
				{ data: "id" },
				{ data: "id_trello" },
				{ data: "numero_ingreso" },
				{ data: "cantidad" },
				{
					data: "descripcion_trello",
					render: function (descripcion_trello) {
						return (
							"<td>" +
							'<div class="wrap">' +
							descripcion_trello +
							"</div>" +
							"</td>"
						);
					},
				},
				{
					data: "codigo_producto",
					render: function (codigo_producto) {
						return "<td>" + '<div class="wrap">' + codigo_producto != null
							? codigo_producto
							: "----" + "</div>" + "</td>";
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
				{ data: "maquina" },
				{ data: "area_entrega" },
				{ data: "area_recibe" },
				{
					data: "nombre_produccion",
					render: function (nombre_produccion) {
						return "<td><div class='wrap'>" + nombre_produccion + "</div></td>";
					},
				},
				{ data: "estado" },
				{ data: "fecha_entrega" },
				{
					data: "id",
					render: function (id) {
						var botones = "<td>" +
							'<button type="button" class="btn mb-2 ver_ficha botones" style="background-color: #1f3558" data-toggle="modal" data-target="#modal_producto_terminado" id="btn_modificar_proceso" value="' + id + '">' +
							'<img src="/Produccion/resources/img/Ver.png">' +
							"</button>" +
							"<br>" +
							'<button class="eliminar btn btn-danger botones" style="background-color: red" id="btnEliminar" value="' + id + '">' +
							'<img src="/Produccion/resources/img/Eliminar.png" alt="">' +
							"</button>" +
							"</td>"
						var boton = "<td>" +
							'<button type="button" class="btn mb-2 ver_ficha botones" style="background-color: #1f3558" data-toggle="modal" data-target="#modal_producto_terminado" id="btn_modificar_proceso" value="' + id + '">' +
							'<img src="/Produccion/resources/img/Ver.png">' +
							"</button>" +
							"</td>"

						return (rol_id == 1 ? botones : boton);
					},
				},
			],
			//bPaginate: false, //Ocultar paginación */
			bProcessing: true,
			order: [[0, "desc"]],
			bAutoWidth: false,
			bLengthChange: false,
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
			aLengthMenu: [
				[25, 50, 100, 200, -1],
				[25, 50, 100, 200, "All"]
			],
			//para usar los botones

			dom: "Bfrtilp",
			buttons: [
				{
					extend: "excelHtml5",
					text: '<img height="16px" style="margin:0" src="/produccion2/resources/generales/img/icons/sobresalir.png">',
					titleAttr: "Exportar a Excel",
					className: "botones btn-success",
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
					},
				},
				{
					extend: "pdfHtml5",
					text: '<img style="margin:0" src="/produccion2/resources/generales/img/icons/001-archivo-pdf.png">',
					titleAttr: "Exportar a PDF",
					className: "botones btn-danger",
					orientation: "landscape",
					pageSize: "LEGAL",
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
					},
				},
			],

			columnDefs: [
				{
					targets: "_all",
					sortable: false,
					ordering: false,
					searching: true,
				},
			],
		});
		var filas = $("#tabla_producto_terminado thead tr:eq(1) th");
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
		$("#tabla_producto_terminado_filter").remove();//eliminando los filtros que pone datatable por defecto
		$(".dataTables_filter").remove();//se eliminan manualmente por que la propiedad seraching:flase evita que se filtren los datos
	}

	/* 	$("#modal_producto_terminado").on("hidden.bs.modal", function () {
			$("table#tabla_producto_terminado").dataTable().fnDestroy();
			llenar_tabla_producto_terminado()
		}); */
	//var busqueda; no borrar (filtrado opcional)
	/* var busqueda = {
		id: "",
		id_trello: "",
		numero_ingreso: "",
		cantidad: "",
		descripcion_trello: "",
		codigo_producto: "",
		producto: "",
		maquina: "",
		area_entrega: "",
		area_recibe: "",
		nombre_produccion: "",
		estado: "",
		fecha_entrega: "",
	};

	let input_busqueda = document.getElementsByClassName("tabla");
	let timeout;
	for (var i = 0; i < input_busqueda.length; i++) {
		input_busqueda[i].addEventListener("keydown", () => {
			clearTimeout(timeout);
			timeout = setTimeout(() => {
				for (let j = 1; j <= 13; j++) {
					var id;
					var id_trello;
					var numero_ingreso;
					var cantidad;
					var descripcion_trello;

					var codigo_producto;
					var producto;
					var maquina;
					var area_entrega;
					var area_recibe;

					var nombre_produccion;
					var estado;
					var fecha_entrega;

					$(".input_" + j).attr("id") == "id" ? (id = $(".input_" + j).val()) : "";
					$(".input_" + j).attr("id") == "id_trello" ? (id_trello = $(".input_" + j).val()) : "";
					$(".input_" + j).attr("id") == "numero_ingreso" ? (numero_ingreso = $(".input_" + j).val()) : "";
					$(".input_" + j).attr("id") == "cantidad" ? (cantidad = $(".input_" + j).val()) : "";
					$(".input_" + j).attr("id") == "descripcion_trello" ? (descripcion_trello = $(".input_" + j).val()) : "";

					$(".input_" + j).attr("id") == "codigo_producto" ? (codigo_producto = $(".input_" + j).val()) : "";
					$(".input_" + j).attr("id") == "producto" ? (producto = $(".input_" + j).val()) : "";
					$(".input_" + j).attr("id") == "maquina" ? (maquina = $(".input_" + j).val()) : "";
					$(".input_" + j).attr("id") == "area_entrega" ? (area_entrega = $(".input_" + j).val()) : "";
					$(".input_" + j).attr("id") == "area_recibe" ? (area_recibe = $(".input_" + j).val()) : "";

					$(".input_" + j).attr("id") == "nombre_produccion" ? (nombre_produccion = $(".input_" + j).val()) : "";
					$(".input_" + j).attr("id") == "estado" ? (estado = $(".input_" + j).val()) : "";
					$(".input_" + j).attr("id") == "fecha_entrega" ? (fecha_entrega = $(".input_" + j).val()) : "";

					var busqueda = {
						id: id,
						id_trello: id_trello,
						numero_ingreso: numero_ingreso,
						cantidad: cantidad,
						descripcion_trello: descripcion_trello,
						codigo_producto: codigo_producto,
						producto: producto,
						maquina: maquina,
						area_entrega: area_entrega,
						area_recibe: area_recibe,
						nombre_produccion: nombre_produccion,
						estado: estado,
						fecha_entrega: fecha_entrega,
					};

					if (j == 13) {
						console.log(busqueda);
						$("table#tabla_producto_terminado").dataTable().fnDestroy();
						llenar_tabla_producto_terminado(busqueda)
					}
				}
				clearTimeout(timeout);
			}, 1500);
		});
	}
	$("select.tabla").on("change", function () {

		$(this).attr("id") == "maquina" ? busqueda.maquina = $(this).val() : "";
		$(this).attr("id") == "area_entrega_t" ? busqueda.area_entrega = $(this).val(): "";
		$(this).attr("id") == "area_recibe_t" ? busqueda.area_recibe = $(this).val(): "";
		$(this).attr("id") == "estado" ? busqueda.estado = $(this).val(): "";

		$("table#tabla_producto_terminado").dataTable().fnDestroy();
		llenar_tabla_producto_terminado(busqueda)
	});
	$("#fecha_entrega").on("change", function () {
		  busqueda.fecha_entrega = $(this).val()
		 //console.log(busqueda);

		$("table#tabla_producto_terminado").dataTable().fnDestroy();
		llenar_tabla_producto_terminado(busqueda)
	}); */

	//solo mostrando el modal con sus datos
	$(document).on("click", "#tabla_producto_terminado tbody tr button#btn_modificar_proceso", function () {
		$.ajax({
			type: "POST",
			url: base_url + "Reportes/Producto_terminado/mostrar_tabla",
			data: { id_producto: $(this).val() },
			success: function (response) {
				$("#contenedor_tabla_principal").empty();
				$("#contenedor_tabla_principal").append(response);
			},
		});
	});

	const get_especificaciones_detalle = (params, estado) => {
		$.ajax({
			type: "POST",
			url: base_url + "Reportes/Producto_terminado/mostrar_especificaciones_detalle",
			data: { id_producto: params },
			success: function (response) {
				var datos = JSON.parse(response);
				for (let i = 0; i < datos.length; i++) {
					let detalle = $("table#crear-procucto tbody#detalle tr#" + datos[i].id_detalle + "")

					let disabled = estado == true ? 'disabled' : '';

					detalle.find("td.td_bulto").append(
						`<div style="width: auto; border-bottom: #1c2aa545  1px solid;">
                        	<input type="text" class="w-25 `+ disabled + ` especificacion_detalle pintado" style="background-color:transparent;border:none;height:38px;text-align:right" value="` + (datos[i].cantidad_bultos != null ? datos[i].cantidad_bultos : "") + `" id="cantidad_bultos" name="` + datos[i].id + `" placeholder="0"> 
							X
							<input type="text" class="w-25 `+ disabled + ` especificacion_detalle pintado" style="background-color:transparent;border:none;height:38px;text-align:left" value="` + (datos[i].cantidad_cajas != null ? datos[i].cantidad_cajas : "") + `" id="cantidad_cajas" name="` + datos[i].id + `" placeholder="0">
							<input type="text" class="w-25 `+ disabled + ` especificacion_detalle pintado" style="background-color:transparent;border:none;height:38px;" value="` + (datos[i].tipo_unidad != null ? datos[i].tipo_unidad : "") + `" id="tipo_unidad" name="` + datos[i].id + `" placeholder="Unidad">
                    	</div>`
					)
					detalle.find("td.td_peso").append(
						`<div style="width: auto;border-bottom: #1c2aa545  1px solid;">
							<input type="text" class="w-25 `+ disabled + ` especificacion_detalle pintado" style="background-color:transparent;border:none;height:38px;text-align:center" value="` + (datos[i].peso != null ? datos[i].peso : "") + `" id="peso" name="` + datos[i].id + `" placeholder="00"> Kg
						</div>`
					)
					detalle.find("td.td_comentario").append(
						`<div style="width: auto;border-bottom: #1c2aa545  1px solid;">
							<input type="text" class="w-100 `+ disabled + ` especificacion_detalle pintado" style="background-color:transparent;border:none;height:38px;text-align:center" value="` + (datos[i].comentario != null ? datos[i].comentario : "") + `" id="comentario" name="` + datos[i].id + `" placeholder="Comentario">
						</div>`
					)
				}
			}
		});
	}

	//seteando valores muy especificos o controlando las acciones del modal al mostrarse 
	$(document).on("click", "#tabla_producto_terminado tbody tr button#btn_modificar_proceso", function () {
		$.ajax({
			type: "POST",
			url: base_url + "Reportes/Producto_terminado/llenar_datos",
			data: { id_producto: $(this).val() },
			success: function (response) {
				var datos = JSON.parse(response);

				const estado = datos[0].estado == 'Abierto' ? false : true;

				get_especificaciones_detalle(datos[0].id, estado);
				datos[0].cliente != null ? $("input[name=cliente]").val(datos[0].cliente) : $("input[name=cliente]").val("");
				datos[0].ot != null ? $("input[name=ot]").val(datos[0].ot) : $("input[name=ot]").val("");
				datos[0].fecha_entrega != null ? $("input[name=fecha_entrega]").val(datos[0].fecha_entrega) : $("input[name=fecha_entrega]").val("");
				datos[0].orden_compra != null ? $("input#orden_compra").val(datos[0].orden_compra) : $("input#orden_compra").val("");
				
				datos[0].fecha_sistema != null ? $("input[name=fecha_sistema]").val(datos[0].fecha_sistema) : $("input[name=fecha_sistema]").val("");
				datos[0].numero_corrugados != null ? $("#numero_corrugados").val(datos[0].numero_corrugados) : $("#numero_corrugados").val("");
				datos[0].numero_tarimas != null ? $("#numero_tarimas").val(datos[0].numero_tarimas) : $("#numero_tarimas").val("");
				datos[0].nombre_area_recibe != null ? $("input[name=nombre_area_recibe]").val(datos[0].nombre_area_recibe) : $("input[name=nombre_area_recibe]").val("");
				datos[0].nombre_area_recibe != null ? $("input[name=nombre_area_recibe]").val(datos[0].nombre_area_recibe) : $("input[name=nombre_area_recibe]").val("");
				datos[0].selector != null ? $("input[type=radio]").val([datos[0].selector]) : $("input:radio").removeAttr("checked");
				datos[0].numero_ingreso != null ? $("input#numero_ingreso").val(datos[0].numero_ingreso) : $("input#numero_ingreso").val("");
				datos[0].hora != null ? $("span#hora_ficha").text("Hora: " + datos[0].hora) : $("span#hora_ficha").text("Hora: 00:00:00");
				datos[0].nombre_produccion != null ? $("input#nombre_produccion").val(datos[0].nombre_produccion) : $("input#nombre_produccion").text("");

				datos[0].imprimir == 1 ? $("input#to_print").prop("checked", true) : $("input#to_print").prop("checked", false);
				datos[0].imprimir == 1 ? $("input#to_print").val("0") : $("input#to_print").val("1");//ESTAS DOS FILAS MODIFICAN EL INPUT DE LAS ETIQUETAS

				datos[0].id != null ? $("span#codigo_doc").text([datos[0].id]) : "";
				$('a#btndescargar').prop('href', 'producto_terminado/print/' + datos[0].id + '');
				$(".acutalizar_estado").attr("name", datos[0].id);
				$("input#numero_ingreso").attr("name", datos[0].id);
				$("input#orden_compra").attr("name", datos[0].id);
				$("input#to_print").attr("name", datos[0].id);
				$("select.select_estado_documento").attr("name", datos[0].id);
				$("input[type=radio]").attr("role", datos[0].id);
				$("#numero_corrugados").attr("name", datos[0].id);
				$("#numero_tarimas").attr("name", datos[0].id);
				$("select#estado_tabla").attr("name", datos[0].id);

				datos[0].estado == "Aprobado" ? toastr["success"]("El documento fue Aprobado! :)") : "";
				datos[0].estado == "Rechazado" ? toastr["error"]("El documento fue rechazado :(") : "";
				datos[0].estado == "Transferido" ? toastr["warning"]("El documento fue Transferido") : "";
				datos[0].estado == "Abierto" ? toastr["info"]("El documento esta Abierto!") : "";

				datos[0].estado == "Aprobado" ? $("#btnAprobar").hide() : "";
				datos[0].estado == "Aprobado" ? $("#btnRechazar").hide() : "";
				datos[0].estado == "Aprobado" ? $("#btnTransferir").hide() : "";
				datos[0].estado == "Aprobado" ? document.getElementById("datos_extras").style.display = "" : "";

				datos[0].estado == "Abierto" ? $("#btnAprobar").show() : "";
				datos[0].estado == "Abierto" ? $("#btnRechazar").show() : "";
				datos[0].estado == "Abierto" ? $("#btnTransferir").show() : "";
				datos[0].estado == "Abierto" ? document.getElementById("datos_extras").style.display = "none" : "";

				datos[0].estado == "Transferido" ? $("#btnAprobar").show() : "";
				datos[0].estado == "Transferido" ? $("#btnRechazar").show() : "";
				datos[0].estado == "Transferido" ? $("#btnTransferir").hide() : "";
				datos[0].estado == "Transferido" ? document.getElementById("datos_extras").style.display = "none" : "";

				datos[0].estado == "Rechazado" ? $("#btnAprobar").show() : "";
				datos[0].estado == "Rechazado" ? $("#btnRechazar").show() : "";
				datos[0].estado == "Rechazado" ? $("#btnTransferir").show() : "";
				datos[0].estado == "Rechazado" ? document.getElementById("datos_extras").style.display = "none" : "";

				bloquar_cuando(datos[0].estado);

			},
		});
	});


	//UNICO BOTON DE ELIMINAR
	$(document).on("click", "#tabla_producto_terminado tbody tr button#btnEliminar", function () {
		Swal.fire({
			title: '¿Esta seguro?',
			text: "La eliminación del documento " + $(this).val() + " no podrá ser revertida!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonText: 'Si, Eliminarlo!',
			cancelButtonText: 'No, Cancelar!',
			reverseButtons: true
		}).then((result) => {
			if (result.isConfirmed) {
				$(this).closest("tr").remove();
				$.ajax({
					type: "POST",
					url: base_url + "Reportes/Producto_terminado/eliminar_documento",
					data: { id: $(this).val() },
					dataType: "dataType",
					success: function (response) {
					},
				});
				Swal.fire('Eliminado!', 'Tu documento ha sido eliminado.', 'success')
			} else if (result.dismiss === Swal.DismissReason.cancel) {
				Swal.fire('Cancelado', 'Tu archivo esta bien :)', 'error')
			}
		})
	});

	toastr.options = {
		"closeButton": true,
		"debug": true,
		"newestOnTop": false,
		"progressBar": true,
		"positionClass": "toast-top-right",
		"preventDuplicates": false,
		"onclick": null,
		"showDuration": "300",
		"hideDuration": "1000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	}

	function bloquar_cuando(param) {
		if (rol_id != 1) {
			if (param === "Abierto") {
				$("div#global input").attr('readonly', false);
				$('input[name=selector]').attr("disabled", false);

			} else if (param === "Transferido") {
				$("div#global input").attr('readonly', true);
				$('input[name=selector]').attr("disabled", true);
			}
			else if (param === "Aprobado") {
				$("div#global input").attr('readonly', true);
				$('input[name=selector]').attr("disabled", true);

			}
			else if (param === "Rechazado") {
				$("div#global input").attr('readonly', false);
				$('input[name=selector]').attr("disabled", false);

			}
		}

	}

});
