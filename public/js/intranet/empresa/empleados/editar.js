$(document).ready(function() {
    $(".checkbox_cuentas").change(function() {
        if(this.checked) {
            valor= 1;
        }else{
            valor= 0;
        }
        const url_t = $(this).attr('data_url');
        var data = {
            "valor": valor,
            _token: $('input[name=_token]').val(),
        };
        $.ajax({
            url: url_t,
            type: 'POST',
            data: data,
            success: function(respuesta) {
                if (respuesta.mensaje == "ok") {
                    Sistema.notificaciones('Cuenta asociada al empleado correctamente', 'Sistema', 'success');
                } else {
                    Sistema.notificaciones('Cuenta desasociada al empleado correctamente', 'Sistema', 'warning');
                }
            },
            error: function() {

            }
        });
    });
    $(".checkbox_licencias").change(function() {
        if(this.checked) {
            valor= 1;
        }else{
            valor= 0;
        }
        const url_t = $(this).attr('data_url');
        var data = {
            "valor": valor,
            _token: $('input[name=_token]').val(),
        };
        $.ajax({
            url: url_t,
            type: 'POST',
            data: data,
            success: function(respuesta) {
                if (respuesta.mensaje == "ok") {
                    Sistema.notificaciones('Lilcencia asociada al empleado correctamente', 'Sistema', 'success');
                } else {
                    Sistema.notificaciones('Lilcencia desasociada al empleado correctamente', 'Sistema', 'warning');
                }
            },
            error: function() {

            }
        });
    });
});
