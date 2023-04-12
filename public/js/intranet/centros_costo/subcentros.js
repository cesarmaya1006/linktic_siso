$(document).ready(function() {
    //==========================================================================
    $('#centro_costo_id').on('change', function(event) {
        const url_t = $(this).attr('data_url');
        const id = $(this).val();
        var data = {
            "id": id,
        };
        $.ajax({
            url: url_t,
            type: 'GET',
            data: data,
            success: function(respuesta) {
                console.log(respuesta);
                $('#consecutivo_span').html(respuesta.consecutivo);
                $('#consecutivo').val(respuesta.consecutivo);
            },
            error: function() {

            }
        });
    });
    //==========================================================================
});
