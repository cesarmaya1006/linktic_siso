$(document).ready(function() {
    $('#rol_id').on('change', function(event) {
        const rol_id = $(this).val();
        const url_t = $(this).attr('data_url');
        var data = {
            "rol_id": rol_id,
        };
        $.ajax({
            url: url_t,
            type: 'GET',
            data: data,
            success: function(respuesta) {
                console.log(respuesta);

                respuesta_html = '';

            },
            error: function() {

            }
        });
    });
    $(".check_permisos").change(function() {
        if(this.checked) {
            valor= 1;
        }else{
            valor= 0;
        }
        const url_t = $(this).attr('data_url');
        const opcion =$(this).attr('data-permiso_opcion');
        var data = {
            "valor": valor,
            "opcion" : opcion,
            _token: $('input[name=_token]').val(),
        };
        $.ajax({
            url: url_t,
            type: 'POST',
            data: data,
            success: function(respuesta) {
                if (respuesta.mensaje == "ok") {
                    Sistema.notificaciones('Permiso guardado correctamente', 'Sistema', 'success');
                } else {
                    Sistema.notificaciones('Jurado desasociadoa a la propuesta correctamente', 'Sistema', 'warning');
                }
            },
            error: function() {

            }
        });
    });
});
