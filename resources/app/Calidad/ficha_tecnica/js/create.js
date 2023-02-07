$(document).ready(function () {
	rol_id != 6 ? (document.getElementById("crear_ficha_modal").style.display = "none"): "";

	console.log(rol_id);
	$(".list-group-item").click(function (e) {
		var ficha = $(this).attr("id");
		if (ficha == "impresoras") {
			$(".list-group-item").removeClass("active");
			$("#impresoras").addClass("active");
			$("#crear_ficha").prop("disabled", false);
		} else if (ficha == "pegadoras") {
			$(".list-group-item").removeClass("active");
			$("#pegadoras").addClass("active");
			$("#crear_ficha").prop("disabled", false);
		} else if (ficha == "troqueladoras") {
			$(".list-group-item").removeClass("active");
			$("#troqueladoras").addClass("active");
			$("#crear_ficha").prop("disabled", false);
		}
	});
	$("#crear_ficha").click(function (e) {
		var tipo_ficha = $(".active").attr("id");
		Swal.fire({
			title: "Esta seguro?",
			text: "La ficha se puede modificar o cerrar",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Si, Crear Ficha!",
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href ="" +base_url +"calidad/ficha_tecnica/insertar_ficha/" +tipo_ficha +"";
			}
		});
	});

	
});
