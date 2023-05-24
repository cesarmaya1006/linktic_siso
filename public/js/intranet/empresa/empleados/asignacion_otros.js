function des_asignacion_otro(url,id) {
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
                $('#tr2_'+id_tr).remove();
                Sistema.notificaciones('El equipo fue asignado correctamente', 'Sistema', 'success');
            } else {
                $('#tr2_'+id_tr).remove();
                Sistema.notificaciones('Se quito la asignación del equipo correctamente', 'Sistema', 'success');
            }
        },
        error: function() {

        }
    });
}
