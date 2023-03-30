$(document).ready(function() {
    $('#tablaEquipos').DataTable({
        "lengthMenu": [ 10, 15, 25, 50, 75, 100 ],
        "pageLength": 15,
        dom: 'lBfrtip',
        buttons: [ {
            extend: 'excelHtml5',
            customize: function( xlsx ) {
                var sheet = xlsx.xl.worksheets['sheet1.xml'];

                $('row c[r^="C"]', sheet).attr( 's', '2' );
            }
        } ],
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ resultados",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando resultados _START_-_END_ de  _TOTAL_",
            "sInfoEmpty": "Mostrando resultados del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
        }
    });
} );
