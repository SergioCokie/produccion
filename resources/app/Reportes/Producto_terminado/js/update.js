$(document).ready(function () {
	function modificar_registro_de_contenido(datos_a_modificar) {
		$.ajax({
			type: "POST",
			url: "Producto_terminado/update_contenido",
			data: datos_a_modificar,
			success: function (response) {
			},
		});
	}
	//aqui se hace el update a la fichaha xd
	$(document).on("input", "input.producto_terminado_contenido_cantidad",
		function (e) {
			var data = {
				id: $(this).attr("name"),
				cantidad: $(this).val(),
			};
			modificar_registro_de_contenido(data);
		}
	);

	$(document).on("input", "input#numero_ingreso", function (e) {
		var data = {
			id: $(this).attr("name"),
			campo: $(this).attr("id"),
			value: $(this).val(),
		};
		$.ajax({
			type: "POST",
			url: "Producto_terminado/actualizar_producto_terminado_all",
			data: data,
			success: function (response) {
			},
		});
	});



	$(document).on("input", "input.producto_terminado_contenido_codigo",
		function (e) {
			var data = {
				id: $(this).attr("name"),
				codigo_producto: $(this).val(),
			};
			modificar_registro_de_contenido(data);
		}
	);

	$(document).on("input", "textarea.textarea_contenido", function (e) {
		var data = {
			id: $(this).attr("name"),
			producto: $(this).val(),
		};
		modificar_registro_de_contenido(data);
	});

	$(document).on("input", "textarea.textarea_detalle", function (e) {
		var data = {
			id: $(this).attr("name"),
			campo: $(this).attr("id"),
			value: $(this).val(),
		};
		$.ajax({
			type: "POST",
			url: "Producto_terminado/update_detalle",
			data: data,
			success: function (response) {
			},
		});
	});

	$(document).on("input", ".text_area_inputs", function (e) {
		var data = {
			id: $(this).attr("name"),
			campo: $(this).attr("id"),
			value: $(this).val(),
		};
		$.ajax({
			type: "POST",
			url: "Producto_terminado/actualizar_producto_terminado_all",
			data: data,
			success: function (response) {
			},
		});
	});



	$(document).on("input", ".numeros", function (e) {
		var data = {
			id: $(this).attr("name"),
			campo: $(this).attr("id"),
			value: $(this).val(),
		};
		//console.log(data);
		$.ajax({
			type: "POST",
			url: "Producto_terminado/actualizar_producto_terminado_all",
			data: data,
			success: function (response) {
			},
		});
	});

	$(document).on("change", "select#area_recibe", function () {
		if ($(this).val() == "Logística") {
			$("#nombre_area_recibe").val("Maritza Lissette Hernández Guevara")
		} else if ($(this).val() == "Bodega") {
			$("#nombre_area_recibe").val("Juan Ramón Rosales")
		} else {
			toastr["warning"]("Necesita seleccionar un area")
		}
		var data = {
			id: $(this).attr("name"),
			campo: "nombre_area_recibe",
			value: $("#nombre_area_recibe").val()
		};
		console.log(data);
		$.ajax({
			type: "POST",
			url: "Producto_terminado/actualizar_producto_terminado_all",
			data: data,
			success: function (response) {
			},
		});
	});

	$(document).on("change", "select.areas", function () {

		var data = {
			id: $(this).attr("name"),
			campo: $(this).attr("id"),
			value: $(this).val()
		};
		console.log(data);
		$.ajax({
			type: "POST",
			url: "Producto_terminado/actualizar_producto_terminado_all",
			data: data,
			success: function (response) {
			},
		});
	});

	$(document).on("change", "select.select_estado_documento", function () {

		var data = {
			id: $(this).attr("name"),
			campo: "estado",
			value: $(this).val()
		};
		console.log(data);
		$.ajax({
			type: "POST",
			url: "Producto_terminado/actualizar_producto_terminado_all",
			data: data,
			success: function (response) {
			},
		});
	});

	$("input[type=radio]").on("change", function () {
		//con esto basicmante se acualiza el registro para el checkbox de realizADO
		let realizado = "";
		if ($(this).val() === "parcial") {
			realizado = "parcial";
		} else {
			realizado = "completo";
		}
		var data = {
			id: $(this).attr("role"),
			campo: $(this).attr("name"),
			value: realizado
		};

		$.ajax({
			type: "POST",
			url: "Producto_terminado/actualizar_producto_terminado_all",
			data: data,
			success: function (response) {
			},
		});
	});

	const validando_componentes_vacios = () => {
		let no_esta_vacio = true;
		$("textarea.pintado").each(function (index, element) {//PINTANDO TODOS LOS TEXT AREA VACIO
			if ($(this).val() != "") {
				no_esta_vacio = true;
			} else {
				no_esta_vacio = false;
			}
		});
		$("input.pintado").each(function (index, element) {//PINTANDO TODOS LOS INPUT VACIO
			if ($(this).val() != "") {
				no_esta_vacio = true;
			} else {
				no_esta_vacio = false;
			}
		});
		return no_esta_vacio;
	}

	$(".acutalizar_estado").click(function (e) {
		var estado = ""

		$(this).attr("id") == "btnTransferir" ? estado = "Transferido" : "";
		$(this).attr("id") == "btnAprobar" ? estado = "Aprobado" : "";
		$(this).attr("id") == "btnRechazar" ? estado = "Rechazado" : "";

		var data = {
			id: $(this).attr("name"),
			campo: "estado",
			value: estado,
		};
		if (validando_componentes_vacios() == true) {

			$(this).attr("id") == "btnTransferir" ? toastr["success"]("El documento ha sido transferido con éxito. Esperando que el documento se apruebe o se rechace ", "Transferencia exitosa!") : "";
			$(this).attr("id") == "btnAprobar" ? toastr["success"]("El documento fue Aprobado", "Aprobado") : "";
			$(this).attr("id") == "btnRechazar" ? toastr["error"]("El documento fue rechazado", "Rechazada") : "";

			$.ajax({
				type: "POST",
				url: "Producto_terminado/actualizar_producto_terminado_all",
				data: data,
				success: function (response) {
					console.log(response);
				},
			});
		} else {
			toastr["error"]("Tiene datos vacíos en el documento. Por favor verifique que todos los datos estén llenos antes de transferir la ficha ", "Error")
		}

	});

	$("#to_print").change(function (e) {
		var data = {
			id: $(this).attr("name"),
			campo: "imprimir",
			value: e.target.value,
			ot: $("#ot").val(),
			opcion:$(this).val()
		};

		$.ajax({
			type: "POST",
			url: "Producto_terminado/get_etiquetas",
			data: data,
			success: function (response) {
				console.log(response);

			},
		});

		$.ajax({
			type: "POST",
			url: "Producto_terminado/actualizar_producto_terminado_all",
			data: data,
			success: function (response) {
				console.log(response);

			},
		});

		if ($(this).val() == "0") {
			$(this).val("1");
		} else {
			$(this).val("0");
		}
	});


	$(document).on("input", ".especificacion_detalle", function (e) {
		var data = {
			id: $(this).attr("name"),
			campo: $(this).attr("id"),
			value: $(this).val(),
		};
		$.ajax({
			type: "POST",
			url: "Producto_terminado/acutalizar_especificaciones_detalle",
			data: data,
			success: function (response) {
			},
		});
	});

	toastr.options = {
		"closeButton": true,
		"debug": false,
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
});
