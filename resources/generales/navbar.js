$(document).ready(function () {
	var URLactual = window.location;
	//quitando banner para las paginas que no las usan
	var banner = document.getElementById("banner_imagen_seccion_produccion");
	if (URLactual == base_url + "Welcome") {
	} else if (URLactual == base_url) {
		//si es igual a estas url entonces se mantiene de lo contrario se oculta
	} else {
		$(".clase_del_banner").removeClass("view").addClass("view2");
		banner.style.display = "none";
	}

	/* INICIO ------ MOSTRANDO LOS MODULOS Y SUBMODULOS DONDE EL USUARIO TIENE PERMISOS */
	var data = {
		id_usuario: usuario_id,
	};
	jQuery.extend({
		getValues: function (url) {
			var result = null;
			$.ajax({
				type: "POST",
				url: base_url + "welcome/navbar",
				data: data,
				async: false,
				success: function (res) {
					var datos = JSON.parse(res);
					result = datos;
				},
			});
			return result;
		},
	});

	var results = $.getValues("url string");
	for (var i = 0; i < results.length; i++) {
		var data = {
			id_submodulo: results[i].id_submodulo,
		};
		$.ajax({
			type: "POST",
			url: base_url + "welcome/sub_modulos",
			data: data,
			success: function (response) {
				var datos = JSON.parse(response);
				var divs = document.getElementsByClassName("modulos_navbar").length;
				for (let i = 1; i <= divs; i++) {
					if ($(".modulo_numero_" + i + "").attr("id") == datos[0].id_modulo) {
 						$(".modulo_numero_" + i + "").append(
							`<a class="dropdown-item boton_navbar" href="` +base_url +datos[0].ruta2 +`">
								<span>` +datos[0].nombre +`</span>
							</a>`
						);
					}
				}
			},
		});
	}
	/* FIN ------ MOSTRANDO LOS MODULOS Y SUBMODULOS DONDE EL USUARIO TIENE PERMISOS */
});
