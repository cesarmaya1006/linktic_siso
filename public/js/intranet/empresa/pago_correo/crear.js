$(document).ready(function() {
    $(".cambio_valores").on("keyup change", function(e) {
        var costo_dolares = $('#costo_dolares').val();
        var trm = $('#trm').val();
        var costo_pesos = (costo_dolares*trm)
        $('#costo_pesos').val(costo_pesos.toFixed(2));
    })
});
