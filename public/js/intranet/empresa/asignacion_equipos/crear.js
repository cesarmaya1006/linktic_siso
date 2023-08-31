$(document).ready(function() {
    //==========================================================================
    $('#equipo').on('change', function(event) {
        const tipo = $(this).val();
        if (tipo=='Rentado') {
            $('#caja_comentario').removeClass('d-none');
            $("#comentarios_equipo").prop('required',true);

        } else {
            $('#caja_comentario').addClass('d-none');
            $("#comentarios_equipo").prop('required',false);
        }
    });
    //==========================================================================
} );
