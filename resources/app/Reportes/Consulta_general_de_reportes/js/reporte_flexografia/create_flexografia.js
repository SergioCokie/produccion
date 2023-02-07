$(document).ready(function () {
	var data = {
		reporte: parametros[5], //reporte
		maquina: parametros[7], //codigo_maquina
		tabla: "reportes_flexografia",
	};
	$("#add_rows").click(function (e) {
		var cantidad_filas_agregar = $("#filas").val();

		if (cantidad_filas_agregar > 0 && cantidad_filas_agregar <= 10) {
			for (let index = 1; index <= cantidad_filas_agregar; index++) {
				$.ajax({
					type: "POST",
					url: base_url + "Reportes/Consulta_general/agregar__filas",
					data: data, //XL105_0001380 EN ESTE CASO
					success: function (response) {
						//var filas = $("table#tabla_imprentas tr").first();
						//for (let index = 1; index <= cantidad_filas_agregar; index++) {

						//$(filas).after(response);
						// lo ideal hubiera sido agregar sin actualizar la pagina
						//pero la tabla de reportes_impresoras esta mal hecha entonces no se puede
						//hay que actualizar la pagina
						location.reload();
					},
				});
			}
		} else {
			if (cantidad_filas_agregar > 10) {
				toastr["error"]('El numero de filas no puede ser mayor a 10')
			}else if(cantidad_filas_agregar < 0){
				toastr["error"]('El numero de filas no puede ser menor a 0')
			}else{
				toastr["error"]('ingrese algun valor')

			}
		}
	});

});
