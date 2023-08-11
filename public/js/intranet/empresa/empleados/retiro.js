$(document).ready(function() {
    $( "#retiro_empleado" ).submit(function( event ) {
        event.preventDefault();
        const form = $(this);
        Swal.fire({
            title: '¿Está seguro de efectuar el retiro del empleado?',
            text: "Esta acción no se puede deshacer!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Borrar!',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.isConfirmed) {
                submitRequest(form);
            }
          });


    });

    function submitRequest(form) {
        const data_url = form.attr('data_url');
        $('.loading').removeClass('d-none');
        $('.cuerpo').addClass('d-none');

        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function(respuesta) {
                //$('.loading').addClass('d-none');
                if (respuesta.mensaje == "ok") {
                    window.location = data_url;
                } else {
                    Sistema.notificaciones('El registro no pudo ser eliminado, hay recursos usandolo', 'Sistema', 'error');
                }
            },
            error: function() {

            }
        });
    }
} );
