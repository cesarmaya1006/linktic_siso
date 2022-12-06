$(document).ready(function () {
    $(".display_excel").DataTable({
        //"scrollX": true,
        dom: "Blfrtip",
        buttons: [{
            extend: 'excel',
            text: '<img class="img-fluid mr-5" src="../imagenes/sistema/excel.png" style="max-width: 50px;">',
            tag: 'span',
            exportOptions: {
                columns: function(column, data, node) {
                    if (column > 10) {
                        return false;
                    }
                    return true;
                },
            }
        }, ],
        language: {
            sProcessing: "Procesando...",
            sLengthMenu: "Mostrar _MENU_ resultados",
            sZeroRecords: "No se encontraron resultados",
            sEmptyTable: "Ningún dato disponible en esta tabla",
            sInfo: "Mostrando resultados _START_-_END_ de  _TOTAL_",
            sInfoEmpty:
                "Mostrando resultados del 0 al 0 de un total de 0 registros",
            sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
            sSearch: "Buscar:",
            sLoadingRecords: "Cargando...",
            oPaginate: {
                sFirst: "Primero",
                sLast: "Último",
                sNext: "Siguiente",
                sPrevious: "Anterior",
            },
        },
    });
});
