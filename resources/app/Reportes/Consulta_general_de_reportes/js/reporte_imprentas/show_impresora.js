$(document).ready(function () {

	$("button.boton_validacion").map(function () {
		if ($(this).attr("role") == "cerrado") {
			$(this).hide();
		}
	});

	function llenar_velocidades_tiempo() {
		var data = {
			codigo_equipo: parametros[7],
			id_reporter: parametros[5],
			tipo_maquina: parametros[6]//FAMILIA DE MAQUINA
		}
		$.ajax({
			type: "POST",
			url: base_url + "Reportes/Consulta_general/informacion_reporte_detalle",
			data: data,
			success: function (response) {
				var datos = JSON.parse(response);
				//console.log(datos);
				datos[0].velocidad_nominal != null ? $("input[name=velocidad_nominal]").val(datos[0].velocidad_nominal + " pl/h") : $("input[name=velocidad_nominal]").val("000 pl/h");
				datos[0].velocidad_efectiva != null ? $("input[name=velocidad_efectiva]").val(datos[0].velocidad_efectiva + " pl/h") : $("input[name=velocidad_efectiva]").val("000 pl/h");
				datos[0].tiempo != null ? $("input[name=tiempo_reporte]").val(datos[0].tiempo) : $("input[name=tiempo_reporte]").val("00:00:00");
				$("#codigo_reporte_en_header").text(parametros[5]);
			}
		});
	}

	llenar_velocidades_tiempo();
	$(document).on("input", ".input_acualizar_velocidades", function (e) {
		llenar_velocidades_tiempo();
	});
	$(".input_acualizar_velocidades").change(function (e) {
		llenar_velocidades_tiempo();
	});
	const validacion_de_arranque = () => {
		const divs = document.getElementsByClassName("validaciones_de_arranques").length;
		for (let i = 0; i < divs; i++) {
			$.ajax({
				type: "POST",
				url: base_url + "Reportes/Consulta_general/mostrar_contenido_validacion_de_arranque",
				data: { id_fila: $("#tabla" + i + "").attr("role") },
				success: function (response) {
					var datos = JSON.parse(response);
					if (datos[0].id_validacion == $("#tabla" + i).attr("role")) {
						for (let j = 0; j < datos.length; j++) {//cuando no encuentra algun dato para recorrer aqui muestra un error (IGNORAR0)

							$("#tabla" + i + " tbody").append(`
								<tr class="align-middle">
									<td style="font-size: 6pt;">`+ (datos[j].colores != null ? datos[j].colores : "-") + `</td>
									<td style="font-size: 6pt;">`+ (datos[j].densidades != null ? datos[j].densidades : "-") + `</td>
									<td style="font-size: 6pt;">`+ (datos[j].porcentaje_agua != null ? datos[j].porcentaje_agua : "-") + `</td>
								</tr>
							`)
						}
					}
				}
			});
		}
	}
	validacion_de_arranque()

	const manejar_estados_del_reporte = () => {
		var data = {
			codigo_equipo: parametros[7],
			id_reporter: parametros[5],
			tabla: "reportes_impresoras"//FAMILIA DE MAQUINA
		}
		if (rol_id == 2 || rol_id == 3 || rol_id == 4) {
			if (rol_id == 2) {
				$("#Pendiente_revision").hide();
				$("#Cerrado").hide();
			} else if (rol_id == 3) {//digitador
				$("#Pendiente_revision").hide();
				$("#Revisado").hide();
			} else if (rol_id == 4) {//operador
				$("#Revisado").hide();
				$("#Cerrado").hide();
			}
		} else if (rol_id != 1) {
			$(".cambiar_estado").hide();
			$("div.table-responsive input").attr("disabled", true);
			$("select").attr("disabled", true);
			$("textarea").attr("disabled", true);
		}
		$.ajax({
			type: "POST",
			url: base_url + "Reportes/Consulta_general/estado_del_reporte",
			data: data,
			success: function (response) {
				var datos = JSON.parse(response); //VALIDANDO ESTADO DEL REPORTE

				if (rol_id == 2) {//supervisor
					if (datos[0].estado == "Revisado" || datos[0].estado == "Cerrado" || datos[0].estado == "Abierto") {
						if (rol_id == 2) {
							$("#Revisado").hide();
							$("input").attr("disabled", true);
							$("select").attr("disabled", true);
							$("textarea").attr("disabled", true);
						}
					}
				} else if (rol_id == 3) {//digitador
					if (datos[0].estado == "Pendiente de revisión" || datos[0].estado == "Cerrado" || datos[0].estado == "Abierto") {
						if (rol_id == 3) {
							$("#Cerrado").hide();
							$("input").attr("disabled", true);
							$("select").attr("disabled", true);
							$("textarea").attr("disabled", true);
						}
					}
				} else if (rol_id == 4) {//operador
					if (datos[0].estado != "Abierto") {
						if (rol_id == 4) {
							$("#Pendiente_revision").hide();
							$("input").attr("disabled", true);
							$("select").attr("disabled", true);
							$("textarea").attr("disabled", true);
						}
					}
				}

			}
		});
	}
	manejar_estados_del_reporte()

	//ocultar boton
	$(".to_validacion_de_arranque").change(function (e) {
		e.target.value == "I" ? $("button[name=" + $(this).attr("name") + "]").show() : $("button[name=" + $(this).attr("name") + "]").hide();
	});

	//TODO: OPTIMIZAR EL CODIGO DONDE MUESTRA O AGREGA VALIDACIONES DE ARRANQUE
	$(".boton_modal_arranque_validacion").click(function (e) {
		if ($(this).parents("tr").find("textarea[role=descripcion_trello]").val() != "") {
			if ($(this).attr("id") != "") {
				var data = {

					id_fila: $(this).attr("name"), //ID FILA
					id_reporte: parametros[5],
					id_validacion: $(this).attr("id")
				}
				console.log(data);
				$.ajax({
					type: "POST",
					url: base_url + "Reportes/Consulta_general/mostrar_agregar_validacion_de_arranque",
					data: data,
					success: function (response) {
						$("table#tabla_modal_validacion_arranque tbody").empty();
						$("table#tabla_modal_validacion_arranque tbody").append(response);
					}
				});
				const boton = $(this)
				$.ajax({
					type: "POST",
					url: base_url + "Reportes/Consulta_general/mostrar_validacion_arranque",
					data: data,
					success: function (response) {
						var datos = JSON.parse(response);
						//console.log(datos);
						if (datos[0].estado == 'cerrado') {
							$("div#reportes-impresoras input").attr("disabled", true);
							$("div#modal_validacion_arranque button").attr("disabled", true);
						} else {
							$("div#reportes-impresoras input").attr("disabled", false);
							$("div#modal_validacion_arranque button").attr("disabled", false);
						}
						datos[0].fecha != null ? $("input#fecha").val(datos[0].fecha) : "";
						datos[0].cliente != null ? $("input#cliente").val(datos[0].cliente) : "";
						datos[0].producto != null ? $("input#producto").val(datos[0].producto) : "";
						datos[0].maquina != null ? $("input#maquina").val(datos[0].maquina) : "";
						datos[0].ot != null ? $("input#ot").val(datos[0].ot) : "";

						datos[0].barniz != null ? $("input#barniz").val(datos[0].barniz) : "";
						datos[0].observaciones != null ? $("input#observaciones").val(datos[0].observaciones) : "";


						//datos[0].operador != null ? $("#operador option[value="+datos[0].operador+"]").attr("selected",true) : "";
						datos[0].operador != null ? $("input#operador").val(datos[0].operador) : "";
						boton.attr("id", datos[0].id);


						$("#supervisor").find('option[value="' + datos[0].supervisor + '"]').remove();
						$("#supervisor").prepend("<option value='" + datos[0].supervisor + "' selected='selected'>" + datos[0].supervisor + "</option>");

						$("input[role=turno][value='" + datos[0].turno + "']").attr('checked', 'checked');


						$("#encargado_calidad").find('option[value="' + datos[0].encargado_calidad + '"]').remove();
						$("#encargado_calidad").prepend("<option value='" + datos[0].encargado_calidad + "' selected='selected'>" + datos[0].encargado_calidad + "</option>");

						$("select#supervisor").attr("name", datos[0].id);
						$("input[type=radio]").attr("name", datos[0].id);
						$("input#barniz").attr("name", datos[0].id);
						$("input#observaciones").attr("name", datos[0].id);
						$("select#encargado_calidad").attr("name", datos[0].id);
						$("#btn_cambiar_estado").attr("name", datos[0].id);
					}
				});
			} else {		//agregamos y actualizamos la pagina	
				Swal.fire({
					title: '¿Esta seguro?',
					text: "Agregar Validación de arranque!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'SI, Agregar!',
					cancelButtonText: 'No, Cancelar!',
					reverseButtons: true
				}).then((result) => {
					if (result.isConfirmed) {
						var data = {
							cliente: $(this).parents("tr").find("input[role=cliente]").val(),//CLIENTE
							producto: $(this).parents("tr").find("input[role=producto]").val(),//PRODUCTO
							maquina: parametros[7],//MAQUINA
							ot: $(this).parents("tr").find("input[role=ot_trello]").val(),//OT
							turno: "TEST",//TURNO
							id_fila: $(this).attr("name"), //ID FILA
							id_reporte: parametros[5],
							id_validacion: $(this).attr("id")
						}

						$.ajax({
							type: "POST",
							url: base_url + "Reportes/Consulta_general/mostrar_agregar_validacion_de_arranque",
							data: data,
							success: function (response) {
								/* $("table#tabla_modal_validacion_arranque tbody").empty();
								$("table#tabla_modal_validacion_arranque tbody").append(response); */
							}
						});
						const boton = $(this)
						var data = {
							id_fila: $(this).attr("name"), //ID FILA
							id_reporte: parametros[5],
							id_validacion: $(this).attr("id")
						}

						$.ajax({
							type: "POST",
							url: base_url + "Reportes/Consulta_general/mostrar_validacion_arranque",
							data: data,
							success: function (response) {

							}
						});

						location.reload();
					} else if (
						/* Read more about handling dismissals below */
						result.dismiss === Swal.DismissReason.cancel
					) {
						Swal.fire(
							'Cancelado',
							'Operación Cancelada',
							'error'
						)
					}
				})
			}
		} else {
			toastr["error"]('Tiene que llenar los demas campos para poder agregar validaciones de motor de arranque ("ID TRELLO")')
		}
	});

	/* console.log(parametros[8]); */
	let id_fila = parametros[8];

	if (id_fila != " ") {
		$('#tabla_imprentas tr').each(function (i) {
			var ch = $(this).attr("role");
			if (ch === id_fila) {
				
				$(this).css("background-color","rgb(245 252 126)")
				$('html, body').animate({
					scrollTop: $("tr[role="+id_fila+"]").offset().top
				}, 100);
			}
			
		});
	} else {
		//console.log("esta vacio we");
	}





});