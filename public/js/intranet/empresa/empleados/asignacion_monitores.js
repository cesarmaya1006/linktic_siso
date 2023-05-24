function asignacion_imp(url,id) {
    const valor= 1;
    const url_t = url;
    const id_tr = id;
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
                $('#tr_'+id_tr).remove();
                Sistema.notificaciones('El monitor fue asignado correctamente', 'Sistema', 'success');
            } else {
                Sistema.notificaciones('El monitor no pudo ser eliminado, hay recursos usandolo', 'Sistema', 'error');
            }
        },
        error: function() {

        }
    });
}

function des_asignacion_imp(url,id) {
    const valor= 0;
    const url_t = url;
    const id_tr = id;
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
                Sistema.notificaciones('El monitor fue asignado correctamente', 'Sistema', 'success');
            } else {
                $('#tr2_'+id_tr).remove();
                Sistema.notificaciones('Se quito la asignación del monitor correctamente', 'Sistema', 'success');
            }
        },
        error: function() {

        }
    });
}
