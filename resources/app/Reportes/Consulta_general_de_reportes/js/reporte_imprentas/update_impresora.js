$(document).ready(function () {
	if (rol_id == 1) {
		$("#tabla_imprentas tbody tr").dblclick(function () {
			//alert("ELIMINANDO : "+ $(this).attr("id"))
			Swal.fire({
				title: '¿Estado Seguro?',
				text: "No podra revertir los cambios!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Si, Eliminar Fila!'
			}).then((result) => {
				var data ={
					id_reporte: parametros[5], //reporte
					id_fila: $(this).attr("id"), //codigo_maquina
					tabla: "reportes_impresoras"
				}
				if (result.isConfirmed) {
	
					$(this).closest('tr').remove();
					$.ajax({
						type: "POST",
						url: base_url + "Reportes/Consulta_general/eliminar_filas_de_reportes",
						data: data,
						success: function (response) {
							
						}
					});
	
				}
			})
		});
	}
	

	let condicion_agua = 0;
	let condicion_delta = 0;

	$("#btn_cambiar_estado").click(function (e) {//ESTADO DEL MODAL DE VALIDACIN DE ARRANQUE


		$("td.agua_td").map(function () {
			var background1 = $(this).css("background-color");

			if (background1 == "rgb(232, 114, 114)") {
				condicion_agua++;
			}
		});
		$("td.delta_td").map(function () {
			var background1 = $(this).css("background-color");
			if (background1 == "rgb(232, 114, 114)") {
				condicion_delta++;
			}
		});

		if (condicion_agua > 0 || condicion_delta > 0) {
			Swal.fire({
				icon: 'info',
				title: 'NOTA',
				text: 'Uno o más datos ingresados de porcentaje de agua es mayor al adecuado (30%) O Uno o más datos ingresados de  ΔE es mayor al adecuado (3.0)',
			})
		}

		condicion_agua = 0
		condicion_delta = 0

		$("div#reportes-impresoras input").attr("disabled", true);
		$("div#modal_validacion_arranque button").attr("disabled", true);
		
		var data = {
			id: $(this).attr("name"),
			value: "cerrado",
			campo: "estado",
		};
		$.ajax({
			type: "POST",
			url: base_url + "Reportes/Consulta_general/actualizar_validacion_arranque",
			data: data,
			success: function (response) {
				toastr["success"]('GUARDADO')

			}
		});
	});

	$(".cambiar_estado").click(function (e) {//ESTAO DEL REPORTE
		if (rol_id != 1) {
			$(".cambiar_estado").hide();
			$("input").attr("disabled", true);
			$("select").attr("disabled", true);
			$("textarea").attr("disabled", true);
		}
		let estado = ""

		$(this).val() == "Revisado" ? estado = "fue revisado": $(this).val() == "Cerrado" ?  estado = "fue cerrado" :  estado = "fue enviado";
	
		toastr["success"]('El reporte '+estado+'')

		let data = {
			reporte: parametros[5], //reporte
			maquina: parametros[7], //codigo_maquina
			estado: $(this).val(),//este es el estado a enviar (dependera del boton)
			tabla: "reportes_impresoras",
		}
		$.ajax({
			type: "POST",
			url: base_url + "Reportes/Consulta_general/cambiar_estado_reporte",
			data: data,
			success: function (response) {

			},
		});
	});


	$(".input-tabla-reporte").change(function (e) {
		var data = {
			id: $(this).attr("name"),
			value: $(this).val(),
			campo: $(this).attr("role"),
			codigo_reporte: $("#codigo_reporte_en_header").text(),
			familia: parametros[6]

		};
		$.ajax({
			type: "POST",
			url: base_url + "Reportes/Consulta_general/actualizar_campos_de_fila",
			data: data,
			success: function (response) {
				// console.log(response);
			},
		});
	});


	$(".cambiar_aux_todo_el_reporte").change(function (e) { 
		var data = {
			codigo_reporte: parametros[5],
			value: $(this).val(),
			campo: $(this).attr("role"),
			familia: parametros[6]
		};
		Swal.fire({
			icon: 'question',
			text: "Puede por defecto este auxiliar a todas las demas filas!",
			showCancelButton: true,
			confirmButtonText: 'Si, Agregar',
			cancelButtonText: 'No, Cancelar!',
			reverseButtons: true,
			padding: '.1em',
			color: 'black',
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
		  }).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					type: "POST",
					url: base_url + "Reportes/Consulta_general/actualizar_todos_los_aux",
					data: data,
					dataType: "dataType",
					success: function (response) {
						console.log(response);
					}
				});
			  Swal.fire(
				'Reemplazado!',
				'Se reemplazo el auxiliar en las demas filas con exito.',
				'success'
			  ).then(function () {
				window.location.reload();
			})
			} 
		  })
		
	});

	$(document).on("input", ".input-tabla-reporte", function (e) {
		var data = {
			id: $(this).attr("name"),
			value: $(this).val(),
			campo: $(this).attr("role"),
			codigo_reporte: $("#codigo_reporte_en_header").text(),
			familia: parametros[6]

		};
		$.ajax({
			type: "POST",
			url: base_url + "Reportes/Consulta_general/actualizar_campos_de_fila",
			data: data,
			success: function (response) {
				// console.log(response);
			},
		});
	});
	$(document).on("input", ".inputs_validacion_arranque", function (e) {
		var data = {
			id: $(this).attr("name"),
			value: $(this).val(),
			campo: $(this).attr("role"),
		};
		$.ajax({
			type: "POST",
			url: base_url + "Reportes/Consulta_general/actualizar_validacion_arranque",
			data: data,
			success: function (response) {
				// console.log(response);
			},
		});
	});

	$(".inputs_validacion_arranque").change(function (e) {
		var data = {
			id: $(this).attr("name"),
			value: $(this).val(),
			campo: $(this).attr("role"),
		};
		$.ajax({
			type: "POST",
			url: base_url + "Reportes/Consulta_general/actualizar_validacion_arranque",
			data: data,
			success: function (response) {
				console.log(response);
			},
		});
	});

	$("#turno").change(function (e) {
		var data = {
			id: $(this).attr("name"),
			value: $(this).val(),
			campo: $(this).attr("role"),
		};
		$.ajax({
			type: "POST",
			url: base_url + "Reportes/Consulta_general/actualizar_codigo_reprote",
			data: data,
			success: function (response) {
				console.log(response);
			},
		});
	});


	//QUIERO DESACTIVAR TODOS LOS INPUTS MENOS EL PRIMER DE LA HORA INICIAL, PARA EVITAR CONFUCIONES
	/* 	var filas = $("table#tabla_imprentas tr").first()
		console.log(filas);
		var td = filas["prevObject"][1]
		console.log(td.first());  */

	$(".tiempo").change(function (e) {
		var time_i = $(this).parents("tr").find("input[role=hora_inicial]").val();
		var time_f = $(this).parents("tr").find("input[role=hora_final]").val();

		var dateDesde = newDate(time_i.split(":"));
		var dateHasta = newDate(time_f.split(":"));

		var minutos = (dateHasta - dateDesde) / 1000 / 60;
		var horas = Math.floor(minutos / 60);
		minutos = minutos % 60;
		$(this).parents("tr").find("input[role=dif_tiempo]").val(prefijo(horas) + ':' + prefijo(minutos));//setenado la diferencia en este input
		$(this).attr("role") == "hora_final" ? $(this).parents("tr").next("tr").find("input[role=hora_inicial]").val(time_f) : "";

		var data = {
			id: $(this).parents("tr").find("input[role=dif_tiempo]").attr("name"),
			value: $(this).parents("tr").find("input[role=dif_tiempo]").val(),
			campo: $(this).parents("tr").find("input[role=dif_tiempo]").attr("role"),
			codigo_reporte: $("#codigo_reporte_en_header").text(),
			familia: parametros[6]

		};
		$.ajax({
			type: "POST",
			url: base_url + "Reportes/Consulta_general/actualizar_campos_de_fila",
			data: data,
			success: function (response) {
				// console.log(response);
			},
		});

		var data = {
			id: $(this).parents("tr").next("tr").find("input[role=hora_inicial]").attr("name"),
			value: $(this).parents("tr").next("tr").find("input[role=hora_inicial]").val(),
			campo: $(this).parents("tr").next("tr").find("input[role=hora_inicial]").attr("role"),
			codigo_reporte: $("#codigo_reporte_en_header").text(),
			familia: parametros[6]

		};
		$.ajax({
			type: "POST",
			url: base_url + "Reportes/Consulta_general/actualizar_campos_de_fila",
			data: data,
			success: function (response) {
				// console.log(response);
			},
		});


		var minutos_i = time_i.split(":").reduce((p, c) => parseInt(p) * 60 + parseInt(c));//obtenemos la cantidad de minutos que se encuentran en el tiempo por ejemplo sabemos que en 1 hora hay 60 minutos entonces en 6 horas hay 360 minutos
		var minutos_f = time_f.split(":").reduce((p, c) => parseInt(p) * 60 + parseInt(c));
		const diferencia = minutos_f - minutos_i;//se resta la diferencia de minutos 
		const hora = Math.floor(diferencia / 60);
		const min = diferencia % 60;
		const dif2 = min / 60 + hora;

		var data = {
			id: $(this).parents("tr").find("input[role=dif_tiempo]").attr("name"),
			value: dif2,
			campo: "dif_tiempo2",
			codigo_reporte: $("#codigo_reporte_en_header").text(),
			familia: parametros[6]

		};
		$.ajax({
			type: "POST",
			url: base_url + "Reportes/Consulta_general/actualizar_campos_de_fila",
			data: data,
			success: function (response) {
				// console.log(response);
			},
		});
	});

	function newDate(partes) {
		var date = new Date(0);
		date.setHours(partes[0]);
		date.setMinutes(partes[1]);
		return date;
	}
	function prefijo(num) {
		return num < 10 ? "0" + num : num;
	}

	$(document).on("input", ".inputs_contenido_validacion_arranque", function (e) {
		var data = {
			id: $(this).attr("name"),
			campo: $(this).attr("id"),
			value: $(this).val(),
		};
		$.ajax({
			type: "POST",
			url: base_url + "Reportes/Consulta_general/acutlizar_contenido_validacion_arranque",
			data: data,
			success: function (response) {
				console.log(response);
			},
		});
	});


	const actualizar_velocidades = (datos) => {
		$.ajax({
			type: "POST",
			url: base_url + "Reportes/Consulta_general/update_velnom_velefect",
			data: datos,
			success: function (response) {
				console.log(response);
			}
		});
	}

	let input_imprenta_busqueda = document.getElementsByClassName("input_acualizar_velocidades");
	let timeout;
	for (var i = 0; i < input_imprenta_busqueda.length; i++) {
		input_imprenta_busqueda[i].addEventListener("keydown", () => {
			clearTimeout(timeout);
			timeout = setTimeout(() => {
				const nominal = $("input[name=velocidad_nominal]").val().split(' ', 1)
				var velocidad_nomimal = {
					id: parametros[5],
					campo: "velocidad_nominal",
					value: nominal[0],
				}
				console.log(velocidad_nomimal);
				actualizar_velocidades(velocidad_nomimal)
				const efectiva = $("input[name=velocidad_efectiva]").val().split(' ', 1)
				var velocidad_efectiva = {
					id: parametros[5],
					campo: "velocidad_efectiva",
					value: efectiva[0],
				}
				actualizar_velocidades(velocidad_efectiva)
				clearTimeout(timeout);
			}, 1500);
		});
	}


	function inputs_validaciones_de_arranques() {//VALIDANDO COLORES DE LOS INPUTS (MODAL VALIDACION DE ARRANQUE)
		setInterval(() => {
			$("input.porcentaje_agua_validacion").each(function (index, element) {
				if (isNaN($(this).val())) {//VALIDANDO SI ES TEXTO EL QUE ENTREA
					$(this).parents("td").css("background-color", "#E87272");
				} else if ($(this).val() == "") {
					$(this).parents("td").css("background-color", "transparent");
				} else {
					if ($(this).val() > 0 && $(this).val() <= 30) {
						$(this).parents("td").css("background-color", "#6CF5A2");
					} else {
						$(this).parents("td").css("background-color", "#E87272");
					}
				}
			});
			$("input.delta_validacion").each(function (index, element) {
				if (isNaN($(this).val())) {//VALIDANDO SI ES TEXTO EL QUE ENTREA
					$(this).parents("td").css("background-color", "#E87272");
				} else if ($(this).val() == "") {
					$(this).parents("td").css("background-color", "transparent");
				} else {
					if ($(this).val() > 0 && $(this).val() <= 1.5) {
						$(this).parents("td").css("background-color", "#6CF5A2");
					} else if ($(this).val() > 1.5 && $(this).val() <= 3) {
						$(this).parents("td").css("background-color", "#F5F977");
					} else {
						$(this).parents("td").css("background-color", "#E87272");
					}
				}
			});
		}, 100);
	}
	inputs_validaciones_de_arranques()
});
