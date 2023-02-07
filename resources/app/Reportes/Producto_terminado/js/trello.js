$(document).ready(function () {
    $(document).on("change",'.select_maquina',  function () {
		var maquina = $(this).val();
        var id = $(this).attr("name");
		var id_trello = $(this).parents("tr").find("td#trello").text();
        var elemento = $(this);
		if (id_trello != "") {
			$.ajax({
				type: "POST",
				url: base_url + "Reportes/Producto_terminado/get_trello",
				data: { maquina: maquina },
				success: function (response) {
					var datos = JSON.parse(response);
					axios.get("https://api.trello.com/1/boards/" +datos[0].codigoBoard +"/cards?key=" +key_trello +"&token=" +token_trello +"")//La key_trello y token_trello esta definida en el footer del sistema, no buscar en el mismo documento
							.then((res) => {
								for (let i = 0; i < res.data.length; i++) {
									const element = res.data[i];
									 if (element["idShort"] == id_trello) {
										var ID_taxrjeta = element["id"];
										var arreglo = element["name"].split("-");
                                        var cliente = "";
										var producto = ""
                                        elemento.parents("tr").find("td#descripcion_trello").text(element["name"]);
                                        $("input[name=ot]").val(arreglo[0]);

                                        if (maquina == "Flexografia" ||maquina == "GALLUS" ||maquina == "Control de Pedidos") {
                                            cliente = arreglo[2];
                                        } else {
                                            cliente = arreglo[1];
                                        }
                                        cliente == "R" ? cliente = "R-PAC": "";
                                        $("input[name=cliente]").val(cliente);
                                        
                                        if (arreglo[arreglo.length - 3].match(/.*CAMBIOS.*/)) {
                                            producto = arreglo[arreglo.length - 4];                    
                                        } else {
                                            producto = arreglo[arreglo.length - 3];                    
                                        }
                                        elemento.parents("tr").find("textarea#producto").val(producto);
										var data = {
                                            id:id,
                                            id_trello:id_trello,
                                            maquina:maquina,
                                            producto:elemento.parents("tr").find("textarea#producto").val(),
                                            descripcion_trello: element["name"],
                                        }
                                        modificar_registro_de_contenido(data)

                                        var datos_PT = {//datos producto terminado
                                            id:$("button#agregar_1").attr("role"), //el role del boton contiene el identificador
                                            cliente:cliente,
                                            ot: arreglo[0],
                                        }
                                        console.log(datos_PT);
                                        modificar_producto_terminado(datos_PT)
									}
								}
							})
							.catch((err) => {
								console.error(err);
							});
				}, 
			});
		} else {
			toastr["error"]("ID trello no ingresado", "ERROR");
		}
	});

    function modificar_registro_de_contenido(datos_a_modificar){
        $.ajax({
            type: "POST",
            url: base_url + "Reportes/Producto_terminado/update_contenido",
            data: datos_a_modificar,
            success: function (response) {
                console.log(response);
            }
        });
    }
    function modificar_producto_terminado(datos_a_modificar){//en este caso los unicos datos que se envian son: fecha de entrega, cliente y OP
        $.ajax({
            type: "POST",
            url: base_url + "Reportes/Producto_terminado/actualizar_producto_terminado_only_3_things",
            data: datos_a_modificar,
            success: function (response) {
                console.log(response);
            }
        });
    }
    
});