$(document).ready(function () {
	
    jQuery.extend({
		getValues: function (url) {
			var result = null;
			$.ajax({
				type: "POST",
				url: base_url + "Reportes/Producto_terminado/get_trello",//usamos el mismo metodo ya que lo tenemos hecho
				data: { maquina: parametros[7] },//le enviamos la maquina
				async: false,
				success: function (res) {
					var datos = JSON.parse(res);
					result = datos;
				},
			});
			return result;
		},
	});
	var datos_trello = $.getValues("url string");//tomando
    var find = false
	$("input[role=id_trello]").change(function (e) {
		axios.get("https://api.trello.com/1/boards/" +datos_trello[0].codigoBoard +"/cards?key=" +key_trello +"&token=" +token_trello +"") 
        //La key_trello y token_trello esta definida en el footer del sistema, no buscar en el mismo documento
			.then((res) => {
				for (let i = 0; i < res.data.length; i++) {
                    const element = res.data[i];
                     if (element["idShort"] == $(this).val()) {
						find = true
                        var arreglo = element["name"].split("-");//DIVIENDO TODO LA DESCRIPCION DEL LA TARJETA TRELLO POR -
                        //SETEANDO DATOS
                        element["idList"] == datos_trello[0].lista_terminado ? $(this).parents("tr").find("input[role=lista_trello]").val("Terminado"): "";
                        element["idList"] == datos_trello[0].lista_planificado ? $(this).parents("tr").find("input[role=lista_trello]").val("Planificado"): "";
                        element["idList"] == datos_trello[0].lista_suspendida ? $(this).parents("tr").find("input[role=lista_trello]").val("Suspendido"): "";
                        element["idList"] == datos_trello[0].lista_proceso ? $(this).parents("tr").find("input[role=lista_trello]").val("Proceso"): "";

                        $(this).parents("tr").find("input[role=ot_trello]").val(arreglo[0])//OT TRELLO

                        $(this).parents("tr").find("textarea[role=descripcion_trello]").val(element["name"])//DESCRIPCION TRELLO
						
						var cliente = element["name"].split("-");
						cliente[1] == "R" ? cliente[1] = "R-PAC": "";

						const cliente_f = parametros[6] == "flexografia" ? cliente[2] : cliente[1];

                        $(this).parents("tr").find("input[role=cliente]").val(cliente_f)//CLIENTE

						var producto = "";//verificando el prodcuto para meterlo en la base de datos (nada mas)
						arreglo[arreglo.length - 3].match(/.*CAMBIOS.*/) ? producto = arreglo[arreglo.length - 4] : producto = arreglo[arreglo.length - 3];

                        $(this).parents("tr").find("input[role=producto]").val(producto);
						console.log();
						var datos ={
							lista_trello: $(this).parents("tr").find("input[role=lista_trello]").val(),
							descripcion_trello: element["name"],
							producto: producto,
							cliente:cliente_f,
							ot_trello: arreglo[0],
							ID: $(this).parents("tr").find("input[role=lista_trello]").attr("name"),
							id_reporte: parametros[5],
							familia: parametros[6],
							id_ficha_trello: element["id"]
						}
						modificar_fila(datos)
						break;
						//para comprobar los datos imprimir en consola datos => console.log(datos);
                    }
                }
				//alert si no encuentra id trello
				if(!find){
					toastr["error"]('Al parecer el ID TRELLO ingresado no fue encontrado. Consulte dentro de su tablero para verificar dicha informacion')

				}
				find = false
			})
			.catch((err) => {
				console.error(err);
			});
	});

	function modificar_fila(datos_modificar){
		$.ajax({
			type: "POST",
			url: base_url + "Reportes/Consulta_general/actualizar_fila",//usamos el mismo metodo ya que lo tenemos hecho
			data: datos_modificar,
			success: function (response) {
				//console.log(response);
			}
		});
	}
	
});
