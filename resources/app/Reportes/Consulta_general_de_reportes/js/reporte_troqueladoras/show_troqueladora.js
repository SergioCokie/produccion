$(document).ready(function () {
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
	//$(".input_acualizar_velocidades").change(function (e) { 
	$(document).on("input", ".input_acualizar_velocidades", function (e) {
		llenar_velocidades_tiempo();
		//lert("se tiene que cambiar")
	});
	$(".input_acualizar_velocidades").change(function (e) {
		llenar_velocidades_tiempo();
		//lert("se tiene que cambiar")
	});
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
			$("input").attr("disabled", true);
			$("select").attr("disabled", true);
			$("textarea").attr("disabled", true);
		}
		$.ajax({
			type: "POST",
			url: base_url + "Reportes/Consulta_general/estado_del_reporte",
			data: data,
			success: function (response) {
				var datos = JSON.parse(response); //VALIDANDO ESTADO DEL REPORTE
				console.log(datos);
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

	/* console.log(parametros[8]); */
	let id_fila = parametros[8];
	if (id_fila != " ") {
		$('#tabla_troqueladora tr').each(function (i) {
			var ch = $(this).attr("role");
			if (ch === id_fila) {
				$(this).css("background-color", "rgb(245 252 126)")
			}
			$('html, body').animate({
				scrollTop: $("tr[role="+id_fila+"]").offset().top
			}, 100);


		});
	} else {
		//console.log("esta vacio we");
	}

});