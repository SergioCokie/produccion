 <script>
     var base_url = "<?php echo base_url() ?>"
     var usuario_id = "<?php echo $this->session->userdata("id") ?>"
     var rol_id = "<?php echo $this->session->userdata("id_rol") ?>"
     var nombre_usuario = "<?= $this->session->userdata("nombre") ?>"

     var key_trello = "1faa1c1efb63eed902ac4667d11188bc"
     var token_trello = "404075216ea5d0d8e713bbf66c1ff25e0682937efb4c24cc7aaca4eaaac2a1d5"

     toastr.options = {
         "closeButton": true,
         "debug": true,
         "newestOnTop": false,
         "progressBar": true,
         "positionClass": "toast-top-right",
         "preventDuplicates": false,
         "onclick": null,
         "showDuration": "300",
         "hideDuration": "1000",
         "timeOut": "5000",
         "extendedTimeOut": "1000",
         "showEasing": "swing",
         "hideEasing": "linear",
         "showMethod": "fadeIn",
         "hideMethod": "fadeOut"
     }

     reload()

     function reload() {
         window.addEventListener('load', () => {
             const contenedor_loader = document.querySelector('.contenedor_loader')
             //	contenedor_loader.style.opacity = 0
             contenedor_loader.style.visibility = 'hidden'
         })
     }
     /* parte no relevante del sistema */
     var ancho = screen.width;
     var tr_filtro = document.getElementById("thead_filtros");
     if (ancho <= 1130) {
         tr_filtro.style.display = "none";
     }
     /* parte no relevante del sistema */

     $('.js-select-basic-single').select2({
         width: 'resolve',
         dropdownAutoWidth: true,

     });
 </script>



 </body>

 </html>