$(document).ready(function () {
	$("#crear_reporte_boton_modal").click(function (e) {
		if ( $("#seleccionar_maquina").val() != "") {
			Swal.fire({
				title: '¿Crear Reporte?',
				text: "¿Quiere crear un nuevo reporte de esta maquina?",
				icon: 'question',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Si, Crear!'
			}).then((result) => {
				if (result.isConfirmed) {
					const data = $("#seleccionar_maquina").val().split("-");
					console.log(data);
					$.ajax({
						type: "POST",
						url: base_url + "Reportes/Consulta_general/insertar_reporte",
						data: { maquina: data[0], tipo: data[1] },
						success: function (response) {
							window.open(base_url + "Reportes/Consulta_general/reporte/" + response, '_blank');
		
						},
					});
				}
			})
		}else{
			toastr["error"]('Necesita seleccionar una maquina para poder crear el reporte')
		}
		

	});
	/* $("#seleccionar_maquina").change(function (e) {

		if ($(this).val() != "") {
			var data = $(this).val().split("-");
			$.ajax({
				type: "POST",
				url: base_url + "Reportes/Consulta_general/insertar_reporte",
				data: { maquina: data[0], tipo: data[1] },
				success: function (response) {
					window.open(base_url + "Reportes/Consulta_general/reporte/" + response, '_blank');

				},
			});
		}
	}); */
});
