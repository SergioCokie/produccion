$(document).ready(function () {
    $(document).on("input", "input.to-change",
		function (e) {
			var data = {
				id: $(this).attr("data-id"),
                table: $(this).attr("data-table"),
				campo: $(this).attr("data-campo"),
                value:$(this).val()
			};
		}
	);

});