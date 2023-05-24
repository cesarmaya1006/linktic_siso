function asignacion(url) {
    const valor= 1;
    const url_t = url;
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
                Sistema.notificaciones('La cuenta fue asignada correctamente', 'Sistema', 'success');
                location.reload();
            } else {
                Sistema.notificaciones('El equipo no pudo ser eliminado, hay recursos usandolo', 'Sistema', 'error');
            }
        },
        error: function() {

        }
    });
}

function des_asignacion(url) {
    const valor= 0;
    const url_t = url;
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
                Sistema.notificaciones('El equipo fue asignado correctamente', 'Sistema', 'success');
                location.reload();
            } else {
                Sistema.notificaciones('Se quito la asignación del equipo correctamente', 'Sistema', 'success');
            }
        },
        error: function() {

        }
    });
}