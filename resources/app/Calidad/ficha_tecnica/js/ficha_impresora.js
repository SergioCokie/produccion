$(document).ready(function () {
	$("input").attr("disabled", true);
	$(".agregar-tintas").attr("disabled", true);

	 if ($(".estado_ficha").attr("id") == "Cerrado") {
		document.getElementById("editar").style.display = "none";
		var boton = document.getElementsByClassName("cerrar_ficha");
		$(boton).hide();
		toastr["warning"]("La ficha Actual esta cerrada") 

	} 
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

 	rol_id != 6 ? $(".cerrar_ficha").hide() : "";
	rol_id != 6 ? $("#editar").hide(): ""; 

	$("#editar").click(function (e) {
		Swal.fire({
			icon: "warning",
			text: "Al editar la ficha la version de modificara",
			showDenyButton: true,
			confirmButtonText: "Editar",
			denyButtonText: `No Editar`,
		}).then((result) => {
			/* Read more about isConfirmed, isDenied below */
			if (result.isConfirmed) {
				Swal.fire({
					icon: "success",
					text: "Hecho, Los campos han sido habilitados",
					showConfirmButton: false,
					timer: 1500,
				});
				var data = {
					ID: $(".codigo_del_doc").attr("id"),
					version: $(".version_del_doc").attr("id"),
					tipo_ficha: "impresora",
				};
				$(".version_del_doc").text(parseInt(data.version)+1);
				$.ajax({
					type: "POST",
					url: base_url + "calidad/ficha_tecnica/update_version",
					data: data,
					success: function (response) {
						console.log(response);
					},
				});
				$("input").attr("disabled", false);
				$(".agregar-tintas").attr("disabled", false);
				$("#editar").attr("disabled", true);
			} else if (result.isDenied) {
				Swal.fire("Changes are not saved", "", "info");
			}
		});
	});

	$(".cerrar_ficha").click(function (e) {
		Swal.fire({
			icon: "warning",
			text: "Al cerrar la ficha no se podrá hacer ningún cambio",
			showDenyButton: true,
			confirmButtonText: "Editar",
			denyButtonText: `No Editar`,
		}).then((result) => {
			/* Read more about isConfirmed, isDenied below */
			if (result.isConfirmed) {
				Swal.fire({
					icon: "success",
					text: "Hecho, Los campos han sido habilitados",
					showConfirmButton: false,
					timer: 1500,
				});
				var data = {
					tipo: "impresora",
					ID: $(this).attr("id"),
				};
				document.getElementById("editar").style.display = "none";
				var boton = document.getElementsByClassName("cerrar_ficha");
				$(boton).hide();
				$.ajax({
					type: "POST",
					url: base_url + "calidad/ficha_tecnica/cerrar_ficha",
					data: data,
					success: function (response) {
						console.log(response);
					},
				});
				
			} else if (result.isDenied) {
				Swal.fire("Changes are not saved", "", "info");
			}
		});
	});

	//aqui se hace el update a la ficha xd
	$("input.input_ficha_impresora").on("input", function (e) {
		var codigo = $(this).attr("name"); // esto es un numero entero por ejemplo //15
		var campo = $(this).attr("id"); // campo a modificar por ejemplo nombre
		var value = $(this).val(); //el valor del campo

		var data = {
			id_ficha_tecnica: codigo,
			campos_a_modificar: campo,
			valor_a_enviar: value,
			tipo_ficha: "impresora",
		};
		console.log(data);
		$.ajax({
			type: "POST",
			url: base_url + "calidad/ficha_tecnica/update_ficha",
			data: data,
			success: function (response) {
				console.log(response);
			},
		});
	});

	// Comprobar cuando cambia un checkbox para actualizar tarea realizada
	$("input[type=checkbox]").on("change", function () {
		//con esto basicmante se acualiza el registro para el checkbox de realizADO
		let realizado = "";
		if ($(this).is(":checked")) {
			realizado = "SI";
		} else {
			realizado = "NO";
		}
		var codigo = $(this).attr("role"); // esto es un numero entero por ejemplo //15
		var campo = $(this).attr("name"); // campo a modificar por ejemplo nombre

		var data = {
			id_ficha_tecnica: codigo,
			campos_a_modificar: campo,
			valor_a_enviar: realizado,
			tipo_ficha: "impresora",
		};
		console.log(data);

		$.ajax({
			type: "POST",
			url: base_url + "calidad/ficha_tecnica/update_ficha",
			data: data,
			success: function (response) {
				console.log(response);
			},
		});
	});

	$("input[type=radio]").on("change", function () {
		//con esto basicmante se acualiza el registro para el checkbox de realizADO
		let realizado = "";
		if ($(this).val() === "SI") {
			realizado = "SI";
		} else {
			realizado = "NO";
		}
		var codigo = $(this).attr("role"); // esto es un numero entero por ejemplo //15
		var campo = $(this).attr("name"); // campo a modificar por ejemplo nombre

		var data = {
			id_ficha_tecnica: codigo,
			campos_a_modificar: campo,
			valor_a_enviar: realizado,
			tipo_ficha: "impresora",
		};
		console.log(data);

		$.ajax({
			type: "POST",
			url: base_url + "calidad/ficha_tecnica/update_ficha",
			data: data,
			success: function (response) {
				console.log(response);
			},
		});
	});

	$("input.formulacion_tinta").on("input", function (e) {
		var codigo = $(this).attr("name");
		var campo = $(this).attr("id");
		var value = $(this).val();

		var data = {
			id_tinta: codigo,
			campos: campo,
			value: value,
		};

		$.ajax({
			type: "POST",
			url: base_url + "calidad/ficha_tecnica/update_form_tinta",
			data: data,
			success: function (response) {
				console.log(response);
			},
		});
	});

	$(".agregar-tintas").click(function (e) {
		e.preventDefault();
		var filas = $("table#tintas tr").last();

		var datos = {
			id_ficha: $(this).attr("id"),
		};
		Swal.fire({
			icon: "warning",
			text: "Al crear una nueva formulación no se podrá eliminar",
			showDenyButton: true,
			confirmButtonText: "Crear",
			denyButtonText: `No Gracias`,
		}).then((result) => {
			/* Read more about isConfirmed, isDenied below */
			if (result.isConfirmed) {
				jQuery.extend({
					//agragamos nuevo registro a la tabla junto con el append
					getValues: function (url) {
						var result = null;
						$.ajax({
							url:
								base_url +
								"calidad/ficha_tecnica/insertar_formulaciones_tintas",
							type: "post",
							data: datos,
							async: false, //importante para hacer la variable global
							success: function (data) {
								result = data;
							},
						});
						return result;
					},
				});
				var results = $.getValues("url string"); //como hacer una variable global de una respuesta de ajax

				$(filas).before(
					"<tr>" +
						'<td rowspan="7" class="align-middle mx-auto"><input type="text" class="w-100 text-center formulacion_tintas_news_new" placeholder="Escribe aqui" name="' +
						results +
						'" id="pintado" value=""></td>' +
						'<td rowspan="7" class="align-middle mx-auto"><input type="text" class="w-100 text-center formulacion_tintas_news_new" placeholder="Escribe aqui" name="' +
						results +
						'" id="referencia" value=""></td>' +
						"<tr>" +
						'<td rowspan="2" class="align-middle">L=<input type="text" class="w-75 formulacion_tintas_news_new" name="' +
						results +
						'" id="cie_L" value=""></td>' +
						'<td><input type="text" class="w-100 formulacion_tintas_news_new" name="' +
						results +
						'" id="descripcion_1" value=""></td>' +
						'<td><input type="text" class="w-100 formulacion_tintas_news_new" name="' +
						results +
						'" id="proveedor_1" value=""></td>' +
						'<td><input type="text" class="w-100 formulacion_tintas_news_new" name="' +
						results +
						'" id="porcentaje_tinta_1" value=""></td>' +
						"</tr>" +
						"<tr>" +
						'<td><input type="text" class="w-100 formulacion_tintas_news_new" name="' +
						results +
						'" id="descripcion_2" value=""></td>' +
						'<td><input type="text" class="w-100 formulacion_tintas_news_new" name="' +
						results +
						'" id="proveedor_2" value=""></td>' +
						'<td><input type="text" class="w-100 formulacion_tintas_news_new" name="' +
						results +
						'" id="porcentaje_tinta_2" value=""></td>' +
						"</tr>" +
						"<tr>" +
						'<td rowspan="2" class="align-middle">a=<input type="text" class="w-75 formulacion_tintas_news_new" name="' +
						results +
						'" id="cie_A" value=""></td>' +
						'<td><input type="text" class="w-100 formulacion_tintas_news_new" name="' +
						results +
						'" id="descripcion_3" value=""></td>' +
						'<td><input type="text" class="w-100 formulacion_tintas_news_new" name="' +
						results +
						'" id="proveedor_3" value=""></td>' +
						'<td><input type="text" class="w-100 formulacion_tintas_news_new" name="' +
						results +
						'" id="porcentaje_tinta_3" value=""></td>' +
						"</tr>" +
						"<tr>" +
						'<td><input type="text" class="w-100 formulacion_tintas_news_new" name="' +
						results +
						'" id="descripcion_4" value=""></td>' +
						'<td><input type="text" class="w-100 formulacion_tintas_news_new" name="' +
						results +
						'" id="proveedor_4" value=""></td>' +
						'<td><input type="text" class="w-100 formulacion_tintas_news_new" name="' +
						results +
						'" id="porcentaje_tinta_4" value=""></td>' +
						"</tr>" +
						"<tr>" +
						'<td rowspan="2" class="align-middle">b=<input type="text" class="w-75 formulacion_tintas_news_new" name="' +
						results +
						'" id="cie_B" value=""></td>' +
						'<td><input type="text" class="w-100 formulacion_tintas_news_new" name="' +
						results +
						'" id="descripcion_5" value=""></td>' +
						'<td><input type="text" class="w-100 formulacion_tintas_news_new" name="' +
						results +
						'" id="proveedor_5" value=""></td>' +
						'<td><input type="text" class="w-100 formulacion_tintas_news_new" name="' +
						results +
						'" id="porcentaje_tinta_5" value=""></td>' +
						"</tr>" +
						"<tr>" +
						'<td><input type="text" class="w-100 formulacion_tintas_news_new" name="' +
						results +
						'" id="descripcion_6" value=""></td>' +
						'<td><input type="text" class="w-100 formulacion_tintas_news_new" name="' +
						results +
						'" id="proveedor_6" value=""></td>' +
						'<td><input type="text" class="w-100 formulacion_tintas_news_new" name="' +results +'" id="porcentaje_tinta_6" value=""></td>' +"</tr>" +
						"</tr>"
				);

				$("input.formulacion_tintas_news_new").on("input", function (e) {
					var codigo = $(this).attr("name");
					var campo = $(this).attr("id");
					var value = $(this).val();

					var data = {
						id_tinta: codigo,
						campos: campo,
						value: value,
					};

					$.ajax({
						type: "POST",
						url: base_url + "calidad/ficha_tecnica/update_form_tinta",
						data: data,
						success: function (response) {
							console.log(response);
						},
					});
				});
			} else if (result.isDenied) {
				Swal.fire("Changes are not saved", "", "info");
			}
		});
	});
});
