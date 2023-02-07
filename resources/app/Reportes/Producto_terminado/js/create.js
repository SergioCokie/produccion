$(document).ready(function () {


	function crear_contenido(codigo_documento) {
		$.ajax({
			type: "POST",
			url: base_url + "Reportes/Producto_terminado/agregar_contenido",
			data: { codigo: codigo_documento },
			success: function (response) {
				$("tbody#contenido").append(response);

			},

		});
	}
	function crear_detalle(codigo_documento) {
		$.ajax({
			type: "POST",
			url: base_url + "Reportes/Producto_terminado/agregar_detalle",
			data: { codigo: codigo_documento },
			success: function (response) {
				var numero = $("#first_detalle").attr("rowspan");
				$("#first_detalle").attr("rowspan", numero + 1);
				$("tbody#detalle").append(response);
			},
		});
	}

	$(document).on("click", "#agregar_1", function () {//agregando contenido al modal / reporte
		crear_contenido($(this).attr("role"))
		crear_detalle($(this).attr("role"))

	});

	/* $(document).on("click", "#agregar_1", function () {//agregando contenido al modal / reporte
		$.ajax({
			type: "POST",
			url: "Producto_terminado/agregar_contenido",
			data: { codigo: $(this).attr("role") },
			success: function (response) {
				$("tbody#contenido").append(response);
				
			},

		});
	}); */

	/* $(document).on("click", "#agregar_2", function () { //agregando detalle al modal / reporte
		$.ajax({
			type: "POST",
			url: "Producto_terminado/agregar_detalle",
			data: { codigo: $(this).attr("role") },
			success: function (response) {
				var numero = $("#first_detalle").attr("rowspan");
				$("#first_detalle").attr("rowspan", numero + 1);
				$("tbody#detalle").append(response);
			},
		});
	}); */
	$(document).on("click", ".agregar_especificaiones", function () { //agregando detalle al modal / reporte
		$.ajax({
			type: "POST",
			url: base_url + "Reportes/Producto_terminado/agregar_especificaiones",
			data: { id_detalle: $(this).val() },
			success: function (response) {
				console.log(response);

				$("tr#" + id_detalle + " td.td_bulto").append(`<div style="width: auto;border-bottom: #1c2aa545  1px solid;">
					<input type="text" class="w-25 especificacion_detalle pintado" style="background-color:transparent;border:none;height:38px;text-align:right" value="" id="cantidad_bultos" name="`+ response + `" placeholder="0"> 
					X 
					<input type="text" class="w-25 especificacion_detalle pintado" style="background-color:transparent;border:none;height:38px;text-align:left" value="" id="cantidad_cajas" name="`+ response + `" placeholder="0">
					<input type="text" class="w-25 especificacion_detalle pintado" style="background-color:transparent;border:none;height:38px;" value="" id="tipo_unidad" name="` + response + `" placeholder="Unidad">

				</div>`);

				$("tr#" + id_detalle + " td.td_peso").append(`<div style="width: auto;border-bottom: #1c2aa545  1px solid;">
					<input type="text" class="w-25 especificacion_detalle pintado" style="background-color:transparent;border:none;height:38px;text-align:center" value="" id="peso" name="`+ response + `" placeholder="00"> Kg
				</div>`);

				$("tr#" + id_detalle + " td.td_comentario").append(`<div style="width: auto;border-bottom: #1c2aa545  1px solid;">
					<input type="text" class="w-100 especificacion_detalle pintado" style="background-color:transparent;border:none;height:38px;text-align:center" value="" id="comentario" name="`+ response + `" placeholder="Comentario">
				</div>`);
			},
		});

		let id_detalle = $(this).val();
	});


	const get_especificaciones_detalle = (params) => {
		$.ajax({
			type: "POST",
			url: base_url + "Reportes/Producto_terminado/mostrar_especificaciones_detalle",
			data: { id_producto: params },
			success: function (response) {
				var datos = JSON.parse(response);
				console.log(datos);
				for (let i = 0; i < datos.length; i++) {
					let detalle = $("table#crear-procucto tbody#detalle tr#" + datos[i].id_detalle + "")

					detalle.find("td.td_bulto").append(
						`<div style="width: auto;border-bottom: #1c2aa545  1px solid;">
                        	<input type="text" class="w-25 especificacion_detalle pintado" style="background-color:transparent;border:none;height:38px;text-align:right" value="`+ (datos[i].cantidad_bultos != null ? datos[i].cantidad_bultos : "") + `" id="cantidad_bultos" name="` + datos[i].id + `" placeholder="0"> 
							X 
							<input type="text" class="w-25 especificacion_detalle pintado" style="background-color:transparent;border:none;height:38px;text-align:left" value="` + (datos[i].cantidad_cajas != null ? datos[i].cantidad_cajas : "") + `" id="cantidad_cajas" name="` + datos[i].id + `" placeholder="0">
							<input type="text" class="w-25 especificacion_detalle pintado" style="background-color:transparent;border:none;height:38px;" value="` + (datos[i].tipo_unidad != null ? datos[i].tipo_unidad : "") + `" id="tipo_unidad" name="` + datos[i].id + `" placeholder="Unidad">
                    	</div>`
					)
					detalle.find("td.td_peso").append(
						`<div style="width: auto;border-bottom: #1c2aa545  1px solid;">
							<input type="text" class="w-25 especificacion_detalle pintado" style="background-color:transparent;border:none;height:38px;text-align:center" value="`+ (datos[i].peso != null ? datos[i].peso : "") + `" id="peso" name="` + datos[i].id + `" placeholder="00"> Kg
						</div>`
					)
					detalle.find("td.td_comentario").append(
						`<div style="width: auto;border-bottom: #1c2aa545  1px solid;">
							<input type="text" class="w-100 especificacion_detalle pintado" style="background-color:transparent;border:none;height:38px;text-align:center" value="`+ (datos[i].comentario != null ? datos[i].comentario : "") + `" id="comentario" name="` + datos[i].id + `" placeholder="Comentario">
						</div>`
					)
				}
			}
		});
	}

	$(document).on('click', '#crear_nuevo_documento', function () { //creando un nuevo reporte
		$.ajax({
			type: "POST",
			url: base_url + "Reportes/Producto_terminado/insertar_producto_terminado",
			success: function (response) {
				$("#contenedor_tabla_principal").empty()
				$("#contenedor_tabla_principal").append(response);

				//Seteamos los datos a vacios para que no tenga datos llenos al momento de llenar el documento
				let id_producto_terminado = $("button#agregar_1").attr("role")
				get_especificaciones_detalle(id_producto_terminado)

				$("#numero_corrugados").attr("name", id_producto_terminado);
				$("button#btnTransferir").attr("name", id_producto_terminado);
				$("#numero_tarimas").attr("name", id_producto_terminado);
				$("input[name=selector]").attr("role", id_producto_terminado);
				$("select.select_estado_documento").attr("name", id_producto_terminado);
				$("#orden_compra").attr("name", id_producto_terminado);
				$("#cliente").val("");
				$("#ot").val("");
				$("#numero_tarimas").val("");
				$("#numero_corrugados").val("");
				$("#nombre_area_recibe").val("");
				$("input#to_print").prop("checked", false);
				$("input#to_print").attr("name", id_producto_terminado);
				$("input#to_print").val("1")
				$("input[name=selector]").prop("checked", false);
				$("input#nombre_produccion").val(nombre_usuario);
				$("#btnTransferir").show();
				document.getElementById("datos_extras").style.display = "none"
				bloquar_cuando("Abierto")
			}
		});
	});

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


	vacio();
	function vacio() {
		setInterval(() => {
			$("td.pintado").each(function (index, element) {//PINTANDO TODOS LOS TD VACIOS
				if ($(this).text() != "") {
					$(this).css("background-color", "transparent");
				} else {
					$(this).css("background-color", "#fdfd96");
				}
			});
			$("textarea.pintado").each(function (index, element) {//PINTANDO TODOS LOS TEXT AREA VACIO
				if ($(this).val() != "") {
					$(this).parents("td").css("background-color", "transparent");
				} else {
					$(this).parents("td").css("background-color", "#fdfd96");
				}
			});
			$("input.pintado").each(function (index, element) {//PINTANDO TODOS LOS INPUT VACIO
				if ($(this).val() != "") {
					$(this).parents("td").css("background-color", "transparent");
					$(this).css("background-color", "transparent");

				} else {
					$(this).parents("td").css("background-color", "#fdfd96");
					$(this).css("background-color", "#fdfd96");
				}
			});

			$("span#select2-area_entrega-container").each(function (index, element) {//PINTANDO SOLO EL SELEC DE AREA ENTREGA
				if ($(this).attr("title") != "Entrega") {
					$(this).css("background-color", "transparent");
				} else {
					$(this).css("background-color", "#fdfd96");
				}
			});
			$("span#select2-area_recibe-container").each(function (index, element) {//PINTANDO SOLO EL SELEC DE AREA VACIO
				if ($(this).attr("title") != "Recibe") {
					$(this).css("background-color", "transparent");
				} else {
					$(this).css("background-color", "#fdfd96");
				}
			});
			$("span#select2--container").each(function (index, element) {//PINTANDO SOLO EL SELEC DE AREA VACIO
				if ($(this).attr("title") != "Maquinas") {
					$(this).css("background-color", "transparent");
				} else {
					$(this).css("background-color", "#fdfd96");
				}
			});


		}, 100)

	}
});
