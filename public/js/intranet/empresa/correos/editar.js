$(document).ready(function() {
    $('#estado').on('change', function(event) {
        const valor = $(this).val();
        if (valor!='Eliminado') {
            $('#campo_correos').addClass('d-none');
        } else {
            $('#campo_correos').removeClass('d-none');
        }

    });

} );
