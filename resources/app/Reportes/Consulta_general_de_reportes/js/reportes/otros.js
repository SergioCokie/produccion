$(document).ready(function () {
    let identificadorIntervaloDeTiempo;
    repetirCadaSegundo()
    function repetirCadaSegundo() {
        identificadorIntervaloDeTiempo = setInterval(mandarMensaje, 6000);
    }
    function mandarMensaje() {
        if ($("#turno").val() == "TURNO") {
            toastr["warning"]('POR FAVOR SELECCIONA UN TURNO')
        }
    }

    $('.js-select-basic-singles').select2({
        width: 'resolve',
        dropdownAutoWidth: true,
        theme: "bootstrap4",
        dropdownCssClass: "myFont",
    });

    $('.single-input').clockpicker({
        placement: 'right',
        align: 'right',
        autoclose: true,
        default: '00:00',
        donetext: 'Hecho'

    });
    $(function () {
        $('[data-toggle="popover"]').popover()
    })

    $(".solo_numeros").keypress(function (tecla) {//evitando que escriba letras
        if (tecla.charCode < 46 || tecla.charCode > 57) {
            return false;
        }
       
    });

    console.log(parametros[8]);
    

});