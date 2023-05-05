$(document).ready(function () {
    const cuentasCorpModal = new bootstrap.Modal(document.getElementById("cuentasCorporativasModal"));
    const licenciasCorpModal = new bootstrap.Modal(document.getElementById("licenciasCorporativasModal"));
    $(".verModalCuentasCorporativas").on("click", function () {
        const url_t = $(this).attr("data_url");
        const data_empleado = $(this).attr("data_empleado");
        $.ajax({
            url: url_t,
            type: "GET",
            success: function (respuesta) {
                console.log(respuesta);
                respuesta_html = "";
                respuesta_html += '<div class="row">';
                respuesta_html += '<div class="col-12">';
                respuesta_html += '<div class="ul">';
                $.each(respuesta, function (index, item) {
                    respuesta_html +="<li><Strong>" + item["cuenta"] + "</Strong></li>";
                });
                respuesta_html += "</div>";
                respuesta_html += "</div>";
                respuesta_html += "</div>";
                $("#bodyCuentasCorporativas").html(respuesta_html);
                $("#cuentasCorporativasModalLabel").html('Cuentas Corporativas Asignadas a <br>' + data_empleado);
            },
            error: function () {},
        });
    });

    $(".verModalLicenciasCorporativas").on("click", function () {
        const url_t = $(this).attr("data_url");
        const data_empleado = $(this).attr("data_empleado");
        $.ajax({
            url: url_t,
            type: "GET",
            success: function (respuesta) {
                console.log(respuesta);
                respuesta_html = "";
                respuesta_html += '<div class="row">';
                respuesta_html += '<div class="col-12">';
                respuesta_html += '<div class="ul">';
                $.each(respuesta, function (index, item) {
                    respuesta_html +="<li><Strong>" + item["licencia"] + "</Strong></li>";
                });
                respuesta_html += "</div>";
                respuesta_html += "</div>";
                respuesta_html += "</div>";
                $("#bodyLicenciasCorporativas").html(respuesta_html);
                $("#licenciasCorporativasModalLabel").html('Licencias Corporativas Asignadas a <br>' + data_empleado);
            },
            error: function () {},
        });
    });
});
